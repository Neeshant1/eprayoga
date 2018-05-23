var admin = admin || {};

admin.ExammainView = Backbone.View.extend({
    template: $( '#ExamPageTpl' ).html(),
	initialize: function() {
		this.render(); 

	},
	render: function() {
	   			
	    this.$el.html(this.template);
	    this.examView = new admin.ExamView({el: $( '#Questions_list')});
	    this.counter();
		return this;
	},

	counter: function(){
		//For start the timer
	   
	    var fiveMinutes = 60 * 1,
	    display = $('#time');
	    this.startTimer(fiveMinutes, display);
	    this.frequencier();
	},


	startTimer:function (duration, display) {

	    var timer = duration, minutes, seconds;
	    Xe=setInterval(function () {
        minutes = parseInt(timer / 60, 10)
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.text(minutes + ":" + seconds);

        if (--timer < 0) {

            //timer = duration;
            clearInterval(Xe);
            display.text("TIME OUT");

        }
        // ws2='<<"Message for testing">>';
        // ws.send(ws2);
        ws.onmessage = function (evt)
    {
        var received_msg = evt.data;
        timed= minutes +':' + seconds;
        var txt = document.createTextNode("Got from server: " + received_msg, "Remaining time:", timed);
        //document.getElementById('alert_messages').appendChild(txt);
        $('#alert_messages').html(txt);

    };
    }, 1000);
    },

    frequencier: function(){
      if (!("WebSocket" in window)) {
        alert("WebSocket NOT supported by your Browser!");
        return;
    }

   
    ws = new WebSocket("ws://localhost:2938/websocket");
    ws.onopen = function() {
        console.log('connected');
        exam2='<<"somedata">>';
        ws.send(1);
    };
    ws.onmessage = function (evt)
    {
        var received_msg = evt.data;
        var txt = document.createTextNode("Got from server: " + received_msg);
        //document.getElementById('alert_messages').appendChild(txt);
        $('#alert_messages').html(txt);

    };
    ws.onclose = function()
    {
        // websocket is closed.
    };


    }

});
