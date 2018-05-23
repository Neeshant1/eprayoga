var admin = admin || {};

admin.CurrencyRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'currency-list',
	template: $( '#currencyTemplate' ).html(),

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
       'click #edit-currency'    :'editCurrency',
       'click #del-currency'     :'deletepop',
       'click #activate_currency' :'actAndDeactivate'
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
        this.$el.find("#activate_currency").attr("title","De-Activate");
        this.$el.find("#activate_currency").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_currency").attr("title","Activate");
        this.$el.find("#activate_currency").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }
     this.firstRender = false;
		return this;
	},

    editCurrency:function(e){
        e.preventDefault();
        $('.popover-content').hide();
        appRouter.navigate("renderCurrencyEditForm/"+ this.model.get('currency_id'), {trigger:true})
    },

  deletepop:function(){
      var self = this;
         $('#myModalCurr').modal('show');
         $('#currid').val(this.model.get('currency_id'));
         
    },

   
    actAndDeactivate:function(e)
    {
      //$('.popover-content').hide();
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_currency").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateCurrency(e);
         }
         else
         {
            _self.activateCurrency(e);
         }

    },

    activateCurrency:function(e){
        e.preventDefault();
         var self = this;
         var currencyId = this.model.get('currency_id');
         var requestData = JSON.stringify({"currency_id":currencyId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_currency',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                       //self.remove();
                        self.model.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_currency").attr("title","De-Activate");
                       self.$el.find("#activate_currency").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      $( "div.success").html("Currency Activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                     errorhandle(data);  
                    }
             });

    },

     deActivateCurrency:function(e){
        e.preventDefault();
         var self = this;
         var currencyId = this.model.get('currency_id');
         var requestData = JSON.stringify({"currency_id":currencyId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_currency',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_currency").attr("title","Activate");
                      self.$el.find("#activate_currency").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Currency De-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                     errorhandle(data);  
                    }
             });

    },




});