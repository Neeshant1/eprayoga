var admin = admin || {};

admin.UserTypeFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.userTypeId = options.id;
       this.template = options.template;
       var self = this;
        if(new String(this.mode).valueOf() == new String('create').valueOf()){

                   this.render();
        }	

        else{

             var requestJson = JSON.stringify({"user_type_id":this.userTypeId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_user_type_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
               // alert(JSON.stringify(data));
                    self.userTypeData = data;
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
		'click  #save_usertype'  : 'saveUserType',
		'click  #cancel_usertype'	: 'cancelCreateForm',
    'click  #usertype_code'  : 'codeFocus',
    'click  #usertype_name'  : 'nameFocus',
    'click  #usertype_desc'  : 'descFocus',
	},

    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			this.$el.html(this.template);
      this.$el.append(this.template1);
	    } 
        else { //edit
			  this.$el.html(this.template( this.userTypeData ));
        this.$el.append(this.template1);
        this.$el.find("#save_usertype").html("save");
		}   	      
		    return this;
	},

	saveUserType:function(e){
    var self = this;
		e.preventDefault();

     document.getElementById("usertype_name_error").innerHTML="";
     
       //var regex=/^[a-zA-Z-\s0-9]+$/;
       ////var regex1=/^[a-zA-Z-\s]+$/;
     //  var regex2=/^[a-zA-Z-\s]+$/;
        if ($('#usertype_name').val().trim() == '' ) {
          $('#usertype_name').focus();
          document.getElementById('usertype_name_error').innerHTML= "Please enter the User Name";             
          return false;
         } 
         //// if (!regex1.test($('#usertype_name').val().trim())) {
         //    $('#usertype_name').focus();
         //    document.getElementById('usertype_name_error').innerHTML= "Please provide valid name ";
         //    return false;
         // } 
		      var userTypeFormData = {
                  "user_type_name"  : $('#usertype_name').val(),
           };

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            userTypeFormData.user_type_id = parseInt($('#usertype_id').val(), 10);
            var requestData = JSON.stringify(userTypeFormData); 
            saveusertype = "/eprayoga/admin/update_user_type";
            var successMsg = "User Type Updated Successfully.";
            var failureMsg = "Error while updating the User Type. Contact Administrator.";
      } 
      else {
            var requestData = JSON.stringify(userTypeFormData); 
            saveusertype = "/eprayoga/admin/create_user_type";
            var successMsg = "User Type Created Successfully.";
            var failureMsg = "Error while creating the User Type. Contact Administrator.";
      }

          $('#save_usertype').attr('disabled','disabled');
          $.ajax({
          url     :saveusertype,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
            $('#save_usertype').removeAttr('disabled');
           $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          },
          error: function(data) {
                        $('#save_usertype').removeAttr('disabled');
                         var errData = JSON.parse(data.responseText);

                          if(errData.user_type_name){

                           var failureMsg = JSON.stringify(errData.user_type_name[0]); 
                           var errmsgshow = failureMsg.replace(/\"/g, "");
                           $( "#usertype_name_error").html("The User Type Name has already been taken");
                           
                          }else{
                          errorhandle(data);
                      }
  

                 } 
        }); 

	},
routepopup: function(){
    $('.modal-backdrop').remove(); 
     appRouter.navigate("usertypepage", {trigger: true});


  },
	cancelCreateForm:function(e){
		   e.preventDefault();
           appRouter.navigate("usertypepage", {trigger: true});  
	},
  codeFocus:function()
  {
        $('#usertype_code_error').html("");
  },
  nameFocus:function()
  {
        $('#usertype_name_error').html("");
  },
  descFocus:function()
  {
        $('#usertype_desc_error').html("");
	}



});
