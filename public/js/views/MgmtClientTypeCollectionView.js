var admin = admin || {};

admin.MgmtClientTypeCollectionView = Backbone.View.extend({

	initialize: function(options) {
    	
			this.collection = new admin.ClientTypeCollection(options.clientTypeCollection);
      //this.add_type_id = options.add_type_id;

		_.bindAll(this, "renderClientTypeCategory");
		_.bindAll(this, "render");
		this.render();
	},

	events:{
		"change" : "isSelected"
	},

	render: function() {
    	
    	if( this.collection )
    	{
      		 //this.$el.html( '<option value="">Select</option>' );
			this.collection.each(function(item) {
		    	
				this.renderClientTypeCategory(item);
			}, this );
		}
    	return this;
	},

	renderClientTypeCategory: function( item ) {
		var clientTypeItemView = new admin.MgmtClientTypeItemView({
			model: item
		});
    	this.$el.append( clientTypeItemView.render().el );
	}

});
