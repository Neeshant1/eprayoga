var admin = admin || {};

admin.ExamDesignTableView = Backbone.View.extend({

	el: $( '#examDesignList'),

	initialize: function() {

    var self = this;
    this.pageNo = 1;
    //this.recIndex = 1;
      this.collection = new admin.ExamDesignCollection();
      this.collection.fetch({ url:'/eprayoga/admin/get_all_exam_design',
       
        success:function(data){  
          self.render();
        },
        error:function(data){
          errorhandle(data);
        }
        });
    
     }, 
setShowPage: function(pageNO)
    {
       this.pageNo = this.collection.current_page+1;
       var self = this;

       this.collection.fetch({ url:'/eprayoga/admin/get_all_exam_design?page='+ this.pageNo,
        //url:'/getAllSubDoc',
        success:function(data){
          self.render();


        },
        error:function(data){
          errorhandle(data);
        }
      }); 
  }, 

removeAll: function()
  {
      this.collection.reset();
      this.$el.empty();

  },


render: function() {

    this.collection.each(function(item) {
    this.renderExamDesignItem(item);
    //this.recIndex++;
  }, this);
   
    initializePopover();
      return this;  
  },


  renderExamDesignItem:function(item){
    
    var ExamDesignItemView = new admin.ExamDesignRowView({
      model: item
    });

   this.$el.append(ExamDesignItemView.render().el );
  }
});