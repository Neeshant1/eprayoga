var user = user || {};

user.OrderDetailRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'examcart',
	  template: $( '#examCartTemplate' ).html(),
    template1: $( '#popupscript' ).html(),

    initialize: function() {

        this.firstRender = true;
        this.activeId = -1;
        this.recIndex = 0;
    	_.bindAll(this, "render");
        this.model.bind('change', this.render);
	},

    events: {
        'click #schedule_page': 'renderScheduleForm',
        'click #re_schedule_page': 'renderReScheduleForm',
        'click #saveschedule' : 'saveSchedule',
         'click #start_exam'   : 'startExam'

    },


	render: function() {
    $('.popover-content').hide();
		var tmpl = _.template( this.template );
    var tmpl1 = _.template( this.template1 );
    //this.$el.append(this.template1);

		this.$el.html( tmpl( this.model.toJSON() ) );
    this.$el.append( tmpl1( this.model.toJSON() ) );

   
		return this;
	},

    renderScheduleForm:function(e){
          
     
      user.orderdetail = this.model;
      userRouter.navigate("renderScheduleForm/"+ this.model.get('promo_id') + "/" + this.model.get('product_catalog_id'), {trigger:true});
      


    },

    renderReScheduleForm:function(e){
   
     

      if(this.model.get('time_elapsed') != 0){
       
      } else {
           console.log("renderScheduleForm");
           user.orderdetail = this.model;
           console.log(user.orderdetail);
           userRouter.navigate("renderReScheduleForm/"+ this.model.get('exam_schedule_id') + "/" + this.model.get('product_catalog_id'), {trigger:true});
 
      }

    },


    startExam:function(e){
    
        e.preventDefault();
       schedule = this.model.get('is_schedule');
       starttime = this.model.get('start_time');
       endtime = this.model.get('end_time');
       schdate = this.model.get('exam_planned_date');
       
       user.orderdetail = this.model; 
       user.orderdetail.attributes.mode = 1;
       
 if(user.orderdetail.attributes.status == "notstarted")
             {
       var currentdate = new Date();
       DD = currentdate.getDate();
       MM = currentdate.getMonth()+1; 
       YY = currentdate.getFullYear();  
       h = currentdate.getHours();
       m = currentdate.getMinutes();
       s = currentdate.getSeconds();

            if(DD < 10){
             DD = '0' + DD;
            }
            if(MM < 10){
             MM = '0' + MM;
            }
            var sam1 = h * 3600;
            var sam2 = m * 60;
            var time = Number(sam1) +  Number(sam2) +  Number(s);
            var date =YY + "-" + MM + "-" + DD;
            var t1 = starttime.split(':');

            var stime = Number(t1[0]) * 3600;
            var sstime =Number(t1[1])* 60;
            var ssstime = Number(t1[2]);
            var time2 = Number(stime) +  Number(sstime) +  Number(ssstime);
            var timediff =Math.abs(Number(time2) - Number(time)); 
           
       
        if(schedule == null){
          $( "div.failure").html("Please schedule the exam");
          $( "div.failure" ).fadeIn( 300 ).delay( 3500 ).fadeOut( 800 );
          
         }
        else if (date != schdate){
         $('#messagepop').text("Please schedule the Corrct Date."); 
         $('#myModalCust').modal('show');
         return false;
            
         }
        else if(timediff >= 300){
          $('#messagepop').text("Please Start The Exam On Schedule Time."); 
          $('#myModalCust').modal('show');
          return false;

         }
        else{
          user.orderdetail.attributes.type = "promo";  
           user.orderdetail.attributes.examstatus = "start";
          userRouter.navigate("examStart", {trigger: true});
         }
       
    }
     else if(user.orderdetail.attributes.status == "inprogress"){
              user.orderdetail.attributes.examstatus = "restart";
                user.orderdetail.attributes.type = "promo";  
                userRouter.navigate("examStart", {trigger: true});
             } 

}

  

});