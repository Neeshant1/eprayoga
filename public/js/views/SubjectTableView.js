var admin = admin || {};

admin.SubjectTableView = Backbone.View.extend({

	el: $( '#subject_list'),

	initialize: function() {
  		var self = this;
  		this.pageNo = 1;
      this.recIndex = 1;
    	this.collection = new admin.SubjectCollection(); 	  
      this.collection.fetch({ url:'/eprayoga/admin/get_all_subject',
        //url:'/getAllSubDoc',
        success:function(data){
          self.render();


        },
        error:function(data){
          errorhandle(data);

        }
      }); 


    // 	this.collection.fetch({ url:'/eprayoga/admin/get-all-subject',
    // 	 	//url:'/getAllSubDoc',
    // 	 	success:function(data){
    // 	 		console.log("success");

    // 	 		console.log(JSON.stringify(data));
    // 	 		self.render();


    // 	 	},
  

    	//this.listenTo( this.collection, 'add', this.renderFaqItem );
		//this.listenTo( this.collection, 'reset', this.render );
		//this.listenTo( this.collection, 'sort', this.render );
		//_.bindAll(this, "renderFaqItem");
		//_.bindAll(this, "render"); 
		//this.render();
	},

	setShowPage: function(pageNO){
       this.pageNo = this.collection.current_page+1;
       var self = this;

       this.collection.fetch({ url:'/eprayoga/admin/get_all_subject?page='+ this.pageNo,
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
			this.renderSubjectItem( item, this.recIndex);
      this.recIndex++;
		}, this);
	  initializePopover();
	    return this;  
	},

	  removeAll: function(){
      this.collection.reset();
      this.$el.empty();

    },

	renderSubjectItem:function(item, recIndex){
		var isActive =  item.get("is_active");

	 if(  item.get("is_active") == 1 )
      {
           item.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
      }
      else
      {
         item.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
      }
		var subjectItemView = new admin.SubjectRowView({
			model: item
		});
		subjectItemView.setActiveId(isActive, recIndex);
	    this.$el.append(subjectItemView.render().el );
	}
});
