'use strict';

var userRouter;
var examdataList;
var docsClicked=[]
// getCartCount();



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
        cssClass: 'tabcontrol'
      });  
    }

    function initializePopover(){
        $('[data-toggle=\'popover\']').popover({
         placement : 'top',
         html : true});
    }


    // function getCartCount(){
    //   $.ajax({
    //               url: "/eprayoga/admin/get-cart-count",
    //               type: "GET",
    //               contentType:'application/json',
    //               cache:false,
    //               success: function(data) {
    //                 //alert(JSON.stringify(data));
    //                 console.log("dfdsfdfds",data);
    //                   $('#cartCount').text(data);
    //                  //self.origindata = data;
    //               },
    //               error: function(data) {
                         
    //               }
    //             })


    // }
     function usergeneratePDF(){
           var  
                 form = $('#userpdftemplate'),  
                 cache_width = form.width(),  
                 a4 = [600, 900];
           
 
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

 function routeCalled(routeName)
{
   if( docsClicked[routeName] == undefined )
   {
      docsClicked[routeName] = 1;
   }
   else
   {
     docsClicked[routeName] = 1;
   }

}

window.onbeforeunload = function() {
        return "Are you sure you want to leave?";
 }

var typecheck = $('#typecheck').val();
if(typecheck == 1){
  var count = 0; 
var previousPageName ="user_exam";


 window.onload = function () 
{ 
  // console.log("current location "+Backbone.history.getFragment());
  //alert(window.location.href);

 
    if (typeof history.pushState === "function") 
    { 
        var rootname = Backbone.history.getFragment();
        if( rootname == undefined || rootname == '' )
          rootname="user_exam"; 
         history.pushState('back', null, null);  
         routeCalled(rootname); 
         routeCalled('startExam');
          docsClicked[rootname] = 0;    

        window.onpopstate = function (event) 
        { 
   
              var rootname = Backbone.history.getFragment();
              if( rootname == undefined || rootname == '' )
              {
                history.pushState('back', null, null); 
                 rootname="user_exam"; 
              }
              else
              {
                history.pushState('back', null, null);
              }

                if( previousPageName == rootname )
               {

                   if( docsClicked[rootname] != undefined && docsClicked[rootname]  <=  0 )
                   {
                     // if( confirm("Do you want to leave current page?") == true)
                     // {
                     //    location.href = location.protocol + '//' + location.host;
                     // }
                      $('#exitBrowserDialog').modal('show');
                  }
                  else
                  {
                    docsClicked[rootname]--;
                  }
               }
               else
               {
                     previousPageName = rootname;
                     if( docsClicked[previousPageName] != undefined ) docsClicked[previousPageName]--;
               }
            
           //if(count == 1){window.location = 'your url';}
          
         }; 
     }
     
 }  
}
else if(typecheck == 2){
 var count = 0; 

var previousPageName ="employee#examCart";


 window.onload = function () 
{ 
  console.log("current location "+Backbone.history.getFragment());
  //alert(window.location.href);

 
    if (typeof history.pushState === "function") 
    { 
        var rootname = Backbone.history.getFragment();
        if( rootname == undefined || rootname == '' )
          rootname="employee#examCart";  
      //    alert("rootname "+rootname);       
         history.pushState('back', null, null);  
         routeCalled(rootname); 
         routeCalled('examStart');

          docsClicked[rootname] = 0;    

        window.onpopstate = function (event) 
        { 
   
              var rootname = Backbone.history.getFragment();
              if( rootname == undefined || rootname == '' )
              {
                history.pushState('back', null, null); 
                 rootname="employee#examCart"; 
              }
              else
              {
                history.pushState('back', null, null);
              }

                if( previousPageName == rootname )
               {

                   if( docsClicked[rootname] != undefined && docsClicked[rootname]  <=  0 )
                   {
                     // if( confirm("Do you want to leave current page?") == true)
                     // {
                     //    location.href = location.protocol + '//' + location.host;
                     // }
                      $('#exitBrowserDialog1').modal('show');
                  }
                  else
                  {
                    docsClicked[rootname]--;
                  }
               }
               else
               {
                     previousPageName = rootname;
                     if( docsClicked[previousPageName] != undefined ) docsClicked[previousPageName]--;
               }
            
           //if(count == 1){window.location = 'your url';}
          
         }; 
     }
     
 }  
}



    $(document).ready(function() {
      $("#product_catalog_list").on('click',function(){
         console.log('route to Customer Registration page'); 
         userRouter.navigate("productcatalog",{trigger: true});
     });

      $("#exam_catalog").on('click',function(){
         console.log('route to Customer Registration page'); 
         userRouter.navigate("examCatalog",{trigger: true});
     });


    $("#order_details").on('click',function(){
         console.log('route to Order Details page'); 
         userRouter.navigate("examCart",{trigger: true});
     });
    
    $("#cartDetails1").on('click',function(){
         console.log('route to Order Details page'); 
         userRouter.navigate("cartDetails1",{trigger: true});
    });

    $("#Promo_Code").on('click',function(){
         console.log('route to Order Details page'); 
         userRouter.navigate("promoSearch",{trigger: true});
    });

    console.log('getting ready');
    userRouter = new user.UserAppRouter();
    //userRouter.navigate("examCart",{trigger: true})
    console.log('View is Ready');
      });

      $( "#leaveCurrentPageOK" ).click(function() {
      $('#mySmallModalLabel').modal('hide');
      window.onbeforeunload = false;
       location.href = location.protocol + '//' + location.host;

     });

      $( "#leaveCurrentPageCancel" ).click(function() {
      $('#leaveCurrentPageCancel').modal('hide');

     });

     


 
 
