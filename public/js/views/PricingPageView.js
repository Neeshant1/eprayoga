var admin = admin || {};

admin.PricingPageView = Backbone.View.extend({
    template: $( '#pricingPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create_pricing' : 'pricingCreate',
       'click #pricing_load_more'	 : 'loadMore',
       'click #pricing_deleteall'	 : 'deletepop',
       'click #del_all_record'    :'deleteAll',  
       'keypress #pricing_search' :'Search',
       'click #del_pric' : 'delPricing',
      
	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	     this.pricingListView = new admin.PricingTableView({el: $( '#pricing_list' )});
		return this;
	},

	pricingCreate:function(e){
    e.preventDefault();
		appRouter.navigate("renderPricingCreateForm", {trigger: true});
	},

  loadMore : function(e){
        e.preventDefault();
        this.pricingListView.setShowPage();
		
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
                    url: '/eprayoga/admin/delete_pricingall',
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.pricingListView.removeAll();
                      $( "div.success").html("All pricing are deleted Successfully.");
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
      var search = $('#pricing_search').val();
      var data = {};
      self=this;
      if(search.length >=1 )
      {
         
          data.search_text = search;

          this.pricingListView.collection.fetch({url:'/eprayoga/admin/search_pricing',reset: true, data:data, processData: true,
              success: function (coll) {
                  $( '#pricing_list' ).empty();
                  $( '#pricing_list' ).unbind();                       
                  self.pricingListView.render();
              },
              error: function(err) {
                  errorhandle(err);                    
              }

          });
          $("#pricing_load_more").show();     
      }
      if(search.length == 0)
      {            
        
          skip = 0;
           this.pricingListView.collection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $( '#pricing_list' ).empty();
                  $( '#pricing_list' ).unbind();                       
                  self.pricingListView.render();   
              },       

          }); 
          $("#pricing_load_more").show();         
      }
  },


    delPricing:function(e){
        e.preventDefault();

        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModal').modal('toggle');  


              var languageId = $('#priceid').val();

              var requestData = JSON.stringify({"pricing_id":languageId});

              


         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_pricing',
                    data: requestData,
                    contentType:'application/json',
                    cache:false,
                    success: function(data) {
                        appRouter.currentView.render();
                      $( "div.success").html("Pricing has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);
                    }
             });
     

    },

});
