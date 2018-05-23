var admin = admin || {};

admin.ReportExamListPageView = Backbone.View.extend({
   
  template : $('#reportExamPageTpl').html(),
   

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
          el: $('#questionClient3'),
          clientCollection: self.clientData
        });
        $('#questionClient3').val('1');
        $('#questionClient3').trigger('change');
       
    });
	},

	events:{
       
        'change #questionClient3' : 'selectExam',
    
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

  selectExam : function() {
    var self = this;
    var questionFormData1 = $("#questionClient3").val();
    self.reqJSON = {
      "client_id": questionFormData1
    }

      $.ajax(
        {
          url: "/eprayoga/admin/get_exam_list_client",
          type: "GET",
          data: self.reqJSON,
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
            $('#examReportList').empty();
            $('#examReportList').unbind();
            if(data.length > 0){
                  self.examData = data;
                for(i=0; i<self.examData.length; i++){
                  var tpl = _.template($('#examReportTpl').html() );
                  rule  = self.examData[i].rule.split(',');
                  value = self.examData[i].value.split(',');
                   $('#examReportList').append(tpl(self.examData[i]));
                  for(j=0;j<value.length;j++){
                    if(rule[j] == "no_of_question"){
                      $('#'+self.examData[i].id).find('#no_of_question').text(value[j]);
                    }else  if(rule[j] == "total_mark"){
                     $('#'+self.examData[i].id).find('#total_mark').text(value[j]);
                    }
                    
                  }
                 

                }
              } else {
                 $('#examReportList').append('<center><h2 style="position:absolute">No Data Available</h2></center>');

              }
        
          },
          error: function(data)
          {
            errorhandle(data);

          }
      });
  }
  
   
 
});
