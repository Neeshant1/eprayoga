var admin = admin || {};
admin.QuestionCollection = Backbone.Collection.extend({
	model: admin.QuestionModel,
	url: '/eprayoga/admin/get_all_question_page'
});	