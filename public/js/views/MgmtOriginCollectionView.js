var admin = admin || {};

admin.MgmtOriginCollectionView = Backbone.View.extend({

	initialize: function(options) {
    	
			this.collection = new admin.OriginCollection(options.originCollection);
      //this.add_type_id = options.add_type_id;

		_.bindAll(this, "renderOriginCategory");
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
		    	
				this.renderOriginCategory(item);
			}, this );
		}
    	return this;
	},

	renderOriginCategory: function( item ) {
		var originItemView = new admin.MgmtOriginItemView({
			model: item
		});
    	this.$el.append( originItemView.render().el );
	}

});
