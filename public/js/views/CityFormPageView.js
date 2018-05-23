var admin = admin || {};

admin.CityFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),

    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.cityId = options.id;
       this.template = options.template;
       var self = this;
      
        if(new String(this.mode).valueOf() == new String('create').valueOf()){        
              //  self.render();

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
                })
                ).done(function(){

                self.render();
                
              self.stateCollectionView = new admin.MgntStateCollectionView({
                  el: $( '#select_state' )
                 });
                      
                self.countryCollectionView = new admin.MgntCountryCollectionView({
                  el: $( '#select_country' )
                 });
                self.zoneCollectionView = new admin.MgntZoneCollectionView({
                    el: $( '#select_zone' ),
                    zoneCollection: self.zonedata
                });

                self.countryCollectionView.stateCollectionView =  self.stateCollectionView;
                self.zoneCollectionView.countryCollectionView = self.countryCollectionView;

               

                });
        } 

        else{

             var requestJson = JSON.stringify({"city_id":this.cityId});
             //alert(requestJson);
             $.when(
              $.ajax({
              url:"/eprayoga/admin/get_city_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
              cache:false,
                  success: function(data) {
                   // alert("edit :: " + JSON.stringify(data));
                    self.cityData = data[0];
                   
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

                 self.stateCollectionView = new admin.MgntStateCollectionView({
                el: $( '#select_state' )
                 });

                self.countryCollectionView = new admin.MgntCountryCollectionView({
                el: $( '#select_country' ),
                state_id :  self.cityData.state_id
                 });

                self.countryCollectionView.stateCollectionView =  self.stateCollectionView;
                
                self.zoneCollectionView = new admin.MgntZoneCollectionView({
                    el: $( '#select_zone' ),
                    zoneCollection: self.zonedata,
                   country_id : self.cityData.country_id
                 });

                self.zoneCollectionView.countryCollectionView = self.countryCollectionView;

                  $('#select_zone').val(self.cityData.zone_code);
              $('#select_zone').val(self.cityData.zone_id);
                  self.zoneCollectionView.isSelected();
                  
                });
        }
      // this.render();
     },

    events: {
    'click  #save-city'  : 'savecity',
    'click  #cancel'  : 'cancelCreateForm',
    'click  #cty_code'  : 'codeFocus',
    'click  #city_full_name'  : 'nameFocus',
    'click  #select_state' :'stateFocus',
    'click  #select_country':'countryFocus',
    'click  #zone_name' :'zoneFocus',

  },

    render: function() {
    if (new String(this.mode).valueOf() == new String('create').valueOf()) {
       
      this.$el.html(this.template);
      this.$el.append(this.template1);
      this.$el.find("#save-city").html("Create");
      
      } 
        else { //edit
        this.$el.html(this.template( this.cityData ));
        this.$el.append(this.template1);
        
    }           
        return this;
  },

  savecity:function(e){
    e.preventDefault();
    var self = this;

    document.getElementById("city_full_name_error").innerHTML="";
    document.getElementById("cty_code_error").innerHTML="";
   document.getElementById("state_id_error").innerHTML="";
     document.getElementById("country_name_error").innerHTML="";
     document.getElementById("zone_name_error").innerHTML="";

     var countryVal = $('#select_country').val();
       var stateVal = $('#select_state').val();


    var regex=/^[a-zA-Z-\s0-9]+$/;
        //var  regex1=/^[a-zA-Z\s]+$/;
     // var regex2=/^[a-zA-Z-\s0-9]+$/;
     if ($('#select_zone').val().trim() == '') {
          $('#select_zone').focus();
       //   $('#state_id').attr('style', 'border-bottom:2px solid #FF0000;');
          document.getElementById('zone_name_error').innerHTML= "Please select the Zone ";
          return false;
      } 

      if ((countryVal == '' ) || (countryVal == null) || (countryVal == undefined)) {
          $('#select_country').focus();
       //   $('#state_id').attr('style', 'border-bottom:2px solid #FF0000;');
          document.getElementById('country_name_error').innerHTML= "Please select the Country ";
          return false;
      } 

      if ((stateVal == '' ) || (stateVal == null) || (stateVal == undefined)) {
          $('#select_state').focus();
       //   $('#select_state').attr('style', 'border-bottom:2px solid #FF0000;');
          document.getElementById('state_id_error').innerHTML= "Please select the state ";
          return false;
      } 

      //alert("success");
    if ($('#city_full_name').val().trim() == '') {
        $('#city_full_name').focus();
     //   $('#city_full_name').attr('style', 'border-bottom:2px solid #FF0000;');
        document.getElementById('city_full_name_error').innerHTML= "Please enter the City Name";            
        return false;
    }

     // if (!regex1.test($('#city_full_name').val().trim())) {
     //      $('#city_full_name').focus();
     //      document.getElementById('city_full_name_error').innerHTML= "Please provide valid Name";
     //      return false;
     //     } 

     if ($('#cty_code').val().trim() == '') {
        $('#cty_code').focus();
     //   $('#city_full_name').attr('style', 'border-bottom:2px solid #FF0000;');
        document.getElementById('cty_code_error').innerHTML= "Please enter the City Code";            
        return false;
    }

        
       
      

      
      
       
     var cityFormData = {
                  "city_full_name"  : $('#city_full_name').val(),
                  "code"  : $('#cty_code').val(),
                  "state_id" : $('#select_state').val(),
                  "country_id"  : $('#select_country').val(),
                  //"zone_code"  : $('#select_zone').val(),
                  "created_by_user_id"  : "1",
                  "last_update_user_id" : "11"
           };
          
    if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
       
        cityFormData.city_id = this.cityId;//$('#city_id').val();
        

         //var selectedZone =  $("#select_zone").val();
            //cityFormData.zone_area_id = parseInt(selectedZone, 10);

          //var selectedCountry =  $("#select_country").val();
            //cityFormData.country_id = parseInt(selectedCountry, 10);

           //var selectedState =  $("#select_state").val();
            //cityFormData.state_id = parseInt(selectedState, 10);
  
        var requestData = JSON.stringify(cityFormData); 
        savecity ="/eprayoga/admin/update_city";
        var successMsg = "city Updated Successfully.";
        var failureMsg = "Error while updating the City .Please Contact Administrator.";

    } 

      else {

        /* var selectedZone =  $("#select_zone").val();
            cityFormData.zone_area_id = parseInt(selectedZone, 10);

          var selectedCountry =  $("#select_country").val();
            cityFormData.country_id = parseInt(selectedCountry, 10);

           var selectedState =  $("#select_state").val();
            cityFormData.state_id = parseInt(selectedState, 10);
*/
        var requestData = JSON.stringify(cityFormData); 
       // alert(requestData);
        savecity ="/eprayoga/admin/create_city";
        var successMsg = "City Created Successfully.";
        var failureMsg = "Error while creating the City .Please Contact Administrator.";

      }


          $('#save-city').attr('disabled','disabled');
          $.ajax({
          url     : savecity,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
             // alert(JSON.stringify(data));
           
             $('#save-city').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
           
          },
          error: function(data) {
           
            $('#save-city').removeAttr('disabled');
                var errData = JSON.parse(data.responseText);

                          if(errData.city_full_name){
                          

                           var failureMsg = JSON.stringify(errData.city_full_name[0]); 
                           var errmsgshow = failureMsg.replace(/\"/g, "");
                           $( "#city_full_name_error").html("The City name has already been taken");
                          }
                          else if(errData.code){
                          

                           var failureMsg = JSON.stringify(errData.code[0]); 
                           var errmsgshow = failureMsg.replace(/\"/g, "");
                           $( "#cty_code_error").html("The City Code has already been taken");
                          }else{
                          errorhandle(data);
                          }
                 } 
        }); 

  },


routepopup: function(){
    $('.modal-backdrop').remove(); 
   
    appRouter.navigate("citylist", {trigger: true});

  },

  cancelCreateForm:function(e){
       e.preventDefault();
       appRouter.navigate("citylist", {trigger: true});  
  },
  codeFocus:function()
  {
        $('#cty_code_error').html("");
    
  },
  nameFocus:function()
  {
        $('#city_full_name_error').html("");
    
  },
  stateFocus:function()
  {
        $('#state_id_error').html("");
    
  },
  countryFocus:function()
  {
        $('#country_name_error').html("");
    
  },
  zoneFocus:function()
  {
        $('#zone_name_error').html("");
    
  }

});
