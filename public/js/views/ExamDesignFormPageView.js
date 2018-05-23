var admin = admin || {};

admin.ExamDesignFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.examId = options.id;
       this.template = options.template;
       var self = this;
      
     
        if(new String(this.mode).valueOf() == new String('create').valueOf()){
              this.render();



              $.when(
              $.ajax({
                  url: "/eprayoga/admin/select_product_catalog",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                    //var splt1 = data.label.split("-")[0];

                     self.productData =data;
                      
                  },
                  error: function(data) {
                   errorhandle(data);
                  }
              })


                ).done(function(){
                  self.render();
               
                  
                  self.productCatalogCollectionView = new admin.MgntProductCatalogCollectionView({
                    el: $( '#product_catalog_id' ),
                    ProductCatalogCollection: self.productData
                 });
                  
  
                  
                });
              }else {


             var requestJson = JSON.stringify({"product_catalog_id":this.examId});

          $.when(
            $.ajax({
                  url: "/eprayoga/admin/get_exam_design_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,

                  
                  success: function(data) {
                        // var obj = {};
                        // data.forEach(function(e){
                        // obj= e;
                        // })
                       
                        self.examDesignData = data;
                                                      
                  },
                  error: function(data) {
                   errorhandle(data);
                  }
              }), 
            $.ajax({
                  url: "/eprayoga/admin/select_product_catalog",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {                  

                     self.productData =data;
                  },
                   
                   error: function(data) {
                   errorhandle(data);
                         
                  }
              })

             
                
                ).done(function(){
                    self.render();


                   
                  self.productCatalogCollectionView = new admin.MgntProductCatalogCollectionView({
                    el: $( '#product_catalog_id' ),
                    ProductCatalogCollection: self.productData
                 });
                 
                 $('#product_catalog_id').val(self.examDesignData[0].product_catalog_id);
                  $('#cat_design').val(self.examDesignData[0].category_name);
                   $('#sub_design').val(self.examDesignData[0].subject_name);
                     $('#top_design').val(self.examDesignData[0].topic_name);
                $('#cat_design').attr('value',self.examDesignData[0].category_id);
                   $('#sub_design').attr('value',self.examDesignData[0].subject_id);
                    $('#top_design').attr('value',self.examDesignData[0].topic_id);

                 
                    var spltvalue = self.examDesignData[0].value.split(',');
                    var spltrule = self.examDesignData[0].rule.split(',');



                    for(var i = 0; i<spltrule.length;i++){
                      if(spltrule[i] == 'Duration')
                       $('#duration').val(spltvalue[i]);

                     else if(spltrule[i] == 'total_mark')
                       $('#total_mark').val(spltvalue[i]);

                      else if(spltrule[i] == 'no_of_question')
                       $('#no_of_question').val(spltvalue[i]);

                     else if(spltrule[i] == 'negative_mark')
                       $("[name='markPoupulate'][value="+ spltvalue[i]+"]").prop('checked', 'checked');

                     else if(spltrule[i] == 'pass_mark')
                       $('#pass_mark').val(spltvalue[i]);

                      else if(spltrule[i] == 'flash_message')
                       $('#flashMsg').val(spltvalue[i]);

                     else if(spltrule[i] == 'flash_message_time_intervel')
                       $('#flash_msg_intervel').val(spltvalue[i]);
                    // else if(spltrule[i] == 'no_question_per_topic')
                      // $('#no_question_per_topic').val(spltvalue[i]);
                     else if(spltrule[i] == 'simple')
                       $('#simple').val(spltvalue[i]);
                     else if(spltrule[i] == 'medium')
                       $('#medium').val(spltvalue[i]);
                     else if(spltrule[i] == 'complex')
                       $('#complex').val(spltvalue[i]);
                     }
               

        });
      }
  
      // this.render();
  },


