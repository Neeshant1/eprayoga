var admin = admin || {};

admin.SecurityQuestionTableView = Backbone.View.extend({

	el: $( '#security_question_list'),

	initialize: function() {
		var self = this;
		this.pageNo = 1;
		this.recIndex = 1;
    	this.collection = new admin.SecurityQuestionCollection(); 	 
	
    	this.collection.fetch({ url:'/eprayoga/admin/get_all_security_questions',
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

       this.collection.fetch({ url:'/eprayoga/admin/get_all_security_questions?page='+ this.pageNo,
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
			this.renderSqItem( item, this.recIndex );
			this.recIndex++;
		}, this);
	  initializePopover();
	    return this;  
	},

	renderSqItem:function(item, recIndex){
		
	 var isActive =  item.get("is_active");

	 if(  item.get("is_active") == 1 )
      {
           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
      }
      else
      {
         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
      }
      
		var sqItemView = new admin.SecurityQuestionRowView({
			model: item
		});
      sqItemView.setActiveId(isActive, recIndex);

	    this.$el.append(sqItemView.render().el );
	}
});
