var admin = admin || {};

admin.MgntProductCatalogCollectionView = Backbone.View.extend({

	initialize: function(options) {
    	
			this.collection = new admin.ProductCatalogCollection(options.ProductCatalogCollection);
			
      //this.clnt_id = options.clnt_id;

		_.bindAll(this, "renderProductCatalog");
		_.bindAll(this, "render");
		this.render();
	},

	render: function() {
    	
    	if( this.collection )
    	{
    		
    		 // this.$el.html( '<option value="">Select</option>' );
			this.collection.each(function(item) {
		    	
				this.renderProductCatalog(item);
			}, this );
		}
    	return this;
	},

	renderProductCatalog: function( item ) {
		var productItemView = new admin.MgntProductCatalogItemView({
			model: item
		});
    	this.$el.append( productItemView.render().el );
	}

});
