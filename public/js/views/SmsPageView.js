var admin = admin || {};

admin.SmsPageView = Backbone.View.extend({
    template: $( '#smsPageTpl' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create-sms' : 'smsCreate',
       'click #sms_deleteall'    :'deleteAll',
       'click #sms_load_more'	 : 'loadMore',
       'keypress #smsSearch' :'Search'
       
	},

	render: function() {					
	    this.$el.html(this.template);
	     this.smsListView = new admin.SmsTableView({el: $( '#smsList' )});
		return this;
	},

	smsCreate:function(e){
        e.preventDefault();
		appRouter.navigate("renderSmsCreateForm", {trigger: true});
	},

	deleteAll:function(e)
	{
        e.preventDefault();
        var self = this;
           if(confirm("Do you want to delete all records")){
           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_allsms',
                  //  data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.smsListView.removeAll();
                      $( "div.success").html("All SMS are Deleted Successfully.");
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
        this.smsListView.setShowPage(this.pageNo);
		
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
    var search = $('#smsSearch').val();
    var data = {};
    self=this;
    if(search.length >=1 )
    {
        data.search_text = search;

        this.smsListView.collection.fetch({url:'/eprayoga/admin/search_sms',reset: true, data:data, processData: true,
            success: function (coll) {
                $( '#smsList' ).empty();
                $( '#smsList' ).unbind();                       
                self.smsListView.render();
            },
            error: function(err) {
                errorhandle(err);
                     
            }

        });
        $("#sms_load_more").show();     
      }
      if(search.length == 0)
      {            
          skip = 0;
           this.smsListView.collection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $( '#smsList' ).empty();
                  $( '#smsList' ).unbind();                       
                  self.smsListView.render();   
              },       

          }); 
          $("#sms_load_more").show();         
      }
    },

});
