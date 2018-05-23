var user = user || {};
user.CustExamEmpCollection = Backbone.Collection.extend({
    model: user.CustExamEmpModel,
	url: '/eprayoga/admin/get_exam_cart_one',
});	