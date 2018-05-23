var admin = admin || {};
admin.PcExamDetailModel = Backbone.Model.extend({
	defaults: {
		"product_catalog_id" : null,
		"user_profile_id" : null,
		"name" : null,
		"no_of_attempts" :null,
		"unit_qty" : null,
		"description" : null,
		"category_id" : null,
		"subject_id" : null,
		"topic_id" : null,
		"exam_date" : null,
		"start_time" : null,
		"end_time" : null,
		"is_schedule" : null
		
	},
	idAttribute: 'id'
});
