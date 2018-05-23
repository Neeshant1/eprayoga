var admin = admin || {};

admin.ReportTopicPageView = Backbone.View.extend({
   
     template : $('#reportTopicPageTpl').html(),  

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
          el: $('#questionClient2'),
          clientCollection: self.clientData
        });
        $('#questionClient2').val('1');
        $('#questionClient2').trigger('change');

    });
	},

	events:{
      
        'change #questionClient2' : 'selectTop'
    
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

  selectTop : function() {
    var self = this;
    var questionFormData1 = $("#questionClient2").val();
    self.reqJSON = {
      "client_id": questionFormData1
    }

      $.ajax(
        {
          url: "/eprayoga/admin/get_topic_list_client",
          type: "GET",
          data: self.reqJSON,
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
            $('#topicReportList').empty();
            $('#topicReportList').unbind();
            self.topicData = data;
            for(i=0; i<self.topicData.length; i++){
              var tpl = _.template($('#topicReportTpl').html() );
              $('#topicReportList').append(tpl(self.topicData[i]));
           
            }
          },
          error: function(data)
          {
            errorhandle(data);

          }
      });
  },
   
 
});
