var admin = admin || {};
admin.ClientTypeModel = Backbone.Model.extend({
	defaults: {

		"clnt_type_id" : null,
		"clnt_type_code" : null,
		"clnt_type_name": null,		
		"created_on_timestamp" : null,
		"created_by_user_id" : null,
		"last_update_timestamp" : null,
		"last_update_user_id" : null,

},
	idAttribute: 'clienttypeId'
});
