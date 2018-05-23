var user = user || {};

user.CustExamCatalogPageView = Backbone.View.extend({
 template: $( '#custExamsListTpl' ).html(),
 template1: $( '#popupscript' ).html(),
initialize: function() {
	
    
    $('#sticker').show();
    this.examcartcollection = new user.CustExamDetailCollection();
    this.examColl1 = new user.CustExamDetailCollection1();
    this.examColl2 = new user.CustExamDetailCollection2();
    this.schedule = new admin.ScheduleCollection();
    this.orderdetail = null;
    

   this.render();
},


    events: {

        
        'click #Promo_Code': 'promocode',
        // 'click #search_promocode': 'seacrhpromocode',
        'click #start_exam' : 'examStartForm'


    },

render:function(){
  var self = this;
    this.$el.html(this.template);
    this.$el.append(this.template1);

        $.when(self.examcartcollection.fetch(),
              self.examColl1.fetch(),
              self.examColl2.fetch()).done(function() {
      
        if(self.examcartcollection.length > 0){
        
          self.examCart();
        }
        if(self.examColl1.length > 0){
         
           var filtercol = self.examColl1.filter(function (item) {
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
        
         self.examColl1 = new user.CustExamDetailCollection1(filtercol);
           var filtercol = self.examColl1.filter(function (item) {
            return item.attributes.status !== 'reschedule';

          });
        
         self.examColl1 = new user.CustExamDetailCollection1(filtercol);
        
         var filtercol = self.examColl1.filter(function (item) {
          return item.attributes.status !== 'completed' ;
          });
       
         self.examColl1 = new user.CustExamDetailCollection1(filtercol);
        

         // self.examColl1 = new user.CustExamDetailCollection1(filtercol);
         // var filtercol = self.examColl1.filter(function (item) {
         //    return 

         //  });
         
         // self.examColl1 = new user.CustExamDetailCollection1(filtercol);
         user.allexamcollection = self.examColl1;
         self.examCart2();
        }
        if(self.examColl2.length > 0){
         self.examCart3();
        }
        

    });      

      $('#start_time').timepicker({ 'scrollDefault': 'now' });   
    return this;
},

examCart:function(item){


    var self = this;
    self.examcartcollection.each(function(item){
   
    var tpl1 = _.template($( '#custExamTemplate' ).html() );
    this.$el.find("#examsCustList").append(tpl1(item.attributes));
   },this);
},

examCart2:function(item){
  var self = this;
  
  self.examColl1.each(function(item){
    var tpl2 = _.template($( '#custExamTemplate1' ).html() );
    prom = item.attributes.promo_id;
    ordid = item.attributes.order_detail_id;
   user.UserAppRouter.data = item.attributes.id;
    this.$el.find("#examsCustList2").append(tpl2(item.attributes));
    $('.scheduleCustPage').bind('click', self.renderScheduleForm);
    $('.reScheduleCustPage').bind('click', self.renderReScheduleForm);
    
  },this);


},

examCart3:function(item){
  var self = this;
  self.examColl2.each(function(item){
    var tpl2 = _.template($( '#custExamTemplate2' ).html() );
    id = item.attributes.id;
    this.$el.find("#examsCustList3").append(tpl2(item.attributes));

    $('.result').bind('click', self.result);

  },this);


},

 renderScheduleForm:function(e){  
 var self = this;  


 id = $(e.target).attr('id');
 prodId = $(e.target).attr('prodId');
 odId = $(e.target).attr('odId');
 promoId = $(e.target).attr('promoId');
 

  if(promoId == ""){
    
   userRouter.navigate("scheduleForm/"+ id + "/" + prodId + "/" + odId + "/" + ordid + "/" + null , {trigger:true});
    }else{
      userRouter.navigate("scheduleForm/"+ id + "/" + prodId + "/" + odId + "/" + ordid + "/" + promoId , {trigger:true});
    }
  },
renderReScheduleForm:function(e){  
 var self = this;  

 id = $(e.target).attr('id');
 prodId = $(e.target).attr('prodId');
 odId = $(e.target).attr('odId');
 promoId = $(e.target).attr('promoId');
 time= $(e.target).attr('time');
 if(time != 0){
  
 } else {
    if(promoId == ""){
    
   userRouter.navigate("reScheduleForm/"+ id + "/" + prodId + "/" + odId + "/" + ordid + "/" + null , {trigger:true});
    }else{
      userRouter.navigate("reScheduleForm/"+ id + "/" + prodId + "/" + odId + "/" + ordid + "/" + promoId , {trigger:true});
    }
 }

    
  // userRouter.navigate("reScheduleForm/"+ id + "/" + prodId + "/" + odId + "/" + ordid , {trigger:true});

  },
examStartForm:function(e){


     var data ={};
     // $.ajax({
     //          url:"/eprayoga/user/no-attempt-sofar",
     //          type:'POST',
     //          contentType:'application/json',
     //          data:JSON.stringify(data),
     //          cache:false,
     //          success:function(){
     //          }
     //        });


   var self = this;  
  
   var id = $(e.target).attr('eid');
  
   var tmpvalue = self.examColl1.where({exam_schedule_id:parseInt(id)});
  
   if(tmpvalue[0].attributes.status == "notstarted"){
                         schedule=tmpvalue[0].attributes.is_schedule;
                         schdate=tmpvalue[0].attributes.exam_planned_date;
                         starttime=tmpvalue[0].attributes.start_time;
                         endtime=tmpvalue[0].attributes.end_time;
                
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
                         
                  if (date != schdate){
                          $('#messagepop').text("Please Schedule the Correct Date."); 
                          $('#myModalCust').modal('show');
                      
                   }
                    else if(timediff >= 300){
                          $('#messagepop').text("Please start the Exam on Schedule Time."); 
                          $('#myModalCust').modal('show');
                    }else{

                   if(tmpvalue[0].attributes.promo_id == null || tmpvalue[0].attributes.promo_id == 0){
                    tmpvalue[0].attributes.promo_id = 0;
                    tmpvalue[0].attributes.type = "direct";
                   }
                   else{
                    
                    tmpvalue[0].attributes.type = "promo";
                   }

                   
                    tmpvalue[0].attributes.examstatus = "start";
              
                    if(tmpvalue[0].attributes.client_id == null){
                    tmpvalue[0].attributes.client_id = 0;
                   }
                  
                   tmpvalue[0].attributes.mode = 0;
                   user.orderdetail = tmpvalue[0];

                   userRouter.navigate("startExam", {trigger:true});
           }
} else if(tmpvalue[0].attributes.status == "inprogress"){
                if(tmpvalue[0].attributes.promo_id == null || tmpvalue[0].attributes.promo_id == 0){
                tmpvalue[0].attributes.promo_id = 0;
                tmpvalue[0].attributes.type = "direct";
               }
               else{
                
                tmpvalue[0].attributes.type = "promo";
               }
               
                tmpvalue[0].attributes.examstatus = "restart";
               
                if(tmpvalue[0].attributes.client_id == null){
                tmpvalue[0].attributes.client_id = 0;
               }
              
               tmpvalue[0].attributes.mode = 0;
               user.orderdetail = tmpvalue[0];

               userRouter.navigate("startExam", {trigger:true});
}
},

promocode:function(){

 var self =this;
 userRouter.navigate("promocode", {trigger:true});
// $('#page-section').empty();
// $('#page-section').unbind();
//  var template = _.template($('#promo_code_search').html());
// $('#page-section').append(template);
// $('#search_promocode').bind('click',self.searchpromocode);



},

searchpromocode : function()
  {
    var self=this;

    var template = _.template($('#customExamlist').html());
    var template1 = _.template($('#customExamlist2').html());
    var search = $('#promoSearch').val();
    var data ={};
    if(search.length >=1 )
    {
     data.search = search;
    $.ajax({
      url: '/eprayoga/user/get_search_promocode',
      type: 'POST',
      contentType:'application/json',
      data:JSON.stringify(data),
      cache:false,
      success: function(data) {
       
        $('#page-section').empty();
        $('#page-section').unbind();
        if(data.message.length != 0){
        $('#page-section').append(template);
        $('#page-section').find('#customExamlist1').append(template1(data.message[0]));
        vid = data.message[0].id;
       
        $('#submit_promocode').on("click",function(e){
              $.ajax({
              url:"/eprayoga/user/allocate_promocode_exam",
              type:'POST',
              contentType:'application/json',
              data:JSON.stringify({vid}),
              cache:false,
              success:function(){
                 userRouter.navigate("examCatalog", {trigger:true});
              }
            });
              
            });
        
      }
        if(data.message.length == 0){
        $('#page-section').append('<center><h2>There is no promo code available for this Search.</h2></center>');
        }
        
      },
      error: function(data) {
          errorhandle(data);
               
      }
    });   
          
      }
      if(search.length == 0)
      {            
      $( "div.failure").html("Please enter Promo code");
       $( "div.failure" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 ); 
      }
  },



  result : function(e){

    $('#sticker').hide();
    var self =this;
    $('html,body').scrollTop(0);
    examScheduleID =  $(e.target).attr('id');
    $.ajax({
      url: '/eprayoga/user/get_exam_result',
      type: 'POST',
      contentType:'application/json',
      data:JSON.stringify(examScheduleID),
      cache:false,
      success: function(data) {
       
        userRouter.scoreCardData = data[0];      
        $('#page-section').empty();
        $('#page-section').unbind();
        var template = _.template($('#examScoreCard').html() );
        var template1 = _.template($('#popupscript').html() );

        $('#page-section').append(template(data[0])); 
        $('#page-section').append(template1); 
        //$('#mailOne').bind('click', self.mail); 
      $('#mailOne').on('click', function(e){
         
            $.ajax({
                url: '/eprayoga/user/sendingmail',
                type: 'POST',
                contentType:'application/json',
                data:JSON.stringify(userRouter.scoreCardData),
                cache:false,
                success: function(data) {
                   
                  var dat = data;
                  var sendmail = new admin.SendingMailModel();
                  sendmail.save({
                       data:{ email:dat},

                  },
                    { 
                          url: 'dummyurl',
                          protocol: 'ws',
                          operation: 'sendMail',
                          wait: true
                    });
                    $('#messagepop').text("You will get certificate soon"); 
                    $('#myModalCust').modal('show');
                          
                      
                },
                error: function(data) {
                  errorhandle(data);
                  
                }
            });
      }); 

      $('#backExam').on('click', function(e){
          
          Backbone.history.loadUrl(Backbone.history.fragment);
      });

      $('#ScoreIdOne').on('click', function(e){
            $.ajax({
              url: '/eprayoga/user/downscorecard',
              type: 'POST',
              contentType:'application/json',
              data:JSON.stringify(userRouter.scoreCardData),
              cache:false,
              success: function(data) {
                   
              var link = document.createElement('a');
              link.href = data;
              link.download = 'eprayoga.pdf';
              link.dispatchEvent(new MouseEvent('click'));
                    
              },
              error: function(data) {
                errorhandle(data);
                
              }
            });   
                }); 
                //$('#ScoreIdOne').bind('click', self.score);
              },
              error: function(data) {
               errorhandle(data);
                
              }
            });   
  },

  score : function(){
    
  },

  mail : function(){
   
      
  },


  backExam : function() {
   
  }
    
});
