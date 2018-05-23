var admin = admin || {};

admin.OriginTableView = Backbone.View.extend({

	el: $( '#origin_list'),

	initialize: function() {
    
		var self = this;
    	this.collection = new admin.OriginCollection(); 	 
    	offset=0;	
    	this.pageNo = 1;
    	this.recIndex = 1;
    	this.collection.fetch({ url:'/eprayoga/admin/get_all_origin',
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
      

       this.collection.fetch({ url:'/eprayoga/admin/get_all_origin?page='+ this.pageNo,
        //url:'/getAllSubDoc',
        success:function(data){
    
          self.render();


        },
        error:function(data){
         
          $( "div.failure").html("Session Expired.");
          $( "div.failure" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
          setTimeout(function(){ window.location ='/'; }, 1500);
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
			this.renderOriginItem( item, this.recIndex );
			this.recIndex++;
		}, this);
	   
	  initializePopover();
	    return this;  
	},

	renderOriginItem:function(item, recIndex){

        var isActive =  item.get("is_active");

			 if(  item.get("is_active") == 1 )
		      {
		           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
		      }
		      else
		      {
		         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
		      }
		var originItemView = new admin.OriginRowView({
			model: item
		});

		originItemView.setActiveId(isActive, recIndex);
	    this.$el.append(originItemView.render().el );
	}
});
