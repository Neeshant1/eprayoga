var admin = admin || {};

admin.MgmtQuestionTypeItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){
     
      $(this.el).attr('value',
      this.model.get('question_type_code')).html(this.model.get('question_type_name'));
      return this;
    }

});
