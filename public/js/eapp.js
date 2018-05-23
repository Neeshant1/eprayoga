
'use strict';
var brek = '<fziu>';
var matbrek = '<fzin>';
var ANSWER_SEPERATOR = '<>';
var OPTION_SEPERATOR = '';
var OPTION_GROUP_SEPERATOR = '<&**ybr**&>';
var LATEX_GROUP_SEPERATOR = ':LATEX_GROUP_SEPERATOR:';
var KEKULE_MARKER = ':KEKULE_MARKER:';
var appRouter;
var startdrag = 0;
var stopSave = 0;
getCartCount();

    function initializeTabMenu(){
       $('#form-horizontal').steps({
        headerTag: 'h3',
        bodyTag: 'fieldset',
        transitionEffect: 'slide'
      });
      $('#form-vertical').steps({
        headerTag: 'h3',
        bodyTag: 'fieldset',
        transitionEffect: 'slide',
        stepsOrientation: 'vertical'
      });
      $('#form-tabs').steps({
        headerTag: 'h3',
        bodyTag: 'fieldset',
        transitionEffect: 'slideLeft',
        enableFinishButton: false,
        enablePagination: false,
        enableAllSteps: true,
        titleTemplate: '#title#',
        cssClass: 'tabcontrol',
        enableKeyNavigation:false
      });  
    }


    function initializePopover(){
        $('[data-toggle=\'popover\']').popover({
         placement : 'top',
         html : true});
    }
    function getCartCount(){
      $.ajax({
                  url: "/eprayoga/admin/get_cart_count",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                    //alert(JSON.stringify(data));
                    console.log("dfdsfdfds",data);
                    if(data.length == 0){
                       $('#cartCount').text('0');
                    }else{
                      $('#cartCount').text(data); 
                    }
                     
                     //self.origindata = data;
                  },
                  error: function(data) {
                         
                  }
                })


    }

     function errorhandle(data){
      if(data.status == 301){
            $( "div.failure").html("Session Expired.");
            $( "div.failure" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
            setTimeout(function(){ window.location ='/'; }, 1500);
         }else if(data.status == 422){
           $( "div.failure").html("Error occur fetching the data.Please contact administrator.");
           $( "div.failure" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
         }
   }

    function allowDrop(ev) {
       ev.preventDefault();
    }

    function drag(ev) {
       ev.dataTransfer.setData("text", ev.target.id);
    }
   
    function drop(ev) {
       ev.preventDefault();
       var data = ev.dataTransfer.getData("text");
       ev.target.appendChild(document.getElementById(data));
    }

  function sortable() {   
    $( "#answeroptiondiv" ).sortable();
    $( "#answeroptiondiv" ).disableSelection();
  } 


  function sortableSeq() {   
    $( "#ans" ).sortable();
    $( "#ans" ).disableSelection();
    $('#ans').sortable({
      connectWith: 'ans'
   
    });
     //$("#dragSequence").sortable("refresh");
  } 

   function sortableclient() {   
    $( "#optiondisplay1" ).sortable();
   // $( "#optiondisplay1" ).disableSelection();
  } 


    function showRegularTimer(data) {
      var timeElapsed = data.timeElapsed;
      var examDuration = data.duration;
      if ((examDuration - timeElapsed) == 0) {
        $('#timeElapsed').text('Exam Time Up');
        $('#completeExam').trigger('click');


      } else {
        var timeUnit = (timeElapsed < 2) ? ' Minute': ' Minutes';
        $('#timeElapsed').text(' ' + timeElapsed + timeUnit);  
      }
      
    }

    function showFlashTimer(data) {
     var remtime =  data.duration-data.timeElapsed;
      if(remtime>=0){
           $('#flashmessage').show();
           $( "div#flashmessage" ).html("Remaining Time Left "+remtime+" Minutes");
           $( "div#flashmessage" ).fadeIn( 300 ).delay( 3000 ).fadeOut( 400 );
      }
    }

    function completedexam(){
      console.log(user.orderdetail);
      var orderdetail = user.orderdetail;
      var renderQusModel = new user.UserRenderQuestionModel();

    renderQusModel.save({
      "category_id": orderdetail.attributes.category_id,
      "subject_id": orderdetail.attributes.subject_id,
      "topic_id": orderdetail.attributes.topic_id,
      "product_catalog_id": orderdetail.attributes.product_catalog_id,
      "exam_schedule_id": orderdetail.attributes.exam_schedule_id,
      "user_profile_id": orderdetail.attributes.exam_allocated_to
    },
    { 
      url: 'dummyurl',
      protocol: 'ws',
      operation: 'showResult',
      wait: true,
      success:function(data){
        console.log("success after save");
        console.log(data);
        $( "div.success" ).html("Exam Completed Successfully");
        $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
        userRouter.navigate("examCart", {trigger: true});
      },
      error:function(data){
        console.log("error after save");
        console.log(JSON.stringify(data));
      }
    });

    }
     
     function generatePDF(){
           var  
                 form = $('#pdftemplate'),  
                 cache_width = form.width(),  
                 a4 = [600, 900];
           //create pdf  
 
            getCanvas().then(function (canvas) {  
                var  
                 img = canvas.toDataURL("image/png"),  
                 doc = new jsPDF({  
                     unit: 'px',  
                     format: 'a4'  
                 });  
                doc.addImage(img, 'JPEG', 20, 20);  
                doc.save('eprayoga.pdf');  
                form.width(cache_width);  
            });  
  
  
        // create canvas object  
        function getCanvas() {  
            form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');  
            return html2canvas(form, {  
                imageTimeout: 2000,  
                removeContainer: true  
            });  
        }  


        (function ($) {  
        $.fn.html2canvas = function (options) {  
            var date = new Date(),  
            $message = null,  
            timeoutTimer = false,  
            timer = date.getTime();  
            html2canvas.logging = options && options.logging;  
            html2canvas.Preload(this[0], $.extend({  
                complete: function (images) {  
                    var queue = html2canvas.Parse(this[0], images, options),  
                    $canvas = $(html2canvas.Renderer(queue, options)),  
                    finishTime = new Date();  
  
                    $canvas.css({ position: 'absolute', left: 0, top: 0 }).appendTo(document.body);  
                    $canvas.siblings().toggle();  
  
                    $(window).click(function () {  
                        if (!$canvas.is(':visible')) {  
                            $canvas.toggle().siblings().toggle();  
                            throwMessage("Canvas Render visible");  
                        } else {  
                            $canvas.siblings().toggle();  
                            $canvas.toggle();  
                            throwMessage("Canvas Render hidden");  
                        }  
                    });  
                    throwMessage('Screenshot created in ' + ((finishTime.getTime() - timer) / 1000) + " seconds<br />", 4000);  
                }  
            }, options));  
  
            function throwMessage(msg, duration) {  
                window.clearTimeout(timeoutTimer);  
                timeoutTimer = window.setTimeout(function () {  
                    $message.fadeOut(function () {  
                        $message.remove();  
                    });  
                }, duration || 2000);  
                if ($message)  
                    $message.remove();  
                $message = $('<div ></div>').html(msg).css({  
                    margin: 0,  
                    padding: 10,  
                    background: "#000",  
                    opacity: 0.7,  
                    position: "fixed",  
                    top: 10,  
                    right: 10,  
                    fontFamily: 'Tahoma',  
                    color: '#fff',  
                    fontSize: 12,  
                    borderRadius: 12,  
                    width: 'auto',  
                    height: 'auto',  
                    textAlign: 'center',  
                    textDecoration: 'none'  
                }).hide().fadeIn().appendTo('body');  
            }  
        };  
    })(jQuery);  
 }


  $(document).ready(function() {

    $("#admin_customer").on('click',function(){
      $('.popover-content').hide();

         console.log('route to Customer Registration page'); 

         appRouter.navigate("customermanagement",{trigger: true});

    });



    // $("#admin_create_customer").on('click',function(){
    //      console.log('route to Customer Registration page');
    //      appRouter.navigate("customerregistration",{trigger: true});
    // });

    //  $("#sign_in").on('click',function(){
    //   $('.popover-content').hide();
    //    console.log('route to faq page View');
    //    appRouter.navigate("faqlist",{trigger: true});
    // });

      $("#sign_up").on('click',function(){
       console.log('route to signup page View');
       appRouter.navigate("signup",{trigger: true});
    });

     $("#indexlogin").on('load',function(){
       console.log('route to indexlogin page View');
       appRouter.navigate("indexlogin",{trigger: true});
    });
  
    $("#admin_faq").on('click',function(){

      $('.popover-content').hide();
       console.log('route to faq page View');
       appRouter.navigate("faqlist",{trigger: true});
    });

  
    $("#admin_faq_category").on('click',function(){
      
      $('.popover-content').hide();
       console.log('route to faq category page view');
       appRouter.navigate("faqcategorylist",{trigger: true});
    });

    $("#admin_currency").on('click',function(){
    $('.popover-content').hide();

       console.log('route to Currency Page View');
       appRouter.navigate("currencypage", {trigger: true});
    });

    $("#admin_zonearea").on('click',function(){
      $('.popover-content').hide();
       console.log('route to zone Page View');
       appRouter.navigate("zonepage", {trigger: true});
    });

    $("#admin_security_question").on('click',function(){
      $('.popover-content').hide();
       console.log('route to security question Page View');
       appRouter.navigate("securityquestionpage", {trigger: true});
    });

   $("#admin_instruction").on('click',function(){
    $('.popover-content').hide();
       console.log('route to security question Page View');
       appRouter.navigate("instructionpage", {trigger: true});
    });

    $("#admin_quetion_type").on('click',function(){
      $('.popover-content').hide();
       console.log('route to  question type Page View');
       appRouter.navigate("questiontypepage", {trigger: true});
    });

    $("#admin_question_complexity").on('click',function(){
       console.log('route to complexity question Page View');
       appRouter.navigate("complexityquestionpage", {trigger: true});
    });

     $("#admin_user_type").on('click',function(){
      $('.popover-content').hide();
       console.log('route to user type question Page View');
       appRouter.navigate("usertypepage", {trigger: true});
    });

    $("#admin_subject").on('click',function(){
      $('.popover-content').hide();
       console.log('route to subject  Page View');
       appRouter.navigate("subjectpage", {trigger: true});
    });

    $("#admin_topic").on('click',function(){
      $('.popover-content').hide();
       console.log('route to topic  Page View');
       appRouter.navigate("topicpage", {trigger: true});
    });

    $("#admin_category").on('click',function(){
      $('.popover-content').hide();
       console.log('route to category  Page View');
       appRouter.navigate("categorypage", {trigger: true});
    });


    $("#admin_aws_s3").on('click',function(){
         console.log('route to salert document management');
         appRouter.navigate("awslist",{trigger: true});
    });

    $("#admin_email").on('click',function(){
         console.log('route to salert document management');
         appRouter.navigate("emaillist",{trigger: true});
    });

    $("#admin_sms").on('click',function(){
      $('.popover-content').hide();
         console.log('route to salert document management');
         appRouter.navigate("smslist",{trigger: true});
    });

     $("#admin_city").on('click',function(){
      $('.popover-content').hide();
         console.log('route to salert document management');
         appRouter.navigate("citylist",{trigger: true});
    });
     
    $("#admin_state").on('click',function(){
      $('.popover-content').hide();
         console.log('route to salert document management');
         appRouter.navigate("statelist",{trigger: true});
    });
     
    $("#admin_country").on('click',function(){
      $('.popover-content').hide();
         console.log('route to salert document management');
         appRouter.navigate("countrylist",{trigger: true});
    });

    $("#admin_address_type").on('click',function(){
      $('.popover-content').hide();
         console.log('route to salert document management');
         appRouter.navigate("adddresstype",{trigger: true});
    });
    
    $("#admin_assesments").on('click',function(){
      $('.popover-content').hide();
         console.log('route to schedule management');
         appRouter.navigate("schedule",{trigger: true});
    });
    
     $("#admin_client").on('click',function(){
      $('.popover-content').hide();
         console.log('route to schedule management');
         appRouter.navigate("clientList",{trigger: true});
    });
 
   $("#admin_department").on('click',function(){
    $('.popover-content').hide();
         console.log('route to salert document management');
         appRouter.navigate("departmentlist",{trigger: true});
    });

   $("#admin_clienttype").on('click',function(){
    $('.popover-content').hide();
         console.log('route to salert document management');
         appRouter.navigate("clienttypelist",{trigger: true});
    });
   
    $("#admin_origin").on('click',function(){
      $('.popover-content').hide();
         console.log('route to schedule management');
         appRouter.navigate("originlist",{trigger: true});
    });

    $("#admin_client_group").on('click',function(){
      $('.popover-content').hide();
         console.log('route to client group management');
         appRouter.navigate("clientGroupList",{trigger: true});
    });

    $("#admin_user_access").on('click',function(){
      $('.popover-content').hide();
         console.log('route to useraccess management');
         appRouter.navigate("useraccessList",{trigger: true});
    });
    
    $("#admin_employee").on('click',function(){
      $('.popover-content').hide();
         console.log('route to employee management');
         appRouter.navigate("employeeList",{trigger: true});
    });
    $("#admin_Filetype").on('click',function(){
      $('.popover-content').hide();
         console.log('route to file type ');
         appRouter.navigate("filetypelist",{trigger: true});
       });

    $("#admin_question_bank").on('click',function(){
      $('.popover-content').hide();
         console.log('route to salert document management');
         appRouter.navigate("questionList",{trigger: true}); 
    });

    $("#admin_language").on('click',function(){
      $('.popover-content').hide();
         console.log('route to language management');
         appRouter.navigate("languageList",{trigger: true}); 
    });
    
     $("#admin_pricing").on('click',function(){
      $('.popover-content').hide();
         console.log('route to pricing management');
         appRouter.navigate("pricingList",{trigger: true}); 
       });



    $('#Exam1').on('click', function(){

       
       console.log('before redirecting to the routing exam'); 
       appRouter.navigate("renderingQuestion", {trigger: true});
      });

     $("#admin_genp").on('click',function(){
      $('.popover-content').hide();
         console.log('route to genp management');
         appRouter.navigate("genpList",{trigger: true}); 

    });

    

    $("#customer_registration").on('click',function(){
         $('.popover-content').hide();
         console.log('route to customer registration ');
         appRouter.navigate("renderCustomerRegisterForm",{trigger: true}); 
    });

    $("#client_registration").on('click',function(){
         $('.popover-content').hide();
         console.log('route to client registration');
         appRouter.navigate("renderClientCreateForm",{trigger: true}); 
    });

    $("#admin_question_rendering").on('click',function(){
         $('.popover-content').hide();
         console.log('route to client registration');
         appRouter.navigate("renderingQuestion",{trigger: true}); 
    });

    $("#product_catalog_list").on('click',function(){
         console.log('route to Customer Registration page'); 
         appRouter.navigate("productcatalog",{trigger: true});

    });

    $("#admin_product_catalog").on('click',function(){
      $('.popover-content').hide();
         console.log('route to product management');
         appRouter.navigate("productcatalogList",{trigger: true}); 
    });

    $("#admin_exam_design").on('click',function(){
      $('.popover-content').hide();
         console.log('route to product management');
         appRouter.navigate("examDesignList",{trigger: true}); 
    });

        $("#promo_apply").on('click',function(){
      $('.popover-content').hide();
         console.log('route to promo_apply ');
         appRouter.navigate("promoCodeApply",{trigger: true}); 
    });

    $(".buy_exams").on('click',function(){
      $('.popover-content').hide();
         console.log('route to pricing management');
         appRouter.navigate("buyExams",{trigger: true}); 
    });

     $("#cartDetails").on('click',function(){
         console.log('route to Order Details page'); 
         appRouter.navigate("cartDetails",{trigger: true});
    });

    $('#categoryReport').on('click', function(){
        console.log('route to Order Details page'); 
        appRouter.navigate("reportDetails",{trigger: true});
    });

    $('#subjectReport').on('click', function(){
        console.log('route to Order Details page'); 
        appRouter.navigate("reportSubjectDetails",{trigger: true});
    });

    $('#topicReport').on('click', function(){
        console.log('route to Order Details page'); 
        appRouter.navigate("reportTopicDetails",{trigger: true});
    });
  
    $('#examListReport').on('click', function(){
        console.log('route to Order Details page'); 
        appRouter.navigate("reportExamListDetails",{trigger: true});
    });


    $('#salesSummaryReport').on('click', function(){
        console.log('route to Order Details page'); 
        appRouter.navigate("reportSalesSummaryDetails",{trigger: true});
    });

    
    $('#examSummaryReport').on('click', function(){
        console.log('route to Order Details page'); 
        appRouter.navigate("reportExamSummaryDetails",{trigger: true});
    });
    
    $('#examSummaryCustReport').on('click', function(){
        console.log('route to Order Details page'); 
        appRouter.navigate("reportExamCustSummaryDetails",{trigger: true});
    });
  
    $('#examPerformanceSummaryReport').on('click', function(){
        console.log('route to Order Details page'); 
        appRouter.navigate("reportPerformanceSummaryDetails",{trigger: true});
    });

     WebSocket_Support.initialize('ws', '13.56.116.12', '2938');
    // Initiate Backbone Router
    // --------------------------------------------------
    console.log('getting ready');
    appRouter = new admin.AdminAppRouter();


   
    // alert("test");

    Backbone.history.start();

   // appRouter.navigate("shoptmpl",{trigger: true}); 
    console.log('View is Ready');
    
});


