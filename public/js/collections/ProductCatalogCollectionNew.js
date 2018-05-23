var admin = admin || {};
admin.ProductCatalogCollectionNew = Backbone.Collection.extend({
    model: admin.ProductCatalogModel,
	url: '/eprayoga/admin/select_product_catalog',
	current_page:1,

	 parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
    	console.log(response);
    	
        return response;  
   }  
	

});	