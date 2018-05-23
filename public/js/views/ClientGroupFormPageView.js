var admin = admin || {};

admin.ClientGroupFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
       this.mode = options.mode;
       this.clientgroupId = options.id;
       this.template = options.template;
       var self = this;
      
        if(new String(this.mode).valueOf() == new String('create').valueOf()){

             $.when(
              
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
                }),
                 $.ajax({
                  url: "/eprayoga/admin/select_department",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                     self.deptData = data;
                    
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
                })
                ).done(function(){
                self.render();
                
                self.originCollectionView = new admin.MgmtOriginCollectionView({
                     el: $( '#orig_type_id' ),
                    originCollection: self.origindata
                 });
                self.deptCollectionView = new admin.MgmtDeptCollectionView({
                    el: $( '#clnt_group_dept_name' ),
                    deptCollection: self.deptData
                 });
                self.secqusCollectionView = new admin.MgmtSecQusCollectionView({
                    el: $( '#question_id' ),
                    secqusCollection: self.secqusdata
                 });
                self.addressTypeCollectionView = new admin.MgmtAddressTypeCollectionView({
                    el: $( '#address_type' ),
                    addressTypeCollection: self.addressTypeData
                 });

                self.addressTypeCollectionView = new admin.MgmtAddressTypeCollectionView({
                    el: $( '#address_type2' ),
                    addressTypeCollection: self.addressTypeData
                 });
                 // address type 2                
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
                //address type1

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

              });

        } 

        else{
             var requestJson = JSON.stringify({"clnt_group_id":this.clientgroupId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_client_group_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
               
                    self.clientData = data;
                   // alert(JSON.stringify(self.clientData));
                  },
                  error: function(data) {
                   errorhandle(data);
                     
                  }

                }),

              $.ajax({
                        url: "/eprayoga/admin/get_all_origin",
                        type: "GET",
                         // data :self.clientData.orig_type_id,
                        contentType:'application/json',
                        cache:false,
                        success: function(data) {                         
                         
                           self.origindata = data.data;
                        },
                        error: function(data) {
                          errorhandle(data);
                               
                        }
                }),
              $.ajax({
                  url: "/eprayoga/admin/select_department",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                     self.deptData = data;
                    // alert(JSON.stringify(self.addressTypeData));
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
                })
                ).done(function(){
                    self.render();

                      var phone_code_number = self.clientData.clnt_group_contact_person_off_phone;

                  var splt1 = phone_code_number.split("-")[0];
                  var splt2 = phone_code_number.split("-")[1];

                   $('#phone_code1').val(splt1);
                   $('#clnt_group_contact_person_off_phone').val(splt2);
                    self.originCollectionView = new admin.MgmtOriginCollectionView({
                     el: $( '#orig_type_id' ),
                    originCollection: self.origindata
                 });
                self.deptCollectionView = new admin.MgmtDeptCollectionView({
                    el: $( '#clnt_group_dept_name' ),
                    deptCollection: self.deptData
                 });
                
                $('#clnt_group_dept_name').val(self.clientData.clnt_group_dept_name);
                
                self.secqusCollectionView = new admin.MgmtSecQusCollectionView({
                    el: $( '#question_id' ),
                    secqusCollection: self.secqusdata
                 });

                //  alert(JSON.stringify(self.secqusCollectionView));
                // alert(self.clientData.security_qus.question_id);
                // self.clientData.security_qus.question_id = 24;

                $('#question_id').val(self.clientData.security_qus.question_id);
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
                    country_id : self.clientData.address[0].country_id,
                    mode:'address_type1'
                });

                self.countryCollectionView = new admin.MgntCountryCollectionView({
                  el: $( '#select_country' ),
                  state_id : self.clientData.address[0].state_id,
                  mode:'address_type1'
                 });

                self.stateCollectionView = new admin.MgntStateCollectionView({
                  el: $( '#select_state' ),
                  city_id: self.clientData.address[0].city_id,
                  mode:'address_type1'
                 });

                self.cityCollectionView = new admin.MgntCityCollectionView({
                  el: $( '#select_city' ),
                  mode:'address_type1'
                 });               

                self.zoneCollectionView.countryCollectionView = self.countryCollectionView;                
                self.countryCollectionView.stateCollectionView =  self.stateCollectionView;
                self.stateCollectionView.cityCollectionView =  self.cityCollectionView;

                $('#select_zone').val(self.clientData.address[0].zone_id);
                  self.zoneCollectionView.isSelected();
                  $('#select_country').val(self.clientData.address[0].country_id);
                   self.countryCollectionView.isSelected();
                  $('#select_state').val(self.clientData.address[0].state_id);
                   self.stateCollectionView.isSelected();
                  $('#select_city').val(self.clientData.address[0].city_id);

                $('#address_type').val(self.clientData.address[0].add_type_id);

                // address type 2
                self.zoneCollectionView2 = new admin.MgntZoneCollectionView({
                    el: $( '#select_zone2' ),
                    zoneCollection: self.zonedata,
                    country_id : self.clientData.address[1].country_id,
                    mode:'address_type2'
                });

                self.countryCollectionView2 = new admin.MgntCountryCollectionView({
                  el: $( '#select_country2' ),
                  state_id : self.clientData.address[1].state_id,
                  mode:'address_type2'
                 });

                self.stateCollectionView2 = new admin.MgntStateCollectionView({
                  el: $( '#select_state2' ),
                  city_id: self.clientData.address[1].city_id,
                  mode:'address_type2'
                 });

                self.cityCollectionView2 = new admin.MgntCityCollectionView({
                  el: $( '#select_city2' ),
                  mode:'address_type2'
                 });               

                self.zoneCollectionView2.countryCollectionView2 = self.countryCollectionView2;                
                self.countryCollectionView2.stateCollectionView2 =  self.stateCollectionView2;
                self.stateCollectionView2.cityCollectionView2 =  self.cityCollectionView2;

                                

                  $('#select_zone2').val(self.clientData.address[1].zone_id);
                  self.zoneCollectionView2.isSelected();
                  $('#select_country2').val(self.clientData.address[1].country_id);
                   self.countryCollectionView2.isSelected();
                  $('#select_state2').val(self.clientData.address[1].state_id);
                   self.stateCollectionView2.isSelected();
                  $('#select_city2').val(self.clientData.address[1].city_id);                
                  $('#address_type2').val(self.clientData.address[1].add_type_id);


                  $('#orig_type_id').val(self.clientData.orig_type_id);


                })
        }
      // this.render();
     },

    events: {
    'click  #register-client-group'  : 'registerClientGroup',
    'click  #registerCancel'  : 'cancelClientGroupForm',
    'click  #clnt_group_name'    : 'clientNameFocus',
    'click  #clnt_group_pan'    : 'clientPanFocus',
    'click  #clnt_group_off_email_id'    : 'clientEmailFocus',
    'click  #clnt_group_facbook_id'    : 'clientFbFocus',
    'click  #clnt_group_twitter_id'    : 'clientTwitFocus',
   // 'click  #clnt_logo_file_name'    : 'clientLogoNameFocus',
    'click  #orig_type_id'    : 'origTypeFocus',
    'click  #clnt_group_id'    : 'clientGroupFocus',
    'click  #tax_id'    : 'taxFocus',
    'click  #website_url'    : 'websiteFocus',
    'click  #clnt_group_contact_person_first_name'    : 'clientFirstNameFocus',
    'click  #clnt_group_contact_person_last_name'    : 'clientLastNameFocus',
    'click  #clnt_group_contact_person_mobile'    : 'clientMobileFocus',
    'click  #phone_code1'    : 'phone_code_focus',
    'click  #clnt_group_contact_person_off_phone'    : 'clientOffPhoneFocus',
    'click  #clnt_group_dept_name'    : 'deptFocus',
    'click  #clnt_group_contact_person_desgination'    : 'designationFocus',
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
    'click  #cust_landmark'    : 'landmark2Focus',
    'click  #select_zone2'   : 'zone2Focus',
    'click  #select_country2'   : 'country2Focus',
    'click  #select_state2'   : 'state2Focus',
    'click  #select_city2'   : 'city2Focus',
    'click  #cust_answer'    : 'answerFocus',
    'click  #clnt_type_id'  : 'clientTypeFocus',
    'click  #address_type'  : 'addressTypeFocus',
    'click  #address_type2' : 'addressType2Focus',
    'click  #question_id'  : 'questionFocus'

  },

    render: function() {
    if (new String(this.mode).valueOf() == new String('create').valueOf()) {
       
        this.$el.html(this.template);
        this.$el.append(this.template1);
        initializeTabMenu();
      } 
        else { //edit

        this.$el.html(this.template( this.clientData ));
        this.$el.append(this.template1); 
         initializeTabMenu(); 
       
    }     

        return this;
  },

   validatingBasicInfo: function(e){

   //  document.getElementById("clnt_type_id_error").innerHTML="";
     document.getElementById("clnt_group_name_error").innerHTML="";
     document.getElementById("clnt_group_pan_error").innerHTML="";
     document.getElementById("clnt_group_off_email_id_error").innerHTML="";
     document.getElementById("clnt_group_facbook_id_error").innerHTML="";
     document.getElementById("clnt_group_twitter_id_error").innerHTML="";
   //  document.getElementById("clnt_logo_file_name_error").innerHTML="";
     document.getElementById("orig_type_id_error").innerHTML="";
     //document.getElementById("clnt_group_id_error").innerHTML="";
     document.getElementById("tax_id_error").innerHTML="";
     document.getElementById("website_url_error").innerHTML="";

     var regex=/^[a-zA-Z][a-zA-Z-_.&\s0-9]+$/;
     var regex1=/^[a-zA-Z][a-zA-Z0-9]+$/;
     var regex2=/^[a-zA-Z0-9]+$/;
     var regex3=/^[a-zA-Z0-9]+([0-9]+)*$/;
     var regex4 = /^[a-zA-Z0-9_@./#&+-]+$/;

     // if ($('#clnt_type_id').val().trim() == '' ) {
     //    $('#clnt_type_id').focus();
     //    document.getElementById('clnt_type_id_error').innerHTML= "Please select the Client Type";             
     //    return false;
     //  } 


     if ($('#clnt_group_name').val().trim() == '' ) {
        $('#clnt_group_name').focus();
        document.getElementById('clnt_group_name_error').innerHTML= "Please enter the Group Name";             
        return false;
      } 

      if (!regex.test($('#clnt_group_name').val().trim())) {
          $('#clnt_group_name').focus();
          document.getElementById('clnt_group_name_error').innerHTML= "Please provide valid Group Name";
          return false;
      } 

      if ($('#clnt_group_pan').val().trim() == '' ) {
        $('#clnt_group_pan').focus();
        document.getElementById('clnt_group_pan_error').innerHTML= "Please enter the PAN";             
        return false;
      } 

      if (!regex1.test($('#clnt_group_pan').val().trim())) {
          $('#clnt_group_pan').focus();
          document.getElementById('clnt_group_pan_error').innerHTML= "Please provide valid PAN";
          return false;
      } 

      if ($('#clnt_group_off_email_id').val().trim() == '' ) {
        $('#clnt_group_off_email_id').focus();
        document.getElementById('clnt_group_off_email_id_error').innerHTML= "Please enter the Email id";             
        return false;
      } 

      if( !validateEmail($('#clnt_group_off_email_id').val().trim())){
         document.getElementById('clnt_group_off_email_id_error').innerHTML= "Please provide valid email id";             
        return false;
      }

      if ($('#clnt_group_facbook_id').val().trim() == '' ) {
        $('#clnt_group_facbook_id').focus();
        document.getElementById('clnt_group_facbook_id_error').innerHTML= "Please enter the Facebook id";             
        return false;
      } 

      if( !validateFb($('#clnt_group_facbook_id').val().trim())){
         document.getElementById('clnt_group_facbook_id_error').innerHTML= "Please provide valid fb id";             
        return false;
      }

      if ($('#clnt_group_twitter_id').val().trim() == '' ) {
        $('#clnt_group_twitter_id').focus();
        document.getElementById('clnt_group_twitter_id_error').innerHTML= "Please enter the twitter id";             
        return false;
      } 

      if( !validateFb($('#clnt_group_twitter_id').val().trim())){
         document.getElementById('clnt_twitter_id_error').innerHTML= "Please provide valid twitter id";             
        return false;
      }

      if ($('#website_url').val().trim() == '' ) {
        $('#website_url').focus();
        document.getElementById('website_url_error').innerHTML= "Please enter the url";             
        return false;
      } 


      if( !validateFb($('#website_url').val().trim())){
         document.getElementById('website_url_error').innerHTML= "Please provide valid url";             
        return false;
      }

      if ($('#tax_id').val().trim() == '' ) {
        $('#tax_id').focus();
        document.getElementById('tax_id_error').innerHTML= "Please enter the tax ";             
        return false;
      } 

      if (!regex4.test($('#tax_id').val().trim())) {
          $('#tax_id').focus();
          document.getElementById('tax_id_error').innerHTML= "Please provide valid tax id";
          return false;
      } 

      // if ($('#clnt_logo_file_name').val().trim() == '' ) {
      //   $('#clnt_logo_file_name').focus();
      //   document.getElementById('clnt_logo_file_name_error').innerHTML= "Please select the file";             
      //   return false;
      // } 

      if ($('#orig_type_id').val().trim() == '' ) {
        $('#orig_type_id').focus();
        document.getElementById('orig_type_id_error').innerHTML= "Please select the origin";             
        return false;
      } 

      return true;
  },

   validatingContact: function(e){
      document.getElementById("clnt_group_contact_person_first_name_error").innerHTML="";
     document.getElementById("clnt_group_contact_person_last_name_error").innerHTML="";
     document.getElementById("clnt_group_contact_person_mobile_error").innerHTML="";
    document.getElementById("clnt_group_contact_person_off_phone_code_error").innerHTML="";
     document.getElementById("clnt_group_contact_person_off_phone_error").innerHTML="";
     document.getElementById("clnt_group_dept_name_error").innerHTML="";
     document.getElementById("clnt_group_contact_person_desgination_error").innerHTML="";

     var regex3=/^[0-9]+$/;

     if ($('#clnt_group_contact_person_first_name').val().trim() == '' ) {
        $('#clnt_group_contact_person_first_name').focus();
        document.getElementById('clnt_group_contact_person_first_name_error').innerHTML= "Please enter the first name";             
        return false;
      } 

      if( !validateName($('#clnt_group_contact_person_first_name').val().trim())){
         document.getElementById('clnt_group_contact_person_first_name_error').innerHTML= "Please provide valid first name";             
        return false;
      }

      if ($('#clnt_group_contact_person_last_name').val().trim() == '' ) {
        $('#clnt_group_contact_person_last_name').focus();
        document.getElementById('clnt_group_contact_person_last_name_error').innerHTML= "Please enter the last name";             
        return false;
      } 

      if( !validateName($('#clnt_group_contact_person_last_name').val().trim())){
         document.getElementById('clnt_group_contact_person_last_name_error').innerHTML= "Please provide valid last name";             
        return false;
      }

      if ($('#clnt_group_contact_person_mobile').val().trim() == '' ) {
        $('#clnt_group_contact_person_mobile').focus();
        document.getElementById('clnt_group_contact_person_mobile_error').innerHTML= "Please enter the mobile num";             
        return false;
      } 

      if( !validateMobile($('#clnt_group_contact_person_mobile').val().trim())){
         document.getElementById('clnt_group_contact_person_mobile_error').innerHTML= "Please provide valid mobile num";             
        return false;
      }

      if ($('#phone_code1').val().trim() == '' ) {
        $('#phone_code1').focus();
        document.getElementById('clnt_group_contact_person_off_phone_code_error').innerHTML= "Enter Code";             
        return false;
      } 

      if (!regex3.test($('#phone_code1').val().trim())) {
          $('#phone_code1').focus();
          document.getElementById('clnt_group_contact_person_off_phone_code_error').innerHTML= "Enter code";
          return false;
      } 


      if ($('#clnt_group_contact_person_off_phone').val().trim() == '' ) {
        $('#clnt_group_contact_person_off_phone').focus();
        document.getElementById('clnt_group_contact_person_off_phone_error').innerHTML= "Enter number";             
        return false;
      } 

      // if( !validateMobile($('#clnt_group_contact_person_off_phone').val().trim())){
      //    document.getElementById('clnt_group_contact_person_off_phone_error').innerHTML= "Please provide valid num";             
      //   return false;
      // }

        if (!regex3.test($('#clnt_group_contact_person_off_phone').val().trim())) {
          $('#clnt_group_contact_person_off_phone').focus();
          document.getElementById('clnt_group_contact_person_off_phone_error').innerHTML= "Enter number";
          return false;
      } 


      if ($('#clnt_group_dept_name').val().trim() == '' ) {
        $('#clnt_group_dept_name').focus();
        document.getElementById('clnt_group_dept_name_error').innerHTML= "Please enter the department";             
        return false;
      } 

      // if( !validateDept($('#clnt_group_dept_name').val().trim())){
      //    document.getElementById('clnt_group_dept_name_error').innerHTML= "Please provide valid department name";             
      //   return false;
      // }

      if ($('#clnt_group_contact_person_desgination').val().trim() == '' ) {
        $('#clnt_group_contact_person_desgination').focus();
        document.getElementById('clnt_group_contact_person_desgination_error').innerHTML= "Please enter the designation";             
        return false;
      } 

      if( !validateDept($('#clnt_group_contact_person_desgination').val().trim())){
         document.getElementById('clnt_group_contact_person_desgination_error').innerHTML= "Please provide valid designation";             
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
      // else if(address_typeval == '1' || address_typeval == '2'){
      //   if(address_typeval == address_type2val ){
      //      $('#address_type').focus();
      //      document.getElementById('address_type_error').innerHTML= "Please select the different address type";   
      //      return false;
      //   }
      // }
      

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
       document.getElementById("cust_landmark_error").innerHTML="";
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

      if ($('#cust_landmark').val().trim() == '' ) {
        $('#cust_landmark').focus();
        document.getElementById('cust_landmark_error').innerHTML= "Please enter the landmark";             
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


  registerClientGroup:function(e){
    //e.preventDefault();
      var self = this;
     var phone_number = document.getElementById('phone_code1').value + '-' + 
            document.getElementById('clnt_group_contact_person_off_phone').value;

    if(this.validatingBasicInfo() != true){
        $('#form-tabs-t-0').trigger('click');
        return false;

    }
    else if(this.validatingContact() != true){
        $('#form-tabs-t-1').trigger('click');
        return false;
    }
    else if(this.validatingAddress1() != true){
        $('#form-tabs-t-2').trigger('click');
        return false;
    }
    else if(this.validatingAddress2() != true){
       $('#form-tabs-t-3').trigger('click');
       return false;
        //alert("test");
    }
    else{
       $('#form-tabs-t-4').trigger('click');
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
   
     var clientGroupFormData = {
            "user_type_id": "1",
            "clnt_group_name"  : $('#clnt_group_name').val(),
            "clnt_group_pan": $('#clnt_group_pan').val(),
            //"clnt_id": "1",
            "clnt_group_off_email_id": $('#clnt_group_off_email_id').val(),
            "clnt_group_facbook_id": $('#clnt_group_facbook_id').val(),
            "clnt_group_twitter_id": $('#clnt_group_twitter_id').val(),
            "clnt_group_logo_file_name": "a",
            //"clnt_group_city": $('#clnt_group_city').val(),
            "orig_type_id": $('#orig_type_id').val(),
            "clnt_group_id": $('#clnt_group_id').val(),
            "clnt_group_logo_location":"a",
            "tax_id": $('#tax_id').val(),
            "website_url": $('#website_url').val(),
           // "clnt_group_location": $('#clnt_group_location').val(),
            "clnt_group_contact_person_first_name": $('#clnt_group_contact_person_first_name').val(),
            "clnt_group_contact_person_last_name": $('#clnt_group_contact_person_last_name').val(),
            "clnt_group_contact_person_mobile": $('#clnt_group_contact_person_mobile').val(),
            //"clnt_group_contact_person_off_phone": $('#clnt_group_contact_person_off_phone').val(),
            "clnt_group_dept_name": $('#clnt_group_dept_name').val(),
            "clnt_group_contact_person_desgination": $('#clnt_group_contact_person_desgination').val(),
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
                "zone_id": $('#select_zone').val()
              },
            "address_type2":{
                "address_id" : $('#add_id2').val(),
                "add_id": "1",
                "add_type_id": $('#address_type2').val(),
                "cust_add_line_1" : $('#cust_add_1').val(),
                "cust_add_line_2": $('#cust_add_2').val(),
                "cust_add_line_3": $('#cust_add_3').val(),
                "cust_add_landmark": $('#cust_landmark').val(),
                "country_id": $('#select_country2').val(),
                "state_id": $('#select_state2').val(),
                "city_id": $('#select_city2').val(),
                "zone_id": $('#select_zone2').val()
          },
            "security-qus":{
              "question_id" : $('#question_id').val(),
              "cust_answer": $('#cust_answer').val()
            }
  
      };  
    }                               

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            clientGroupFormData.clnt_group_contact_person_off_phone = phone_number;
            clientGroupFormData.clnt_group_id = $('#clnt_group_id').val();            
            var requestData = JSON.stringify(clientGroupFormData); 
            saveclientGroup = "/eprayoga/admin/update_client_group";
            var successMsg = "Client group Updated Successfully.";
            var failureMsg = "Error while updating the Client group .Please Contact Administrator.";
      } 
      else {
            clientGroupFormData.clnt_group_contact_person_off_phone = phone_number;
            clientGroupFormData.clnt_group_id = $('#clnt_group_id').val();
            var requestData = JSON.stringify(clientGroupFormData); 
            saveclientGroup = "/eprayoga/admin/create_client_group";
            var successMsg = "Client group Created Successfully.";
            var failureMsg = "Error while creating the Client group .Please Contact Administrator.";
      }


          $.ajax({
          url     :saveclientGroup,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {

          
            //appRouter.navigate("clientGroupList", {trigger: true});
            $('#messagepop').text(successMsg); 
             $('#myModalPopup').modal('show');
             $('.okClass').bind('click', self.routepopup);

          },
          error: function(data) {
           
            var errData = JSON.parse(data.responseText);

           if(errData.clnt_group_pan){
           

            var nameMsg = JSON.stringify(errData.clnt_group_pan[0]);
            var nameerrormsg = nameMsg.replace(/\"/g, "");
            $( "#clnt_group_pan_error").html('The pan number has already been taken');
            $('#form-tabs-t-0').trigger('click');

           }
           else if(errData.clnt_group_off_email_id){
            

            var nameMsg = JSON.stringify(errData.clnt_group_off_email_id[0]);
            var nameerrormsg = nameMsg.replace(/\"/g, "");
            $( "#clnt_group_off_email_id_error").html('The Email id has already been taken');
            $('#form-tabs-t-0').trigger('click');
           }
           

           else if(errData.clnt_group_contact_person_mobile){
           

            var nameMsg = JSON.stringify(errData.clnt_group_contact_person_mobile[0]);
            var nameerrormsg = nameMsg.replace(/\"/g, "");
            $( "#clnt_group_contact_person_mobile_error").html('The Mobile Number has already been taken');
            $('#form-tabs-t-0').trigger('click');
           }
           else if(errData.tax_id){
           

            var nameMsg = JSON.stringify(errData.tax_id[0]);
            var nameerrormsg = nameMsg.replace(/\"/g, "");
            $( "#tax_id_error").html('The Tax id has already been taken');
            $('#form-tabs-t-0').trigger('click');
           }else{
            errorhandle(data);
            }
               
          } 
        }); 

  },

  routepopup: function(){
    $('.modal-backdrop').remove(); 
   
    appRouter.navigate("clientGroupList", {trigger: true});

  },

  cancelClientGroupForm:function(e){
       e.preventDefault();
       appRouter.navigate("clientGroupList", {trigger: true});  
  },

  clientNameFocus: function() {
     $('#clnt_group_name_error').html("");
   },
   clientPanFocus: function() {
     $('#clnt_group_pan_error').html("");
   },

   clientEmailFocus: function() {
     $('#clnt_group_off_email_id_error').html("");
   },

   clientFbFocus: function() {
     $('#clnt_group_facbook_id_error').html("");
   },

   clientTwitFocus: function() {
     $('#clnt_group_twitter_id_error').html("");
   },

   clientLogoNameFocus: function() {
     $('#clnt_logo_file_name_error').html("");
   },

   origTypeFocus: function() {
     $('#orig_type_id_error').html("");
   },

   clientGroupFocus: function() {
     $('#clnt_group_id_error').html("");
   },

   taxFocus: function() {
     $('#tax_id_error').html("");
   },

   websiteFocus: function() {
     $('#website_url_error').html("");
   },

   clientFirstNameFocus: function() {
     $('#clnt_group_contact_person_first_name_error').html("");
   },

   clientLastNameFocus: function() {
     $('#clnt_group_contact_person_last_name_error').html("");
   },

   clientMobileFocus: function() {
     $('#clnt_group_contact_person_mobile_error').html("");
   },

   phone_code_focus: function() {
     $('#clnt_group_contact_person_off_phone_code_error').html("");
   },

   clientOffPhoneFocus: function() {
     $('#clnt_group_contact_person_off_phone_error').html("");
   },

   deptFocus: function() {
     $('#clnt_group_dept_name_error').html("");
   },

   designationFocus: function() {
     $('#clnt_group_contact_person_desgination_error').html("");
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
     $('#cust_landmark_error').html("");
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

   clientTypeFocus: function() {
      $('#clnt_type_id_error').html("");
   },

   addressTypeFocus: function() {
      $('#address_type_error').html("");
   },

   addressType2Focus: function() {
      $('#address_type2_error').html("");
   },

   questionFocus: function() {
      $('#question_id_error').html("");
   }


});
