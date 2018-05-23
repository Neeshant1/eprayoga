var admin = admin || {};

admin.ExamRowView = Backbone.View.extend({
    tagName:'tr',
    idName: 'Questions_list',
    template: $('#ExamTemplate').html(),
    initialize: function() {
      this.firstRender = true;
      this.activeId = -1;
    	_.bindAll(this, "render");
        this.model.bind('change', this.render);
	  },

	render: function() {
		var tmpl = _.template( this.template);
		this.$el.html( tmpl( this.model.toJSON() ) );
		return this;
	}

});
