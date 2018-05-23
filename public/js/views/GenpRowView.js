var admin = admin || {};

admin.GenpRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'genp_list',
	template: $( '#genpTemplate' ).html(),

    initialize: function() {
       this.firstRender = true;
        this.activeId = -1;
    	_.bindAll(this, "render");
        this.model.bind('change', this.render);
	},

  setActiveId: function(value)
  {

    this.activeId = value;
   
  },

    events:{
      'click #edit_genp'    :'editGenp',
      'click #del_genp'     :'deletepop',
      'click #activate_genp' : 'actAndDeactivate'
    },



	render: function() {
		var tmpl = _.template( this.template );
		this.$el.html( tmpl( this.model.toJSON() ) );


    if(  this.firstRender )
    {
     
        console.log("this active id "+this.activeId);
 
      if( this.activeId == 1 )
      {
       
        this.$el.find("#activate_genp").attr("title","De-Activate");
        this.$el.find("#activate_genp").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_genp").attr("title","Activate");
        this.$el.find("#activate_genp").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }

     this.firstRender = false;
		return this;
	},

    editGenp:function(e){
        e.preventDefault();
        appRouter.navigate("renderGenpEditForm/"+ this.model.get('generic_param_id'), {trigger:true})
    },
    deletepop:function(){
      var self = this;
         $('#myModalgen').modal('show');
         $('#genparid').val(this.model.get('generic_param_id'));
         
    },

  

     actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_genp").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateGenp(e);
         }
         else
         {
            _self.activateGenp(e);
         }

    },

    activateGenp:function(e){
        e.preventDefault();
         var self = this;

      
              var genpId = this.model.get('generic_param_id');

              var requestData = JSON.stringify({"generic_param_id":genpId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_genp',
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
                        self.$el.find("#activate_genp").attr("title","De-Activate");
                       self.$el.find("#activate_genp").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      

                      $( "div.success").html("Generic param Activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },

     deActivateGenp:function(e){
        e.preventDefault();
         var self = this;

      

              var genpId = this.model.get('generic_param_id');

              var requestData = JSON.stringify({"generic_param_id":genpId});

              
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_genp',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_genp").attr("title","Activate");
                      self.$el.find("#activate_genp").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Generic param De-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });


    },



});