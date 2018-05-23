var admin = admin || {};

admin.DepartmentFormPageView = Backbone.View.extend({
template1: $( '#popupscript' ).html(),
    initialize: function(options) {
      $('.popover-content').hide();
       this.mode = options.mode;
       this.departmentId = options.id;
       this.template = options.template;
       var self = this;
      
        if(new String(this.mode).valueOf() == new String('create').valueOf()){
              this.render();
        }	

        else{

             var requestJson = JSON.stringify({"emp_dept_id":this.departmentId});
             $.when(
              $.ajax({
              url: "/eprayoga/admin/get_emp_department_by_id",
                  type: "POST",
                  data :requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
              
                    self.depData = data;
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
		'click  #department-save'  : 'saveDepartment',
		'click  #department-cancel'	: 'cancelDepartment',
    'click  #emp_dept_name' : 'nameFocus',
    
	},

    render: function() {
      $('.popover-content').hide();
		if (new String(this.mode).valueOf() == new String('create').valueOf()) {
			this.$el.html(this.template);
      this.$el.append(this.template1);
      this.$el.find("#department-save").html("Create");
	    } 
        else { //edit
			  this.$el.html(this.template(this.depData ));
        this.$el.append(this.template1);
		}   	      
		    return this;
	},

	saveDepartment:function(e){
		e.preventDefault();
    var self = this;

     document.getElementById("emp_dept_name_error").innerHTML="";

        //var  regex=/^[a-zA-Z][a-zA-Z-.&\s]+$/;
       
       if ($('#emp_dept_name').val().trim() == '') {
        $('#emp_dept_name').focus();
        document.getElementById('emp_dept_name_error').innerHTML= "Please enter the department Name";            
        return false;
        }
  
      // if (!regex.test($('#emp_dept_name').val().trim())) {
      //     $('#emp_dept_name').focus();
      //     document.getElementById('emp_dept_name_error').innerHTML= "Please provide valid name";
      //     return false;
      // } 
  
		 var departmentFormData = {
         "emp_dept_name"  : $('#emp_dept_name').val()
      };
                                              

      if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            departmentFormData.emp_dept_id = parseInt($('#emp_dept_id').val(), 10);
            var requestData = JSON.stringify(departmentFormData); 
            savedepartment = "/eprayoga/admin/update_emp_department";
            var successMsg = "Department Updated Successfully.";
            var failureMsg = "Error while updating the Department. Please Contact Administrator.";
      } 
      else {

            var requestData = JSON.stringify(departmentFormData);           
            savedepartment= "/eprayoga/admin/create_emp_department";
            var successMsg = " Department Created Successfully.";
            var failureMsg = "Error while creating the Department. Please Contact Administrator.";
      }

          $('#department-save').attr('disabled','disabled');
          $.ajax({
          url     :savedepartment,
          type    : "POST",
          data    : requestData ,
          contentType:'application/json',
          cache:false,
          success : function(data) {

            $('#department-save').removeAttr('disabled');
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);

          },
          error: function(data) { 
            $('#department-save').removeAttr('disabled');        
            var errData = JSON.parse(data.responseText);

            if(errData.emp_dept_name){
             var nameMsg = JSON.stringify(errData.emp_dept_name[0]); 
             var nameerrormsg = nameMsg.replace(/\"/g, "");
             $( "#emp_dept_name_error").html(nameerrormsg);
            }else{
            errorhandle(data);
            }
          } 
        }); 

	},
  routepopup: function(){
    $('.modal-backdrop').remove(); 
    appRouter.navigate("departmentlist", {trigger: true});

  },

	cancelDepartment:function(e){
		  e.preventDefault();
      appRouter.navigate("departmentlist", {trigger: true});  
	},

  nameFocus:function()
  {
        $('#emp_dept_name_error').html("");
    
  }

});
