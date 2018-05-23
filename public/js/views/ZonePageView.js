var admin = admin || {};

admin.ZonePageView = Backbone.View.extend({
    template: $( '#zonePageTpl' ).html(),
     template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create-zone' : 'zoneCreate',
       'click #zone_load_more'   : 'loadMore',
       'click #zone_deleteall'  : 'deletepop',
       'click #del_all_record'    :'deleteAll',
       'keypress #zonearea_search' :'Search',
       'click #del_zone_area' : 'delZone',
	},

	render: function() {					
	    this.$el.html(this.template);
       this.$el.append(this.template1);
	     this.zoneListView = new admin.ZoneTableView({el: $( '#zone_list' )});
		return this;
	},

	zoneCreate:function(e){
        e.preventDefault();
		appRouter.navigate("renderZoneCreateForm", {trigger: true});
	},

 loadMore : function(e){
        e.preventDefault();
        this.zoneListView.setShowPage();
    
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
                    url: '/eprayoga/admin/delete_zone_areaall',
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.zoneListView.removeAll();
                      $( "div.success").html("All zones are Deleted Successfully.");
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
        var search = $('#zonearea_search').val();
        var data = {};
        self=this;
        if(search.length >=1 )
        {
            data.zone_name = search;
            this.zoneListView.collection.fetch({url:'/eprayoga/admin/search_zonearea',reset: true, data:data, processData: true,
                success: function (coll) {
                    $( '#zone_list' ).empty();
                    $( '#zone_list' ).unbind();                       
                    self.zoneListView.render();
                },
                error: function(err) {
                    
                    errorhandle(data);
                    
                }
 
            });
            $("#zone_load_more").show();     
        }
        if(search.length == 0)
        {            
            skip = 0;
             this.zoneListView.collection.fetch({reset: true, data, processData: true,
                success: function (coll) {
                    $( '#zone_list' ).empty();
                    $( '#zone_list' ).unbind();                       
                    self.zoneListView.render();   
                },       
 
            }); 
            $("#zone_load_more").show();         
        }
    },

delZone:function(e){
        e.preventDefault();

        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModal').modal('toggle');  


              var zoneId = $('#zoneid').val();

              var requestData = JSON.stringify({"zone_area_id":zoneId});


         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_zone',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {                    
                      appRouter.currentView.render();
                      $( "div.success").html("Zone Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });
         
    },


});
