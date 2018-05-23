var admin = admin || {};

admin.QuestionTypeTableView = Backbone.View.extend({

	el: $( '#question_type_list'),

	initialize: function() {
		var self = this;
		this.pageNo = 1;
		this.recIndex = 1;
    	this.collection =  new admin.QuestionTypeCollection(); 	 

    	this.collection.fetch({ url:'/eprayoga/admin/get_all_question_type',

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

       this.collection.fetch({ url:'/eprayoga/admin/get_all_question_type?page='+ this.pageNo,
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

	// render: function() {
	// 	this.collection.each(function(item) {
	// 		this.renderQusTypeItem( item, this.recIndex );
	// 		this.recIndex++;
	// 	}, this);
	//     console.log('renderQuestion typeItem');
	//     initializePopover();
	//     console.log(this.collection.length);
	//     if(this.collection.length > 5 ){
	//     	 $("#questiontype_load_more").show(); 
	//     }

	//     else{
	//     	$("#questiontype_load_more").hide(); 
	//     }
	//     return this;  
	// },
	render: function() {
		this.collection.each(function(item) {
			this.renderQusTypeItem( item);
		}, this);
	  initializePopover();
	    return this;  
	},

	renderQusTypeItem:function(item, recIndex){
		var isActive =  item.get("is_active");

			 if(  item.get("is_active") == 1 )
		      {
		           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
		      }
		      else
		      {
		         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
		      }
		var qusTypeItemView = new admin.QuestionTypeRowView({
			model: item
		});
		 qusTypeItemView.setActiveId(isActive, recIndex);

	    this.$el.append(qusTypeItemView.render().el );
	}
});
