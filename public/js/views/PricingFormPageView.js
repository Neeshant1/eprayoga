var admin = admin || {};

admin.PricingFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.pricingId = options.id;
       this.template = options.template;
       $('#datetimepicker1').datetimepicker();
       var self = this;
      
        if(new String(this.mode).valueOf() == new String('create').valueOf()){
            $.when(
              $.ajax({
              url: "/eprayoga/admin/get_currency",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
             
                    self.currencyData = data;
                 

                  },
                  error: function(data) {
                    errorhandle(data);
                      
                  }
                })
                ).done(function(){
                  self.render();                    
                    self.currencyCollectionView = new admin.MgmtCurrencyCollectionView({
                      el: $( '#prc_currency' ),
                      currencyCollection: self.currencyData
                    });
                    
                
                });
        } else {

             var requestJson = JSON.stringify({"pricing_id":this.pricingId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_pricing_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
               
                    self.pricingData = data; 
                                    
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
                    self.currencyData = data;
                 
                  },
                  error: function(data) {
                   errorhandle(data);
                      
                  }
                })
                ).done(function(){
                    self.render();
                    self.currencyCollectionView = new admin.MgmtCurrencyCollectionView({
                      el: $( '#prc_currency' ),
                      currencyCollection: self.currencyData
                    });
                    $('#prc_type').val(self.pricingData.prc_type);
                    $('#prc_currency').val(self.pricingData.prc_currency);
                    $('#prc_payment_mode').val(self.pricingData.prc_payment_mode);
                    var one = self.pricingData.prc_disc;
                    var two = Number(one * 100 );
                    var three = (two +"%");
                    $('#prc_disc').val(three);
                    
                
                })
        }
      // this.render();
     },

    events: {
    'click  #save_pricing'  : 'savepricing',
    'click  #cancel_pricing'  : 'cancelCreateForm',
    'click  #prc_description':'prc_description_error',
    'click  #prc_eff_from_date':'prc_eff_from_date_error',
    'click  #prc_eff_to_date':'prc_eff_to_date_error',
    'click  #prc_detail_desc':'prc_detail_desc_error',
    'click  #prc_currency':'prc_currency_error',
    'click  #prc_price':'prc_price_error',
    'click  #prc_disc':'prc_disc_error',
    'click  #prc_payment_mode':'prc_payment_mode_error',
    'click  #prc_usance':'prc_usance_error'
  },

    render: function() {
    if (new String(this.mode).valueOf() == new String('create').valueOf()) {
       
      this.$el.html(this.template);
      this.$el.append(this.template1);
     
      } 
        else { //edit
        this.$el.html(this.template( this.pricingData ));
        this.$el.append(this.template1);
        
    }           
          $('#prc_eff_from_date').datetimepicker();
         $('#prc_eff_to_date').datetimepicker();    
        return this;
  },

  savepricing:function(e){
    e.preventDefault();
    var self = this;

        var value1 = document.getElementById("prc_disc").value;
        var value2 = parseFloat(value1);
        if(!isNaN(value2)){
         value2 /= 100;
       }
        


        document.getElementById("prc_type_error").innerHTML="";
        document.getElementById("prc_description_error").innerHTML="";
        document.getElementById("prc_eff_from_date_error").innerHTML="";
        document.getElementById("prc_eff_to_date_error").innerHTML="";
        document.getElementById("prc_detail_desc_error").innerHTML="";
        document.getElementById("prc_currency_error").innerHTML="";
        document.getElementById("prc_price_error").innerHTML="";
        document.getElementById("prc_disc_error").innerHTML="";
        document.getElementById("prc_payment_mode_error").innerHTML="";
        document.getElementById("prc_usance_error").innerHTML="";

        var  regex=/^[a-zA-Z\s]+$/;
        var  regex1=/^[0-9\.]+$/;
        var regex2=/^[0-9\%]+$/;
        var regex3=/^[0-9]+$/;
         //var regex2 = /^(?:[1-9]\d*|0)+$/;



        if ($('#prc_type').val().trim() == '' ) {
        $('#prc_type').focus();
        document.getElementById('prc_type_error').innerHTML= "Please select Pricing Type";             
        return false;
      } 

        if ($('#prc_description').val().trim() == '' ) {
        $('#prc_description').focus();
        document.getElementById('prc_description_error').innerHTML= "Please Enter Some Description";             
        return false;
      } 
        if ($('#prc_eff_from_date').val().trim() == '' ) {
        $('#prc_eff_from_date').focus();
        document.getElementById('prc_eff_from_date_error').innerHTML= "Please Enter Date";             
        return false;
      } 
        if ($('#prc_eff_to_date').val().trim() == '' ) {
        $('#prc_eff_to_date').focus();
        document.getElementById('prc_eff_to_date_error').innerHTML= "Please Enter Date";             
        return false;
      } 
       if ($('#prc_detail_desc').val().trim() == '' ) {
        $('#prc_detail_desc').focus();
        document.getElementById('prc_detail_desc_error').innerHTML= "Please Enter Some Description";             
        return false;
      } 
       if ($('#prc_currency').val().trim() == '' ) {
        $('#prc_currency').focus();
        document.getElementById('prc_currency_error').innerHTML= "Please Enter Some Description";             
        return false;
      } 
       if ($('#prc_price').val().trim() == '' ) {
        $('#prc_price').focus();
        document.getElementById('prc_price_error').innerHTML= "Please provide valid price";             
        return false;
      } 
       if (!regex1.test($('#prc_price').val().trim())) {
          $('#prc_price').focus();
          document.getElementById('prc_price_error').innerHTML= "Please provide valid price";
          return false;
      } 
       if ($('#prc_disc').val().trim() == '' ) {
        $('#prc_disc').focus();
        document.getElementById('prc_disc_error').innerHTML= "Please provide valid price Discount";             
        return false;
      } 
       if (!regex2.test($('#prc_disc').val().trim())) {
          $('#prc_disc').focus();
          document.getElementById('prc_disc_error').innerHTML= "Please provide valid price Discount [Ex:10%]";
          return false;
      } 

      if ($('#prc_payment_mode').val().trim() == '' ) {
        $('#prc_payment_mode').focus();
        document.getElementById('prc_payment_mode_error').innerHTML= "Please select payment Mode";             
        return false;
      } 
       if (!regex3.test($('#prc_usance').val().trim())) {
        //($('#prc_usance').val().trim() == '' ) {
        $('#prc_usance').focus();
        document.getElementById('prc_usance_error').innerHTML= "Please enter Number only [Ex:123]";             
        return false;
      } 



           var pricingFormData = {
                  "prc_type"  : $('#prc_type').val(),
                  "prc_description"  : $('#prc_description').val(),
                  "prc_eff_from_date"  : $('#prc_eff_from_date').val(),
                  "prc_eff_to_date"  : $('#prc_eff_to_date').val(),
                  "prc_detail_desc"  : $('#prc_detail_desc').val(),
                  "prc_currency"  : $('#prc_currency').val(),
                  "prc_price"  : $('#prc_price').val(),
                  "prc_active"  :"a",
                  "prc_disc"  : value2,
                  "prc_payment_mode"  : $('#prc_payment_mode').val(),
                  "prc_usance"  : $('#prc_usance').val(),
                  "created_by_user_id"  : "aa",
                  "last_update_user_id"  : "aa"

           };
            var From = new Date($('#prc_eff_from_date').val());
            var to =  new Date($('#prc_eff_to_date').val());
               

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            pricingFormData.pricing_id = this.pricingId;
           var requestData = JSON.stringify(pricingFormData); 
            savepricing = "/eprayoga/admin/update_pricing";
            var successMsg = "pricing Updated Successfully.";
            var failureMsg = "Error while updating the pricing. Contact Administrator.";
      } 
      else {

            var requestData = JSON.stringify(pricingFormData); 
           // alert(requestData);
            savepricing = "/eprayoga/admin/create_pricing";
            var successMsg = "pricing Created Successfully.";
            var failureMsg = "Error while creating the pricing. Contact Administrator.";
      }

