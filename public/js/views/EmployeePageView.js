var admin = admin || {};

admin.EmployeePageView = Backbone.View.extend({
    template: $( '#employeePageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create-employee' : 'employeeCreate',
       'click #employeeDelAll'    :'deletepop',
       'click #del_all_record'    :'deleteAll',
       'click #employeeLoadMore'    : 'loadMore',
       'keypress #employeeSearch' :'Search',
       'click #del_Emp_id'    : 'delEmployee',
	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	     this.employeeListView = new admin.EmployeeTableView({el: $( '#employeeList' )});
		return this;
	},

	employeeCreate:function(e){
    e.preventDefault();
		appRouter.navigate("renderEmployeeCreateForm", {trigger: true});
	},
   deletepop:function(e){
    e.preventDefault();
      $('#myModaldeleteall').modal('show');
         
    },
	deleteAll:function(e)
    {
        e.preventDefault();
        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModaldeleteall').modal('toggle');
       

           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_employee_all',
                  //  data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.employeeListView.removeAll();
                      $( "div.success").html("All Employees are Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
             });
  
    },

    loadMore : function(e){
        e.preventDefault();

        this.employeeListView.setShowPage();
        
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
    var search = $('#employeeSearch').val();
    var data = {};
    self=this;
    if(search.length >=1 )
    {
       
        data.search_text = search;
        this.employeeListView.collection.fetch({url:'/eprayoga/admin/search_employee',reset: true, data:data, processData: true,
            success: function (coll) {
                $( '#employeeList' ).empty();
                $( '#employeeList' ).unbind();                       
                self.employeeListView.render();
            },
            error: function(err) {
               errorhandle(data);          
            }

        });
        $("#employeeLoadMore").show();     
      }
      if(search.length == 0)
      {            
        
          skip = 0;
           this.employeeListView.collection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $( '#employeeList' ).empty();
                  $( '#employeeList' ).unbind();                       
                  self.employeeListView.render();   
              },       

          }); 
          $("#employeeLoadMore").show();         
      }
    },


  delEmployee:function(e){
        e.preventDefault();

        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModalEmp').modal('toggle'); 

        var empId =  $('#emplid').val();
        var requestData = JSON.stringify({"emp_employee_id":empId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_employee',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

     
                       appRouter.currentView.render();
                      $( "div.success").html("Employee has been Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

  },

});
