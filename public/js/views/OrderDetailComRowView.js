var user = user || {};

user.OrderDetailComRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'completedexamcart',
	  template: $( '#comexamCartTemplate' ).html(),
    template1: $( '#popupscript' ).html(),
    initialize: function() {

        this.firstRender = true;
        this.activeId = -1;
        this.recIndex = 0;
    	// _.bindAll(this, "render");
     //    this.model.bind('change', this.render);
	},

    events: {
        'click .result': 'result',
        

    },


	render: function() {
    $('.popover-content').hide();
		var tmpl = _.template( this.template );
    var tmpl1 = _.template( this.template1 );

		this.$el.html( tmpl( this.model.toJSON() ) );
    this.$el.append( tmpl1( this.model.toJSON() ) );



		return this;
	},
    
    result : function(e){
      var self =this ;
    $('html,body').scrollTop(0);
    examScheduleID =  $(e.target).attr('id');
   
    $.ajax({
      url: '/eprayoga/user/get_exam_result',
      type: 'POST',
      contentType:'application/json',
      data:JSON.stringify(examScheduleID),
      cache:false,
      success: function(data) {
       
        userRouter.scoreCardData = data[0];   
        $('#page-section').empty();
        $('#page-section').unbind();
        var template = _.template($('#examScoreCard').html() );
        var template1 = _.template($('#popupscript').html() );

        $('#page-section').append(template(data[0]));  
        $('#page-section').append(template1);  
        $('#backExam').on('click', function(e){
         
           Backbone.history.loadUrl(Backbone.history.fragment);
        }); 
         $('#ScoreIdOne').on('click', self.score);
         $('#mailOne').bind('click', self.mail);  
      },
      error: function(data) {
        errorhandle(data);
        
      }
    });   
  },

  score : function(){
   
    $.ajax({
      url: '/eprayoga/user/downscorecard',
      type: 'POST',
      contentType:'application/json',
      data:JSON.stringify(userRouter.scoreCardData),
      cache:false,
      success: function(data) {
          
       
         
      var link = document.createElement('a');
      link.href = data;
      link.download = 'eprayoga.pdf';
      link.dispatchEvent(new MouseEvent('click'));                 
            
      },
      error: function(data) {
        errorhandle(data);
        
      }
    });   
  },

  mail : function(){
   
    $.ajax({
      url: '/eprayoga/user/sendingmail',
      type: 'POST',
      contentType:'application/json',
      data:JSON.stringify(userRouter.scoreCardData),
      cache:false,
      success: function(data) {
        
        var dat = data;
        var sendmail = new admin.SendingMailModel();
        sendmail.save({
             data:{ email:dat},

        },
          { 
                url: 'dummyurl',
                protocol: 'ws',
                operation: 'sendMail',
                wait: true
          });
         
          $('#messagepop').text("You will get certificate soon."); 
          $('#myModalCust').modal('show');
                
            
      },
      error: function(data) {
        errorhandle(data);
        
      }
    });   
  },

  backExam : function() {
   
  }
    

   

});