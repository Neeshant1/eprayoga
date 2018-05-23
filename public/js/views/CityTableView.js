var admin = admin || {};

admin.CityTableView = Backbone.View.extend({

	el: $( '#cityList'),

	initialize: function() {
   
		var self = this;
		this.pageNo = 1;
    this.recIndex = 1;
    	this.collection = new admin.CityCollection(); 	 
    	
    	this.collection.fetch({ url:'/eprayoga/admin/get_all_city',
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
      

       this.collection.fetch({ url:'/eprayoga/admin/get_all_city?page='+ this.pageNo,
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
			this.renderCityItem( item,this.recIndex );  this.recIndex++;
		}, this);
	    
	    initializePopover();
	    return this;  
	},

	renderCityItem:function(item,recIndex){

		var isActive =  item.get("is_active");

		 if(  item.get("is_active") == 1 )
	      {
	           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
	      }
	      else
	      {
	         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
	      }
		var cityItemView = new admin.CityRowView({
			model: item
		});
     cityItemView.setActiveId(isActive,recIndex);
	    this.$el.append(cityItemView.render().el );
	},

	 removeAll: function()
  {
      this.collection.reset();
      this.$el.empty();

  },

});
