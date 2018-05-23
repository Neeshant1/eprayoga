var admin = admin || {};

admin.QuestionTableView = Backbone.View.extend({

  el: $( '#questionList'),

  initialize: function() {
    var self = this;
    this.pageNo = 1;
   
      this.collection = new admin.QuestionCollection();    
      offset=0; 
      this.firstRender = false;
  },


setShowPage: function(pageNO)
  {

    var self = this;
         var questionset ={};
         var search1 = $('#search-question').val();
         if((search1 == "") || (search1 == undefined) || (search1 == null)){
          questionset.search_text = null;
          
        }else{
          
           questionset.search_text = search1;
       
        }
      
      questionset.noques=noques;
      questionset.pageNO=pageNO;

    $.ajax(
        {
          url: "/eprayoga/admin/get_all_question_page",
          type: "GET",
          data:questionset,
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
              if(data.length > 0){
                  $('#questionList').empty();
                  self.collection = new admin.QuestionCollection(data);
                  self.render();
              } else{
                  $('#questionList').empty();
                  $('#example-1').append('<h2 style="position:absolute">No Data Available</h2>');
                  
              }

            
          },
          error: function(data) {
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
      this.renderQuestionItem( item );
    }, this);
      
      $('[data-toggle=\'popover\']').popover({
         placement : 'top',
         html : true });
      initializePopover();
      return this;  
  },

  renderQuestionItem:function(item){
  
   var isActive =  item.get("is_active");
   if(  item.get("is_active") == 1 )
      {
           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
      }
      else
      {
         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
      }
      
    var questionItemView = new admin.QuestionRowView({
      model: item
    });

      questionItemView.setActiveId(isActive);

    this.$el.append(questionItemView.render().el );

  }
});
