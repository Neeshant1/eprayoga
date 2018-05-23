var user = user || {};

user.OrderDetailPageView = Backbone.View.extend({
 template: $( '#examCartPage' ).html(),
initialize: function() {
    
   $('#sticker').show();
    this.examcartcollection = new user.OrderDetailCollection();
    this.compexamcartcollection = new user.CustExamEmpCollection();
    this.orderdetail = null,

    this.render();
},

  //   events: {
       
  //       'click #saveschedule' : 'saveSchedule'

  //   },

 



render:function(){
	var self = this;
    this.$el.html(this.template);

        $.when(self.examcartcollection.fetch(),self.compexamcartcollection.fetch()).done(function() {
      
         // var filtercol = self.examcartcollection.filter(function (item) {
         //    return item.attributes.status === 'completed';

         //  });
        
         // self.CustExamDetailCollection = new Backbone.Collection(filtercol);
          var filtercol = self.examcartcollection.filter(function (item) {
          if(item.attributes.no_attempts_sofar  < item.attributes.no_of_attempts  && item.attributes.status == 'completed')
          {
            
            item.attributes.status = '';
            item.attributes.endtime = '';
            item.attributes.starttime= '';
            item.attributes.time_elapsed = '';  
            item.attributes.exam_trans_ref_no = ''; 
            item.attributes.user_profile_id = '';  
            item.attributes.is_schedule = null;      
            item.attributes.exam_planned_date = '';   
          }return item;
          });
           self.examcartcollection = new user.OrderDetailCollection(filtercol);
        var filtercol = self.examcartcollection.filter(function (item) {
            return item.attributes.status !== 'completed';

          });
        
         self.notexamcartcollection = new user.OrderDetailCollection(filtercol);
          var filtercol = self.notexamcartcollection.filter(function (item) {
            return item.attributes.status !== 'reschedule';

          });
          
        
         self.notexamcartcollection = new user.OrderDetailCollection(filtercol);
        if(self.notexamcartcollection.length > 0){
         
          self.examCart();
        }

       
        if(self.compexamcartcollection.length > 0){
         
          self.completedexamCart();
        }

    });


      //$('#start_time').timepicker({ 'scrollDefault': 'now' });   
 //$('#exam_date').datetimepicker();
    return this;
},

examCart:function(){


    var self = this;
    self.notexamcartcollection.each(function(item){
     

   self.renderExamCart(item);
   },this)

},

completedexamCart:function(){


    var self = this;
    self.compexamcartcollection.each(function(item){
     
   self.renderCompletedExamCart(item);
   },this)

},

renderExamCart:function(item){

	var renderItem = new user.OrderDetailRowView({
			model: item
		});

 // var obj = item.toJSON();

   // var tpl1 = _.template($('#examCartTemplate').html());

	this.$el.find("#examcart").append(renderItem.render().el );
    //this.$el.find('#examcart').append(tpl1(obj));
    },

renderCompletedExamCart:function(item){

  var renderItem = new user.OrderDetailComRowView({
      model: item
    });

  this.$el.find("#completedexamcart").append(renderItem.render().el );
    //this.$el.find('#examcart').append(tpl1(obj));
    }


});
