var admin = admin || {};

admin.IndexPageView = Backbone.View.extend({
    template: $( '#indexloginpage' ).html(),
	initialize: function() {
		this.render(); 
	},

	events:{
       'click #sign_up' : 'Signup'
	},
	render: function() {					
	    this.$el.html(this.template);
		return this;
	},
	Signup:function(e){
        e.preventDefault();
    appRouter.navigate("signup", {trigger: true});
  },
});
