var admin = admin || {};

admin.TaxCollection = Backbone.Collection.extend({
    model: admin.TaxModel,
	url: '/eprayoga/admin/get_all_tax_by_id',


});	