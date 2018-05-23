var admin = admin || {};

admin.MgmtCurrencyItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){
     
      $(this.el).attr('value',
      this.model.get('currency_id')).html(this.model.get('currency_name'));
      return this;
    }

});
