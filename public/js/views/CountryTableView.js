var admin = admin || {};

admin.CountryTableView = Backbone.View.extend({

	el: $( '#countryList'),

	initialize: function() {
    
		var self = this;
    this.pageNo = 1;
     this.recIndex = 1;

    	this.collection = new admin.CountryCollection(); 	 
    	offset=0;	
    	this.collection.fetch({ url:'/eprayoga/admin/get_all_country',
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
       

       this.collection.fetch({ url:'/eprayoga/admin/get_all_country?page='+ this.pageNo,
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
          this.renderCountryItem( item,this.recIndex ); this.recIndex++;
    }, this);

	    return this;  
	},

  removeAll: function()
  {
      this.collection.reset();
      this.$el.empty();

  },
  render: function() {
    this.collection.each(function(item) {
      this.renderCountryItem( item,this.recIndex );  this.recIndex++;
    }, this);
    initializePopover();
      return this;  
  },

	renderCountryItem:function(item,recIndex){

			var isActive =  item.get("is_active");

	 if(  item.get("is_active") == 1 )
      {
           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
      }
      else
      {
         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
      }
      
		var countryItemView = new admin.CountryRowView({
			model: item
		}); 

      //countryItemView.setActiveId(isActive);
      countryItemView.setActiveId(isActive,recIndex);

	    this.$el.append(countryItemView.render().el );


	}
  
});
