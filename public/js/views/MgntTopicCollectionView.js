var admin = admin || {};

admin.MgntTopicCollectionView = Backbone.View.extend({

	initialize: function(options) {
    	
		this.collection = new admin.TopicCollection(options.topicCollection);
		_.bindAll(this, "renderTopic");
		_.bindAll(this, "render");
		this.render();
	},

	render: function() {
    	
    	if( this.collection ){    		
    		this.$el.html( '<option value="">--Select--</option>' );
			this.collection.each(function(item) {
		    	
				this.renderTopic(item);
			}, this );
		}
    	return this;
	},

	renderTopic: function( item ) {
		var topItemView = new admin.MgntTopicItemView({
			model: item
		});
    	this.$el.append( topItemView.render().el );
	}

});
