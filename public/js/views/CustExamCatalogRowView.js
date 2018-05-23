var user = user || {};

user.CustExamCatalogRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'examsCustList',
	  template: $( '#custExamTemplate' ).html(),

    initialize: function() {

        this.firstRender = true;
        this.activeId = -1;
        this.recIndex = 0;
    	_.bindAll(this, "render");
        this.model.bind('change', this.render);
	},

    events: {
        'click #scheduleCustPage': 'renderScheduleForm',
        'click #re_schedule_page': 'renderReScheduleForm',
        'click #saveschedule' : 'saveSchedule',
         'click #start_exam'   : 'startExam'

    },


	render: function() {
    $('.popover-content').hide();
		var tmpl = _.template( this.template );

		this.$el.html( tmpl( this.model.toJSON() ) );


		return this;
	},

  renderScheduleForm:function(e){       
   
    userRouter.navigate("renderScheduleForm/"+ this.model.get('id'), {trigger:true});

  },

  renderReScheduleForm:function(e){

     userRouter.navigate("renderReScheduleForm/"+ this.model.get('exam_schedule_id'), {trigger:true});

    },


    startExam:function(e){

        e.preventDefault();

       // alert("test");
       userRouter.currentView.orderdetail = this.model; 
       
        userRouter.navigate("examStart", {trigger: true});
    }



  

});