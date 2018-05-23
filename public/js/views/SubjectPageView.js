var admin = admin || {};

admin.SubjectPageView = Backbone.View.extend({
    template: $( '#subjectPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create_subject' : 'subjectCreate',
       'click #subject_deleteall'    :'deletepop',
       'click #del_all_record'    :'deleteAll',
       'click #subject_load_more'	 : 'loadMore',
       'keypress #subjectSearch' :'Search',
       'change #uploadFile' : 'uploadFile',
        'click #del_subj'   : 'delSubject',
       
	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	     this.subjectListView = new admin.SubjectTableView({el: $( '#subject_list' )});
		return this;
	},

	subjectCreate:function(e){
    e.preventDefault();
		appRouter.navigate("renderSubjectCreateForm", {trigger: true});
	},
  deletepop:function(e){
    e.preventDefault();
      $('#myModaldeleteall').modal('show');
         
    },

	deleteAll:function(e)
	{
        e.preventDefault();
        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModaldeleteall').modal('toggle');
   //if(confirm("Do you want to delete all record")){
           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_subjectall',
                  //  data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.subjectListView.removeAll();
                      $( "div.success").html("All Subject are deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);

                    }
             });
        // }
		
	},

	loadMore : function(e){
        e.preventDefault();

        this.subjectListView.setShowPage(this.pageNo);
		
	},

  Search:function (event) {
        
         //$('#findStatus').html(alert("No Records Found"));
         if(event.which == 13) {
            this.SearchText();
        return false;
        }

   },

  SearchText : function()
  {
        $('#findStatus').html("");
         //$('#findStatus').html(alert("No Records Found"));
        var search = $('#subjectSearch').val();
        var data = {};
        self=this;
        if(search.length >=1 )
        {
            data.search_text = search;

            this.subjectListView.collection.fetch({url:'/eprayoga/admin/search_subject',reset: true, data:data, processData: true,
                success: function (coll) {
                    $( '#subject_list' ).empty();
                    $( '#subject_list' ).unbind();                       
                    self.subjectListView.render();
                },
                error: function(err) {
                    errorhandle(err);
                      
                }
 
            });
            $("#subject_load_more").show();     
        }
        if(search.length == 0)
        {            
            skip = 0;
             this.subjectListView.collection.fetch({reset: true, data, processData: true,
                success: function (coll) {
                    $( '#subject_list' ).empty();
                    $( '#subject_list' ).unbind();                       
                    self.subjectListView.render();   
                },       
 
            }); 
            $("#subject_load_more").show();         
        }
    },
uploadFile: function (e) {
      e.preventDefault();
      var fileName = e.target.files[0].name; 
      var fileNameArray = fileName.split('.');
      var type = fileNameArray[fileNameArray.length-1];        
      var formData = new FormData();
      formData.append('fileType', type);
      formData.append('fileName', e.target.files[0].name);
      formData.append('uploadFile', e.target.files[0]);
      formData.append('file_category_type', '2');
          $( "div.success").html("<center>File Upload is in progress...</center>");
          $( "div.success" ).fadeIn(300).delay(3500).fadeOut(400);


          $.ajax({
              type: "POST",
              url: "/eprayoga/admin/upload",
              data: formData,
              cache: false,
              contentType: false,
              processData: false,      
              success: function(data1) {
                $('#file_error').empty();
               // appRouter.navigate("manageDocuments", {trigger: true}); 
                  $( "div.success" ).html("File Uploaded Successfully.");
                  $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );             
                },
              // error: function(data) {
              //     try{
              //         var errData = JSON.parse(data.responseText);
              //         if ( errData.errCode == 550) {
              //             window.location.href = '/sessionExpired';
              //         } else {
              //             if (errData.errMsg.length > 0) {
              //               var failureMsg = errData.errMsg;  
              //             } else {
              //               var failureMsg = "Error while uploading File. Please Contact Administrator.";  
              //             }
              //             $( "div.failure").html(failureMsg);
              //             $( "div.failure" ).fadeIn( 300 ).delay( 3500 ).fadeOut( 800 );              
              //           }
              //     } catch(e) {
              //         window.location.href = '/sessionExpired';
              //      }
              // }                 
          });        
  },

delSubject:function(e){
        e.preventDefault();
        var self = this;
         $('body').removeClass('modal-open');                
         $('.modal-backdrop').remove();                      
         $('#myModalSub').modal('toggle');

        var subjectId = $('#subjid').val();
        
        var requestData = JSON.stringify({"subject_id":subjectId});
         
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_subject',
                    data: requestData,
                    contentType:'application/json',
                    cache:false,
                    success: function(data) {
                       //self.remove();
                       appRouter.currentView.render();
                      $( "div.success").html("Subject has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);

                    }
             });
         
    },



});
