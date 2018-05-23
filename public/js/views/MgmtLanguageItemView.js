var admin = admin || {};

admin.MgmtLanguageItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){
     
      $(this.el).attr('value',
      this.model.get('language_id')).html(this.model.get('language'));
      return this;
    }

});
