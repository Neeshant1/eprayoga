var admin = admin || {};
admin.ProductCatalogModel = Backbone.Model.extend({
	defaults: {
		"product_catalog_id" : null,
		"name":null,
		"description" : null,
		"label": null,		
		"price" : null,
		"discount" : null,
		"bundle_price" : null,
		"sgst" : null,
		"cgst" : null,
		"igst" : null,
		"other_tax1" : null,
		"other_tax2" : null,
		"other_tax3" : null,
		"valid_from" : null,
		"valid_to" : null,
		"valid_days" : null,
		"no_of_attempts" : null,
		"employee_band" : null,
		"category_id": null,		
		"subject_id" : null,
		"topic_id" : null,
		"clnt_id" : null,
		"clnt_group_id" : null,
		"created_by_user_id" : null,
		"last_update_user_id" : null,
		"created_on_timestamp" : null,
		"last_update_timestamp" : null,
		"populate_all" : null,
		"client_id":null,
		"exam_attempt_type_id" : null,
		"clnt_name" : null,
		"clnt_group_name" : null,
		"is_active" : null,
		"is_deleted" : null,
		
		


		
		
		
	},
	
	idAttribute: 'id'
});