var admin = admin || {};

admin.AddressTypeRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'address_type_list',
	  template: $( '#addressTypeTemplate' ).html(),

    initialize: function() {
      this.firstRender = true;
      this.activeId = -1;
      // this.recIndex = 0;
    	_.bindAll(this, "render");
        this.model.bind('change', this.render);
	},

  setActiveId: function(value)
  {
    this.activeId = value;
    // this.recIndex = recIndex;
   
  },

    events:{
       'click #edit-address-type'    :'editAddressType',
       'click #delete-address-type'     :'deletepop',
       'click #activate-address-type' : 'actAndDeactivate'
    },

  render: function() {
    var tmpl = _.template( this.template );
    this.$el.html( tmpl( this.model.toJSON() ) );
    // this.model.set("IndexCount",this.recIndex);
    
    if(  this.firstRender )
    {     
        console.log("this active id "+this.activeId);
 
      if( this.activeId == 1 )
      {
       
        this.$el.find("#activate-address-type").attr("title","De-Activate");
        this.$el.find("#activate-address-type").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate-address-type").attr("title","Activate");
        this.$el.find("#activate-address-type").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }

     this.firstRender = false;
    return this;
  },

    editAddressType:function(e){
        e.preventDefault();
        appRouter.navigate("renderAddressTypeEditForm/"+ this.model.get('add_type_id'), {trigger:true})
    },

    deletepop:function(){
      var self = this;
         $('#myModalAddtype').modal('show');
         $('#addtypeid').val(this.model.get('add_type_id'));
         
    },


    

     actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate-address-type").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateAddressType(e);
         }
         else
         {
            _self.activateAddressType(e);
         }

    },

    activateAddressType:function(e){
        e.preventDefault();
         var self = this;

       

              var addtypeId = this.model.get('add_type_id');

              var requestData = JSON.stringify({"add_type_id":addtypeId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_address_type',
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
                        self.$el.find("#activate-address-type").attr("title","De-Activate");
                       self.$el.find("#activate-address-type").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      
                      $( "div.success").html("Addresstype activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },

     deActivateAddressType:function(e){
        e.preventDefault();
         var self = this;

       

              var addtypeId = this.model.get('add_type_id');

              var requestData = JSON.stringify({"add_type_id":addtypeId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_address_type',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate-address-type").attr("title","Activate");
                      self.$el.find("#activate-address-type").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Address Type de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },



});




   
