var admin = admin || {};
admin.InstructionModel = Backbone.Model.extend({
	defaults: {
		"instruction_id" : null,
		"inst_type_code" : null,
		"inst_description": null,		
		"created_by_user_id" : null,
		"last_update_user_id" : null,
		"inst_active" : null,
		"inst_eff_date_from" : null,
		"inst_eff_date_to" : null,
		"inst_type" : null,
		"is_active" : 1,
		"is_deleted" : 0
	},
	idAttribute: 'instId'
});