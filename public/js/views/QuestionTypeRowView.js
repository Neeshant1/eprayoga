var admin = admin || {};

admin.QuestionTypeRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'question_type_list',
	template: $( '#questionTypeTemplate' ).html(),

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
       'click #edit-questionType'    :'editQuestionType',
       'click #del-questionType'     :'delQuestionType',
       'click #activate_questiontype' : "actAndDeactivate"
    },

	render: function() {
    $('.popover-content').hide();
		var tmpl = _.template( this.template );
    //this.model.set("IndexCount",this.recIndex);
		this.$el.html( tmpl( this.model.toJSON() ) );
     if(  this.firstRender )
    {
     
 
      if( this.activeId == 1 )
      {
        this.$el.find("#activate_questiontype").attr("title","De-Activate");
        this.$el.find("#activate_questiontype").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_questiontype").attr("title","Activate");
        this.$el.find("#activate_questiontype").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }
     this.firstRender = false;
		return this;
	},

    editQuestionType:function(e){
        e.preventDefault();
        appRouter.navigate("renderQuestionTypeEditForm/"+ this.model.get('question_type_id'), {trigger:true})
    },

    delQuestionType:function(e){
        e.preventDefault();

        var self = this;


              var qusTypeId = this.model.get('question_type_id');

              var requestData = JSON.stringify({"question_type_id":qusTypeId});
          if(confirm("Do you want to delete")){
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_question_type',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                       self.remove();
                       appRouter.currentView.render();
                      $( "div.success").html("Question Type has been deleted Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                        errorhandle(data);

                    }
             });
       }

    },

     actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_questiontype").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateQuestionType(e);
         }
         else
         {
            _self.activateQuestionType(e);
         }

    },

    activateQuestionType:function(e){
        e.preventDefault();
         var self = this;


              var qusTypeId = this.model.get('question_type_id');

              var requestData = JSON.stringify({"question_type_id":qusTypeId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_question_type',
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
                        self.$el.find("#activate_questiontype").attr("title","De-Activate");
                       self.$el.find("#activate_questiontype").html("<i class=\"glyphicon glyphicon-ban-circle\">");


                      $( "div.success").html("Question type activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });

    },

     deActivateQuestionType:function(e){
        e.preventDefault();
         var self = this;

              var qusTypeId = this.model.get('question_type_id');

              var requestData = JSON.stringify({"question_type_id":qusTypeId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_question_type',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_questiontype").attr("title","Activate");
                      self.$el.find("#activate_questiontype").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Question type de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });

    },



});