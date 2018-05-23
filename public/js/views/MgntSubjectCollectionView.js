var admin = admin || {};

admin.MgntSubjectCollectionView = Backbone.View.extend({

	initialize: function(options) {
    	
		  this.collection = new admin.SubjectCollection(options.catCollection);
      this.topic_id = options.topic_id;
		  _.bindAll(this, "renderSubject");
		  _.bindAll(this, "render");
		  this.render();
	},

	events:{
		"change" : "isSelected"
	},
	isSelected:function(){

    var  subjectId = $(this.el).val();

	  var requestJson = JSON.stringify({"subject_id":subjectId});

	  var self =this;

		 $.when(
              $.ajax({
              url: "/eprayoga/admin/get_topic_by_subject_id",
                  type: "POST",
                  data: requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   
                    self.topicData = data.original[0];
                  
                    
                  },
                  error: function(data) {

                  }
                })
                ).done(function(){

                   self.topicCollectionView = new admin.MgntTopicCollectionView({
                        el: $( '#questionTopic' ),
                        topicCollection: self.topicData
                    });

                    if(  self.topic_id != undefined )           
                        $('#questionTopic').val(self.topic_id);
                
                });
	},

	render: function() {
    
    	if( this.collection )
    	{    		
    		 this.$el.html( '<option value="">--Select--</option>' );
			   this.collection.each(function(item) {
		    
				this.renderSubject(item);
			}, this );
		}
    	return this;
	},

	renderSubject: function( item ) {
		var subItemView = new admin.MgntSubjectItemView({
			model: item
		});
    	this.$el.append( subItemView.render().el );
	}

});
