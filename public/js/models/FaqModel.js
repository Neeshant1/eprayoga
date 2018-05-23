var admin = admin || {};
admin.FaqModel = Backbone.Model.extend({
	defaults: {
		"faq_id" : null,
		"faq_code" : null,
		"faq_category_id": null,
	    "faq_category_name" : null,
		"is_published" : null,
		"question" : null,
		"answer" : null,
		"keywords" : null,
		"notes" : null,
		"is_public" : null,
		"created_by_user_id" : null,
		"last_update_user_id" : null,
		"is_active" : 1,
		"is_deleted" : 0
		
	},
	idAttribute: 'faqId'
});
