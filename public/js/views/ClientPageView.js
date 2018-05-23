var admin = admin || {};

admin.ClientPageView = Backbone.View.extend({
    template: $( '#clientPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
    admin.mode = 0;
	},

	events:{
       'click #create-client' : 'clientCreate',
        'click #clientDelAll'    :'deletepop',
        'click #del_all_record'    :'deleteAll',
       'click #clientLoadMore'    : 'loadMore',
       'keypress #clientSearch' :'Search',
        'click #del_clnt_id'    : 'delClient',
    
	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	     this.clientListView = new admin.ClientTableView({el: $( '#clientList' )});
		return this;
	},

	clientCreate:function(e){
    e.preventDefault();
		appRouter.navigate("renderClientCreateForm", {trigger: true});
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
                    url: '/eprayoga/admin/delete_client_all',
                  //  data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.clientListView.removeAll();
                      $( "div.success").html("All Clients are deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
             });
        
    },

    loadMore : function(e){
        e.preventDefault();

        this.clientListView.setShowPage();
        
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
    var search = $('#clientSearch').val();
    var data = {};
    self=this;
    if(search.length >=1 )
    {
       
        data.search_text = search;
        this.clientListView.collection.fetch({url:'/eprayoga/admin/search_client',reset: true, data:data, processData: true,
            success: function (coll) {
                $( '#clientList' ).empty();
                $( '#clientList' ).unbind();                       
                self.clientListView.render();
            },
            error: function(err) {
               errorhandle(data);                   
            }

        });
        $("#clientLoadMore").show();     
      }
      if(search.length == 0)
      {            
          skip = 0;
           this.clientListView.collection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $( '#clientList' ).empty();
                  $( '#clientList' ).unbind();                       
                  self.clientListView.render();   
              },       

          }); 
          $("#clientLoadMore").show();         
      }
    },

     delClient:function(e){
        e.preventDefault();

        var self = this;
         $('body').removeClass('modal-open');                
         $('.modal-backdrop').remove();                      
         $('#myModalclient').modal('toggle'); 
        var clntId =  $('#clienid').val();
        var requestData = JSON.stringify({"client_id":clntId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_client',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                      
                       appRouter.currentView.render();
                      $( "div.success").html("Client has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                     errorhandle(data);  
                    }
             });

     
  },

});
