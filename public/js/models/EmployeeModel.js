var admin = admin || {};
admin.EmployeeModel = Backbone.Model.extend({
	defaults: {
		"emp_employee_id" : null,
		"emp_name": null,
		"emp_id" : null,
		"employee_no": null,
		"emp_first_name": null,		
		"emp_last_name" : null,
		"emp_off_phone": null,
		"emp_mobile": null,
		"emp_dept_id": null,
		"emp_designation": null,
		"emp_pan": null,
		"emp_off_email_id": null,
		"emp_twitter_id": null,
		"emp_facbook_id": null,
		"emp_photo_file_name": null,
		"emp_photo_location": null,
		"emp_department": null,
		"emp_reporting_manager": null,
		"emp_status": null,
		"created_on_timestamp" : null,
		"created_by_user_id" : null,
		"last_update_timestamp" : null,
		"last_update_user_id" : null,
		"clnt_group_id" : null,
		"is_deleted" : null,
		"band"  :null,
		"address[0].cust_add_line_1": null,
		"address[0].cust_add_line_2": null,
		"address[0].cust_add_line_3": null,
		"address[0].cust_add_landmark": null,
		"address[1].cust_add_line_1": null,
		"address[1].cust_add_line_2": null,
		"address[1].cust_add_line_3": null,
		"address[1].cust_add_landmark": null,
	},
	idAttribute: 'empId'
});
