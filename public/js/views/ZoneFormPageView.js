var admin = admin || {};

admin.ZoneFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.zoneId = options.id;
       this.template = options.template;
       var self = this;
        if(new String(this.mode).valueOf() == new String('create').valueOf()){

            this.render();
        }	

        else{

             var requestJson = JSON.stringify({"zone_area_id":this.zoneId});
              $.ajax({
              url: "/eprayoga/admin/get_zone_area_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
               // alert(JSON.stringify(data));
                    self.faqData = data;
                    self.render();
                  },
                  error: function(data) {
                    errorhandle(data);

                         
                  }
                })
               
        }
     },

    events: {
		'click  #save-zone'  : 'saveZoneArea',
		'click  #cancel-zone'	: 'cancelZoneForm',
    'click  #zone-code' : 'codeFocus',
    'click  #zone-name' : 'nameFocus',
    'click  #zone-desc' : 'descFocus'
    
	},

    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			this.$el.html(this.template);
       this.$el.append(this.template1);
	    } 
        else { //edit
			  this.$el.html(this.template( this.faqData ));
        this.$el.append(this.template1);
		}   	      
		    return this;
	},

	saveZoneArea:function(e){
		e.preventDefault();
    var self = this;

     document.getElementById("zone-name-error").innerHTML="";

          //var  regex=/^[a-zA-Z\s\-0-9]+$/;
        var  regex1=/^[a-zA-Z-\s]+$/;

        if ($('#zone-name').val().trim() == '') {
        $('#zone-name').focus();
     //   $('#city_full_name').attr('style', 'border-bottom:2px solid #FF0000;');
        document.getElementById('zone-name-error').innerHTML= "Please enter the Zone Name";            
        return false;
        }
  
      if (!regex1.test($('#zone-name').val().trim())) {
          $('#zone-name').focus();
          document.getElementById('zone-name-error').innerHTML= "Please provide valid Name";
          return false;
         } 

      //alert($('#zone-name').val());

		 var zoneFormData = {
           "zone_name"  : $('#zone-name').val()
      };
                                              
          // alert("edit zone data" + JSON.stringify(zoneFormData));

        // var requestData = JSON.stringify(faqFormData);

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            zoneFormData.zone_area_id = parseInt($('#zone-id').val(), 10);
           var requestData = JSON.stringify(zoneFormData); 
            savezone = "/eprayoga/admin/update_zone_area";
            var successMsg = "Zone Updated Successfully.";
            var failureMsg = "Error while updating the Zone. Contact Administrator.";
      } 
      else {

            var requestData = JSON.stringify(zoneFormData); 
           // alert(requestData);
            savezone = "/eprayoga/admin/create_zone_area";
            var successMsg = "Zone Created Successfully.";
            var failureMsg = "Error while creating the Zone. Contact Administrator.";
      }
        $('#save-zone').attr('disabled','disabled');

          $.ajax({
          url     :savezone,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
             
            $('#save-zone').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          },
          error: function(data) {
          	//alert(JSON.stringify(data));
            $('#save-zone').removeAttr('disabled');
                           var errData = JSON.parse(data.responseText);
                     if(errData.zone_name){
                           var failureMsg = JSON.stringify(errData.zone_name[0]); 
                           var errormsg = failureMsg.replace(/\"/g, "");

                       $( "#zone-name-error").html(errormsg);
                        }else{
                          errorhandle(data);
                      }
                 } 
        }); 

	},
  routepopup: function(){
    $('.modal-backdrop').remove(); 
   appRouter.navigate("zonepage", {trigger: true});

  },


	cancelZoneForm:function(e){
		   e.preventDefault();
           appRouter.navigate("zonepage", {trigger: true});  
	},
  codeFocus:function()
  {
        $('#zone-code-error').html("");
    
  },
  nameFocus:function()
  {
        $('#zone-name-error').html("");
    
  },
   // descFocus:function()
   // {
   //       $('#zone_desc_error').html("");
    
   // }

});
