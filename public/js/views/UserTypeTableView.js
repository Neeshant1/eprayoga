var admin = admin || {};

admin.UserTypeTableView = Backbone.View.extend({

	el: $( '#userTypeList'),

	initialize: function() {
		var self = this;
    	this.collection = new admin.UserTypeCollection(); 	
    	this.pageNo = 1; 
		this.recIndex = 1;
    	this.collection.fetch({ url:'/eprayoga/admin/get_all_user_type',
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

	setShowPage: function(pageNO)
  {
       this.pageNo = this.collection.current_page+1;
       var self = this;

       this.collection.fetch({ url:'/eprayoga/admin/get_all_user_type?page='+ this.pageNo,
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
			this.renderUserTypeItem(item, this.recIndex);
			this.recIndex++;
		}, this);
	  initializePopover();
	    return this;  
	},

	 removeAll: function()
  {
      this.collection.reset();
      this.$el.empty();

  },

	renderUserTypeItem:function(item, recIndex){

		var isActive =  item.get("is_active");

	 if(  item.get("is_active") == 1 )
      {
           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
      }
      else
      {
         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
      }

			var usertypeItemView = new admin.UserTypeRowView({
				model: item
			});
			usertypeItemView.setActiveId(isActive, recIndex);
		    this.$el.append(usertypeItemView.render().el );
	}
});
