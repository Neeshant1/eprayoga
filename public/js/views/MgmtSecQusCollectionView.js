var admin = admin || {};

admin.MgmtSecQusCollectionView = Backbone.View.extend({

	initialize: function(options) {
    	
			this.collection = new admin.SecurityQuestionCollection(options.secqusCollection);
			
      this.clnt_id = options.clnt_id;

		_.bindAll(this, "renderSecQusCategory");
		_.bindAll(this, "render");
		this.render();
	},

	render: function() {
    	
    	if( this.collection )
    	{
    		
    		 // this.$el.html( '<option value="">Select</option>' );
			this.collection.each(function(item) {
		    	
				this.renderSecQusCategory(item);
			}, this );
		}
    	return this;
	},

	renderSecQusCategory: function( item ) {
		var secqusItemView = new admin.MgmtSecQusItemView({
			model: item
		});
    	this.$el.append( secqusItemView.render().el );
	}

});
