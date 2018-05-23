var user = user || {};
user.UserRenderQuestionModel = Backbone.Model.extend({
		defaults: {
			"question_id":null, 
			"question_type_id":null, 
			"question_txt_format":null,
			"question_option_txt" : null,
			"description" : null,
			"question_answer_txt": null,
			"online_exam_question_id": null,
			"pagination_desc" : null
		},
		idAttribute: 'question_id'
	});



