var admin = admin || {};

admin.FaqPageView = Backbone.View.extend({
    template: $( '#faqPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create-faq' : 'faqCreate',
        'click #faq_deleteall'    :'deletepop',
        'click #del_all_record'    :'deleteAll',
       'click #faq_load_more'	 : 'loadMore',
       'click #del_faq_list'  : 'delFaq',
       'keypress #faqSearch' :'Search'
	},

	render: function() {					
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	     this.faqListView = new admin.FaqTableView({el: $( '#faqList' )});
		return this;
	},

	faqCreate:function(e){
        e.preventDefault();
		appRouter.navigate("renderFaqCreateForm", {trigger: true});
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
            //if(confirm("Do you want to Delete all records")){
           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_allfaq',
                  //  data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.faqListView.removeAll();
                      $( "div.success").html("All Faq's are Deleted Successfully.");
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
        var search = $('#faqSearch').val();
        var data = {};
        self=this;
        if(search.length >=1 )
        {
          
            data.search_text = search;
            this.faqListView.collection.fetch({url:'/eprayoga/admin/search_faq',reset: true, data:data, processData: true,
                success: function (coll) {
                    $( '#faqList' ).empty();
                    $( '#faqList' ).unbind();                       
                    self.faqListView.render();
                },
                error: function(err) {
                   errorhandle(data);                   
                }
 
            });
            $("#faq_load_more").show();     
        }
        if(search.length == 0)
        {            
           
            skip = 0;
             this.faqListView.collection.fetch({reset: true, data, processData: true,
                success: function (coll) {
                    $( '#faqList' ).empty();
                    $( '#faqList' ).unbind();                       
                    self.faqListView.render();   
                },       
 
            }); 
            $("#faq_load_more").show();         
        }
    },

  delFaq:function(e){
        e.preventDefault();

        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModalFaq').modal('toggle');


              var faqId = $('#faqid').val();

              var requestData = JSON.stringify({"faq_id":faqId});
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_faq',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                       appRouter.currentView.render();
                      $( "div.success").html("Faq has been Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);
                    }
             });
 

    },





});
