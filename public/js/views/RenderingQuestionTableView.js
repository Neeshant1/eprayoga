var admin = admin || {};

admin.RenderingQuestionTableView = Backbone.View.extend({

 
  initialize: function(options) {
    var self = this;
    this.pageNo = 1;
    this.recIndex = 1;
    this.current_page =1;
      this.collection = new admin.RenderQuestionCollection();   
      offset=0;
    this.unanswerquestion = [];
    this.reviewquestion = [];
    this.setPage=1;
    this.paginationNO =0;
   //   this.firstRender = false;
    this.$el.html(options.template);
 this.collection.fetch({
          protocol: 'ws',
          operation: 'queryQBank',  
          reset:true,
          data: {order_detail_id: 1,
                 product_catalog_id: 1,
                 exam_schedule_id: 1,
                 category_id: 10,
                 subject_id: 1,
                 topic_id: 1,
                 examFlow: 'start'
          },
          success:function(data){
              
             $('#preloader').fadeOut(1000, function(){ $('#preloader').remove(); } );
              self.render();
             
          },
          error:function(data){
              errorhandle(data);

          }
      });
  },

  events:{
       'click #next_question' : 'renderNextQuestion',
        'click #previous_question' :'renderPreviousQuestion',
        'click #clear_question' : 'renderClearQuestion',
        'click #renderIndexList' : 'renderIndexList',
        'click #review_question' : "reviewQuestion",
        'click #question_confirm' : "confirmQuestion",
        'click #PreviousPage'   : 'renderingPreviousPage',
        'click #NextPage'   : 'renderingNextPage'

},

  render: function() {
     $('#previous_question').attr("disabled", "disabled");
    this.collection.each(function(item) {
       var question = item.get('question_txt_format');
       var option = item.get('question_option_txt');
       var split = option.split(',');
       item.set({'question_option_txt' : split});
        if(item.get('question_type_id')==7){
          var question = item.get('question_txt_format');
          var split = question.split(',');
          item.set({'question_txt_format' : split});
        }
       
     });
   
     
      this.renderIndexQuestionItem();
      return this; 
  },

  renderIndexQuestionItem:function(){
    var self = this;
      index = this.recIndex;
      var mainIndex = this.collection.at(index-1);
      mainIndex = new Backbone.Collection(mainIndex);
      mainIndex.each(function(item){
          item.set({'description' : index});
        // self.renderQuestionItem(item);
        att = item.attributes; 
            
      });

     
      this.renderingPagination();
    //  var tpl = _.template($('#renderAllquestionTemplate').html());
    // $('#renderQuestionList').append(tpl(att));
    self.renderQuestionItem(att);
    return this;
  },

  renderQuestionItem:function(item){
   
    var questionItemView = new admin.RenderQuestionRowView({
      model: item
    });   
    $( '#renderQuestionList' ).append(questionItemView.render().el);

  },

  renderNextQuestion:function(){
   var qid = $('#optiondisplay1 li input').attr('id');
   var len = $('#optiondisplay1 li').find('#'+ qid +':checked').length;
  
   if(len == 0 ||len == 1){
   var unansindex = this.unanswerquestion;
   unansindex = unansindex.indexOf(qid);
   if(unansindex == -1){
   this.unanswerquestion.push(qid);
   $('#renderIndexList li').find('a#'+this.recIndex).css('color','#D3D3D3');

    }
 
  

   
    $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
  }
   
    this.recIndex ++;
    $('#renderQuestionList').empty();
    $('#previous_question').removeAttr("disabled");
    if(this.recIndex == this.collection.length){
     $('#next_question').attr("disabled", "disabled");
     }
     this.renderIndexQuestionItem();
   

  },
  renderPreviousQuestion:function(){
    var qid = $('#optiondisplay1 li input').attr('id');
    var len = $('#optiondisplay1 li').find('#'+ qid +':checked').length;

    if(len == 0){
   var unansindex = this.unanswerquestion;
   unansindex = unansindex.indexOf(qid);
   if(unansindex == -1){
   this.unanswerquestion.push(qid);
    }

  
    $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
  }
     --this.recIndex;
     $('#renderQuestionList').empty();
     $('#next_question').removeAttr("disabled");
      if(this.recIndex == 1){
     $('#previous_question').attr("disabled", "disabled");
     }
     this.renderIndexQuestionItem();
  },

  renderClearQuestion:function(){
   var self = this;
      index = this.recIndex;
      var mainIndex = this.collection.at(index-1);
      mainIndex = new Backbone.Collection(mainIndex);
      mainIndex.each(function(item){
          item.set({'description' : index});
          item.set({'question_answer_txt': ""});
        att = item.attributes;      
      });
        $('#renderQuestionList').empty();
    self.renderQuestionItem(att);
    return this;
 

  },

  renderIndexList:function(e)
  {
    var qid = $('#optiondisplay1 li input').attr('id');
    var len = $('#optiondisplay1 li').find('#'+ qid +':checked').length;

    if(len == 0){
   var unansindex = this.unanswerquestion;
   unansindex = unansindex.indexOf(qid);
   if(unansindex == -1){
   this.unanswerquestion.push(qid);
    }

  
    $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
    $('#renderIndexList li').find('a#'+this.recIndex).css('color','#D3D3D3');

      

  }
    var self = this;
    var inid = $(e.target).attr('id');
     $('#renderQuestionList').empty();
     $('#previous_question').removeAttr("disabled");
     $('#next_question').removeAttr("disabled");
     if(inid == 1)
     {
       $('#previous_question').attr("disabled", "disabled");
     }
     if(inid == this.collection.length)
     {
      $('#next_question').attr("disabled", "disabled");
     }
    this.recIndex = inid;
      var mainIndex = this.collection.at(inid-1);
      mainIndex = new Backbone.Collection(mainIndex);
      mainIndex.each(function(item){
          item.set({'description' : inid});
           att = item.attributes; 
      });
      self.renderQuestionItem(att);      
    return this;
  },
  reviewQuestion:function(){

    var qid = $('#optiondisplay1 li input').attr('id');

   var revindex = this.reviewquestion.indexOf(qid);
   if(revindex == -1){
   this.reviewquestion.push(qid);
    }

    $('#questionView').find('#Reviewed').html(this.reviewquestion.length);
    $('#renderIndexList li').find('a#'+this.recIndex).css('color','orange');
   

  },


  confirmQuestion:function(){
    var qid = $('#optiondisplay1 li input').attr('id');
   var len = $('#optiondisplay1 li').find('#'+ qid +':checked').length;

    if(len != 0){
    $('#renderIndexList li').find('a#'+this.recIndex).css('color','#006400');

    var unansindex = this.unanswerquestion;
    unansindex = unansindex.indexOf(qid);
    if(unansindex != -1){
     this.unanswerquestion.splice(unansindex,1);
     $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);

    }
    this.recIndex++;
    $('#renderQuestionList').empty();

    var renderQusModel = new admin.RenderQuestionModel();

   // att.online_exam_question_id = 1;
    renderQusModel.save({
      "question_id": att.question_id,
      "online_exam_question_id": att.online_exam_question_id,
      "question_answer_txt": att.question_answer_txt
    },
    {
      url: 'dummyurl',
      protocol: 'ws',
      operation: 'confirm',
      wait: true,
      success:function(data){
        console.log("success after save");
      },
      error:function(data){

        errorhandle(data);
      }
    });

    this.renderIndexQuestionItem();
  }
  else{
    alert("please select the question");
  }

  },

  renderingPagination:function(){

    var indexli=$('#renderIndexList');
      indexli.empty();
      pagesize = 12;
      $('#PreviousPage').removeAttr("hidden");
      $('#NextPage').removeAttr("hidden");
      totalitem = parseInt(this.collection.length/pagesize);
      indexli.append('<nav> <ul class="pagination">');
      indexli.find('nav ul').append('<li><a id="PreviousPage" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>');
      if(this.setPage<=totalitem){
        k = 1;
      for(i=1;i<=4;i++)
      {
        for(j=1;j<=3;j++){
        num = this.paginationNO + k;
        indexli.find('nav ul').append('<li> <a id="'+ num+'" style="color,#D3D3D3;"> '+ num+' </a> </li>');
        k++;
      }indexli.find('nav ul').append('<br>');
    }
      indexli.find('nav ul').append('<li><a id="NextPage" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>');
      }
      else{
       rem = this.collection.length - this.paginationNO;
      for(i=0;i<=parseInt(rem/4);i++)
      {
        for( j=0;j<=parseInt(rem/3);j++){
          this.paginationNO++;
        indexli.find('nav ul').append('<li> <a id="'+ this.paginationNO+'" style="color,#D3D3D3;"> '+ this.paginationNO+' </a> </li>');
      }indexli.find('nav ul').append('<br>');
    }
      indexli.find('nav ul').append('<li><a id="NextPage" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>');
      $('#NextPage').addClass("hidden");
      }
      if(this.setPage <= 1){
        $('#PreviousPage').addClass("hidden");
      }
   
      indexli.append('</ul></nav>');

   
  },
  renderingPreviousPage:function(){
   --this.setPage;
   this.paginationNO -= 12;
   this.renderingPagination();
  },
  renderingNextPage:function(){
    this.setPage++;
    this.paginationNO += 12;
    this.renderingPagination();
  }



});