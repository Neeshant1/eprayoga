var admin = admin || {};
admin.CurrencyCollection = Backbone.Collection.extend({
    model: admin.CurrencyModel,
	url: '/eprayoga/admin/get_all_currency',

	    parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        return response.data;  
   }  
});	