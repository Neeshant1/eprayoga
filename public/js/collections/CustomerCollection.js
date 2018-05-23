var admin = admin || {};
admin.CustomerCollection = Backbone.Collection.extend({
    model: admin.CustomerModel,
	url: '/eprayoga/admin/get_all_customer',
	 current_page:1,

	 parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
    	console.log(response.data);
    	
        return response.data;  
   }  
});	