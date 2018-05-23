var admin = admin || {};
admin.CountryModel = Backbone.Model.extend({
	defaults: {
		"country_id" : null,
		"country_short_name" : null,
		"country_full_name": null,		
		"country_phonecode" : null,
		"created_on_timestamp" : null,
		"created_by_user_id" : null,
		"last_update_timestamp" : null,
		"last_update_user_id" : null,
		"zone_area_id" : null,
		"is_active ":1,
		"is_deleted":0,
		"zone_name":null,
	},
	idAttribute: 'countryId'
});
