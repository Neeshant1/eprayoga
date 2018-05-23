var admin = admin || {};

admin.MgntClientItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){
     
      $(this.el).attr('value',
      this.model.get('client_id')).html(this.model.get('clnt_name'));
      return this;
    }

});
