var admin = admin || {};
admin.SecurityQuestionModel = Backbone.Model.extend({
	defaults: {
		"question_id" : null,
		"question_name" : null,
		"sec_quest_code" : null,
		"is_active": null,
		"is_deleted": null,
		"created_by_user_id" : null,
		"last_update_user_id" : null,
		
	},
	idAttribute: 'sqId'
});
