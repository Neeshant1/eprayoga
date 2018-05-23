var admin = admin || {};

admin.StatePageView = Backbone.View.extend({
    template: $( '#statePageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create-state' : 'stateCreate',
       'click #edit-state'    :'editstate',
       'click #state_load_more'	 : 'loadMore',
       'click #state_deleteall'	 : 'deletepop',
       'click #del_all_record'    :'deleteAll',
       'keypress #state_search' :'Search',
        'click #del_state_id'     : 'delState',
	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	     this.stateListView = new admin.StateTableView({el: $( '#stateList' )});
		return this;
	},

	stateCreate:function(e){
        e.preventDefault();
		appRouter.navigate("renderStateCreateForm", {trigger: true});
	},

	loadMore : function(e){
        e.preventDefault();
        this.stateListView.setShowPage();
		
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
                    url: '/eprayoga/admin/delete_allstate',
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.stateListView.removeAll();
                      $( "div.success").html("All States are deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                      
                    }
             });
		
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
        var search = $('#state_search').val();
        var data = {};
        self=this;
        if(search.length >=1 )
        {
            data.state_full_name = search;

            this.stateListView.collection.fetch({url:'/eprayoga/admin/search_state',reset: true, data:data, processData: true,
                success: function (coll) {
                    $( '#stateList' ).empty();
                    $( '#stateList' ).unbind();                       
                    self.stateListView.render();
                },
                error: function(err) {
                    errorhandle(err);
                 
                }
 
            });
            $("#state_load_more").show();     
        }
        if(search.length == 0)
        {            
            skip = 0;
             this.stateListView.collection.fetch({reset: true, data, processData: true,
                success: function (coll) {
                    $( '#stateList' ).empty();
                    $( '#stateList' ).unbind();                       
                    self.stateListView.render();   
                },       
 
            }); 
            $("#state_load_more").show();         
        }
    },
  delState:function(e){
        e.preventDefault();

        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModalState').modal('toggle');

        var stateId = $('#statid').val();
        var requestData = JSON.stringify({"state_id":stateId});

      
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_state',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                       //self.remove();
                       appRouter.currentView.render();
                      $( "div.success").html("State has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);

                    }
             });
       
    },




});
