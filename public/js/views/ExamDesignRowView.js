var admin = admin || {};

admin.ExamDesignRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'examDesignList',
	  template: $( '#examDesignTemplate').html(),
    initialize: function() {
      this.firstRender = true;
      this.activeId = -1;
      this.recIndex = 0;
    	_.bindAll(this, "render");
        this.model.bind('change', this.render);
	},

   events:{
       'click #edit_exam_design'    :'editfile',
       'click #delete_exam_design'     :'deletepop',
      
    },

  render: function() {
    $('.popover-content').hide();
    var tmpl = _.template( this.template );

        
    this.$el.html( tmpl( this.model.toJSON() ) );

    return this;
  },

  editfile:function(e){
        e.preventDefault();
        appRouter.navigate("renderExamDesignEditForm/"+ this.model.get('product_catalog_id'), {trigger:true})
    },

    deletepop:function(){
      var self = this;
         $('#myModalExmDes').modal('show');
         $('#exmid').val(this.model.get('product_catalog_id'));
         
    },

  




});