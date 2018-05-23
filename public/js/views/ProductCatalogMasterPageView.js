var admin = admin || {};

admin.ProductCatalogMasterPageView = Backbone.View.extend({
    template: $( '#ProductCatalogPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #createproductCatalog' : 'productCatalogCreate',
       'click #productCatalog_load_more'	 : 'loadMore',
       'click #del_all_record'    :'deleteAll',
       'click #productCatalog_deleteall'	 : 'deletepop',
       'keypress #productCatalogSearch' :'Search',
       'click #del_prod_cat' : 'delfile',
      
	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	    this.faqListView = new admin.ProductCatelogTableView({el:$('#productcatalogList')});
		return this;
	},

	productCatalogCreate:function(e){
        e.preventDefault();
		appRouter.navigate("renderProducCatelogCreateForm", {trigger: true});
	},

  loadMore : function(e){
        e.preventDefault();

        this.faqListView.setShowPage();
       
    
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
        //  if(confirm("Do you want delete all record")){

           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_product_catalogall',
                    contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.faqListView.removeAll();
                      $( "div.success").html("All Product catalogs are deleted Successfully.");
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
        var search_currency = $('#productCatalogSearch').val();
        var data = {};
        self=this;
        if(search_currency.length >=1 )
        {
           
            data.product_catalog_name = search_currency;

            this.faqListView.collection.fetch({url:'/eprayoga/admin/search_product_catalog',reset: true, data:data, processData: true,
                success: function (coll) {
                    $( '#productcatalogList' ).empty();
                    $( '#productcatalogList' ).unbind();                       
                    //self.faqListView = coll;
                    self.faqListView.render();
                     
                },
                error: function(err) {
                   errorhandle(err);                     
                }
 
            });
            $("#productCatalog_load_more").show();     
        }
        if(search_currency.length == 0)
        {            
           
            skip = 0;
             this.faqListView.collection.fetch({reset: true, data, processData: true,
                success: function (coll) {
                    $( '#productcatalogList' ).empty();
                    $( '#productcatalogList' ).unbind();                       
                    self.faqListView.render();   
                },       
 
            }); 
            $("#productCatalog_load_more").show();         
        }
    },

delfile:function(e){
        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModal').modal('toggle');
      
              var filetypeId = $('#prodcid').val();

              var requestData = JSON.stringify({"id":filetypeId});

     

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_product_catalog',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      
                       appRouter.currentView.render();
                      $( "div.success").html("product catalog has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);

                    }
             });

      
    },





});
