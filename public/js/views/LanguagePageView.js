var admin = admin || {};

admin.LanguagePageView = Backbone.View.extend({
    template: $( '#languagePageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create_language' : 'languageCreate',
       'click #language_load_more'	 : 'loadMore',
       'click #language_deleteall'	 : 'deletepop',
       'click #del_all_record'    :'deleteAll',
       'keypress #language_search' :'Search',
       'click #del_language'   : 'delLanguage',
      
	},

	render: function() {					
	   this.$el.html(this.template);
      this.$el.append(this.template1);
	   this.languageListView = new admin.LanguageTableView({el: $( '#language_list' )});
		return this;
	},

	languageCreate:function(e){
    e.preventDefault();
		appRouter.navigate("renderLanguageCreateForm", {trigger: true});
	},

  loadMore : function(e){
        e.preventDefault();
        this.languageListView.setShowPage();
		
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
        //if(confirm("Do you want delete all record")){

           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_languageall',
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.languageListView.removeAll();
                      $( "div.success").html("All Languages are deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
             });
		//}
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
      var search = $('#language_search').val();
      var data = {};
      self=this;
      if(search.length >=1 )
      {
          
          data.search_text = search;

          this.languageListView.collection.fetch({url:'/eprayoga/admin/search_language',reset: true, data:data, processData: true,
              success: function (coll) {
                  $( '#language_list' ).empty();
                  $( '#language_list' ).unbind();                       
                  self.languageListView.render();
              },
              error: function(err) {
                 errorhandle(data);               
              }

          });
          $("#language_load_more").show();     
      }
      if(search.length == 0)
      {            
         
          skip = 0;
           this.languageListView.collection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $( '#language_list' ).empty();
                  $( '#language_list' ).unbind();                       
                  self.languageListView.render();   
              },       

          }); 
          $("#language_load_more").show();         
      }
  },

    delLanguage:function(e){
        e.preventDefault();
       // $('#myModal').modal('show');
        var self = this;
         $('body').removeClass('modal-open');
        $('.modal-backdrop').remove(); 
        $('#myModal').modal('toggle');
       

              var languageId = $('#langid').val();

              var requestData = JSON.stringify({"language_id":languageId});

              //if(confirm("Do you want to delete")){


         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_language',
                    data: requestData,
                    contentType:'application/json',
                    cache:false,
                    success: function(data) {
                       //self.remove();
                      
                        appRouter.currentView.render();
                      $( "div.success").html("Language has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);
                    }
             });
       //}

    },


});
