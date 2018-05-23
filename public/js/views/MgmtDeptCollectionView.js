var admin = admin || {};

admin.MgmtDeptCollectionView = Backbone.View.extend({

	initialize: function(options) {
    	
			this.collection = new admin.DepartmentCollection(options.deptCollection);
			
      // this.clnt_id = options.clnt_id;

		_.bindAll(this, "renderDeptCategory");
		_.bindAll(this, "render");
		this.render();
	},

	render: function() {
    	
    	if( this.collection )
    	{
    		
    		 // this.$el.html( '<option value="">Select</option>' );
			this.collection.each(function(item) {
		    	
				this.renderDeptCategory(item);
			}, this );
		}
    	return this;
	},

	renderDeptCategory: function( item ) {
		var deptItemView = new admin.MgmtDeptItemView({
			model: item
		});
    	this.$el.append( deptItemView.render().el );
	}

});
