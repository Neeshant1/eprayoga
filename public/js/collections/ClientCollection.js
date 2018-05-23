var admin = admin || {};
admin.ClientCollection = Backbone.Collection.extend({
    model: admin.ClientModel,
	url: '/eprayoga/admin/get_all_client',

	parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        return response.data;  
   }  
});	