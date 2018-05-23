var admin = admin || {};

admin.CategoryTableView = Backbone.View.extend({

	el: $( '#category_list'),

	initialize: function() {
    	
		var self = this;
		
		  this.recIndex = 1;
    	this.collection = new admin.CategoryCollection();    	
    	this.pageNo = 1;    	
    	this.collection.fetch({ 
    		url:'/eprayoga/admin/get_all_category',
    	 	//url:'/getAllSubDoc',
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

	setShowPage: function(pageNo)
  {
  		
       this.pageNo = this.collection.current_page+1;      
       var self = this;
       this.collection.fetch({ url:'/eprayoga/admin/get_all_category?page='+this.pageNo,
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
			this.renderCategoryItem( item, this.recIndex );
			this.recIndex++;
		}, this);
	   
	  initializePopover();
	    return this;  
	},


    removeAll: function(){
      this.collection.reset();
      this.$el.empty();

    },

	renderCategoryItem:function(item, recIndex){
		var isActive =  item.get("is_active");

	 if(  item.get("is_active") == 1 )
      {
           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
      }
      else
      {
         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
      }
		var categoryItemView = new admin.CategoryRowView({
			model: item
		});
		categoryItemView.setActiveId(isActive, recIndex);
	    this.$el.append(categoryItemView.render().el );
	}
});
