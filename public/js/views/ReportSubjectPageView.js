var admin = admin || {};

admin.ReportSubjectPageView = Backbone.View.extend({
  
  template : $('#reportSubjectPageTpl').html(),
   
	initialize: function() {
    var self = this;
		this.pageNo = 1;
     $.when(
    $.ajax(
        {
          url: "/eprayoga/admin/get_client_id",
          type: "GET",
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {

            self.clientData = data;
          },
          error: function(data) {
            errorhandle(data);

          }
        })
     ).done(function()
      {

        
        self.render(); 

        self.clientCollectionView = new admin.MgntClientCollectionView(
        {
          el: $('#questionClient1'),
          clientCollection: self.clientData
        });
         $('#questionClient1').val('1');
         $('#questionClient1').trigger('change');
		       
    });
	},

	events:{
      
       'change #questionClient1' : 'selectSub',
    
	},

	render: function() {					
	    this.$el.html(this.template);
		  return this;
	},

	loadMore : function(e){
      e.preventDefault();
      this.pageNo++;
      this.reportListView.setShowPage(this.pageNo);
		
	},

  selectSub : function(){
    var self = this;
    var questionFormData1 = $("#questionClient1").val();
    self.reqJSON = {
      "client_id": questionFormData1
    }

     $.ajax(
        {
          url: "/eprayoga/admin/get_subject_list_client",
          type: "GET",
          data: self.reqJSON,
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
            $('#subjectReportList').empty();
            $('#subjectReportList').unbind();
           
            self.subjectData = data;
            for(i=0; i<self.subjectData.length; i++){
              var tpl = _.template($('#subjectReportTpl').html() );
              $('#subjectReportList').append(tpl(self.subjectData[i]));
           
            }
          },
          error: function(data)
          {
            errorhandle(data);


          }
        });
  },
 
});
