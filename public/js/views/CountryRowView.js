var admin = admin || {};

admin.CountryRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'countryList',
	  template: $( '#countryTemplate' ).html(),

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
       'click #edit-country'    :'editCountry',
       'click #del-country'     :'deletepop',
       'click #activate_country' : "actAndDeactivate"
    },

	render: function() {
    $('.popover-content').hide();
		var tmpl = _.template( this.template );
   // this.model.set("IndexCount",this.recIndex);
      this.$el.html( tmpl( this.model.toJSON() ) );	

    if(  this.firstRender )
    {
     
        console.log("this active id "+this.activeId);
 
      if( this.activeId == 1 )
      {
        
        this.$el.find("#activate_country").attr("title","De-Activate");
        this.$el.find("#activate_country").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_country").attr("title","Activate");
        this.$el.find("#activate_country").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }
     this.firstRender = false;
		return this;
	},

  editCountry:function(e){
        e.preventDefault();
        appRouter.navigate("renderCountryEditForm/"+ this.model.get('country_id'), {trigger:true})
  },

  deletepop:function(){
     var self = this;
     $('#myModalCountry').modal('show');
     $('#countrid').val(this.model.get('country_id'));
         
    },



    actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_country").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateCountry(e);
         }
         else
         {
            _self.activateCountry(e);
         }

    },

    activateCountry:function(e){
        e.preventDefault();
         var self = this;
         var currencyId = this.model.get('country_id');
         var requestData = JSON.stringify({"country_id":currencyId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_country',
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
                        self.$el.find("#activate_country").attr("title","De-Activate");
                       self.$el.find("#activate_country").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      $( "div.success").html("country activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data); 
                    }
             });

    },

     deActivateCountry:function(e){
        e.preventDefault();
         var self = this;
         var currencyId = this.model.get('country_id');
         var requestData = JSON.stringify({"country_id":currencyId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_country',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_country").attr("title","Activate");
                      self.$el.find("#activate_country").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Country de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                     errorhandle(data);  
                    }
             });

    },


});
