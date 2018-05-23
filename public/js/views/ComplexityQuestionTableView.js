var admin = admin || {};

admin.ComplexityQuestionTableView = Backbone.View.extend({

	el: $( '#question_complexity_list'),

	initialize: function() {
		var self = this;
    	this.collection = new admin.ComplexityQuestionCollection(); 	 
    	offset=0;	
    	this.pageNo = 1;
    	this.recIndex = 1;
    	this.collection.fetch({ url:'/eprayoga/admin/get_all_question_complexity',
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
       this.collection.fetch({ url:'/eprayoga/admin/get_all_question_complexity?page='+ this.pageNo,
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
			this.renderComQusItem( item, this.recIndex);
			this.recIndex++;
		}, this);
	  initializePopover();
	    return this;  
	},

	renderComQusItem:function(item, recIndex){
		 var isActive =  item.get("is_active");

		 if(  item.get("is_active") == 1 )
	      {
	           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
	      }
	      else
	      {
	         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
	      }
		var comQusItemView = new admin.ComplexityQuestionRowView({
			model: item
		});
		comQusItemView.setActiveId(isActive, recIndex);
	    this.$el.append(comQusItemView.render().el );
	}
});
