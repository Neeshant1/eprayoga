var admin = admin || {};

admin.SmsFormPageView = Backbone.View.extend({

    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.smsId = options.id;
       this.template = options.template;
       var self = this;
        if(new String(this.mode).valueOf() == new String('create').valueOf()){         
                self.render();
        }	

        else{
             var requestJson = JSON.stringify({"sms_config_id":this.smsId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_sms_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
              cache:false,
                  success: function(data) {
                   // alert("edit :: " + JSON.stringify(data));
                    self.smsData = data;
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
		'click  #save-sms'  : 'savesms',
		'click  #cancel'	: 'cancelCreateForm',
    'click  #app_sms_code'  : 'codeFocus',
    'click  #app_sms_gateway_name'  : 'nameFocus',
    'click  #app_sms_gateway_url'  : 'urlFocus',
    'click  #app_sms_user_id'  : 'idFocus',
    'click  #app_sms_user_password'  : 'passFocus',
    'click  #app_sms_registered_phone_number'  : 'numberFocus',
    'click  #app_sms_gateway_authentication_tocken'  : 'tockenFocus',
    'click  #app_sms_gateway_api_id'  : 'apiidFocus',
	},

    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			this.$el.html(this.template);
	    } 
        else { //edit
			  this.$el.html(this.template( this.smsData ));
		}   	      
		    return this;
	},

	savesms:function(e){
		e.preventDefault();

      document.getElementById("app_sms_gateway_name_error").innerHTML="";
      document.getElementById("app_sms_gateway_url_error").innerHTML="";
      document.getElementById("app_sms_user_id_error").innerHTML="";
      document.getElementById("app_sms_user_password_error").innerHTML="";
      document.getElementById("app_sms_registered_phone_number_error").innerHTML="";
      document.getElementById("app_sms_gateway_authentication_tocken_error").innerHTML="";
      document.getElementById("app_sms_gateway_api_id_error").innerHTML="";

      // var regex=/^[a-zA-Z-\s0-9]+$/;
         //var  regex1=/^[a-zA-Z\s]+$/;
       // var regex2=/^[a-zA-Z-\:\.0-9]+$/;
         var regex3=/^[a-zA-Z-\s0-9]+$/;
        //var regex4=/^[a-zA-Z-\@0-9]+$/;
       // var regex6=/^[a-zA-Z-\s0-9]+$/;
      //  var regex7=/^[a-zA-Z0-9]+$/;
          
         // if (!regex.test($('#app_sms_code').val().trim())) {
         //  $('#app_sms_code').focus();
         //  document.getElementById('app_sms_code_error').innerHTML= "Please provide valid Code ";
         //  return false;
         // } 
        if ($('#app_sms_gateway_name').val().trim() == '' ) {
        $('#app_sms_gateway_name').focus();
        document.getElementById('app_sms_gateway_name_error').innerHTML= "Please enter the Sms Name";             
        return false;
         } 
       // if (!regex1.test($('#app_sms_gateway_name').val().trim())) {
       //    $('#app_sms_gateway_name').focus();
       //    document.getElementById('app_sms_gateway_name_error').innerHTML= "Please provide valid Name ";
       //    return false;
       //   } 
         if ($('#app_sms_gateway_url').val().trim() == '' ) {
        $('#app_sms_gateway_url').focus();
        document.getElementById('app_sms_gateway_url_error').innerHTML= "Please enter the Sms Url";             
        return false;
         } 
         // if (!regex2.test($('#app_sms_gateway_url').val().trim())) {
         //  $('#app_sms_gateway_url').focus();
         //  document.getElementById('app_sms_gateway_url_error').innerHTML= "Please provide valid url ";
         //  return false;
         // } 
          if ($('#app_sms_user_id').val().trim() == '' ) {
        $('#app_sms_user_id').focus();
        document.getElementById('app_sms_user_id_error').innerHTML= "Please enter the Sms User id";             
        return false;
         } 
         if (!regex3.test($('#app_sms_user_id').val().trim())) {
          $('#app_sms_user_id').focus();
          document.getElementById('app_sms_user_id_error').innerHTML= "Please provide valid id ";
          return false;
         } 
         if ($('#app_sms_user_password').val().trim() == '' ) {
            $('#app_sms_user_password').focus();
            document.getElementById('app_sms_user_password_error').innerHTML= "Please enter the Sms Password";             
            return false;
         } 
         // if (!regex4.test($('#app_sms_user_password').val().trim())) {
         //  $('#app_sms_user_password').focus();
         //  document.getElementById('app_sms_user_password_error').innerHTML= "Please provide valid password ";
         //  return false;
         // } 
         if ($('#app_sms_registered_phone_number').val().trim() == '' ) {
          $('#app_sms_registered_phone_number').focus();
          document.getElementById('app_sms_registered_phone_number_error').innerHTML= "Please enter the Sms Phone Number";             
          return false;
         } 
           if( !validateMobile($('#app_sms_registered_phone_number').val().trim())){
         document.getElementById('app_sms_registered_phone_number_error').innerHTML= "Please provide valid number";             
        return false;
      }
        if ($('#app_sms_gateway_authentication_tocken').val().trim() == '' ) {
          $('#app_sms_gateway_authentication_tocken').focus();
          document.getElementById('app_sms_gateway_authentication_tocken_error').innerHTML= "Please enter the Sms Auth Tocken";             
          return false;
         } 
         // if (!regex6.test($('#app_sms_gateway_authentication_tocken').val().trim())) {
         //  $('#app_sms_gateway_authentication_tocken').focus();
         //  document.getElementById('app_sms_gateway_authentication_tocken_error').innerHTML= "Please provide valid auth tocken ";
         //  return false;
         // } 
        if ($('#app_sms_gateway_api_id').val().trim() == '' ) {
          $('#app_sms_gateway_api_id').focus();
          document.getElementById('app_sms_gateway_api_id_error').innerHTML= "Please enter the Sms Id";             
          return false;
         } 
         // if (!regex7.test($('#app_sms_gateway_api_id').val().trim())) {
         //  $('#app_sms_gateway_api_id').focus();
         //  document.getElementById('app_sms_gateway_api_id_error').innerHTML= "Please provide valid ";
         //  return false;
         // }

         
		 var smsFormData = {
                  "app_sms_gateway_name"  : $('#app_sms_gateway_name').val(),
                  "app_sms_gateway_url" : $('#app_sms_gateway_url').val(),
                  "app_sms_user_id"  : $('#app_sms_user_id').val(),
                  "app_sms_user_password"  : $('#app_sms_user_password').val(),
                  "app_sms_registered_phone_number" : $('#app_sms_registered_phone_number').val(),
                  "app_sms_gateway_authentication_tocken" : $('#app_sms_gateway_authentication_tocken').val(),
                  "app_sms_gateway_api_id" : $('#app_sms_gateway_api_id').val(),
                  "app_sms_gateway_status" : true,
                  "genp_active"  : 1
      };
    if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
        smsFormData.sms_config_id = parseInt($('#sms_config_id').val(), 10);
        var requestData = JSON.stringify(smsFormData); 
        savesms = "/eprayoga/admin/update_sms";
        var successMsg = "sms Updated Successfully.";
        var failureMsg = "Error while updating the sms. Contact Administrator.";

    } 

      else {
        var requestData = JSON.stringify(smsFormData); 
        savesms = "/eprayoga/admin/create_sms";
        var successMsg = "Sms Created Successfully.";
        var failureMsg = "Error while creating the Sms. Contact Administrator.";

      }

      $.ajax({
          url     : savesms,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {

            appRouter.navigate("smslist", {trigger: true});
            $( "div.success" ).html(successMsg);
            $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
          },
          error: function(data) {
errorhandle(data);


            var errData = JSON.parse(data.responseText);

                          if(errData.app_sms_gateway_name){

                           var failureMsg = JSON.stringify(errData.app_sms_gateway_name[0]); 
                           var errmsgshow = failureMsg.replace(/\"/g, "");
                           $( "#app_sms_gateway_name_error").html("The gateway name has already been taken");
                          }
                          else if(errData.app_sms_user_id){

                           var failureMsg = JSON.stringify(errData.app_sms_user_id[0]); 
                           var errmsgshow = failureMsg.replace(/\"/g, "");
                           $( "#app_sms_user_id_error").html("The User Id has already been taken");
                          }else{
                        errorhandle(data);
                        }
          	
                 } 
        }); 

	},

	cancelCreateForm:function(e){
		   e.preventDefault();
       appRouter.navigate("smslist", {trigger: true});  
	},
  codeFocus:function()
  {
        $('#app_sms_code_error').html("");
  },
  nameFocus:function()
  {
        $('#app_sms_gateway_name_error').html("");
  },
urlFocus:function()
  {
        $('#app_sms_gateway_url_error').html("");
  },
idFocus:function()
  {
        $('#app_sms_user_id_error').html("");
  },
passFocus:function()
  {
        $('#app_sms_user_password_error').html("");
  },
numberFocus:function()
  {
        $('#app_sms_registered_phone_number_error').html("");
  },
tockenFocus:function()
  {
        $('#app_sms_gateway_authentication_tocken_error').html("");
  },
apiidFocus:function()
  {
        $('#app_sms_gateway_api_id_error').html("");
	}


});
