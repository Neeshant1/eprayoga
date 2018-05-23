var admin = admin || {};
admin.DepartmentCollection = Backbone.Collection.extend({
    model: admin.DepartmentModel,
	url: '/eprayoga/admin/get_all_emp_department',
	current_page: 1,

    parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        return response.data;  
   }  
});	