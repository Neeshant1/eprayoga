var admin = admin || {};
admin.ExamDesignCollection = Backbone.Collection.extend({
    model: admin.ExamDesignModel,
	url: '/eprayoga/admin/get_all_exam_design',
	 current_page:1,

	 parse : function(response){
    	
    	this.current_page = response.current_page;
    	console.log(response.data);
    	
        return response.data;  
   }  
	

});	