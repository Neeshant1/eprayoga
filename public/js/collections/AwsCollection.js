var admin = admin || {};
admin.AwsCollection = Backbone.Collection.extend({
    model: admin.AwsModel,
	url: '/eprayoga/admin/get_all_aws',

	 parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.current_page;
        return response.data;  
   }  
});	