var admin = admin || {};

admin.ScheduleTableView = Backbone.View.extend({

	el: $( '#scheduleList'),

	initialize: function() {
		var self = this;
    	this.collection = new admin.ScheduleCollection(); 	 
    	offset=0;	
    	this.collection.fetch({ url:'/eprayoga/admin/get_all_schedule',
    	 	//url:'/getAllSubDoc',
    	 	success:function(data){
    	 		
    	 		self.render();
    	 	},
    	 	error:function(data){
    	 		errorhandle(data);

    	 	}
    	}); 

    	//this.listenTo( this.collection, 'add', this.renderFaqItem );
		//this.listenTo( this.collection, 'reset', this.render );
		//this.listenTo( this.collection, 'sort', this.render );
		//_.bindAll(this, "renderFaqItem");
		//_.bindAll(this, "render"); 
	},

	render: function() {
		this.collection.each(function(item) {
			this.renderAddScheduleItem( item );
		}, this);
	  
	    return this;  
	},

	renderAddScheduleItem:function(item){
		var ScheduleRowView = new admin.ScheduleRowView({
			model: item
		});
	    this.$el.append(ScheduleRowView.render().el );
	}
});
