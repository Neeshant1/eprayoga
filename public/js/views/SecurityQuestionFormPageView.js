var admin = admin || {};

admin.SecurityQuestionFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.sqId = options.id;
       this.template = options.template;
       var self = this;
        if(new String(this.mode).valueOf() == new String('create').valueOf()){
              this.render();
        }	

        else{

             var requestJson = JSON.stringify({"question_id":this.sqId});
             $.when(
              $.ajax({

              url: "/eprayoga/admin/get_security_questions_by_id",

                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
               // alert(JSON.stringify(data));
                    self.sqData = data;
                  },
                  error: function(data) {

                    errorhandle(data);
         
                  }
                })
                ).done(function(){
                    self.render();

                })
        }
      // this.render();
     },

    events: {
		'click  #createSq'  : 'saveSq',
		'click  #cancelSq'	: 'cancelSqForm',
   'click  #sq_code'  : 'codeFocus',
    'click  #sq_questions'  : 'questionsFocus',
	},

    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			this.$el.html(this.template);
      this.$el.append(this.template1);
	    } 
        else { //edit
			  this.$el.html(this.template( this.sqData ));
        this.$el.append(this.template1);
		}   	      
		    return this;
	},

	saveSq:function(e){
		e.preventDefault();
    var self = this;

      //document.getElementById("sq_code_error").innerHTML="";
      document.getElementById("sq_questions_error").innerHTML="";
      //var regex=/^[a-zA-Z-\s0-9]+$/;
       // var regex1=/^[a-zA-Z-\s]+$/;
        
          if ($('#sq_questions').val().trim() == '' ) {
        $('#sq_questions').focus();
        document.getElementById('sq_questions_error').innerHTML= "Please enter the SecurityQuestion. ";             
        return false;
         } 
         // if (!regex1.test($('#sq_questions').val().trim())) {
         //  $('#sq_questions').focus();
         //  document.getElementById('sq_questions_error').innerHTML= "Please provide valid question ";
         //  return false;
         // } 
		 var sqFormData = {
                  //"security_question_code": $('#sq_code').val(),
                  "question_name"  : $('#sq_questions').val()
     };
                                            

        // var requestData = JSON.stringify(faqFormData);

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            sqFormData.question_id = parseInt($('#security_question_id').val(), 10);


           var requestData = JSON.stringify(sqFormData); 
            savesq = "/eprayoga/admin/update_security_questions";
            var successMsg = "Security question Updated Successfully.";
            var failureMsg = "Error while updating the security question. Contact Administrator.";
      } 
      else {

            var requestData = JSON.stringify(sqFormData); 
            savesq = "/eprayoga/admin/create_security_questions";
            var successMsg = "Security Question Created Successfully.";
            var failureMsg = "Error while creating the security question. Contact Administrator.";
      
            
      }   

          $('#createSq').attr('disabled','disabled');
          $.ajax({
          url     :savesq,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
           
            $('#createSq').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          },



          error: function(data) {
          

                    $('#createSq').removeAttr('disabled');
                    var errData = JSON.parse(data.responseText);

                          if(errData.question_name){

                           var failureMsg = JSON.stringify(errData.question_name[0]); 
                           var errmsgshow = failureMsg.replace(/\"/g, "");
                           $( "#sq_questions_error").html("The Question name has already been taken.");

                          

                        }else{
                          errorhandle(data);
                          }

                       
                          

                 } 
        }); 

	},
    routepopup: function(){
    $('.modal-backdrop').remove(); 
    appRouter.navigate("securityquestionpage", {trigger: true});

  },

	cancelSqForm:function(e){
		   e.preventDefault();
        appRouter.navigate("securityquestionpage", {trigger: true});  
	},
  codeFocus:function()
  {
        $('#sq_code_error').html("");
  },
  questionsFocus:function()
  {
        $('#sq_questions_error').html("");
	}



});
