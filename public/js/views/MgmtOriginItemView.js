var admin = admin || {};

admin.MgmtOriginItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){
     
      $(this.el).attr('value',
      this.model.get('orig_type_id')).html(this.model.get('orig_type_name'));
      return this;
    }

});
