var admin = admin || {};

admin.SecurityQuestionRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'security_question_list',
	template: $( '#securityQuestionTemplate' ).html(),

    initialize: function() {
      this.firstRender = true;
      this.activeId = -1;
       this.recIndex = 0;
    	_.bindAll(this, "render");
        this.model.bind('change', this.render);
	},

  setActiveId: function(value, recIndex)
  {
    this.activeId = value;
    this.recIndex = recIndex;
  },

    events:{
       'click #edit-security-question'    :'editSecurityqus',
       'click #activate-security-question'     :'actAndDeactivate',
       'click #delete-security-question' : "deletepop"
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
        this.$el.find("#activate-security-question").attr("title","De-Activate");
        this.$el.find("#activate-security-question").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate-security-question").attr("title","Activate");
        this.$el.find("#activate-security-question").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }

     this.firstRender = false;
    return this;
	},

    editSecurityqus:function(e){
        e.preventDefault();
        appRouter.navigate("renderSecurityQuestionEditForm/"+ this.model.get('question_id'), {trigger:true})
    },

    deletepop:function(){
      var self = this;
         $('#myModalsecurity').modal('show');
         $('#secreid').val(this.model.get('question_id'));
         
    },


   

     actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate-security-question").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateSecurityQus(e);
         }
         else
         {
            _self.activateSecurityQus(e);
         }

    },

    activateSecurityQus:function(e){
        e.preventDefault();
         var self = this;

              var sqId = this.model.get('question_id');

              var requestData = JSON.stringify({"question_id":sqId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_security_questions',
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
                        self.$el.find("#activate-security-question").attr("title","De-Activate");
                       self.$el.find("#activate-security-question").html("<i class=\"glyphicon glyphicon-ban-circle\">");


                      $( "div.success").html("Security Question activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });

    },

     deActivateSecurityQus:function(e){
        e.preventDefault();
         var self = this;

              var sqId = this.model.get('question_id');

              var requestData = JSON.stringify({"question_id":sqId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_security_questions',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate-security-question").attr("title","Activate");
                      self.$el.find("#activate-security-question").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Security Question de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });
  }


});