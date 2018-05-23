var admin = admin || {};

admin.QuestionPageView = Backbone.View.extend({
    template: $( '#questionBankTpl' ).html(),
     template1:$( '#deleteallscript' ).html(),
    initialize: function() {
       var self = this;
        this.paginationNO =1;
        this.setPage=0;
        this.k = 1;
        this.collection = new admin.TotalQuestionCollection();
         this.collection1 = new admin.QuestionCollection();
         data = {};
         var search1 = $('#search-question').val();
         if((search1 == "") || (search1 == undefined) || (search1 == null)){
          
          data.search_text = null;
          
        }else{
          
           data.search_text = search1;
       
        }
      
      $.ajax(
        {
          url: "/eprayoga/admin/get_all_question",
          type: "GET",
          data:data,
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
                
          self.quesdata = data[0].totalques;
         
          self.render(); 

            
          },
          error: function(data) {
            errorhandle(data);


          }
        });
       
      
    },

    events:{
       'click #create-question' : 'createQuestion',
        'click #question_deleteall'    :'deletepop',
        'click #del_all_record'    :'deleteAll',
       'click #edit-question'    : 'editQuestion',
        'keypress #search-question' :'Search',
        'change #uploadFile' : 'uploadFile',
        'click #delete-confirm' :'deleteQuestion',
        'change #listQuestion' : 'listQuestions',
        'click  .previousPage'  : 'PreviousPage',
        'click  .nextPage'  : 'NextPage',
        'click .pageNum' : 'pageNum',
        'click #cancelPopover' : 'cancelPopover'
       

    },

    cancelPopover : function(){
     
      $('#myModalChemistry').hide();
    },

    render: function() {  
   // var self = this; 
                  
        this.$el.html(this.template);
        this.$el.append(this.template1);
        
        this.questionListView = new admin.QuestionTableView({el: $( '#questionList' )});
        this.listQuestions();
        // this.collection = new admin.QuestionCollection();
              $('[data-toggle=\'popover\']').popover({
         placement : 'top',
         html : true });
        $('#myModalChemistry').hide();
        this.pageratio();
        return this;
    },

    createQuestion:function(e){
        e.preventDefault();
        appRouter.navigate("renderCreateQuestionForm", {trigger: true});
    },

    editQuestion:function(e){
        e.preventDefault();
        appRouter.navigate("renderEditQuestionForm", {trigger: true});
    },
    deletepop:function(e){
    e.preventDefault();
      $('#myModaldeleteall').modal('show');
         
    },

    deleteAll:function(e){
        e.preventDefault();
        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModaldeleteall').modal('toggle');
        

           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_questionall',
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.questionListView.removeAll();
                      $( "div.success").html("All Question are deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );  
                      self.render(); 
                      $('#paginationListques').empty();
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
             });
       
    },
listQuestions : function(quesdata){  
    var self = this;
       $('#paginationListques').empty();
       $('#paginationListques').unbind();
    var indexli=$('#paginationListques');

    noques = $('#listQuestion').val();
    pagesize = Math.ceil(this.quesdata/noques);
    this.pageratio();
    

    indexli.append('<nav style="text-align: center;"> <ul class="pagination">');
    indexli.find('nav ul').append('<li><a class = "previousPage" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>');
    for(var i=1;i<=pagesize;i++){
    
    indexli.find('nav ul').append('<li> <a id="'+i+'"  class="pageNum" > '+i+' </a> </li>');
    }
    indexli.find('nav ul').append('<li><a id = "npage" class = "nextPage" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>');
    this.pageNo = 1;
    if(this.pageNo== 1){
         $('.previousPage').attr("hidden","");

    } if ((pagesize == 1) || (pagesize == 0)){

         $('.previousPage').attr("hidden","");
         $('.nextPage').attr("hidden","");
    } 
    $('#paginationListques a').css({"color": "#000000"});
    $('#paginationListques').find('#'+this.pageNo ).css({"color": "#FF0000"}); 
    this.questionListView.setShowPage(this.pageNo);
  },
PreviousPage:function(){
   
    --this.pageNo;
    $('#paginationListques a').css({"color": "#000000"});
    $('#paginationListques').find('#'+this.pageNo ).css({"color": "#FF0000"});
     if(this.pageNo <= pagesize){
         $('.nextPage').removeAttr("hidden");
      } if(this.pageNo== 1){
         $('.previousPage').attr("hidden","");
      }   
    
    this.questionListView.setShowPage(this.pageNo);
    this.pageratio();
  },
