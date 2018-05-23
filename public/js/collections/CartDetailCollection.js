var user = user || {};
user.CartDetailCollection = Backbone.Collection.extend({
    model: user.CartDetailModel,
	url: '/eprayoga/user/get_all_cart_details',
});	