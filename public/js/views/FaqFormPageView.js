var admin = admin || {};

admin.FaqFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.faqId = options.id;
       this.template = options.template;
       var self = this;
      
        if(new String(this.mode).valueOf() == new String('create').valueOf()){

          $.when(
              $.ajax({
              url: "/eprayoga/admin/select_faqcategory",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   
                     self.faqdata = data;
                  },
                  error: function(data) {
                    errorhandle(data);
                  }
                })
                ).done(function(){
                self.render();
                self.faqCollectionView = new admin.MgntFaqCategoryCollectionView({
                el: $( '#faq_category' ),
                faqCollection: self.faqdata
                 });
                });


              //this.render();
        }	

        else{

             var requestJson = JSON.stringify({"faq_id":this.faqId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_faq_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
               // alert(JSON.stringify(data));
                    self.faqData = data;
                  },
                  error: function(data) {
                    errorhandle(data);
                  }
                }),
               $.ajax({
              url: "/eprayoga/admin/select_faqcategory",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   
                     self.faqCategorydata = data;
                  },
                  error: function(data) {
                    errorhandle(data);
                  }
                })
                ).done(function(){
                    self.render();
                self.faqCollectionView = new admin.MgntFaqCategoryCollectionView({
                el: $( '#faq_category' ),
                faqCollection: self.faqCategorydata
                 });

                $('#faq_category').val(self.faqData.faq_category_id);
                })
        }
      // this.render();
     },

    events: {
		'click  #save-faq'  : 'saveFaq',
		'click  #cancel'	: 'cancelCreateForm',
    'click  #faq_code'  : 'codeFocus',
    'click  #faq_category'  : 'categoryFocus',
    'click  #faq_question'  : 'questionFocus',
    'click  #faq_answer'  : 'answerFocus',
    'click  #faq_notes'  : 'notesFocus',
    'click  #faq_keywords'  : 'keywordsFocus',
    'click  #faqpublish'  : 'publishFocus',
    'click  #faqpublic'  : 'publicFocus',

 
	},

    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			this.$el.html(this.template);
      this.$el.append(this.template1);
	    } 
        else { //edit
			  this.$el.html(this.template( this.faqData ));
        this.$el.append(this.template1);
		}   	      
		    return this;
	},

	saveFaq:function(e){
    var self = this;
		e.preventDefault();
            //     document.getElementById("faq_code_error").innerHTML="";
             // document.getElementById("faq_category_error").innerHTML="";
             document.getElementById("faq_question_error").innerHTML="";
             document.getElementById("faq_answer_error").innerHTML="";
             document.getElementById("faq_notes_error").innerHTML="";
             document.getElementById("faq_keywords_error").innerHTML="";
             document.getElementById("faqpublish_error").innerHTML="";
             document.getElementById("faqpublic_error").innerHTML="";

               // var regex=/^[a-zA-Z-\s0-9]+$/;
               // var regex1=/^[a-zA-Z-\s]+$/;
               // var regex2=/^[a-zA-Z-\s\?\!]+$/;
               // var regex3=/^[a-zA-Z-\s\.]+$/;
               // var regex4=/^[a-zA-Z-\s\,\.]+$/;
               // var regex5=/^[a-zA-Z-\s\@]+$/;
        //   if ($('#faq_code').val().trim() == '' ) {
        // $('#faq_code').focus();
        // document.getElementById('faq_code_error').innerHTML= "Please enter the faq Code";             
        // return false;
        //  } 
        //  if (!regex.test($('#faq_code').val().trim())) {
        //   $('#faq_code').focus();
        //   document.getElementById('faq_code_error').innerHTML= "Please provide valid Code ";
        //   return false;
        //  } 
        //   if ($('#faq_category').val().trim() == '' ) {
        // $('#faq_category').focus();
        // document.getElementById('faq_category_error').innerHTML= "Please enter the faq Category";             
        // return false;
        //  } 
        //  if (!regex1.test($('#faq_category').val().trim())) {
        //   $('#faq_category').focus();
        //   document.getElementById('faq_category_error').innerHTML= "Please provide valid category ";
        //   return false;
        //  } 
          if ($('#faq_question').val().trim() == '' ) {
        $('#faq_question').focus();
        document.getElementById('faq_question_error').innerHTML= "Please enter the faq Question";             
        return false;
         } 
         // if (!regex2.test($('#faq_question').val().trim())) {
         //  $('#faq_question').focus();
         //  document.getElementById('faq_question_error').innerHTML= "Please provide valid question ";
         //  return false;
         // } 
          if ($('#faq_answer').val().trim() == '' ) {
        $('#faq_answer').focus();
        document.getElementById('faq_answer_error').innerHTML= "Please enter the faq Answer";             
        return false;
         } 
         // if (!regex3.test($('#faq_answer').val().trim())) {
         //  $('#faq_answer').focus();
         //  document.getElementById('faq_answer_error').innerHTML= "Please provide valid answer ";
         //  return false;
         // } 
          if ($('#faq_notes').val().trim() == '' ) {
        $('#faq_notes').focus();
        document.getElementById('faq_notes_error').innerHTML= "Please enter the faq Notes";             
        return false;
         } 

         // if (!regex4.test($('#faq_notes').val().trim())) {
         //  $('#faq_notes').focus();
         //  document.getElementById('faq_notes_error').innerHTML= "Please provide valid notes ";
         //  return false;
         // } 
          if ($('#faq_keywords').val().trim() == '' ) {
        $('#faq_keywords').focus();
        document.getElementById('faq_keywords_error').innerHTML= "Please enter the faq Keywords";             
        return false;
         } 
         // if (!regex5.test($('#faq_keywords').val().trim())) {
         //  $('#faq_keywords').focus();
         //  document.getElementById('faq_keywords_error').innerHTML= "Please provide valid keywords ";
         //  return false;
         // }
      if($( "input[type=radio][name=faqpublish]:checked" ).length<=0)
      {
                document.getElementById('faqpublish_error').innerHTML= "Please choose publish ";
                 return false;
      }
                 if($( "input[type=radio][name=faqpublic]:checked" ).length<=0)
      {
              document.getElementById('faqpublic_error').innerHTML= "Please choose public ";
                 return false;
      }
           

		 var faqFormData = {
                  //"faq_code": $('#faq_code').val(),
                  "faq_category_id"  : $('#faq_category').val(),
                  "question" : $('#faq_question').val(),
                  "answer"  : $('#faq_answer').val(),
                  "notes"  : $('#faq_notes').val(),
                  "keywords"  : $('#faq_keywords').val(),
                  "is_published"  : $( "input[type=radio][name=faqpublish]:checked" ).val(),   
                  "is_public"  : $( "input[type=radio][name=faqpublic]:checked" ).val()
           };
                                               

        // var requestData = JSON.stringify(faqFormData);

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            faqFormData.faq_id = parseInt($('#faq_id').val(), 10);
             var selectedFaq =  $("#faq_category").val();
            //faqFormData.faq_category_id = parseInt(selectedFaq, 10);

           var requestData = JSON.stringify(faqFormData); 
            savefaq = "/eprayoga/admin/update_faq";
            var successMsg = "Faq Updated Successfully.";
            var failureMsg = "Error while updating the Faq. Contact Administrator.";
      } 
      else {


            var selectedFaq =  $("#faq_category").val();
            //faqFormData.faq_category_id = parseInt(selectedFaq, 10);
            var requestData = JSON.stringify(faqFormData); 
            savefaq = "/eprayoga/admin/create_faq";
            var successMsg = "Faq Created Successfully.";
            var failureMsg = "Error while creating the Faq. Contact Administrator.";
      }

      // alert(requestData);

          $('#save-faq').attr('disabled','disabled');
          $.ajax({
          url     :savefaq,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
            $('#save-faq').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          },
          error: function(data) {

            $('#save-faq').removeAttr('disabled');


            var errData = JSON.parse(data.responseText);
                           var failureMsg = JSON.stringify(errData.question[0]); 
                           var errormsg = failureMsg.replace(/\"/g, "");


                       $( "#faq_question_error").html('The question name has Already been taken');

                       $( "#faq_question_error").html('The qustion name has Already been taken');
                 } 
        }); 

	},

	cancelCreateForm:function(e){
		   e.preventDefault();
           appRouter.navigate("faqlist", {trigger: true});  
	},

 
 routepopup: function(){
    $('.modal-backdrop').remove(); 
     appRouter.navigate("faqlist", {trigger: true});

  },
  // codeFocus:function()
  // {
  //       $('#faq_code_error').html("");
  // },
  // categoryFocus:function()
  // {
  //       $('#faq_category_error').html("");
  // },
questionFocus:function()
  {
        $('#faq_question_error').html("");
  },
answerFocus:function()
  {
        $('#faq_answer_error').html("");
  },
notesFocus:function()
  {
        $('#faq_notes_error').html("");
  },
  keywordsFocus:function()
  {
        $('#faq_keywords_error').html("");
  },
  publishFocus:function()
  {
        $('#faqpublish_error').html("");
  },
  publicFocus:function()
  {
        $('#faqpublic_error').html("");
  }

});
