var admin = admin || {};

admin.MgntCategoryItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){
      
      $(this.el).attr('value',
      this.model.get('category_id')).html(this.model.get('category_name'));
      return this;
    }

});
