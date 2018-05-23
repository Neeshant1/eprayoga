var admin = admin || {};

admin.QuestionTypeFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.qTypeId = options.id;
       this.template = options.template;
       var self = this;
        if(new String(this.mode).valueOf() == new String('create').valueOf()){
              this.render();
        }	

        else{

             var requestJson = JSON.stringify({"question_type_id":this.qTypeId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_question_type_by_id",
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
		'click  #create_qtype'  : 'saveQusType',
		'click  #cancel_qType'	: 'cancelQusType',

    'click  #qTypeQuestion'  : 'questionFocus',

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

	saveQusType:function(e){
		e.preventDefault();
    var self = this;


    document.getElementById("qTypeQuestion_error").innerHTML="";

     //var  regex=/^[a-zA-Z\s]+$/;
       
     if ($('#qTypeQuestion').val().trim() == '') {
        $('#qTypeQuestion').focus();
     //   $('#city_full_name').attr('style', 'border-bottom:2px solid #FF0000;');
        document.getElementById('qTypeQuestion_error').innerHTML= "Please enter the Question Type.";            
        return false;
     }

      

		 var queTypeFormData = {
           "question_type_name"  : $('#qTypeQuestion').val()
      };
                                              

          // alert("edit faq data" + JSON.stringify(queTypeFormData));

        // var requestData = JSON.stringify(faqFormData);

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            queTypeFormData.question_type_id = parseInt($('#question_type_id').val(), 10);
           var requestData = JSON.stringify(queTypeFormData); 
            savequstype = "/eprayoga/admin/update_question_type";
            var successMsg = " Question type Updated Successfully.";
            var failureMsg = "Error while updating the  question type. Contact Administrator.";
      } 
      else {

            var requestData = JSON.stringify(queTypeFormData); 
            //alert(requestData);
            savequstype = "/eprayoga/admin/create_question_type";
            var successMsg = " Question Type Created Successfully.";
            var failureMsg = "Error while creating the question type.  Contact Administrator.";
      }

          $('#create_qtype').attr('disabled','disabled');
          $.ajax({
          url     :savequstype,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
           
            $('#create_qtype').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          },
          error: function(data) {
            $('#create_qtype').removeAttr('disabled');
          	var errData = JSON.parse(data.responseText);

                          if(errData.question_type_name){

                           var failureMsg = JSON.stringify(errData.question_type_name[0]); 
                           var errmsgshow = failureMsg.replace(/\"/g, "");
                           $( "#qTypeQuestion_error").html("The Question Type name has already been taken");
                          }else{
                          errorhandle(data);
                          }
                 } 
        }); 

	},
  routepopup: function(){
    $('.modal-backdrop').remove(); 
    appRouter.navigate("questiontypepage", {trigger: true});

  },

	cancelQusType:function(e){
		   e.preventDefault();
           appRouter.navigate("questiontypepage", {trigger: true});  
	},

  questionFocus:function()
  {
        $('#qTypeQuestion_error').html("");
    
  },




});
