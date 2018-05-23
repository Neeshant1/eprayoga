var admin = admin || {};
admin.ProductCatalogCollectionUser = Backbone.Collection.extend({
    model: admin.ProductCatalogModel,
	url: '/eprayoga/user/select_userproductcatalog',

	 parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	console.log(response);
    	
        return response;  
   }  
	

});	