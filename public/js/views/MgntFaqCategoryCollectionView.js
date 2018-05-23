var admin = admin || {};

admin.MgntFaqCategoryCollectionView = Backbone.View.extend({

	initialize: function(options) {
    	
			this.collection = new admin.FaqCategoryCollection(options.faqCollection);

		_.bindAll(this, "renderFaqCategory");
		_.bindAll(this, "render");
		this.render();
	},

	render: function() {
    	
    	if( this.collection )
    	{
    		
    		 // this.$el.html( '<option value="">Select</option>' );
			this.collection.each(function(item) {
		    	
				this.renderFaqCategory(item);
			}, this );
		}
    	return this;
	},

	renderFaqCategory: function( item ) {
		var faqItemView = new admin.MgntFaqCategoryItemView({
			model: item
		});
    	this.$el.append( faqItemView.render().el );
	},

});
