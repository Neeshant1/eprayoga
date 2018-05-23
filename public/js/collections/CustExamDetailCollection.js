var user = user || {};
user.CustExamDetailCollection = Backbone.Collection.extend({
    model: user.CustExamDetailModel,
	url: '/eprayoga/admin/get_cust_exam_cart',
});	