var admin = admin || {};

admin.TopicFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.topicId = options.id;
       this.template = options.template;
       var self = this;
        if(new String(this.mode).valueOf() == new String('create').valueOf()){

                 //this.render();
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
                })
               
                ).done(function(){
                  self.render();
                // self.clientCollectionView = new admin.MgntClientCollectionView({
                // el: $( '#client_name' ),
                // clientCollection: self.clientdata
                //  });
                  self.subjectCollectionView = new admin.MgntSubjectCollectionView({
                    el: $( '#topic_subject_code' )
                  });
                  self.catCollectionView = new admin.MgntCategoryCollectionView({
                    el: $( '#topic_category_code' ),
                    catCollection: self.catdata
                  });
                  self.catCollectionView.subjectCollectionView = self.subjectCollectionView;

                });
        }	else {

             var requestJson = JSON.stringify({"topic_id":this.topicId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_topic_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   self.topicData = data.original;
                                      
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
                    //alert(JSON.stringify(data));
                    

                     self.clientdata = data;
                  },
                  error: function(data) {
                    errorhandle(data);

                  }
                })
                ).done(function(){
                    self.render();
                   
                  self.catCollectionView = new admin.MgntCategoryCollectionView({
                    el: $( '#topic_category_code' ),
                    catCollection: self.catdata,
                    subject_id : self.topicData.subject_id 
                   // subId : self.topicData.subId 
                    
                  });
                  
                 self.subjectCollectionView = new admin.MgntSubjectCollectionView({
                    el: $( '#topic_subject_code' ),
              
                  });                 
                  self.catCollectionView.subjectCollectionView = self.subjectCollectionView;
                    //alert(self.topicData.category_code);
                  // $('#topic_category_code').val(self.topicData.category_code);
                  $('#topic_category_code').val(self.topicData.category_id);
               
                   //alert(self.topicData.subject_code);
                  $('#topic_subject_code').val(self.topicData.subject_id);
                  self.catCollectionView.isSelected();  

                });
        }
      // this.render();
     },

    events: {
		'click  #topic_save'  : 'saveTopic',
		'click  #topic_cancel'	: 'cancelCreateForm',
    'click  #client_name'  : 'nameFocus',
    'click  #topic_category_code'  : 'categoryFocus',
    'click  #topic_subject_code'  : 'subcodeFocus',
    'click  #topic_name'  : 'tnameFocus'
	},

    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			this.$el.html(this.template);
      this.$el.append(this.template1);
	    } 
        else { //edit
			  this.$el.html(this.template( this.topicData ));
        this.$el.append(this.template1);
		}   	      
		    return this;
	},

	saveTopic:function(e){
		e.preventDefault();
    var self = this;
    // document.getElementById("client_name_error").innerHTML="";
      document.getElementById("topic_category_code_error").innerHTML="";
      document.getElementById("topic_subject_code_error").innerHTML="";
      document.getElementById("topic_name_error").innerHTML="";
      var subjectVal = $('#topic_subject_code').val();
       // var regex4=/^[a-zA-Z][0-9a-zA-Z\s\r\n@!_#\$\^%&*()+=\-\[\]\\\';,\.\/\{\}\|\":<>\?]+$/;
         var regex4=/^[a-zA-Z0-9_\-]+( [a-zA-Z0-9_\-]+)*$/;
     //   if ($('#client_name').val().trim() == '' ) {
      //    $('#client_name').focus();
      //    document.getElementById('client_name_error').innerHTML= "Please select the Client";             
      //    return false;
      //   } 

        if ($('#topic_category_code').val().trim() == '' ) {
          $('#topic_category_code').focus();
          document.getElementById('topic_category_code_error').innerHTML= "Please select the Client name";             
          return false;
         } 
        if ((subjectVal == '' ) || (subjectVal == null) || (subjectVal == undefined)) {
            $('#topic_subject_code').focus();
            document.getElementById('topic_subject_code_error').innerHTML= "Please enter the Subject code";             
            return false;
         } 
         if ($('#topic_name').val().trim() == '' ) {
        $('#topic_name').focus();
        document.getElementById('topic_name_error').innerHTML= "Please enter the topic name";             
        return false;
         } 
         if (!regex4.test($('#topic_name').val().trim())) {
          $('#topic_name').focus();
          document.getElementById('topic_name_error').innerHTML= "Please provide valid name ";
          return false;
         } 

		 var topicFormData = {
                 //"client_id": $('#client_name').val(),
                  "category_id"  : $('#topic_category_code').val(),
                  "subject_id" : $('#topic_subject_code').val(),
                  "topic_name"  : $('#topic_name').val(),
                  "topic_description" : $('#topic_description').val()
           };

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            topicFormData.topic_id = parseInt($('#topic_id').val(), 10);
             //var selectedClient =  $("#client_name").val();
        //    topicFormData.client_id = $("#client_name").val();
           var requestData = JSON.stringify(topicFormData); 
            savetopic = "/eprayoga/admin/update_topic";
            var successMsg = "Topic Updated Successfully.";
            var failureMsg = "Error while updating the Topic. Contact Administrator.";
      } 
      else {
           // var selectedClient =  $("#client_name").val();
          //  topicFormData.client_id = $("#client_name").val();
            var requestData = JSON.stringify(topicFormData); 
            savetopic = "/eprayoga/admin/create_topic";
            var successMsg = "Topic Created Successfully.";
            var failureMsg = "Error while creating the Topic. Contact Administrator.";
      }

          $('#topic_save').attr('disabled','disabled');
          $.ajax({
          url     :savetopic,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {

           
            $('#topic_save').removeAttr('disabled');
           $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          },
          error: function(data) {

            $('#topic_save').removeAttr('disabled');
            var errData = JSON.parse(data.responseText);
            if(errData.topic_name){
                           var failureMsg = JSON.stringify(errData.topic_name[0]); 
                           var errormsg = failureMsg.replace(/\"/g, "");

                       $( "#topic_name_error").html('The topic name has Already been taken');
                     }else{
                          errorhandle(data);
                      }

          	
                 } 
        }); 

	},


 routepopup: function(){
    $('.modal-backdrop').remove(); 
    appRouter.navigate("topicpage", {trigger: true});

  },
	cancelCreateForm:function(e){
		   e.preventDefault();
           appRouter.navigate("topicpage", {trigger: true});  
	},
  nameFocus:function()
  {
        $('#client_name_error').html("");
  },
categoryFocus:function()
  {
        $('#topic_category_code_error').html("");
  },
subcodeFocus:function()
  {
        $('#topic_subject_code_error').html("");
  },

tnameFocus:function()
  {
        $('#topic_name_error').html("");
	}



});
