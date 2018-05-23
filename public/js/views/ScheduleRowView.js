var admin = admin || {};

admin.ScheduleRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'scheduleList',
	  template: $( '#scheduleTemplate' ).html(),

  initialize: function() {
    	_.bindAll(this, "render");
      this.model.bind('change', this.render);
	},

  events:{
       'click #reSchedule'    :'reSchedule',
      // 'click #del_addresstype'     :'delAddressType'
  },

	render: function() {
    $('.popover-content').hide();
		var tmpl = _.template( this.template );
		this.$el.html( tmpl( this.model.toJSON() ) );
		return this;
	},

  reSchedule:function(e){
        e.preventDefault();
        appRouter.navigate("renderScheduleEditForm/" + this.model.get('exam_schedule_id'), {trigger:true})
  },


});