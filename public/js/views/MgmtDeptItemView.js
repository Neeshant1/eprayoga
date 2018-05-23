var admin = admin || {};

admin.MgmtDeptItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){
     
      $(this.el).attr('value',
      this.model.get('emp_dept_id')).html(this.model.get('emp_dept_name'));
      return this;
    }

});
