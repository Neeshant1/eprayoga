var admin = admin || {};

admin.MgmtClientGroupItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){
     
      $(this.el).attr('value',
      this.model.get('clnt_group_id')).html(this.model.get('clnt_group_name'));
      return this;
    }

});
