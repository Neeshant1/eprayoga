var admin = admin || {};
admin.ClientTypeCollection = Backbone.Collection.extend({
    model: admin.ClientTypeModel,
	url: '/eprayoga/admin/get_all_client_type',
	current_page: 1,

    parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        return response.data;  
   }  

});	