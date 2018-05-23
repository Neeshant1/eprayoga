var admin = admin || {};
admin.ZoneModel = Backbone.Model.extend({
	defaults: {
		"zone_area_id" : null,
		"zone_code" : null,
		"zone_name": null,		
		"description" : null,
		"created_by_user_id" : null,
		"last_update_user_id" : null,
		
	},
	idAttribute: 'zoneId'
});
