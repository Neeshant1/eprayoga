var admin = admin || {};

admin.ReportPageView = Backbone.View.extend({
    template  : $( '#reportPageTpl' ).html(),
   
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

        $('#questionClient').val('1');
        $('#questionClient').trigger('change');
		       
    });
	},

	events:{
       'change  #questionClient': 'selectcat',
      
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

  selectcat : function() {
    var self = this;
    var questionFormData1 = $("#questionClient").val();
    self.reqJSON = {
      "client_id": questionFormData1
    }

     $.ajax(
        {
          url: "/eprayoga/admin/get_category_list_client",
          type: "GET",
          data: self.reqJSON,
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
            $('#categoryReportList').empty();
            $('#categoryReportList').unbind();
            self.categoryData = data;
            for(i=0; i<self.categoryData.length; i++){
              var tpl = _.template($('#categoryReportTpl').html() );
              $('#categoryReportList').append(tpl(self.categoryData[i]));
             // $('#categoryCode').html(self.categoryData[i].category_code);
            }
          },
          error: function(data)
          {
            errorhandle(data);

          }
        });
  }
   
 
});
