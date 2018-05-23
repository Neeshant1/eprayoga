var admin = admin || {};
admin.ComplexityQuestionCollection = Backbone.Collection.extend({
    model: admin.ComplexityQuestionModel,
	url: '/eprayoga/admin/get_all_question_complexity',
	current_page: 1,

    parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        return response.data;  
   }  
});	