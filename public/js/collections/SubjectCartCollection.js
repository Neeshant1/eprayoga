var admin = admin || {};
admin.SubjectCartCollection = Backbone.Collection.extend({
    model: admin.SubjectModel,
	url: '/eprayoga/admin/get_col_subject',
    //   current_page:1,
	    parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	//this.current_page = response.current_page;
    	console.log(response);
    	// response.data.forEach(function(item){
    	// 	var cid = parseInt(item.category_id, 10);
    	// 	item.category_id = cid;
    	// });
    	// console.log(response.data);
        return response;  
   }  
});	