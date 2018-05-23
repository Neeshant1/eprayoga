var admin = admin || {};
admin.SmsCollection = Backbone.Collection.extend({
    model: admin.SmsModel,
	url: '/eprayoga/admin/get_all_sms',

	 parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        return response.data;  
   }  
});	