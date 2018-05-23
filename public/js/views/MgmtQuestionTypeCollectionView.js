var admin = admin || {};

admin.MgmtQuestionTypeCollectionView = Backbone.View.extend({

	initialize: function(options) {
    	
			this.collection = new admin.QuestionTypeCollection(options.questionTypeCollection);
          	_.bindAll(this, "renderQuestionType");
		    _.bindAll(this, "render");
		    this.render();
	},

	render: function() {
    	
    	if( this.collection )    	{
    		
    		this.$el.html( '<option value="">--Select--</option>' );
			this.collection.each(function(item) {
		    	
				this.renderQuestionType(item);
			}, this );
		}
    	return this;
	},

	renderQuestionType: function( item ) {
		var questionTypeItemView = new admin.MgmtQuestionTypeItemView({
			model: item
		});
    	this.$el.append( questionTypeItemView.render().el );
	}

});
