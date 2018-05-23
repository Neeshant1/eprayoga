var admin = admin || {};

admin.AddressTypeFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.addTypeId = options.id;
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
                })
                ).done(function(){
                self.render();
                self.originCollectionView = new admin.MgmtOriginCollectionView({
                     el: $( '#origin_type_code' ),
                    originCollection: self.origindata
                 });
                });
        }	

        else{

             var requestJson = JSON.stringify({"add_type_id":this.addTypeId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_address_type_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                    self.addTypeData = data;
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
                     el: $( '#origin_type_code' ),
                     originCollection: self.origindata
                 });
                     
                     $('#origin_type_code').val(self.addTypeData.origin_type_id);
                });
        }

     },

    events: {
		'click  #save_addresstype'  : 'saveAddressType',
		'click  #cancel_addresstype'	: 'cancelCreateForm',
    'click  #addresstype_name'  : 'nameFocus',
    //'click  #origin_type_code'  : 'codeFocus',
	},

    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			  
			this.$el.html(this.template);
      this.$el.append(this.template1);

	    } 
        else { //edit
			  this.$el.html(this.template( this.addTypeData ));
        this.$el.append(this.template1);
			  
		}   	      
		    return this;
	},

	saveAddressType:function(e){
		e.preventDefault();
    var self = this;

        var regex=/^[a-zA-Z-#\s0-9]+$/;
         // var regex1=/^[a-zA-Z-\s0-9]+$/;

         document.getElementById("addresstype_name_error").innerHTML="";
        // document.getElementById("origintype_code_error").innerHTML="";

        if ($('#addresstype_name').val().trim() == '' ) {
          $('#addresstype_name').focus();
          document.getElementById('addresstype_name_error').innerHTML= "Please enter the Address Type Name";             
          return false;
        } 
        if (!regex.test($('#addresstype_name').val().trim())) {
          $('#addresstype_name').focus();
          document.getElementById('addresstype_name_error').innerHTML= "Please provide valid name ";
          return false;
         } 

                  
      var addressTypeFormData = {
          "add_type_name": $('#addresstype_name').val().trim(),
          //"origin_type_id"  : $('#origin_type_code').val(),
  
      };                          

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            addressTypeFormData.add_type_id = parseInt($('#addresstype_id').val(), 10);
           var requestData = JSON.stringify(addressTypeFormData); 
            saveaddresstype = "/eprayoga/admin/update_address_type";
            var successMsg = "Address Type Updated Successfully.";
            var failureMsg = "Error while updating the Address Type .Please Contact Administrator.";
      } 
      else {

            var requestData = JSON.stringify(addressTypeFormData); 
            saveaddresstype = "/eprayoga/admin/create_address_type";
            var successMsg = "Address Type Created Successfully.";
            var failureMsg = "Error while creating the Address Type .Please Contact Administrator.";
      }

          $('#save_addresstype').attr('disabled','disabled');
          $.ajax({
          url     :saveaddresstype,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
            $('#save_addresstype').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          },
          error: function(data) { 
            $('#save_addresstype').removeAttr('disabled');     
            var errData = JSON.parse(data.responseText);

            if(errData.add_type_name){
             var nameMsg = JSON.stringify(errData.add_type_name[0]); 
             var nameerrormsg = nameMsg.replace(/\"/g, "");
             $( "#addresstype_name_error").html(nameerrormsg);
            }else{
            errorhandle(data);
            } 
            
          }
        }); 

	},
  routepopup: function(){
    $('.modal-backdrop').remove(); 

   appRouter.navigate("adddresstype", {trigger: true});

  },

	cancelCreateForm:function(e){
		   e.preventDefault();
       appRouter.navigate("adddresstype", {trigger: true});  
	},
  nameFocus:function()
  {
        $('#addresstype_name_error').html("");
    
  },
  codeFocus:function()
  {
        $('#origintype_code_error').html("");
    
  }



});
