var admin = admin || {};
admin.ComplexityQuestionModel = Backbone.Model.extend({
	defaults: {
		"difficulty_level_id" : null,
		"difficulty_level_code" : null,
		"difficulty_level_name": null,
		"is_active" :1,
		"is_deleted" : 0,		

		"created_by_user_id" : null,
		"last_update_user_id" : null,
		
	},
	idAttribute: 'comQusId'
});
