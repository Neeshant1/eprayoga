var user = user || {};
user.OrderDetailCollection = Backbone.Collection.extend({
    model: user.OrderDetailModel,
	url: '/eprayoga/admin/get_exam_cart',
});	