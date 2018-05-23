var admin = admin || {};

admin.MgntCountryItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){
      $(this.el).attr('value',
      this.model.get('country_id')).html(this.model.get('country_full_name'));
      return this;
    }

});
