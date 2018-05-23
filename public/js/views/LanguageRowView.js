var admin = admin || {};

admin.LanguageRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'language_list',
	template: $( '#languageTemplate' ).html(),

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
       'click #edit_language'    :'editLanguage',
       'click #del_language_one'     :'deletepop',
       //'click #del_language_one' : 'deletepop',
       'click #activate_language' : 'actAndDeactivate'
    },

	render: function() {
    $('.popover-content').hide();
		var tmpl = _.template( this.template );
		this.$el.html( tmpl( this.model.toJSON() ) );


    if(  this.firstRender )
    {
     
        console.log("this active id "+this.activeId);
 
      if( this.activeId == 1 )
      {
       
        this.$el.find("#activate_language").attr("title","De-Activate");
        this.$el.find("#activate_language").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_language").attr("title","Activate");
        this.$el.find("#activate_language").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }

     this.firstRender = false;
		return this;
	},

    editLanguage:function(e){
        e.preventDefault();
        appRouter.navigate("renderLanguageEditForm/"+ this.model.get('language_id'), {trigger:true})
    },
  
    deletepop:function(){
      var self = this;
         $('#myModal').modal('show');
         $('#langid').val(this.model.get('language_id'));
         
    },


     actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_language").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateLanguage(e);
         }
         else
         {
            _self.activateLanguage(e);
         }

    },

    activateLanguage:function(e){
        e.preventDefault();
         var self = this;
         var languageId = this.model.get('language_id');
         var requestData = JSON.stringify({"language_id":languageId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_language',
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
                        self.$el.find("#activate_language").attr("title","De-Activate");
                       self.$el.find("#activate_language").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      

                      $( "div.success").html("Language activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },

     deActivateLanguage:function(e){
        e.preventDefault();
         var self = this;    
         var languageId = this.model.get('language_id');
         var requestData = JSON.stringify({"language_id":languageId});

              
         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_language',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_language").attr("title","Activate");
                      self.$el.find("#activate_language").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Language de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });


    },



});