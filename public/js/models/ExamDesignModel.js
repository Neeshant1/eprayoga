var admin = admin || {};
admin.ExamDesignModel = Backbone.Model.extend({
	defaults: {
		"product_catalog_id" : null,
		"category_id": null,		
		"subject_id" : null,
		"topic_id" : null,
		"rule" : null,
		"value" :null,
		"category_name" : null,
		"name" : null,
		"subject_name" : null,
		"id" : null,
		"topic_name" : null,
		


		
		
		
	},
	
	idAttribute: 'id'
});