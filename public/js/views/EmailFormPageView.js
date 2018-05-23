var admin = admin || {};

admin.EmailFormPageView = Backbone.View.extend({

    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.emailId = options.id;
       this.template = options.template;
       var self = this;

        if(new String(this.mode).valueOf() == new String('create').valueOf()){
        
                self.render();

        }	

        else{

             var requestJson = JSON.stringify({"email_config_id":this.emailId});

             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_email_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   // alert("edit :: " + JSON.stringify(data));
                    self.emailData = data;
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
		'click  #save-email'  : 'saveemail',
		'click  #cancel'	: 'cancelCreateForm',
    'click  #app_email_code'  : 'codeFocus',
    'click  #server_name'  : 'nameFocus',
    'click  #port'  : 'portFocus',
    'click  #email'  : 'emailFocus',
    'click  #password'  : 'passFocus',
	},

    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			this.$el.html(this.template);
	    } 
        else { //edit
			  this.$el.html(this.template( this.emailData ));
		}   	      
		    return this;
	},

	saveemail:function(e){
		e.preventDefault();

      document.getElementById("server_name_error").innerHTML="";
      document.getElementById("port_error").innerHTML="";
      document.getElementById("email_error").innerHTML="";
      document.getElementById("password_error").innerHTML="";
      // var regex=/^[a-zA-Z-\s0-9]+$/;
      var regex1=/^[a-zA-Z-\:\.0-9]+$/;
      var regex2=/^[0-9]+$/;
       //var regex3=/^[a-zA-Z-\@0-9\.]+$/;
       // var regex4=/^[a-zA-Z-\@0-9]+$/;
         // if (!regex.test($('#app_email_code').val().trim())) {
         //  $('#app_email_code').focus();
         //  document.getElementById('app_email_code_error').innerHTML= "Please provide valid Code ";
         //  return false;
         // } 
          if ($('#server_name').val().trim() == '' ) {
        $('#server_name').focus();
        document.getElementById('server_name_error').innerHTML= "Please enter the Server Name";             
        return false;
         } 
         if (!regex1.test($('#server_name').val().trim())) {
          $('#server_name').focus();
          document.getElementById('server_name_error').innerHTML= "Please provide valid name ";
          return false;
         } 
         if ($('#port').val().trim() == '' ) {
        $('#port').focus();
        document.getElementById('port_error').innerHTML= "Please enter the Port";             
        return false;
         } 
         if (!regex2.test($('#port').val().trim())) {
          $('#port').focus();
          document.getElementById('port_error').innerHTML= "Please provide valid port ";
          return false;
         } 
         if ($('#email').val().trim() == '' ) {
        $('#email').focus();
        document.getElementById('email_error').innerHTML= "Please enter the Email";             
        return false;
         } 
        
        if( !validateEmail($('#email').val().trim())){
           document.getElementById('email_error').innerHTML= "Please provide valid email id";             
          return false;
        }
         if ($('#password').val().trim() == '' ) {
            $('#password').focus();
            document.getElementById('password_error').innerHTML= "Please enter the Password";             
            return false;
         } 
         // if (!regex4.test($('#password').val().trim())) {
         //  $('#password').focus();
         //  document.getElementById('password_error').innerHTML= "Please provide valid password ";
         //  return false;
         // } 

         

		 var emailFormData = {
                  "server_name"  : $('#server_name').val(),
                  "port" : $('#port').val(),
                  "email"  : $('#email').val(),
                  "password"  : $('#password').val(),
                  "status"  : true
           };
          
    if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
       
        emailFormData.email_config_id = parseInt($('#email_config_id').val(), 10);
        var requestData = JSON.stringify(emailFormData); 
        saveemail = "/eprayoga/admin/update_email";
        var successMsg = "Email Updated Successfully.";
        var failureMsg = "Error while updating the Email.Please Contact Administrator.";

    } 

      else {
        var requestData = JSON.stringify(emailFormData); 
        saveemail = "/eprayoga/admin/create_email";
        var successMsg = "Email Created Successfully.";
        var failureMsg = "Error while creating the Email.Please Contact Administrator.";

      }



         $.ajax({
          url     : saveemail,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
            appRouter.navigate("emaillist", {trigger: true});
            $( "div.success" ).html(successMsg);
            $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
          },
          error: function(data) {
              
            var errData = JSON.parse(data.responseText);

            if(errData.email){
             var nameMsg = JSON.stringify(errData.email[0]); 
             var nameerrormsg = nameMsg.replace(/\"/g, "");
             $( "#email_error").html(nameerrormsg);
            }
            else if(errData.server_name){
                          

               var failureMsg = JSON.stringify(errData.server_name[0]); 
               var errmsgshow = failureMsg.replace(/\"/g, "");
               $( "#server_name_error").html("The server name has already been taken.");
            }else{
              
            errorhandle(data);
            }
             
          } 
        }); 

	},

	cancelCreateForm:function(e){
		   e.preventDefault();
       appRouter.navigate("emaillist", {trigger: true});  
	},
  codeFocus:function()
  {
        $('#app_email_code_error').html("");
  },
  nameFocus:function()
  {
        $('#server_name_error').html("");
  },
portFocus:function()
  {
        $('#port_error').html("");
  },
emailFocus:function()
  {
        $('#email_error').html("");
  },
passFocus:function()
  {
        $('#password_error').html("");
  }

});
