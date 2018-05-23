var admin = admin || {};

admin.ClientRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'clientList',
	  template: $( '#clientTemplate' ).html(),

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
       'click #edit-client'    :'editClient',
       'click #delete-client'     :'deletepop',
       'click #activate-client' : 'actAndDeactivate'
    },

	render: function() {
		var tmpl = _.template( this.template );
		this.$el.html( tmpl( this.model.toJSON() ) );
    this.model.set("IndexCount",this.recIndex);
    
    if(  this.firstRender )
    {     
        console.log("this active id "+this.activeId);
 
      if( this.activeId == 1 )
      {
        this.$el.find("#activate-client").attr("title","De-Activate");
        this.$el.find("#activate-client").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate-client").attr("title","Activate");
        this.$el.find("#activate-client").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }

     this.firstRender = false;
		return this;
	},

  editClient:function(e){
        e.preventDefault();
        appRouter.navigate("renderClientEditForm/"+ this.model.get('client_id'), {trigger:true})
  },

   deletepop:function(){
      var self = this;
         $('#myModalclient').modal('show');
         $('#clienid').val(this.model.get('client_id'));
         
    },

 

  actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate-client").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateClient(e);
         }
         else
         {
            _self.activateClient(e);
         }

    },

    activateClient:function(e){
        e.preventDefault();
         var self = this;

              var clntId = this.model.get('clnt_code');
              var clntId1 = this.model.get('client_id');

              var requestData = JSON.stringify({"clnt_code":clntId,"client_id":clntId1});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_client',
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
                        self.$el.find("#activate-client").attr("title","De-Activate");
                       self.$el.find("#activate-client").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      
                      $( "div.success").html("Client activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data); 
                    }
             });

    },

     deActivateClient:function(e){
        e.preventDefault();
         var self = this;

              var clntId = this.model.get('clnt_code');
              var clntId1 = this.model.get('client_id');

              var requestData = JSON.stringify({"clnt_code":clntId,"client_id":clntId1});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_client',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate-client").attr("title","Activate");
                      self.$el.find("#activate-client").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Client de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },



});