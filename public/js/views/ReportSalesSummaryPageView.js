var admin = admin || {};

admin.ReportSalesSummaryPageView = Backbone.View.extend({
  
  template : $('#reportSalesSummaryPageTpl').html(),
   
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
      $('#salesFrom').datetimepicker();
      $('#salesTo').datetimepicker();     
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
    var from = $("#salesFrom").val();
    var to = $("#salesTo").val();
    if ($('#salesFrom').val().trim() == '' ) {
        $('#salesFrom').focus();
        document.getElementById('news_date_error').innerHTML= "Please select the date.";             
        return false;
    } 

    if ($('#salesTo').val().trim() == '' ) {
        $('#salesTo').focus();
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
          url: "/eprayoga/admin/get_sales_summary",
          type: "GET",
          data: self.reqJSON,
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
            $('#salesSummaryList').empty();
            $('#salesSummaryList').unbind();
              // $('#noData').empty();
              // $('#noData').unbind();
              // $('#salesTable').show();
            if(data.length > 0){
            
              self.salesData = data;
              for(i=0; i<self.salesData.length; i++){
                var tpl = _.template($('#salesSummaryReportTpl').html() );
                 $('#salesSummaryList').append(tpl(self.salesData[i]));
           
              }
            } else {
                 // $('#salesTable').empty();
                 // $('#salesTable').unbind();
                 $('#salesSummaryList').append('<center><h2 style="position:absolute">No Data Available</h2></center>');

            }
           
          },
          error: function(data)
          {
           errorhandle(data);

          }
        });
  },
 
});
