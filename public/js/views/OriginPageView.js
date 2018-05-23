var admin = admin || {};

admin.OriginPageView = Backbone.View.extend({
    template: $( '#originPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create_origin' : 'originCreate',
       'click #origin_load_more'	 : 'loadMore',
       'click #origin_deleteall'	 : 'deletepop',
       'click #del_all_record'    :'deleteAll',
       'keypress #origin_search' :'Search',
       'click #del_origin_id' : 'delOrigin',
      
	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	     this.faqListView = new admin.OriginTableView({el: $( '#origin_list' )});
		return this;
	},

	originCreate:function(e){
        e.preventDefault();
		appRouter.navigate("renderOriginCreateForm", {trigger: true});
	},

loadMore : function(e){
        e.preventDefault();
        this.faqListView.setShowPage();
		
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

           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_originall',
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.faqListView.removeAll();
                      $( "div.success").html("All origins are deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
             });
		
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
      var search = $('#origin_search').val();
      var data = {};
      self=this;
      if(search.length >=1 )
      {
         
          data.orig_type_name = search;

          this.faqListView.collection.fetch({url:'/eprayoga/admin/search_origin',reset: true, data:data, processData: true,
              success: function (coll) {
                  $( '#origin_list' ).empty();
                  $( '#origin_list' ).unbind();                       
                  self.faqListView.render();
              },
              error: function(err) {
                  errorhandle(err);                   
              }

          });
          $("#origin_load_more").show();     
      }
      if(search.length == 0)
      {            
          skip = 0;
           this.faqListView.collection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $( '#origin_list' ).empty();
                  $( '#origin_list' ).unbind();                       
                  self.faqListView.render();   
              },       

          }); 
          $("#origin_load_more").show();         
      }
  },


   delOrigin:function(e){
        e.preventDefault();

        var self = this;
         $('body').removeClass('modal-open');                
         $('.modal-backdrop').remove();                      
         $('#myModalOrigin').modal('toggle');

       

              var originId = $('#originid').val();

              var requestData = JSON.stringify({"orig_type_id":originId});

              


         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_origin',
                    data: requestData,
                    contentType:'application/json',
                    cache:false,
                    success: function(data) {

                       //self.remove();
                        appRouter.currentView.render();
                      $( "div.success").html("Origin has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);
                    }
             });
       

    },




});
