var admin = admin || {};

admin.ReportExamSummaryPageView = Backbone.View.extend({
  
  template : $('#reportExamSummaryPageTpl').html(),
   
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
          el: $('#questionClient'),
          clientCollection: self.clientData
        });
         // $('#questionClient').val('1');
         // $('#questionClient').trigger('change');
		       
    });
	},

	events:{
      
       'change #questionClient' : 'selectSub',
    
	},

	render: function() {					
	    this.$el.html(this.template);
      $('#examFrom').datetimepicker();
      $('#examTo').datetimepicker();     
		  return this;
	},

	loadMore : function(e){
      e.preventDefault();
      this.pageNo++;
      this.reportListView.setShowPage(this.pageNo);
		
	},

  selectSub : function(){
    var self = this;
    var questionFormData1 = $("#questionClient").val();
    var from = $("#examFrom").val();
    var to = $("#examTo").val();
    if ($('#examFrom').val().trim() == '' ) {
        $('#examFrom').focus();
        document.getElementById('news_date_error').innerHTML= "Please select the date.";             
        return false;
    } 

    if ($('#examTo').val().trim() == '' ) {
        $('#examTo').focus();
        document.getElementById('news_date_error2').innerHTML= "Please select the date.";             
        return false;
    } 
    self.reqJSON = {
      "client_id": questionFormData1,
      "from"     : from,
      "to"       : to
    }

      $.ajax(
        {
          url: "/eprayoga/admin/get_exam_summary",
          type: "GET",
          data: self.reqJSON,
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
            $('#examSummaryList').empty();
            $('#examSummaryList').unbind();
             if(data.length > 0){
                  self.examData = data;
                  for(i=0; i<self.examData.length; i++){
                    var tpl = _.template($('#examSummaryReportTpl').html() );
                    $('#examSummaryList').append(tpl(self.examData[i]));
                 
                  }
             } else {
                $('#examSummaryList').append('<center><h2 style="position:absolute">No Data Available</h2></center>');
             }
          
          },
          error: function(data)
          {
            errorhandle(data);

          }
        });
  },
 
});
