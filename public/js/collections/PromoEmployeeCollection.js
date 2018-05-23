var admin = admin || {};
admin.PromoEmployeeCollection = Backbone.Collection.extend({
    model: admin.EmployeeModel,
	url: '/eprayoga/admin/get_employee_promo',
	

});	