var admin = admin || {};

admin.MgntCustItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){     
      $(this.el).attr('value',
      this.model.get('customer_id')).html(this.model.get('cust_first_name'));
      return this;
    }

});
