var admin = admin || {};
admin.ClientGroupModel = Backbone.Model.extend({
	defaults: {
		"clnt_group_id" : null,
		"user_type_id": null,
		"clnt_group_code" : null,
		"clnt_group_name": null,		
		"clnt_group_contact_person_first_name" : null,
		"clnt_group_contact_person_last_name": null,
		"clnt_group_contact_person_off_phone": null,
		"clnt_group_contact_person_mobile": null,
		"clnt_group_dept_name": null,
		"clnt_group_contact_person_desgination": null,
		"clnt_group_pan": null,
		"clnt_group_off_email_id": null,
		"clnt_group_twitter_id": null,
		"clnt_group_facbook_id": null,
		"tax_id": null,
		"clnt_group_logo_file_name": null,
		"clnt_group_logo_location": null,
		"clnt_group_location": null,
		"orig_type_id": null,
		"created_on_timestamp" : null,
		"created_by_user_id" : null,
		"last_update_timestamp" : null,
		"last_update_user_id" : null,
		"is_active" : null,
		"is_deleted" : null,
		"website_url" : null,
		"address[0].cust_add_line_1": null,
		"address[0].cust_add_line_2": null,
		"address[0].cust_add_line_3": null,
		"address[0].cust_add_landmark": null,
		"address[0].cust_answer": null,
		"address[1].cust_add_line_1": null,
		"address[1].cust_add_line_2": null,
		"address[1].cust_add_line_3": null,
		"address[1].cust_add_landmark": null,
		"address[1].cust_answer": null,
		"security_qus.cust_answer": null,
	},
	idAttribute: 'clientgroupId'
});