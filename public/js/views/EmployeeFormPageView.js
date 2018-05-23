var admin = admin || {};

admin.EmployeeFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.empId = options.id;
       this.template = options.template;
       var self = this;

        if(new String(this.mode).valueOf() == new String('create').valueOf()){

              $.when(
              
                 $.ajax({
                  url: "/eprayoga/admin/select_client_group",
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
                  url: "/eprayoga/admin/select_address_type",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                     self.addressTypeData = data;
                    // alert(JSON.stringify(self.addressTypeData));
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
                
                self.clientGroupCollectionView = new admin.MgmtClientGroupCollectionView({
                    el: $( '#clnt_group_id' ),
                    clientGroupCollection: self.clientData
                 });
                self.deptCollectionView = new admin.MgmtDeptCollectionView({
                    el: $( '#emp_department' ),
                    deptCollection: self.deptData
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
             var requestJson = JSON.stringify({"emp_employee_id":this.empId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_employee_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                
                    self.empData = data;
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
                     self.clientData = data;
                    // alert(JSON.stringify(self.addressTypeData));
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

                  var phone_code_number = self.empData.emp_off_phone;

                  var splt1 = phone_code_number.split("-")[0];
                  var splt2 = phone_code_number.split("-")[1];

                   $('#phone_code1').val(splt1);
                   $('#emp_off_phone').val(splt2);

                self.clientGroupCollectionView = new admin.MgmtClientGroupCollectionView({
                    el: $( '#clnt_group_id' ),
                    clientGroupCollection: self.clientData
                 });

                  $('#clnt_group_id').val(self.empData.clnt_group_id);


                self.deptCollectionView = new admin.MgmtDeptCollectionView({
                    el: $( '#emp_department'),
                    // emp_dept_id : self.empData.address[0].emp_dept_id,
                    deptCollection: self.deptData
                 });
                 
                  $('#emp_department').val(self.empData.emp_department);
  
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
                    country_id : self.empData.address[0].country_id,
                    mode:'address_type1'
                });

                self.countryCollectionView = new admin.MgntCountryCollectionView({
                  el: $( '#select_country' ),
                  state_id : self.empData.address[0].state_id,
                  mode:'address_type1'
                 });

                self.stateCollectionView = new admin.MgntStateCollectionView({
                  el: $( '#select_state' ),
                  city_id: self.empData.address[0].city_id,
                  mode:'address_type1'
                 });

                self.cityCollectionView = new admin.MgntCityCollectionView({
                  el: $( '#select_city' ),
                  mode:'address_type1'
                 });               

                self.zoneCollectionView.countryCollectionView = self.countryCollectionView;                
                self.countryCollectionView.stateCollectionView =  self.stateCollectionView;
                self.stateCollectionView.cityCollectionView =  self.cityCollectionView;

                $('#select_zone').val(self.empData.address[0].zone_id);
                  self.zoneCollectionView.isSelected();
                  $('#select_country').val(self.empData.address[0].country_id);
                   self.countryCollectionView.isSelected();
                  $('#select_state').val(self.empData.address[0].state_id);
                   self.stateCollectionView.isSelected();
                  $('#select_city').val(self.empData.address[0].city_id);

                $('#address_type').val(self.empData.address[0].add_type_id);
               
                // address type 2
                self.zoneCollectionView2 = new admin.MgntZoneCollectionView({
                    el: $( '#select_zone2' ),
                    zoneCollection: self.zonedata,
                    country_id : self.empData.address[1].country_id,
                    mode:'address_type2'
                });

                self.countryCollectionView2 = new admin.MgntCountryCollectionView({
                  el: $( '#select_country2' ),
                  state_id : self.empData.address[1].state_id,
                  mode:'address_type2'
                 });

                self.stateCollectionView2 = new admin.MgntStateCollectionView({
                  el: $( '#select_state2' ),
                  city_id: self.empData.address[1].city_id,
                  mode:'address_type2'
                 });

                self.cityCollectionView2 = new admin.MgntCityCollectionView({
                  el: $( '#select_city2' ),
                  mode:'address_type2'
                 });               

                self.zoneCollectionView2.countryCollectionView2 = self.countryCollectionView2;                
                self.countryCollectionView2.stateCollectionView2 =  self.stateCollectionView2;
                self.stateCollectionView2.cityCollectionView2 =  self.cityCollectionView2;

                                

                  $('#select_zone2').val(self.empData.address[1].zone_id);
                  self.zoneCollectionView2.isSelected();
                  $('#select_country2').val(self.empData.address[1].country_id);
                   self.countryCollectionView2.isSelected();
                  $('#select_state2').val(self.empData.address[1].state_id);
                   self.stateCollectionView2.isSelected();
                  $('#select_city2').val(self.empData.address[1].city_id);                
                  $('#address_type2').val(self.empData.address[1].add_type_id);
                 

                });
        }
      // this.render();
     },

    events: {
    'click  #register-employee'  : 'registerEmployee',
    'click  #registerCancel'  : 'cancelEmployeeForm',
    'click  #clnt_group_id'  : 'empGroupFocus',
    'click  #emp_first_name'    : 'empNameFocus',
    'click  #emp_last_name'    : 'empLastNameFocus',
    'click  #emp_pan'    : 'empPanFocus',
    'click  #emp_off_email_id'    : 'empEmailFocus',
    'click  #emp_mobile'    : 'empMobFocus',
    'click  #phone_code1'    : 'phone_code_focus',
    'click  #emp_off_phone'    : 'emppffPhoneFocus',
    'click  #emp_facbook_id'    : 'empfbFocus',
    'click  #emp_twitter_id'    : 'emptwitFocus',
    'click  #emp_department'    : 'deptFocus',
    'click  #emp_reporting_manager'    : 'empmanagerFocus',
    'click  #band'    : 'bandFocus',
    'click  #address_type'     : 'addressTypeFocus',
    'click  #cust_add_line_1'    : 'addLine1Focus',
    'click  #cust_add_line_2'    : 'addLine2Focus',
    'click  #cust_add_line_3'    : 'addLine3Focus',
    'click  #cust_add_landmark'    : 'landmarkFocus',
    'click  #select_zone'   : 'zoneFocus',
    'click  #select_country'   : 'countryFocus',
    'click  #select_state'   : 'stateFocus',
    'click  #select_city'   : 'cityFocus',
    'click  #address_type2' : 'addressType2Focus',
    'click  #cust_add_1'    : 'add1Focus',
    'click  #cust_add_2'    : 'add2Focus',
    'click  #cust_add_3'    : 'add3Focus',
    'click  #cust_landmark'    : 'landmark2Focus',
    'click  #select_zone2'   : 'zone2Focus',
    'click  #select_country2'   : 'country2Focus',
    'click  #select_state2'   : 'state2Focus',
    'click  #select_city2'   : 'city2Focus',
    'click  #emp_no'   : 'empNoFocus',
  },

  render: function() {
    if (new String(this.mode).valueOf() == new String('create').valueOf()) {
        this.$el.html(this.template);
        this.$el.append(this.template1);
        initializeTabMenu();
      } 
        else { //edit
        this.$el.html(this.template( this.empData ));
        this.$el.append(this.template1);
        initializeTabMenu();
    }           
        return this;
  },

  validatingBasicInfo: function(e){

     document.getElementById("clnt_group_id_error").innerHTML="";
     document.getElementById("emp_first_name_error").innerHTML="";
     document.getElementById("emp_last_name_error").innerHTML="";
     document.getElementById("emp_pan_error").innerHTML="";
     document.getElementById("emp_off_email_id_error").innerHTML="";
     document.getElementById("emp_off_code_error").innerHTML="";
     //document.getElementById("emp_off_phone_error").innerHTML="";
     document.getElementById("emp_mobile_error").innerHTML="";
     document.getElementById("emp_facbook_id_error").innerHTML="";
     document.getElementById("emp_twitter_id_error").innerHTML="";    
     document.getElementById("emp_department_error").innerHTML="";
     document.getElementById("emp_reporting_manager_error").innerHTML="";
     document.getElementById("band_error").innerHTML="";
     document.getElementById("emp_no_error").innerHTML="";

     

      var regex1=/^[a-zA-Z][a-zA-Z0-9]+$/;
      var regex2=/^[0-9]+$/;
       var regex3 = /^[a-zA-Z0-9_@./#&+-]+$/;

     if ($('#clnt_group_id').val().trim() == '' ) {
        $('#clnt_group_id').focus();
        document.getElementById('clnt_group_id_error').innerHTML= "Please select the Client group";             
        return false;
      } 


     if ($('#emp_first_name').val().trim() == '' ) {
        $('#emp_first_name').focus();
        document.getElementById('emp_first_name_error').innerHTML= "Please enter the first Name";             
        return false;
      } 

      if( !validateName($('#emp_first_name').val().trim())){
         document.getElementById('emp_first_name_error').innerHTML= "Please provide valid name";             
        return false;
      }

      if ($('#emp_last_name').val().trim() == '' ) {
        $('#emp_last_name').focus();
        document.getElementById('emp_last_name_error').innerHTML= "Please enter the last Name";             
        return false;
      } 

      if( !validateName($('#emp_last_name').val().trim())){
         document.getElementById('emp_last_name_error').innerHTML= "Please provide valid name";             
        return false;
      }

      if ($('#emp_pan').val().trim() == '' ) {
        $('#emp_pan').focus();
        document.getElementById('emp_pan_error').innerHTML= "Please enter the PAN";             
        return false;
      } 

      if (!regex1.test($('#emp_pan').val().trim())) {
          $('#emp_pan').focus();
          document.getElementById('emp_pan_error').innerHTML= "Please provide valid PAN";
          return false;
      } 

      if ($('#emp_off_email_id').val().trim() == '' ) {
        $('#emp_off_email_id').focus();
        document.getElementById('emp_off_email_id_error').innerHTML= "Please enter the Email id";             
        return false;
      } 

      if( !validateEmail($('#emp_off_email_id').val().trim())){
         document.getElementById('emp_off_email_id_error').innerHTML= "Please provide valid email id";             
        return false;
      }//////////////////////////

      if ($('#phone_code1').val().trim() == '' ) {
        $('#phone_code1').focus();
        document.getElementById('emp_off_code_error').innerHTML= "Enter Code";             
        return false;
      } 

      if (!regex2.test($('#phone_code1').val().trim())) {
          $('#phone_code1').focus();
          document.getElementById('emp_off_code_error').innerHTML= "Enter Code";
          return false;
      } 

      if ($('#emp_off_phone').val().trim() == '' ) {
        $('#emp_off_phone').focus();
        document.getElementById('emp_off_phone_error').innerHTML= "Enter number";             
        return false;
      } 

      if (!regex2.test($('#emp_off_phone').val().trim())) {
          $('#emp_off_phone').focus();
          document.getElementById('emp_off_phone_error').innerHTML= "Enter Number";
          return false;
      } 
            if ($('#emp_mobile').val().trim() == '' ) {
        $('#emp_mobile').focus();
        document.getElementById('emp_mobile_error').innerHTML= "Please enter the mobile num";             
        return false;
      } 

      if( !validateMobile($('#emp_mobile').val().trim())){
         document.getElementById('emp_mobile_error').innerHTML= "Please provide valid mobile num";             
        return false;
      }

      if ($('#emp_facbook_id').val().trim() == '' ) {
        $('#emp_facbook_id').focus();
        document.getElementById('emp_facbook_id_error').innerHTML= "Please enter the Facebook id";             
        return false;
      } 

      if( !validateFb($('#emp_facbook_id').val().trim())){
         document.getElementById('emp_facbook_id_error').innerHTML= "Please provide valid fb id";             
        return false;
      }

      if ($('#emp_twitter_id').val().trim() == '' ) {
        $('#emp_twitter_id').focus();
        document.getElementById('emp_twitter_id_error').innerHTML= "Please enter the twitter id";             
        return false;
      } 

      if( !validateFb($('#emp_twitter_id').val().trim())){
         document.getElementById('emp_twitter_id_error').innerHTML= "Please provide valid twitter id";             
        return false;
      }

      if ($('#emp_band').val().trim() == '' ) {
        $('#emp_band').focus();
        document.getElementById('band_error').innerHTML= "Please enter the band";             
        return false;
      } 

      if( !validateunivrsitycode($('#emp_band').val().trim())){
         document.getElementById('band_error').innerHTML= "Please provide valid band";             
        return false;
      }

      if ($('#emp_department').val().trim() == '' ) {
        $('#emp_department').focus();
        document.getElementById('emp_department_error').innerHTML= "Please enter the department";             
        return false;
      } 

      // if( !validateDept($('#emp_department').val().trim())){
      //    document.getElementById('emp_department_error').innerHTML= "Please provide valid department name";             
      //   return false;
      // }

      if ($('#emp_reporting_manager').val().trim() == '' ) {
        $('#emp_reporting_manager').focus();
        document.getElementById('emp_reporting_manager_error').innerHTML= "Please enter the designation";             
        return false;
      } 

      if( !validateName($('#emp_reporting_manager').val().trim())){
         document.getElementById('emp_reporting_manager_error').innerHTML= "Please provide valid designation";             
        return false;
      }

      if ($('#emp_no').val().trim() == '' ) {
        $('#emp_no').focus();
        document.getElementById('emp_no_error').innerHTML= "Please enter the emp no";             
        return false;
      } 

      if (!regex3.test($('#emp_no').val().trim())) {
          $('#emp_no').focus();
          document.getElementById('emp_no_error').innerHTML= "Please provide valid emp no";
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


  registerEmployee:function(e){
    // e.preventDefault();
    var self = this;

                var phone_number = document.getElementById('phone_code1').value + '-' + 
            document.getElementById('emp_off_phone').value;

    if(this.validatingBasicInfo() != true){
        $('#form-tabs-t-0').trigger('click');
        return false;

    }    
    else if(this.validatingAddress1() != true){
        $('#form-tabs-t-1').trigger('click');
        return false;
    }
    else{
      $('#form-tabs-t-2').trigger('click');

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




     var employeeFormData = {
            "clnt_group_id": $('#clnt_group_id').val(),
            "emp_first_name"  : $('#emp_first_name').val(),
            "emp_last_name": $('#emp_last_name').val(),
            "emp_pan": $('#emp_pan').val(),
            "emp_off_email_id": $('#emp_off_email_id').val(),
            //"phone_code1" : $('#phone_code1').val(),
            //"emp_off_phone": $('#emp_off_phone').val(),
            "emp_mobile": $('#emp_mobile').val(),
            "emp_facbook_id": $('#emp_facbook_id').val(),
            "emp_twitter_id": $('#emp_twitter_id').val(),
            "emp_photo_file_name": "a",
            "emp_photo_location": "A",
            "emp_dept_id": "1",
            "emp_reporting_manager": $('#emp_reporting_manager').val(),
            "emp_designation": "A",
            "band"         : $('#emp_band').val(),
            "emp_department": $('#emp_department').val(),
            "employee_no": $('#emp_no').val(),
            "emp_status": "s",
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
                "clnt_group_id": "1"
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
                "zone_id": $('#select_zone2').val(),
                "clnt_group_id": "1"
            }
  
      };
    }


      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            employeeFormData.emp_off_phone = phone_number;
            employeeFormData.emp_employee_id = $('#emp_id').val();
            //clientFormData.clnt_id = parseInt($('#clnt_id').val(), 10);
          //  clientFormData.clnt_id = parseInt($('#clnt_id').val(), 10);                
            var requestData = JSON.stringify(employeeFormData); 
            saveemployee = "/eprayoga/admin/update_employee";
            var successMsg = "Employee Updated Successfully.";
            var failureMsg = "Error while updating the Employee.Please Contact Administrator.";
      } 
      else {
            employeeFormData.emp_off_phone = phone_number;
            var requestData = JSON.stringify(employeeFormData); 
            saveemployee = "/eprayoga/admin/create_employee";
            var successMsg = "Employee Created Successfully.";
            var failureMsg = "Error while creating the Employee.Please Contact Administrator.";
      }

          $('#register-employee').attr('disabled','disabled');
          $.ajax({
          url     :saveemployee,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
           

             var dat = String(data);
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
           

            $('#register-employee').removeAttr('disabled','disabled');
            $('#messagepop').text(successMsg); 
             $('#myModalPopup').modal('show');
             $('.okClass').bind('click', self.routepopup);
          },
          error: function(data) {
            $('#register-employee').removeAttr('disabled');
          
            var errData = JSON.parse(data.responseText);
            var errMail = data.responseJSON.data.emailmsg;
           

           if(errData.emp_pan){
           

            var nameMsg = JSON.stringify(errData.emp_pan[0]);
            var nameerrormsg = nameMsg.replace(/\"/g, "");
            $( "#emp_pan_error").html('The pan number has already been taken');
            $('#form-tabs-t-0').trigger('click');
           }
           else if(errData.emp_off_email_id){
           

            var nameMsg = JSON.stringify(errData.emp_off_email_id[0]);
            var nameerrormsg = nameMsg.replace(/\"/g, "");
            $( "#emp_off_email_id_error").html('The email id has already been taken');
            $('#form-tabs-t-0').trigger('click');
           }else if(errData.emp_mobile){          

            var nameMsg = JSON.stringify(errData.emp_mobile[0]);
            var nameerrormsg = nameMsg.replace(/\"/g, "");
            $( "#emp_mobile_error").html('The mobile number has already been taken');
            $('#form-tabs-t-0').trigger('click');
           }else if(errData.employee_no){          
            var nameMsg = JSON.stringify(errData.employee_no[0]);
            var nameerrormsg = nameMsg.replace(/\"/g, "");
            $( "#emp_no_error").html('The employee id has already been taken');
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
    
     appRouter.navigate("employeeList", {trigger: true});
  },

  cancelEmployeeForm:function(e){
       e.preventDefault();
       appRouter.navigate("employeeList", {trigger: true});  
  },

  empNameFocus: function() {
     $('#emp_first_name_error').html("");
   },

   empLastNameFocus: function() {
     $('#emp_last_name_error').html("");
   },

   empPanFocus: function() {
     $('#emp_pan_error').html("");
   },

   empEmailFocus: function() {
     $('#emp_off_email_id_error').html("");
   },

   empMobFocus: function() {
     $('#emp_mobile_error').html("");
   },

   emppffPhoneFocus: function() {
     $('#emp_off_phone_error').html("");
   },
   empfbFocus: function() {
      $('#emp_facbook_id_error').html("");
   },
   emptwitFocus: function() {
      $('#emp_twitter_id_error').html("");
   },
   deptFocus: function() {
      $('#emp_department_error').html("");
   },

   empmanagerFocus: function() {
      $('#emp_reporting_manager_error').html("");
   },
   addLine1Focus: function() {
     $('#cust_add_line_1_error').html("");
   },

   bandFocus: function() {
      $('#band_error').html("");
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
   empGroupFocus: function(){
      $('#clnt_group_id_error').html("");
   },

   addressTypeFocus : function() {
      $('#address_type_error').html("");
   },

   addressType2Focus : function() {
      $('#address_type2_error').html("");
   },

   phone_code_focus : function() {
      $('#emp_off_code_error').html("");
   },
   empNoFocus : function() {
      $('#emp_no_error').html("");
   }


});
