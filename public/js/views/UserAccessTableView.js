var admin = admin || {};

admin.UserAccessTableView = Backbone.View.extend({

	el: $( '#useraccessList'),

	initialize: function() {
		var self = this;
		this.pageNo = 1; 
		 this.recIndex = 1;
    	this.collection = new admin.UserAccessCollection(); 	 

    	this.collection.fetch({ url:'/eprayoga/admin/get_all_user_access',
    	
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

	setShowPage: function(pageNO)
  {
       this.pageNo = this.collection.current_page+1;
       var self = this;

       this.collection.fetch({ url:'/eprayoga/admin/get_all_user_access?page='+ this.pageNo,
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
						this.renderUserAccessItem( item, this.recIndex);
			      this.recIndex++;
					}, this);
				  initializePopover();
				    return this;  
	},

	// render: function() {
		
	// 	this.collection.each(function(item) {
	// 		this.renderUserAccessItem( item );
	// 	}, this);
	//     console.log('renderUserAccessItem');

	 
	//     return this;  
	// },

	removeAll: function()
  {
      this.collection.reset();
      this.$el.empty();

  },

	renderUserAccessItem:function(item,recIndex){
		var isActive =  item.get("is_active");

	 if(  item.get("is_active") == 1 )
      {
           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
      }
      else
      {
         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
      }
		 
		var userAccessItemView = new admin.UserAccessRowView({
			model: item
		});
		userAccessItemView.setActiveId(isActive, recIndex);
	    this.$el.append(userAccessItemView.render().el );
	}
});
