var user = user || {};
user.UserRenderQuestionCollection = Backbone.Collection.extend({
	model: user.UserRenderQuestionModel,
	url: '/eprayoga/admin/render_all_question',
	
});	