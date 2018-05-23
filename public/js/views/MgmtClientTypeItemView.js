var admin = admin || {};

admin.MgmtClientTypeItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){
      
      $(this.el).attr('value',
      this.model.get('clnt_type_id')).html(this.model.get('clnt_type_name'));
      return this;
    }

});
