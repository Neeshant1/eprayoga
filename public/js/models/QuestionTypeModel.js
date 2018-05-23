var admin = admin || {};
admin.QuestionTypeModel = Backbone.Model.extend({
	defaults: {
		"question_type_id" : null,
		"question_type_code" : null,
		"question_type_name" : null,

		"created_by_user_id" : null,
		"last_update_user_id" : null,
		
	},
	idAttribute: 'qTypeId'
});
