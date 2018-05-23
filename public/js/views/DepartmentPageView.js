var admin = admin || {};

admin.DepartmentPageView = Backbone.View.extend({
    template: $( '#departmentPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create-department' : 'departmentCreate',
       'click #department_load_more'	 : 'loadMore',
       'click #department_deleteall'	 : 'deletepop',
        'click #del_all_record'    :'deleteAll',
       'keypress #departmentSearch' :'Search',
       'click #del_department'   : 'deleteDepartment',
      // 'click #edit-email'    :'editemail'
	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	    this.departmentListView = new admin.DepartmentTableView({el: $( '#departmentList' )});
		return this;
	},

	departmentCreate:function(e){
    e.preventDefault();
		appRouter.navigate("renderDepartmentCreateForm", {trigger: true});
	},

	loadMore : function(e){
        e.preventDefault();
        this.departmentListView.setShowPage();
		
	},

   deletepop:function(e){
    e.preventDefault();
      $('#myModaldeleteall').modal('show');
         
  },
	
	deleteAll:function(e){
        e.preventDefault();
        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModaldeleteall').modal('toggle');
       // if(confirm("Do you want delete all record")){

           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_emp_departmentall',
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.departmentListView.removeAll();
                      $( "div.success").html("All Departments are Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
             });
	//	}
	},

   Search:function (event) {
      //$('#findStatus').html(alert("No Records Found"));
       if(event.which == 13) {
          this.SearchText();
      return false;
      }

  },

  SearchText : function()
  {
    $('#findStatus').html("");
     //$('#findStatus').html(alert("No Records Found"));
    var search = $('#departmentSearch').val();
    var data = {};
    self=this;
    if(search.length >=1 )
    {
       
        data.emp_dept_name = search;


        this.departmentListView.collection.fetch({url:'/eprayoga/admin/search_department',reset: true, data:data, processData: true,
            success: function (coll) {
                $( '#departmentList' ).empty();
                $( '#departmentList' ).unbind();                       
                self.departmentListView.render();
            },
            error: function(err) {
                errorhandle(data);             
            }

        });
        $("#department_load_more").show();     
      }
      if(search.length == 0)
      {            
         
          skip = 0;
           this.departmentListView.collection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $( '#departmentList' ).empty();
                  $( '#departmentList' ).unbind();                       
                  self.departmentListView.render();   
              },       

          }); 
          $("#department_load_more").show();         
      }
    },
     deleteDepartment:function(e){
        e.preventDefault();
        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModaldepart').modal('toggle'); 
        var departmentId = $('#departid').val();
        var requestData = JSON.stringify({"emp_dept_id":departmentId});

       
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_department',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      //self.remove();
                       appRouter.currentView.render();
                      $( "div.success").html("Department has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });
     


    },


});
