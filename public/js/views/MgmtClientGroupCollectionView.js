var admin = admin || {};

admin.MgmtClientGroupCollectionView = Backbone.View.extend({

	initialize: function(options) {
    	
			this.collection = new admin.ClientGroupCollection(options.clientGroupCollection);
			
      // this.clnt_id = options.clnt_id;

		_.bindAll(this, "renderClientGroupCategory");
		_.bindAll(this, "render");
		this.render();
	},

	render: function() {
    	
    	if( this.collection )
    	{
    		
    		 // this.$el.html( '<option value="">Select</option>' );
			this.collection.each(function(item) {
		    	
				this.renderClientGroupCategory(item);
			}, this );
		}
    	return this;
	},

	renderClientGroupCategory: function( item ) {
		var clientGroupItemView = new admin.MgmtClientGroupItemView({
			model: item
		});
    	this.$el.append( clientGroupItemView.render().el );
	}

});
