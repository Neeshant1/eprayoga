var admin = admin || {};

admin.FaqRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'faqList',
	  template: $( '#faqTemplate' ).html(),

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
       'click #edit-faq'    :'editFaq',
       'click #del-faq'     :'deletepop',
       'click #activate_faq' : "actAndDeactivate"
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
        this.$el.find("#activate_faq").attr("title","De-Activate");
        this.$el.find("#activate_faq").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_faq").attr("title","Activate");
        this.$el.find("#activate_faq").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }
     this.firstRender = false;
		return this;
	},

    editFaq:function(e){
        e.preventDefault();
        appRouter.navigate("renderFaqEditForm/"+ this.model.get('faq_id'), {trigger:true})
    },


    deletepop:function(){
      var self = this;
         $('#myModalFaq').modal('show');
         $('#faqid').val(this.model.get('faq_id'));
         
    },

     actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_faq").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateFaq(e);
         }
         else
         {
            _self.activateFaq(e);
         }

    },

    activateFaq:function(e){
        e.preventDefault();
         var self = this;
         var faqId = this.model.get('faq_id');
         var requestData = JSON.stringify({"faq_id":faqId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_faq',
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
                        self.$el.find("#activate_faq").attr("title","De-Activate");
                       self.$el.find("#activate_faq").html("<i class=\"glyphicon glyphicon-ban-circle\">");


                      $( "div.success").html("Faq Activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },

     deActivateFaq:function(e){
        e.preventDefault();
         var self = this;
         var faqId = this.model.get('faq_id');
         var requestData = JSON.stringify({"faq_id":faqId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_faq',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_faq").attr("title","Activate");
                      self.$el.find("#activate_faq").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Faq De-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });
       }


});