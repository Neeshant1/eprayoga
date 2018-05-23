var admin = admin || {};
admin.InstructionCollection = Backbone.Collection.extend({
    model: admin.InstructionModel,
	url: '/eprayoga/admin/get_all_instruction',

	current_page: 1,

    parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        return response.data;  
   }  
});	