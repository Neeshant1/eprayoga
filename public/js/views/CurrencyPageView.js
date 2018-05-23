var admin = admin || {};

admin.CurrencyPageView = Backbone.View.extend({
    template: $( '#currencyPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
  initialize: function() {
    this.render();    
  },

  events:{
       'click #create-currency' : 'currencyCreate',
       'click #currency_deleteall'    :'deletepop',
       'click #del_all_record'    :'deleteAll',
       'click #currency_load_more'   : 'loadMore',
       'keypress #currency_search'  : 'currencySearch',
       'click #del_curren'   : 'delCurrency',
  },

  render: function() {          
      this.$el.html(this.template);
        this.$el.append(this.template1);
       this.currencyListView = new admin.CurrencyTableView({el: $( '#currency-list' )});
    return this;
  },

  currencyCreate:function(e){
        e.preventDefault();
    appRouter.navigate("renderCurrencyCreateForm", {trigger: true});
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
        //  if(confirm("Do you want to delete all record")){
           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_allcurrency',
                  //  data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.currencyListView.removeAll();
                      $( "div.success").html("All Currencies are Deleted Successfully.");
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
        this.currencyListView.setShowPage(this.pageNo);
    
  },

  // currencySearch:function () {
  //       $('#findStatus').html("");
  //       var searchCurrencyTxt = $('#currency_search').val();
  //       console.log('searchCurrencyTxt');console.log(searchCurrencyTxt);
  //       var data = {};
  //       self=this;
  //       if(searchCurrencyTxt.length > 0) {
  //           console.log("more");
  //           data.currency_name = searchCurrencyTxt;
  //           this.currencyListView.collection.fetch({reset: true, data:data, processData: true,
  //               success: function (coll) {
  //                   $( '#currency-list' ).empty();
  //                   $( '#currency-list' ).unbind(); 
  //                   if(self.currencyListView.collection.length == 0){
  //                       //$('#no-record-found').show();
  //                      // $('#SearchResult').html("Search Result not found");
  //                       offset = 0;
  //                       data.limit = limit;
  //                       data.offset = offset;
  //                       self.currencyListView.collection.fetch({reset: true, data:data, processData: true});
  //                       self.currencyListView.render();

  //                   }   
  //                  //$('#SearchResult').html("");
  //                   else{
  //                       //$('#SearchResult').html("");                    
  //                       //$('#no-record-found').hide();
  //                       self.currencyListView.render();
  //                   }                                                                    
  //               },
  //               error: function(data) {
  //                   try{
  //                       var errData = JSON.parse(data.responseText);
  //                       if ( errData.errCode == 550) {
  //                           window.location.href = '/sessionExpired';
  //                       } else {
  //                           if (errData.errMsg.length > 0) {
  //                             var failureMsg = errData.errMsg;  
  //                           } else {
  //                             var failureMsg = "Error while Searching Currency, Please Contact Administrator.";  
  //                           }
  //                               $( "div.failure").html(failureMsg);
  //                               $( "div.failure" ).fadeIn( 300 ).delay( 3500 ).fadeOut( 800 );              
  //                       }
  //                   }catch(e){
  //                       window.location.href = '/sessionExpired';
  //                   }
  //               }
  //           });
  //           $("#currency_load_more").hide();     
  //       }
  //       if(searchCurrencyTxt.length == 0) {            
  //           console.log("empty");
  //           offset = 0;
  //           data.limit = limit;
  //           data.offset = offset;
  //           this.currencyListView.collection.fetch({reset: true, data:data, processData: true,
  //               success: function (coll) {
  //                   $( '#currency-list' ).empty();
  //                   $( '#currency-list' ).unbind();
  //                   $('#SearchResult').html("");
  //                   $('#no-record-found').hide();
  //                   self.userTableView.render();   
  //               },
  //               error: function(err) {
  //               //     try{
  //               //         var errData = JSON.parse(data.responseText);
  //               //         if ( errData.errCode == 550) {
  //               //             window.location.href = '/sessionExpired';
  //               //         } else {
  //               //             if (errData.errMsg.length > 0) {
  //               //               var failureMsg = errData.errMsg;  
  //               //             } else {
  //               //               var failureMsg = "Error while Searching Currency, Please Contact Administrator.";  
  //               //             }
  //               //                 $( "div.failure").html(failureMsg);
  //               //                 $( "div.failure" ).fadeIn( 300 ).delay( 3500 ).fadeOut( 800 );              
  //               //          }
  //               //     }catch(e){
  //               //         window.location.href = '/sessionExpired';
  //               //     }                     
  //                }
  //           }); 
  //               $("#currency_load_more").show();         
  //       }
  //    }      

      currencySearch:function (event) {
        
         //$('#findStatus').html(alert("No Records Found"));
         if(event.which == 13) {
            this.currencySearchText();
        return false;
        }

       },

       currencySearchText : function()
       {
        $('#findStatus').html("");
         //$('#findStatus').html(alert("No Records Found"));
        var search_currency = $('#currency_search').val();
        var data = {};
        self=this;
        if(search_currency.length >=1 )
        {
            data.currency_name = search_currency;


            this.currencyListView.collection.fetch({url:'/eprayoga/admin/search_currency',reset: true, data:data, processData: true,
                success: function (coll) {
                    $( '#currency-list' ).empty();
                    $( '#currency-list' ).unbind();                       
                    self.currencyListView.render();
                },
                error: function(err) {
                   errorhandle(err);                 
                }
 
            });
            $("#currency_load_more").show();     
        }
        if(search_currency.length == 0)
        {            
           
            skip = 0;
             this.currencyListView.collection.fetch({reset: true, data, processData: true,
                success: function (coll) {
                    $( '#currency-list' ).empty();
                    $( '#currency-list' ).unbind();                       
                    self.currencyListView.render();   
                },       
 
            }); 
            $("#currency_load_more").show();         
        }
    },

 delCurrency:function(e){
      $('.popover-content').hide();
     
        e.preventDefault();
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModal').modal('toggle'); 

        var self = this;


              var currencyId = $('#currid').val();

              var requestData = JSON.stringify({"currency_id":currencyId});
       
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_currency',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                  
                      appRouter.currentView.render();
                      $( "div.success").html("Currency Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
             });
     

    },



});
