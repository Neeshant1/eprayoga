var admin = admin || {};

admin.MgntClientCollectionView = Backbone.View.extend({

	initialize: function(options) {
    	
			this.collection = new admin.ClientCollection(options.clientCollection);

		_.bindAll(this, "renderClient");
		_.bindAll(this, "render");
		this.render();
	},

	render: function() {
    	
    	if( this.collection )
    	{
    		
    		this.$el.html( '<option value="">--Select--</option>' );
			this.collection.each(function(item) {
		    	
				this.renderClient(item);
			}, this );
		}
    	return this;
	},

	renderClient: function( item ) {
		var clientItemView = new admin.MgntClientItemView({
			model: item
		});
    	this.$el.append( clientItemView.render().el );
	},

});
