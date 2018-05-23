var admin = admin || {};
admin.TopicCollection = Backbone.Collection.extend({
    model: admin.TopicModel,
	url: '/eprayoga/admin/get_all_topic',
      current_page:1,
	    parse : function(response){
    	//console.log("inside collection view parse "+response);
    	//console.log("inside collection view parse "+response.data);
    	this.current_page = response.original.current_page;
    	console.log(response.original.data);
    	// response.data.forEach(function(item){
    	// 	var sid = parseInt(item.subject_id, 10);
    	// 	item.subject_id = sid;
    	// });
    	// console.log(response.data);
        return response.original.data;  
   }  
});	