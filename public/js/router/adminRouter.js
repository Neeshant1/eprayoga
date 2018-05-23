// Router
var admin = admin || {};

admin.AdminAppRouter = Backbone.Router.extend({

    routes:{
        "shoptmpl" : "shoppage",
        "faqlist" :"faqList",
        "signup" : "Signup",
        "indexlogin" : "indexLogin",
        "renderFaqCreateForm" : "faqCreateForm",
        "renderFaqEditForm/:id" : "faqEditForm" ,
        "faqcategorylist"       :"faqCategoryList",
        "renderFaqCategoryCreateForm" : "faqCategoryCreateForm",
        "renderFaqCategoryEditForm/:id" : "faqCategoryEditForm",
        "currencypage"       :"currencyPage",
        "renderCurrencyCreateForm" :"currencyCreateForm",
        "renderCurrencyEditForm/:id" : "currencyEditForm",
        "zonepage"  :"zonePage",
        "renderZoneCreateForm" : "zoneCreateForm",
        "renderZoneEditForm/:id" : "zoneEditForm",
        "securityquestionpage" : "securityQuestionPage",
        "renderSecurityQuestionCreateForm" : "securityQuestionCreateForm",
        "renderSecurityQuestionEditForm/:id" : "securityQuestionEditForm",
         "instructionpage" :"instructionPage",
         "renderInstructionCreateForm" :"instructionCreateForm",
         "renderInstructionEditForm/:id" : "instructionEditForm",
         "questiontypepage" :"questionTypePage",
         "renderQuestionTypeCreateForm" :"questionTypeCreateForm",
         "renderQuestionTypeEditForm/:id" : "questionTypeEditForm",
         "complexityquestionpage" :"complexityQuestionForm",
         "renderComplexityQuestionCreateForm" : "complexityQuestionCreateForm",
         "renderComplexityQuestionEditForm/:id" : "complexityQuestionEditForm",
         "usertypepage" : "userTypePage",
         "renderUserTypeCreateForm" :"userTypeCreateForm",
         "renderUserTypeEditForm/:id" : "userTypeEditForm",
         "subjectpage" :"subjectPage",
         "renderSubjectCreateForm" : "subjectCreateForm",
         "renderSubjectEditForm/:id" : "subjectEditForm",
         "topicpage" : "topicPage",
         "renderTopicCreateForm": "topicCreateForm",
        "renderTopicEditForm/:id" : "topicEditForm",
         "categorypage" : "categoryPage",
         "renderCategoryCreateForm" : "categoryCreateForm",
         "renderCategoryEditForm/:id" : "categoryEditForm",
         "awslist" :"awslist",
        "renderAwsCreateForm" : "awsCreateForm",
        "renderAwsEditForm/:id" : "awsEditForm",
        "emaillist" :"emaillist",
        "renderEmailCreateForm" : "emailCreateForm",
        "renderEmailEditForm/:id" : "emailEditForm",
        "smslist" :"smslist",
        "renderSmsCreateForm" : "smsCreateForm",
        "renderSmsEditForm/:id" : "smsEditForm",
        "citylist" :"cityList",
        "renderCityCreateForm" : "cityCreateForm",
        "renderCityEditForm/:id" : "cityEditForm",
        "statelist" :"statelist",
        "renderStateCreateForm" : "stateCreateForm",
        "renderStateEditForm/:id" : "stateEditForm",
        "countrylist" :"countrylist",
        "renderCountryCreateForm" : "countryCreateForm",
        "renderCountryEditForm/:id" : "countryEditForm",

        "customermanagement" : "customerManagement",

        "renderCustomerRegisterForm" : "customerRegistrationForm",

        "customerRegistrationEditForm/:id":"customerRegistrationEditForm",
        "adddresstype" : "addressTypeList",
        "renderAddressTypeCreateForm" : "addressTypeCreateForm",
        "renderAddressTypeEditForm/:id" :"addressTypeEditForm",
        "schedule" : "schedule",
        "scheduleForm" : "scheduleForm",
        "renderScheduleEditForm/:id" :"renderScheduleEditForm",
        "clientList"     : "clientList",
        "renderClientCreateForm" : "clientCreateForm",
        "renderClientEditForm/:id" :"clientEditForm",


           "departmentlist" : "departmentList",
        "renderDepartmentCreateForm" : "departmentCreateForm",
        "renderDepartmentEditForm/:id" :"departmentEditForm",

        "clienttypelist":"clienttypeList",
         "renderClienttypeCreateForm" : "clientTypeCreateForm",
        "renderClienttypeEditForm/:id" :"clientTypeEditForm",

        "originlist" : "originList",
        "renderOriginCreateForm" : "originCreateForm",
        "renderOriginEditForm/:id" : "originEditForm",
        "clientGroupList": "clientGroupList",
        "renderClientGroupCreateForm": "clientGroupCreateForm",
        "renderClientGroupEditForm/:id" :"clientGroupEditForm",
        "useraccessList":"useraccessList",
        "renderUserAccessCreateForm":"userAccessCreateForm",
        "renderUserAccessEditForm/:id":"userAccessEditForm",
        "employeeList": "employeeList",
        "renderEmployeeCreateForm": "employeeCreateForm",
        "renderEmployeeEditForm/:id" :"employeeEditForm",
        "filetypelist":"filetypelist",
         "renderfiletypeCreateForm" : "renderfiletypeCreateForm",
        "renderfiletypeEditForm/:id" :"renderfiletypeEditForm",

        //Question Bank
        "questionList":"questionList",
        "renderCreateQuestionForm" : "createQuestionForm",
        "renderEditQuestionForm/:id" : "editQuestionForm",
        "languageList" : "languageList",
        "renderLanguageCreateForm" : "renderLanguageCreateForm",
        "renderLanguageEditForm/:id": "renderLanguageEditForm",
        "renderExam": "ExamForm",
         "pricingList" : "pricingList",

        "renderPricingCreateForm" : "renderPricingCreateForm",
        "renderPricingEditForm/:id": "renderPricingEditForm",

        "genpList" : "genpList",
        "renderGenpCreateForm" : "renderGenpCreateForm",
        "renderGenpEditForm/:id": "renderGenpEditForm",
        "renderExam": "ExamForm" ,

        "renderingQuestion" : "renderingQuestionPage",

        // "productcatalog" : "ProductCatalog",
        "productcatalogList":"productcatalogList",
        "renderProducCatelogCreateForm" : "renderproductcatalogCreateForm",
        "renderproductcatalogEditForm/:id" :"renderproductcatalogEditForm",
        // exam design 
        "examDesignList":"examDesignlist",
        "renderExamDesignCreateForm" : "ExamDesignCreateForm",
        "renderExamDesignEditForm/:id" :"ExamDesignEditForm",
        "promoCodeApply"  : "promoCodeApplyToEmployee",
        "buyExams"  : "buyExams",
        "performaPage" : "performaPage",
        "cartDetails" : "cartDetails",
        "performaPageCart" : "performaPageCart",
        "reportDetails" : "reportDetails",
        "reportSubjectDetails" : "reportSubjectDetails",
        "reportTopicDetails"   : "reportTopicDetails",
        "reportExamListDetails" : "reportExamListDetails",
        "reportSalesSummaryDetails" : "reportSalesSummaryDetails",
        "reportExamSummaryDetails" : "reportExamSummaryDetails",
        "reportExamCustSummaryDetails" : "reportExamCustSummaryDetails",
        "reportPerformanceSummaryDetails" : "reportPerformanceSummaryDetails"

    },

    initialize: function () {

    },		

    shoppage: function(){
            console.log("inside routing:shoppage");

         
        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        // this.currentView = new admin.UserListView({el: $( '#user-list-table' )});
        this.currentView = new admin.ShoppingPageView({el: $( '#page-section' )
              // template: _.template($( '#shotcartTmpl' ).html() )
         });
         
    },	    

    faqList: function () {
    	console.log("inside routing:fqlist");
        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        // this.currentView = new admin.UserListView({el: $( '#user-list-table' )});
        this.currentView = new admin.FaqPageView({el: $( '#page-section' )});
    },

    faqCreateForm:function(){

        console.log("inside routing:renderFaqCreateForm");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.FaqFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#faqCreateTpl' ).html() ),
            mode: 'create'
        });
    },

    faqEditForm:function(id){

        console.log("inside routing:renderFaqCreateForm");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.FaqFormPageView({
                el: $( '#page-section' ),
                template: _.template( $( '#faqEditFormTpl' ).html() ),
                mode: 'edit',
                id: id
        });
    },

    faqCategoryList:function(){
         console.log("inside routing:faq category list");

            if (this.currentView) {
                        console.log('currentView exist');
                        this.currentView.$el.empty();
                        this.currentView.$el.unbind();
              }
            this.currentView = new admin.FaqCategoryPageView({el: $( '#page-section' )});
    },

    faqCategoryCreateForm:function(){
           
         console.log("inside routing:renderFaqCategoryCreateForm");
         if (this.currentView) {
                    console.log('currentView exist');
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
          }

          this.currentView = new admin.FaqCategoryFormPageView({
                el: $( '#page-section' ),
                template: _.template( $( '#faqCategoryCreateFormTpl' ).html() ),
                mode: 'create'
        });     
    },

    faqCategoryEditForm:function(id){
           
         console.log("inside routing:renderFaqCategoryCreateForm");

          if (this.currentView) {
                    console.log('currentView exist');
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
          }

          this.currentView = new admin.FaqCategoryFormPageView({
                    el: $( '#page-section' ),
                    template: _.template( $( '#faqCategoryEditFormTpl' ).html() ),
                    mode: 'edit',
                    id: id
            });    
    },


    currencyPage:function(){
         
         console.log("inside routing:currencypage");
            if (this.currentView) {
                    console.log('currentView exist');
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
            }

          this.currentView = new admin.CurrencyPageView({el: $( '#page-section' )});

    },

    currencyCreateForm:function(){

         console.log("inside routing:renderCurrencyCreateForm");

           if (this.currentView) {
                    console.log('currentView exist');
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
            }

            this.currentView = new admin.CurrencyFormPageView({
                el: $( '#page-section' ),
                template: _.template( $( '#currencyCreateFormTpl' ).html() ),
                mode: 'create'
            });  
    },

    currencyEditForm:function(id){
           
         console.log("inside routing:renderCurrencyEditForm");
                 if (this.currentView) {
                    console.log('currentView exist');
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
                }

                this.currentView = new admin.CurrencyFormPageView({
                        el: $( '#page-section' ),
                        template: _.template( $( '#currencyEditFormTpl' ).html() ),
                        mode: 'edit',
                        id: id
                }); 
    },

    zonePage:function(){
         
         console.log("inside routing:zonepage");

          if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.ZonePageView({el: $( '#page-section' )});
   
    },

    zoneCreateForm:function(){
         console.log("inside routing:renderZoneCreateForm");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.ZoneFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#zoneCreateFormTpl' ).html() ),
            mode: 'create'
        });

    },

    zoneEditForm:function(id){
           
         console.log("inside routing:renderzoneEditForm");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
     this.currentView = new admin.ZoneFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#zoneEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });

    },

   securityQuestionPage:function(){
         
         console.log("inside routing:securityQuestionPage");
        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        // this.currentView = new admin.UserListView({el: $( '#user-list-table' )});
        this.currentView = new admin.SecurityQuestionPageView({el: $( '#page-section' )});

    },

    securityQuestionCreateForm:function(){
         console.log("inside routing:rendersecurity questionCreateForm");
          if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }

          this.currentView = new admin.SecurityQuestionFormPageView({
                el: $( '#page-section' ),
                template: _.template( $( '#securityQuestioncreateFormTpl' ).html() ),
                mode: 'create'
           });
   
    },


    securityQuestionEditForm:function(id){
           
    console.log("inside routing:renderzoneEditForm");
       if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }

        this.currentView = new admin.SecurityQuestionFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#securityQuestionEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });

    },

    instructionPage:function(){
         
        console.log("inside routing:instructionpage");
         if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.InstructionPageView({el: $( '#page-section' )});
  
    },

    instructionCreateForm:function(){

        console.log("inside routing:renderinstructionCreateForm");

         if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }

        this.currentView = new admin.InstructionFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#instructionCreateFormTpl' ).html() ),
            mode: 'create'
         });
    },

     instructionEditForm:function(id){
           
         console.log("inside routing:renderinstructionEditForm");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.InstructionFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#instructionEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });

    },


    questionTypePage:function(){

             console.log("inside routing:question type page view");
        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        // this.currentView = new admin.UserListView({el: $( '#user-list-table' )});
        this.currentView = new admin.QuestionTypePageView({el: $( '#page-section' )});

    },

    questionTypeCreateForm:function(){
        console.log("inside routing:questionTypeCreateForm");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.QuestionTypeFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#questionTypeCreateFormTpl' ).html() ),
            mode: 'create'
        });
    },

    questionTypeEditForm:function(id){
           
         console.log("inside routing:renderQuestion typeEditForm");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.QuestionTypeFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#questionTypeEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });

    },

    complexityQuestionForm:function(){

             console.log("inside routing:complexity question  page view");

            if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
           }

        this.currentView = new admin.ComplexityQuestionPageView({el: $( '#page-section' )});

    },

    complexityQuestionCreateForm:function(){
        console.log("inside routing:Complexity QuestionCreateForm");
         if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
           }

        this.currentView = new admin.ComplexityQuestionFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#complexityQuestionCreateFormTpl' ).html() ), 
            mode: 'create'
        });
    },

    complexityQuestionEditForm:function(id){
           
         console.log("inside routing:renderComplexityQuestionEditForm");
          if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
           }
            this.currentView = new admin.ComplexityQuestionFormPageView({
                    el: $( '#page-section' ),
                    template: _.template( $( '#complexityQuestionEditFormTpl' ).html() ),
                    mode: 'edit',
                    id: id
             });
     },

    

    userTypePage:function(){

             console.log("inside routing:user type  page view");
        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        // this.currentView = new admin.UserListView({el: $( '#user-list-table' )});
        this.currentView = new admin.UserTypePageView({el: $( '#page-section' )});

    },

    userTypeCreateForm:function(){
        console.log("inside routing:user type form page");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.UserTypeFormPageView({
            el: $( '#page-section' ),
            template: _.template( $('#userTypeCreateFormTpl').html() ),
            mode: 'create'
           
        });
    },

    userTypeEditForm:function(id){
           
         console.log("inside routing:renderUserTypenEditForm");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.UserTypeFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#userTypeEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });

    },

    subjectPage:function(){

          console.log("inside routing:subject question  page view");
            if (this.currentView) {
                console.log('currentView exist');
                this.currentView.$el.empty();
                this.currentView.$el.unbind();
            }
            this.currentView = new admin.SubjectPageView({el: $( '#page-section' )});
    },

    subjectCreateForm:function(){
            console.log("inside routing:subject  create form page");
            if (this.currentView) {
                this.currentView.$el.empty();
                this.currentView.$el.unbind();
            }
            this.currentView = new admin.SubjectFormPageView({
                el: $( '#page-section' ),
                template: _.template( $('#subjectCreateFormTpl').html() ),
                mode: 'create'
            });
    },

    subjectEditForm:function(id){
           
            console.log("inside routing:    render subject Edit Form");

             if (this.currentView) {
                        this.currentView.$el.empty();
                        this.currentView.$el.unbind();
                }
            this.currentView = new admin.SubjectFormPageView({
                    el: $( '#page-section' ),
                    template: _.template( $( '#subjectEditFormTpl' ).html() ),
                    mode: 'edit',
                    id: id
            });

    },

    topicPage:function(){

      console.log("inside routing:topic page view");

            if (this.currentView) {
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
            }
        this.currentView = new admin.TopicPageView({el: $( '#page-section' )});
    
    },

    topicCreateForm:function(){
        console.log("inside routing:topic  create form page");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.TopicFormPageView({
            el: $( '#page-section' ),
            template: _.template( $('#topicCreateFormTpl').html() ),
            mode: 'create'
        });
    },

    topicEditForm:function(id){
           
         console.log("inside routing:    render topic Edit Form");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.TopicFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#topicEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });

    },


    countrylist: function () {
        console.log("inside routing:countrylist");

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.CountryPageView({el: $( '#page-section' )}); 
    },


    countryCreateForm:function(){

        console.log("inside routing:countryCreateForm");
                if (this.currentView) {
                        console.log('currentView exist');
                        this.currentView.$el.empty();
                        this.currentView.$el.unbind();
                }

                this.currentView = new admin.CountryFormPageView({
                    el: $( '#page-section' ),
                    template: _.template( $( '#countryCreateTpl' ).html() ),
                    mode: 'create'
                });
    }, 

    countryEditForm:function(id){

        console.log("inside routing:countryEditForm"); 
         if (this.currentView) {
                        console.log('currentView exist');
                        this.currentView.$el.empty();
                        this.currentView.$el.unbind();
        }
        this.currentView = new admin.CountryFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#countryEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });
    },  

    statelist: function () {
        console.log("inside routing:statelist");

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.StatePageView({el: $( '#page-section' )});
    },



    stateCreateForm:function(){

        console.log("inside routing:stateCreateForm");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.StateFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#stateCreateTpl' ).html() ),
             mode: 'create'

         });
    },

    stateEditForm:function(id){

        console.log("inside routing:stateEditForm");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.StateFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#stateEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
           });

    },  

     cityList: function () {
        console.log("inside routing:cityList");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }

         this.currentView = new admin.CityPageView({el: $( '#page-section' )});
    },

    cityCreateForm:function(){

        console.log("inside routing:cityCreateForm");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }

        this.currentView = new admin.CityFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#cityCreateTpl' ).html() ),
            mode: 'create'
         });
    },

    cityEditForm:function(id){

                console.log("inside routing:cityEditForm");

                if (this.currentView) {
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
                }
                this.currentView = new admin.CityFormPageView({
                    el: $( '#page-section' ),
                    template: _.template( $( '#cityEditFormTpl' ).html() ),
                    mode: 'edit',
                    id: id
                });

    },

    categoryPage:function(){

            console.log("inside routing:category page view");
            if (this.currentView) {
                console.log('currentView exist');
                this.currentView.$el.empty();
                this.currentView.$el.unbind();
            }
            this.currentView = new admin.CategoryPageView({el: $( '#page-section' )});
      },

    indexLogin:function(){

            console.log("inside routing:index login page view");
            if (this.currentView) {
                console.log('currentView exist');
                this.currentView.$el.empty();
                this.currentView.$el.unbind();
            }
            this.currentView = new admin.IndexPageView({el: $( '#page-section' )});
      },
    
   Signup:function(){
              console.log("inside routing:  customer registration form");

                if (this.currentView) {
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
                }
                this.currentView = new admin.SignUpPageView({el: $( '#page-section' )}); 
  
        }, 

    categoryCreateForm:function(){
        console.log("inside routing:category  create form page");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }

        this.currentView = new admin.CategoryFormPageView({
            el: $( '#page-section' ),
            template: _.template( $('#categoryCreateFormTpl').html() ),
            mode: 'create'
        });

    },

    categoryEditForm:function(id){
           
         console.log("inside routing:render category Edit Form");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }

        this.currentView = new admin.CategoryFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#categoryEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });

    },

     awslist: function () {
        console.log("inside routing:awslist");

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new admin.AwsPageView({el: $( '#page-section' )});

     },


    awsCreateForm:function(){

        console.log("inside routing:renderAwsCreateForm");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }

         this.currentView = new admin.AwsFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#awsCreateTpl' ).html() ),
            mode: 'create'
        });
    },

    awsEditForm:function(id){

        console.log("inside routing:renderawsEditForm");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }

        this.currentView = new admin.AwsFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#awsEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });
    },

     emaillist: function () {
        console.log("inside routing:emaillist");

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }

         this.currentView = new admin.EmailPageView({el: $( '#page-section' )});
    },

    emailCreateForm:function(){

        console.log("inside routing:renderemailCreateForm");

                if (this.currentView) {
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
                }
                this.currentView = new admin.EmailFormPageView({
                    el: $( '#page-section' ),
                    template: _.template( $( '#emailCreateTpl' ).html() ),
                    mode: 'create'
                });

        },


    emailEditForm:function(id){

        console.log("inside routing:renderemailEditForm");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.EmailFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#emailEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });

    },

    smslist: function () {
        console.log("inside routing:smslist");

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.SmsPageView({el: $( '#page-section' )});
        // this.currentView = new admin.UserListView({el: $( '#user-list-table' )});
    },

    smsCreateForm:function(){

        console.log("inside routing:smsCreateForm");

            if (this.currentView) {
                        this.currentView.$el.empty();
                        this.currentView.$el.unbind();
              }
           this.currentView = new admin.SmsFormPageView({
                el: $( '#page-section' ),
                template: _.template( $( '#smsCreateTpl' ).html() ),
                mode: 'create'
                });
    },

    smsEditForm:function(id){

        console.log("inside routing:smsEditForm");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new admin.SmsFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#smsEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });
    },

    customerManagement:function(){

        console.log("inside routing:customer management");

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.CustomerPageView({el: $( '#page-section' )});

    },

    customerRegistrationForm:function(){
              console.log("inside routing:  customer registration form");

                if (this.currentView) {
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
                } 
                  

                 this.currentView = new admin.CustomerRegistrationFormPageView({

                     el: $( '#page-section' ),
                     template: _.template( $( '#customerRegistrationFormTpl' ).html() ),
                     mode: 'create'
                 });
                 initializeTabMenu();
                 
        }, 

    customerRegistrationEditForm:function(id){

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new admin.CustomerRegistrationFormPageView({

            el: $( '#page-section' ),
            template: _.template( $( '#customerRegistrationEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });
         initializeTabMenu(); 
    },

    addressTypeList:function(){

          console.log("inside routing:addre type management");

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.AddressTypePageView({el: $( '#page-section' )});

    },

    addressTypeCreateForm:function(){

         console.log("inside routing:  Address Type Create form");

                if (this.currentView) {
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
                } 

                 this.currentView = new admin.AddressTypeFormPageView({

                     el: $( '#page-section' ),
                     template: _.template( $( '#addressTypeCreateFormTpl' ).html() ),
                     mode: 'create'
                 });
    },

    addressTypeEditForm:function(id){
              
         console.log("inside routing:Address Type Edit Form");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new admin.AddressTypeFormPageView({

            el: $( '#page-section' ),
            template: _.template( $( '#addressTypeEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });
    },

    schedule:function(){

          console.log("inside routing:schedule management");

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.SchedulePageView({el: $( '#page-section' )});

    },

    scheduleForm:function(){

        console.log("inside routing: scheduleForm");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        } 

         this.currentView = new admin.ScheduleFormPageView({

             el: $( '#page-section' ),
             template: _.template( $( '#createScheduleTpl' ).html() ),
             mode: 'create'
         });
    },
    
    renderScheduleEditForm:function(id){
              
        console.log("inside routing:renderScheduleEditForm");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new admin.ScheduleFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#editScheduleTpl' ).html() ),
            mode: 'edit',
            id: id
        });
    },

    clientList: function(){
        console.log("inside routing:client management");

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.ClientPageView({el: $( '#page-section' )});
    },

    clientCreateForm: function(){
        console.log("inside routing: clientCreateForm");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        } 

         this.currentView = new admin.ClientFormPageView({

             el: $( '#page-section' ),
             template: _.template( $( '#createClientTpl' ).html() ),
             mode: 'create'
         });
         initializeTabMenu(); 
    },

    clientEditForm:function(id){
              
        console.log("inside routing:clientEditForm");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new admin.ClientFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#editClientTpl' ).html() ),
            mode: 'edit',
            id: id
        });

        initializeTabMenu();
    },

    departmentList:function(){

          console.log("inside routing:department management");
           if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
                this.currentView = new admin.DepartmentPageView({el: $( '#page-section' )});

    },

  departmentCreateForm:function(){

         console.log("inside routing:  DepartmentCreate form");

                if (this.currentView) {
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
                } 

                 this.currentView = new admin.DepartmentFormPageView({

                     el: $( '#page-section' ),
                     template: _.template( $( '#departmentCreateFormTpl' ).html() ),
                     mode: 'create'
                 });
    },

    departmentEditForm:function(id){
              
         console.log("inside routing:Department Edit Form");

           if (this.currentView) {
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
                } 

     this.currentView = new admin.DepartmentFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#departmentEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });
   

   },

    clienttypeList:function(){

          console.log("inside routing:department management");


        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.ClientTypePageView({el: $( '#page-section' )});

    },
    clientTypeCreateForm:function(){

         console.log("inside routing:  ClientType Create form");

                if (this.currentView) {
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
                } 

                 this.currentView = new admin.ClientTypeFormPageView({

                     el: $( '#page-section' ),
                     template: _.template( $( '#clientTypeCreateFormTpl' ).html() ),
                     mode: 'create'
                 });
    },

    clientTypeEditForm:function(id){
              
         console.log("inside routing:ClientType Edit Form");

           if (this.currentView) {
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
                } 

     this.currentView = new admin.ClientTypeFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#clientTypeEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });
   

   },

    originList: function () {
        console.log("inside routing:origin list");
            if (this.currentView) {
                this.currentView.$el.empty();
                this.currentView.$el.unbind();
          }


          this.currentView = new admin.OriginPageView({el: $( '#page-section' )});
    },

    originCreateForm:function(){

        console.log("inside routing:originCreateForm");

            if (this.currentView) {
                        this.currentView.$el.empty();
                        this.currentView.$el.unbind();
              }
           this.currentView = new admin.OriginFormPageView({
                el: $( '#page-section' ),
                template: _.template( $( '#OriginCreateFormTpl' ).html() ),
                mode: 'create'
                });
    },

    originEditForm:function(id){

         console.log("inside routing:Origin EditForm");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new admin.OriginFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#OriginEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });    

    },

    clientGroupList: function(){
        console.log("inside routing:clientGroupList");
            if (this.currentView) {
                this.currentView.$el.empty();
                this.currentView.$el.unbind();
          }


        this.currentView = new admin.ClientGroupPageView({el: $( '#page-section' )});
    },

    clientGroupCreateForm: function(){
        console.log("inside routing: clientGroupCreateForm");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        } 

         this.currentView = new admin.ClientGroupFormPageView({

             el: $( '#page-section' ),
             template: _.template( $( '#createClientGroupTpl' ).html() ),
             mode: 'create'
         });
         initializeTabMenu(); 
    },

    clientGroupEditForm:function(id){
              
        console.log("inside routing:clientGroupEditForm");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new admin.ClientGroupFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#editClientGroupTpl' ).html() ),
            mode: 'edit',
            id: id
        });

        initializeTabMenu();
    },

    // useraccessList:function () {
    //     console.log("inside routing:useraccesslist");
    //         if (this.currentView) {
    //             this.currentView.$el.empty();
    //             this.currentView.$el.unbind();
    //       }

    //       this.currentView = new admin.UserAccessPageView({el: $( '#page-section' )});
    // },
    // userAccessCreateForm:function() {
    //      console.log("inside routing:userAccessCreateForm");

    //         if (this.currentView) {
    //                     this.currentView.$el.empty();
    //                     this.currentView.$el.unbind();
    //           }
    //        this.currentView = new admin.UserAccessFormPageView({
    //             el: $( '#page-section' ),
    //             template: _.template( $( '#userAccessCreateFormTpl' ).html() ),
    //             mode: 'create'
    //             });

    // },

    // userAccessEditForm:function(id){
              
    //     console.log("inside routing:userAccessEditForm");

    //     if (this.currentView) {
    //         this.currentView.$el.empty();
    //         this.currentView.$el.unbind();
    //     }
    //      this.currentView = new admin.UserAccessFormPageView({
    //         el: $( '#page-section' ),
    //         template: _.template( $( '#userAccessEditFormTpl' ).html() ),
    //         mode: 'edit',
    //         id: id
    //     });
    // },

    employeeList: function(){
        console.log("inside routing:employeeList");
            if (this.currentView) {
                this.currentView.$el.empty();
                this.currentView.$el.unbind();
          }


        this.currentView = new admin.EmployeePageView({el: $( '#page-section' )});
    },

    employeeCreateForm: function(){
         if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        } 

         this.currentView = new admin.EmployeeFormPageView({

             el: $( '#page-section' ),
             template: _.template( $( '#createEmployeeTpl' ).html() ),
             mode: 'create'
         });
         initializeTabMenu(); 
    },

    employeeEditForm:function(id){
              
        console.log("inside routing:employeeEditForm");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new admin.EmployeeFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#editEmployeeTpl' ).html() ),
            mode: 'edit',
            id: id
        });

        initializeTabMenu();
    },
 
    filetypelist:function(){

          console.log("inside routing:file type  management");
          if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
 
        this.currentView = new admin.FileTypePageView({el: $( '#page-section' )});
    },


     questionList: function () {
        console.log("inside routing >>---> question bank");
 

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
 
        this.currentView = new admin.QuestionPageView({el: $( '#page-section' )}); 
    },
    renderfiletypeCreateForm:function(){

         console.log("inside routing:  ClientType Create form");

                if (this.currentView) {
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
                } 

                 this.currentView = new admin.FileTypeFormPageView({

                     el: $( '#page-section' ),
                     template: _.template( $( '#filetypeCreateFormTpl' ).html() ),
                     mode: 'create'
                 });
    },

    renderfiletypeEditForm:function(id){
              
         console.log("inside routing:ClientType Edit Form");

           if (this.currentView) {
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
                } 

     this.currentView = new admin.FileTypeFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#filetypeEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });
   

        
    },

    createQuestionForm:function(){
        console.log("inside routing :: Create Question Form");
            if (this.currentView) {
                        this.currentView.$el.empty();
                        this.currentView.$el.unbind();
              }
           this.currentView = new admin.QuestionFormPageView({
                el: $( '#page-section' ),
                template: _.template( $( '#createQuestionTpl' ).html() ),
                mode: 'create'
                });
           
          initializeTabMenu();
    },

    editQuestionForm:function(id){
        console.log("inside routing:editQuestionTpl");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.QuestionFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#editQuestionTpl' ).html() ),
            mode: 'edit',
            id: id
        });

        initializeTabMenu();
    },

     languageList: function(){
        console.log("inside routing:languageList");
            if (this.currentView) {
                this.currentView.$el.empty();
                this.currentView.$el.unbind();
          }


        this.currentView = new admin.LanguagePageView({el: $( '#page-section' )});
    },

    renderLanguageCreateForm: function(){
         if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        } 

         this.currentView = new admin.LanguageFormPageView({

             el: $( '#page-section' ),
             template: _.template( $( '#languageCreateFormTpl' ).html() ),
             mode: 'create'
         });
    },

    renderLanguageEditForm:function(id){
              
        console.log("inside routing:employeeEditForm");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new admin.LanguageFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#languageEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });

    },
 
    pricingList: function(){
        console.log("inside routing:languageList");

            if (this.currentView) {
                this.currentView.$el.empty();
                this.currentView.$el.unbind();
            }
             this.currentView = new admin.PricingPageView({el: $( '#page-section' )});
    },

   genpList: function(){
        console.log("inside routing:genpList");
 
            if (this.currentView) {
                this.currentView.$el.empty();
                this.currentView.$el.unbind();
          }

        this.currentView = new admin.GenpPageView({el: $( '#page-section' )});    
    },

    renderGenpCreateForm:  function(){


         if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind(); 
        } 
          this.currentView = new admin.GenpFormPageView({
             el: $( '#page-section' ),
            template: _.template( $( '#genpCreateFormTpl' ).html() ),
             mode: 'create'
         });

    },
     renderGenpEditForm:function(id){
              
        console.log("inside routing:employeeEditForm");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new admin.GenpFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#genpEditFormTpl' ).html() ), 
            mode: 'edit',
            id: id
        });

    },

    ExamForm:function(id){
        
        console.log("inside routing:ExamForm");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new admin.ExammainView({el:$('#page-section')});

 },

    renderPricingCreateForm: function(){
 
         if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        } 

 
         this.currentView = new admin.PricingFormPageView({

             el: $( '#page-section' ),
             template: _.template( $( '#pricingCreateFormTpl' ).html() ),
              mode: 'create'
         });
    },

    renderPricingEditForm:function(id){
              
        console.log("inside routing:renderPricingEditForm");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }

    
        this.currentView = new admin.PricingFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#pricingEditFormTpl' ).html() ),
            mode: 'edit',
            id: id
        });
    },

    ExamForm:function(id){
        
        console.log("inside routing:ExamForm");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new admin.ExammainView({el:$('#page-section')});

    },

    renderingQuestionPage:function(){

        console.log("inside routing:ExamForm");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new admin.RenderingQuestionTableView({el:$('#page-section'),
                    template: _.template( $( '#renderingQuestionTmpl' ).html() ),
                    });

    },  

    // ProductCatalog: function(){
    //      console.log("inside routing:ProductCatalog");
    //     if (this.currentView) {
    //         this.currentView.$el.empty();
    //         this.currentView.$el.unbind();
    //     }
    //      this.currentView = new admin.ProductCatalogPageView({el:$('#page-section')});


    // },
    productcatalogList:function(){

          console.log("inside routing:product catalog  management");
          if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
 
        this.currentView = new admin.ProductCatalogMasterPageView({el: $( '#page-section' )});
    },

    renderproductcatalogCreateForm:function(){

         console.log("inside routing:  ProductCatalog Create form");

                if (this.currentView) {
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
                } 

                 this.currentView = new admin.ProductCatalogFormPageView({

                     el: $( '#page-section' ),
                     template: _.template( $( '#productcatalogCreateFormTpl' ).html() ),
                     mode: 'create'
                 });
    },

    renderproductcatalogEditForm:function(id){
              
         console.log("inside routing:ClientType Edit Form");

           if (this.currentView) {
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
                   
                } 

     this.currentView = new admin.ProductCatalogFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#productcatalogEditFormTpl' ).html() ),
            mode: 'edit',
            id: id

        });
   

        
    },

