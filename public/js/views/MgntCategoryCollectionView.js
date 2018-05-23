var admin = admin || {};

admin.MgntCategoryCollectionView = Backbone.View.extend({

  initialize: function(options) {
     
      this.education=options.education;
     
      this.collection = new admin.CategoryCollection(options.catCollection);
      this.subject_id = options.subject_id;
      this.topic_id = options.topic_id;
    _.bindAll(this, "renderCategory");
    _.bindAll(this, "render");
    this.render();

    //alert(this.category_code);
  },

  events:{
    "change" : "isSelected"
  },

  render: function() {
     
      if( this.collection ){
       this.$el.html( '<option value="">--Select--</option>' );
       this.collection.each(function(item) {
         
        this.renderCategory(item);
      }, this );
    }
      return this;
  },

  renderCategory: function( item ) {
    var catItemView = new admin.MgntCategoryItemView({
      model: item
    });
      this.$el.append( catItemView.render().el );
  },

  isSelected:function(){

    var  catCode = $(this.el).val();

    var requestJson = JSON.stringify({"category_id":catCode});
   
    var self =this;

     $.when(
              $.ajax({
              url: "/eprayoga/admin/get_subject_by_category_id_cust",
                  type: "POST",
                  data: requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {                   
                   self.subjectdata = data;
                

                  },
                  error: function(data) {
                      // try{
                      //     var errData = JSON.parse(data.responseText);
                      //     if ( errData.errCode == 550) {
                      //         window.location.href = '/sessionExpired';
                      //     } else {
                      //         if (errData.errMsg.length > 0) {
                      //           var failureMsg = errData.errMsg; 
                      //         } else {
                      //             var failureMsg = "Error while Edit Faq form. Please Contact Administrator."; 
                      //           }
                      //           $( "div.failure").html(failureMsg);
                      //           $( "div.failure" ).fadeIn( 300 ).delay( 3500 ).fadeOut( 800 ); 
                      //       }
                      // }catch(e) {
                      //     window.location.href = '/sessionExpired';
                      //  }          
                  }
                })
                ).done(function(){

              

                if(new String(self.education).valueOf() == new String('educationctegory').valueOf()){
                    self.subjectCollectionView = new admin.MgntSubjectCollectionView({
                      el: $( '#edu_sub_category' ),
                      catCollection: self.subjectdata
                      });
                    $('#edu_sub_category').val(self.subject_id);
                   
                } else {
                          self.subjectCollectionView = new admin.MgntSubjectCollectionView({
                            el: $( '#topic_subject_code' ),
                            catCollection: self.subjectdata
                          });
                          $('#topic_subject_code').val(self.subject_id);
                          if( self.subject_id != undefined && self.topic_id != undefined ){
                              self.subjectCollectionView = new admin.MgntSubjectCollectionView({
                                el: $( '#questionSubject' ),
                                catCollection: self.subjectdata,
                                topic_id : self.topic_id
                              });

                              $('#questionSubject').val(self.subject_id);
                              self.subjectCollectionView.isSelected();
                          }else{
                              self.subjectCollectionView = new admin.MgntSubjectCollectionView({
                                el: $( '#questionSubject' ),
                                catCollection: self.subjectdata
                             });
                          }

                    }
              //  alert(self.subject_code  + '  ' + self.topic_code );
               
                                
            });
  }

});


// var admin = admin || {};

// admin.MgntCategoryCollectionView = Backbone.View.extend({

// 	initialize: function(options) {
//     	console.log('Initialize MgntCategoryCollectionView');
//     	console.log('faqCollection');
// 	    	console.log(options.catCollection);
// 			this.collection = new admin.CategoryCollection(options.catCollection);
//       this.subject_id = options.subject_id;
//       this.subjectCollectionView = null;

// 		_.bindAll(this, "renderCategory");
// 		_.bindAll(this, "render");
// 		this.render();
// 	},

// 	events:{
// 		"change" : "isSelected"
// 	},

// 	render: function() {
//     	console.log('Rendering category collection');
//     	if( this.collection )
//     	{    		
//     	   // this.$el.html( '<option value="">Select</option>' );
// 			   this.collection.each(function(item) {
// 		    	  console.log(item.get('category_id'));
// 		        console.log(item.get('category_name'));
// 				this.renderCategory(item);
// 			}, this );
// 		}
//     	return this;
// 	},

// 	renderCategory: function( item ) {
// 		var catItemView = new admin.MgntCategoryItemView({
// 			model: item
// 		});
//     	this.$el.append( catItemView.render().el );
// 	},

// 	isSelected:function(){

// 	  var  catId = $(this.el).val();

// 	  var requestJson = JSON.stringify({"category_code":catId});

// 	  var self =this;

// 		 $.when(
//               $.ajax({
//               url: "/eprayoga/admin/get-subject-by-category-id",
//                   type: "POST",
//                   data: requestJson,
//                   contentType:'application/json',
//                   cache:false,
//                   success: function(data) {
//                     //alert(JSON.stringify(data));
//                     console.log(data);

//                    //self.subjectdata = data
//                     self.subjectdata = data

//                     console.log(self.subjectdata);
                     
                   

//                   },
//                   error: function(data) {
//                       // try{
//                       //     var errData = JSON.parse(data.responseText);
//                       //     if ( errData.errCode == 550) {
//                       //         window.location.href = '/sessionExpired';
//                       //     } else {
//                       //         if (errData.errMsg.length > 0) {
//                       //           var failureMsg = errData.errMsg; 
//                       //         } else {
//                       //             var failureMsg = "Error while Edit Faq form. Please Contact Administrator."; 
//                       //           }
//                       //           $( "div.failure").html(failureMsg);
//                       //           $( "div.failure" ).fadeIn( 300 ).delay( 3500 ).fadeOut( 800 ); 
//                       //       }
//                       // }catch(e) {
//                       //     window.location.href = '/sessionExpired';
//                       //  }          
//                   }
//                 })
//                 ).done(function(){

//                     /*self.topicCollectionView = new admin.MgntSubjectCollectionView({
//                       el: $( '#topic_subject_code' ),
//                       catCollection: self.subjectdata
//                     });*/

//                     if( self.subjectCollectionView != undefined )
//                   {
//                     self.subjectCollectionView.collection=new admin.SubjectCollection(self.subjectdata);
//                     self.subjectCollectionView.render();
//                   }
                  
//                     if( self.subject_id != undefined )
//                       $('#topic_subject_code').val(self.subject_id);                      
//                 });
         
// 	}

// });
