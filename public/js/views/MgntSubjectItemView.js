var admin = admin || {};

admin.MgntSubjectItemView = Backbone.View.extend({

    tagName: 'option',

    initialize: function(){
     
      _.bindAll(this, 'render');
    },

    render: function(){
     
      $(this.el).attr('value',
      this.model.get('subject_id')).html(this.model.get('subject_name'));
      return this;
    }

});
