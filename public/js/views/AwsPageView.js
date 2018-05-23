var admin = admin || {};

admin.AwsPageView = Backbone.View.extend({
    template: $( '#awsPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create-aws' : 'awsCreate',
       'click #aws_deleteall'    :'deletepop',
       'click #del_all_record'    :'deleteAll',
       'click #del_aws_id'    :'delAws',
       'click #aws_load_more'	 : 'loadMore', 
       'keypress #awsSearch' :'Search'
       
	},

	render: function() {					
	  this.$el.html(this.template);
    this.$el.append(this.template1);
	  this.awsListView = new admin.AwsTableView({el: $( '#awsList' )});
		return this;
	},

	awsCreate:function(e){
    e.preventDefault();
		appRouter.navigate("renderAwsCreateForm", {trigger: true});
	},

 deletepop:function(e){
    e.preventDefault();
    $('#myModaldeleteall').modal('show');
         
  },

	deleteAll:function(e)
	{
        e.preventDefault();
        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModaldeleteall').modal('toggle');
        //  if(confirm("Do you want to delete all records")){
           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_allaws',
                  //  data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.awsListView.removeAll();
                      $( "div.success").html("All AWS are Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                      
                    }
             });
        //  }
		
	},

	loadMore : function(e){
        e.preventDefault();
        this.awsListView.setShowPage(this.pageNo);
		
	},

  Search:function (event) {
      //$('#findStatus').html(alert("No Records Found"));
       if(event.which == 13) {
         
          this.SearchText();
      return false;
      }

  },

  SearchText : function()
  {
    $('#findStatus').html("");
     //$('#findStatus').html(alert("No Records Found"));
    var search = $('#awsSearch').val();
    var data = {};
    self=this;
    if(search.length >=1 )
    {
       
        data.search_text = search;

        this.awsListView.collection.fetch({url:'/eprayoga/admin/search_aws',reset: true, data:data, processData: true,
            success: function (coll) {
                $( '#awsList' ).empty();
                $( '#awsList' ).unbind();                       
                self.awsListView.render();
            },
            error: function(err) {
                errorhandle(err);                     
            }

        });
        $("#aws_load_more").show();     
      }
      if(search.length == 0)
      {            
         
          skip = 0;
           this.awsListView.collection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $( '#awsList' ).empty();
                  $( '#awsList' ).unbind();                       
                  self.awsListView.render();   
              },       

          }); 
          $("#aws_load_more").show();         
      }
    },

     delAws:function(e){
        e.preventDefault();

        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModalaws').modal('toggle');  


       
        var awsId = $('#awsid').val();
        var requestData = JSON.stringify({"aws_s3_master_id":awsId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_aws',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      
                        appRouter.currentView.render();
                      $( "div.success").html("Aws has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);
                    }
             });


    },

});
