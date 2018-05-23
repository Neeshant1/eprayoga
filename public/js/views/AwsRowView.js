var admin = admin || {};

admin.AwsRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'awsList',
	  template: $( '#awsTemplate' ).html(),

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
       'click #edit-aws'    :'editAws',
       'click #del-aws'     :'deletepop',
       'click #activate_aws' : "actAndDeactivate"
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
        
        this.$el.find("#activate_aws").attr("title","De-Activate");
        this.$el.find("#activate_aws").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_aws").attr("title","Activate");
        this.$el.find("#activate_aws").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }
     this.firstRender = false;
		return this;
	},

  editAws:function(e){
        e.preventDefault();
        appRouter.navigate("renderAwsEditForm/"+ this.model.get('aws_s3_master_id'), {trigger:true})
  },
  deletepop:function(){
      var self = this;
         $('#myModalaws').modal('show');
         $('#awsid').val(this.model.get('aws_s3_master_id'));
         
  },

 

    actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_aws").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateAws(e);
         }
         else
         {
            _self.activateAws(e);
         }

    },

    activateAws:function(e){
        e.preventDefault();
         var self = this;

       

              var currencyId = this.model.get('aws_s3_master_id');

              var requestData = JSON.stringify({"aws_s3_master_id":currencyId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_aws',
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
                        self.$el.find("#activate_aws").attr("title","De-Activate");
                       self.$el.find("#activate_aws").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      

                      $( "div.success").html("AWS activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },

     deActivateAws:function(e){
        e.preventDefault();
         var self = this;

       

              var awsId = this.model.get('aws_s3_master_id');

              var requestData = JSON.stringify({"aws_s3_master_id":awsId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_aws',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_aws").attr("title","Activate");
                      self.$el.find("#activate_aws").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("AWS de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },


});