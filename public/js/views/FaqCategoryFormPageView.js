var admin = admin || {};

admin.FaqCategoryFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.faqCatId = options.id;
       this.template = options.template;
       var self = this;
        if(new String(this.mode).valueOf() == new String('create').valueOf()){        
              this.render();
        }	

        else{

             var requestJson = JSON.stringify({"faq_category_id":this.faqCatId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_faqcategory_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
               // alert(JSON.stringify(data));
                    self.faqCatData = data;
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
		'click  #faq-category-save'  : 'saveFaqCategory',
		'click  #faq-category-cancel'	: 'cancelFaqCreateForm',
    'click  #faq-category-code'  : 'codeFocus',
    'click  #faq-category'  : 'categoryFocus',
    'click  #faq-category-description'  : 'descFocus',
    'click  #faq-category-notes'  : 'notesFocus',
   'click  #faq-category-public'  : 'publicFocus'

	},

    render: function() {
      
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			this.$el.html(this.template);
      this.$el.append(this.template1);
	    } 
        else { //edit
			  this.$el.html(this.template( this.faqCatData ));
        this.$el.append(this.template1);
		}   	      
		    return this;
	},

	saveFaqCategory:function(e){
    var self = this;
		e.preventDefault();
         
         document.getElementById("faq-category-error").innerHTML="";
         document.getElementById("faq-category-description-error").innerHTML="";
         document.getElementById("faq-category-notes-error").innerHTML="";
         document.getElementById("faq-category-public-error").innerHTML="";
 
               // var regex=/^[a-zA-Z-\s0-9]+$/;
               var regex1=/^[a-zA-Z-\s]+$/;
              //  var regex2=/^[a-zA-Z-\s\.\?\!\,]+$/;
               // var regex3=/^[a-zA-Z-\s]+$/;


          if ($('#faq-category').val().trim() == '' ) {
        $('#faq-category').focus();
        document.getElementById('faq-category-error').innerHTML= "Please enter the faq Category";             
        return false;
         } 
         if (!regex1.test($('#faq-category').val().trim())) {
          $('#faq-category').focus();
          document.getElementById('faq-category-error').innerHTML= "Please provide valid category ";
          return false;
         } 
          if ($('#faq-category-description').val().trim() == '' ) {
        $('#faq-category-description').focus();
        document.getElementById('faq-category-description-error').innerHTML= "Please enter the faq Description";             
        return false;
         } 
         // if (!regex2.test($('#faq-category-description').val().trim())) {
         //  $('#faq-category-description').focus();
         //  document.getElementById('faq-category-description-error').innerHTML= "Please provide valid description ";
         //  return false;
         // } 
          if ($('#faq-category-notes').val().trim() == '' ) {
        $('#faq-category-notes').focus();
        document.getElementById('faq-category-notes-error').innerHTML= "Please enter the faq Notes";             
        return false;
         } 
         // if (!regex3.test($('#faq-category-notes').val().trim())) {
         //  $('#faq-category-notes').focus();
         //  document.getElementById('faq-category-notes-error').innerHTML= "Please provide valid notes ";
         //  return false;
         // } 
          if($( "input[type=radio][name=faq-category-public]:checked" ).length<=0)
          {
           document.getElementById('faq-category-public-error').innerHTML= "Please choose public ";
           return false;
          }
		 var faqCategoryFormData = {

                 // "faq_category_code": $('#faq-category-code').val(),
                  "faq_category_name"  : $('#faq-category').val(),
                  "faq_category_description" : $('#faq-category-description').val(),
                  "notes"  : $('#faq-category-notes').val(),
                  "is_public"  : $( "input[type=radio][name=faq-category-public]:checked" ).val()
                  
     };
                                             
      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            faqCategoryFormData.faq_category_id = parseInt($('#faq-category-id').val(), 10);
            
           var requestData = JSON.stringify(faqCategoryFormData); 
            savefaqCategory = "/eprayoga/admin/update_faqcategory";
            var successMsg = "Faq  Category Updated Successfully.";
            var failureMsg = "Error while updating the Faq Category.Please Contact Administrator.";
      } 
      else {           
            var requestData = JSON.stringify(faqCategoryFormData); 
            savefaqCategory = "/eprayoga/admin/create_faqcategory";
            var successMsg = "Faq Category Created Successfully.";
            var failureMsg = "Error while creating the Faq Category.Please Contact Administrator.";
      }

          $('#faq-category-save').attr('disabled','disabled');
          $.ajax({
          url     :savefaqCategory,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
            $('#faq-category-save').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          },
          error: function(data) {
            $('#faq-category-save').removeAttr('disabled');
             var errData = JSON.parse(data.responseText);

                          if(errData.faq_category_name){
                          
                           var failureMsg = JSON.stringify(errData.faq_category_name[0]); 
                           var errmsgshow = failureMsg.replace(/\"/g, "");
                           $( "#faq-category-error").html("The Faq Category has already been taken.");
                          }else{
                            errorhandle(data);
                            }

                 } 
        }); 

	},

  routepopup: function(){
    $('.modal-backdrop').remove(); 
     appRouter.navigate("faqcategorylist", {trigger: true});

  },

	cancelFaqCreateForm:function(e){
		      e.preventDefault();
               appRouter.navigate("faqcategorylist", {trigger: true});  
	},
  codeFocus:function()
  {
        $('#faq-category-code-error').html("");
  }, 
categoryFocus:function()
  {
        $('#faq-category-error').html("");
  },
descFocus:function()
  {
        $('#faq-category-description-error').html("");
  },
notesFocus:function()
  {
        $('#faq-category-notes-error').html("");
	},
  publicFocus:function()
  {
        $('#faq-category-public-error').html("");
  }

});
