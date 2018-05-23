var admin = admin || {};

admin.ClientTableView = Backbone.View.extend({

	el: $( '#clientList'),

	initialize: function() {
    	
		var self = this;
    	this.collection = new admin.ClientCollection(); 	 
    	offset=0;
    	this.pageNo = 1;
        this.recIndex = 1;	
    	this.collection.fetch({ url:'/eprayoga/admin/get_all_client',
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
      

       this.collection.fetch({ url:'/eprayoga/admin/get_all_client?page='+ this.pageNo,
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
			this.renderClientItem( item, this.recIndex );
			this.recIndex++;
		}, this);
	  
	   initializePopover();
	    return this;  
	},

	renderClientItem:function(item, recIndex){

		var isActive =  item.get("is_active");

	 if(  item.get("is_active") == 1 )
      {
           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
      }
      else
      {
         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
      }
		var clientItemView = new admin.ClientRowView({
			model: item
		});

		clientItemView.setActiveId(isActive, recIndex);
	    this.$el.append(clientItemView.render().el );
	}
});
