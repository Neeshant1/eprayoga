var admin = admin || {};
admin.AddressTypeCollection = Backbone.Collection.extend({
    model: admin.AddressTypeModel,
	url: '/eprayoga/admin/get_all_address_type',
	current_page: 1,


    parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        return response.data;  
   }  
});	