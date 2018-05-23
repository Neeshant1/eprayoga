var admin = admin || {};
admin.AddressTypeModel = Backbone.Model.extend({
	defaults: {
		"add_type_id" : null,
		"add_type_code" : null,
		"add_type_name": null,		
		"created_by_user_id" : null,
		"last_update_user_id" : null,
		"orig_type_code" : null,
		"orig_type_name": null,
		"is_active" : null,
		"is_deleted": null
		
	},
	idAttribute: 'addTypeId'
});
