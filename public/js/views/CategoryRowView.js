var admin = admin || {};

admin.CategoryRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'category_list',
	template: $( '#categoryTemplate' ).html(),

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
       'click #edit_category'    :'editCategory',
       'click #del_delete'     :'delCategory',
       'click #activate_category' :'actAndDeactivate',
       'click #del_delete'     :'deletepop',
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
       
        this.$el.find("#activate_category").attr("title","De-Activate");
        this.$el.find("#activate_category").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_category").attr("title","Activate");
        this.$el.find("#activate_category").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }
     this.firstRender = false;
		return this;
	},

    editCategory:function(e){
        e.preventDefault();
        appRouter.navigate("renderCategoryEditForm/"+ this.model.get('category_id'), {trigger:true})
    },

    deletepop:function(){
      var self = this;
         $('#myModalcat').modal('show');
         $('#cateid').val(this.model.get('category_id'));
        
         
    },
    
    actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_category").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivatecategory(e);
         }
         else
         {
            _self.activatecategory(e);
         }

    },

    activatecategory:function(e){
        e.preventDefault();
         var self = this;

              var categoryId = this.model.get('category_id');

              var requestData = JSON.stringify({"category_id":categoryId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_category',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                       //self.remove();
                        self.model.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_category").attr("title","De-Activate");
                       self.$el.find("#activate_category").html("<i class=\"glyphicon glyphicon-ban-circle\">");


                      $( "div.success").html("Category activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },

     deActivatecategory:function(e){
        e.preventDefault();
         var self = this;

              var categoryId = this.model.get('category_id');

              var requestData = JSON.stringify({"category_id":categoryId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_category',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                      self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                      self.render();
                      self.$el.find("#activate_category").attr("title","Activate");
                      self.$el.find("#activate_category").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Category de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },




});