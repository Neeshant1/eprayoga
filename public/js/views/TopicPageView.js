var admin = admin || {};

admin.TopicPageView = Backbone.View.extend({
    template: $( '#topicPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
     $('#Main_side_bar').hide();
		this.render();    
	},

	events:{
       'click #create-topic' : 'topicCreate',
       'click #topic_deleteall'    :'deletepop',
       'click #del_all_record'    :'deleteAll',
       'click #topic_load_more'	 : 'loadMore',
       'keypress #topicSearch' :'Search',
       'change #uploadFile' : 'uploadFile',
       'click #del_topicpop' : 'delTopic',

       
	},

	render: function() {					
	    this.$el.html(this.template);
       this.$el.append(this.template1);
	     this.topicListView = new admin.TopicTableView({el: $( '#topic_list' )});
		return this;
	},

	topicCreate:function(e){
        e.preventDefault();
		appRouter.navigate("renderTopicCreateForm", {trigger: true});
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
                    url: '/eprayoga/admin/delete_topicall',
                  //data: requestData,
                    contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.topicListView.removeAll();
                      $( "div.success").html("All topic are Deleted Successfully.");
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

        this.topicListView.setShowPage(this.pageNo);
		
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
        var search = $('#topicSearch').val();
        var data = {};
        self=this;
        if(search.length >=1 )
        {
            data.search_text = search;

            this.topicListView.collection.fetch({url:'/eprayoga/admin/search_topic',reset: true, data:data, processData: true,
                success: function (coll) {
                    $( '#topic_list' ).empty();
                    $( '#topic_list' ).unbind();                       
                    self.topicListView.render();
                },
                error: function(err) {
                    
                    errorhandle(err);
                   
                }
 
            });
            $("#topic_load_more").show();     
        }
        if(search.length == 0)
        {            
            skip = 0;
             this.topicListView.collection.fetch({reset: true, data, processData: true,
                success: function (coll) {
                    $( '#topic_list' ).empty();
                    $( '#topic_list' ).unbind();                       
                    self.topicListView.render();   
                },       
 
            }); 
            $("#topic_load_more").show();         
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
      formData.append('file_category_type', '3');
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

delTopic:function(e){
        e.preventDefault();
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModalTop').modal('toggle');

        var self = this;
              var topicId = $('#topiid').val();

              var requestData = JSON.stringify({"topic_id":topicId});
               
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_topic',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                       
                       appRouter.currentView.render();
                      $( "div.success").html("Topic has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });
          
    },

});
