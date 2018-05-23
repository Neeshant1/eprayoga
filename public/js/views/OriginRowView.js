var admin = admin || {};

admin.OriginRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'origin_list',
	template: $( '#originTemplate' ).html(),

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
       'click #edit_origin'    :'editOrigin',
         'click #del_origin'     :'deletepop',
         'click #activate_origin' : 'actAndDeactivate'
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
       
        this.$el.find("#activate_origin").attr("title","De-Activate");
        this.$el.find("#activate_origin").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_origin").attr("title","Activate");
        this.$el.find("#activate_origin").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }



     this.firstRender = false;
		return this;
	},

    editOrigin:function(e){
        e.preventDefault();
        appRouter.navigate("renderOriginEditForm/"+ this.model.get('orig_type_id'), {trigger:true})
    },
  deletepop:function(){
      var self = this;
         $('#myModalOrigin').modal('show');
         $('#originid').val(this.model.get('orig_type_id'));
         
    },

   
     actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_origin").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateOrigin(e);
         }
         else
         {
            _self.activateOrigin(e);
         }

    },

    activateOrigin:function(e){
        e.preventDefault();
         var self = this;
         var originId = this.model.get('orig_type_id');
         var requestData = JSON.stringify({"orig_type_id":originId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_origin',
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
                        self.$el.find("#activate_origin").attr("title","De-Activate");
                       self.$el.find("#activate_origin").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      

                      $( "div.success").html("Origin activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },

     deActivateOrigin:function(e){
        e.preventDefault();
         var self = this;       
         var originId = this.model.get('orig_type_id');
         var requestData = JSON.stringify({"orig_type_id":originId});

              
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_origin',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_origin").attr("title","Activate");
                      self.$el.find("#activate_origin").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Origin de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });


    },



});