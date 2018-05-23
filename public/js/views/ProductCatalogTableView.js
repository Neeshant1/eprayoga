var admin = admin || {};

admin.ProductCatelogTableView = Backbone.View.extend({

  el: $( '#productcatalogList'),

  initialize: function() {

     
    var self = this;
    this.pageNo = 1;
    this.recIndex = 1;
      this.collection = new admin.ProductCatalogCollection();
      this.collection.fetch({ url:'/eprayoga/admin/get_all_product_catalog',

        success:function(data){
         
          self.render();


        },
        error:function(data){
         errorhandle(data);


        }
      }); 

      //this.listenTo( this.collection, 'add', this.renderFaqItem );
    //this.listenTo( this.collection, 'reset', this.render );
    //this.listenTo( this.collection, 'sort', this.render );
    //_.bindAll(this, "renderFaqItem");
    //_.bindAll(this, "render"); 
  },
      

         //$.when(_self.collection.fetch().done(function() {

  
  setShowPage: function(pageNO)
  {
       this.pageNo = this.collection.current_page+1;
       var self = this;
      

       this.collection.fetch({ url:'/eprayoga/admin/get_all_product_catalog?page='+ this.pageNo,
        //url:'/getAllSubDoc',
        success:function(data){
    
          self.render();


        },
        error:function(data){
          errorhandle(data);
        }
      }); 
  },



  removeAll: function()
  {
      this.collection.reset();
      this.$el.empty();

  },


  render: function() {

       this.collection.each(function(item) {
    this.renderProductCatalogItem(item);
    //this.recIndex++;
  }, this);
   
    initializePopover();
      return this;  
  },

  renderProductCatalogItem:function(item, recIndex){
    var isActive =  item.get("is_active");
   
   if(  item.get("is_active") == 1 )
      {
           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
      }
      else
      {
         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
      }
      
    var productCatalogItemView = new admin.ProductCatalogRowView({
      model: item
    });

      productCatalogItemView.setActiveId(isActive, recIndex);

   this.$el.append(productCatalogItemView.render().el );
  }
});
