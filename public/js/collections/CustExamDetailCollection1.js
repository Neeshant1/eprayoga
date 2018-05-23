var user = user || {};
user.CustExamDetailCollection1 = Backbone.Collection.extend({
    model: user.CustExamDetailModel,
	url: '/eprayoga/admin/get_cust_exam_cart1',
});	