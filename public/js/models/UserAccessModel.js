var admin = admin || {};
admin.UserAccessModel = Backbone.Model.extend({
	defaults: {
		"user_access_log_id" : null,
		"user_profile_id" : null,
		"login_ip_address": null,		
		"created_by_user_id" : null,
		"last_update_user_id" : null,
		"app_signon_type" : null,
		"login_timestamp" : null,
		"logout_timestamp" : null,
		"is_active":1,
		"is_deleted":0	
	},
	idAttribute: 'useraccessId'
});
