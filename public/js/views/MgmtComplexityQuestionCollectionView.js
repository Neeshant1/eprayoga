var admin = admin || {};

admin.MgmtComplexityQuestionCollectionView = Backbone.View.extend({

	initialize: function(options) {
    	
			this.collection = new admin.ComplexityQuestionCollection(options.complexityCollection);
          	_.bindAll(this, "renderComplexityQuestion");
		    _.bindAll(this, "render");
		    this.render();
	},

	render: function() {
    	
    	if( this.collection )    	{
    		
    		 this.$el.html( '<option value="">--Select--</option>' );
			this.collection.each(function(item) {
		    	
				this.renderComplexityQuestion(item);
			}, this );
		}
    	return this;
	},

	renderComplexityQuestion: function( item ) {
		var complexityQuestionItemView = new admin.MgmtComplexityQuestionItemView({
			model: item
		});
    	this.$el.append( complexityQuestionItemView.render().el );
	}

});