NextPage:function(){
    
    
++this.pageNo;  

    $('#paginationListques a').css({"color": "#000000"});
    $('#paginationListques').find('#'+this.pageNo ).css({"color": "#FF0000"});

    $('.previousPage').removeAttr("hidden");
    if(this.pageNo <= pagesize){
      
      
      if(this.pageNo == pagesize){

          
         $('.nextPage').attr("hidden","");
    }
     this.questionListView.setShowPage(this.pageNo);   
    this.pageratio();
     
    }
    

  },
pageNum:function(e){
   
    this.pageNo = $(e.target).attr('id');
    $('#paginationListques a').css({"color": "#000000"});
    $('#paginationListques').find('#'+this.pageNo ).css({"color": "#FF0000"});
    
    $('.previousPage').removeAttr("hidden");
    if(this.pageNo == pagesize){
         $('.nextPage').attr("hidden","");
    } 
    if(this.pageNo < pagesize){
         $('.nextPage').removeAttr("hidden");
      }     
      if(this.pageNo== 1){
         $('.previousPage').attr("hidden","");
      }   
    this.questionListView.setShowPage(this.pageNo); 
    this.pageratio();

  },

pageratio:function(){
     var pageSiz = $('#listQuestion').val();
      var pageInfo = "Showing &nbsp&nbsp"+((this.pageNo - 1)*pageSiz + 1) +"&nbsp-&nbsp"+((this.pageNo * pageSiz)>this.quesdata ? this.quesdata:(this.pageNo * pageSiz))+"&nbspof&nbsp"+this.quesdata;
      $('#searchResQues').html('<h6>'+pageInfo+'</h6>');
    console.log(pageInfo);
  },


Search:function (event) {
        
         //$('#findStatus').html(alert("No Records Found"));
         if(event.which == 13) {
           
            this.searchQuestion();
        return false;
        }

   },

  searchQuestion : function()
  {
    var self=this;
        $('#findStatus').html("");
         data = {};
         var search1 = $('#search-question').val();
           data.search_text = search1;
           this.pageNo = 1;
 if(search1.length >= 1){
          $.ajax(
        {
          url: "/eprayoga/admin/get_all_question",
          type: "GET",
          data:data,
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {    
          self.quesdata = data;
           self.listQuestions(self.quesdata); 
           self.pageratio();
            
          },
          error: function(data) {
          errorhandle(data);

          }
        });
          this.questionListView.setShowPage(this.pageNo);
      }
   if(search1.length == 0){
    
    this.initialize();
    this.questionListView.setShowPage(this.pageNo);

   }   
       
},


uploadFile: function (e) {
      e.preventDefault();
      var fileName = e.target.files[0].name; 
      var fileNameArray = fileName.split('.');
      var type = fileNameArray[fileNameArray.length-1];        
     
      var formData = new FormData();
      formData.append('fileType', type);
      formData.append('fileName', e.target.files[0].name);
      formData.append('uploadFile', e.target.files[0]);
      formData.append('file_category_type', '4');
     
          $( "div.success").html("<center>File Upload is in progress...</center>");
          $( "div.success" ).fadeIn(300).delay(3500).fadeOut(400);
          $.ajax({
              type: "POST",
              url: "/eprayoga/admin/upload",
              data: formData,
              cache: false,
              contentType: false,
              processData: false,      
              success: function(data1) {
                
                $('#file_error').empty();
            }
          });        
  },

 deleteQuestion:function(e){
   $('body').removeClass('modal-open');
  $('.modal-backdrop').remove(); 
  $('#myModal').modal('toggle');
        var self = this;
        var questionId = $('#quesid').val();
        var categoryId = $('#catid').val();
        var subjectId = $('#subid').val();
        var topicId = $('#topid').val();
        var clientId = $('#clnid').val();
        var requestData = JSON.stringify({"question_id":questionId,"category_id":categoryId,"subject_id":subjectId,"topic_id":topicId,"clnt_id":clientId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_question',
                    data: requestData,
                    contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      $( "div.success").html("Question has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                      self.render();
                      
                    },
                    error: function(data) {
                         appRouter.navigate("questionList",{trigger: true});
                        // $( "div.failure" ).fadeIn( 300 ).delay( 4000 ).fadeOut( 400 ); 
                    }
             });

    },
});
