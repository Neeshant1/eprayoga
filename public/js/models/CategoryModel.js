var admin = admin || {};
admin.CategoryModel = Backbone.Model.extend({
	defaults: {
		"category_id" : null,
		//"clnt_id" : null,
		//"clnt_name" : null,
		"category_code": null,		
		"category_name" : null,
		"created_by_user_id" : null,
		"last_update_user_id" : null,
		"is_active" : 1,
		"is_deleted" : 0,
		"category_description":null	
		
	},
	idAttribute: 'catId'
});