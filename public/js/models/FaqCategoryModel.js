var admin = admin || {};
admin.FaqCategoryModel = Backbone.Model.extend({
	defaults: {
		"faq_category_id" : null,
		"faq_category_code" : null,
		"is_public": null,		
		"faq_category_name" : null,
		"faq_category_description" : null,
		"notes" : null,
		"created_by_user_id" : null,
		"last_update_user_id" : null,
		"is_active" : 1,
		"is_deleted" : 0
		
	},
	idAttribute: 'faqCid'
});
