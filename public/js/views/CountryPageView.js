var admin = admin || {};

admin.CountryPageView = Backbone.View.extend({
    template: $( '#countryPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.pageNo = 1;
		this.render();    
	},

	events:{
       'click #create-country' : 'countryCreate',
       'click #country_deleteall'    :'deletepop',
       'click #del_all_record'    :'deleteAll',
       'click #country_load_more'	 : 'loadMore',
       'keypress #country_search' :'Search',
       'click #del_Country_id'  : 'delCountry',

	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	    this.countryListView = new admin.CountryTableView({el: $( '#countryList' )});
		return this;
	},

	countryCreate:function(e){
        e.preventDefault();
		appRouter.navigate("renderCountryCreateForm", {trigger: true});
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

           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_allcountry',
                  //  data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.countryListView.removeAll();
                      $( "div.success").html("All countries are Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
             });
		
	},

	loadMore : function(e){
        e.preventDefault();

        this.pageNo++;
        this.countryListView.setShowPage(this.pageNo);
		
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
        var search = $('#country_search').val();
        var data = {};
        self=this;
        if(search.length >=1 )
        {
           
            data.country_full_name = search;
            this.countryListView.collection.fetch({url:'/eprayoga/admin/search_country',reset: true, data:data, processData: true,
                success: function (coll) {
                    $( '#countryList' ).empty();
                    $( '#countryList' ).unbind();                       
                    self.countryListView.render();
                },
                error: function(err) {
                    errorhandle(err);                    
                }
 
            });
            $("#country_load_more").show();     
        }
        if(search.length == 0)
        {            
           
            skip = 0;
             this.countryListView.collection.fetch({reset: true, data, processData: true,
                success: function (coll) {
                    $( '#countryList' ).empty();
                    $( '#countryList' ).unbind();                       
                    self.countryListView.render();   
                },       
 
            }); 
            $("#country_load_more").show();         
        }
    },

 
  delCountry:function(e){
        e.preventDefault();

        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModal').modal('toggle'); 
        var countryId = $('#countrid').val();
        var requestData = JSON.stringify({"country_id":countryId});

     
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_country',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      //self.remove();
                      appRouter.currentView.render();
                      $( "div.success").html("Country has been Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);
                    }
             });
      
    },
});
