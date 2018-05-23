var admin = admin || {};

admin.ClientTypePageView = Backbone.View.extend({
    template: $( '#clientTypePageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create-clienttype' : 'clientCreate',
       'click #clienttype_load_more'	 : 'loadMore',
       'click #clienttype_deleteall'	 : 'deletepop',
       'click #del_all_record'    :'deleteAll',
       'keypress #clientTypeSearch' :'Search',
       'click #del_clnt_type'   : 'delClient',
       
	},

	render: function() {					
	    this.$el.html(this.template);
       this.$el.append(this.template1);
	     this.clientTypeListView = new admin.ClientTypeTableView({el: $( '#clienttypeList' )});
		return this;
	},

	clientCreate:function(e){
        e.preventDefault();
		appRouter.navigate("renderClienttypeCreateForm", {trigger: true});
	},
	loadMore : function(e){
        e.preventDefault();
        this.clientTypeListView.setShowPage();
		
	},
	
  deletepop:function(e){
    e.preventDefault();
      $('#myModaldeleteall').modal('show');
         
  },

	deleteAll:function(e){
        e.preventDefault();
        var self = this;
         $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModaldeleteall').modal('toggle');
       // if(confirm("Do you want delete all record")){

           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_client_typeall',
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.clientTypeListView.removeAll();
                      $( "div.success").html("All ClientTypes are deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
             });
		//}
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
    var search = $('#clientTypeSearch').val();
    var data = {};
    self=this;
    if(search.length >=1 )
    {
        
        data.clnt_type_name = search;
        this.clientTypeListView.collection.fetch({url:'/eprayoga/admin/search_client_type',reset: true, data:data, processData: true,
            success: function (coll) {
                $( '#clienttypeList' ).empty();
                $( '#clienttypeList' ).unbind();                       
                self.clientTypeListView.render();
            },
            error: function(err) {
               errorhandle(err);                     
            }

        });
        $("#clienttype_load_more").show();     
      }
      if(search.length == 0)
      {            
         
          skip = 0;
           this.clientTypeListView.collection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $( '#clienttypeList' ).empty();
                  $( '#clienttypeList' ).unbind();                       
                  self.clientTypeListView.render();   
              },       

          }); 
          $("#clienttype_load_more").show();         
      }
    },

    delClient:function(e){
        var self = this;
         $('body').removeClass('modal-open');                
         $('.modal-backdrop').remove();                      
         $('#myModal').modal('toggle'); 

              var clienttypeId = $('#clnttypeid').val();

              var requestData = JSON.stringify({"clnt_type_id":clienttypeId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_client_type',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                       //self.remove();
                       appRouter.currentView.render();
                      $( "div.success").html("ClientType has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);
                    }
             });
    },


});


