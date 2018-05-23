var admin = admin || {};

admin.ExamDesignPageView = Backbone.View.extend({
    template: $( '#examDesignPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #createExamDesign' : 'examDesignCreate',
       'click #examDesign_load_more'	 : 'loadMore',
       'click #examDesign_deleteall'	 : 'deletepop',
       'click #del_all_record'    :'deleteAll',
       'keypress #examDesignSearch' :'Search',
       'click #del_exm_des'   : 'delfile',
      
	},

	render: function() {					
	    this.$el.html(this.template);
       this.$el.append(this.template1);
	    this.faqListView = new admin.ExamDesignTableView({el:$('#examDesignList')});
		return this;
	},

	examDesignCreate:function(e){
        e.preventDefault();
		appRouter.navigate("renderExamDesignCreateForm", {trigger: true});
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
                    url: '/eprayoga/admin/delete_exam_design_all',
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.faqListView.removeAll();
                      $( "div.success").html("All Exam Design's are Deleted Successfully.");
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
    var search = $('#examDesignSearch').val();
    var data = {};
    self=this;
    if(search.length >=1 )
    {
       
        data.question_name = search;      
        this.faqListView.collection.fetch({url:'/eprayoga/admin/search_exam_design',reset: true, data:data, processData: true,
            success: function (coll) {
                $( '#examDesignList' ).empty();
                $( '#examDesignList' ).unbind();                       
                self.faqListView.render();
            },
            error: function(err) {
               errorhandle(data);                   
            }

        });
        $("#examDesign_load_more").show();     
      }
      if(search.length == 0)
      {            
         
          skip = 0;
           this.faqListView.collection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $( '#examDesignList' ).empty();
                  $( '#examDesignList' ).unbind();                       
                  self.faqListView.render();   
              },       

          }); 
          $("#examDesign_load_more").show();         
      }
    },

      delfile:function(e){
        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModalExmDes').modal('toggle'); 
       

              var filetypeId = $('#exmid').val();

              var requestData = JSON.stringify({"product_catalog_id":filetypeId});

      
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_exam_design',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                
                       appRouter.currentView.render();
                      $( "div.success").html("Exam Design has been Deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);
                    }
             });

    },



});