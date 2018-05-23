var admin = admin || {};

admin.PricingTableView = Backbone.View.extend({

	el: $( '#pricing_list'),

	initialize: function() {
    
		var self = this;
    	this.collection = new admin.PricingCollection(); 	 
    	offset=0;	
    	this.pageNo = 1;
    	this.collection.fetch({ url:'/eprayoga/admin/get_all_pricing',
    	 	//url:'/getAllSubDoc',
    	 	success:function(data){
    	 	
    	 		self.render();
    	 	},
    	 	error:function(data){
    	 		errorhandle(data);
    	 	}
    	}); 

	},


	setShowPage: function(pageNO)
  	{
       this.pageNo = this.collection.current_page+1;
       var self = this;
      
       this.collection.fetch({ url:'/eprayoga/admin/get_all_pricing?page='+ this.pageNo,
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
			this.renderLanguageItem( item);
		}, this);
	  
	  initializePopover();
	    return this;  
	},

	renderLanguageItem:function(item){

        var isActive =  item.get("is_active");
        
			 if(  item.get("is_active") == 1 )
		      {
		           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
		      }
		      else
		      {
		         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
		      }
		var pricingItemView = new admin.PricingRowView({
			model: item
		});

		pricingItemView.setActiveId(isActive);
	    this.$el.append(pricingItemView.render().el );
	}
});
