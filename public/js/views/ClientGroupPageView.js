var admin = admin || {};

admin.ClientGroupPageView = Backbone.View.extend({
    template: $( '#clientGroupPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),

	initialize: function() {
		this.render();    
	},

	events:{
       'click #create-client-group' : 'createClientGroup',
       'click #clientGroupDellAll'    :'deletepop',
       'click #del_all_record'    :'deleteAll',
      'click #clientGroupLoadMore'    : 'loadMore',
       'keypress #clientGroupSearch' :'Search',
       'click #del_clnt_grop'    :'delClientGroup',
	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	     this.clientgroupListView = new admin.ClientGroupTableView({el: $( '#clientGroupList' )});
		return this;
	},

	createClientGroup:function(e){
    e.preventDefault();
		appRouter.navigate("renderClientGroupCreateForm", {trigger: true});
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

       

           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_client_group_all',
                  //  data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.clientgroupListView.removeAll();
                      $( "div.success").html("All client groups are deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
             });
       
    },

    loadMore : function(e){
        e.preventDefault();

        this.clientgroupListView.setShowPage(this.pageNo);
        
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
    var search = $('#clientGroupSearch').val();
    var data = {};
    self=this;
    if(search.length >=1 )
    {      
        data.search_text = search;      
        this.clientgroupListView.collection.fetch({url:'/eprayoga/admin/search_client_group',reset: true, data:data, processData: true,
            success: function (coll) {
                $( '#clientGroupList' ).empty();
                $( '#clientGroupList' ).unbind();                       
                self.clientgroupListView.render();
            },
            error: function(err) {
                errorhandle(err);                    
            }

        });
        $("#clientGroupLoadMore").show();     
      }
      if(search.length == 0)
      {            
         
          skip = 0;
           this.clientgroupListView.collection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $( '#clientGroupList' ).empty();
                  $( '#clientGroupList' ).unbind();                       
                  self.clientgroupListView.render();   
              },       

          }); 
          $("#clientGroupLoadMore").show();         
      }
    },

     delClientGroup:function(e){
      e.preventDefault();
      var self = this;
      $('body').removeClass('modal-open');                
      $('.modal-backdrop').remove();                      
      $('#myModal').modal('toggle');  
      var clntgroupId = $('#clntgrid').val();
      var requestData = JSON.stringify({"clnt_group_id":clntgroupId});

      
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_client_group',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      
                      appRouter.currentView.render();
                      $( "div.success").html("Client Group has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data); 
                    }
             });
         
    },


});
