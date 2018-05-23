var admin = admin || {};
admin.ShoppingCartDetailModel = Backbone.Model.extend({
	defaults: {
		"id" : null,
		"product_catalog_id":null,
		"shopping_cart_master_id" : 0,
		"valid_from": null,		
		"valid_to" : null,
		"shopping_cart_date" : null,
		"order_seq" : null,
		"price" : null,
		"discount" : null,
		"bundle_price" : null,
		"sgst" : null,
		"cgst" : null,
		"igst" : null,
	    "other_tax1" : null,
        "other_tax2" : null,
        "other_tax3" : null,
		"grand_total" : null,
		"clnt_id" : null,
		"clnt_group_id" : null,
		"total_tax" : null,
		"grand_total" : null,
	},
	
	idAttribute: 'product_catalog_id'
});