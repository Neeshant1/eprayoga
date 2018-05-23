var admin = admin || {};

admin.CustomerRegistrationFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.customerId = options.id;
       this.template = options.template;
        $('#cust_dob').datetimepicker();
       var self = this;
        if(new String(this.mode).valueOf() == new String('create').valueOf()){
          $.when(
            $.ajax({
                  url: "/eprayoga/admin/select_zone",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   

                     self.zonedata = data;
                  },
                  error: function(data) {
                    errorhandle(data);  
                  }
                }),
             $.ajax({
              url: "/eprayoga/admin/get_category_list_cust",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   
                     self.catdata = data;
                  },
                  error: function(data) {
                      errorhandle(data);      
                  }
                }),
             $.ajax({
                  url: "/eprayoga/admin/getcountryincustomer",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                    

                     self.countrydata = data;
                  },
                  error: function(data) {
                     errorhandle(data); 
                  }
                }),
             $.ajax({
                  url: "/eprayoga/admin/select_security_questions",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                     self.secqusdata = data;
                  },
                  error: function(data) {
                     errorhandle(data);
                  }
                }),
             $.ajax({
                  url: "/eprayoga/admin/select_address_type",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                     self.addressTypeData = data;
                   
                  },
                  error: function(data) {
                     errorhandle(data);
                  }
                }),
             $.ajax({
                  url: "/eprayoga/admin/select_origin_type",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   
                     self.origindata = data;
                  },
                  error: function(data) {  
                     errorhandle(data);                       
                  }
                })
           ).done(function(){
                self.render();
                self.originCollectionView = new admin.MgmtOriginCollectionView({
                     el: $( '#orig_type_id' ),
                    originCollection: self.origindata
                 });
                self.addressTypeCollectionView = new admin.MgmtAddressTypeCollectionView({
                    el: $( '#address_type' ),
                    addressTypeCollection: self.addressTypeData
                 });

                self.addressTypeCollectionView = new admin.MgmtAddressTypeCollectionView({
                    el: $( '#address_type2' ),
                    addressTypeCollection: self.addressTypeData
                 });
                 // billing address                
                 self.zoneCollectionView2 = new admin.MgntZoneCollectionView({
                    el: $( '#select_zone2' ),
                    zoneCollection: self.zonedata,
                    mode:'address_type2'
                });

                  self.countryCollectionView2 = new admin.MgntCountryCollectionView({
                  el: $( '#select_country2' ),
                  mode:'address_type2'

                 });

                  self.stateCollectionView2 = new admin.MgntStateCollectionView({
                  el: $( '#select_state2' ),
                  mode:'address_type2'
                 });

               
                self.cityCollectionView2 = new admin.MgntCityCollectionView({
                  el: $( '#select_city2' ),
                  mode:'address_type2'
                 });
                 self.zoneCollectionView2.countryCollectionView2 = self.countryCollectionView2;
                self.countryCollectionView2.stateCollectionView2 =  self.stateCollectionView2;
                self.stateCollectionView2.cityCollectionView2 =  self.cityCollectionView2;

                //residential address
                self.zoneCollectionView = new admin.MgntZoneCollectionView({
                    el: $( '#select_zone' ),
                    zoneCollection: self.zonedata,
                    mode:'address_type1'
                });
                 self.countryCollectionView = new admin.MgntCountryCollectionView({
                  el: $( '#select_country' ),
                  mode:'address_type1'
                 });

                self.stateCollectionView = new admin.MgntStateCollectionView({
                  el: $( '#select_state' ),
                  mode:'address_type1'
                 });              

                self.cityCollectionView = new admin.MgntCityCollectionView({
                  el: $( '#select_city' ),
                  mode:'address_type1'
                 });
                self.zoneCollectionView.countryCollectionView = self.countryCollectionView;                 
                self.countryCollectionView.stateCollectionView =  self.stateCollectionView;
                self.stateCollectionView.cityCollectionView =  self.cityCollectionView;
                // category subject
                  self.catCollectionView = new admin.MgntCategoryCollectionView({
                    el: $( '#edu_category_name' ),
                    catCollection: self.catdata,
                    education:'educationctegory'
                  });

                self.subjectCollectionView = new admin.MgntSubjectCollectionView({
                    el: $( '#edu_sub_category' )
                  });
               
                  self.catCollectionView.subjectCollectionView = self.subjectCollectionView; 
                  // country details 

                  self.countryCollectioncustomerview = new admin.MgntCountryCollectionView({
                  el: $( '#edu_country' ),
                  mode:'state',
                  countryCollection: self.countrydata

                 }); 
                  self.secqusCollectionView = new admin.MgmtSecQusCollectionView({
                    el: $( '#question_id' ),
                    secqusCollection: self.secqusdata
                 }); 

                  
              });
           
           
        } else {

          var requestJson = JSON.stringify({"customer_id":this.customerId});
          $.when(
              $.ajax({
              url: "/eprayoga/admin/get_customer_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {                    
                    self.customerData = data;                           
                   
                  },
                  error: function(data) {  
                    errorhandle(data);                   
                  }
                }),
               $.ajax({
              url: "/eprayoga/admin/get_category_list_cust",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                    
                     self.catdata = data;
                  },
                  error: function(data) {
                         errorhandle(data);   
                  }
                }),
               $.ajax({
                  url: "/eprayoga/admin/getcountryincustomer",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {

                     self.countrydata = data;
                  },
                  error: function(data) {
                      errorhandle(data);
                  }
                }),
              $.ajax({
                  url: "/eprayoga/admin/select_security_questions",
                  type: "GET",
                   data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                     self.secqusdata = data;
                  },
                  error: function(data) {
                      errorhandle(data);
                  }
                }),
                $.ajax({
                  url: "/eprayoga/admin/select_address_type",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                     self.addressTypeData = data;
                   
                  },
                  error: function(data) {
                        errorhandle(data);
                  }
                }),
                $.ajax({
                  url: "/eprayoga/admin/select_zone",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                    
                     self.zonedata = data;
                  },
                  error: function(data) {
                      errorhandle(data);
                  }
                }),
                $.ajax({
                  url: "/eprayoga/admin/select_origin_type",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   
                     self.origindata = data;
                  },
                  error: function(data) { 
                     errorhandle(data);                        
                  }
                })
              ).done(function(){
                  self.render();
                  $('#cust_sex').val(self.customerData.cust_sex);
                  
                  //$('#cust_off_phone_number').val(self.customerData.cust_off_phone_number);
                  var phone_code_number = self.customerData.cust_off_phone_number;

                  var splt1 = phone_code_number.split("-")[0];
                  var splt2 = phone_code_number.split("-")[1];

                   $('#phone_code1').val(splt1);
                   $('#cust_off_phone_number').val(splt2);

                   var resphone_code_number = self.customerData.cust_res_phone_number;

                  var splt3 = resphone_code_number.split("-")[0];
                  var splt4 = resphone_code_number.split("-")[1];

                   $('#phone_code2').val(splt3);
                   $('#cust_res_phone_number').val(splt4);


                  // category & subject
                  self.catCollectionView = new admin.MgntCategoryCollectionView({
                    el: $( '#edu_category_name' ),
                    catCollection: self.catdata
                  });

                  /*self.subjectCollectionView = new admin.MgntSubjectCollectionView({
                    el: $( '#edu_sub_category' )
                  });*/
                  
                  //self.catCollectionView.subjectCollectionView = self.subjectCollectionView; 
                  // country details 
                  self.countryCollectioncustomerview = new admin.MgntCountryCollectionView({
                  el: $( '#edu_country' ),
                  countryCollection: self.countrydata
                 }); 
                    self.secqusCollectionView = new admin.MgmtSecQusCollectionView({
                    el: $( '#question_id' ),
                    secqusCollection: self.secqusdata
                 }); 
                     self.originCollectionView = new admin.MgmtOriginCollectionView({
                     el: $( '#orig_type_id' ),
                    originCollection: self.origindata
                 });
                     self.addressTypeCollectionView = new admin.MgmtAddressTypeCollectionView({
                    el: $( '#address_type' ),
                    addressTypeCollection: self.addressTypeData
                 });

                self.addressTypeCollectionView = new admin.MgmtAddressTypeCollectionView({
                    el: $( '#address_type2' ),
                    addressTypeCollection: self.addressTypeData
                 });
                      // ADDRESS TYPE 1
                self.zoneCollectionView = new admin.MgntZoneCollectionView({
                    el: $( '#select_zone' ),
                    zoneCollection: self.zonedata,
                    country_id : self.customerData.address[0].country_id,
                    mode:'address_type1'
                });

                self.countryCollectionView = new admin.MgntCountryCollectionView({
                  el: $( '#select_country' ),
                  state_id : self.customerData.address[0].state_id,
                  mode:'address_type1'
                 });

                self.stateCollectionView = new admin.MgntStateCollectionView({
                  el: $( '#select_state' ),
                  city_id: self.customerData.address[0].city_id,
                  mode:'address_type1'
                 });

                self.cityCollectionView = new admin.MgntCityCollectionView({
                  el: $( '#select_city' ),
                  mode:'address_type1'
                 });               

                self.zoneCollectionView.countryCollectionView = self.countryCollectionView;                
                self.countryCollectionView.stateCollectionView =  self.stateCollectionView;
                self.stateCollectionView.cityCollectionView =  self.cityCollectionView;

                $('#select_zone').val(self.customerData.address[0].zone_id);
                  self.zoneCollectionView.isSelected();
                  $('#select_country').val(self.customerData.address[0].country_id);
                   self.countryCollectionView.isSelected();
                  $('#select_state').val(self.customerData.address[0].state_id);
                   self.stateCollectionView.isSelected();
                  $('#select_city').val(self.customerData.address[0].city_id);

                $('#address_type').val(self.customerData.address[0].add_type_id);

                // address type 2
                self.zoneCollectionView2 = new admin.MgntZoneCollectionView({
                    el: $( '#select_zone2' ),
                    zoneCollection: self.zonedata,
                    country_id : self.customerData.address[1].country_id,
                    mode:'address_type2'
                });

                self.countryCollectionView2 = new admin.MgntCountryCollectionView({
                  el: $( '#select_country2' ),
                  state_id : self.customerData.address[1].state_id,
                  mode:'address_type2'
                 });

                self.stateCollectionView2 = new admin.MgntStateCollectionView({
                  el: $( '#select_state2' ),
                  city_id: self.customerData.address[1].city_id,
                  mode:'address_type2'
                 });

                self.cityCollectionView2 = new admin.MgntCityCollectionView({
                  el: $( '#select_city2' ),
                  mode:'address_type2'
                 });               

                self.zoneCollectionView2.countryCollectionView2 = self.countryCollectionView2;                
                self.countryCollectionView2.stateCollectionView2 =  self.stateCollectionView2;
                self.stateCollectionView2.cityCollectionView2 =  self.cityCollectionView2;


                  // category subject

                  self.catCollectionView = new admin.MgntCategoryCollectionView({
                    el: $( '#edu_category_name' ),
                    catCollection: self.catdata,
                     education:'educationctegory',
                     subject_id:self.customerData.education.edu_sub_category
                  });

                self.subjectCollectionView = new admin.MgntSubjectCollectionView({
                    el: $( '#edu_sub_category' )
                  });

                  self.catCollectionView.subjectCollectionView = self.subjectCollectionView; 
                  //alert(self.customerData.education.edu_category_name);
                    $('#edu_category_name').val(self.customerData.education.edu_category_name);
                   self.catCollectionView.isSelected();  

                    $('#edu_sub_category').val(self.customerData.education.edu_sub_category);
                   self.subjectCollectionView.isSelected();  

                  $('#select_zone2').val(self.customerData.address[1].zone_id);
                  self.zoneCollectionView2.isSelected();

                  $('#select_country2').val(self.customerData.address[1].country_id);
                   self.countryCollectionView2.isSelected();

                  $('#select_state2').val(self.customerData.address[1].state_id);
                   self.stateCollectionView2.isSelected();
                   
                  $('#select_city2').val(self.customerData.address[1].city_id);                
                  $('#address_type2').val(self.customerData.address[1].add_type_id);

                  $('#orig_type_id').val(self.customerData.orig_type_id);
                  
                  $('#edu_university_name').val(self.customerData.education.edu_university_name);
                  $('#edu_university_code').val(self.customerData.education.edu_univ_code);


                  $('#edu_country').val(self.customerData.education.edu_country);
                  $('#question_id').val(self.customerData.security_qus.question_id);
                  $('#cust_answer').val(self.customerData.security_qus.cust_answer);              
                  
                  
            });
        }
      // this.render();
     },
    events: {
    'click  #save_cus_registration'  : 'saveCusRegistration',
    'click  #cancel_cus_registration' : 'cancelCreateForm',
    'click  #cust_first_name':'cust_first_name',
    'click  #cust_last_name':'cust_last_name',
    'click  #cust_mother_name':'cust_mother_name',
    'click  #cust_father_name':'cust_father_name',
    'click  #cust_pan':'cust_pan',
    'click  #cust_sex':'cust_sex',
    'click  #cust_dob':'cust_dob',
    'click  #cust_passport':'cust_passport',
    'click  #cust_off_phone_number':'cust_off_phone_number',
    'click  #cust_mobile_phone_number':'cust_mobile_phone_number',
    'click  #cust_res_phone_number':'cust_res_phone_number',
    'click  #cust_per_emai_id':'cust_per_emai_id',
    'click  #cust_off_email_id':'cust_off_email_id',
    'click  #cust_facebook_id':'cust_facebook_id',
    'click  #cust_twitter_id':'cust_twitter_id',
    'click  #cust_aadhar_number':'cust_aadhar_number',
    'click  #orig_type_id':'orig_type_id',
    //'click  #cust_photo_file_name':'cust_photo_file_name',
    'click  #edu_sub_category':'edu_sub_category',
    'click  #edu_active':'edu_active',
    'click  #edu_country':'edu_country',
    'click  #edu_university_name':'edu_university_name',
    'click  #edu_university_code':'edu_university_code',
    'click  #cust_add_line_1'    : 'addLine1Focus',
    'click  #cust_add_line_2'    : 'addLine2Focus',
    'click  #cust_add_line_3'    : 'addLine3Focus',
    'click  #cust_add_landmark'    : 'landmarkFocus',
    'click  #select_zone'   : 'zoneFocus',
    'click  #select_country'   : 'countryFocus',
    'click  #select_state'   : 'stateFocus',
    'click  #select_city'   : 'cityFocus',
    'click  #cust_add_1'    : 'add1Focus',
    'click  #cust_add_2'    : 'add2Focus',
    'click  #cust_add_3'    : 'add3Focus',
    'click  #cust_landmark2'    : 'landmark2Focus',
    'click  #select_zone2'   : 'zone2Focus',
    'click  #select_country2'   : 'country2Focus',
    'click  #select_state2'   : 'state2Focus',
    'click  #select_city2'   : 'city2Focus',
    'click  #cust_answer'    : 'answerFocus',
    'click  #address_type':'address_type',
    'click  #address_type2':'address_type2',
    'click  #question_id':'question_id',
    'click  #edu_category_name':'edu_category_name',
    'click  #cust_answer':'cust_answer',
    'click #phone_code1' : 'phone_code_focus',
    'click #phone_code2' : 'resphone_code_focus'
  },

    render: function() {

    if (new String(this.mode).valueOf() == new String('create').valueOf()) {
      this.$el.html(this.template); 
      this.$el.append(this.template1);      
      initializeTabMenu(); 
      } else { //edit
        this.$el.html(this.template( this.customerData ));
        this.$el.append(this.template1); 
        initializeTabMenu(); 
    } 
     $('#cust_dob').datetimepicker();
        return this;
  },

   validatingBasicInfo: function(e){
    document.getElementById("cust_first_name_error").innerHTML="";
    document.getElementById("cust_last_name_error").innerHTML="";
    document.getElementById("news_date_error").innerHTML="";
    document.getElementById("cust_pan_error").innerHTML="";
    document.getElementById("cust_passport_error").innerHTML="";
    document.getElementById("cust_sex_error").innerHTML="";
    document.getElementById("cust_off_email_id_error").innerHTML="";
    //document.getElementById("cust_off_code_number_error").innerHTML="";
    //document.getElementById("cust_off_phone_number_error").innerHTML="";
    document.getElementById("cust_mobile_phone_number_error").innerHTML="";
    //document.getElementById("cust_res_code_number_error").innerHTML="";
    //document.getElementById("cust_res_phone_number_error").innerHTML="";
    document.getElementById("cust_facebook_id_error").innerHTML="";
    document.getElementById("cust_twitter_id_error").innerHTML="";
    document.getElementById("cust_mother_name_error").innerHTML="";
    document.getElementById("cust_father_name_error").innerHTML="";
    //document.getElementById("cust_photo_file_name_error").innerHTML="";
    document.getElementById("cust_aadhar_number_error").innerHTML="";
    document.getElementById("orig_type_id_error").innerHTML="";
    var regex=/^[a-zA-Z][a-zA-Z-_.&\s0-9]+$/;
     var regex1=/^[a-zA-Z][a-zA-Z0-9]+$/;
      //var regex1=/^[A-Za-z]{5}\d{4}[A-Za-z]{1}+$/;
     var regex2=/^[a-zA-Z0-9]+$/;
     var regex3=/^[0-9]+$/;



      if ($('#cust_first_name').val().trim() == '' ) {
        $('#cust_first_name').focus();
        document.getElementById('cust_first_name_error').innerHTML= "Please enter the first name";             
        return false;
      } 

      if( !validateName($('#cust_first_name').val().trim())){
       
         document.getElementById('cust_first_name_error').innerHTML= "Please provide valid first name";             
        return false;
      }
      if ($('#cust_last_name').val().trim() == '' ) {
        $('#cust_last_name').focus();
        document.getElementById('cust_last_name_error').innerHTML= "Please enter the last name";             
        return false;
      } 

      if( !validateName($('#cust_last_name').val().trim())){
       
         document.getElementById('cust_last_name_error').innerHTML= "Please provide valid last name";             
        return false;
      }

      if ($('#cust_dob').val().trim() == '' ) {
        $('#cust_dob').focus();
        document.getElementById('news_date_error').innerHTML= "Please select Date";             
        return false;
      } 
      if ($('#cust_pan').val().trim() == '' ) {
        $('#cust_pan').focus();
        document.getElementById('cust_pan_error').innerHTML= "Please enter the PAN";             
        return false;
      } 

      if (!regex1.test($('#cust_pan').val().trim())) {
          $('#cust_pan').focus();
         
          document.getElementById('cust_pan_error').innerHTML= "Please provide valid PAN";
          return false;
      } 
      if ($('#cust_passport').val().trim() == '' ) {
        $('#cust_passport').focus();
        document.getElementById('cust_passport_error').innerHTML= "Please enter the PASSPORT";             
        return false;
      } 

      if (!regex1.test($('#cust_passport').val().trim())) {
       
          $('#cust_passport').focus();
          document.getElementById('cust_passport_error').innerHTML= "Please provide valid PASSPORT";
          return false;
      } 

       if ($('#cust_sex').val().trim() == '' ) {
        $('#cust_sex').focus();
       
        document.getElementById('cust_sex_error').innerHTML= "Please select the Gender";             
        return false;
      }

       if ($('#cust_off_email_id').val().trim() == '' ) {
        $('#cust_off_email_id').focus();
        document.getElementById('cust_off_email_id_error').innerHTML= "Please enter the Email id";             
        return false;
      } 

      if( !validateEmail($('#cust_off_email_id').val().trim())){

         document.getElementById('cust_off_email_id_error').innerHTML= "Please provide valid email id";             
        return false;
      } 

      if ($('#phone_code1').val().trim() == '' ) {
        $('#phone_code1').focus();
        document.getElementById('cust_off_code_number_error').innerHTML= "Enter Code";             
        return false;
      } 

      if (!regex3.test($('#phone_code1').val().trim())) {
          $('#phone_code1').focus();
          document.getElementById('cust_off_code_number_error').innerHTML= "enter valid phone number";
          return false;
      } 


      if ($('#cust_off_phone_number').val().trim() == '' ) {
        $('#cust_off_phone_number').focus();
        document.getElementById('cust_off_phone_number_error').innerHTML= "Enter the  number";             
        return false;
      } 

      // if( !validateNumber($('#cust_off_phone_number').val().trim())){
     
      //    document.getElementById('cust_off_phone_number_error').innerHTML= "Please provide valid  number";             
      //   return false;
      // }
      if (!regex3.test($('#cust_off_phone_number').val().trim())) {
          $('#cust_off_phone_number').focus();
          document.getElementById('cust_off_phone_number_error').innerHTML= "Enter the  number";
          return false;
      } 

      if ($('#cust_mobile_phone_number').val().trim() == '' ) {
        $('#cust_mobile_phone_number').focus();
        document.getElementById('cust_mobile_phone_number_error').innerHTML= "Please enter the  number";             
        return false;
      } 

      if( !validateMobile($('#cust_mobile_phone_number').val().trim())){
       
         document.getElementById('cust_mobile_phone_number_error').innerHTML= "Please provide valid  number";             
        return false;
      }

       if ($('#cust_per_emai_id').val().trim() == '' ) {
        $('#cust_per_emai_id').focus();
        document.getElementById('cust_per_emai_id_error').innerHTML= "Please enter the Email id";             
        return false;
      } 

      if( !validateEmail($('#cust_per_emai_id').val().trim())){
       
         document.getElementById('cust_per_emai_id_error').innerHTML= "Please provide valid email id";             
        return false;
      }
      if ($('#phone_code2').val().trim() == '' ) {
        $('#phone_code2').focus();
        document.getElementById('cust_res_code_number_error').innerHTML= "Enter Code";             
        return false;
      } 

      if (!regex3.test($('#phone_code2').val().trim())) {
          $('#phone_code2').focus();
          document.getElementById('cust_res_code_number_error').innerHTML= "enter valid code";
          return false;
      } 
 

       if ($('#cust_res_phone_number').val().trim() == '' ) {
        $('#cust_res_phone_number').focus();
        document.getElementById('cust_res_phone_number_error').innerHTML= " enter the  number";             
        return false;
      } 

      // if( !validateNumber($('#cust_res_phone_number').val().trim())){
     
      //    document.getElementById('cust_res_phone_number_error').innerHTML= "Please provide valid  number";             
      //   return false;
      // }
      if (!regex3.test($('#cust_res_phone_number').val().trim())) {
          $('#cust_res_phone_number').focus();
          document.getElementById('cust_res_phone_number_error').innerHTML= "enter the  number";
          return false;
      } 

      if ($('#cust_aadhar_number').val().trim() == '' ) {
        $('#cust_aadhar_number').focus();
        document.getElementById('cust_aadhar_number_error').innerHTML= "Please enter the aadhar number";             
        return false;
      } 

      if (!regex3.test($('#cust_aadhar_number').val().trim())) {
         $('#cust_aadhar_number').focus();
         document.getElementById('cust_aadhar_number_error').innerHTML= "Please provide valid aadhar number";             
         return false;
      }

       if ($('#cust_facebook_id').val().trim() == '' ) {
        $('#cust_facebook_id').focus();
        document.getElementById('cust_facebook_id_error').innerHTML= "Please enter the Facebook id";             
        return false;
      } 

      if( !validateFb($('#cust_facebook_id').val().trim())){
      
         document.getElementById('cust_facebook_id_error').innerHTML= "Please provide valid Facebook id";             
        return false;
      }

      if ($('#cust_twitter_id').val().trim() == '' ) {
        $('#cust_twitter_id').focus();
        document.getElementById('cust_twitter_id_error').innerHTML= "Please enter the twitter id";             
        return false;
      } 

      if( !validateFb($('#cust_twitter_id').val().trim())){
       
         document.getElementById('cust_twitter_id_error').innerHTML= "Please provide valid twitter id";             
        return false;
      }

      if ($('#cust_mother_name').val().trim() == '' ) {
        $('#cust_mother_name').focus();
        document.getElementById('cust_mother_name_error').innerHTML= "Please enter the mother name";             
        return false;
      } 

      if( !validateName($('#cust_mother_name').val().trim())){
       
         document.getElementById('cust_mother_name_error').innerHTML= "Please provide valid mother name";             
        return false;
      }
      if ($('#cust_father_name').val().trim() == '' ) {
        $('#cust_father_name').focus();
        document.getElementById('cust_father_name_error').innerHTML= "Please enter the father name";             
        return false;
      } 

      if( !validateName($('#cust_father_name').val().trim())){
       
         document.getElementById('cust_father_name_error').innerHTML= "Please provide valid father name";             
        return false;
      }
      
  
      if($('#orig_type_id').val().trim() == '' ) {
        $('#orig_type_id').focus();
        document.getElementById('orig_type_id_error').innerHTML= "Please select the origin";             
        return false;
       } 
       
       return true;

  },

  validatingAddress1: function(e){

       document.getElementById("address_type_error").innerHTML="";
       document.getElementById("cust_add_line_1_error").innerHTML="";
       document.getElementById("cust_add_line_2_error").innerHTML="";
       document.getElementById("cust_add_line_3_error").innerHTML="";
       document.getElementById("cust_add_landmark_error").innerHTML="";
       document.getElementById("select_zone_error").innerHTML="";
       document.getElementById("select_country_error").innerHTML="";
       document.getElementById("select_state_error").innerHTML="";
       document.getElementById("select_city_error").innerHTML="";
       var countryVal = $('#select_country').val();
       var stateVal = $('#select_state').val();
       var cityVal = $('#select_city').val();
       var address_typeval = $('#address_type').val();
       var address_type2val = $('#address_type2').val();

       
     
        
      if(address_typeval == '' || address_typeval == undefined || address_typeval == null){
         $('#address_type').focus();
          document.getElementById('address_type_error').innerHTML= "Please select the address type";   
        return false; 
      }

      if ($('#cust_add_line_1').val().trim() == '' ) {
        $('#cust_add_line_1').focus();
        document.getElementById('cust_add_line_1_error').innerHTML= "Please enter the address";             
        return false;
      } 

      if ($('#cust_add_line_2').val().trim() == '' ) {
        $('#cust_add_line_2').focus();
        document.getElementById('cust_add_line_2_error').innerHTML= "Please enter the address";             
        return false;
      } 

      if ($('#cust_add_line_3').val().trim() == '' ) {
        $('#cust_add_line_3').focus();
        document.getElementById('cust_add_line_3_error').innerHTML= "Please enter the address";             
        return false;
      } 

      if ($('#cust_add_landmark').val().trim() == '' ) {
        $('#cust_add_landmark').focus();
        document.getElementById('cust_add_landmark_error').innerHTML= "Please enter the landmark";             
        return false;
      } 

      if ($('#select_zone').val().trim() == '' ) {
        $('#select_zone').focus();
        document.getElementById('select_zone_error').innerHTML= "Please select the zone";             
        return false;
      } 

      if ((countryVal == '' ) || (countryVal == null) || (countryVal == undefined)) {
        $('#select_country').focus();
        document.getElementById('select_country_error').innerHTML= "Please select the country";             
        return false;
      } 

      if ((stateVal == '' ) || (stateVal == null) || (stateVal == undefined)) {
        $('#select_state').focus();
        document.getElementById('select_state_error').innerHTML= "Please select the state";             
        return false;
      } 

      if ((cityVal == '' ) || (cityVal == null) || (cityVal == undefined)) {
        $('#select_city').focus();
        document.getElementById('select_city_error').innerHTML= "Please select the city";             
        return false;
      } 

      return true;
   },

   validatingAddress2: function(e){
       document.getElementById("address_type2_error").innerHTML="";
       document.getElementById("cust_add_1_error").innerHTML="";
       document.getElementById("cust_add_2_error").innerHTML="";
       document.getElementById("cust_add_3_error").innerHTML="";
       document.getElementById("cust_landmark2_error").innerHTML="";
       document.getElementById("select_zone_error").innerHTML="";
       document.getElementById("select_country_error").innerHTML="";
       document.getElementById("select_state_error").innerHTML="";
       document.getElementById("select_city_error").innerHTML="";

       var countryVal2 = $('#select_country2').val();
       var stateVal2 = $('#select_state2').val();
       var cityVal2 = $('#select_city2').val();
       var address_typeval = $('#address_type').val();
       var address_type2val = $('#address_type2').val();

     

      if(address_type2val == '' || address_type2val == undefined || address_type2val == null){
        $('#address_type2').focus();
        document.getElementById('address_type2_error').innerHTML= "Please select the address type";
        return false;
      }
      else if(address_type2val == '1' || address_type2val == '2'){
        if(address_typeval == address_type2val ){
           $('#address_type2').focus();
           document.getElementById('address_type2_error').innerHTML= "Please select the different address type";   
           return false;
        }
      }

      if ($('#cust_add_1').val().trim() == '' ) {
        $('#cust_add_1').focus();
        document.getElementById('cust_add_1_error').innerHTML= "Please enter the address";             
        return false;
      } 

      if ($('#cust_add_2').val().trim() == '' ) {
        $('#cust_add_2').focus();
        document.getElementById('cust_add_2_error').innerHTML= "Please enter the address";             
        return false;
      } 

      if ($('#cust_add_3').val().trim() == '' ) {
        $('#cust_add_3').focus();
        document.getElementById('cust_add_3_error').innerHTML= "Please enter the address";             
        return false;
      } 

      if ($('#cust_landmark2').val().trim() == '' ) {
        $('#cust_landmark2').focus();
        document.getElementById('cust_landmark2_error').innerHTML= "Please enter the landmark";             
        return false;
      } 

       if ($('#select_zone2').val().trim() == '' ) {
        $('#select_zone2').focus();
        document.getElementById('select_zone2_error').innerHTML= "Please select the zone";             
        return false;
      } 

      if ((countryVal2 == '' ) || (countryVal2 == null) || (countryVal2 == undefined)) {
        $('#select_country2').focus();
        document.getElementById('select_country2_error').innerHTML= "Please select the country";             
        return false;
      } 

      if ((stateVal2 == '' ) || (stateVal2 == null) || (stateVal2 == undefined)) {
        $('#select_state2').focus();
        document.getElementById('select_state2_error').innerHTML= "Please select the state";             
        return false;
      } 

      if ((cityVal2 == '' ) || (cityVal2 == null) || (cityVal2 == undefined)) {
        $('#select_city2').focus();
        document.getElementById('select_city2_error').innerHTML= "Please select the city";             
        return false;
      } 

      return true;
   },

   educationdetails:function(e){
    document.getElementById("edu_category_name_error").innerHTML="";
    document.getElementById("edu_sub_category_error").innerHTML="";
    document.getElementById("edu_active_error").innerHTML="";
    document.getElementById("edu_university_name_error").innerHTML="";
    document.getElementById("edu_university_code_error").innerHTML="";
    document.getElementById("edu_country_error").innerHTML="";

    if ($('#edu_category_name').val().trim() == '' ) {
        $('#edu_category_name').focus();
        document.getElementById('edu_category_name_error').innerHTML= "Please select the category";             
        return false;
      } 
      if ($('#edu_sub_category').val().trim() == '' ) {
        $('#edu_sub_category').focus();
        document.getElementById('edu_sub_category_error').innerHTML= "Please select the subject";             
        return false;
      } 
      if ($('#edu_active').val().trim() == '' ) {
        $('#edu_active').focus();
        document.getElementById('edu_active_error').innerHTML= "Please select the student";             
        return false;
      } 
     
      if ($('#edu_university_name').val().trim() == '' ) {
        $('#edu_university_name').focus();
        document.getElementById('edu_university_name_error').innerHTML= "Please enter the university name";             
        return false;
      } 

      if( !validateName($('#edu_university_name').val().trim())){
         document.getElementById('edu_university_name_error').innerHTML= "Please provide valid university name";             
        return false;
      }
      if ($('#edu_university_code').val().trim() == '' ) {
        $('#edu_university_code').focus();
        document.getElementById('edu_university_code_error').innerHTML= "Please enter the university code";             
        return false;
      } 

      if( !validateunivrsitycode($('#edu_university_code').val().trim())){
         document.getElementById('edu_university_code_error').innerHTML= "Please provide valid university code";             
        return false;
      }
       if ($('#edu_country').val().trim() == '' ) {
        $('#edu_country').focus();
        document.getElementById('edu_country_error').innerHTML= "Please select the country";             
        return false;
      } 
      return true;
   },



  saveCusRegistration:function(e){
    e.preventDefault();
    var self = this;

        var phone_number = document.getElementById('phone_code1').value + '-' + 
            document.getElementById('cust_off_phone_number').value;
        var phone_number1 = document.getElementById('phone_code2').value + '-' + 
            document.getElementById('cust_res_phone_number').value;
         // alert(mobile_number);

    if(this.validatingBasicInfo() != true){
        $('#form-tabs-t-0').trigger('click');
        return false;

    }
    else if(this.validatingAddress1() != true){
        $('#form-tabs-t-1').trigger('click');
        return false;
    }
    else if(this.validatingAddress2() != true){
        $('#form-tabs-t-2').trigger('click');
        return false;
    }
    else if(this.educationdetails() != true){
       $('#form-tabs-t-3').trigger('click');
       return false;
        //alert("test");
    }
    else{
        $('#form-tabs-t-4').trigger('click');
        // document.getElementById("question_id").innerHTML="";
         document.getElementById("question_id_error").innerHTML="";
         document.getElementById("cust_answer_error").innerHTML="";

      if ($('#question_id').val().trim() == '' ) {
         $('#question_id').focus();
         document.getElementById('question_id_error').innerHTML= "Please select the question";             
        return false;
       } 

      if ($('#cust_answer').val().trim() == '' ) {
        $('#cust_answer').focus();
        document.getElementById('cust_answer_error').innerHTML= "Please enter the answer";             
        return false;
      } 
      
    var custFormData = {
            "user_type_id": "1",
            "cust_first_name": $('#cust_first_name').val(),
            "cust_last_name":$('#cust_last_name').val(),
            "cust_dob":$('#cust_dob').val(),
            "cust_aadhar_number":$('#cust_aadhar_number').val(),
            "cust_pan":$('#cust_pan').val(),
            "cust_passport":$('#cust_passport').val(),
            "cust_sex":$('#cust_sex').val(),
            //"cust_res_phone_number":$('#cust_res_phone_number').val(),
            "cust_mobile_phone_number":$('#cust_mobile_phone_number').val(),
            //"cust_off_phone_number":$('#cust_off_phone_number').val(),
            "cust_off_email_id":$('#cust_off_email_id').val(),
            "cust_per_emai_id":$('#cust_per_emai_id').val(),
            "cust_twitter_id":$('#cust_twitter_id').val(),
            "cust_facebook_id":$('#cust_facebook_id').val(),
            "cust_photo_file_name":"aaaa",
            //"cust_photo_file_name":$('#cust_photo_file_name').val(),
            "cust_photo_location":"a",
            "orig_type_id":$('#orig_type_id').val(),
            "cust_father_name":$('#cust_father_name').val(),
            "cust_mother_name":$('#cust_mother_name').val(),
            "created_by_user_id": "1",
            "last_update_user_id": "12",
            "address_type1":{
                "address_id" : $('#add_id1').val(),
                "add_id": "1",
                "add_type_id": $('#address_type').val(),
                "cust_add_line_1" : $('#cust_add_line_1').val(),
                "cust_add_line_2": $('#cust_add_line_2').val(),
                "cust_add_line_3": $('#cust_add_line_3').val(),
                "cust_add_landmark": $('#cust_add_landmark').val(),
                "country_id": $('#select_country').val(),
                "state_id": $('#select_state').val(),
                "city_id": $('#select_city').val(),
                "zone_id": $('#select_zone').val(),
                "clnt_group_id": "1",
                "created_by_user_id": "1",
                "last_update_user_id": "12"
                
              },
            "address_type2":{
              "address_id" : $('#add_id2').val(),
                "add_id": "1",
                "add_type_id": $('#address_type2').val(),
                "cust_add_line_1" : $('#cust_add_1').val(),
                "cust_add_line_2": $('#cust_add_2').val(),
                "cust_add_line_3": $('#cust_add_3').val(),
                "cust_add_landmark": $('#cust_landmark2').val(),
                "country_id": $('#select_country2').val(),
                "state_id": $('#select_state2').val(),
                "city_id": $('#select_city2').val(),
                "zone_id": $('#select_zone2').val(),
                "clnt_group_id": "1",
                "created_by_user_id": "1",
                "last_update_user_id": "12"
                
          },
          "education": {
            "edu_univ_code": $('#edu_university_code').val(),
            "edu_active":$( "input[type=radio][name=edu_student]:checked" ).val(),
            "edu_category_name": $('#edu_category_name').val(),
            "edu_sub_category": $('#edu_sub_category').val(),
            "edu_university_name": $('#edu_university_name').val(),
            "edu_country": $('#edu_country').val(),
            "created_by_user_id": "1",
            "last_update_user_id": "12"
          },
            "security-qus":{
              "question_id" : $('#question_id').val(),
              "cust_answer": $('#cust_answer').val(),
              "created_by_user_id": 1,
              "last_update_user_id": 12
            }
  
      };
    }
    

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {

            custFormData.cust_res_phone_number = phone_number1;
            custFormData.cust_off_phone_number = phone_number;
            custFormData.customer_id = this.customerId;
            //clientFormData.clnt_id = parseInt($('#clnt_id').val(), 10);
          //  clientFormData.clnt_id = parseInt($('#clnt_id').val(), 10);                
            var requestData = JSON.stringify(custFormData); 
            savecustomer = "/eprayoga/admin/update_customer";
            var successMsg = "Customer Updated Successfully.";
            var failureMsg = "Error while updating the Customer.Please Contact Administrator.";
      } else {
            custFormData.cust_res_phone_number = phone_number1;
            custFormData.cust_off_phone_number = phone_number;
            var requestData = JSON.stringify(custFormData); 
            savecustomer = "/eprayoga/admin/create_customer";
            var successMsg = "Record Saved Successfully.";
            var failureMsg = "Error while creating the Customer.Please Contact Administrator.";
      }

      
          $('#save_cus_registration').attr('disabled','disabled');
          $.ajax({
          url     :savecustomer,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
          
            if(data.message == 'create'){
              var dat = String(data.id);
               dat += "  ";
            var sendmail = new admin.SendingMailModel();
            sendmail.save({
              data:{ email:dat},
            },
              { 
                url: 'dummyurl',
                protocol: 'ws',
                operation: 'sendMail',
                wait: true
            });
              if(admin.mode == 0){
          
              $('#messagepop').text(successMsg); 
               $('#myModalPopup').modal('show');
               $('.okClass').bind('click', self.routepopup);
              }else{
  
                 
                 $('#messagepop').text("Registration Completed Successfully. You will receive email shortly"); 
                 $('#myModalPopup').modal('show');
                 $('.okClass').bind('click', self.routepopup1);
              }
             

            }
            if(data.message == 'update'){
              
             $('#save_cus_registration').removeAttr('disabled');
             $('#messagepop').text(successMsg); 
             $('#myModalPopup').modal('show');
             $('.okClass').bind('click', self.routepopup);
            }
           // appRouter.navigate("customermanagement", {trigger: true});
           // window.open("/message","_self");
            
          },
          error: function(data) {
            $('#save_cus_registration').removeAttr('disabled');
           
            var errData = JSON.parse(data.responseText);
            var errMail = data.responseJSON.data.emailmsg;
            // $('#form-tabs-t-0').trigger('click');

           if(errData.cust_aadhar_number){
            
            var nameMsg = JSON.stringify(errData.cust_aadhar_number[0]);
            var nameerrormsg = nameMsg.replace(/\"/g, "");
            $( "#cust_aadhar_number_error").html('The aadhar number has already been taken');
            $('#form-tabs-t-0').trigger('click');
           }
           else if(errData.cust_pan){
            var nameMsg = JSON.stringify(errData.cust_pan[0]);
            var nameerrormsg = nameMsg.replace(/\"/g, "");
            $('#form-tabs-t-0').trigger('click');
            $( "#cust_pan_error").html('The pan number has already been taken');
            $('#form-tabs-t-0').trigger('click');
           }
           else if(errData.cust_passport){          
            var nameMsg = JSON.stringify(errData.cust_passport[0]);
            var nameerrormsg = nameMsg.replace(/\"/g, "");
            $( "#cust_passport_error").html('The passport number has already been taken');
            $('#form-tabs-t-0').trigger('click');
           }
           else if(errData.cust_mobile_phone_number){           
            var nameMsg = JSON.stringify(errData.cust_mobile_phone_number[0]);
            var nameerrormsg = nameMsg.replace(/\"/g, "");
            $( "#cust_mobile_phone_number_error").html('The mobile number has already been taken');
            $('#form-tabs-t-0').trigger('click');
           }
           else if(errData.cust_per_emai_id){           
            var nameMsg = JSON.stringify(errData.cust_per_emai_id[0]);
            var nameerrormsg = nameMsg.replace(/\"/g, "");
            $( "#cust_per_emai_id_error").html('The per email id has already been taken');
            $('#form-tabs-t-0').trigger('click');
           }
           else if(errData.cust_off_email_id){

            var nameMsg = JSON.stringify(errData.cust_off_email_id[0]);
            var nameerrormsg = nameMsg.replace(/\"/g, "");
            $( "#cust_off_email_id_error").html('The off email id has already been taken.');
            $('#form-tabs-t-0').trigger('click');
           }

         if(errMail){
            $('#messagepop').text(errMail + " Has Already Tacken"); 
            $('#myModalPopup').modal('show');
            return false;
          }else{
            errorhandle(data);
          }
           
                 } 
        }); 


  },
  routepopup: function(){
    $('.modal-backdrop').remove(); 
   
   appRouter.navigate("customermanagement", {trigger: true});

  },
  routepopup1: function(){
    $('.modal-backdrop').remove(); 
   
    window.open("/message","_self");
    

  },

  cancelCreateForm:function(e){
       e.preventDefault();
           appRouter.navigate("customermanagement", {trigger: true});  
  },

  cust_first_name:function(){
    $('#cust_first_name_error').html("");

  },
  cust_last_name:function(){
    $('#cust_last_name_error').html("");

  },
  cust_mother_name:function(){
    $('#cust_mother_name_error').html("");

  },
  cust_father_name:function(){
    $('#cust_father_name_error').html("");

  },
  cust_pan:function(){
    $('#cust_pan_error').html("");

  },
  cust_sex:function(){
    $('#cust_sex_error').html("");

  },
  cust_per_emai_id:function(){
    $('#cust_per_emai_id_error').html("");

  },
  cust_off_email_id:function(){
    $('#cust_off_email_id_error').html("");

  },
  cust_facebook_id:function(){
    $('#cust_facebook_id_error').html("");

  },
  cust_twitter_id:function(){
    $('#cust_twitter_id_error').html("");

  },
  cust_aadhar_number:function(){
    $('#cust_aadhar_number_error').html("");

  },
  orig_type_id:function(){
    $('#orig_type_id_error').html("");

  },
  /*cust_photo_file_name:function(){
    $('#cust_photo_file_name_error').html("");

  },*/
  edu_sub_category:function(){
    $('#edu_sub_category_error').html("");

  },
  edu_category_name:function(){
    $('#edu_category_name_error').html("");

  },
  edu_active:function(){
    $('#edu_active_error').html("");

  },
  edu_country:function(){
    $('#edu_country_error').html("");

  },
  edu_university_name:function(){
    $('#edu_university_name_error').html("");

  },
  edu_university_code:function(){
    $('#edu_university_code_error').html("");

  },

  addLine1Focus: function() {
     $('#cust_add_line_1_error').html("");
   },

   addLine2Focus: function() {
     $('#cust_add_line_2_error').html("");
   },

   addLine3Focus: function() {
     $('#cust_add_line_3_error').html("");
   },

   landmarkFocus: function() {
     $('#cust_add_landmark_error').html("");
   },

   zoneFocus: function() {
     $('#select_zone_error').html("");
   },

   countryFocus: function() {
     $('#select_country_error').html("");
   },

   stateFocus: function() {
     $('#select_state_error').html("");
   },

   cityFocus: function() {
     $('#select_city_error').html("");
   },

   add1Focus: function() {
     $('#cust_add_1_error').html("");
   },

   add2Focus: function() {
     $('#cust_add_2_error').html("");
   },

   add3Focus: function() {
     $('#cust_add_3_error').html("");
   },

   landmark2Focus: function() {
     $('#cust_landmark2_error').html("");
   },

   zone2Focus: function() {
     $('#select_zone2_error').html("");
   },

   country2Focus: function() {
     $('#select_country2_error').html("");
   },

   state2Focus: function() {
     $('#select_state2_error').html("");
   },

   city2Focus: function() {
     $('#select_city2_error').html("");
   },

    answerFocus: function() {
     $('#cust_answer_error').html("");
   },
    cust_dob: function() {
     $('#news_date_error').html("");
   },
   cust_passport: function() {
     $('#cust_passport_error').html("");
   },
   cust_off_phone_number: function() {
     $('#cust_off_phone_number_error').html("");
   },
   cust_mobile_phone_number: function() {
     $('#cust_mobile_phone_number_error').html("");
   },
   cust_res_phone_number: function() {
     $('#cust_res_phone_number_error').html("");
   },
   address_type:function(){
    $('#address_type_error').html("");
   },
   address_type2:function(){
    $('#address_type2_error').html("");
   },
   question_id:function(){
    $('#question_id_error').html("");
   },
   edu_category_name:function(){
    $('#edu_category_name_error').html("");
   },
   cust_answer:function(){
    $('#cust_answer_error').html("");
   },

   phone_code_focus:function(){
      $('#cust_off_code_number_error').html("");
   },
   resphone_code_focus:function(){
      $('#cust_res_code_number_error').html("");
   }


});

