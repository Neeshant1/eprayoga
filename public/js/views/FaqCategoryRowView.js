var admin = admin || {};

admin.FaqCategoryRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'faqCategoryList',
	  template: $( '#faqCategoryTemplate' ).html(),

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
       'click #faq-category-edit'    :'editFaqCategory',
       'click #faq-category-delete'     :'deletepop',
       'click #activate_faq_category' : "actAndDeactivate"
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
              this.$el.find("#activate_faq_category").attr("title","De-Activate");
              this.$el.find("#activate_faq_category").html("<i class=\"glyphicon glyphicon-ban-circle\">");
            }
            else
            {
              this.$el.find("#activate_faq_category").attr("title","Activate");
              this.$el.find("#activate_faq_category").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
            }
          }
     this.firstRender = false;
		return this;
	},

    editFaqCategory:function(e){
        e.preventDefault();
        appRouter.navigate("renderFaqCategoryEditForm/"+ this.model.get('faq_category_id'), {trigger:true})
    },

     deletepop:function(){
      var self = this;
         $('#myModalfaqcat').modal('show');
         $('#faqcatid').val(this.model.get('faq_category_id'));
         
    },

     actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_faq_category").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateFaqCategory(e);
         }
         else
         {
            _self.activateFaqCategory(e);
         }

    },

    activateFaqCategory:function(e){
        e.preventDefault();
         var self = this;     
         var faqCategoryId = this.model.get('faq_category_id');
         var requestData = JSON.stringify({"faq_category_id":faqCategoryId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_faq_category',
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
                        self.$el.find("#activate_faq_category").attr("title","De-Activate");
                       self.$el.find("#activate_faq_category").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      

                      $( "div.success").html("Faq Category Activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },

     deActivateFaqCategory:function(e){
        e.preventDefault();
         var self = this;      
         var faqCategoryId = this.model.get('faq_category_id');
         var requestData = JSON.stringify({"faq_category_id":faqCategoryId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_faq_category',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_faq_category").attr("title","Activate");
                      self.$el.find("#activate_faq_category").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Faq Category De-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);
                    }
             });

    },


});