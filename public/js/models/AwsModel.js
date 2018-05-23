var admin = admin || {};
admin.AwsModel = Backbone.Model.extend({
	defaults: {
		"aws_s3_master_id" : null,
		"aws_s3_id" : null,
		"aws_access_key_id": null,		
		"aws_secret_access_key" : null,
		"s3_bucket_name" : null,
		"s3_url" : null,
		"used_for" : null,
		"is_active" : null,
		"created_by_user_id" : null,
		"last_update_user_id" : null,
		"is_active" : 1,
		"is_deleted" : 0
		
	},
	idAttribute: 'awsId'
});
