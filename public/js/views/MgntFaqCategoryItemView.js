var admin = admin || {};

admin.MgntFaqCategoryItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
      
      _.bindAll(this, 'render');
    },

    render: function(){
     
      $(this.el).attr('value',
      this.model.get('faq_category_id')).html(this.model.get('faq_category_name'));
      return this;
    }

});
