var admin = admin || {};

admin.SmsTableView = Backbone.View.extend({

	el: $( '#smsList'),

	initialize: function() {
		var self = this;
		this.pageNo = 1;
    this.recIndex = 1;
    	this.collection = new admin.SmsCollection(); 	 	
    	this.collection.fetch({ url:'/eprayoga/admin/get_all_sms',
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

       this.collection.fetch({ url:'/eprayoga/admin/get_all_sms?page='+ this.pageNo,
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
			this.renderSmsItem( item, this.recIndex );  this.recIndex++;
		}, this);
	  initializePopover();
	    return this;  
	},

	  removeAll: function()
  {
      this.collection.reset();
      this.$el.empty();

  },

	renderSmsItem:function(item,recIndex){

			var isActive =  item.get("is_active");

			 if(  item.get("is_active") == 1 )
		      {
		           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
		      }
		      else
		      {
		         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
		      }
		var smsItemView = new admin.SmsRowView({
			model: item
		});
    smsItemView.setActiveId(isActive,recIndex);
	    this.$el.append(smsItemView.render().el );
	}
});
