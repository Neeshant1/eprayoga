var admin = admin || {};
admin.DepartmentModel = Backbone.Model.extend({
	defaults: {
		"emp_dept_id" : null,
		"emp_dept_code" : null,
		"emp_dept_name": null,	
		"is_active": null,
		"is_deleted": null,	
		"created_on_timestamp" : null,
		"created_by_user_id" : null,
		"last_update_timestamp" : null,
		"last_update_user_id" : null,
	},
	idAttribute: 'departmentId'
});
