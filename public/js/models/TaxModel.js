var admin = admin || {};
admin.TaxModel = Backbone.Model.extend({
	defaults: {
		"id" : null,
		"name":null,
		"description" : null,
		"value": null,		
		"sgst" : null,
		"cgst" : null,
		"igst" : null,
		"other_tax1" : null,
		"other_tax2" : null,
		"other_tax3" : null,
		
		
	},
	
	idAttribute: 'productCatalogId'
});