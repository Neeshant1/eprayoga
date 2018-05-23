var admin = admin || {};

admin.StateRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'stateList',
	  template: $( '#stateTemplate' ).html(),

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
       'click #edit-state'    :'editState',
       'click #del-state'     :'deletepop',
       'click #activate_state' : "actAndDeactivate"
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
        this.$el.find("#activate_state").attr("title","De-Activate");
        this.$el.find("#activate_state").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_state").attr("title","Activate");
        this.$el.find("#activate_state").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }

    
     this.firstRender = false;

		return this;
	},

  editState:function(e){
        e.preventDefault();
        appRouter.navigate("renderStateEditForm/"+ this.model.get('state_id'), {trigger:true})
  },
  deletepop:function(){
      var self = this;
         $('#myModalState').modal('show');
         $('#statid').val(this.model.get('state_id'));
         
    },

     actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_state").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateState(e);
         }
         else
         {
            _self.activateState(e);
         }

    },

    activateState:function(e){
        e.preventDefault();
         var self = this;
              var stateId = this.model.get('state_id');

              var requestData = JSON.stringify({"state_id":stateId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_state',
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
                        self.$el.find("#activate_state").attr("title","De-Activate");
                       self.$el.find("#activate_state").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      $( "div.success").html("State activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });

    },

     deActivateState:function(e){
        e.preventDefault();
         var self = this;
              var stateId = this.model.get('state_id');

              var requestData = JSON.stringify({"state_id":stateId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_state',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_state").attr("title","Activate");
                      self.$el.find("#activate_state").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("State de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });

    },



});