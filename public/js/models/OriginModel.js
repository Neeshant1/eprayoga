var admin = admin || {};
admin.OriginModel = Backbone.Model.extend({
	defaults: {
		"orig_type_id" : null,
		"orig_type_code" : null,
		"orig_type_name": null,	
		"is_active" : null,
		"is_deleted" : null,	
		"created_by_user_id" : null,
		"last_update_user_id" : null,
		
	},
	idAttribute: 'orId'
});
