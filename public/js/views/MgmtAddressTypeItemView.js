var admin = admin || {};

admin.MgmtAddressTypeItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){
     
      $(this.el).attr('value',
      this.model.get('add_type_id')).html(this.model.get('add_type_name'));
      return this;
    }

});
