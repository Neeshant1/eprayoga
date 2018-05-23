var admin = admin || {};

admin.ProductCatalogRowView = Backbone.View.extend({

    tagName:'tr',
    idName: 'productcatalogList',
    template: $( '#productCatalogTemplate').html(),
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
       'click #edit_product_catalog'    :'editfile',
       'click #delete_product_catalog'     :'deletepop',
       'click #activate_product_catalog' : 'actAndDeactivate'
    },

  render: function() {
    $('.popover-content').hide();
    var tmpl = _.template( this.template );

        this.model.set("IndexCount",this.recIndex);
    this.$el.html( tmpl( this.model.toJSON() ) );

     if(  this.firstRender )
    {     
        console.log("this active id "+this.activeId);
 
      if( this.activeId == 1 )
      {
       
        this.$el.find("#activate_product_catalog").attr("title","De-Activate");
        this.$el.find("#activate_product_catalog").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_product_catalog").attr("title","Activate");
        this.$el.find("#activate_product_catalog").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }

     this.firstRender = false;
    return this;
  },




    editfile:function(e){
        e.preventDefault();
      
        appRouter.navigate("renderproductcatalogEditForm/"+ this.model.get('id'), {trigger:true})
    },

deletepop:function(){
      var self = this;
         $('#myModalProduct').modal('show');
         $('#prodcid').val(this.model.get('id'));
         
    },


    actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_product_catalog").attr("title");
       
         if( nameText == "De-Activate")
         {
            _self.deActivateProductCatalog(e);
         }
         else
         {
            _self.activateProductCatalog(e);
         }

    },

    activateProductCatalog:function(e){
        e.preventDefault();
         var self = this;


              var filetypeId = this.model.get('id');

              var requestData = JSON.stringify({"id":filetypeId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_product_catalog',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                        self.model.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});




                       self.render();
                        self.$el.find("#activate_product_catalog").attr("title","De-Activate");
                       self.$el.find("#activate_product_catalog").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      

                      $( "div.success").html("Product Catalog activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      console.log(data.responseJSON.data.alertMeassage);
                      var resposedata = data.responseJSON.data.alertMeassage;
                      if(resposedata){
                          $( "div.failure").html(resposedata);
                          $( "div.failure" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
                      }else{
                        errorhandle(data);
                      }
                    }
             });

    },

     deActivateProductCatalog:function(e){
        e.preventDefault();
         var self = this;

       

              var clientTypeId = this.model.get('id');

              var requestData = JSON.stringify({"id":clientTypeId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_product_catalog',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_product_catalog").attr("title","Activate");
                      self.$el.find("#activate_product_catalog").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Product Catalog de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                     
                       errorhandle(data);
                    }
             });

    },



});