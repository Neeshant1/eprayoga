var admin = admin || {};

admin.ClientTypeRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'clienttypeList',
	  template: $( '#clientTypeTemplate' ).html(),
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
       'click #edit-client-type'    :'editClient',
       'click #delete-client-type'     :'deletepop',
       'click #activate-client-type' : 'actAndDeactivate'
    },

	render: function() {
		var tmpl = _.template( this.template );
    //this.model.set("IndexCount",this.recIndex);
		this.$el.html( tmpl( this.model.toJSON() ) );
     if(  this.firstRender )
    {     
        console.log("this active id "+this.activeId);
 
      if( this.activeId == 1 )
      {
        this.$el.find("#activate-client-type").attr("title","De-Activate");
        this.$el.find("#activate-client-type").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate-client-type").attr("title","Activate");
        this.$el.find("#activate-client-type").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }

     this.firstRender = false;
		return this;
	},
    editClient:function(e){
        e.preventDefault();
        appRouter.navigate("renderClienttypeEditForm/"+ this.model.get('clnt_type_id'), {trigger:true})
    },

    deletepop:function(){
      var self = this;
         $('#myModalclnttype').modal('show');
         $('#clnttypeid').val(this.model.get('clnt_type_id'));
         
    },

 

    actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate-client-type").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateClientType(e);
         }
         else
         {
            _self.activateClientType(e);
         }

    },

    activateClientType:function(e){
        e.preventDefault();
         var self = this;

              var clientTypeId = this.model.get('clnt_type_id');

              var requestData = JSON.stringify({"clnt_type_id":clientTypeId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_client_type',
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
                        self.$el.find("#activate-client-type").attr("title","De-Activate");
                        self.$el.find("#activate-client-type").html("<i class=\"glyphicon glyphicon-ban-circle\">");


                      $( "div.success").html("Client Type activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },

     deActivateClientType:function(e){
        e.preventDefault();
              var self = this;

              var clientTypeId = this.model.get('clnt_type_id');

              var requestData = JSON.stringify({"clnt_type_id":clientTypeId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_client_type',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate-client-type").attr("title","Activate");
                      self.$el.find("#activate-client-type").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Client Type de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },



});