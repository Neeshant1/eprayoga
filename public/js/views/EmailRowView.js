var admin = admin || {};

admin.EmailRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'emailList',
	  template: $( '#emailTemplate' ).html(),

    initialize: function() {
        this.firstRender = true;
        this.activeId = -1;
         this.recIndex = 0;
    	_.bindAll(this, "render");
        this.model.bind('change', this.render);
	},

    setActiveId: function(value,recIndex)
  {

    this.activeId = value;
    this.recIndex = recIndex;
  },

    events:{
       'click #edit-email'    :'editEmail',
       'click #del-email'     :'delEmail',
       'click #activate_email' : "actAndDeactivate"
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
        this.$el.find("#activate_email").attr("title","De-Activate");
        this.$el.find("#activate_email").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_email").attr("title","Activate");
        this.$el.find("#activate_email").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }
     this.firstRender = false;
		return this;
	},

  editEmail:function(e){
        e.preventDefault();
        appRouter.navigate("renderEmailEditForm/"+ this.model.get('email_config_id'), {trigger:true})
  },

  delEmail:function(e){
        e.preventDefault();

        var self = this;

        var emailId = this.model.get('email_config_id');
        var requestData = JSON.stringify({"email_config_id":emailId});
          if(confirm("Do you want to delete")){
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_email',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                       self.remove();
                        appRouter.currentView.render();
                      $( "div.success").html("Email has been Deleted Successfully.");
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
         var nameText =  _self.$el.find("#activate_email").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateEmail(e);
         }
         else
         {
            _self.activateEmail(e);
         }

    },

    activateEmail:function(e){
        e.preventDefault();
         var self = this;
         var emailId = this.model.get('email_config_id');
         var requestData = JSON.stringify({"email_config_id":emailId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_email',
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
                        self.$el.find("#activate_email").attr("title","De-Activate");
                       self.$el.find("#activate_email").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      

                      $( "div.success").html("Email Activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },

     deActivateEmail:function(e){
        e.preventDefault();
         var self = this;
         var emailId = this.model.get('email_config_id');
         var requestData = JSON.stringify({"email_config_id":emailId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate-email',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_email").attr("title","Activate");
                      self.$el.find("#activate_email").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Email de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },


});