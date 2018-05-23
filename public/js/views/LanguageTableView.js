var admin = admin || {};

admin.LanguageTableView = Backbone.View.extend({

	el: $( '#language_list'),

	initialize: function() {
    
		var self = this;
    	this.collection = new admin.LanguageCollection(); 	 
    	offset=0;	
    	this.pageNo = 1;
    	this.collection.fetch({ url:'/eprayoga/admin/get_all_language',
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
     
       this.collection.fetch({ url:'/eprayoga/admin/get_all_language?page='+ this.pageNo,
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
		var languageItemView = new admin.LanguageRowView({
			model: item
		});

		languageItemView.setActiveId(isActive);
	    this.$el.append(languageItemView.render().el );
	}
});
