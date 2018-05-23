var admin = admin || {};

admin.CustomerPageView = Backbone.View.extend({
    template: $( '#customerPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render(); 
    admin.mode =0;
	},

	events:{
       'click #customer_register' : 'customerCreate',
       'click #customer_delall'	  :'deletepop',
       'click #del_all_record'    :'deleteAll',
       'keypress #customerSearch' :'Search',
       'click #customerLoadMore'    : 'loadMore',
       'click #del_customer_id'    : 'delCustomer'
      
	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	    this.customerListView = new admin.CustomerTableView({el: $( '#customer_list')});
		return this;
	},

	customerCreate:function(e){

        e.preventDefault();
         
		appRouter.navigate("renderCustomerRegisterForm", {trigger: true});
	},
  deletepop:function(e){
    e.preventDefault();
      $('#myModaldeleteall').modal('show');
         
    },


	deleteAll:function(e)
  {
		   e.preventDefault();
		   var self = this;
       $('body').removeClass('modal-open');                
       $('.modal-backdrop').remove();                      
       $('#myModaldeleteall').modal('toggle');
               $.ajax({
                       type: 'POST',
                       url: '/eprayoga/admin/delete_customer_all',
                      //  data: requestData,
                       contentType:'application/json',
                       cache:false,
                       success: function(data) {
                    
                         self.customerListView.removeAll();
                          $( "div.success").html("All Customers are Deleted Successfully.");
                          $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
             });
	},

    loadMore : function(e){
        e.preventDefault();
        this.customerListView.setShowPage(this.pageNo);
    
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
    var search = $('#customerSearch').val();
    var data = {};
    self=this;
    if(search.length >=1 )
    {
       
        data.search_text = search;

        this.customerListView.collection.fetch({url:'/eprayoga/admin/search_customer',reset: true, data:data, processData: true,
            success: function (coll) {
                $( '#customer_list' ).empty();
                $( '#customer_list' ).unbind();                       
                self.customerListView.render();
            },
            error: function(err) {
                errorhandle(err);                     
            }

        });
        $("#customerLoadMore").show();     
      }
      if(search.length == 0)
      {            
         
          skip = 0;
           this.customerListView.collection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $( '#customer_list' ).empty();
                  $( '#customer_list' ).unbind();                       
                  self.customerListView.render();   
              },       

          }); 
          $("#customerLoadMore").show();         
      }
    },
delCustomer:function(e){

        e.preventDefault();

        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModalCust').modal('toggle');  

        var custId = $('#customerid').val();
        var requestData = JSON.stringify({"customer_id":custId});
        
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_customer',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                      
                        appRouter.currentView.render();
                      $( "div.success").html("Customer Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);
                    }
             });

  },



});
