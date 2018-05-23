var user = user || {};

user.UserConfirmationPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
initialize: function(options) {
      this.$el.html(options.template);  
      // _.bindAll(this, "SubmitExam");
      this.render();
     
  },
  event:{
  	// 'click #submitExam': 'SubmitExam',
    //'click #mail' : 'mail'
    
  },

  render:function(){
  var self = this;
  this.$el.append(this.template1);
 var orderdetail = user.orderdetail;
 userRouter.ordDetail = user.orderdetail;
    $.ajax({
      url: '/eprayoga/user/get_exam_result',
      type: 'POST',
      contentType:'application/json',
      data:JSON.stringify(orderdetail.attributes.exam_schedule_id),
      cache:false,
      success: function(data) {
        userRouter.scoreCardData = data[0];
        self.scoreData = data[0];
        $('#mail').bind('click', self.mail);
        $('#home').bind('click', self.home);
        $('#scoreId').bind('click', self.score);
        if(self.scoreData.result == "fail"){
          $('#pass').hide();
        } else {
          $('#fail').hide();
        }
      $('#examName').html(self.scoreData.exam_name);
     $('#total_ques').html(self.scoreData.no_of_questions);
     $('#Unanswered_qus').html(self.scoreData.no_of_questions_blank);
     $('#Reviewed_qus').html(userRouter.totalReviewed);
     $('#answered_qus').html(self.scoreData.totalAnswered);
     $('#correctAns').html(self.scoreData.no_of_questions_right);
     $('#score').html(self.scoreData.marks_scored +" / " + self.scoreData.total_marks);
     $('#answered_qus').html(userRouter.totalAnswered);
      $('#date').html(moment().format('D MMM, YYYY'));
     
    
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
           $('#messagepop').text("You will get certificate soon"); 
           $('#myModalCust').modal('show');
                
            
      },
      error: function(data) {
        errorhandle(data);

        
      }
    });   
  },

  score : function(){
    var self = this;
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

  home : function(){
   
    if( userRouter.ordDetail.attributes.mode == 0){
        userRouter.navigate("examCatalog", {trigger: true});
      } 
      if(userRouter.ordDetail.attributes.mode == 1){
        userRouter.navigate("examCart", {trigger: true});
      }
  }


});