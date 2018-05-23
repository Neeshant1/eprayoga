//websocket_support, Copyright(c) 2017 Vahai Technologies <product-team@vahaitech.com>
importScripts('binary.js');

var WORKER_GLOBAL = {};

onmessage	 = function(e) {
	var data = e.data;
	if (data.hasOwnProperty('type') && data.type == 'wsmeta') {
		//Initialize the meta
		WORKER_GLOBAL.ws_url 				= data.ws_url;
		WORKER_GLOBAL.noOfRetry 		= data.noOfRetry;
		WORKER_GLOBAL.retryAttempts	= 0;
		//create & setup BinaryClient
		_setupBinaryClient();   
	} else if (data.hasOwnProperty('type') && data.type == 'data') {
		console.log(JSON.stringify(data.request));
    console.log(data.request);
    //sent the request to server
		WORKER_GLOBAL.binaryClient.send({}, JSON.stringify(data.request));
    // WORKER_GLOBAL.binaryClient.send({}, data.request);
	} else { //this block never reach
		console.log('DONE');
	}
};

_setupBinaryClient = function() {
	//Create & Initiate BinaryClient
	WORKER_GLOBAL.binaryClient  = new BinaryClient(WORKER_GLOBAL.ws_url);
	//register events on binary client
  WORKER_GLOBAL.binaryClient.on('open', function() {
    console.log('Socket is Opened.');
    //Reset retry attempts to 0
    WORKER_GLOBAL.retryAttempts	= 0;
    //intimate the parent that socket is ready
    postMessage({'type': 1});
  });

  //listen for server push/response, since it is asynchronous
  WORKER_GLOBAL.binaryClient.on('stream', function(stream, response) {
    // var resp = response + '}}'; // response end is missing }}, need to look the unpack
    // console.log('response', response);
    // console.log("postMessage Json checking", JSON.parse(response));
    postMessage(JSON.parse(response));
    // postMessage(response);
  });

  //handle errors thrown by binary client
  WORKER_GLOBAL.binaryClient.on('error', function(error) {
    console.log('Socket Error.', error);
    //intimate the parent that socket throws an error
    postMessage({'type': 0});
    //Recreate & Initiate BinaryClient again
    if (WORKER_GLOBAL.retryAttempts < WORKER_GLOBAL.noOfRetry) {
    	WORKER_GLOBAL.retryAttempts += 1;
    	console.log('Retrying to connect. Attemptes: ', WORKER_GLOBAL.retryAttempts);
    	_setupBinaryClient();
    } else {
    	//Initimate parent that no of retry attempts reached the max & did not work.
    	postMessage({'type': 2});
    }    
  });	
}
