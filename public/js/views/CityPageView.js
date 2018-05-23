    var admin = admin || {};
     
    admin.CityPageView = Backbone.View.extend({
        template: $( '#cityPageTpl' ).html(),
        template1:$( '#deleteallscript' ).html(),
        initialize: function() {
            this.render();    
        },
     
        events:{
           'click #create-city' : 'cityCreate',
           'click #city_deleteall'    :'deletepop',
           'click #del_all_record'    :'deleteAll',
           'click #city_load_more'    : 'loadMore',
           'keypress #city_search' :'Search',
           'click #del_city_id' : 'delCity',
        },

     
        render: function() {                    
            this.$el.html(this.template);
            this.$el.append(this.template1);
             this.cityListView = new admin.CityTableView({el: $( '#cityList' )});
            return this;
        },
     
        cityCreate:function(e){
            e.preventDefault();
            appRouter.navigate("renderCityCreateForm", {trigger: true});
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
                    url: '/eprayoga/admin/delete_allcity',
                  //  data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.cityListView.removeAll();
                      $( "div.success").html("All cities are deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
             });
       
    },

    loadMore : function(e){
        e.preventDefault();

        this.cityListView.setShowPage();
        
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
        var search = $('#city_search').val();
       
        var data = {};
        self=this;
        if(search.length >=1 )
        {
            
            data.city_full_name = search;

           

            this.cityListView.collection.fetch({url:'/eprayoga/admin/search_city',reset: true, data:data, processData: true,
                success: function (coll) {
                    $( '#cityList' ).empty();
                    $( '#cityList' ).unbind();                       
                    self.cityListView.render();
                },
                error: function(err) {
                   errorhandle(err);                  
                }
 
            });
            $("#city_load_more").show();     
        }
        if(search.length == 0)
        {            
           
            skip = 0;
             this.cityListView.collection.fetch({reset: true, data, processData: true,
                success: function (coll) {
                    $( '#cityList' ).empty();
                    $( '#cityList' ).unbind();                       
                    self.cityListView.render();   
                },       
 
            }); 
            $("#city_load_more").show();         
        }
    },
 delCity:function(e){
        e.preventDefault();

        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                     
        $('#myModal').modal('toggle'); 

       
        var cityId = $('#cityid').val();
        var requestData = JSON.stringify({"city_id":cityId});

      
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_city',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                       
                        appRouter.currentView.render();
                      $( "div.success").html("City has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);
                    }
             });
      

    },


     
    });