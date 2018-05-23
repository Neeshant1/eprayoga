var admin = admin || {};

admin.MgmtAddressTypeCollectionView = Backbone.View.extend({

	initialize: function(options) {
    	
			this.collection = new admin.AddressTypeCollection(options.addressTypeCollection);
			
      // this.clnt_id = options.clnt_id;

		_.bindAll(this, "renderAddressTypeCategory");
		_.bindAll(this, "render");
		this.render();
	},

	render: function() {
    	
    	if( this.collection )
    	{
    		
    		 // this.$el.html( '<option value="">Select</option>' );
			this.collection.each(function(item) {
		    	
				this.renderAddressTypeCategory(item);
			}, this );
		}
    	return this;
	},

	renderAddressTypeCategory: function( item ) {
		var addressTypeItemView = new admin.MgmtAddressTypeItemView({
			model: item
		});
    	this.$el.append( addressTypeItemView.render().el );
	}

});
