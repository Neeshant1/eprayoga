var admin = admin || {};

admin.CurrencyTableView = Backbone.View.extend({

	el: $( '#currency-list'),

	initialize: function() {
    	
		var self = this;
		    this.pageNo = 1;
		   limit =2;
        this.recIndex = 1;
    	this.collection = new admin.CurrencyCollection(); 	 
    	this.collection.fetch({ url:'/eprayoga/admin/get_all_currency',
    	 
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
     

       this.collection.fetch({ url:'/eprayoga/admin/get_all_currency?page='+ this.pageNo,
        //url:'/getAllSubDoc',
        success:function(data){
    
          self.render();


        },
        error:function(data){
         errorhandle(data);
        }
      }); 
  },


	render: function() {

    this.collection.each(function(item) {
          this.renderCurrencyItem( item,this.recIndex ); this.recIndex++;
    }, this);


	     // if (this.collection.length < limit)
      //   {
 
      //       $('#findStatus').html("End Of Records");
      //       $('#currency_load_more').hide();
      //   }
      //   else
      //   {
      //       $('#findStatus').html("");
      //       $('#currency_load_more').show();            
      //   }
      initializePopover();              
	  
	    return this;  
	},

	  removeAll: function()
  {
      this.collection.reset();
      this.$el.empty();

  },

	renderCurrencyItem:function(item,recIndex){
		var isActive =  item.get("is_active");

	 if(  item.get("is_active") == 1 )
      {
           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
      }
      else
      {
         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
      }

      
		var currencyItemView = new admin.CurrencyRowView({
			model: item
		});
		  currencyItemView.setActiveId(isActive,recIndex);
	    this.$el.append(currencyItemView.render().el );
	}
});
