var admin = admin || {};

admin.FileTypeFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.filetypeId = options.id;
       this.template = options.template;
       var self = this;
      
        if(new String(this.mode).valueOf() == new String('create').valueOf()){
              this.render();
        } 

        else{

          var requestJson = JSON.stringify({"file_type_id":this.filetypeId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_file_type_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                    self.filetypeData = data;
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
    'click  #save-file'  : 'saveFile',
    'click  #cancel-file' : 'cancelFile',

    'click  #file_extension'  : 'nameFocus',
    'click  #file_name'  : 'descFocus',
  },

    render: function() {
    if (new String(this.mode).valueOf() == new String('create').valueOf()) {
      this.$el.html(this.template);
      this.$el.find("#sclienttype-save").html("Create");
       this.$el.append(this.template1);
      } 
        else { //edit
        this.$el.html(this.template( this.filetypeData ));
        this.$el.append(this.template1);
    }           
        return this;
  },
  saveFile:function(e){
    var self = this;
    e.preventDefault();

      document.getElementById("file_extension_error").innerHTML="";
      document.getElementById("file_name_error").innerHTML="";

        if ($('#file_extension').val().trim() == '' ) {
          $('#file_extension').focus();
          document.getElementById('file_extension_error').innerHTML= "Please enter the file extension";             
          return false;
         } 
       if (!validateName($('#file_extension').val().trim())) {
          $('#file_extension').focus();
          document.getElementById('file_extension_error').innerHTML= "Please Provide file name ";
          return false;
         } 

        if ($('#file_name').val().trim() == '' ) {
          $('#file_name').focus();
          document.getElementById('file_name_error').innerHTML= "Please enter the file description";             
          return false;
         } 
         if (!validateName($('#file_name').val().trim())) {
          $('#file_name').focus();
          document.getElementById('file_name_error').innerHTML= "Please Provide file description ";
          return false;
         } 
         
         var filetypeFormData = {
                   "file_type_description"  : $('#file_name').val(),
                   "file_type_extension" : $('#file_extension').val()

          };
          
      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            filetypeFormData.file_type_id = $('#file_type_id').val();
            var requestData = JSON.stringify(filetypeFormData); 
            savefiletype = "/eprayoga/admin/update_file_type";
            var successMsg = "File Type Updated Successfully.";
            var failureMsg = "Error while updating the File Type .Please Contact Administrator.";
      } else {
            var requestData = JSON.stringify(filetypeFormData); 
            savefiletype = "/eprayoga/admin/create_file_type";
            var successMsg = " File Type Created Successfully.";
            var failureMsg = "Error while creating the File Type .Please Contact Administrator.";

      }
           $('#save-file').attr('disabled','disabled');
          $.ajax({
          url     :savefiletype,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
           
            $('#save-file').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          },
          error: function(data) {
            $('#save-file').removeAttr('disabled');
             var errData = JSON.parse(data.responseText);

                  if(errData.file_type_extension){
                    
                     var failureMsg = JSON.stringify(errData.file_type_extension[0]); 
                     var errmsgshow = failureMsg.replace(/\"/g, "");
                     $( "#file_extension_error").html("The File Extension has already been taken");
                  }else{
                    errorhandle(data);
                    }
                 } 
        }); 

  },

  

routepopup: function(){
    $('.modal-backdrop').remove(); 
     appRouter.navigate("filetypelist", {trigger: true});

  },
  
  cancelFile:function(e){
       e.preventDefault();
       appRouter.navigate("filetypelist", {trigger: true});  
  },

  nameFocus:function()
  {
        $('#file_extension_error').html("");
  },

    descFocus:function()
  {
        $('#file_name_error').html("");
  },


});
