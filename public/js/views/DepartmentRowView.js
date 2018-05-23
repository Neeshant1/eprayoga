var admin = admin || {};

admin.DepartmentRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'departmentList',
	  template: $( '#departmentTemplate' ).html(),

  initialize: function() {
      this.firstRender = true;
      this.activeId = -1;
      this.recIndex = 0;
  	_.bindAll(this, "render");
      this.model.bind('change', this.render);
  },

  setActiveId: function(value, recIndex)
  {
    this.activeId = value;
    this.recIndex = recIndex;
   
  },

    events:{
       'click #edit-department'    :'editDepartment',
       'click #delete-department'     :'deleteDepartment',
       'click #activate-department' : "actAndDeactivate",
       'click #delete-depart'     :'deletepop',
    },

  render: function() {
    var tmpl = _.template( this.template );
    //this.model.set("IndexCount",this.recIndex);
    this.$el.html( tmpl( this.model.toJSON() ) );
    
    if(  this.firstRender )
    {
     
        console.log("this active id "+this.activeId);
 
      if( this.activeId == 1 )
      {
        this.$el.find("#activate-department").attr("title","De-Activate");
        this.$el.find("#activate-department").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate-department").attr("title","Activate");
        this.$el.find("#activate-department").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }

     this.firstRender = false;
    return this;
  },

  editDepartment:function(e){
        e.preventDefault();
        appRouter.navigate("renderDepartmentEditForm/"+ this.model.get('emp_dept_id'), {trigger:true})
  },

  deletepop:function(){
      var self = this;
         $('#myModaldepart').modal('show');
         $('#departid').val(this.model.get('emp_dept_id'));
         
    },

    actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate-department").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateDepartment(e);
         }
         else
         {
            _self.activateDepartment(e);
         }

    },

    activateDepartment:function(e){
        e.preventDefault();
         var self = this;
         var deptId = this.model.get('emp_dept_id');
         var requestData = JSON.stringify({"emp_dept_id":deptId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_department',
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
                        self.$el.find("#activate-department").attr("title","De-Activate");
                       self.$el.find("#activate-department").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      $( "div.success").html("Department Activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },

     deActivateDepartment:function(e){
        e.preventDefault();
         var self = this;
         var deptId = this.model.get('emp_dept_id');
         var requestData = JSON.stringify({"emp_dept_id":deptId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_department',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate-department").attr("title","Activate");
                      self.$el.find("#activate-department").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Department De-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    }

});