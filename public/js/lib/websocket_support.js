//websocket_support, Copyright(c) 2017 Vahai Technologies <product-team@vahaitech.com>
(function(factory) {

  // Establish the root object, `window` (`self`) in the browser, or `global` on the server.
  // We use `self` instead of `window` for `WebWorker` support.
  var root = (typeof self == 'object' && self.self === self && self) ||
            (typeof global == 'object' && global.global === global && global);

  // Set up Backbone appropriately for the environment. Start with AMD.
  if (typeof define === 'function' && define.amd) {
    define(['underscore', 'Backbone'], function(_, Backbone) {
      // Export global even in AMD case in case this script is loaded with
      // others that may still expect a global Backbone.
      root.WebSocket_Support = factory(root, {}, Backbone, _);
    });
  // Finally, as a browser global.
  } else {
    root.WebSocket_Support = factory(root, {}, Backbone, _);
  }

})(function(root, WebSocket_Support, Backbone, _) {

  var util = {
    inherits: function(ctor, superCtor) {
      ctor.super_ = superCtor;
      ctor.prototype = Object.create(superCtor.prototype, {
        constructor: {
          value: ctor,
          enumerable: false,
          writable: true,
          configurable: true
        }
      });
    }
  };

  //Custom/Wrapper around Webworker that manages Websocket Lifecycle
  SocketWorker = function(ws_url, noOfRetry) {
    if (window.Worker) {
      this.worker = new Worker('./js/lib/socketworker.js');
      var socketMeta = {type:'wsmeta', ws_url: ws_url, noOfRetry: noOfRetry};
      this.postMessage(socketMeta);  
    } else {
      //flash an error
      return;
    }
    //register events on webworker
    this.onMessage();
    this.onError();
  };

  SocketWorker.prototype.postMessage = function(msg) {
    this.worker.postMessage(msg);
  };

  SocketWorker.prototype.onMessage = function() {
    this.worker.onmessage = function(e) {
      var data = e.data;
      //check Websocket is Opened
      if (data.hasOwnProperty('type') && data.type == 1) {//Ready
        console.log('Socket is Ready.');
        WebSocket_Support.requestMonitor.setSocketState(true);        
      } else if (data.hasOwnProperty('type') && data.type == 0) {//Not Ready
        console.log('Socket is not Ready.');
        WebSocket_Support.requestMonitor.setSocketState(false);        
      } else if (data.hasOwnProperty('type') && data.type == 2) {//Reach Max retry
        console.log('Reach Max retry.');
        WebSocket_Support.requestMonitor.setSocketState(false);
        WebSocket_Support.responseMonitor.add({type: 'MaxRetry', errMsg: 'Retry attempts have Failed.'});         
      } else {
        //put the response to ResponseMonitor
        WebSocket_Support.responseMonitor.add(data);        
      }  
    }
  };

  SocketWorker.prototype.onError = function() {
    var self = this;
    this.worker.onerror = function(e) {
      var error = ['ERROR: Line ', e.lineno, ' in ', e.filename, ': ', e.message].join('');
      // var error = e.data;/
      console.log('Error in Webworker', error);
      //terminate the webworker
      self.worker.terminate();
      //recreate the SocketWorker, which automatically creates the binaryClient
      if (WebSocket_Support.retryAttempts < WebSocket_Support.noOfRetry) {
        WebSocket_Support.socketWorker = new SocketWorker(WebSocket_Support.ws_url, WebSocket_Support.noOfRetry);
      } else {
      //Need to intimate the client that retry reaches max, HOW???
      console.log('Reached Max Retry to start the webworker');
      }
    }
  };

  //Handles WebSocket Requests
  RequestMonitor = function() {
    var self = this;
    EventEmitter.call(this); //call super constructor EventEmitter.
    //store request metadata
    this.queue = {};
    //register events
    this.on('rePostMsg', function() {
      //Derive ws Request Header & Body for each pending request & post them to webworker
      var pendingRequests = Object.values(this.queue);
      pendingRequests.forEach(function(item) {
        if (item.status == 'ready' || item.status == 'sending') {
          var options = item.options;
          var header = {
            uid: item.uid,
            url: options.url,
            operation: options.operation,
            responseOrigin: 'client',            
            method: options.type, //GET/POST/DELETE/PATCH
            contentType: 'application/json'      
          };
          // var body = options.data;
          var body = (options.type == 'GET') ? options.data : data.model.toJSON();
          var request = {header: header, body: body};
          console.log('request', request);
          //post the request to webworker
          WebSocket_Support.socketWorker.postMessage({type: 'data', request: request});
        }          
      });
    });
  };
  
  // subclass [RequestMonitor] extends superclass [EventEmitter]
  util.inherits(RequestMonitor, EventEmitter);

  RequestMonitor.prototype.add = function(data) {
    if (!data) return;
    this.queue[data.uid] = data;
    if (this.socketState) {//socket is ready state then post the request
      data.status = 'sending';
      var options = data.options;
      var header = {
        uid: data.uid,
        url: options.url,
        operation: options.operation,
        responseOrigin: 'client',
        method: options.type, //GET/POST/DELETE/PATCH
        contentType: 'application/json'      
      };
      // var body = options.data;
      var body = (options.type == 'GET') ? options.data : data.model.toJSON();
      var request = {header: header, body: body};
      console.log('request', request);
      //post the request to webworker
      WebSocket_Support.socketWorker.postMessage({type: 'data', request: request}); 
    }
  };

  RequestMonitor.prototype.setSocketState = function(state) {
    this.socketState = state;
    if (state) {
      this.emit('rePostMsg');
    }    
  }

  //Handles WebSocket Responses
  ResponseMonitor = function() {
    var self = this;
    EventEmitter.call(this); //call super constructor EventEmitter.
    //store response
    this.queue = {};
    //register events
    this.on('receive', function(uid) {
      var response = self.queue[uid];
      var meta = WebSocket_Support.requestMonitor.queue[response.header.uid];
      //check the response, is it pull or push?
      if (response.header.hasOwnProperty('responseOrigin') && response.header.responseOrigin == 'client') {
        //call success/error callback based on responseType (if provided)
        if (response.header.responseType == 'success') {
          var success = meta.options.success;
          if (success) success.call(meta.options.context, response.body);
        } else {
          var error = meta.options.error;
          if (error) error.call(meta.options.context, response.body);
        }
        delete WebSocket_Support.requestMonitor.queue[response.header.uid];
      } else { //server push
          console.log('server push');
          if (response.header.hasOwnProperty('operation') && response.header.operation == 'regularTimer') {
            showRegularTimer(response.body);
          } else if (response.header.hasOwnProperty('operation') && response.header.operation == 'flashTimer') {
            showFlashTimer(response.body);
          }  
      }
      delete self.queue[response.header.uid];       
    });
    this.on('maxretry', function() {
      //Need to intimate the client that retry reaches max, HOW???
      console.log('Reached Max Retry to Open binaryClient');
       alert('connection does not created. please contact administrator.');
    })
  };
  // subclass [ResponseMonitor] extends superclass [EventEmitter]
  util.inherits(ResponseMonitor, EventEmitter);

  ResponseMonitor.prototype.add = function(response) {
    if (!response) return;
    console.log('response', response);
    if (response.hasOwnProperty('type') && response.type == 'MaxRetry') {
      //tell the client that Maxretry reaches
      this.emit('maxretry');
    } else {
      this.queue[response.header.uid] = response;
      this.emit('receive', response.header.uid);
    }
  };

  WebSocket_Support.initialize = function() {
    var protocol = (arguments[0]) ? arguments[0] : 'ws';
    var hostname = (arguments[1]) ? arguments[1] : 'localhost';
    var port = (arguments[2]) ? arguments[2] : '9000';
    var noOfRetry = (arguments[3]) ? arguments[3] : 3;
    var ws_url = protocol + '://' + hostname + ':' + port + '/websocket';
    //set websocket_support meta
    WebSocket_Support.ws_url = ws_url;
    WebSocket_Support.noOfRetry = noOfRetry;
    WebSocket_Support.retryAttempts = 0;
    //create SocketWebworker which handles actual sending & receiveing data
    WebSocket_Support.socketWorker = new SocketWorker(ws_url, noOfRetry);
    //create RequestMonitor & ResponseMonitor (It is a bridge between Framework & WebSocket)
    WebSocket_Support.requestMonitor  = new RequestMonitor();
    WebSocket_Support.responseMonitor = new ResponseMonitor();
    //extend Backbone with WebSocket_Support.send method
    //and it is called from Backbone.sync if developer set protocol='ws'
    if (Backbone) {
      Backbone.wsSend = WebSocket_Support.send;  
    };    
  };

  WebSocket_Support.send = function(model, options) {
    //get unique id for each model/collection (to be implemented)
    var uid = 'mnklj';
    //Add Request Data to RequestMonitor Queue
    //which is later handled by RequestMonitor.
    WebSocket_Support.requestMonitor.add({uid: 'mnklj', status: 'ready', model: model, options: options});
  };

  return WebSocket_Support;
});
