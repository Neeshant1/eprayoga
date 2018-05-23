var admin = admin || {};

admin.LanguageFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.languageId = options.id;
       this.template = options.template;
       var self = this;
      
        if(new String(this.mode).valueOf() == new String('create').valueOf()){
                     this.render();
        }	

        else{

             var requestJson = JSON.stringify({"language_id":this.languageId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_language_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
               // alert(JSON.stringify(data));
                    self.languageData = data;
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
		'click  #save_language'  : 'saveLanguage',
		'click  #cancel_language'	: 'cancelCreateForm',
    'click  #language_name'   : 'nameFocus',
    'click  #language_short_name' : 'shortNameFocus'
    
	},

    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			 
			this.$el.html(this.template);
     this.$el.append(this.template1);
	    } 
        else { //edit
			  this.$el.html(this.template( this.languageData ));
        this.$el.append(this.template1);
			 
		}   	      
		    return this;
	},

	saveLanguage:function(e){
    var self = this;
		e.preventDefault();

        document.getElementById("language_name_error").innerHTML="";
        document.getElementById("language_short_name_error").innerHTML="";

        var  regex=/^[a-zA-Z\s]+$/;
        var  regex1=/^[a-zA-Z]+$/;


        if ($('#language_name').val().trim() == '') {
        $('#language_name').focus();
        document.getElementById('language_name_error').innerHTML= "Please enter the language name";            
        return false;
         }

        if (!regex.test($('#language_name').val().trim())) {
          $('#language_name').focus();
          document.getElementById('language_name_error').innerHTML= "Please provide valid name ";
          return false;
        } 

        if ($('#language_short_name').val().trim() == '') {
        $('#language_short_name').focus();
        document.getElementById('language_short_name_error').innerHTML= "Please enter the short name";            
        return false;
         }

        if (!regex1.test($('#language_short_name').val().trim())) {
          $('#language_short_name').focus();
          document.getElementById('language_short_name_error').innerHTML= "Please provide valid name ";
          return false;
         } 


           var languageFormData = {
                  "language"  : $('#language_name').val(),
                  "language_short_name"  : $('#language_short_name').val()
           };
               

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            languageFormData.language_id = parseInt($('#language_id').val(), 10);
           var requestData = JSON.stringify(languageFormData); 
            savelanguage = "/eprayoga/admin/update_language";
            var successMsg = "Language Updated Successfully.";
            var failureMsg = "Error while updating the Language. Contact Administrator.";
      } 
      else {

            var requestData = JSON.stringify(languageFormData); 
           // alert(requestData);
            savelanguage = "/eprayoga/admin/create_language";
            var successMsg = "Language Created Successfully.";
            var failureMsg = "Error while creating the Language. Contact Administrator.";
      }

        $('#save_language').attr('disabled','disabled');
        $.ajax({
          url     :savelanguage,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
           
            $('#save_language').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          },
          error: function(data) {
            $('#save_language').removeAttr('disabled');
           
            var errData = JSON.parse(data.responseText);

            if(errData.language){

             var nameMsg = JSON.stringify(errData.language[0]); 
             var nameerrormsg = nameMsg.replace(/\"/g, "");
             $( "#language_name_error").html(nameerrormsg);
            }
            else if(errData.language_short_name){
            

             var nameMsg = JSON.stringify(errData.language_short_name[0]); 
             var nameerrormsg = nameMsg.replace(/\"/g, "");
             $( "#language_short_name_error").html(nameerrormsg);
            }else{
            errorhandle(data);
            }
          } 
        }); 

	},
 
 routepopup: function(){
    $('.modal-backdrop').remove(); 
   
     appRouter.navigate("languageList", {trigger: true});

  },

    cancelCreateForm:function(e){
       e.preventDefault();
           appRouter.navigate("languageList", {trigger: true});  
  },
  nameFocus:function()
  {
    $("#language_name_error").html("");
  },

  shortNameFocus: function(){
      $('#language_short_name_error').html("");
  }



});
