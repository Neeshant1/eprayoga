var admin = admin || {};

admin.MgntStateItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){
     
      $(this.el).attr('value',
      this.model.get('state_id')).html(this.model.get('state_full_name'));
      return this;
    }

});
