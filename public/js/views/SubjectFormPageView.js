var admin = admin || {};

admin.SubjectFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.subId = options.id;
       this.template = options.template;
       var self = this;
        if(new String(this.mode).valueOf() == new String('create').valueOf()){
             
               $.when(
              $.ajax({
              url: "/eprayoga/admin/get_category_list",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {

                     self.catdata = data;
                  },
                  error: function(data) {
                    errorhandle(data);
          
                  }
                }),
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
                self.catCollectionView = new admin.MgntCategoryCollectionView({
                el: $( '#subject_category' ),
                catCollection: self.catdata
                 });

                self.clientCollectionView = new admin.MgntClientCollectionView({
                    el: $( '#subject_client' ),
                    clientCollection: self.clientdata
                 }); 

                });

             // this.render();
        }	

        else{

             var requestJson = JSON.stringify({"subject_id":this.subId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_subject_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
               // alert(JSON.stringify(data));
                    self.subjectData = data;
                  },
                  error: function(data) {
                   errorhandle(data);
   
                  }
                }),
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
                }),
                $.ajax({
                  url: "/eprayoga/admin/get_category_list",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {

                     self.categorydata = data;
                  },
                  error: function(data) {
                    errorhandle(data);
       
                  }
                })

                ).done(function(){
                    self.render();
                     self.catCollectionView = new admin.MgntCategoryCollectionView({
                     el: $( '#subject_category' ),
                     catCollection: self.categorydata
                     });

                    self.clientCollectionView = new admin.MgntClientCollectionView({
                    el: $( '#subject_client' ),
                    clientCollection: self.clientdata
                     }); 
                //   $('#subject_client').val(self.subjectData.clnt_id);
                   $('#subject_category').val(self.subjectData.category_code);
                  $('#subject_category').val(self.subjectData.category_id);
                   
  
                })
        }
      // this.render();
     },

    events: {
		'click  #save_subject'  : 'saveSubject',
		'click  #cancel_subject'	: 'cancelCreateForm',
    'click  #subject_client'  : 'clientFocus',
    'click  #subject_name'  : 'nameFocus',
	},

    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			this.$el.html(this.template);
      this.$el.append(this.template1);
	    } 
        else { //edit
			  this.$el.html(this.template( this.subjectData ));
        this.$el.append(this.template1);
        this.$el.find("#save_subject").html("save");
		}   	      
		    return this;
	},
  cancelCreateForm:function(){
    appRouter.navigate("subjectpage", {trigger: true});
  },

	saveSubject:function(e){
		e.preventDefault();
    var self = this;

  //  document.getElementById("subject_client_error").innerHTML="";
    document.getElementById("subject_category_error").innerHTML="";
    document.getElementById("subject_name_error").innerHTML="";

		 var subjectFormData = {
             // "clnt_id": $('#subject_client').val(),
              "category_id":$('#subject_category').val(),
              "subject_name"  : $('#subject_name').val(),
              "sub_description" : $('#sub_description').val()

      };

       var regex=/^[a-zA-Z.][0-9a-zA-Z\s\r\n@!_#\$\^%&*()+=\-\[\]\\\';,\.\/\{\}\|\":<>\?]+$/;
        
    //  if ($('#subject_client').val().trim() == '' ) {
    //    $('#subject_client').focus();
    //    document.getElementById('subject_client_error').innerHTML= "Please select the Client";             
    //    return false;
    //  } 

      if ($('#subject_category').val().trim() == '' ) {
        $('#subject_category').focus();
        document.getElementById('subject_category_error').innerHTML= "Please select the Category";             
        return false;
      } 

      if ($('#subject_name').val().trim() == '' ) {
        $('#subject_name').focus();
        document.getElementById('subject_name_error').innerHTML= "Please enter the subject Name";             
        return false;
      } 
      if (!regex.test($('#subject_name').val().trim())) {
        $('#subject_name').focus();
        document.getElementById('subject_name_error').innerHTML= "Please provide valid subject name ";
        return false;
      }

       if ($('#sub_description').val().trim() == '' ) {
        $('#sub_description').focus();
        document.getElementById('sub_description_error').innerHTML= "Please enter the subject description";             
        return false;
      } 

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {

            subjectFormData.subject_id = parseInt($('#subject_id').val(), 10);
            var requestData = JSON.stringify(subjectFormData); 
            savesub = "/eprayoga/admin/update_subject";
            var successMsg = "Subject Updated Successfully.";
            var failureMsg = "Error while updating the Subject. Contact Administrator.";
      } 
      else {
           var requestData = JSON.stringify(subjectFormData); 
            savesub = "/eprayoga/admin/create_subject";
            var successMsg = "Subject Created Successfully.";
            var failureMsg = "Error while creating the Subject. Contact Administrator.";
      }
         // subjectFormData.clnt_id = $("#subject_client").val(); 
         // subjectFormData.category_id = $("#subject_category").val();

        
          $('#save_subject').attr('disabled','disabled');
          $.ajax({
          url     :savesub,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
 
            $('#save_subject').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          },
          error: function(data) {
           

            $('#save_subject').removeAttr('disabled');
          	  var errData = JSON.parse(data.responseText);
               if(errData.subject_name){
                         
                           var failureMsg = JSON.stringify(errData.subject_name[0]); 
                           var errormsg = failureMsg.replace(/\"/g, "");

                       $( "#subject_name_error").html('The Subject name has already been taken');
                     }else{
                          errorhandle(data);
                          }

                 } 
        }); 

	},

   routepopup: function(){
    $('.modal-backdrop').remove(); 
   appRouter.navigate("subjectpage", {trigger: true});

  },

   clientFocus:function()
  {
        $('#subject_client_error').html("");
  },

  nameFocus:function()
  {
        $('#subject_name_error').html("");
  },

	


});
