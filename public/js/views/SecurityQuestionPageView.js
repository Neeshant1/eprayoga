var admin = admin || {};

admin.SecurityQuestionPageView = Backbone.View.extend({
    template: $( '#securityQuestionPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create-sq' : 'sqCreate',
      // 'click #edit-faq'    :'editFaq',
        'click #sq_load_more'	 : 'loadMore',
       'click #sq_deleteall'	 : 'deletepop',
       'click #del_all_record'    :'deleteAll',
       'click #del_securety_qus'   : 'deleteSecurityqus',
       'keypress #securityQuestionSearch' :'Search'
       
	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	     this.sqListView = new admin.SecurityQuestionTableView({el: $( '#security_question_list' )});
		return this;
	},

	sqCreate:function(e){
        e.preventDefault();
		appRouter.navigate("renderSecurityQuestionCreateForm", {trigger: true});
	},

	loadMore : function(e){
        e.preventDefault();
        this.sqListView.setShowPage();
		
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
                    url: '/eprayoga/admin/delete_security_questionsall',
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.sqListView.removeAll();
                      $( "div.success").html("All Security Question are deleted Successfully.");
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
    var search = $('#securityQuestionSearch').val();
    var data = {};
    self=this;
    if(search.length >=1 )
    {
        data.question_name = search;

        this.sqListView.collection.fetch({url:'/eprayoga/admin/search_security_questions',reset: true, data:data, processData: true,
            success: function (coll) {
                $( '#security_question_list' ).empty();
                $( '#security_question_list' ).unbind();                       
                self.sqListView.render();
            },
            error: function(err) {
                errorhandle(err);
                    
            }

        });
        $("#sq_load_more").show();     
      }
      if(search.length == 0)
      {            
          skip = 0;
           this.sqListView.collection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $( '#security_question_list' ).empty();
                  $( '#security_question_list' ).unbind();                       
                  self.sqListView.render();   
              },       

          }); 
          $("#sq_load_more").show();         
      }
    },

 deleteSecurityqus:function(e){
        e.preventDefault();

        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModalsecurity').modal('toggle');   

              var sqId = $('#secreid').val();

              var requestData = JSON.stringify({"question_id":sqId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_security_questions',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      // self.remove();
                       appRouter.currentView.render();
                      $( "div.success").html("Security Question has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);

                    }
             });
    },

});
