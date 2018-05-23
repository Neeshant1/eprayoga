var admin = admin || {};

admin.ClientGroupRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'clientGroupList',
	  template: $( '#clientgroupTemplate' ).html(),

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
       'click #edit-client-group'    :'editClientGroup',
       'click #delete-client-group'     :'deletepop',
       'click #activate-client-group' : 'actAndDeactivate'
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
        
        this.$el.find("#activate-client-group").attr("title","De-Activate");
        this.$el.find("#activate-client-group").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate-client-group").attr("title","Activate");
        this.$el.find("#activate-client-group").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }

    this.firstRender = false;
		return this;
	},

  editClientGroup:function(e){
        e.preventDefault();
       
        appRouter.navigate("renderClientGroupEditForm/"+ this.model.get('clnt_group_id'), {trigger:true})
  },

   deletepop:function(){
      var self = this;
         $('#myModalClntGr').modal('show');
         $('#clntgrid').val(this.model.get('clnt_group_id'));
         
    },


 

    actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_client_group").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateClientGroup(e);
         }
         else
         {
            _self.activateClientGroup(e);
         }

    },

    activateClientGroup:function(e){
        e.preventDefault();
         var self = this;

       

              var clntId = this.model.get('clnt_group_id');

              var requestData = JSON.stringify({"clnt_group_id":clntId});

            $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_client_group',
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
                        self.$el.find("#activate-client-group").attr("title","De-Activate");
                       self.$el.find("#activate-client-group").html("<i class=\"glyphicon glyphicon-ban-circle\">");
                      $( "div.success").html("Client Group activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data); 
                    }
             });

    },

     deActivateClientGroup:function(e){
        e.preventDefault();
         var self = this;

              var clntId = this.model.get('clnt_group_id');

              var requestData = JSON.stringify({"clnt_group_id":clntId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_client_group',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate-client-group").attr("title","Activate");
                      self.$el.find("#activate-client-group").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Client group de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      errorhandle(data); 
                    }
             });

    },



});