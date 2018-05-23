var admin = admin || {};

admin.ComplexityQuestionFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.comQusId = options.id;
       this.template = options.template;
       var self = this;
      
        if(new String(this.mode).valueOf() == new String('create').valueOf()){

                this.render();
        }	

        else{

             var requestJson = JSON.stringify({"difficulty_level_id":this.comQusId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_question_complexity_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
              
                    self.comQusData = data;
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
		'click  #saveComQuestion'  : 'saveComplexityQuestion',
		'click  #cancelCq'	: 'cancelCreateForm',
    'click  #cq_level'        : 'levelFocus',
    //'click  #cq_description'   : 'descriptionFocus'


	},

    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			this.$el.html(this.template);
      this.$el.append(this.template1);
	    } 
        else { //edit
			  this.$el.html(this.template( this.comQusData ));
        this.$el.append(this.template1);
		}   	      
		    return this;
	},

	saveComplexityQuestion:function(e){
		e.preventDefault();
    var self =this;
        // document.getElementById("cq_level_code_error").innerHTML="";
     document.getElementById("cq_level_error").innerHTML="";


         // var  regex=/^[a-zA-Z\s\-0-9]+$/;
        var  regex1=/^[a-zA-Z\s]+$/;

        if ($('#cq_level').val().trim() == '') {
        $('#cq_level').focus();
     //   $('#city_full_name').attr('style', 'border-bottom:2px solid #FF0000;');
        document.getElementById('cq_level_error').innerHTML= "Please enter the Complexity level";            
        return false;
        }
  
      // if (!regex1.test($('#cq_level').val().trim())) {
      //     $('#cq_level').focus();
      //     document.getElementById('cq_level_error').innerHTML= "Please provide valid type";
      //     return false;
      //    } 

		 var comsQusFormData = {
            "difficulty_level_name"  : $('#cq_level').val(),
                  
    };

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            comsQusFormData.difficulty_level_id = parseInt($('#complexity_qus_id').val(), 10);
           
           var requestData = JSON.stringify(comsQusFormData); 
            savecomqus = "/eprayoga/admin/update_question_complexity";
            var successMsg = "Complexity Question has been Updated Successfully.";
            var failureMsg = "Error while updating the Complexity Question .Please Contact Administrator.";
      } 
      else {

            var requestData = JSON.stringify(comsQusFormData); 
           // alert(requestData);
            savecomqus = "/eprayoga/admin/create_question_complexity";
            var successMsg = "Complexity Question has been Created Successfully.";
            var failureMsg = "Error while creating the Complexity Question .Please Contact Administrator.";
      }

          $('#saveComQuestion').attr('disabled','disabled');
          $.ajax({
          url     :savecomqus,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
            $('#saveComQuestion').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);

          },
          error: function(data) {
            $('#saveComQuestion').removeAttr('disabled');
                   var errData = JSON.parse(data.responseText);

                          if(errData.difficulty_level_name){
                          

                           var failureMsg = JSON.stringify(errData.difficulty_level_name[0]); 
                           var errmsgshow = failureMsg.replace(/\"/g, "");
                           $( "#cq_level_error").html("The Complexity Question has already been taken");
                          }else{
                            errorhandle(data);
                            }
                 } 
        }); 

	},
  routepopup: function(){
    $('.modal-backdrop').remove(); 
   
  appRouter.navigate("complexityquestionpage", {trigger: true});

  },

	cancelCreateForm:function(e){
		   e.preventDefault();
       appRouter.navigate("complexityquestionpage", {trigger: true});  
	},
 
  levelFocus:function()
  {
        $('#cq_level_error').html("");
    
  },
  // descriptionFocus:function()
  // {
  //       $('#cq_descriptionerror').html("");
    
  // }
});
