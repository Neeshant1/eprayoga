var admin = admin || {};

admin.InstructionFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.instId = options.id;
       this.template = options.template;
       var self = this;
        $('#datetimepicker1').datetimepicker();
        if(new String(this.mode).valueOf() == new String('create').valueOf()){

                
                this.render();
        }	

        else{

             var requestJson = JSON.stringify({"instruction_id":this.instId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_instruction_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
               // alert(JSON.stringify(data));
                    self.instData = data;
                  },
                  error: function(data) {
                      errorhandle(data);
                  }
                })
                ).done(function(){
                    self.render();
                    $('#instruction_type').val(self.instData.inst_type);
                
                })
        }
      // this.render();
     },

    events: {
		'click  #save-instruction'  : 'saveInstruction',
		'click  #calcel-inst'	: 'cancelCreateForm',
    'click  #instruction_code' : 'codeFocus',
    'click  #instruction_desc' : 'descFocus',
    'click  #instruction_efFrom' : 'fromFocus',
    'click  #instruction_efTo' : 'toFocus',
    'click  #instruction_type' : 'typeFocus',
	},
    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			this.$el.html(this.template);
      this.$el.append(this.template1);
	    } 
        else { //edit
			  this.$el.html(this.template( this.instData ));
        this.$el.append(this.template1);
		}   	 
         $('#instruction_efFrom').datetimepicker();
         $('#instruction_efTo').datetimepicker();     
		    return this;
	},
	saveInstruction:function(e){
    var self = this;
		e.preventDefault();
     // document.getElementById("instruction_code_error").innerHTML="";
      document.getElementById("instruction_desc_error").innerHTML="";
      // document.getElementById("news_date_error").innerHTML="";
     //  document.getElementById("inst_date_error").innerHTML="";
     //  document.getElementById("instruction_type").innerHTML="";
     //   var regex=/^[a-zA-Z-\s0-9]+$/;
      //var regex1=/^[a-zA-Z-\s\0-9\:]+$/;
     //   var regex2=/^[a-zA-Z-\s\-0-9]+$/;
     //   var regex3=/^[a-zA-Z-\s\-0-9]+$/;
     //   var regex4=/^[a-zA-Z-\s]+$/;
     //      if ($('#instruction_code').val().trim() == '' ) {
     //    $('#instruction_code').focus();
     //    document.getElementById('instruction_code_error').innerHTML= "Please enter the Instruction Code";             
     //    return false;
     //     } 
     //     if (!regex.test($('#instruction_code').val().trim())) {
     //      $('#instruction_code').focus();
     //      document.getElementById('instruction_code_error').innerHTML= "Please provide valid Code ";
     //      return false;
     //     } 

          if ($('#instruction_desc').val().trim() == '' ) {
        $('#instruction_desc').focus();
        document.getElementById('instruction_desc_error').innerHTML= "Please enter the Instruction Description.";             
        return false;
         } 
         // if (!regex1.test($('#instruction_desc').val().trim())) {
         //  $('#instruction_desc').focus();
         //  document.getElementById('instruction_desc_error').innerHTML= "Please provide valid description ";
         //  return false;
         // }         
        // if ($('#instruction_efFrom').val().trim() == '' ) {
        // $('#instruction_efFrom').focus();
        // document.getElementById('news_date_error').innerHTML= "Please enter the Instruction Efrom";             
        // return false;
        //  } 
  
     //      if ($('#instruction_efTo').val().trim() == '' ) {
     //    $('#instruction_efTo').focus();
     //    document.getElementById('instruction_efTo_error').innerHTML= "Please enter the Instruction Efto";             
     //    return false;
     //     } 
     //     if (!regex3.test($('#instruction_efTo').val().trim())) {
     //      $('#instruction_efTo').focus();
     //      document.getElementById('instruction_efTo_error').innerHTML= "Please provide valid efto ";
     //      return false;
     //     } 
     //        if ($('#instruction_type').val().trim() == '' ) {
     //    $('#instruction_type').focus();
     //    document.getElementById('instruction_type_error').innerHTML= "Please select the Instruction Type";             
     //    return false;
     //     } 
     //     if (!regex4.test($('#instruction_type').val().trim())) {
     //      $('#instruction_type').focus();
     //      document.getElementById('instruction_type_error').innerHTML= "Please provide valid type ";
     //      return false;
     //     } 

    
   var From = new Date($('#instruction_efFrom').val());
   var to =  new Date($('#instruction_efTo').val());
  
		 var instFormData = {
                  "inst_type_code": $('#instruction_code').val(),
                  "inst_description"  : $('#instruction_desc').val().trim(), 
                  "inst_eff_date_from"  : $('#instruction_efFrom').val(),
                  "inst_eff_date_to"  : $('#instruction_efTo').val(),
                  "inst_type" : $('#instruction_type').val(),
                  "created_by_user_id":"1",
                  "last_update_user_id":"123",
                  "inst_active":"1"
                
           };
          // alert("edit instruction data" + JSON.stringify(instFormData));

        // var requestData = JSON.stringify(faqFormData);

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            instFormData.instruction_id = parseInt($('#instruction_id').val(), 10);
            //instFormData.inst_description = $('#instruction_desc').val().trim();
             
           var requestData = JSON.stringify(instFormData); 
            saveinst = "/eprayoga/admin/update_instruction";
            var successMsg = "Instruction Updated Successfully.";
            var failureMsg = "Error while updating the Instruction.Please Contact Administrator.";
      } 
      else {

            var requestData = JSON.stringify(instFormData); 
            saveinst = "/eprayoga/admin/create_instruction";
            var successMsg = "Instruction Created Successfully.";
            var failureMsg = "Error while creating the Instruction.Please Contact Administrator.";
      }
    // alert(requestData);

   if(From<to){
          $('#save-instruction').attr('disabled','disabled');
          $.ajax({
          url     :saveinst,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {

              if(data.status != undefined){
                    $( "div.failure").html('Instruction Already Exist !!');
                    $( "div.failure" ).fadeIn( 300 ).delay( 3500 ).fadeOut( 800 );
                }else{
                  
                  
                  $('#save-instruction').removeAttr('disabled');
                  $('#messagepop').text(successMsg); 
                  $('#myModalPopup').modal('show');
                  $('.okClass').bind('click', self.routepopup);
             }           
          },
          error: function(data) {
            $('#save-instruction').removeAttr('disabled');
          	 var errData = JSON.parse(data.responseText);

            if(errData.inst_description){
           

             var nameMsg = JSON.stringify(errData.inst_description[0]); 
             var nameerrormsg = nameMsg.replace(/\"/g, "");
             $( "#instruction_desc_error").html('Description is minimum 300 Characters');
            } 

            if(errData.inst_type){
             

             var nameMsg = JSON.stringify(errData.inst_type[0]); 
             var nameerrormsg = nameMsg.replace(/\"/g, "");
             $( "#instruction_type_error").html('The Name has already been taken. ');
            }else{
            errorhandle(data);
            }
          }
        }); 
      }
    else{
    alert("InValid date Range!");
   }
	},

  
routepopup: function(){
    $('.modal-backdrop').remove(); 
   
     appRouter.navigate("instructionpage", {trigger: true});

  },
	cancelCreateForm:function(e){
		   e.preventDefault();
           appRouter.navigate("instructionpage", {trigger: true});  
	},
  codeFocus:function()
  {
        $('#instruction_code_error').html("");
  },
  descFocus:function()
  {
        $('#instruction_desc_error').html("");
  },
  fromFocus:function()
  {
        $('#instruction_efFrom_error').html("");
  },
  toFocus:function()
  {
        $('#instruction_efTo_error').html("");
  },
  typeFocus:function()
  {
        $('#instruction_type_error').html("");
	}



});
