var admin = admin || {};

admin.SchedulePageView = Backbone.View.extend({
    template: $( '#schedulePageTpl' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #schedule' : 'schedule'
	},

	render: function() {					
	    this.$el.html(this.template);
	     this.scheduleListView = new admin.ScheduleTableView({el: $( '#scheduleList' )});
		return this;
	},

	schedule:function(e){
        e.preventDefault();
		appRouter.navigate("scheduleForm", {trigger: true});
	},




});