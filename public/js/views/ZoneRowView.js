var admin = admin || {};

admin.ZoneRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'zone_list',
	template: $( '#zoneTemplate' ).html(),

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
       'click #edit-zone'    :'editZone',
       'click #del-zone'     :'deletepop',
       'click #activate_zone' : "actAndDeactivate"
    },

	render: function() {
    $('.popover-content').hide();
		var tmpl = _.template( this.template );
    // this.model.set("IndexCount",this.recIndex);
		this.$el.html( tmpl( this.model.toJSON() ) );

     if(  this.firstRender )
    {
      
      if( this.activeId == 1 )
      {
        this.$el.find("#activate_zone").attr("title","De-Activate");
        this.$el.find("#activate_zone").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_zone").attr("title","Activate");
        this.$el.find("#activate_zone").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }
     this.firstRender = false;
		return this;
	},

    editZone:function(e){
        e.preventDefault();
        appRouter.navigate("renderZoneEditForm/"+ this.model.get('zone_area_id'), {trigger:true})
    },
    deletepop:function(){
      var self = this;
         $('#myModalZone').modal('show');
         $('#zoneid').val(this.model.get('zone_area_id'));
         
    },


     actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_zone").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateZone(e);
         }
         else
         {
            _self.activateZone(e);
         }

    },

    activateZone:function(e){
        e.preventDefault();
         var self = this;

              var zoneId = this.model.get('zone_area_id');

              var requestData = JSON.stringify({"zone_area_id":zoneId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_zone',
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
                        self.$el.find("#activate_zone").attr("title","De-Activate");
                       self.$el.find("#activate_zone").html("<i class=\"glyphicon glyphicon-ban-circle\">");


                      $( "div.success").html("Zone activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });

    },

     deActivateZone:function(e){
        e.preventDefault();
         var self = this;

              var zoneId = this.model.get('zone_area_id');

              var requestData = JSON.stringify({"zone_area_id":zoneId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_zone',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_zone").attr("title","Activate");
                      self.$el.find("#activate_zone").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("zone de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });

    },


});