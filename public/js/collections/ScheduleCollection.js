var admin = admin || {};
admin.ScheduleCollection = Backbone.Collection.extend({
    model: admin.ScheduleModel,
	url: '/eprayoga/admin/get_all_schedule'
});	