var admin = admin || {};
admin.CategoryFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.catId = options.id;
       this.template = options.template;
       var self = this;
      
        if(new String(this.mode).valueOf() == new String('create').valueOf()){

              // this.render();

              $.when(
              $.ajax({
              url: "/eprayoga/admin/get_client_id",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   

                     self.clientdata = data;
                  },
                  error: function(data) {
                    errorhandle(data);         
                  }
                })
                ).done(function(){
                self.render();

             

                // self.clientCollectionView = new admin.MgntClientCollectionView({
                // el: $( '#category_client_id' ),
                // clientCollection: self.clientdata
                //  });
                 });

        } 

        else{

             var requestJson = JSON.stringify({"category_id":this.catId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_category_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                 
                    self.catData = data;
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
    'click  #save_category'  : 'saveCategory',
    'click  #cancel_category' : 'cancelCreateForm',
    'click  #category_client_id'  : 'idFocus',
    'click  #category_name'  : 'nameFocus',
  },

    render: function() {
    if (new String(this.mode).valueOf() == new String('create').valueOf()) {
       
      this.$el.html(this.template);
      this.$el.append(this.template1);
      } 
        else { //edit
        this.$el.html(this.template( this.catData ));
        this.$el.append(this.template1);
        this.$el.find("#save_category").html("save");
        
    }           
        return this;
  },

  saveCategory:function(e){
    e.preventDefault();

//    document.getElementById("category_client_id_error").innerHTML="";
    document.getElementById("category_name_error").innerHTML="";
     var categoryFormData = {
                  //"clnt_id"  : '1',
                  "category_name"  : $('#category_name').val(),
                  "category_description" : $('#category_description').val()
                 
      };           

        var regex2=/^[a-zA-Z][a-zA-Z-&.\s]+$/;

   //   if ($('#category_client_id').val().trim() == '' ) {
   //     $('#category_client_id').focus();
   //     document.getElementById('category_client_id_error').innerHTML= "Please select the Client";             
   //     return false;
   //   } 

      if ($('#category_name').val().trim() == '' ) {
        $('#category_name').focus();
        document.getElementById('category_name_error').innerHTML= "Please enter the Category Name";             
        return false;
      } 

       if ($('#category_description').val().trim() == '' ) {
        $('#category_description').focus();
        document.getElementById('category_description_error').innerHTML= "Please enter the Category description";             
        return false;
      } 
      // if (!regex2.test($('#category_name').val().trim())) {
      //     $('#category_name').focus();
      //     document.getElementById('category_name_error').innerHTML= "Please provide valid name ";
      //     return false;
      // } 
                                   
      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            categoryFormData.category_id = parseInt($('#category_id').val(), 10);
           // var selectedClient =  $("#category_client_id").val();
        //    categoryFormData.clnt_id = $("#category_client_id").val();
            savecategory = "/eprayoga/admin/update_category";
            var successMsg = "Category Updated Successfully.";
            var failureMsg = "Error while updating the Category .Please Contact Administrator.";
      } 
      else {
        //    categoryFormData.clnt_id = $("#category_client_id").val();
            savecategory = "/eprayoga/admin/create_category";
            var successMsg = "Category Created Successfully.";
            var failureMsg = "Error while creating the Category .Please Contact Administrator.";
      }

     var requestData = JSON.stringify(categoryFormData); 
          var self = this;
          $('#save_category').attr('disabled','disabled');
          $.ajax({
          url     :savecategory,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
             // alert(JSON.stringify(data));
           
            $('#save_category').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
            

          },
          error: function(data) {
            $('#save_category').removeAttr('disabled');
             var errData = JSON.parse(data.responseText);
  
            if(errData.category_name){
               
              
               var failureMsg = JSON.stringify(errData.category_name[0]); 
               var errmsgshow = failureMsg.replace(/\"/g, "");
               $( "#category_name_error").html("The Category name has already been taken.");
            }else{
            errorhandle(data);
            }
          } 
  
        }); 

  },
  routepopup: function(){
    $('.modal-backdrop').remove(); 
   
    appRouter.navigate("categorypage", {trigger: true});

  },

  cancelCreateForm:function(e){
       e.preventDefault();
           appRouter.navigate("categorypage", {trigger: true});  
  },
  idFocus:function()
  {
        $('#category_client_id_error').html("");
  },
  nameFocus:function()
  {
        $('#category_name_error').html("");
  }



});