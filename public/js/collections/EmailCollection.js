var admin = admin || {};
admin.EmailCollection = Backbone.Collection.extend({
    model: admin.EmailModel,
	url: '/eprayoga/admin/get_all_email',

	 parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        return response.data;  
   }  
});	