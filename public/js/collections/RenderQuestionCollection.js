var admin = admin || {};
admin.RenderQuestionCollection = Backbone.Collection.extend({
	model: admin.RenderQuestionModel,
	url: '/eprayoga/admin/render_all_question',
	
});	