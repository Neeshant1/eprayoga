var admin = admin || {};

admin.OriginFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.originId = options.id;
       this.template = options.template;
       var self = this;
      
        if(new String(this.mode).valueOf() == new String('create').valueOf()){
                     this.render();
        }	

        else{

             var requestJson = JSON.stringify({"orig_type_id":this.originId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_origin_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
               // alert(JSON.stringify(data));
                    self.originData = data;
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
		'click  #save_origin'  : 'saveOrigin',
		'click  #cancel_origin'	: 'cancelCreateForm',
    'click  #origin_name'   : 'nameFocus',
    
	},

    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			
			this.$el.html(this.template);
      this.$el.append(this.template1);
     
	    } 
        else { //edit
			  this.$el.html(this.template( this.originData ));
        this.$el.append(this.template1);
			  
		}   	      
		    return this;
	},

	saveOrigin:function(e){
		e.preventDefault();
    var self = this;

        document.getElementById("origin_name_error").innerHTML="";

        var  regex=/^[a-zA-Z][0-9a-zA-Z\s\r\n@!_#\$\^%&*()+=\-\[\]\\\';,\.\/\{\}\|\":<>\?]+$/;

        if ($('#origin_name').val().trim() == '') {
        $('#origin_name').focus();
     //   $('#city_full_name').attr('style', 'border-bottom:2px solid #FF0000;');
        document.getElementById('origin_name_error').innerHTML= "Please enter the Origin name";            
        return false;
         }

          if (!regex.test($('#origin_name').val().trim())) {
          $('#origin_name').focus();
          document.getElementById('origin_name_error').innerHTML= "Please provide valid name ";
          return false;
         } 


           var originFormData = {
                  "orig_type_name"  : $('#origin_name').val()
           };
               

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            originFormData.orig_type_id = parseInt($('#orig_type_id').val(), 10);
           var requestData = JSON.stringify(originFormData); 
            saveorigin = "/eprayoga/admin/update_origin";
            var successMsg = "Origin Updated Successfully.";
            var failureMsg = "Error while updating the Origin. Contact Administrator.";
      } 
      else {

            var requestData = JSON.stringify(originFormData); 
           // alert(requestData);
            saveorigin = "/eprayoga/admin/create_origin";
            var successMsg = "Origin Created Successfully.";
            var failureMsg = "Error while creating the Origin. Contact Administrator.";
      }

        $('#save_origin').attr('disabled','disabled');
        $.ajax({
          url     :saveorigin,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
          
            $('#save_origin').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);

          },
          error: function(data) {
          
            $('#save_origin').removeAttr('disabled');    
            var errData = JSON.parse(data.responseText);

            if(errData.orig_type_name){

             var nameMsg = JSON.stringify(errData.orig_type_name[0]); 
             var nameerrormsg = nameMsg.replace(/\"/g, "");
             $( "#origin_name_error").html(nameerrormsg);
            }else{
            errorhandle(data);
            }
          } 
        }); 

	},
  routepopup: function(){
    $('.modal-backdrop').remove(); 
  
    appRouter.navigate("originlist", {trigger: true});

  },

    cancelCreateForm:function(e){
       e.preventDefault();
           appRouter.navigate("originlist", {trigger: true});  
  },
  nameFocus:function()
  {
    $("#origin_name_error").html("");
  }



});
