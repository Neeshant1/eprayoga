var admin = admin || {};

admin.AddressTypePageView = Backbone.View.extend({
    template: $( '#addressTypePageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create_addresstype' : 'addressTypeCreate',
       'click #addresstype_deleteall'    :'deletepop',
       'click #del_all_record'    :'deleteAll',
       'click #addresstype_load_more'    : 'loadMore',
       'keypress #addressTypeSearch' :'Search',
       'click #del_add_type'    :'delAddressType',
	},

	render: function() {					
    this.$el.html(this.template);
    this.$el.append(this.template1);
    this.addressTypeListView = new admin.AddressTypeTableView({el: $( '#address_type_list' )});
		return this;
	},

	addressTypeCreate:function(e){
    e.preventDefault();
		appRouter.navigate("renderAddressTypeCreateForm", {trigger: true});
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
                    url: '/eprayoga/admin/delete_address_typeall',
                  //  data: requestData,
                    contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.addressTypeListView.removeAll();
                      $( "div.success").html("All Address-types are Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
             });
       
    },

    loadMore : function(e){
        e.preventDefault();

        this.addressTypeListView.setShowPage();
        
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
    var search = $('#addressTypeSearch').val();
    var data = {};
    self=this;
    if(search.length >=1 )
    {
        
        data.add_type_name = search;

        this.addressTypeListView.collection.fetch({url:'/eprayoga/admin/search_address_type',reset: true, data:data, processData: true,
            success: function (coll) {
                $( '#address_type_list' ).empty();
                $( '#address_type_list' ).unbind();                       
                self.addressTypeListView.render();
            },
            error: function(err) {
                
                errorhandle(err);                     
            }

        });
        $("#addresstype_load_more").show();     
      }
      if(search.length == 0)
      {            
         
          skip = 0;
           this.addressTypeListView.collection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $( '#address_type_list' ).empty();
                  $( '#address_type_list' ).unbind();                       
                  self.addressTypeListView.render();   
              },       

          }); 
          $("#addresstype_load_more").show();         
      }
    },

    delAddressType:function(e){
        e.preventDefault();

        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModalAddtype').modal('toggle'); 

        var addressTypeId = $('#addtypeid').val();
        var requestData = JSON.stringify({"add_type_id":addressTypeId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_address_type',
                    data: requestData,
                    contentType:'application/json',
                    cache:false,
                    success: function(data) {

                      // self.remove();
                       appRouter.currentView.render();
                      $( "div.success").html("Address-type has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });
      
    },


});