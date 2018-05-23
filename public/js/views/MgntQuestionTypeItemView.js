var admin = admin || {};

admin.MgntQuestionTypeItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){
      
      $(this.el).attr('value',this.model.get('question_type_id')).html(this.model.get('question_type_name'));
      return this;
    }

});
