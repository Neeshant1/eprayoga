var admin = admin || {};
admin.PcExamDetailCollection = Backbone.Collection.extend({
    model: admin.PcExamDetailModel,
	url: '/eprayoga/admin/get_pc_exam_details',
});	