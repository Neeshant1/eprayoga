var admin = admin || {};

admin.ExamView = Backbone.View.extend({
 el: $('#Questions_list'),
	
	initialize: function() {

    	
		var self = this;
    	this.collection = new admin.QuestionOptionCollection(); 	 
    	offset=0;	
    	this.pageNo = 1;
    	this.recIndex = 1;
    	this.collection.fetch({reset:true, ProcessData:true, protocol:'ws', 
        success: function(data){
        	
             self.render();
        },

        error: function(data){
        	 errorhandle(data);
        	//self.render();
        	
        }
      });
    	// this.collection.fetch({ProcessData:true, protocol:'ws'}).done(function(){
    	// console.log("inside the Exam view");  		
    	// 	self.render();
    	// });
    
	},


	events :{
          'click': 'countDownerror'
      

	},

	render: function() {
       
		this.collection.each(function(item) {
			this.renderExamItem( item, this.recIndex  );
		}, this);
	  
	    return this;  
	},


	renderExamItem:function(item,recIndex){
	 
		var examrowView = new admin.ExamRowView({
			model: item
		});
	    this.$el.append(examrowView.render().el);
	},

	countDownerror: function(){

		
	}



	
});
