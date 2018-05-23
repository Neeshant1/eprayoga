var admin = admin || {};

admin.CurrencyFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
           $('.popover-content').hide();

       this.mode = options.mode;
       this.currencyId = options.id;
       this.template = options.template;
       var self = this;
      
        if(new String(this.mode).valueOf() == new String('create').valueOf()){

          this.render();
        } 

        else{

            var requestJson = JSON.stringify({"currency_id":this.currencyId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_currency_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
              cache:false,
                  success: function(data) {
              
                    self.currencyData = data.original;
                   
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
    'click  #currency-save'  : 'saveCurrency',
    'click  #currency-cancel' : 'cancelCurrencyForm',
      'click  #currency-code' : 'codeFocus',
      'click  #currency-name' : 'nameFocus',
      'click  #currency-conversion' : 'conversionFocus',
      'click  #currency-type' : 'typeFocus'
   
 
  },

    render: function() {
    if (new String(this.mode).valueOf() == new String('create').valueOf()) {
      this.$el.html(this.template);
      this.$el.append(this.template1);
      } else { //edit
        this.$el.html(this.template( this.currencyData ));
        this.$el.append(this.template1);
        this.$el.find("#currency-save").html("save");
    }           
        return this;
  },

  saveCurrency:function(e){
    e.preventDefault();
    var self = this;

   document.getElementById("currency-name-error").innerHTML="";
   document.getElementById("currency-code-error").innerHTML="";
     document.getElementById("currency-conversion-error").innerHTML="";
     document.getElementById("currency-type-error").innerHTML="";
        var regex=/^[a-zA-Z\s]+$/;
        var  regex1=/^[0-9/.]+$/;
        var regex2= /^[0-9]{1,2}(?:\.[0-9]{1,3})?$/;
      //   var  regex2=/^[0-9]*$/;



      if ($('#currency-name').val().trim() == '') {
            $('#currency-name').focus();
         //   $('#city_full_name').attr('style', 'border-bottom:2px solid #FF0000;');
            document.getElementById('currency-name-error').innerHTML= "Please enter the Currency Name";            
            return false;
        }

      if (!regex.test($('#currency-name').val().trim())) {
          $('#currency-name').focus();
          document.getElementById('currency-name-error').innerHTML= "Please provide valid Name";
          return false;
         } 
      if ($('#currency-code').val().trim() == '') {
            $('#currency-code').focus();
         //   $('#city_full_name').attr('style', 'border-bottom:2px solid #FF0000;');
            document.getElementById('currency-code-error').innerHTML= "Please enter the Currency Code";            
            return false;
        }

      if (!regex.test($('#currency-code').val().trim())) {
          $('#currency-code').focus();
          document.getElementById('currency-code-error').innerHTML= "Please provide valid code";
          return false;
         } 

        if ($('#currency-conversion').val().trim() == '') {
          $('#currency-conversion').focus();
       //   $('#state_id').attr('style', 'border-bottom:2px solid #FF0000;');
          document.getElementById('currency-conversion-error').innerHTML= "Please enter the Conversion ";
          return false;
      } 
      if (!regex1.test($('#currency-conversion').val().trim())) {
          $('#currency-conversion').focus();
          document.getElementById('currency-conversion-error').innerHTML= "Please provide valid Conversion";
          return false;
      }

      if (!regex2.test($('#currency-conversion').val().trim())) {
          $('#currency-conversion').focus();
          document.getElementById('currency-conversion-error').innerHTML= "Please provide valid Conversion (Ex: 22,1.99 and 99.999)";
          return false;
      }
           
           if($("input[type=radio][name=currencytype]:checked").length<=0)
          {
           document.getElementById('currency-type-error').innerHTML= "Please choose type ";
           return false;
          }
  

     var currencyFormData = {
                  "code": $('#currency-code').val(),
                  "currency_name"  : $('#currency-name').val(),
                  "conv_rate" : $('#currency-conversion').val(),
                  "type"  : $( "input[type=radio][name=currencytype]:checked" ).val(),
                  "created_by_user_id" : "1" ,
                  "last_update_user_id" : "2",

           };
                                              
      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            currencyFormData.currency_id = parseInt($('#currency-id').val(), 10);
    
           var requestData = JSON.stringify(currencyFormData); 
            savecurrency = "/eprayoga/admin/update_currency";
            var successMsg = "Currency Updated Successfully.";
            var failureMsg = "Error while updating the Currency.Please Contact Administrator.";
      } 
      else {


            var requestData = JSON.stringify(currencyFormData); 
           // alert(requestData);
            savecurrency = "/eprayoga/admin/create_currency";
            var successMsg = "Currency Created Successfully.";
            var failureMsg = "Error while creating the Currency.Please Contact Administrator.";
      }

           $('#currency-save').attr('disabled','disabled');
          $.ajax({
          url     :savecurrency,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {

            $('#currency-save').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          },
          error: function(data) {
                  $('#currency-save').removeAttr('disabled');  
                  var errData = JSON.parse(data.responseText);

                  if(errData.currency_name){
                   var nameMsg = JSON.stringify(errData.currency_name[0]); 
                   var nameerrormsg = nameMsg.replace(/\"/g, "");
                   $( "#currency-name-error").html(nameerrormsg);
                  }

                  else if(errData.code){
                   var codeMsg = JSON.stringify(errData.code[0]);
                   var codeerrormsg = codeMsg.replace(/\"/g, "");
                   $( "#currency-code-error").html(codeerrormsg);
                }else{
                  errorhandle(data);
                  }
                
                 } 
        }); 

  },
  routepopup: function(){
    $('.modal-backdrop').remove(); 
    appRouter.navigate("currencypage", {trigger: true});

  },

  cancelCurrencyForm:function(e){
       e.preventDefault();
           appRouter.navigate("currencypage", {trigger: true});  
  },
  codeFocus:function()
  {
        $('#currency-code-error').html("");
    
  },
  nameFocus:function()
  {
        $('#currency-name-error').html("");
    
  },
  conversionFocus:function()
  {
        $('#currency-conversion-error').html("");
    
  },
  typeFocus:function()
  {
        $('#currency-type-error').html("");
    
  }

});
