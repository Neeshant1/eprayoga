var admin = admin || {};

admin.UserAccessRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'useraccessList',
	template: $( '#userAccessTemplate' ).html(),

    initialize: function() {
        this.firstRender = true;
        this.activeId = -1;
        this.recIndex = 0;
    	_.bindAll(this, "render");
        this.model.bind('change', this.render);
	},

    setActiveId: function(value, recIndex){
        this.activeId = value;
        this.recIndex = recIndex;
  },

    events:{
       'click #edit-useraccess'    :'editUserAccess',
       'click #del-useraccess'     :'deluserAccess',
       'click #activate_useraccess' :'actAndDeactivate'
    },

	render: function() {

    $('.popover-content').hide();
		var tmpl = _.template( this.template );
		this.$el.html( tmpl( this.model.toJSON() ) );

     if(  this.firstRender ){     
 
      if( this.activeId == 1 ){
        this.$el.find("#activate_useraccess").attr("title","De-Activate");
        this.$el.find("#activate_useraccess").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else{
        this.$el.find("#activate_useraccess").attr("title","Activate");
        this.$el.find("#activate_useraccess").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }
     this.firstRender = false;
		 return this;
	},

    editUserAccess:function(e){
        e.preventDefault();
        appRouter.navigate("renderUserAccessEditForm/"+ this.model.get('user_access_log_id'), {trigger:true})
    },

    deluserAccess:function(e){
        e.preventDefault();

        var self = this;
              var useraccessId = this.model.get('user_access_log_id');

              var requestData = JSON.stringify({"user_access_log_id":useraccessId});
              if(confirm("Do you want to delete")){

         $.ajax({
                    type: 'POST',
                    url:'/eprayoga/admin/delete_user_access',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                       self.remove();
                       appRouter.currentView.render();
                      $( "div.success").html("UserAccess Deleted Successfully.");
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
         var nameText =  _self.$el.find("#activate_useraccess").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateUseraccess(e);
         }
         else
         {
            _self.activateUseraccess(e);
         }

    },

    activateUseraccess:function(e){
        e.preventDefault();
         var self = this;
              var useraccessId = this.model.get('user_access_log_id');

              var requestData = JSON.stringify({"user_access_log_id":useraccessId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_useraccess',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                       
                        self.model.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_useraccess").attr("title","De-Activate");
                       self.$el.find("#activate_useraccess").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      $( "div.success").html("Useraccess activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });

    },

     deActivateUseraccess:function(e){
        e.preventDefault();
         var self = this;

              var useraccessId = this.model.get('user_access_log_id');

              var requestData = JSON.stringify({"user_access_log_id":useraccessId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_useraccess',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {


                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_useraccess").attr("title","Activate");
                      self.$el.find("#activate_useraccess").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Useraccess de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });

    },

});




