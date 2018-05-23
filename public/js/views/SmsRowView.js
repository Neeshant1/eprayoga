var admin = admin || {};

admin.SmsRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'smsList',
	  template: $( '#smsTemplate' ).html(),

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
       'click #edit-sms'    :'editSms',
       'click #del-sms'     :'delSms',
        'click #activate_sms' : "actAndDeactivate"
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
        this.$el.find("#activate_sms").attr("title","De-Activate");
        this.$el.find("#activate_sms").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_sms").attr("title","Activate");
        this.$el.find("#activate_sms").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }
     this.firstRender = false;
		return this;
	},

  editSms:function(e){
        e.preventDefault();
        appRouter.navigate("renderSmsEditForm/"+ this.model.get('sms_config_id'), {trigger:true})
  },

  delSms:function(e){
        e.preventDefault();
        var self = this;
        var smsId = this.model.get('sms_config_id');
        var requestData = JSON.stringify({"sms_config_id":smsId});
         if(confirm("Do you want to delete")){
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/disable_sms',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                       self.remove();
                        appRouter.currentView.render();
                      $( "div.success").html("sms Deleted Successfully.");
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
         var nameText =  _self.$el.find("#activate_sms").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateSms(e);
         }
         else
         {
            _self.activateSms(e);
         }

    },

    activateSms:function(e){
        e.preventDefault();
         var self = this;

              var smsId = this.model.get('sms_config_id');

              var requestData = JSON.stringify({"sms_config_id":smsId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_sms',
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
                        self.$el.find("#activate_sms").attr("title","De-Activate");
                       self.$el.find("#activate_sms").html("<i class=\"glyphicon glyphicon-ban-circle\">");


                      $( "div.success").html("SMS activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });

    },

     deActivateSms:function(e){
        e.preventDefault();
         var self = this;


              var smsId = this.model.get('sms_config_id');

              var requestData = JSON.stringify({"sms_config_id":smsId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_sms',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_sms").attr("title","Activate");
                      self.$el.find("#activate_sms").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("SMS de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });

    },



});