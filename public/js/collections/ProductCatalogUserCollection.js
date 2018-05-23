var user = user || {};
user.ProductCatalogUserCollection = Backbone.Collection.extend({
    model: user.ProductCatalogList,
	url: '/eprayoga/user/get_all_product',
	current_page: 1,

    parse : function(response){
    	
    	this.current_page = response.current_page;
    	console.log(response.current_page);
    	console.log(response.data);
        return response.data;  
   }  
});	