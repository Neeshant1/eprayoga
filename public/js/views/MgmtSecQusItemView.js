var admin = admin || {};

admin.MgmtSecQusItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){
     
      $(this.el).attr('value',
      this.model.get('question_id')).html(this.model.get('question_name'));
      return this;
    }

});
