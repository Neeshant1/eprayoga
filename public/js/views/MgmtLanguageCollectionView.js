var admin = admin || {};

admin.MgmtLanguageCollectionView = Backbone.View.extend({

	initialize: function(options) {
    	
			this.collection = new admin.LanguageCollection(options.languageCollection);
			
      // this.clnt_id = options.clnt_id;

		_.bindAll(this, "renderLanguageCategory");
		_.bindAll(this, "render");
		this.render();
	},

	render: function() {
    	
    	if( this.collection )
    	{
    		
    		 // this.$el.html( '<option value="">Select</option>' );
			this.collection.each(function(item) {
		    	
				this.renderLanguageCategory(item);
			}, this );
		}
    	return this;
	},

	renderLanguageCategory: function( item ) {
		var languageItemView = new admin.MgmtLanguageItemView({
			model: item
		});
    	this.$el.append( languageItemView.render().el );
	}

});
