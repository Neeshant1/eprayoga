var admin = admin || {};
admin.FileTypeModel = Backbone.Model.extend({
	defaults: {

		"file_type_id" : null,
		"file_type_extension":null,
		"file_type_code" : null,
		"file_type_description": null,		
		"created_on_timestamp" : null,
		"created_by_user_id" : null,
		"last_update_timestamp" : null,
		"last_update_user_id" : null,

},
	idAttribute: 'filetypeId'
});