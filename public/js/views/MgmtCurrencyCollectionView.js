var admin = admin || {};

admin.MgmtCurrencyCollectionView = Backbone.View.extend({

	initialize: function(options) {
    	
			this.collection = new admin.CurrencyCollection(options.currencyCollection);
			
      // this.clnt_id = options.clnt_id;

		_.bindAll(this, "renderCurrencyCategory");
		_.bindAll(this, "render");
		this.render();
	},

	render: function() {
    	
    	if( this.collection )
    	{
    		
    		 // this.$el.html( '<option value="">Select</option>' );
			this.collection.each(function(item) {
		    	
				this.renderCurrencyCategory(item);
			}, this );
		}
    	return this;
	},

	renderCurrencyCategory: function( item ) {
		var currencyItemView = new admin.MgmtCurrencyItemView({
			model: item
		});
    	this.$el.append( currencyItemView.render().el );
	}

});
