var admin = admin || {};

admin.CustomerRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'customer_list',
	  template: $( '#customerTemplate' ).html(),

    initialize: function() {
      this.firstRender = true;
      this.activeId = -1;
              this.recIndex = 0;
    	_.bindAll(this, "render");
        this.model.bind('change', this.render);
	  },
    setActiveId: function(value, recIndex) {
    this.activeId = value;
    this.recIndex = recIndex;
   
    },

    events:{
       'click #edit_customer'    :'editCustomer',
       'click #del_customer'     :'deletepop',
       'click #activate-customer' : 'actAndDeactivate'
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
        
        this.$el.find("#activate-customer").attr("title","De-Activate");
        this.$el.find("#activate-customer").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate-customer").attr("title","Activate");
        this.$el.find("#activate-customer").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }
     this.firstRender = false;
		return this;
	},

  editCustomer:function(e){
       
        e.preventDefault();
       appRouter.navigate("customerRegistrationEditForm/"+ this.model.get('customer_id'), {trigger:true})
  },
  deletepop:function(){
      var self = this;
         $('#myModalCust').modal('show');
         $('#customerid').val(this.model.get('customer_id'));
         
    },

  
  actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate-customer").attr("title");

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
         var custId = this.model.get('customer_id');
         var requestData = JSON.stringify({"customer_id":custId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_customer',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                       //self.remove();
                      self.model.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
                       self.render();
                      self.$el.find("#activate-customer").attr("title","De-Activate");
                      self.$el.find("#activate-customer").html("<i class=\"glyphicon glyphicon-ban-circle\">");
                      $( "div.success").html("Customer activated Successfully.");
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
         var custId = this.model.get('customer_id');
         var requestData = JSON.stringify({"customer_id":custId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_customer',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate-customer").attr("title","Activate");
                      self.$el.find("#activate-customer").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Customer de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data); 
                    }
             });

    },


});