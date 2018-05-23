var admin = admin || {};
admin.CityModel = Backbone.Model.extend({
	defaults: {
		"city_id" : null,
		"city_code" : null,
		"code" : null,
		"state_id": null,
		"country_id": null,		
		"city_full_name" : null,
		"created_on_timestamp" : null,
		"created_by_user_id" : null,
		"last_update_timestamp" : null,
		"last_update_user_id" : null,
		"state_full_name" : null,
		"country_full_name" : null,
		"is_active" :1,
		"is_deleted" : 0
	},
	idAttribute: 'cityId'
});
