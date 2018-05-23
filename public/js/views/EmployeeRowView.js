var admin = admin || {};

admin.EmployeeRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'employeeList',
	  template: $( '#employeeTemplate' ).html(),

    initialize: function() {
       this.firstRender = true;
      this.activeId = -1;
    	_.bindAll(this, "render");
        this.model.bind('change', this.render);
	},

  setActiveId: function(value)
    {
      this.activeId = value;
     
    },


    events:{
       'click #edit-employee'    :'editEmployee',
       'click #delete-employee'     :'deletepop',
       'click #activate-employee' : 'actAndDeactivate'
    },

	render: function() {
    $('.popover-content').hide();
		var tmpl = _.template( this.template );
		this.$el.html( tmpl( this.model.toJSON() ) );
    
    if(  this.firstRender )
    {     
        console.log("this active id "+this.activeId);
 
      if( this.activeId == 1 )
      {
        this.$el.find("#activate-employee").attr("title","De-Activate");
        this.$el.find("#activate-employee").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate-employee").attr("title","Activate");
        this.$el.find("#activate-employee").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }

    this.firstRender = false;
		return this;
	},

  editEmployee:function(e){
        e.preventDefault();
        appRouter.navigate("renderEmployeeEditForm/"+ this.model.get('emp_employee_id'), {trigger:true})
  },
  deletepop:function(){
      var self = this;
         $('#myModalEmp').modal('show');
         $('#emplid').val(this.model.get('emp_employee_id'));
         
    },


   actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate-employee").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateEmployee(e);
         }
         else
         {
            _self.activateEmployee(e);
         }

    },

    activateEmployee:function(e){
        e.preventDefault();
         var self = this;       
         var empId = this.model.get('emp_employee_id');
         var requestData = JSON.stringify({"emp_employee_id":empId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_employee',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                       //self.remove();
                        self.model.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});


                          /*  if( this.model.get("is_active") == 1 )
                            {
                                $("#activate_country").html("De-Activate");
                                this.model.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
                            }
                            else
                            {
                                $("#activate_country").html("Activate");
                                this.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                            }
                        */


                       self.render();
                        self.$el.find("#activate-employee").attr("title","De-Activate");
                       self.$el.find("#activate-employee").html("<i class=\"glyphicon glyphicon-ban-circle\">");


                      $( "div.success").html("Employee Activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },

     deActivateEmployee:function(e){
        e.preventDefault();
         var self = this;       
         var empId = this.model.get('emp_employee_id');
         var requestData = JSON.stringify({"emp_employee_id":empId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_employee',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate-employee").attr("title","Activate");
                      self.$el.find("#activate-employee").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Employee De-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },




});