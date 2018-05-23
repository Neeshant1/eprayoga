var admin = admin || {};
admin.RenderQuestionModel = Backbone.Model.extend({
		defaults: {
			"question_id":null, 
			"question_type_id":null, 
			"question_txt_format":null,
			"question_option_txt" : null,
			"description" : null,
			"question_answer_txt": null,
			"online_exam_question_id": null
		},
		idAttribute: 'question_id'
	});



