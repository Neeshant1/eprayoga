var admin = admin || {};
admin.TopicModel = Backbone.Model.extend({
	defaults: {
		"topic_id" : null,
		//"client_id" : null,
		//"clnt_name" : null,
		"category_id": null,		
		"subject_id" : null,
		"topic_code" : null,
		"topic_name" : null,

		"created_by_user_id" : null,
		"last_update_user_id" : null,
		"topic_description" : null,
		
	},
	idAttribute: 'topicId'
});
