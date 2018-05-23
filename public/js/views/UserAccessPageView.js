var admin = admin || {};

admin.UserAccessPageView = Backbone.View.extend({
    template: $( '#userAccessPageTpl' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create-userAccess'    : 'userAccessCreate',
       'click #userAccess_deleteall' :'deleteAll',
       //'click #userAccess_load_more'   : 'loadMore',
       //'keypress #userAccess_search'  : 'userAccessSearch'
       // 'click #edit-faq'    :'editFaq'
	},

	render: function() {					
	    this.$el.html(this.template);
	     this.userAccessListView = new admin.UserAccessTableView({el: $( '#useraccessList' )});
		return this;
	},

	userAccessCreate:function(e){
        e.preventDefault();
		appRouter.navigate("renderUserAccessCreateForm", {trigger: true});
	},


	deleteAll:function(e)
	{
        e.preventDefault();
        var self = this;

        if(confirm("Do you want delete all record")){

           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_alluseraccess',
                    contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.userAccessListView.removeAll();
                      $( "div.success").html("All user Access are Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);

                    }
             });
		  }
	},


	loadMore : function(e){
        e.preventDefault();
        this.userAccessListView.setShowPage(this.pageNo);
		
	},


});
