var admin = admin || {};
admin.CurrencyModel = Backbone.Model.extend({
	defaults: {
		"currency_id" : null,
		"currency_name" : null,
		"currency_code": null,	
		"code" : null,	
		"created_by_user_id" : null,
		"last_update_user_id" : null,
		"conv_rate" : null,
		"type" : null,
		"is_active" : 1,
		"is_deleted" : 0	
	},
	idAttribute: 'curId'
});
