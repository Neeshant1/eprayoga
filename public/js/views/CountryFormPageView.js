var admin = admin || {};

admin.CountryFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.countryId = options.id;
       this.template = options.template;
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
                })
                ).done(function(){

                self.render();
                self.zoneCollectionView = new admin.MgntZoneCollectionView({
                el: $( '#select_zone' ),
                zoneCollection: self.zonedata,
                mode:'country'
                 });
                });

        }	

        else{

             var requestJson = JSON.stringify({"country_id":this.countryId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_country_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
              cache:false,
                  success: function(data) {
                    
                    self.countryData = data;
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
                     self.zoneCollectionView = new admin.MgntZoneCollectionView({
                el: $( '#select_zone' ),
                zoneCollection: self.zonedata,
                mode:'country'
                 });
                     $('#select_zone').val(self.countryData.zone_code);
                     $('#select_zone').val(self.countryData.zone_id);

                });

        }
      //this.render();
     },

    events: {
		'click  #save-country'  : 'savecountry',
		'click  #cancel'	: 'cancelCreateForm',
    'click  #country_full_name'  : 'fullnameFocus',
    'click  #country_short_name'  : 'nameFocus',
    'click  #country_phonecode' :'countryFocus',
    'click  #zone_id':'zoneFocus'
	},

    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			 
			this.$el.html(this.template);
      this.$el.append(this.template1);

                  this.$el.find("#save-country").html("Create");
                 // $("#save-country").render();
	    } 
        else { //edit
			  this.$el.html(this.template( this.countryData ));
        this.$el.append(this.template1);
			   
		}   	      
		    return this;
	},

	savecountry:function(e){
		e.preventDefault();
    var self = this;
     

        var  regex=/^[a-zA-Z\s]+$/;
        var  regex1=/^[a-zA-Z\s]+$/
         var  regex2=/^[0-9]*$/;
       

    if ($('#country_full_name').val().trim() == '') {
        $('#country_full_name').focus();
     //   $('#city_full_name').attr('style', 'border-bottom:2px solid #FF0000;');
        document.getElementById('country_full_nameerror').innerHTML= "Please enter the Country  Full Name";            
        return false;
    }

     if (!regex.test($('#country_full_name').val().trim())) {
          $('#country_full_name').focus();
          document.getElementById('country_full_nameerror').innerHTML= "Please provide valid Name";
          return false;
         } 

     if ($('#country_short_name').val().trim() == '') {
        $('#country_short_name').focus();
     //   $('#city_full_name').attr('style', 'border-bottom:2px solid #FF0000;');
        document.getElementById('country_short_name_error').innerHTML= "Please enter the Country  Short Name";            
        return false;
    }

     if (!regex1.test($('#country_short_name').val().trim())) {
          $('#country_short_name').focus();
          document.getElementById('country_short_name_error').innerHTML= "Please provide valid Name";
          return false;
         } 
    
    if ($('#country_phonecode').val().trim() == '') {
        $('#country_phonecode').focus();
     //   $('#city_full_name').attr('style', 'border-bottom:2px solid #FF0000;');
        document.getElementById('country_phonecode_error').innerHTML= "Please enter the Country Phone code";            
        return false;
    }

     if (!regex2.test($('#country_phonecode').val().trim())) {
          $('#country_phonecode').focus();
          document.getElementById('country_phonecode_error').innerHTML= "Please valid Country Phone code";
          return false;
         } 
          if ($('#select_zone').val().trim() == '') {
          $('#select_zone').focus();
       
         //$('#state_id').attr('style', 'border-bottom:2px solid #FF0000;');
          
          document.getElementById('zone_id_error').innerHTML= "Please select the Zone ";
          return false;
      } 
      


		 var countryFormData = {
                  "country_full_name": $('#country_full_name').val(),
                  "country_short_name"  : $('#country_short_name').val(),
                  "country_phonecode" : $('#country_phonecode').val(),
                  "zone_id"  : $('#select_zone').val(),
                  "country_mastercol" : "active",
                  "last_update_user_id" : "11"
           };
          
    if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
       
        countryFormData.country_id = parseInt($('#country_id').val(), 10);

        /*var selectedZone =  $("#select_zone").val();
            countryFormData.zone_area_id = parseInt(selectedZone, 10);*/


        var requestData = JSON.stringify(countryFormData); 
        savecountry = "/eprayoga/admin/update_country";
        var successMsg = "country Updated Successfully.";
        var failureMsg = "Error while Updating the Country .Please Contact Administrator.";

    } 

      else {
        /*var selectedZone =  $("#select_zone").val();
            countryFormData.zone_area_id = parseInt(selectedZone, 10);*/
        
        var requestData = JSON.stringify(countryFormData); 
        savecountry = "/eprayoga/admin/create_country";
        var successMsg = "Country Created Successfully.";
        var failureMsg = "Error while Creating the Country .Please Contact Administrator.";

      }
          $('#save-country').attr('disabled','disabled');
          $.ajax({
          url     : savecountry,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {          
          $('#save-country').removeAttr('disabled');
          $('#messagepop').text(successMsg); 
          $('#myModalPopup').modal('show');
          $('.okClass').bind('click', self.routepopup);
          },
          error: function(data) {

           $('#save-country').removeAttr('disabled');
                         
                    var errData = JSON.parse(data.responseText);

                          if(errData.country_full_name){
                          

                           var failureMsg = JSON.stringify(errData.country_full_name[0]); 
                           var errmsgshow = failureMsg.replace(/\"/g, "");
                           $( "#country_full_nameerror").html("The Country name has already been taken.");
                          }
                          else if(errData.country_short_name){

                           var failureMsg = JSON.stringify(errData.country_short_name[0]); 
                           var errmsgshow = failureMsg.replace(/\"/g, "");
                           $( "#country_short_name_error").html("The short name has already been taken.");
                          }

                         else if(errData.country_phonecode){

                           var failureMsg = JSON.stringify(errData.country_phonecode[0]); 
                           var errmsgshow = failureMsg.replace(/\"/g, "");
                           $( "#country_phonecode_error").html(errmsgshow);
                          }else{
                            errorhandle(data);
                            }
                 } 
        }); 

	},
   routepopup: function(){
    $('.modal-backdrop').remove(); 
   
   appRouter.navigate("countrylist", {trigger: true});

  },

	cancelCreateForm:function(e){
		   e.preventDefault();
       appRouter.navigate("countrylist", {trigger: true});  
	},
  fullnameFocus:function()
  {
        $('#country_full_nameerror').html("");
    
  },
  nameFocus:function()
  {
        $('#country_short_name_error').html("");
    
  },
  countryFocus:function()
  {
        $('#country_phonecode_error').html("");
    
  },
  zoneFocus:function()
  {
        $('#zone_id_error').html("");
    
  }


});
