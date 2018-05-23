var admin = admin || {};

admin.MgntZoneItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
      
      _.bindAll(this, 'render');
    },

    render: function(){
     
      $(this.el).attr('value',
      this.model.get('zone_area_id')).html(this.model.get('zone_name'));
      return this;
    }

});
