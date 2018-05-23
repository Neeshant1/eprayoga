var admin = admin || {};
admin.ScheduleModel = Backbone.Model.extend({
	defaults: {
		"exam_schedule_id" : null,
		"user_profile_id" : null,
		"order_detail_id" : null,
		"exam_planned_date" : null,
		"exam_rescheduled_on" : null,
		"start_time": null,	
		"end_time": null,
		"actual_start_time" : null,
		"actual_end_time" : null,
		"status" : null,
		"is_schedule" : null,
		"category_id": null,
		"subject_id": null,
		"topic_id": null,
		"is_active": null,
		"is_deleted": null,	
		"created_by_user_id" : null,
		"last_update_user_id" : null,
		
	},
	idAttribute: 'scheduleId'
});
