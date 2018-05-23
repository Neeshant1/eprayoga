var admin = admin || {};

admin.QuestionTypePageView = Backbone.View.extend({
    template: $( '#questionTypePageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create-questionType' : 'questionTypeCreate',
       'click #questiontype_load_more'	 : 'loadMore',
       'click #questiontype_deleteall'	 : 'deletepop',
        'click #del_all_record'    :'deleteAll',
       'keypress #question_type_search'  : 'Search'

	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	   this.questionTypeListView = new admin.QuestionTypeTableView({el: $( '#question_type_list' )});
		return this;
	},

	questionTypeCreate:function(e){
        e.preventDefault();
		    appRouter.navigate("renderQuestionTypeCreateForm", {trigger: true});
	},

  loadMore : function(e){
        e.preventDefault();
        this.questionTypeListView.setShowPage(this.pageNo);
    
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
       //   if(confirm("Do you want delete all record")){

           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_question_typeall',
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.questionTypeListView.removeAll();
                      $( "div.success").html("All Question types are deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);

                    }
               });
	//	}
	},
  Search:function (event) {
        
         //$('#findStatus').html(alert("No Records Found"));
         if(event.which == 13) {
          this.SearchText();
        return false;
        }

       },

       SearchText : function()
       {
        $('#findStatus').html("");
         //$('#findStatus').html(alert("No Records Found"));
        var search_currency = $('#question_type_search').val();
        var data = {};
        self=this;
        if(search_currency.length >=1 )
        {
            data.question_type_name = search_currency;


            this.questionTypeListView.collection.fetch({url:'/eprayoga/admin/search_questiontype',reset: true, data:data, processData: true,
                success: function (coll) {
                    $( '#question_type_list' ).empty();
                    $( '#question_type_list' ).unbind();                       
                    self.questionTypeListView.render();
                     
                },
                error: function(err) {
                   errorhandle(err);
                     
                }
 
            });
            $("#questiontype_load_more").show();     
        }
        if(search_currency.length == 0)
        {            
            skip = 0;
             this.questionTypeListView.collection.fetch({reset: true, data, processData: true,
                success: function (coll) {
                    $( '#question_type_list' ).empty();
                    $( '#question_type_list' ).unbind();                       
                    self.questionTypeListView.render();   
                },       
 
            }); 
            $("#questiontype_load_more").show();         
        }
    },



});
