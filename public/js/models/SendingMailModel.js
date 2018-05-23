var admin = admin || {};
admin.SendingMailModel = Backbone.Model.extend({
	defaults: {
		"email_id" : null,
		"link" : null,
		"user_name": null,		
		"session_id" : null,
		"status" : null,
		
		
	},
	idAttribute: 'id'
});
 