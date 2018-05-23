var admin = admin || {};

admin.ComplexityQuestionRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'question_complexity_list',
	  template: $( '#complexityQuestionTemplate' ).html(),

    initialize: function() {
        this.firstRender = true;
        this.activeId = -1;
        this.recIndex = 0;
    	_.bindAll(this, "render");
        this.model.bind('change', this.render);
	},

     setActiveId: function(value, recIndex) {

    this.activeId = value;
    this.recIndex = recIndex;
   
  },

    events:{
       'click #edit-qusComplexity'    :'editComQus',
       'click #del-quscomplexity'     :'deletepop',
       'click #activate_question_compexity' : "actAndDeactivate"

    },

	render: function() {
    $('.popover-content').hide();
		var tmpl = _.template( this.template );
    //this.model.set("IndexCount",this.recIndex);
		this.$el.html( tmpl( this.model.toJSON() ) );
    if(  this.firstRender )
    {
     
        console.log("this active id "+this.activeId);
 
      if( this.activeId == 1 )
      {
       
        this.$el.find("#activate_question_compexity").attr("title","De-Activate");
        this.$el.find("#activate_question_compexity").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_question_compexity").attr("title","Activate");
        this.$el.find("#activate_question_compexity").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }
     this.firstRender = false;
		return this;
	},

    editComQus:function(e){
        e.preventDefault();
        appRouter.navigate("renderComplexityQuestionEditForm/"+ this.model.get('difficulty_level_id'), {trigger:true})
    },

    deletepop:function(){
      var self = this;
         $('#myModal').modal('show');
         $('#comquesid').val(this.model.get('difficulty_level_id'));
         
    },

    delComQus:function(e){
        e.preventDefault();

        var self = this;
        $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModal').modal('toggle');  
        var comQusId = $('#comquesid').val();
        var requestData = JSON.stringify({"difficulty_level_id":comQusId});


         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_question_complexity',
                    data: requestData,
                    contentType:'application/json',
                    cache:false,
                    success: function(data) {

                       
                       appRouter.currentView.render();
                      $( "div.success").html("Complexity Question has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },

     actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_question_compexity").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateComplexityQuestion(e);
         }
         else
         {
            _self.activateComplexityQuestion(e);
         }

    },

    activateComplexityQuestion:function(e){
        e.preventDefault();
         var self = this;
         var comQuesId = this.model.get('difficulty_level_id');
         var requestData = JSON.stringify({"difficulty_level_id":comQuesId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_complexity_question',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                       //self.remove();
                        self.model.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});


                          /*  if( this.model.get("is_active") == 1 )
                            {
                                $("#activate_country").html("De-Activate");
                                this.model.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
                            }
                            else
                            {
                                $("#activate_country").html("Activate");
                                this.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                            }
                        */


                       self.render();
                        self.$el.find("#activate_question_compexity").attr("title","De-Activate");
                       self.$el.find("#activate_question_compexity").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      $( "div.success").html("Complexity Question activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data); 
                    }
             });

    },

     deActivateComplexityQuestion:function(e){
        e.preventDefault();
         var self = this;
         var comQuesId = this.model.get('difficulty_level_id');
         var requestData = JSON.stringify({"difficulty_level_id":comQuesId});

              

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_complexity_question',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_question_compexity").attr("title","Activate");
                      self.$el.find("#activate_question_compexity").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Complexity Question de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data); 
                    }
             });
       

    },



});