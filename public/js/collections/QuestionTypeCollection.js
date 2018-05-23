var admin = admin || {};
admin.QuestionTypeCollection = Backbone.Collection.extend({
    model: admin.QuestionTypeModel,
	url: '/eprayoga/admin/get_all_question_type',
	current_page: 1,

    parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        return response.data;  
   }  
});	