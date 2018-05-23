var user = user || {};
user.ProductCatalogHomeCollection = Backbone.Collection.extend({
    model: user.ProductCatalogHomeList,
	url: '/eprayoga/user/get_all_product_home',
	current_page: 1,
	 parse : function(response){
    	this.current_page = response.current_page;
    	console.log(response);
        return response.data;  
   }   
	
});	