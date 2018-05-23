var admin = admin || {};
admin.EmailModel = Backbone.Model.extend({
	defaults: {
		"email_config_id" : null,
		"app_email_code" : null,
		"server_name": null,		
		"port" : null,
		"email" : null,
		"password" : null,
		"is_active" : 1,
		"is_deleted" :0
	},
	idAttribute: 'emailId'
});
