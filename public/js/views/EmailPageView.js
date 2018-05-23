var admin = admin || {};

admin.EmailPageView = Backbone.View.extend({
    template: $( '#emailPageTpl' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create-email' : 'emailCreate',
        'click #email_deleteall'    :'deleteAll',
       'click #email_load_more'	 : 'loadMore',
        'keypress #emailSearch' :'Search'

	},

	render: function() {					
	    this.$el.html(this.template);
	     this.emailListView = new admin.EmailTableView({el: $( '#emailList' )});
		return this;
	},

	emailCreate:function(e){
        e.preventDefault();
		appRouter.navigate("renderEmailCreateForm", {trigger: true});
	},

	deleteAll:function(e)
	{
        e.preventDefault();
        var self = this;
           if(confirm("Do you want to delete all record")){
           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_allemail',
                  //  data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.emailListView.removeAll();
                      $( "div.success").html("All Email's are Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
             });
         }
		
	},

	loadMore : function(e){
        e.preventDefault();
        this.emailListView.setShowPage(this.pageNo);
		
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
    var search = $('#emailSearch').val();
    var data = {};
    self=this;
    if(search.length >=1 )
    {
        
        data.search_text = search;
        this.emailListView.collection.fetch({url:'/eprayoga/admin/search_email',reset: true, data:data, processData: true,
            success: function (coll) {
                $( '#emailList' ).empty();
                $( '#emailList' ).unbind();                       
                self.emailListView.render();
            },
            error: function(err) {
                errorhandle(data);                  
            }

        });
        $("#email_load_more").show();     
      }
      if(search.length == 0)
      {            
        
          skip = 0;
           this.emailListView.collection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $( '#emailList' ).empty();
                  $( '#emailList' ).unbind();                       
                  self.emailListView.render();   
              },       

          }); 
          $("#email_load_more").show();         
      }
    },


});
