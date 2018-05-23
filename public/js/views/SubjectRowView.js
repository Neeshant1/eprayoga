var admin = admin || {};

admin.SubjectRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'subject_list',
	template: $( '#subjectTemplate' ).html(),

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
       'click #edit_subject'    :'editSubject',
       //'click #del_subject'     :'delSubject',
       'click #activate_subject' :'actAndDeactivate',
        'click #del_subject'     :'deletepop',
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
        this.$el.find("#activate_subject").attr("title","De-Activate");
        this.$el.find("#activate_subject").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate_subject").attr("title","Activate");
        this.$el.find("#activate_subject").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }
     this.firstRender = false;
		return this;
	},

    editSubject:function(e){
        e.preventDefault();
        appRouter.navigate("renderSubjectEditForm/"+ this.model.get('subject_id'), {trigger:true})
    },

     deletepop:function(){
      var self = this;
         $('#myModalSub').modal('show');
         $('#subjid').val(this.model.get('subject_id'));
         
    },


    
    actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate_subject").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateSubject(e);
         }
         else
         {
            _self.activateSubject(e);
         }

    },

    activateSubject:function(e){
        e.preventDefault();
         var self = this;

              var subjectId = this.model.get('subject_id');

              var requestData = JSON.stringify({"subject_id":subjectId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_subject',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                       //self.remove();
                        self.model.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_subject").attr("title","De-Activate");
                       self.$el.find("#activate_subject").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      $( "div.success").html("Subject activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });

    },

     deActivateSubject:function(e){
        e.preventDefault();
         var self = this;


              var subjectId = this.model.get('subject_id');

              var requestData = JSON.stringify({"subject_id":subjectId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_subject',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate_subject").attr("title","Activate");
                      self.$el.find("#activate_subject").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Subject de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });

    },


});