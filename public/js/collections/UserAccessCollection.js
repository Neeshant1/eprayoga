var admin = admin || {};
admin.UserAccessCollection = Backbone.Collection.extend({
    model: admin.UserAccessModel,
	url: '/eprayoga/admin/get_all_user_access',
    
  //    current_page:1,
	 // parse : function(response){
  //   	//console.log("inside collection view parse "+response);
  //   	//console.log("inside collection view parse "+response.data);
  //   	this.current_page = response.current_page;
  //       return response.data; 
  //   }
});	