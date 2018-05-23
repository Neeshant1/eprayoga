
var admin = admin || {};

admin.CityRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'cityList',
	  template: $( '#cityTemplate' ).html(),

  initialize: function() {
       this.firstRender = true;
        this.activeId = -1;
         this.recIndex = 0;
    	_.bindAll(this, "render");
        this.model.bind('change', this.render);
	  },

  setActiveId: function(value,recIndex) {
        this.activeId = value;
         this.recIndex = recIndex;
        
  },

  events:{
       'click #edit-city'    :'editCity',
       'click #del-city'     :'deletepop',
       'click #activate_city' : "actAndDeactivate"
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
        
        this.$el.find("#activate_city").attr("title","De-Activate");
        this.$el.find("#activate_city").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_city").attr("title","Activate");
        this.$el.find("#activate_city").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }
     this.firstRender = false;
		return this;
	},

  editCity:function(e){
        e.preventDefault();
        appRouter.navigate("renderCityEditForm/"+ this.model.get('city_id'), {trigger:true})
  },
deletepop:function(){
      var self = this;
         $('#myModalCity').modal('show');
         $('#cityid').val(this.model.get('city_id'));
         
    },
  
     actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_city").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateCity(e);
         }
         else
         {
            _self.activateCity(e);
         }

    },

    activateCity:function(e){
        e.preventDefault();
         var self = this;

       

              var cityId = this.model.get('city_id');

              var requestData = JSON.stringify({"city_id":cityId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_city',
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
                        self.$el.find("#activate_city").attr("title","De-Activate");
                       self.$el.find("#activate_city").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      

                      $( "div.success").html("City activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },

     deActivateCity:function(e){
        e.preventDefault();
         var self = this;


              var cityId = this.model.get('city_id');

              var requestData = JSON.stringify({"city_id":cityId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_city',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_city").attr("title","Activate");
                      self.$el.find("#activate_city").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("City de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                     errorhandle(data);  
                    }
             });

    },



});
