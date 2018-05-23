var user = user || {};
user.PerformaCollection = Backbone.Collection.extend({
    model: user.PerformaModel,
	url: '/eprayoga/user/get_all_performa',
	parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        
        console.log(response);
        return response;  
   }  
});	