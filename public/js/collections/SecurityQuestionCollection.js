var admin = admin || {};
admin.SecurityQuestionCollection = Backbone.Collection.extend({
    model: admin.SecurityQuestionModel,
	url: '/eprayoga/admin/get_all_security_questions',

	current_page: 1,

    parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        return response.data;  
   }  
});	