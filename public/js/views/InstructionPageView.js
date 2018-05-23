var admin = admin || {};

admin.InstructionPageView = Backbone.View.extend({
    template: $( '#instructionPageTpl' ).html(),
    template1:$( '#deleteallscript' ).html(),
	initialize: function() {
		this.render();    
	},

	events:{
       'click #create-inst' : 'instCreate',
       //'click #edit-faq'    :'editFaq',
       'click #inst_load_more'	 : 'loadMore',
       'click #del-inst'	 : 'deletepop',
       'click #del_all_record'    :'deleteAll',
       'keypress #instructionSearch' :'Search',
       'click #del_instruct' : 'delInst',
       
	},

	render: function() {	
	 			
	    this.$el.html(this.template);
      this.$el.append(this.template1);
	     this.instructionListView = new admin.InstructionTableView({el: $( '#instruction_list' )});
		return this;
	},

	instCreate:function(e){
        e.preventDefault();
		appRouter.navigate("renderInstructionCreateForm", {trigger: true});
	},

loadMore : function(e){
        e.preventDefault();
        this.instructionListView.setShowPage();
		
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
        // if(confirm("Do you want delete all record")){

           $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_instructionall',
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      self.instructionListView.removeAll();
                      $( "div.success").html("All Instructions are Deleted Successfully.");

                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data);
                    }
             });
		//}
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
        var search = $('#instructionSearch').val();
        var data = {};
        self=this;
        if(search.length >=1 )
        {
           
            data.search_text = search;


            this.instructionListView.collection.fetch({url:'/eprayoga/admin/search_instruction',reset: true, data:data, processData: true,
                success: function (coll) {
                    $( '#instruction_list' ).empty();
                    $( '#instruction_list' ).unbind();                       
                    self.instructionListView.render();
                },
                error: function(err) {
                    errorhandle(data);             
                }
 
            });
            $("#inst_load_more").show();     
        }
        if(search.length == 0)
        {            
           
            skip = 0;
             this.instructionListView.collection.fetch({reset: true, data, processData: true,
                success: function (coll) {
                    $( '#instruction_list' ).empty();
                    $( '#instruction_list' ).unbind();                       
                    self.instructionListView.render();   
                },       
 
            }); 
            $("#inst_load_more").show();         
        }
    },


    delInst:function(e){
        e.preventDefault();

        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModalins').modal('toggle');

       

              var instId = $('#insid').val();

              var requestData = JSON.stringify({"instruction_id":instId});
       
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_instruction',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                      // self.remove();
                       appRouter.currentView.render();
                      $( "div.success").html("Instruction has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);
                    }
             });

    },
});