// exam design
    examDesignlist:function(){

          console.log("inside routing:product catalog  management");
          if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
 
        this.currentView = new admin.ExamDesignPageView({el: $( '#page-section' )});
    },

    ExamDesignCreateForm:function(){

         console.log("inside routing:  ProductCatalog Create form");

                if (this.currentView) {
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
                } 

                 this.currentView = new admin.ExamDesignFormPageView({

                     el: $( '#page-section' ),
                     template: _.template( $( '#examDesignCreateFormTpl' ).html() ),
                     mode: 'create'
                 });
    },

   ExamDesignEditForm:function(id){
              
         console.log("inside routing:ClientType Edit Form");

           if (this.currentView) {
                    this.currentView.$el.empty();
                    this.currentView.$el.unbind();
                   
                } 

     this.currentView = new admin.ExamDesignFormPageView({
            el: $( '#page-section' ),
            template: _.template( $( '#examDesignEditFormTpl' ).html() ),
            mode: 'edit',
            id: id

        });
   

        
    },

    promoCodeApplyToEmployee:function(){

          console.log("inside routing:promo code apply");
          if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
 
        this.currentView = new admin.PromoCodeApplyView({el: $( '#page-section' )});

    },

    buyExams:function(){
         console.log("inside routing:buyExams");
        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
         this.currentView = new admin.ProductCatalogPageViewAdmin({el:$('#page-section')}); 
    },

    performaPage : function(){
        console.log("inside routing:performaPage");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }

        this.currentView = new admin.PerformaPageViewAdmin({
            el:$('#page-section'),
            template: _.template( $( '#performaPageTpl' ).html() )
        }); 

    },

    cartDetails : function(){
        console.log("inside routing:performaPage");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }

        this.currentView = new admin.CartDetailsPageViewAdmin({
            el:$('#page-section')
            
        }); 

    },

    performaPageCart : function(){
      console.log("inside routing:performaPage");

        if (this.currentView) {
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }

        this.currentView = new admin.PerformaPageCartViewAdmin({
            el:$('#page-section'),
            template: _.template( $( '#performaPageCartTpl' ).html() )
        }); 

    },

    reportDetails : function() {
        console.log("inside routing:reportDetails");

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.ReportPageView({el: $( '#page-section' )}); 
    },

    reportSubjectDetails : function() {
        console.log("inside routing:reportSubjectDetails");

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.ReportSubjectPageView({el: $( '#page-section' )}); 
    },

    reportTopicDetails : function() {
        console.log("inside routing:reportSubjectDetails");

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.ReportTopicPageView({el: $( '#page-section' )}); 
    },


    reportExamListDetails : function() {
        console.log("inside routing:reportExamListDetails");

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.ReportExamListPageView({el: $( '#page-section' )}); 
    },

    
    reportSalesSummaryDetails : function() {
        console.log("inside routing:reportSalesSummaryDetails");

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.ReportSalesSummaryPageView({el: $( '#page-section' )}); 
    },

    
    reportExamSummaryDetails : function() {
        console.log("inside routing:reportExamSummaryDetails");

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.ReportExamSummaryPageView({el: $( '#page-section' )}); 
    },

    reportExamCustSummaryDetails : function() {
        console.log("inside routing:reportExamCustSummaryDetails");

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.ReportExamCustSummaryPageView({el: $( '#page-section' )}); 
    },

    reportPerformanceSummaryDetails : function() {
        console.log("inside routing:reportPerformanceSummaryDetails");

        if (this.currentView) {
            console.log('currentView exist');
            this.currentView.$el.empty();
            this.currentView.$el.unbind();
        }
        this.currentView = new admin.ReportExamPerformanceSummaryPageView({el: $( '#page-section' )}); 
    }

});