if( From < to ){
        $('#save_pricing').attr('disabled','disabled');
        $.ajax({
          url     :savepricing,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
          
           
            $('#save_pricing').removeAttr('disabled');
           $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          },
          error: function(data) {
            $('#save_pricing').removeAttr('disabled');
           var errData = JSON.parse(data.responseText);
             
              var failureMsg = JSON.stringify(errData.prc_description[0]); 
              var errormsg = failureMsg.replace(/\"/g, "");

                       $( "#prc_description_error").html('The Description name has already been taken');
           //alert("error");
            /*console.log(JSON.stringify(data));       
            var errData = JSON.parse(data.responseText);

            if(errData.language){
             console.log(JSON.stringify(errData.language[0]));

             var nameMsg = JSON.stringify(errData.language[0]); 
             var nameerrormsg = nameMsg.replace(/\"/g, "");
             $( "#language_name_error").html(nameerrormsg);
            }
            else if(errData.language_short_name){
             console.log(JSON.stringify(errData.language_short_name[0]));

             var nameMsg = JSON.stringify(errData.language_short_name[0]); 
             var nameerrormsg = nameMsg.replace(/\"/g, "");
             $( "#language_short_name_error").html(nameerrormsg);
            }*/

          } 
        }); 
      } else {

        alert(" invalid date");

      }

  },

  routepopup: function(){
    $('.modal-backdrop').remove(); 
   appRouter.navigate("pricingList", {trigger: true});

  },

    cancelCreateForm:function(e){
       e.preventDefault();
           appRouter.navigate("pricingList", {trigger: true});  
  },
  prc_type_error:function(){
    $('#prc_type_error').html("");
   },
   prc_description_error:function(){
    $('#prc_description_error').html("");
   },
   prc_eff_from_date_error:function(){
    $('#prc_eff_from_date_error').html("");
   },
   prc_eff_to_date_error:function(){
    $('#prc_eff_to_date_error').html("");
   },
   prc_detail_desc_error:function(){
    $('#prc_detail_desc_error').html("");
   },
   prc_currency_error:function(){
    $('#prc_currency_error').html("");
   },
   prc_price_error:function(){
    $('#prc_price_error').html("");
   },
   prc_payment_mode_error:function(){
    $('#prc_payment_mode_error').html("");
   },
   prc_disc_error:function(){
    $('#prc_disc_error').html("");
   },
   prc_usance_error:function(){
    $('#prc_usance_error').html("");
   }



});
