var admin = admin || {};

admin.ClientGroupTableView = Backbone.View.extend({

	el: $( '#clientGroupList'),

	initialize: function() {
    	
		var self = this;
    	this.collection = new admin.ClientGroupCollection(); 	 
    	offset=0;	
    	this.pageNo = 1;
    	this.collection.fetch({ url:'/eprayoga/admin/get_all_client_group',
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
      

       this.collection.fetch({ url:'/eprayoga/admin/get_all_client_group?page='+ this.pageNo,
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
			this.renderClientGroupItem( item );
		}, this);
	  
	    initializePopover();
	    return this;  
	},

	renderClientGroupItem:function(item){

	var isActive =  item.get("is_active");

	 if(  item.get("is_active") == 1 )
      {
           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
      }
      else
      {
         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
      }
	var clientgroupItemView = new admin.ClientGroupRowView({
			model: item
	});

		clientgroupItemView.setActiveId(isActive);

	    this.$el.append(clientgroupItemView.render().el );
	}
});
