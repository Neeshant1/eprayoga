var admin = admin || {};
admin.TotalQuestionCollection = Backbone.Collection.extend({
	model: admin.QuestionModel,
	url: '/eprayoga/admin/get_all_question'
});	