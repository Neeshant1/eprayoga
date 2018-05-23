var admin = admin || {};
admin.GenpModel = Backbone.Model.extend({
	defaults: {
		"generic_param_id" : null,
		"genp_code" : null,
		"genp_type": null,		
		"genp_desc": null,
		"genp_app_timezone": null,
		"genp_app_date_format": null,
		"created_by_user_id" : null,
		"last_update_user_id" : null,
		"genp_app_currency" : null,
		"genp_app_currency_symbol": null,
		"genp_app_default_language": null,
		"genp_app_out_going_email_add": null,
		"genp_active": null,
		"is_active" : null,
		"is_deleted": null
		
	},
	idAttribute: 'genpId'
});
