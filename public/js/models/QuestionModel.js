var admin = admin || {};
admin.QuestionModel = Backbone.Model.extend({
		defaults: {
			"question_id":null,  
			"client_id":null,
			"clnt_code" : null,
			"clnt_name" : null,
			"category_code":null,
			"category_name":null,
			"subject_code":null,
			"subject_name":null,
			"topic_code":null,
			"topic_name":null,
			"difficulty_level_code":null,
			"difficulty_level_name":null,
			"question_type_code":null,
			"question_type_name":null,
			"descriptive":null,
			"question_txt_format":null,
			"question_img_format":null,
			"pos_marks":null,
			"neg_marks":0,
			"is_active":null,
			"is_deleted":null,
			"created_on_timestamp":null,
			"created_by_user_id":null,
			"last_update_timestamp":null,
			"last_update_user_id":null,
			"tips" : null
		},
		idAttribute: 'question_id'
	});



