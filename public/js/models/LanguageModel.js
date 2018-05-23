var admin = admin || {};
admin.LanguageModel = Backbone.Model.extend({
	defaults: {
		"language_id" : null,
		"language" : null,
		"language_short_name" : null,
		"language_code": null,	
		"is_active" : null,
		"is_deleted" : null,	
		"created_by_user_id" : null,
		"last_update_user_id" : null,
		
	},
	idAttribute: 'languageId'
});
