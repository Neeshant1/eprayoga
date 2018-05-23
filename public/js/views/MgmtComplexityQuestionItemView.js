var admin = admin || {};

admin.MgmtComplexityQuestionItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){
     
      $(this.el).attr('value',
      this.model.get('difficulty_level_id')).html(this.model.get('difficulty_level_name'));
      return this;
    }

});
