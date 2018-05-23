var admin = admin || {};
admin.StateModel = Backbone.Model.extend({
	defaults: {
		"state_id" : null,
		"state_code" : null,
		"code" : null,
		"country_id": null,		
		"state_full_name" : null,
		"created_on_timestamp" : null,
		"created_by_user_id" : null,
		"last_update_timestamp" : null,
		"last_update_user_id" : null,
		"zone_area_id" : null,
		"is_active ":1,
		"is_deleted":0,
		"country_full_name":null
	},
	idAttribute: 'stateId'
});
