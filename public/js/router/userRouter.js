// Router
var user = user || {};


user.UserAppRouter = Backbone.Router.extend({

    routes:{
        "":"examCatalog",
        "examCatalog" : "examCatalog",
        "productcatalog":"ProductCatalog",
        "examCart"  :"examCartView",
        "renderScheduleForm/:id/:prod_id" : "renderscheduleform",
        "renderReScheduleForm/:id/:prod_id" : "renderReScheduleform",
        "scheduleForm/:id/:prod_id/:odId/:ordid/:promoId" : "scheduleform",
        "reScheduleForm/:id/:prod_id/:odId/:ordid/:promoId" : "rescheduleform",
        "performaaPage" : "performaPage",
         
        "examStart"  : "renderExam",
        "startExam"  : "reRenderExam",

        "cartDetails1" : "cartDetails1",
        "performaPageCartUser" : "performaPageCartUser" ,
        "scorepage" : "renderingScorePage",
        "completed_exam"  : "renderComplitedExam",
        "resultPage" : "ResultPage",
        "promocode"  : "promocode"



    },

    initialize:function () {
    },              

    ProductCatalog:function(){
         console.log("inside routing:ProductCatalog");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new user.ProductCatalogPageView({el:$('#page-section')}); 
    },

     examCartView:function(){


         console.log("inside routing:examCartView");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new user.OrderDetailPageView({el:$('#page-section')}); 


    },

    renderscheduleform: function(id, prod_id){


        console.log("inside routing:examCartView");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new user.ScheduleFormPage({
              el:$('#page-section'),
              template:  _.template( $( '#scheduleFormPage' ).html() ),
              mode: 'schedule',
              id:id,
              prod_id:prod_id

          }); 

    },

    renderReScheduleform: function(id, prod_id){

        console.log("inside routing:renderReScheduleform");

       if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new user.ScheduleFormPage({
              el:$('#page-section'),
              template:  _.template( $( '#rescheduleFormPage' ).html() ),
              mode: 'reschedule',
              exam_schedule_id:id,
              prod_id:prod_id

          }); 

    },
    scheduleform: function(id, prod_id,odId,ordid,promoId){


        console.log("inside routing:scheduleform");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new user.ScheduleCustomerFormPage({
              el:$('#page-section'),
              template:  _.template( $( '#scheduleFormPage' ).html() ),
              mode: 'schedule',
              id:id,
              prod_id:prod_id,
              odId:odId,
              ordid:ordid,
              promoId:promoId
          }); 

    },

    rescheduleform: function(id, prod_id,odId,ordid,promoId){

        console.log("inside routing:rescheduleform");

       if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new user.ScheduleCustomerFormPage({
              el:$('#page-section'),
              template:  _.template( $( '#rescheduleFormPage' ).html() ),
              mode: 'reschedule',
              exam_schedule_id:id,
              prod_id:prod_id,
              odId:odId,
              ordid:ordid,
              promoId:promoId

          }); 

    },

    performaPage : function(){
        console.log("inside routing:performaPage");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }

        this.currentView = new user.PerformaPageView({
            el:$('#page-section'),
            template: _.template( $( '#performaPageTpl' ).html() )
        }); 

    },

    cartDetails1 : function(){
        console.log("inside routing:performaPage");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }

        this.currentView = new user.CartDetailsPageView({
            el:$('#page-section')
            
        }); 

    },

    performaPageCartUser : function(){
      console.log("inside routing:performaPage");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }

        this.currentView = new user.PerformaPageCartView({
            el:$('#page-section'),
            template: _.template( $( '#performaPageCartTpl' ).html() )
        }); 

    },

    renderExam:function(){

        console.log("inside routing:ExamForm");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new user.UserRenderingQuestionTableView({el:$('#page-section'),
                    template: _.template( $( '#renderingQuestionTmpl' ).html() ),
                    });
    },
    reRenderExam:function(){

        console.log("inside routing:ExamFormone");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new user.UserRenderingQuestionTableView({el:$('#page-section'),
                    template: _.template( $( '#renderingQuestionTmpl' ).html() ),
                    });
    },

    examCatalog : function(){
      console.log("inside routing:ProductCatalog");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new user.CustExamCatalogPageView({el:$('#page-section')});
    },
    renderComplitedExam:function(){

        console.log("inside routing:ExamFormone");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new user.ComplitedExamView({el:$('#page-section'),
                    template: _.template( $( '#completedTemplate' ).html() ),
                    });
    },
    ResultPage:function(){
       console.log("inside routing:ExamFormone");
       if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new user.UserConfirmationPageView({el:$('#page-section'),
                    template: _.template( $( '#ResultTemplate' ).html() ),
                    });
    },

    promocode : function(){
      console.log("inside routing:ExamFormone");
       if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new user.PromoCodePageView({el:$('#page-section'),
                    template: _.template( $( '#promo_code_search' ).html() ),
         });
    }

     
  
});

