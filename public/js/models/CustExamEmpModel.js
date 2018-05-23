var user = user || {};
user.CustExamEmpModel = Backbone.Model.extend({
	defaults: {
		"id" : null,
		"name" : null,
		"no_of_attempts" : null,
		"status": null,		
		"promo_code" : null,
		"exam_date" : null,
		"start_time" : null,
		"end_time": null,
		"description": null,
		"unit_qty": null,
		"exname": null,
		"valid_to": null,
		"valid_days": null,
		"order_detail_id": null,
		"promo_id": null,
		"product_catalog_id":null,
		"time_elapsed": null


	},
	idAttribute: 'promo_id,start_time'
});
