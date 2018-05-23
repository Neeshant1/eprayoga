var admin = admin || {};
admin.UserTypeModel = Backbone.Model.extend({
	defaults: {
		"user_type_id" : null,
		"user_type_code" : null,
		"user_type_name": null,		

		"created_by_user_id" : null,
		"last_update_user_id" : null,
		"is_active" : 1,
		"is_deleted" : 0	
		
	},
	idAttribute: 'utId'
});
