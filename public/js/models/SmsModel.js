var admin = admin || {};
admin.SmsModel = Backbone.Model.extend({
	defaults: {
		"sms_config_id" : null,
		"app_sms_code" : null,
		"app_sms_gateway_name": null,		
		"app_sms_user_id" : null,
		"app_sms_user_password" : null,
		"app_sms_gateway_url" : null,
		"app_sms_gateway_status": null,
		"app_sms_registered_phone_number": null,
		"app_sms_gateway_authentication_tocken" : null,
		"app_sms_gateway_api_id" : null,
		"is_active" : 1,
		"is_deleted" : 0

	},
	idAttribute: 'smsId'
});
