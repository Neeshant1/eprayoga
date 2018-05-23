var admin = admin || {};
admin.PricingModel = Backbone.Model.extend({
	defaults: {
		"pricing_id" : null,
		"prc_type" : null,
		"prc_description" : null,
		"prc_eff_from_date": null,
		"prc_eff_to_date": null,
		"prc_detail_desc": null,
		"prc_active": null,
		"prc_currency": null,
		"prc_disc": null,
		"prc_price": null,
		"prc_payment_mode": null,
		"is_active" : null,
		"is_deleted" : null,	
		"created_by_user_id" : null,
		"last_update_user_id" : null,
		
	},
	idAttribute: 'pricingId'
});
