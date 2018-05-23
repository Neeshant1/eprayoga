var admin = admin || {};
admin.FaqCollection = Backbone.Collection.extend({
    model: admin.FaqModel,
	url: '/eprayoga/admin/get_all_faq',

	    parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        return response.data;  
   }  
});	