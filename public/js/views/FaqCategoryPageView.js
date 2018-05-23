var admin = admin || {};

admin.FaqCategoryPageView = Backbone.View.extend({
    template: $( '#faqCategoryPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #faq-category-create' : 'faqCategoryCreate',
        'click #faq_category_deleteall'    :'deletepop',
        'click #del_all_record'    :'deleteAll',
       'click #faq_category_load_more'	 : 'loadMore',
       'click #del_faqcat'   : 'delFaqCategory',
       'keypress #faqcategory_search' :'Search'
	},

	render: function() {					
	    this.$el.html(this.template);
       this.$el.append(this.template1);
	     this.faqListView = new admin.FaqCategoryTableView({el: $( '#faqCategoryList' )});
		return this;
	},

	faqCategoryCreate:function(e){
    e.preventDefault();
		appRouter.navigate("renderFaqCategoryCreateForm", {trigger: true});
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

          //if(confirm("Do you want to delete all records")){
           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_allfaqcategory',
                  //  data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.faqListView.removeAll();
                      $( "div.success").html("All Faq Categories are Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
             });

		//}
	},

	loadMore : function(e){
        e.preventDefault();
        this.faqListView.setShowPage(this.pageNo);
		
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
        var search = $('#faqcategory_search').val();
       
        var data = {};
        self=this;
        if(search.length >=1 )
        {
           
            data.faq_category_name = search;        
            this.faqListView.collection.fetch({url:'/eprayoga/admin/search_faqcategory',reset: true, data:data, processData: true,
                success: function (coll) {
                    $( '#faqCategoryList' ).empty();
                    $( '#faqCategoryList' ).unbind();                       
                    self.faqListView.render();
                },
                error: function(err) {
                    errorhandle(data);            
                }
 
            });
            $("#faq_category_load_more").show();     
        }
        if(search.length == 0)
        {            
            skip = 0;
             this.faqListView.collection.fetch({reset: true, data, processData: true,
                success: function (coll) {
                    $( '#faqCategoryList' ).empty();
                    $( '#faqCategoryList' ).unbind();                       
                    self.faqListView.render();   
                },       
 
            }); 
            $("#faq_category_load_more").show();         
        }
    },


delFaqCategory:function(e){
        e.preventDefault();
        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModal').modal('toggle');   
        var faqCatId = $('#faqcatid').val();
        var requestData = JSON.stringify({"faq_category_id":faqCatId});
       
         $.ajax({
              type: 'POST',
              url: '/eprayoga/admin/delete_faqcategory',
              data: requestData,
               contentType:'application/json',
              cache:false,
              success: function(data) {
               
                 appRouter.currentView.render();
                $( "div.success").html("Faq Category has been Deleted Successfully.");
                $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
              },
              error: function(data) {
                 errorhandle(data);
              }
          });


    },


});
