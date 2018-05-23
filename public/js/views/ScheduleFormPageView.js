var admin = admin || {};

admin.ScheduleFormPageView = Backbone.View.extend({

    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.scheduleId = options.id;
       this.template = options.template;
       var self = this;
        if(new String(this.mode).valueOf() == new String('create').valueOf()){

              this.render();
        }	

        else{

          var requestJson = JSON.stringify({"exam_schedule_id":this.scheduleId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_schedule_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
               // alert(JSON.stringify(data));
                    self.scheduleData = data;
                  },
                  error: function(data) {
                    errorhandle(data);
         
                  }
                })
                ).done(function(){
                    self.render();

                })
        }
      // this.render();
     },

    events: {
		'click  #create-schedule'  : 'createSchedule',
		'click  #cancel-schedule'	: 'cancelSchedule',
	},

    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			this.$el.html(this.template);
	    } 
        else { //edit
			  this.$el.html(this.template( this.scheduleData ));
		}   	      
        $('#exam_date').datetimepicker();
		    return this;
	},

	createSchedule:function(e){
		e.preventDefault();
		var scheduleFormData = {
            "user_id": $('#user_id').val(),
            "category_id": $('#category_id').val(),  
            "subject_id": $('#subject_id').val(),
            "topic_id": $('#topic_id').val(),
            "exam_date": $('#exam_date').val(),
            // "start_time": $('#start_time').val(),
            // "end_time": $('#end_time').val(),
            "is_active": true,
            "is_deleted": 0,

    };
                                              

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            scheduleFormData.exam_schedule_id = parseInt($('#exam_schedule_id').val(), 10);
           
           var requestData = JSON.stringify(scheduleFormData); 
            saveschedule = "/eprayoga/admin/update_re_schedule";
            var successMsg = "Address Type Updated Successfully.";
            var failureMsg = "Error while updating the Address Type. Contact Administrator.";
      } 
      else {

            var requestData = JSON.stringify(scheduleFormData); 
            saveschedule = "/eprayoga/admin/create_schedule";
            var successMsg = "Schedule Created Successfully.";
            var failureMsg = "Error while creating the Schedule. Contact Administrator.";
      }


          $.ajax({
          url     :saveschedule,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
        
            appRouter.navigate("schedule", {trigger: true});
            $( "div.success" ).html(successMsg);
            $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
          },
          error: function(data) {
                errorhandle(data);
          }
        }); 

	},

	cancelSchedule:function(e){
		   e.preventDefault();
       appRouter.navigate("schedule", {trigger: true});  
	}



});
