var admin = admin || {};
admin.FileTypeCollection = Backbone.Collection.extend({
    model: admin.FileTypeModel,
	url: '/eprayoga/admin/get_all_file_type',
	current_page: 1,

    parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        return response.data;  
   }  

});	