var admin = admin || {};

admin.AddressTypeTableView = Backbone.View.extend({

	el: $( '#address_type_list'),

	initialize: function() {
    	
		var self = this;
    	this.collection = new admin.AddressTypeCollection(); 	 
    	offset=0;	
    	this.pageNo = 1;
      // this.recIndex = 1;

    	this.collection.fetch({ url:'/eprayoga/admin/get_all_address_type',

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
      


       this.collection.fetch({ url:'/eprayoga/admin/get_all_address_type?page='+ this.pageNo,

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
			this.renderAddTypeItem( item );
		}, this);
	   
	  
      initializePopover();
	    return this;  
	},

	renderAddTypeItem:function(item){		
	   
	var isActive =  item.get("is_active");

	 if(  item.get("is_active") == 1 )
      {
           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
      }
      else
      {
         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
      }
      
		var addTypeItemView = new admin.AddressTypeRowView({
			model: item
		});

      addTypeItemView.setActiveId(isActive);

	  this.$el.append(addTypeItemView.render().el );

	}
});
