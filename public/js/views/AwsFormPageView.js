var admin = admin || {};

admin.AwsFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.awsId = options.id;
       this.template = options.template;
       var self = this;
       
        if(new String(this.mode).valueOf() == new String('create').valueOf()){

          $.when(
              $.ajax({
              url: "/eprayoga/admin/get_all_aws",
                  type: "GET",
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                    
                   

                     self.awsdata = data;
                  },
                  error: function(data) {
                    errorhandle(data);     
                  }
                })
                ).done(function(){
                self.render();
                // self.aws3CollectionView = new admin.MgmtAwsCollectionView({
                //   el: $( '#aws3' ),
                //   aws3Collection: self.aws3data
                //  });
                });


              //this.render();
        }	

        else{

             var requestJson = JSON.stringify({"aws_s3_master_id":this.awsId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_aws_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
              cache:false,
                  success: function(data) {
                    self.awsData = data;
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
		'click  #save-aws'  : 'saveaws',
		'click  #cancel'	: 'cancelCreateForm',
   'click  #aws_s3_id'  : 'idFocus',
    'click  #accessid'  : 'accessFocus',
    'click  #secretKey'  : 'keyFocus',
    'click  #bucketName'  : 'nameFocus',
    'click  #s3url'  : 'urlFocus',
    'click  #usedFor'  : 'usedFocus',



	},

    render: function() {
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			 
			this.$el.html(this.template);
      this.$el.append(this.template1);
	    } 
        else { //edit
			  this.$el.html(this.template( this.awsData ));
        this.$el.append(this.template1);
			  
		}   	      
		    return this;
	},

	saveaws:function(e){
		e.preventDefault();
    var self = this;

       document.getElementById("aws_s3_id_error").innerHTML="";
      document.getElementById("accessid_error").innerHTML="";
      document.getElementById("secretKey_error").innerHTML="";
      document.getElementById("bucketName_error").innerHTML="";
      document.getElementById("s3url_error").innerHTML="";
      document.getElementById("usedFor_error").innerHTML="";
      document.getElementById("active_error").innerHTML="";

       //   var regex=/^[a-zA-Z-\s0-9]+$/;
       //   var regex1=/^[a-zA-Z-\s0-9]+$/;
       //  var regex2=/^[a-zA-Z-\@0-9]+$/;
       //  var regex3=/^[a-zA-Z0-9]+$/;
       //  var regex4=/^[a-zA-Z-\:\.0-9]+$/;
       // var regex5=/^[a-zA-Z-\s]+$/;

         if ($('#aws_s3_id').val().trim() == '' ) {
        $('#aws_s3_id').focus();
        document.getElementById('aws_s3_id_error').innerHTML= "Please enter the Aws id";             
        return false;
         } 
         // if (!regex.test($('#aws_s3_id').val().trim())) {
         //  $('#aws_s3_id').focus();
         //  document.getElementById('aws_s3_id_error').innerHTML= "Please provide valid id ";
         //  return false;
         // } 

        if ($('#accessid').val().trim() == '' ) {
        $('#accessid').focus();
        document.getElementById('accessid_error').innerHTML= "Please enter the Access id";             
        return false;
         } 
         // if (!regex1.test($('#accessid').val().trim())) {
         //  $('#accessid').focus();
         //  document.getElementById('accessid_error').innerHTML= "Please provide valid id ";
         //  return false;
         // } 

        if ($('#secretKey').val().trim() == '' ) {
        $('#secretKey').focus();
        document.getElementById('secretKey_error').innerHTML= "Please enter the Seceret Key";             
        return false;
         } 
         // if (!regex2.test($('#secretKey').val().trim())) {
         //  $('#secretKey').focus();
         //  document.getElementById('secretKey_error').innerHTML= "Please provide valid key ";
         //  return false;
         // } 

          if ($('#bucketName').val().trim() == '' ) {
        $('#bucketName').focus();
        document.getElementById('bucketName_error').innerHTML= "Please enter the Bucket Name";             
        return false;
         } 
         // if (!regex3.test($('#bucketName').val().trim())) {
         //  $('#bucketName').focus();
         //  document.getElementById('bucketName_error').innerHTML= "Please provide valid name ";
         //  return false;
         // } 


         if ($('#s3url').val().trim() == '' ) {
        $('#s3url').focus();
        document.getElementById('s3url_error').innerHTML= "Please enter the s3url ";             
        return false;
         } 
         // if (!regex4.test($('#s3url').val().trim())) {
         //  $('#s3url').focus();
         //  document.getElementById('s3url_error').innerHTML= "Please provide valid url ";
         //  return false;
         // } 


         if ($('#usedFor').val().trim() == '' ) {
        $('#usedFor').focus();
        document.getElementById('usedFor_error').innerHTML= "Please enter the UsedFor ";             
        return false;
         } 
         // if (!regex5.test($('#usedFor').val().trim())) {
         //  $('#usedFor').focus();
         //  document.getElementById('usedFor_error').innerHTML= "Please provide valid usedfor ";
         //  return false;
         // } 

          if($( "input[type=radio][name=active]:checked" ).length<=0)
          {
           document.getElementById('active_error').innerHTML= "Please choose Active ";
           return false;
          }

  
		 var awsFormData = {
                  "aws_s3_id": $('#aws_s3_id').val(),
                  "aws_access_key_id"  : $('#accessid').val(),
                  "aws_secret_access_key" : $('#secretKey').val(),
                  "s3_bucket_name"  : $('#bucketName').val(),
                  "s3_url"           : $('#s3url').val(),
                  "used_for"  : $('#usedFor').val(),
                  "is_active"  : $( "input[type=radio][name=active]:checked" ).val()
           };
   
    if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
       
        awsFormData.aws_s3_master_id = parseInt($('#aws_s3_master_id').val(), 10);
        var requestData = JSON.stringify(awsFormData); 
        saveaws = "/eprayoga/admin/update_aws";
        var successMsg = "Aws Updated Successfully.";
        var failureMsg = "Error while updating the Aws .Please Contact Administrator.";

    } 

      else {
        var requestData = JSON.stringify(awsFormData); 
        saveaws = "/eprayoga/admin/create_aws";
        var successMsg = "Aws Created Successfully.";
        var failureMsg = "Error while creating the Aws. Contact Administrator.";

      }


        $('#save-aws').attr('disabled','disabled');
        $.ajax({
          url     : saveaws,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {
             
           
           
             $('#save-aws').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);

          },
          error: function(data) {
            $('#save-aws').removeAttr('disabled');
             var errData = JSON.parse(data.responseText);

              if(errData.aws_s3_id){
                 var nameMsg = JSON.stringify(errData.aws_s3_id[0]); 
                 var nameerrormsg = nameMsg.replace(/\"/g, "");
                 $( "#aws_s3_id_error").html(nameerrormsg);
              }

              else if(errData.aws_access_key_id){
                 var codeMsg = JSON.stringify(errData.aws_access_key_id[0]);
                 var codeerrormsg = codeMsg.replace(/\"/g, "");
                 $( "#accessid_error").html(codeerrormsg);
              }

               else if(errData.aws_secret_access_key){
                 var codeMsg = JSON.stringify(errData.aws_secret_access_key[0]);
                 var nameerrormsg = codeMsg.replace(/\"/g, "");
                 $( "#secretKey_error").html(nameerrormsg);
              }else{
                errorhandle(data);
              }
          } 
        }); 

	},
  routepopup: function(){
    $('.modal-backdrop').remove(); 
   appRouter.navigate("awslist", {trigger: true});

  },

	cancelCreateForm:function(e){
		   e.preventDefault();
       appRouter.navigate("awslist", {trigger: true});  
	},
idFocus:function()
  {
        $('#aws_s3_id_error').html("");
    
  },
accessFocus:function()
  {
        $('#accessid_error').html("");
    
  },
keyFocus:function()
  {
        $('#secretKey_error').html("");
    
  },
nameFocus:function()
  {
        $('#bucketName_error').html("");
    
  },
urlFocus:function()
  {
        $('#s3url_error').html("");
    
  },
usedFocus:function()
  {
        $('#usedFor_error').html("");
    
  }

});
