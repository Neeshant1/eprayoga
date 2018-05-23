var admin = admin || {};

admin.ProductCatalogFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.productCatalogId = options.id;
       this.template = options.template;
       var self = this;
      
     


        if(new String(this.mode).valueOf() == new String('create').valueOf()){
              this.render();
        

       $.when(
        
              $.ajax({
                  url: "/eprayoga/admin/get_category_list",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   
                   

                     self.categoryData = data;
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
               
                  


                  self.catCollectionView = new admin.MgntCategoryCollectionView({
                         el: $( '#questionCategory' ),
                         catCollection: self.categoryData
                        });
                  self.currencyCollectionView = new admin.MgmtCurrencyCollectionView({
                     el: $( '#genp_app_currency' ),
                    currencyCollection: self.currencydata
                        });
                  self.languageCollectionView = new admin.MgmtLanguageCollectionView({
                     el: $( '#genp_app_default_language' ),
                    languageCollection: self.languagedata
                        });

                  

                 
                   

                  
                });
        } else {


             var requestJson = JSON.stringify({"id":this.productCatalogId});
            
             $.when(
              $.ajax({
                  url: "/eprayoga/admin/get_product_catalog_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,

                  
                  success: function(data) {
                    
                    self.productData = data;
                  

                   
                  },
                  error: function(data) {
                    errorhandle(data);
                     
                  }
              }),
              $.ajax({
                  url: "/eprayoga/admin/get_client_id",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {

                     self.clientData = data;
                  },
                  error: function(data) {
                    errorhandle(data);
                         
                  }
              }),
              $.ajax({
                  url: "/eprayoga/admin/get_category_list",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  
                   success: function(data) {
                                    
                     self.categoryData = data;
                  },
                  error: function(data) {
                    errorhandle(data);
                         
                  }
                }),

               $.ajax({
                  url: "/eprayoga/admin/select_client_group",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  
                   success: function(data) {
                    
                    self.clientGroupData = data;

                   
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

                    

                         
             
                        
                       
                       self.catCollectionView = new admin.MgntCategoryCollectionView({
                          el: $( '#questionCategory' ),
                          catCollection: self.categoryData,                        
                          subject_id : self.productData[0].subject_id,
                          topic_id : self.productData[0].topic_id

                        });
                        $('#questionCategory' ).val(self.productData[0].category_id);
                       self.catCollectionView.isSelected();

                         self.currencyCollectionView = new admin.MgmtCurrencyCollectionView({
                            el: $( '#genp_app_currency' ),
                            currencyCollection: self.currencydata

                         });
                          
                         self.languageCollectionView = new admin.MgmtLanguageCollectionView({
                            el: $( '#genp_app_default_language' ),
                            languageCollection: self.languagedata
                         });

                         $('#genp_app_default_language').val(self.languagedata.language_id);                    
                        
                      $('#genp_app_currency').val(self.productData[0].currency_id);

                      $('#genp_app_default_language').val(self.productData[0].language_id);
                           
                      $('#Product_type').val(self.productData[0].exam_attempt_type_id);
                            
                      if (self.productData[0].exam_attempt_type_id == 1) {
            
                            $('#type2').hide();

                      }else if(self.productData[0].exam_attempt_type_id == 2){

                            $('#type2').hide();

                      }else if(self.productData[0].exam_attempt_type_id == 3){

                              $('#type2').show();


                      }

        });
      }
  
      // this.render();
  },

    events: {
      
    'click #save-product'  : 'saveProductCatalog',
    'click  #cancel-product'  : 'cancelProductCatalog',
    'click #name_catalog' : 'productNameFocus',
    'click #description_catalog' : 'productDescriptionFocus',
    'click #questionCategory' : 'productCategoryFocus',
    'click #questionSubject' : 'productSubjectFocus',
    'click #questionTopic' : 'productTopicFocus',
    'click #genp_app_currency' : 'productCurrencyFocus',
    'click #productPrice' : 'productPriceFocus',
    'click #productDiscount' : 'productDiscountFocus',
    'click #ProductBundlePrice' : 'productBundlePriceFocus',
    'click #genp_app_default_language' : 'productLanguageFocus',
    'click #productemployeeband' : 'productEmployeeBandFocus',
    'click #pro_cat_from_date' : 'productValidFromFocus',
    'click #pro_cat_to_date' : 'productValidToFocus',
    'click #Product_type' : 'productExamAttemptFocus',
    'click #productattempt' : 'productValidDaysFocus',
    'click #productvalidity' : 'productAttemptFocus',
    'click #productPoupulate' : 'productPopulateFocus',
    'click #productsgst' : 'sgstFocus',
    'click #productcgst' : 'cgstFocus',
    'click #productigst' : 'igstFocus',
    'click #producttax' : 'tax1Focus',
    'click #producttax1' : 'tax2Focus',
    'click #producttax2'  : 'tax3Focus',
    'change #Product_type'  : 'mockProduct',
    'change #questionCategory' : 'labelCat',
    'change #questionSubject' : 'labelSub',
    'change #questionTopic' : 'labelTop'
    
    
  },

    render: function() {
      
    if (new String(this.mode).valueOf() == new String('create').valueOf()) {

       
      this.$el.html(this.template);
       this.$el.append(this.template1);
      //$('#type1').hide();
      $('#type2').hide();

      } 
        else { //edit
        
        this.$el.html(this.template(this.productData[0]));
         this.$el.append(this.template1);
       
        initializeTabMenu();

      
    }      
        $('#pro_cat_from_date').datetimepicker();
         $('#pro_cat_to_date').datetimepicker();       
        return this;
  },
  mockProduct:function(e){
  
    var contentPanelId = $(e.target).val();
    
    
    if(contentPanelId == 1){
      //$('#type1').show();
      $('#type2').hide();

    }else if (contentPanelId == 2){
      //$('#type1').show();
      $('#type2').hide();

    }else if (contentPanelId == 3){
      $('#type2').show();
    }

  },
  labelCat:function(e){
  

    
     label1 = $("#questionCategory option:selected").text();
                
   labelcat = $("#labeleDesign").val(label1);
                
  },
  labelSub:function(e){
   
    
     label2 = $("#questionCategory option:selected").text() + '-' + 
                $("#questionSubject option:selected").text(); 
                 
   labelsub = $("#labeleDesign").val(label2);
                
  },
  labelTop:function(e){
   
     label3 = $("#questionCategory option:selected").text() + '-' + 
                $("#questionSubject option:selected").text() + '-' + 
                $("#questionTopic option:selected").text();  
   labeltop = $("#labeleDesign").val(label3);
                
  },
  saveProductCatalog:function(e){
    var self = this;
    e.preventDefault();
   

    // var label = $("#questionCategory option:selected").text() + '-' + 
    //             $("#questionSubject option:selected").text() + '-' + 
    //             $("#questionTopic option:selected").text();

    
    
     // var labelcst = $("#labeleDesign").val(label1);
   
           


      document.getElementById("product_catalog_name_error").innerHTML="";
      document.getElementById("description_catalog_error").innerHTML="";
      document.getElementById("productCategory_not_select_error").innerHTML="";
      document.getElementById("productSubject_not_select_error").innerHTML="";
      document.getElementById("productTopic_not_select_error").innerHTML="";
      //document.getElementById("productLabel_not_select_error").innerHTML="";
      document.getElementById("productCurrency_not_select_error").innerHTML="";
      document.getElementById("productPrice_not_select_error").innerHTML="";
      document.getElementById("productDiscount_not_select_error").innerHTML="";
      document.getElementById("ProductBundlePrice_not_select_error").innerHTML="";
      document.getElementById("productsgst_not_select_error").innerHTML="";

      document.getElementById("productcgst_not_select_error").innerHTML="";
      document.getElementById("productigst_not_select_error").innerHTML="";
      document.getElementById("producttax_not_select_error").innerHTML="";
      document.getElementById("producttax1_not_select_error").innerHTML="";
      document.getElementById("producttax2_not_select_error").innerHTML="";
      document.getElementById("productLanduage_not_select_error").innerHTML="";
      document.getElementById("productemployeeband_not_select_error").innerHTML="";
      document.getElementById("pro_cat_from_date_error").innerHTML="";
      document.getElementById("pro_cat_to_date_error").innerHTML="";
      document.getElementById("instruction_type_error").innerHTML="";
      document.getElementById("productattempt_not_select_error").innerHTML="";
      document.getElementById("productvaliditty_not_select_error").innerHTML="";
      document.getElementById("poupulate_not_select_error").innerHTML="";

          var discount = $("#productDiscount").val();
          if(discount <= 100){
                  console.log(discount);

          }else if (discount >100){
                   document.getElementById('productDiscount_not_select_error').innerHTML= "Please Provide a Valid Discount";
                   return false;
          }
          var sgst = $("#productsgst").val();
          if(sgst <= 100){
                  console.log(sgst);

          }else if (sgst >100){
                  document.getElementById('productsgst_not_select_error').innerHTML= "Please Provide a valid sgst";
                  return false;
          }
          
          var cgst = $("#productcgst").val();
          if(cgst <= 100){
                  console.log(cgst);

          }else if (cgst >100){
                  document.getElementById('productcgst_not_select_error').innerHTML= "Please Provide a valid  cgst";
                  return false;
          }
          var igst = $("#productigst").val();
          if(igst <= 100){
                  console.log(igst);

          }else if (igst >100){
                   document.getElementById('productigst_not_select_error').innerHTML= "Please Provide a valid  igst";
                   return false;
          }
          var othertax1 = $("#producttax").val();
          if(othertax1 <= 100){
                  console.log(othertax1);

          }else if (othertax1 >100){
                   document.getElementById('producttax_not_select_error').innerHTML= "Please Provide a valid  Producttax1";
                   return false;  
          }
          var othertax2 = $("#producttax1").val();
          if(othertax2 <= 100){
                  console.log(othertax2);

          }else if (othertax2 >100){
                  document.getElementById('producttax1_not_select_error').innerHTML= "Please Provide a valid Producttax2";
                  return false; 
          }
          var othertax3 = $("#producttax2").val();
          if(othertax3 <= 100){
                  console.log(othertax3);

          }else if (othertax3 >100){
                  document.getElementById('producttax2_not_select_error').innerHTML= "Please Provide valid a Producttax3";
                  return false;
          }

      





      if ( !validateName($('#name_catalog').val().trim())) {
        $('#name_catalog').focus();
        document.getElementById('product_catalog_name_error').innerHTML= "Please Provide Name";             
        return false;
      } 
      if ( !validateTextArea($('#description_catalog').val().trim())) {
        $('#description_catalog').focus();
        document.getElementById('description_catalog_error').innerHTML= "Please Provide description";             
        return false;
      }       
      if (!validateSelect($('#questionCategory').val().trim())) {
        $('#questionCategory').focus();
        document.getElementById('productCategory_not_select_error').innerHTML= "Please select a category";             
        return false;
      } 

      if (!validateSelect($('#questionSubject').val())) {
        $('#questionSubject').focus();
        document.getElementById('productSubject_not_select_error').innerHTML= "Please select a subject";             
        return false;
      } 

      // if (!validateSelect($('#questionTopic').val())) {
      //   $('#questionTopic').focus();
      //   document.getElementById('productTopic_not_select_error').innerHTML= "Please select a topic";             
      //   return false;
      // } 

      if (! validateSelect($('#genp_app_currency').val().trim())) {
        $('#genp_app_currency').focus();
        document.getElementById('productCurrency_not_select_error').innerHTML= "Pleas select a Currency";             
        return false;
      } 

      if (! validateNumberone($('#productPrice').val().trim())) {
        $('#productPrice').focus();
        document.getElementById('productPrice_not_select_error').innerHTML= "Please Provide a Valid Price";    
        return false;
      } 

       if (! validateNumberone($('#productDiscount').val().trim())) {
        $('#productDiscount').focus();
        document.getElementById('productDiscount_not_select_error').innerHTML= "Please Provide a Valid Discount";             
        return false;
      } 
      if (!validateNumberone($('#ProductBundlePrice').val().trim())) {
        $('#ProductBundlePrice').focus();
        document.getElementById('ProductBundlePrice_not_select_error').innerHTML= "Please Provide a Valid BundlePrice";             
        return false;
      } 

      if (!validateNumberone($('#productsgst').val())) {
        $('#productsgst').focus();
        document.getElementById('productsgst_not_select_error').innerHTML= "Please Provide a sgst";             
        return false;
      } 

      if (!validateNumberone($('#productcgst').val())) {
        $('#productcgst').focus();
        document.getElementById('productcgst_not_select_error').innerHTML= "Please Provide a cgst";             
        return false;
      } 

      if (! validateNumberone($('#productigst').val().trim())) {
        $('#productigst').focus();
        document.getElementById('productigst_not_select_error').innerHTML= "Please Provide a igst";             
        return false;
      }
      // if (!validateNumber($('#producttax').val())) {
      //   $('#producttax').focus();
      //   document.getElementById('producttax_not_select_error').innerHTML= "Please Provide a Producttax1";             
      //   return false;
      // } 

      // if (!validateNumber($('#producttax1').val())) {
      //   $('#producttax1').focus();
      //   document.getElementById('producttax1_not_select_error').innerHTML= "Please Provide a Producttax2";             
      //   return false;
      // } 

      // if (! validateNumber($('#producttax2').val().trim())) {
      //   $('#producttax2').focus();
      //   document.getElementById('producttax2_not_select_error').innerHTML= "Please Provide a Producttax3";             
      //   return false;
      // }
      if (!validateSelect($('#genp_app_default_language').val())) {
        $('#genp_app_default_language').focus();
        document.getElementById('productLanduage_not_select_error').innerHTML= "Please select a language";             
        return false;
      } 

      if (!validateNumber($('#productemployeeband').val())) {
        $('#productemployeeband').focus();
        document.getElementById('productemployeeband_not_select_error').innerHTML= "Please Provide a Employeeband";             
        return false;
      } 

      if (! validateSelect($('#pro_cat_from_date').val().trim())) {
        $('#pro_cat_from_date').focus();
        document.getElementById('pro_cat_from_date_error').innerHTML= "Pleas provide from date";             
        return false;
      }
      
      if (!validateSelect($('#pro_cat_to_date').val())) {
        $('#pro_cat_to_date').focus();
        document.getElementById('pro_cat_to_date_error').innerHTML= "Please Provide a to date";             
        return false;
      } 
      if (!validateSelect($('#Product_type').val())) {
        $('#Product_type').focus();
        document.getElementById('instruction_type_error').innerHTML= "Please Select a type";             
        return false;
      }
    var mock = $('#Product_type').val();
    if(mock == 1){

        if (! validateSelect($('#productattempt').val().trim())) {
         $('#productattempt').focus();
          document.getElementById('productattempt_not_select_error').innerHTML= "Please Provide validity days";             
          return false;
          }
    }else if(mock == 2){

        if (! validateSelect($('#productattempt').val().trim())) {
         $('#productattempt').focus();
          document.getElementById('productattempt_not_select_error').innerHTML= "Please Provide validity days";             
          return false;
          }
    }else if (mock == 3){
      
        if (! validateSelect($('#productattempt').val().trim())) {
         $('#productattempt').focus();
          document.getElementById('productattempt_not_select_error').innerHTML= "Please Provide validity days";             
          return false;
          }
        if (! validateSelect($('#productvalidity').val().trim())) {
         $('#productvalidity').focus();
          document.getElementById('productvaliditty_not_select_error').innerHTML= "Please Provide attempt days";             
          return false;
          }
    }
        if(!$('input[name=productPoupulate]:checked').val()){
         $('#productPoupulate').focus();
          document.getElementById('poupulate_not_select_error').innerHTML= "Pleas Select a Poupulate";             
          return false;
          }
       
       var topicid = $('#questionTopic').val();
    
if(topicid == null || topicid == '' || topicid == undefined){
var productFormData = {
                 "name": $('#name_catalog').val(),
                 "description": $('#description_catalog').val(),
                  "category_id"  : $('#questionCategory').val(),
                  "subject_id" : $('#questionSubject').val(),
                  "topic_id"  : 10,
                  "label"  : $('#labeleDesign').val(),
                  "currency_id" : $('#genp_app_currency').val(),
                  "price"  : $('#productPrice').val(),
                  "discount"  : $('#productDiscount').val(),
                  "bundle_price" : $('#ProductBundlePrice').val(),
                  "sgst"  : $('#productsgst').val(),
                  "cgst"  : $('#productcgst').val(),
                  "igst"  : $('#productigst').val(),
                  "other_tax1" : $('#producttax').val(),
                  "other_tax2" : $('#producttax1').val(),
                  "other_tax3" : $('#producttax2').val(),
                  "language_id"  : $('#genp_app_default_language').val(),
                  "employee_band"  : $('#productemployeeband').val(),
                  "valid_from" : $('#pro_cat_from_date').val(),
                  "valid_to" : $('#pro_cat_to_date').val(),
                  "populate_all": $( "input[type=radio][name=productPoupulate]:checked" ).val(),
                  "valid_days"  : $('#productattempt').val(),
                  "no_of_attempts"  : $('#productvalidity').val(),
                  "exam_attempt_type_id"  : $('#Product_type').val()
                };
}else{
  var productFormData = {
                 "name": $('#name_catalog').val(),
                 "description": $('#description_catalog').val(),
                  "category_id"  : $('#questionCategory').val(),
                  "subject_id" : $('#questionSubject').val(),
                  "topic_id"  : $('#questionTopic').val(),
                  "label"  : $('#labeleDesign').val(),
                  "currency_id" : $('#genp_app_currency').val(),
                  "price"  : $('#productPrice').val(),
                  "discount"  : $('#productDiscount').val(),
                  "bundle_price" : $('#ProductBundlePrice').val(),
                  "sgst"  : $('#productsgst').val(),
                  "cgst"  : $('#productcgst').val(),
                  "igst"  : $('#productigst').val(),
                  "other_tax1" : $('#producttax').val(),
                  "other_tax2" : $('#producttax1').val(),
                  "other_tax3" : $('#producttax2').val(),
                  "language_id"  : $('#genp_app_default_language').val(),
                  "employee_band"  : $('#productemployeeband').val(),
                  "valid_from" : $('#pro_cat_from_date').val(),
                  "valid_to" : $('#pro_cat_to_date').val(),
                  "populate_all": $( "input[type=radio][name=productPoupulate]:checked" ).val(),
                  "valid_days"  : $('#productattempt').val(),
                  "no_of_attempts"  : $('#productvalidity').val(),
                  "exam_attempt_type_id"  : $('#Product_type').val()
                };
}



     


           
            var From = new Date($('#pro_cat_from_date').val());
            var to =  new Date($('#pro_cat_to_date').val());

           

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            productFormData.id = this.productCatalogId;
           

             //var selectedClient =  $("#client_name").val();
        //    topicFormData.client_id = $("#client_name").val();
           var requestData = JSON.stringify(productFormData); 
            savetopic = "/eprayoga/admin/update_product_catalog";
            var successMsg = "Product Catalog Updated Successfully.";
            var failureMsg = "Already Exist This Type Of Product.";
      } 
      else {
             
           // var selectedClient =  $("#client_name").val();
          //  topicFormData.client_id = $("#client_name").val();
            var requestData = JSON.stringify(productFormData); 
            savetopic = "/eprayoga/admin/create_product_catalog";
            var successMsg = "Product Catalog Created Successfully.";
            var failureMsg = "Already Exist This Type Of Product.";
      }

if( From < to ){
          $('#save-product').attr('disabled','disabled');
          $.ajax({
          url     :savetopic,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
           
            $('#save-product').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          },
          error: function(data) {
            $('#save-product').removeAttr('disabled');
            $('#messagepop').text(failureMsg); 
            $('#myModalPopup').modal('show');
           return false;         

               } 
        }); 
        }else{
           alert(" invalid date");
          
        }

  },

 
 routepopup: function(){
    $('.modal-backdrop').remove(); 
   
     appRouter.navigate("productcatalogList", {trigger: true});

  },

  cancelProductCatalog:function(e){
       e.preventDefault();
           appRouter.navigate("productcatalogList", {trigger: true});  
  },
  productNameFocus:function()
  {
        $('#product_catalog_name_error').html("");
  },
  productDescriptionFocus:function()
  {
        $('#description_catalog_error').html("");
  },
  productCategoryFocus:function()
  {
        $('#productCategory_not_select_error').html("");
  },
  productSubjectFocus:function()
  {
        $('#productSubject_not_select_error').html("");
  },
  productTopicFocus:function()
  {
        $('#productTopic_not_select_error').html("");
  },

  productCurrencyFocus:function()
  {
        $('#productCurrency_not_select_error').html("");
  },
  productDiscountFocus:function()
  {
        $('#productDiscount_not_select_error').html("");
  },
  productPriceFocus:function()
  {
        $('#productPrice_not_select_error').html("");
  },
  productBundlePriceFocus:function()
  {
        $('#ProductBundlePrice_not_select_error').html("");
  },

  productLanguageFocus:function()
  {
        $('#productLanduage_not_select_error').html("");
  },
  productEmployeeBandFocus:function()
  {
        $('#productemployeeband_not_select_error').html("");
  },
  productValidFromFocus:function()
  {
        $('#pro_cat_from_date_error').html("");
  },
  productValidToFocus:function()
  {
        $('#pro_cat_to_date_error').html("");
  },
  productExamAttemptFocus:function()
  {
        $('#instruction_type_error').html("");
  },

  productValidDaysFocus:function()
  {
        $('#productattempt_not_select_error').html("");
  },
  productAttemptFocus:function()
  {
        $('#productvaliditty_not_select_error').html("");
  },
  productPopulateFocus:function()
  {
        $('#poupulate_not_select_error').html("");
  },
  sgstFocus:function()
  {
        $('#productsgst_not_select_error').html("");
  },
  cgstFocus:function()
  {
        $('#productcgst_not_select_error').html("");
  },
  igstFocus:function()
  {
        $('#productigst_not_select_error').html("");
  },

  tax1Focus:function()
  {
        $('#producttax_not_select_error').html("");
  },
  tax2Focus:function()
  {
        $('#producttax1_not_select_error').html("");
  },
  tax3Focus:function()
  {
        $('#producttax2_not_select_error').html("");
  }



});