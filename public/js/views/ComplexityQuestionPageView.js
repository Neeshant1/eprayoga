var admin = admin || {};

admin.ComplexityQuestionPageView = Backbone.View.extend({
    template: $( '#questionComplexityPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #qus_complexity_create' : 'complexityQuestionCreate',
       'click #question_complexity_load_more'	 : 'loadMore',
       'click #del_all_record'    :'deleteAll',
       'click #question_complexity_deleteall'	 : 'deletepop',
       'keypress #question_complexity_search' :'Search',
       'click #del_com_qus'    : 'delComQus',
	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	    this.complexityQuestionListView = new admin.ComplexityQuestionTableView({el: $( '#question_complexity_list' )});
		return this;
	},

	complexityQuestionCreate:function(e){
    e.preventDefault();
		appRouter.navigate("renderComplexityQuestionCreateForm", {trigger: true});
	},

	loadMore : function(e){
        e.preventDefault();
        this.complexityQuestionListView.setShowPage();
		
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
                    url: '/eprayoga/admin/delete_question_complexityall',
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.complexityQuestionListView.removeAll();
                      $( "div.success").html("All Complexity Questions are deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
        
             });
		
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
        var search = $('#question_complexity_search').val();
        var data = {};
        self=this;
        if(search.length >=1 )
        {
            
            data.difficulty_level_name = search;
            this.complexityQuestionListView.collection.fetch({url:'/eprayoga/admin/search_questioncomplexity',reset: true, data:data, processData: true,
                success: function (coll) {
                    $( '#question_complexity_list' ).empty();
                    $( '#question_complexity_list' ).unbind();                       
                    self.complexityQuestionListView.render();
                },
                error: function(err) {
                   errorhandle(err);                   
                }
 
            });
            $("#question_complexity_load_more").show();     
        }
        if(search.length == 0)
        {            
           
            skip = 0;
             this.complexityQuestionListView.collection.fetch({reset: true, data, processData: true,
                success: function (coll) {
                    $( '#question_complexity_list' ).empty();
                    $( '#question_complexity_list' ).unbind();                       
                    self.complexityQuestionListView.render();   
                },       
 
            }); 
            $("#question_complexity_load_more").show();         
        }
    },

    delComQus:function(e){
        e.preventDefault();

        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModal').modal('toggle');  


        var comQusId = $('#comquesid').val();

        var requestData = JSON.stringify({"difficulty_level_id":comQusId});


         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_question_complexity',
                    data: requestData,
                    contentType:'application/json',
                    cache:false,
                    success: function(data) {                      
                       appRouter.currentView.render();
                      $( "div.success").html("Complexity Question has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);
                    }
             });

    },




});
