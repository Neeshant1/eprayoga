var admin = admin || {};
admin.TopicCartCollection = Backbone.Collection.extend({
    model: admin.TopicModel,
	url: '/eprayoga/admin/get_coll_topic',
    //  current_page:1,
	    parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	//this.current_page = response.current_page;
    	console.log(response);
    	// response.data.forEach(function(item){
    	// 	var sid = parseInt(item.subject_id, 10);
    	// 	item.subject_id = sid;
    	// });
    	// console.log(response.data);
        return response.original;  
   }  
});	