var user = user || {};
user.OrderDetailModel = Backbone.Model.extend({
	defaults: {
		"product_catalog_id" : null,
		"user_profile_id" : null,
		"name" : null,
		"description" : null,
		"category_id" : null,
		"subject_id" : null,
		"topic_id" : null,
		"exam_date" : null,
		"start_time" : null,
		"end_time" : null,
		"is_schedule" : null,
		"exam_trans_ref_no" : null,
		"client_id" : null,
		
		
	},
	idAttribute: 'id'
});
