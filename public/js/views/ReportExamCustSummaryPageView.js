var admin = admin || {};

admin.ReportExamCustSummaryPageView = Backbone.View.extend({
  
  template : $('#reportExamSummaryCustPageTpl').html(),
   
	initialize: function() {
    var self = this;
		this.pageNo = 1;
     $.when(
    $.ajax(
        {
          url: "/eprayoga/admin/get_customer",
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
        self.clientCollectionView = new admin.MgntCustCollectionView(
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
          url: "/eprayoga/admin/get_exam_cust_summary",
          type: "GET",
          data: self.reqJSON,
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
            $('#examSummaryCustList').empty();
            $('#examSummaryCustList').unbind();
            if(data.length > 0){
            self.examData = data;
            for(i=0; i<self.examData.length; i++){
              var tpl = _.template($('#examSummaryCustReportTpl').html() );
              $('#examSummaryCustList').append(tpl(self.examData[i]));
           }
             } else {
                $('#examSummaryCustList').append('<center><h2 style="position:absolute">No Data Available</h2></center>');
             }
          
          },
          error: function(data)
          {
           errorhandle(data);


          }
        });
  },
 
});
