var admin = admin || {};
admin.SubjectModel = Backbone.Model.extend({
	defaults: {
		"subject_id" : null,
		//"clnt_id" : null,
		//"clnt_name" : null,
		"category_id": null,		
		"subject_code" : null,
		"subject_name" : null,

		"created_by_user_id" : null,
		"last_update_user_id" : null,
		"is_active" : 1,
		"is_deleted" : 0,
		"sub_description" : null,	
		
	},
	idAttribute: 'subId'
});