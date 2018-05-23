 var admin = admin || {};

admin.ClientTypeFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.clienttypeId = options.id;
       this.template = options.template;
       var self = this;
      
        if(new String(this.mode).valueOf() == new String('create').valueOf()){
              this.render();
        }	

        else{

          var requestJson = JSON.stringify({"clnt_type_id":this.clienttypeId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_client_type_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
              
                    self.clienttypeData = data;
                  },
                  error: function(data) {
                    errorhandle(data);         
                  }
                })
                ).done(function(){
                    self.render();

                })
        }
      // this.render();
     },

    events: {
		'click  #clienttype-save'  : 'saveClient',
		'click  #clienttype-cancel'	: 'cancelClient', 
    'click  #clnt_type_name'  : 'nameFocus',
	},

    render: function() {
      $('.popover-content').hide();
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			this.$el.html(this.template);
      this.$el.append(this.template1);
      this.$el.find("#sclienttype-save").html("Create");
	    } 
        else { //edit
			  this.$el.html(this.template( this.clienttypeData ));
        this.$el.append(this.template1);
		}   	      
		    return this;
	},
	saveClient:function(e){
		e.preventDefault();
    var self = this;

      document.getElementById("clnt_type_name_error").innerHTML="";
       //var regex1=/^[a-zA-Z][a-zA-Z-.\s]+$/;
      
        if ($('#clnt_type_name').val().trim() == '' ) {
          $('#clnt_type_name').focus();
          document.getElementById('clnt_type_name_error').innerHTML= "Please enter the Client Name";             
          return false;
         } 
         // if (!regex1.test($('#clnt_type_name').val().trim())) {
         //  $('#clnt_type_name').focus();
         //  document.getElementById('clnt_type_name_error').innerHTML= "Please Provide Valid Client Name ";
         //  return false;
         // } 
         
		 var clienttypeFormData = {
           "clnt_type_name"  : $('#clnt_type_name').val(),

      };

        // var requestData = JSON.stringify(faqFormData);

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            clienttypeFormData.clnt_type_id = parseInt($('#clnt_type_id').val(), 10);
            var requestData = JSON.stringify(clienttypeFormData); 
            saveclient = "/eprayoga/admin/update_client_type";
            var successMsg = "Client Type has been Updated Successfully.";
            var failureMsg = "Error while updating the Client Type .Please Contact Administrator.";
      } 
      else {
            var requestData = JSON.stringify(clienttypeFormData); 
            saveclient = "/eprayoga/admin/create_client_type";
            var successMsg = " Client Type Created Successfully.";
            var failureMsg = "Error while creating the Client Type .Please Contact Administrator.";

      }
        $('#clienttype-save').attr('disabled','disabled');

        $.ajax({
          url     :saveclient,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
          
            $('#clienttype-save').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);

          },
          error: function(data) {
            $('#clienttype-save').removeAttr('disabled');
                
            var errData = JSON.parse(data.responseText);

            if(errData.clnt_type_name){
            

             var nameMsg = JSON.stringify(errData.clnt_type_name[0]); 
             var nameerrormsg = nameMsg.replace(/\"/g, "");
             $( "#clnt_type_name_error").html('The Client Type has already been taken.');
            }else{
            errorhandle(data);
            }
          } 
        }); 

	},
   routepopup: function(){
    $('.modal-backdrop').remove(); 
   
    appRouter.navigate("clienttypelist", {trigger: true});

  },

	cancelClient:function(e){
		   e.preventDefault();
       appRouter.navigate("clienttypelist", {trigger: true});  
	},
  // codeFocus:function()
  // {
  //       $('#usertype_code_error').html("");
  // },
  nameFocus:function()
  {
        $('#clnt_type_name_error').html("");
  }
// descFocus:function()
//   {
//         $('#usertype_desc_error').html("");
// 	}



});
