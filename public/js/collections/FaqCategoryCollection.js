var admin = admin || {};
admin.FaqCategoryCollection = Backbone.Collection.extend({
    model: admin.FaqCategoryModel,
	url: '/eprayoga/admin/get_all_faqcategory',

	    parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        return response.data;  
   }  
});	