events: {
      
    'click #save_exam_design'  : 'saveExamDesign',
    'click  #cancel_exam_design'  : 'cancelExamDesign',
    'change #product_catalog_id' : 'renderCatSubTop',


    'click #duration' : 'durationFocus',
    'click #no_of_question' : 'no_of_questionFocus',
    'click #total_mark' : 'total_markFocus',
    'click #pass_mark' : 'pass_markFocus',
    'click #flashMsg' : 'flashMsgFocus',
    'click #flash_msg_intervel'  : 'flash_msg_intervelFocus'
    
  },



 render: function() {
      
   if (new String(this.mode).valueOf() == new String('create').valueOf()) {
      this.$el.html(this.template);
      this.$el.append(this.template1);
      
      
      }else { //edit
        this.$el.html(this.template(this.examDesignData));
        this.$el.append(this.template1);
        initializeTabMenu();

      
    }      
  },
   renderCatSubTop:function(e){
    var returnedData = $.grep(this.productData, function (element, index) {
    return element.id == $(e.target).val();
});
     
     var splt1 = returnedData[0].label.split('-');
     $('#cat_design').empty();
     $('#sub_design').empty();
     $('#top_design').empty();
     $('#cat_design').attr('value',returnedData[0].category_id);
     $('#sub_design').attr('value',returnedData[0].subject_id);
     $('#top_design').attr('value',returnedData[0].topic_id);
     $('#cat_design').val(splt1[0]);
     $('#sub_design').val(splt1[1]);
     $('#top_design').val(splt1[2]);


  },
  saveExamDesign:function(e){
    e.preventDefault();
    var self = this;
    
      document.getElementById("product_catalog_select_error").innerHTML="";
      document.getElementById("Category_exam_error").innerHTML="";
      document.getElementById("Subject_exam_error").innerHTML="";
      document.getElementById("Topic_exam_error").innerHTML="";
      document.getElementById("Duration_exam_error").innerHTML="";
      document.getElementById("total_marks_error").innerHTML="";
      document.getElementById("no_of_question_exam_error").innerHTML="";
      document.getElementById("negative_mark_not_select_error").innerHTML="";
      document.getElementById("flash_msg_error").innerHTML="";
      document.getElementById("pass_marks_error").innerHTML="";
      document.getElementById("flash_msg_intervel_error").innerHTML="";
    //  document.getElementById("no_of_question_per_topic_exam_error").innerHTML="";
      document.getElementById("simple_exam_error").innerHTML="";
      document.getElementById("medium_exam_error").innerHTML="";
      document.getElementById("complex_exam_error").innerHTML="";

       if ( !validateSelect($('#product_catalog_id').val().trim())) {
          $('#product_catalog_id').focus();
          document.getElementById('product_catalog_select_error').innerHTML= "Please Provide Name";             
          return false;
      } 
        if ( !validateSelect($('#cat_design').val().trim())) {
          $('#cat_design').focus();
          document.getElementById('Category_exam_error').innerHTML= "Please select a category";             
          return false;
      } 
        if ( !validateSelect($('#sub_design').val().trim())) {
          $('#sub_design').focus();
          document.getElementById('Subject_exam_error').innerHTML= "Please select a subject";             
          return false;
      } 
      //   if ( !validateSelect($('#top_design').val().trim())) {
      //     $('#top_design').focus();
      //     document.getElementById('Topic_exam_error').innerHTML= "Please select a client";             
      //     return false;
      // } 
        if ( !validateNumber($('#duration').val().trim())) {
          $('#duration').focus();
          document.getElementById('Duration_exam_error').innerHTML= "Please provide duration";             
          return false;
      } 
        if ( !validateNumber($('#no_of_question').val().trim())) {
          $('#no_of_question').focus();
          document.getElementById('no_of_question_exam_error').innerHTML= "Please provide No of Question";             
          return false;
      } 
      if ( !validateNumber($('#total_mark').val().trim())) {
          $('#total_mark').focus();
          document.getElementById('total_marks_error').innerHTML= "Please provide total mark";             
          return false;
      } 
      if(!$('input[name=markPoupulate]:checked').val()){
         $('#neg_mark').focus();
          document.getElementById('negative_mark_not_select_error').innerHTML= "Pleas Select a negative mark";             
          return false;
          } 
      if ( !validateNumber($('#pass_mark').val().trim())) {
          $('#pass_mark').focus();
          document.getElementById('pass_marks_error').innerHTML= "Please provide pass mark";             
          return false;
      } 
      if ( !validateNumber($('#flashMsg').val().trim())) {
          $('#flashMsg').focus();
          document.getElementById('flash_msg_error').innerHTML= "Please provide flash message";             
          return false;
      } 
      if ( !validateNumber($('#flash_msg_intervel').val().trim())) {
          $('#flash_msg_intervel').focus();
          document.getElementById('flash_msg_intervel_error').innerHTML= "Please provide flash message time intervel ";             
          return false;
      } 


      var flash_message = $("#flashMsg").val();
          if(flash_message <= 100){
                  console.log(flash_message);

          }else if (flash_message >100){
                  document.getElementById('flash_msg_error').innerHTML= "Please Provide a valid  data";
                  return false;
          } 
// totalmarks compare pass mark

          var t = parseInt($("#total_mark").val() );
          var p = parseInt($("#pass_mark").val() );
         
           if(t <= p){
                  
                  document.getElementById('pass_marks_error').innerHTML= "It Is Greater Then The Total Mark";
                return false;
          } else{
                 console.log(t);
          }

// flash_message
          var calc = parseInt($("#duration").val() );
          var calc1 = parseInt($("#flashMsg").val() );
          var calc2 = parseInt($("#flash_msg_intervel").val() );
          var tot =parseInt((calc*calc1)/100);
         
// flash message time intervel
          var flash = parseInt(calc - tot);
          if(calc2 <= flash){
                  console.log(calc2);
          }else if (flash < calc2){
            document.getElementById('flash_msg_intervel_error').innerHTML= "Please Provide a valid time";
                  return false;
          }
      
        var simple = $("#simple").val();
          if(simple <= 100){
                  console.log(simple);

          }else if (simple >100){
                  document.getElementById('simple_exam_error').innerHTML= "Please Provide a valid  data";
                  return false;
          }
        var medium = $("#medium").val();
          if(medium <= 100){
                  console.log(medium);

          }else if (medium >100){
                   document.getElementById('medium_exam_error').innerHTML= "Please Provide a valid  data";
                   return false;
          }
        var complex = $("#complex").val();
          if(complex <= 100){
                  console.log(complex);

          }else if (complex >100){
                   document.getElementById('complex_exam_error').innerHTML= "Please Provide a valid  data";
                   return false;
          }


    var examDesignFormData = {

   
                 "product_catalog_id": $('#product_catalog_id').val(),
                 "category_id": $("#cat_design").attr('value'),
                  "subject_id"  : $("#sub_design").attr('value'),
                  "topic_id" : $("#top_design").attr('value'),
                                 
                };

                var duration = $('#duration').val();
                var no_of_question = $('#no_of_question').val();
                var total_mark = $('#total_mark').val(); 
                var negative_mark = $("#neg_mark:checked").val();
                var pass_mark = $('#pass_mark').val();
                var flash_message = $('#flashMsg').val();
                var flash_message_time_intervel = $('#flash_msg_intervel').val();
                var no_question_per_topic = $('#no_question_per_topic').val(); 
                var simple = $('#simple').val();
                var medium = $('#medium').val();
                var complex = $('#complex').val();

                var smc = Number(simple)+Number(medium)+Number(complex);

                  //smc == '100';
                if(smc == '100'){


                  console.log("sysrdyrsydrystr");
                  
                }else{
                   $('#messagepop').text("Complexity Factor Should Be 100"); 
                   $('#myModalPopup').modal('show');
                   return false;
                  
                }
                if(no_of_question<= 0)
                  {
                   $('#messagepop').text("select atleast one question"); 
                   $('#myModalPopup').modal('show');
                   return false;
                  }

                 
                  if( duration != '' )
                  {
                     examDesignFormData.Duration = duration;
                  }

                   if( no_of_question!= '')
                  {
                     examDesignFormData.no_of_question = $('#no_of_question').val();
                  }
                  if( total_mark!= '')
                  {
                     examDesignFormData.total_mark = $('#total_mark').val();
                  }


                   if( negative_mark != '' )
                  {
                     examDesignFormData.negative_mark = $('#neg_mark:checked').val();
                  }

                  if( pass_mark != '' )
                  {
                     examDesignFormData.pass_mark = $('#pass_mark').val();
                  }

                   if (flash_message != '' )
                  {
                     examDesignFormData.flash_message = $('#flashMsg').val();
                  }

                   if( flash_message_time_intervel != '' )
                  {
                     examDesignFormData.flash_message_time_intervel = $('#flash_msg_intervel').val();
                  }
                   if( no_question_per_topic != '' )
                  {
                     examDesignFormData.no_question_per_topic = $('#no_question_per_topic').val();
                  }

                   if (simple != '' )
                  {
                     examDesignFormData.simple = $('#simple').val();
                  }

                   if( medium != '' )
                  {
                     examDesignFormData.medium = $('#medium').val();
                  }


                   if( complex != '' )
                  {
                     examDesignFormData.complex = $('#complex').val();
                  }


            if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
           examDesignFormData.product_catalog_id = this.examId;
           

             //var selectedClient =  $("#client_name").val();
        //    topicFormData.client_id = $("#client_name").val();
           var requestData = JSON.stringify(examDesignFormData); 
            savetopic = "/eprayoga/admin/update_exam_design";
            var successMsg = "Exam Design has been Updated Successfully.";
            var failureMsg = "Questions are more than No Of Questions.";
      } 
      else {
             
           // var selectedClient =  $("#client_name").val();
          //  topicFormData.client_id = $("#client_name").val();
            var requestData = JSON.stringify(examDesignFormData); 
            savetopic = "/eprayoga/admin/create_exam_design";
            var successMsg = "Exam Design has been Created Successfully.";
            var failureMsg = "Questions are More than No Of Questions.";
      }


     // alert(requestData);
       $('#save_exam_design').attr('disabled','disabled');
       $.ajax({
          url     :savetopic,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
            $('#save_exam_design').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);

          },
          error: function(data) {
          console.log(data);
            $('#save_exam_design').removeAttr('disabled');
             var errData = JSON.parse(data.responseText);
             var conflictMsg = data.responseJSON.data.conflictMsg;
             console.log(conflictMsg);
                    if(errData.product_catalog_id ){
                          
                           var failureMsg = JSON.stringify(errData.product_catalog_id); 
                           var errormsg = failureMsg.replace(/\"/g, "");

                       $( "#product_catalog_select_error").html('The product name has already been taken.');
                         }

            if(conflictMsg){
            $('#messagepop').text("you have "+conflictMsg[1] +" questions in "+conflictMsg[0]+ " Level add " + conflictMsg[2] + "questions "); 
            $('#myModalPopup').modal('show');
            } else{
                errorhandle(data);
            }       
               } 
        }); 
       },
      routepopup: function(){
          $('.modal-backdrop').remove(); 
         
          appRouter.navigate("examDesignList", {trigger: true});

      },
       cancelExamDesign:function(e){
       e.preventDefault();
           appRouter.navigate("examDesignList", {trigger: true});  
  },
  durationFocus:function()
  {
        $('#Duration_exam_error').html("");
  },
  no_of_questionFocus:function()
  {
        $('#no_of_question_exam_error').html("");
  },
  total_markFocus:function()
  {
        $('#total_marks_error').html("");
  },

  pass_markFocus:function()
  {
        $('#pass_marks_error').html("");
  },
  flashMsgFocus:function()
  {
        $('#flash_msg_error').html("");
  },
  flash_msg_intervelFocus:function()
  {
        $('#flash_msg_intervel_error').html("");
  },


});