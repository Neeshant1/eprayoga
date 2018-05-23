
var admin = admin || {};

admin.FileTypePageView = Backbone.View.extend({
    template: $( '#FileTypePageTpl').html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
   
		this.render();    
	},

	events:{
       'click #create-filetype' : 'fileCreate',
       'click #filetype_load_more'	 : 'loadMore',
       'click #filetype_deleteall'	 : 'deletepop',
        'click #del_all_record'    :'deleteAll',
       'click #del_file_type'   : 'delfile',
       'keypress #fileTypeSearch' :'Search'
       
	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	     this.fileTypeListView = new admin.FileTypeTableView({el: $( '#filetypeList' )});
		return this;
	},

	fileCreate:function(e){
        e.preventDefault();
		appRouter.navigate("renderfiletypeCreateForm",{trigger: true});
	},
	loadMore : function(e){
        e.preventDefault();
        this.fileTypeListView.setShowPage();		
	},
   deletepop:function(e){
    e.preventDefault();
      $('#myModaldeleteall').modal('show');
         
    },
	
	deleteAll:function(e){
        e.preventDefault();
        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModaldeleteall').modal('toggle');
       

           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_file_typeall',
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.fileTypeListView.removeAll();
                      $( "div.success").html("All the File types are Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
             });
    		
	},

  Search:function (event) {
       if(event.which == 13) {
        
          this.SearchText();
      return false;
      }

  },

  SearchText : function() {
    $('#findStatus').html("");
    var search = $('#fileTypeSearch').val();
    var data = {};
    self=this;
    if(search.length >=1 ) {
       
        data.clnt_type_name = search;
        this.fileTypeListView.collection.fetch({url:'/eprayoga/admin/search_file_type',reset: true, data:data, processData: true,
            success: function (coll) {
                $( '#filetypeList' ).empty();
                $( '#filetypeList' ).unbind();                       
                self.fileTypeListView.render();
            },
            error: function(err) {
                errorhandle(data);               
            }
        });
        $("#filetype_load_more").show();     
      }
      if(search.length == 0) {            
          skip = 0;
           this.fileTypeListView.collection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $( '#filetypeList' ).empty();
                  $( '#filetypeList' ).unbind();                       
                  self.fileTypeListView.render();   
              }  
          }); 
          $("#filetype_load_more").show();        
      }
    },
    delfile:function(e){
        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModal').modal('toggle');
      
              var filetypeId = $('#filetyid').val();

              var requestData = JSON.stringify({"file_type_id":filetypeId});

      

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_file_type',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      // self.remove();
                       appRouter.currentView.render();
                      $( "div.success").html("File Type has been Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                     errorhandle(data);
                    }
             });

      
    },


});
