var admin = admin || {};

admin.ReportExamPerformanceSummaryPageView = Backbone.View.extend({
  
  template : $('#reportExamPerformanceSummaryCustPageTpl').html(),
   
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

            self.custData = data;
          },
          error: function(data) {
            errorhandle(data);


          }
        }),
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

        self.clientCollectionView = new admin.MgntCustCollectionView(
        {
          el: $('#questionCustomer'),
          clientCollection: self.custData
        });
         // $('#questionClient').val('1');
         // $('#questionClient').trigger('change');
		       
    });
	},

	events:{
      
       'change #questionClient' : 'selectClnt',
       'change #questionCustomer' : 'selectCust'
    
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

  selectClnt : function(){
    var self = this;
    var questionFormData1 = $("#questionClient").val();
    self.reqJSON = {
      "client_id": questionFormData1
    }

      $.ajax(
      {
          url: "/eprayoga/admin/get_examPerformanceClnt_summary",
          type: "GET",
          data: self.reqJSON,
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
            $('#examPerformanceSummaryClntList').empty();
            $('#examPerformanceSummaryClntList').unbind();
            $('#examPerformanceSummaryCustList').empty();
            $('#examPerformanceSummaryCustList').unbind();
            if(data.length > 0){
              self.examData = data;
              for(i=0; i<self.examData.length; i++){
                var tpl = _.template($('#examPerformanceSummaryClntReportTpl').html() );
                $('#examPerformanceSummaryClntList').append(tpl(self.examData[i]));
           
              }
            } else {
              $('#examPerformanceSummaryClntList').append('<center><h2 style="position:absolute">No Data Available</h2></center>');
              $('#examPerformanceSummaryCustList').append('<center><h2 style="position:absolute">No Data Available</h2></center>');

            }
            
          },
          error: function(data)
          {
            errorhandle(data);


          }
      });
  },

  selectCust : function(){
    var self = this;
    var questionFormData1 = $("#questionCustomer").val();
    self.reqJSON = {
      "client_id": questionFormData1
    }

      $.ajax(
      {
          url: "/eprayoga/admin/get_examPerformanceCust_summary",
          type: "GET",
          data: self.reqJSON,
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
            $('#examPerformanceSummaryClntList').empty();
            $('#examPerformanceSummaryClntList').unbind();
            $('#examPerformanceSummaryCustList').empty();
            $('#examPerformanceSummaryCustList').unbind();
            self.examData = data;
            for(i=0; i<self.examData.length; i++){
              var tpl = _.template($('#examPerformanceSummaryCustReportTpl').html() );
              $('#examPerformanceSummaryCustList').append(tpl(self.examData[i]));
           
            }
          },
          error: function(data)
          {
            errorhandle(data);


          }
      });
  },
 
});
