
'use strict';

var homeRouter;

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

 
  $(document).ready(function() {

     WebSocket_Support.initialize('ws', 'localhost', '2938');
    // Initiate Backbone Router
    // --------------------------------------------------
    console.log('getting ready');
    homeRouter = new admin.AdminAppRouter();


   
    // alert("test");

    Backbone.history.start();

    homeRouter.navigate("shoptmpl",{trigger: true}); 
    console.log('View is Ready');
    
});
