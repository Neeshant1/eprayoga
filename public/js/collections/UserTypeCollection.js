var admin = admin || {};
admin.UserTypeCollection = Backbone.Collection.extend({
    model: admin.UserTypeModel,
	url: '/eprayoga/admin/get_all_user_type',

	    parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        return response.data;  
   }  
});	