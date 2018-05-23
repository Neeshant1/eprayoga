var admin = admin || {};

admin.StateTableView = Backbone.View.extend({

	el: $( '#stateList'),

	initialize: function() {
		var self = this;
		this.pageNo = 1;
    this.recIndex = 1;
    	this.collection = new admin.StateCollection(); 	 
    	offset=0;	
    	this.collection.fetch({ url:'/eprayoga/admin/get_all_state',
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

       this.collection.fetch({ url:'/eprayoga/admin/get_all_state?page='+ this.pageNo,
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
			this.renderStateItem( item,this.recIndex );  this.recIndex++;
		}, this);
	  initializePopover();
	    return this;  
	},

	renderStateItem:function(item,recIndex){

		var isActive =  item.get("is_active");

	 if(  item.get("is_active") == 1 )
      {
           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
      }
      else
      {
         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
      }

		var stateItemView = new admin.StateRowView({
			model: item
		});
      stateItemView.setActiveId(isActive,recIndex);
		  this.$el.append(stateItemView.render().el );
	}
});
