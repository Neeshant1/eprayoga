var admin = admin || {};

admin.GenpFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
       this.mode = options.mode;
       this.genpId = options.id;
       this.template = options.template;
       var self = this;
      
        $('#datetimepicker1').datetimepicker();
        if(new String(this.mode).valueOf() == new String('create').valueOf()){

              $.when(
              $.ajax({
              url: "/eprayoga/admin/get_currency",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   

                     self.currencydata = data;
                  },
                  error: function(data) {
                   errorhandle(data);
                         
                  }
                }),
                $.ajax({
                url: "/eprayoga/admin/select_language",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   

                     self.languagedata = data;
                  },
                  error: function(data) {
                    errorhandle(data);
                         
                  }
                })
                ).done(function(){
                self.render();
                self.currencyCollectionView = new admin.MgmtCurrencyCollectionView({
                     el: $( '#genp_app_currency' ),
                    currencyCollection: self.currencydata
                 });
                self.languageCollectionView = new admin.MgmtLanguageCollectionView({
                     el: $( '#genp_app_default_language' ),
                    languageCollection: self.languagedata
                 });
                });
        }	

        else{

             var requestJson = JSON.stringify({"generic_param_id":this.genpId});

             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_genp_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                    self.genpData = data;
                  },
                  error: function(data) {
                  errorhandle(data);
                    
                  }
                }),
               $.ajax({
              url: "/eprayoga/admin/get_currency",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   
                     self.currencydata = data;
                  },
                  error: function(data) {
                    errorhandle(data);
                         
                  }
                }),
                $.ajax({
                url: "/eprayoga/admin/select_language",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                 
                     self.languagedata = data;
                  },
                  error: function(data) {
                    errorhandle(data);
                         
                  }
                })
                ).done(function(){
                    self.render();
                    self.currencyCollectionView = new admin.MgmtCurrencyCollectionView({
                        el: $( '#genp_app_currency' ),
                        currencyCollection: self.currencydata
                    });
                    self.languageCollectionView = new admin.MgmtLanguageCollectionView({
                       el: $( '#genp_app_default_language' ),
                       languageCollection: self.languagedata
                    });
                    
                     $('#genp_type').val(self.genpData.genp_type);
                     $('#genp_app_currency').val(self.genpData.genp_app_currency);
                     $('#genp_app_default_language').val(self.genpData.genp_app_default_language);
                     $('#genp_app_date_format').val(self.genpData.genp_app_date_format);
                     
                });
        }

     },

    events: {
		'click  #genp_create'  : 'saveGenp',
		'click  #genp_cancel'	: 'cancelCreateForm',
    'click  #genp_type'  : 'typeFocus',
    'click  #genp_desc'  : 'descFocus',
    'click  #genp_app_timezone' : 'timeFocus',
    'click #genp_app_date_format' : 'dateFocus',
    'click  #genp_app_currency': 'currFocus',
    'click  #genp_app_default_language':'langFocus',
    'click  #genp_app_out_going_email_add': 'emailFocus'
	},

    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			this.$el.html(this.template);
      this.$el.append(this.template1);
	    } 
        else { //edit
			  this.$el.html(this.template( this.genpData ));
        this.$el.append(this.template1);
		}   	  
      $('#genp_app_date_format').datetimepicker();    
		    return this;
	},

	saveGenp:function(e){
    var self = this;
		e.preventDefault();

        var regex=/^[a-zA-Z-\s]+$/;
        var regex1=/^Z| +UTC|[+,-]([01]\d|2[0-4])(:?[0-5]\d)?$/;


        document.getElementById("genp_type_error").innerHTML="";
         document.getElementById("genp_desc_error").innerHTML="";
         document.getElementById("genp_app_timezone_error").innerHTML="";
         document.getElementById("genp_app_date_format_error").innerHTML="";
         document.getElementById("genp_app_currency_error").innerHTML="";
         document.getElementById("genp_app_default_language_error").innerHTML="";
         document.getElementById("genp_app_out_going_email_add_error").innerHTML="";
         
        if ($('#genp_type').val().trim() == '' ) {
          $('#genp_type').focus();
          document.getElementById('genp_type_error').innerHTML= "Please select the Generic Type";             
          return false;
        }  

        if ($('#genp_desc').val().trim() == '' ) {
          $('#genp_desc').focus();
          document.getElementById('genp_desc_error').innerHTML= "Please enter the description";             
          return false;
        } 

        if (!regex.test($('#genp_desc').val().trim())) {
          $('#genp_desc').focus();
          document.getElementById('genp_desc_error').innerHTML= "Please provide valid description ";
          return false;
        } 

        if ($('#genp_app_timezone').val().trim() == '' ) {
          $('#genp_app_timezone').focus();
          document.getElementById('genp_app_timezone_error').innerHTML= "Please enter the time zone";             
          return false;
        } 

        if (!regex1.test($('#genp_app_timezone').val().trim())) {
          $('#genp_app_timezone').focus();
          document.getElementById('genp_app_timezone_error').innerHTML= "Please provide valid time zone(Ex.UTC+05:30)";
          return false;
        } 

         if ($('#genp_app_date_format').val().trim() == '' ) {
          $('#genp_app_date_format').focus();
          document.getElementById('genp_app_date_format_error').innerHTML= "Please enter the date";             
          return false;
        } 

        if ($('#genp_app_currency').val().trim() == '' ) {
          $('#genp_app_currency').focus();
          document.getElementById('genp_app_currency_error').innerHTML= "Please select the currency";             
          return false;
        } 

         if ($('#genp_app_default_language').val().trim() == '' ) {
          $('#genp_app_default_language').focus();
          document.getElementById('genp_app_default_language_error').innerHTML= "Please select the language";             
          return false;
        } 

        if ($('#genp_app_out_going_email_add').val().trim() == '' ) {
          $('#genp_app_out_going_email_add').focus();
          document.getElementById('genp_app_out_going_email_add_error').innerHTML= "Please enter the email id";             
          return false;
        } 

        if( !validateEmail($('#genp_app_out_going_email_add').val().trim())){
         document.getElementById('genp_app_out_going_email_add_error').innerHTML= "Please provide valid email id";             
        return false;
      }
                  
      var genpFormData = {
          "genp_type": $('#genp_type').val(),
          "genp_desc"  : $('#genp_desc').val(),
          "genp_app_timezone" : $('#genp_app_timezone').val(),
          "genp_app_date_format": $('#genp_app_date_format').val(),
          "genp_app_currency" : $('#genp_app_currency').val(),
          "genp_app_currency_symbol" : "a",
          "genp_app_default_language": $('#genp_app_default_language').val(),
          "genp_app_out_going_email_add" : $('#genp_app_out_going_email_add').val(),
          "genp_active" : "s"
  
      };                          

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            genpFormData.generic_param_id = parseInt($('#generic_param_id').val(), 10);
           var requestData = JSON.stringify(genpFormData); 
            savegenp = "/eprayoga/admin/update_genp";
            var successMsg = "Generic param Updated Successfully.";
            var failureMsg = "Error while updating the Generic Param.Please Contact Administrator.";
      } 
      else {
          
            var requestData = JSON.stringify(genpFormData); 
            savegenp = "/eprayoga/admin/create_genp";
            var successMsg = "Generic Param Created Successfully.";
            var failureMsg = "Error while creating the Generic Param.Please Contact Administrator.";
      }
          $('#genp_create').attr('disabled','disabled');

          $.ajax({
          url     :savegenp,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
         
            
            $('#genp_create').removeAttr('disabled','disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          },
          error: function(data) {
          
            $('#genp_create').removeAttr('disabled');      
            var errData = JSON.parse(data.responseText);

            if(errData.genp_desc){
           

             var nameMsg = JSON.stringify(errData.genp_desc[0]); 
             var nameerrormsg = nameMsg.replace(/\"/g, "");
             $( "#genp_desc_error").html(nameerrormsg);
            } 
            else if(errData.genp_app_out_going_email_add){
           

             var nameMsg = JSON.stringify(errData.genp_app_out_going_email_add[0]); 
             var nameerrormsg = nameMsg.replace(/\"/g, "");
             $( "#genp_app_out_going_email_add_error").html(nameerrormsg);
            }else{
            errorhandle(data);
            }
          }
        }); 

	},

routepopup: function(){
    $('.modal-backdrop').remove(); 
   
     appRouter.navigate("genpList", {trigger: true});
  },
	cancelCreateForm:function(e){
		   e.preventDefault();
       appRouter.navigate("genpList", {trigger: true});  
	},
  typeFocus:function()
  {
        $('#genp_type_error').html("");
    
  },
  descFocus:function()
  {
        $('#genp_desc_error').html("");
    
  },

timeFocus: function() {
   $('#genp_app_timezone_error').html("");
},
dateFocus: function(){
   $('#genp_app_date_format_error').html("");
},
currFocus: function() {
  $('#genp_app_currency_error').html("");
},
langFocus: function() {
   $('#genp_app_default_language_error').html("");
},
emailFocus: function() {
  $('#genp_app_out_going_email_add_error').html("");
}


});
