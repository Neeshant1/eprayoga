var admin = admin || {};

admin.StateFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.stateId = options.id;
       this.template = options.template;
       var self = this;
        if(new String(this.mode).valueOf() == new String('create').valueOf()){        
                //self.render();
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


                self.countryCollectionView = new admin.MgntCountryCollectionView({
                el: $( '#select_country' ),
                mode:'state'
                 });

                self.zoneCollectionView = new admin.MgntZoneCollectionView({
                el: $( '#select_zone' ),
                zoneCollection: self.zonedata
                 });

                   self.zoneCollectionView.countryCollectionView = self.countryCollectionView;


                });
        }	

        else{

             var requestJson = JSON.stringify({"state_id":this.stateId});
            // alert(requestJson);
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_state_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
              cache:false,
                  success: function(data) {
                    self.stateData = data;
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

                self.countryCollectionView = new admin.MgntCountryCollectionView({
                el: $( '#select_country' ),
                mode:'state'              
                 });


                   self.zoneCollectionView = new admin.MgntZoneCollectionView({
                   el: $( '#select_zone' ),
                  zoneCollection: self.zonedata,
                  country_id : self.stateData.country_id 

             

                 });

                   self.zoneCollectionView.countryCollectionView = self.countryCollectionView;
                 
                    $('#select_zone').val(self.stateData.zone_code);
                    $('#select_zone').val(self.stateData.zone_id);
                    self.zoneCollectionView.isSelected();
                   
                });
        }
     },

    events: {
		'click  #save-state'  : 'savestate',
		'click  #cancel'	: 'cancelCreateForm',
    //'click  #state_code'  : 'codeFocus',
    'click  #state_full_name'  : 'nameFocus',
   // 'click  #country_id' :'countryFocus',
    'click  #zone_id':'zoneFocus',
    'click  #st_code' :'codeFocus',
    'click  #select_country' :'countryFocus',
	},

    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			this.$el.html(this.template);
      this.$el.append(this.template1);
         this.$el.find("#save-state").html("Create");
	    } 
        else { //edit
			  this.$el.html(this.template( this.stateData ));
        this.$el.append(this.template1);
		}   	      
		    return this;
	},

	savestate:function(e){
		e.preventDefault();
    var self = this;


   document.getElementById("state_full_name_error").innerHTML="";
    document.getElementById("st_code_error").innerHTML="";
     document.getElementById("country_id_error").innerHTML="";
     document.getElementById("zone_id_error").innerHTML="";
     var countryVal = $('#select_country').val();
     var regex=/^[a-zA-Z-\s0-9]+$/;
        var  regex1=/^[a-zA-Z\s]+$/;

    if ($('#state_full_name').val().trim() == '') {
        $('#state_full_name').focus();
     //   $('#city_full_name').attr('style', 'border-bottom:2px solid #FF0000;');
        document.getElementById('state_full_name_error').innerHTML= "Please enter the State Name.";            
        return false;
    }

     if (!regex1.test($('#state_full_name').val().trim())) {
          $('#state_full_name').focus();
          document.getElementById('state_full_name_error').innerHTML= "Please provide valid Name.";
          return false;
         } 

    if ($('#st_code').val().trim() == '') {
        $('#st_code').focus();
     //   $('#city_full_name').attr('style', 'border-bottom:2px solid #FF0000;');
        document.getElementById('st_code_error').innerHTML= "Please enter the State Code.";            
        return false;
    }

     if (!regex1.test($('#st_code').val().trim())) {
          $('#st_code').focus();
          document.getElementById('st_code_error').innerHTML= "Please provide valid Code.";
          return false;
         }      

    if ($('#select_zone').val().trim() == '') {
          $('#select_zone').focus();
       //   $('#state_id').attr('style', 'border-bottom:2px solid #FF0000;');
          document.getElementById('zone_id_error').innerHTML= "Please select the Zone.";
          return false;
      } 

        if ((countryVal == '' ) || (countryVal == null) || (countryVal == undefined)) {
          $('#select_country').focus();
       //   $('#state_id').attr('style', 'border-bottom:2px solid #FF0000;');
          document.getElementById('country_id_error').innerHTML= "Please select the country.";
          return false;
      } 

      
      

		 var stateFormData = {
                  "state_full_name"  : $('#state_full_name').val(),
                  "code"  : $('#st_code').val(),
                  "country_id" : $('#select_country').val(),
                  "zone_id" : $('#select_zone').val(),
                  "created_by_user_id"  : "1",
                  "last_update_user_id" : "11",
                  "state_code" : "1"
           };
    if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
        stateFormData.state_id = parseInt($('#state_id').val(), 10);

        // var selectedZone =  $("#select_zone").val();
            //stateFormData.zone_area_id = parseInt(selectedZone, 10);

          //var selectedCountry =  $("#select_country").val();
            //stateFormData.country_id = parseInt(selectedCountry, 10);
            
        var requestData = JSON.stringify(stateFormData); 
        savestate = "/eprayoga/admin/update_state";
        var successMsg = "State Updated Successfully.";
        var failureMsg = "Error while updating the state. Contact Administrator.";

    } 

      else {
         //var selectedZone =  $("#select_zone").val();
            ///stateFormData.zone_area_id = parseInt(selectedZone, 10);

          //var  selectedCountry =  $("#select_country").val();
            //stateFormData.country_id = parseInt(selectedCountry, 10);
        var requestData = JSON.stringify(stateFormData); 
       // alert(requestData);
        savestate = "/eprayoga/admin/create_state";
        var successMsg = "State Created Successfully.";
        var failureMsg = "Error while creating the state. Contact Administrator.";

      }


          $('#save-state').attr('disabled','disabled');
          $.ajax({
          url     : savestate,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
            
            $('#save-state').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          },
          error: function(data) {
          //	alert(JSON.stringify(data));
                $('#save-state').removeAttr('disabled');
                var errData = JSON.parse(data.responseText);

                          if(errData.state_full_name){

                           var failureMsg = JSON.stringify(errData.state_full_name[0]); 
                           var errmsgshow = failureMsg.replace(/\"/g, "");
                           $( "#state_full_name_error").html("The State name has already been taken");
                          }
                          else if(errData.code){

                           var failureMsg = JSON.stringify(errData.code[0]); 
                           var errmsgshow = failureMsg.replace(/\"/g, "");
                           $( "#st_code_error").html("The State sortname has already been taken");
                          }else{
                          errorhandle(data);
                          }
                 } 
        }); 

	},
  routepopup: function(){
    $('.modal-backdrop').remove(); 
   appRouter.navigate("statelist", {trigger: true});

  },

	cancelCreateForm:function(e){
		   e.preventDefault();
       appRouter.navigate("statelist", {trigger: true});  
	},
  codeFocus:function()
  {
        $('#st_code_error').html("");
    
  },
  nameFocus:function()
  {
        $('#state_full_name_error').html("");
    
  },
  countryFocus:function()
  {
        $('#country_id_error').html("");
    
  },
  zoneFocus:function()
  {
        $('#zone_id_error').html("");
    
  },


});
