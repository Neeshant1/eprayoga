var admin = admin || {};
admin.EmployeeCollection = Backbone.Collection.extend({
    model: admin.EmployeeModel,
	url: '/eprayoga/admin/get_all_employee',
	current_page: 1,


    parse : function(response){
        
        this.current_page = response.current_page;
        return response.data;  
   } 
});	