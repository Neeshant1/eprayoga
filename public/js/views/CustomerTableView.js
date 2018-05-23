var admin = admin || {};

admin.CustomerTableView = Backbone.View.extend({

	el: $( '#customer_list'),

	initialize: function() {
    	
      var self = this;
      this.pageNo = 1;
    	this.recIndex = 1;	
		
    	this.collection = new admin.CustomerCollection(); 	 
    	
    	this.collection.fetch({ url:'/eprayoga/admin/get_all_customer',
    	 	//url:'/getAllSubDoc',
    	 	success:function(data){
    	 		self.render();
  	 	},
    	 	error:function(data){
    	 		errorhandle(data);
    	 	}
    	}); 
	},

    setShowPage: function(pageNO){
       this.pageNo = this.collection.current_page+1;
       var self = this;
      

       this.collection.fetch({ url:'/eprayoga/admin/get_all_customer?page='+ this.pageNo,
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
			this.renderCustomerItem( item, this.recIndex  );
      this.recIndex++;
		}, this);
	  
	    return this;  
	},
      removeAll: function(){
      this.collection.reset();
      this.$el.empty();

    },


	renderCustomerItem:function(item,recIndex){
		var isActive =  item.get("is_active");

	 if(  item.get("is_active") == 1 )
      {
           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
      }
      else
      {
         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
      }

		var customerItemView = new admin.CustomerRowView({
			model: item
		});
		customerItemView.setActiveId(isActive, recIndex);
	    this.$el.append(customerItemView.render().el );
	}
});
