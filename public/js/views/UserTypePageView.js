var admin = admin || {};

admin.UserTypePageView = Backbone.View.extend({
    template: $( '#userTypePageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),

	initialize: function() {
		this.render();    
	},

	events:{
       'click #create_usertype' : 'createUserType',
        'click #usertype_deleteall'    :'deletepop',
        'click #del_all_record'    :'deleteAll',
       'click #usertype_load_more'	 : 'loadMore',
       'keypress #usertype_search' :'Search',
       'click #del_usertype_id' : 'delUserType',

	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	     this.userTypeListView = new admin.UserTypeTableView({el: $( '#userTypeList' )});
		return this;
	},

	createUserType:function(e){
        e.preventDefault();
		appRouter.navigate("renderUserTypeCreateForm", {trigger: true});
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

       // if(confirm("Do you want delete all record")){

           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_allusertype',
                  //  data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.userTypeListView.removeAll();
                      $( "div.success").html("All user type are Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);

                    }
             });
	//	}
	},

	loadMore : function(e){
        e.preventDefault();
        this.userTypeListView.setShowPage(this.pageNo);
		
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
        var search = $('#usertype_search').val();
        var data = {};
        self=this;
        if(search.length >=1 )
        {
            data.user_type_name = search;

            this.userTypeListView.collection.fetch({url:'/eprayoga/admin/search_usertype',reset: true, data:data, processData: true,
                success: function (coll) {
                    $( '#userTypeList' ).empty();
                    $( '#userTypeList' ).unbind();                       
                    self.userTypeListView.render();
                },
                error: function(err) {
                    
                    errorhandle(data);
                     
                }
 
            });
            $("#usertype_load_more").show();     
        }
        if(search.length == 0)
        {            
            skip = 0;
             this.userTypeListView.collection.fetch({reset: true, data, processData: true,
                success: function (coll) {
                    $( '#userTypeList' ).empty();
                    $( '#userTypeList' ).unbind();                       
                    self.userTypeListView.render();   
                },       
 
            }); 
            $("#usertype_load_more").show();         
        }
    },

delUserType:function(e){
        e.preventDefault();
        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModalUserType').modal('toggle');

        var userTypeId = $('#usertypeid').val();

        var requestData = JSON.stringify({"user_type_id":userTypeId});


         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_usertype',
                    data: requestData,
                    contentType:'application/json',
                    cache:false,
                    success: function(data) {
                       //self.remove();
                       appRouter.currentView.render();
                      $( "div.success").html("User Type Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);

                    }
             });

    },




});
