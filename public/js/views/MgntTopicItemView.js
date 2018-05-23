var admin = admin || {};

admin.MgntTopicItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){
     
      $(this.el).attr('value',
      this.model.get('topic_id')).html(this.model.get('topic_name'));
      return this;
    }

});
