var admin = admin || {};

admin.MgntCityCollectionView = Backbone.View.extend({

	initialize: function(options) {
    	
			this.collection = new admin.CityCollection(options.cityCollection);

		_.bindAll(this, "renderCity");
		_.bindAll(this, "render");
		this.render();
	},

	events:{
		"change" : "isSelected"
	},

	render: function() {
    	
    	this.$el.html( '<option value="">--Please Select--</option>' );
    	if( this.collection )
    	{
    		
    		 // this.$el.html( '<option value="">Select</option>' );
			this.collection.each(function(item) {
		      
				this.renderCity(item);
			}, this );
		}
    	return this;
	},

	renderCity: function( item ) {
		var cityItemView = new admin.MgntCityItemView({
			model: item
		});
    	this.$el.append( cityItemView.render().el );
	}

});
