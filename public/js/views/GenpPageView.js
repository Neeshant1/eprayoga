var admin = admin || {};

admin.GenpPageView = Backbone.View.extend({
    template: $( '#genpPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create_genp' : 'genpCreate',
       'click #genp_load_more'	 : 'loadMore',
       'click #genp_deleteall'	 : 'deletepop',
       'click #del_all_record'    :'deleteAll',
       'click #del_gen_parm'   : 'delGenp',
       'keypress #genp_search' :'Search'
      
	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	     this.genpListView = new admin.GenpTableView({el: $( '#genp_list' )});
		return this;
	},

	genpCreate:function(e){
    e.preventDefault();
		appRouter.navigate("renderGenpCreateForm", {trigger: true});
	},

 loadMore : function(e){
        e.preventDefault();
        this.genpListView.setShowPage();
		
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
      //  if(confirm("Do you want delete all record")){

           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_genpall',
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.genpListView.removeAll();
                      $( "div.success").html("All generic params are Deleted Successfully.");
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
      var search = $('#genp_search').val();
      var data = {};
      self=this;
      if(search.length >=1 )
      {
         
          data.search_text = search;
          this.genpListView.collection.fetch({url:'/eprayoga/admin/search_genp',reset: true, data:data, processData: true,
              success: function (coll) {
                  $( '#genp_list' ).empty();
                  $( '#genp_list' ).unbind();                       
                  self.genpListView.render();
              },
              error: function(err) {
                 errorhandle(data);                     
              }

          });
          $("#genp_load_more").show();     
      }
      if(search.length == 0)
      {            
         
          skip = 0;
           this.genpListView.collection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $( '#genp_list' ).empty();
                  $( '#genp_list' ).unbind();                       
                  self.genpListView.render();   
              },       

          }); 
          $("#genp_load_more").show();         
      }
  },
  delGenp:function(e){
        e.preventDefault();

        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModal').modal('toggle');

      

              var genpId = $('#genparid').val();

              var requestData = JSON.stringify({"generic_param_id":genpId});

              

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_genp',
                    data: requestData,
                    contentType:'application/json',
                    cache:false,
                    success: function(data) {

                       
                        appRouter.currentView.render();
                      $( "div.success").html("Generic param has been Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);
                    }
             });

    },


});
