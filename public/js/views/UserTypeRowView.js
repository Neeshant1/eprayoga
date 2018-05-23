var admin = admin || {};

admin.UserTypeRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'userTypeList',
	template: $( '#usertypeTemplate' ).html(),

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
     'click #edit_usertype'    :'editUserType',
     'click #del_usertype'     :'deletepop',
     'click #activate_usertype' :'actAndDeactivate'
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
        this.$el.find("#activate_usertype").attr("title","De-Activate");
        this.$el.find("#activate_usertype").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_usertype").attr("title","Activate");
        this.$el.find("#activate_usertype").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }

    this.firstRender = false;
		return this;
	},

    editUserType:function(e){
        e.preventDefault();
        appRouter.navigate("renderUserTypeEditForm/"+ this.model.get('user_type_id'), {trigger:true})
    },

    deletepop:function(){
      var self = this;
         $('#myModalUserType').modal('show');
         $('#usertypeid').val(this.model.get('user_type_id'));
         
    },

    
     actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_usertype").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateusertype(e);
         }
         else
         {
            _self.activateusertype(e);
         }

    },

    activateusertype:function(e){
        e.preventDefault();
         var self = this;

              var userTypeId = this.model.get('user_type_id');

              var requestData = JSON.stringify({"user_type_id":userTypeId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_usertype',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                       //self.remove();
                        self.model.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_usertype").attr("title","De-Activate");
                       self.$el.find("#activate_usertype").html("<i class=\"glyphicon glyphicon-ban-circle\">");


                      $( "div.success").html("UserType activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });

    },

     deActivateusertype:function(e){
        e.preventDefault();
         var self = this;

              var userTypeId = this.model.get('user_type_id');

              var requestData = JSON.stringify({"user_type_id":userTypeId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_usertype',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_usertype").attr("title","Activate");
                      self.$el.find("#activate_usertype").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("UserType de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });

    },



});