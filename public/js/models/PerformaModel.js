var user = user || {};
user.PerformaModel = Backbone.Model.extend({
	defaults: {
		
		"clnt_name":null,
		"cust_first_name" : null,
		"order_date" : null,
		"cust_pan" : null,
		"clnt_pan": null,
		"cust_add_line_1" : null,	
		"country_full_name" : null,	
		
	},
	
	
});
