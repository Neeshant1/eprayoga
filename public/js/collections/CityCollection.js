var admin = admin || {};
admin.CityCollection = Backbone.Collection.extend({
    model: admin.CityModel,
	url: '/eprayoga/admin/get_all_city',

	current_page: 1,


    parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        return response.data;  
   }  
});	