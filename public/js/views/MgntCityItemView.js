var admin = admin || {};

admin.MgntCityItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
    
      _.bindAll(this, 'render');
    },

    render: function(){
     
      $(this.el).attr('value',
      this.model.get('city_id')).html(this.model.get('city_full_name'));
      return this;
    }

});
