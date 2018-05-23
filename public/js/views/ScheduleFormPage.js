var user = user || {};

user.ScheduleFormPage = Backbone.View.extend({
    //template: $( '#scheduleFormPage' ).html(),
	initialize: function(options) {
        $('html,body').scrollTop(0);
        this.scheduleId = options.id;
        this.prodId = options.prod_id;
        this.examScheduleId = options.exam_schedule_id;

       // alert(this.scheduleId);

       // this.exam_schedule_id = options.exam_schedule_id;



        this.mode = options.mode;

      this.template = options.template;
         var self = this;

          if(new String(this.mode).valueOf() == new String('schedule').valueOf()){
            var requestJson = JSON.stringify({"product_catalog_id":this.prodId});
            $.when(
              $.ajax({
                  url: "/eprayoga/user/get_schedule_time",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {

                     self.scheduleData = data;
                  },
                  error: function(data) {
                   errorhandle(data);

                  }
              })
               ).done(function(){
                
                   self.render();
               });
             // this.render();
          }	

          else{

          	var requestJson = JSON.stringify({"exam_schedule_id":this.examScheduleId});
            var requestJson2 = JSON.stringify({"product_catalog_id":this.prodId});
             $.when(
              $.ajax({
              url: "/eprayoga/user/get_reschedule_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
             

                    var sdata = {
                    	         "exam_schedule_id" : data.exam_schedule_id,
                    	         "order_detail_id"  : data.order_detail_id,
                    	         "exam_planned_date"        : data.exam_planned_date,
                    	         "start_time"      : data.start_time.split(':'),
                    	         "end_time"         :  data.end_time.split(':')
                     	     }


                     	      self.rescheduleData = sdata;
                  },
                  error: function(data) {
                   errorhandle(data);

                  }
                }),
                 $.ajax({
                  url: "/eprayoga/user/get_schedule_time",
                  type: "POST",
                  data :requestJson2,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {

                     self.scheduleData = data;
                  },
                  error: function(data) {
                    errorhandle(data);
   
                  }
              })
                ).done(function(){
                  

                    self.render();
                  $('#exam_date').val(self.rescheduleData.exam_planned_date);
                  $("#timepicker1").val(self.rescheduleData.start_time[0]);
                  $("#timepicker2").val(self.rescheduleData.start_time[1]);
                  $("#timepicker3").val(self.rescheduleData.start_time[2]);
                  $("#end_time").val(self.rescheduleData.end_time[0]);
                  $("#end_time2").val(self.rescheduleData.end_time[1]);
                  $("#end_time3").val(self.rescheduleData.end_time[2]);

                })

               // $('#exam_date').attr('value', self.rescheduleData.get('exam_date'));


          }

		this.render();    
	},

    events: {
       
        'click #saveschedule' : 'saveSchedule',
        'click #cancelCq'     : 'cancelForm',
        'change #timepicker1 '  : 'timepicker1',
        'change #timepicker2'  : 'timepicker2',
        'change #timepicker3'  : 'timepicker3',
  
    },

render: function() {		

	if (new String(this.mode).valueOf() == new String('schedule').valueOf()) {			
	    this.$el.html(this.template);
	    
	     $('#exam_date').datetimepicker({  
            minDate:new Date()
      });

	 	  } 
        else { //reschedule

        	this.$el.html(this.template( this.rescheduleData ));

			  $('#exam_date').datetimepicker({  
            minDate:new Date()
      });
		}   	      
		return this;
	},

  getTime : function() {
    var self = this;
    var t1 = $("#timepicker1").val();
    var t2 = $("#timepicker2").val();
    var t3 = $("#timepicker3").val();

      a = parseInt(self.scheduleData[0]['value']);
      a = self.scheduleData[0]['value'];
      var hours = Math.trunc(a/60); 
      var minutes = a % 60; 
      if(hours < 10){
        FiHr = "0" + hours;
      } else {
        FiHr = hours;
      }

      if(minutes  <10){
        FiMt = "0" + minutes;
      } else {
        FiMt = minutes;
      }

        t11 = FiHr + ':' + FiMt + ':' + "00" ;
        t22 = t1 +':'+ t2 + ':' + t3;
          var t1 = t11.split(':');
          var t2 = t22.split(':');
          var mins = Number(t1[1])+Number(t2[1]);
          var hrs = Math.floor(parseInt(mins / 60));
          if($("#timepicker1").val() == 23){
            hrs = Number(00);
            mins = mins % 60;
            finalTime = hrs+':'+mins + ':' + t3;
          } 
          else {
            hrs = Number(t1[0])+Number(t2[0])+hrs;
            mins = mins % 60;
            finalTime = hrs+':'+mins + ':' + t3;
          }
        
          if(hrs < 10){
             $('#end_time').val('0' + hrs);
          } else {
            $('#end_time').val(hrs);
          }

          if(mins < 10){
            $('#end_time2').val('0' +  mins);
          } else {
            $('#end_time2').val( mins);
          }

          $('#end_time3').val( t3);
  },
 
 timepicker1 : function(){
    this.getTime();
 },

 timepicker2 : function(){
    this.getTime();
 },

 timepicker3 : function(){
  this.getTime();
 },


  saveSchedule:function(e){

  	 e.preventDefault();   
       // alert("hello");
     if ($('#exam_date').val().trim() == '' ) {
        $('#exam_date').focus();
        document.getElementById('news_date_error').innerHTML= "Please select the date";             
        return false;
         } 

       if ($('#timepicker1').val().trim() == '' ) {
        $('#timepicker1').focus();
        document.getElementById('start_time_error').innerHTML= "Please select the start time";             
        return false;
         } 

        if ($('#timepicker1').val() >24 ) {
        $('#timepicker1').focus();
        document.getElementById('start_time_error').innerHTML= "Please enter valid time: HH:MM:SS";             
        return false;    
         }

       if ($('#timepicker2').val() > 60 ) {
        $('#timepicker2').focus();
        document.getElementById('start_time_error').innerHTML= "Please enter valid time: HH:MM:SS";             
        return false;    
         }

        if ($('#timepicker3').val() > 60 ) {
        $('#timepicker3').focus();
        document.getElementById('start_time_error').innerHTML= "Please enter valid time: HH:MM:SS";             
        return false;    
         }

       if ($('#end_time').val().trim() == '' ) {
        $('#end_time').focus();
        document.getElementById('end_time_error').innerHTML= "Please select the end time";             
        return false;
         } 

         if($('#end_time').val() >24 ) {
        $('#end_time').focus();
        document.getElementById('end_time_error').innerHTML= "Please enter valid time: HH:MM:SS";             
        return false;
         } 

         if ($('#end_time2').val() >60 ) {
        $('#end_time2').focus();
        document.getElementById('end_time_error').innerHTML= "Please enter valid time: HH:MM:SS";             
        return false;
         } 

        if ($('#end_time3').val() >60 ) {
        $('#end_time3').focus();
        document.getElementById('end_time_error').innerHTML= "Please enter valid time: HH:MM:SS";             
        return false;
         } 



         var t1 = $("#timepicker1").val();
         var t2 = $("#timepicker2").val();
         var t3 = $("#timepicker3").val();


         var ethh = $("#end_time").val();
         var etmm = $("#end_time2").val();
         var etss = $("#end_time3").val();


         // var asthh = $("#actual_start_time").val();
         // var astmm = $("#actual_start_time2").val();
         // var astss = $("#actual_start_time3").val();

         // console.log(asthh +':'+ astmm +':'+ astss);

         //  var aethh = $("#actual_end_time").val();
         // var aetmm = $("#actual_end_time").val();
         // var aetss = $("#actual_end_time").val();

         // console.log(aethh +':'+ aetmm +':'+ aetss);

          var start_time = t1 +':'+ t2 +':'+ t3;
          var end_time = ethh +':'+ etmm +':'+ etss;
         // var actual_start_time = asthh +':'+ astmm +':'+ astss;
         // var actual_end_time = aethh +':'+ aetmm +':'+ aetss;

       
            this.orderdetail = user.orderdetail;
            var scheduleData = {
                  "promo_master_id" : this.orderdetail.attributes.promo_id,
                  "order_detail_id" : this.orderdetail.attributes.order_detail_id,
                  "product_catalog_id" : this.orderdetail.attributes.product_catalog_id,
                  "exam_planned_date"  : $('#exam_date').val(),
                  "start_time" : start_time,
                  "end_time" : end_time,
                
      };

          if (new String(this.mode).valueOf() == new String('reschedule').valueOf()) {
            scheduleData.exam_schedule_id = this.examScheduleId;

            scheduleData.exam_rescheduled_on = $('#exam_date').val();


           var requestData = JSON.stringify(scheduleData); 

           //alert(requestData);
            saveschedule = "/eprayoga/user/exam_reschedule";
            var successMsg = " Reschedule Updated Successfully.";
            var failureMsg = "Error while updating the  question type. Contact Administrator.";
      } 
      else {

            var requestData = JSON.stringify(scheduleData); 
            //alert(requestData);
            saveschedule = "/eprayoga/user/exam_schedule";
            var successMsg = " Question Type Created Successfully.";
            var failureMsg = "Error while creating the question type .  Contact Administrator.";
      } 


       $.ajax({
              url     : saveschedule,
              type    : "POST",
              data    : requestData ,
              contentType:'application/json',
              cache:false,
              success : function(data) {

                 userRouter.navigate("examCart", {trigger: true});
               // appRouter.navigate("categorypage", {trigger: true});
                // $( "div.success" ).html(successMsg);
                // $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
              },
              error: function(data) {
                  errorhandle(data);

                
              } 
      
            }); 

    },

    cancelForm:function(e){
    	e.preventDefault();
        userRouter.navigate("examCart", {trigger: true});

    },




});
