var admin = admin || {};

admin.UserAccessFormPageView = Backbone.View.extend({

    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.userAccessId = options.id;
       this.template = options.template;
       var self = this;
        if(new String(this.mode).valueOf() == new String('create').valueOf()){

              // this.render();

              // $.when(
              // $.ajax({
              // url: "/eprayoga/admin/get-client-id",
              //     type: "GET",
              //     contentType:'application/json',
              //     cache:false,
              //     success: function(data) {
                    
              //       console.log(data);

              //        self.clientdata = data;
              //     },
              //     error: function(data) {
                              
              //     }
              //   })
              //   ).done(function(){
              //   self.render();

               
              //    });
              this.render();

        } 

        else{

             var requestJson = JSON.stringify({"user_access_log_id":this.userAccessId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_user_access_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                    self.userAccessData = data;
                  },
                  error: function(data) {
                    errorhandle(data);

                  }
                })
              // $.ajax({
              // url: "/eprayoga/admin/get-client-id",
              //     type: "GET",
              //     contentType:'application/json',
              //     cache:false,
              //     success: function(data) {
              //       //alert(JSON.stringify(data));
              //       console.log(data);

              //        self.clientdata = data;
              //     },
              //     error: function(data) {
              //         // try{
              //         //     var errData = JSON.parse(data.responseText);
              //         //     if ( errData.errCode == 550) {
              //         //         window.location.href = '/sessionExpired';
              //         //     } else {
              //         //         if (errData.errMsg.length > 0) {
                      //           var failureMsg = errData.errMsg; 
                      //         } else {
                      //             var failureMsg = "Error while Edit Faq form. Please Contact Administrator."; 
                      //           }
                      //           $( "div.failure").html(failureMsg);
                      //           $( "div.failure" ).fadeIn( 300 ).delay( 3500 ).fadeOut( 800 ); 
                      //       }
                      // }catch(e) {
                      //     window.location.href = '/sessionExpired';
                      //  }          
                //   }
                // })
                ).done(function(){
                    self.render();

                    // self.clientCollectionView = new admin.MgntClientCollectionView({
                    //     el: $( '#category_client_id' ),
                    //     clientCollection: self.clientdata
                    //  });

              //  $('#category_client_id').val(self.catData.clnt_id);
                })
        }
      // this.render();
     },

    events: {
    'click  #useraccess-save'  : 'saveuseraccess',
    'click  #useraccess-cancel' : 'cancelCreateForm',
    'click  #User-id'  : 'idFocus',
    'click  #Ip-address'  : 'nameFocus',
  },

    render: function() {
    if (new String(this.mode).valueOf() == new String('create').valueOf()) {
      this.$el.html(this.template);
      } 
        else { //edit
        this.$el.html(this.template( this.userAccessData ));
        //this.$el.find("#save_UserAccess").html("save");
    }           
        return this;
  },

  saveuseraccess:function(e){
    e.preventDefault();

//    document.getElementById("category_client_id_error").innerHTML="";
    // document.getElementById("category_name_error").innerHTML="";
     var userAccessFormData = {
                  //"clnt_id"  : '1',
                  "user_profile_id"  : $('#User-id').val(),
                   "login_ip_address"  : $('#Ip-address').val(),
                    "app_signon_type"  : $('#Sign-type').val(),
                    "last_update_user_id"  : 1
      };           

        var regex2=/^[0-9]+$/;

     if ($('#User-id').val().trim() == '' ) {
       $('#User-id').focus();
       document.getElementById('User-id-error').innerHTML= "Please select the User id";             
       return false;
     } 

     // if ($('#category_name').val().trim() == '' ) {
      //   $('#category_name').focus();
      //   document.getElementById('category_name_error').innerHTML= "Please enter the Category Name";             
      //   return false;
      // } 
      if (!regex2.test($('#User-id').val().trim())) {
          $('#User-id').focus();
          document.getElementById('User-id-error').innerHTML= "Please provide valid id[Ex:123] ";
          return false;
      } 
                                   
      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            userAccessFormData.user_access_log_id = parseInt($('#userAccess-id').val(), 10);
           // var selectedClient =  $("#category_client_id").val();
        //    categoryFormData.clnt_id = $("#category_client_id").val();
            saveuseraccess= "/eprayoga/admin/update_user_access";
            var successMsg = "useraccess Updated Successfully.";
            var failureMsg = "Error while updating the useraccess. Contact Administrator.";
      } 
      else {
        //    categoryFormData.clnt_id = $("#category_client_id").val();
            saveuseraccess = "/eprayoga/admin/create_user_access";
            var successMsg = "useraccess Created Successfully.";
            var failureMsg = "Error while creating the useraccess. Contact Administrator.";
      }

     var requestData = JSON.stringify(userAccessFormData); 


          $.ajax({
          url     :saveuseraccess,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
            appRouter.navigate("useraccessList", {trigger: true});
            $( "div.success" ).html(successMsg);
            $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
          },
          error: function(data) {
            

            var errData = JSON.parse(data.responseText);
                           if(errData.user_profile_id){

                           var failureMsg = JSON.stringify(errData.user_profile_id[0]); 
                           var errmsgshow = failureMsg.replace(/\"/g, "");
                           $( "#User-id-error").html("The User id has already been taken");
                          }
                          errorhandle(data);

            //  var errData = JSON.parse(data.responseText);

            // if(errData.category_name){
            //    console.log(JSON.stringify(errData.category_name[0]));

            //    var failureMsg = JSON.stringify(errData.category_name[0]); 
            //    var errmsgshow = failureMsg.replace(/\"/g, "");
            //    $( "#category_name_error").html("The Category name has already been taken");
            // }
          } 
  
        }); 

  },

  cancelCreateForm:function(e){
       e.preventDefault();
           appRouter.navigate("useraccessList", {trigger: true});  
  },
  idFocus:function()
  {
        $('#User-id-error').html("");
  },
  nameFocus:function()
  {
        $('#Ip-address-error').html("");
  }



});