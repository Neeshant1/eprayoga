var admin = admin || {};

admin.QuestionRowView = Backbone.View.extend({

    tagName:'tr',
  	idName: 'questionList',
	  template: $( '#questionTemplate' ).html(),
    template1: $( '#deleteallscript' ).html(),


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
       'click #edit-question' :'editQuestion',
       'click #delete-question' :'showDeletePopup',
       'click #activate-question' :'actAndDeactivate',
       'click .kekule1' : "kekule",
       'click .maths' : "maths"
        
      // 'click #deactivate-question' :'deActivateQuestion'

    },



    maths : function(e){

     // $('#myModalMath').modal('show');   
      id = e.target.id;
      newid = "#" + id;    
      option = this.model.get('question_txt_format');
      var modal = $(newid).next('#myModalMath');
      $(modal).modal('show');
     // var storedQnFormat = option.split(LATEX_GROUP_SEPERATOR);
   //   var questionLatexes = storedQnFormat[0];
    //  var questionJson = storedQnFormat[1];
       var math = $(newid).next('#myModalMath').find('#math')[0];
      // console.log(math);  
      // console.log(questionLatexes);
      // $(math).text(questionLatexes);
      // MQ.StaticMath(math);
      if (option.indexOf(LATEX_GROUP_SEPERATOR) >= 0)
      {
        var storedQnFormat = option.split(LATEX_GROUP_SEPERATOR);
        var questionLatexes = storedQnFormat[1];
        var questionTxtFormat = storedQnFormat[0];

        // insert the formule in respective places
        var mathFieldLatexes = questionLatexes.split(':latex:');

        for (var i = 0; i <  mathFieldLatexes.length; i++) {
          questionTxtFormat = questionTxtFormat.replace(':latex:', '<div class="MathQuillQuestion' + (i+1) +'" class="mathSpan">'+ mathFieldLatexes[i] +'</div>');
        }

        // Set the queston with latex format
        $(math).html(questionTxtFormat);
        for (var i = 1; i <= mathFieldLatexes.length; i++) {
          var mathFieldSpan = $(math).find('.MathQuillQuestion' + i).get(0);
          // var mathFieldSpan =  mathSpans[mathSpans.length - 1];
          MQ.StaticMath(mathFieldSpan);      
        }

      }

    },


  kekule : function(e){

   // $('#myModalChemistry').modal('show');
    id = e.target.id;
    newid = "#" + id;
    option = this.model.get('question_txt_format');

   // var modal = $(newid).parent().parent().children('div#myModalChemistry');
   var modal = $(newid).parent().parent().parent().parent().parent().find('div #myModalChemistry');
    //$(modal).modal('show');
    $(modal).show();
    var chemViewer = new Kekule.ChemWidget.Viewer($(newid).parent().parent().parent().parent().parent().find('div #myModalChemistry').find('#kekuleChem')[0]);
    var storedQnFormat = option.split(KEKULE_MARKER);
    var questionJson = storedQnFormat[1];
    
    var mol = Kekule.IO.loadFormatData(questionJson, 'Kekule-JSON');
    chemViewer.setChemObj(mol);
   // chemViewer.setDimension('400px', '250px');
    chemViewer.resetView();
    chemViewer.setDimension('400px', '250px');
    chemViewer.doResize();
   
    
  },

	render: function() {
    $('.popover-content').hide();
		var tmpl = _.template( this.template );
		this.$el.html( tmpl( this.model.toJSON() ) );
    this.$el.append(this.template1);
    if(  this.firstRender )
    {     
 
      if( this.activeId == 1 )
      {
        this.$el.find("#activate-question").attr("title","De-Activate");
        this.$el.find("#activate-question").html("<i class=\"glyphicon glyphicon-ban-circle\">");
      }
      else
      {
        this.$el.find("#activate-question").attr("title","Activate");
        this.$el.find("#activate-question").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");
      }
    }

    // $('#myModalChemistry').focusout(function(){
    //     alert("delete");
    // });
		return this;
	},

  editQuestion:function(e){
        e.preventDefault();
        appRouter.navigate("renderEditQuestionForm/"+ this.model.get('question_id'), {trigger:true})
  },
  showDeletePopup:function(e){
    e.preventDefault();
        var self = this;
        var questionId = this.model.get('question_id');
        var categoryId = this.model.get('category_id');
        var subjectId = this.model.get('subject_id');
        var topicId = this.model.get('topic_id');
        var clientId = this.model.get('clnt_id');
        var requestData = JSON.stringify({"question_id":questionId,"category_id":categoryId,"subject_id":subjectId,"topic_id":topicId,"clnt_id":clientId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/delete_question_alert',
                    data: requestData,
                    contentType:'application/json',
                    cache:false,
                    success: function(data) {
                      $('#quesid').val(questionId);
                      $('#catid').val(categoryId);
                      $('#subid').val(subjectId);
                      $('#topid').val(topicId);
                      $('#clnid').val(clientId);
                      $('#com_ques').find('#texval').html(data);
                      $('#myModal').modal('toggle');
                      $('#myModal').modal('show');
                      // self.remove();
                      // $( "div.success").html("Question Deleted Successfully.");
                      // $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                      self.remove();
                        errorhandle(data);
 
                    }
             });  
  },

 
    //  activateQuestion:function(e){
    //     e.preventDefault();
    //     var self = this;
    //     console.log(this.model.get('question_id'));
    //     var questionId = this.model.get('question_id');
    //     var requestData = JSON.stringify({"question_id":questionId});

    //      $.ajax({
    //                 type: 'POST',
    //                 url: '/eprayoga/admin/activate-question',
    //                 data: requestData,
    //                 contentType:'application/json',
    //                 cache:false,
    //                 success: function(data) {
    //                   self.remove();
    //                   $( "div.success").html("country Deleted Successfully.");
    //                   $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
    //                 },
    //                 error: function(data) {
                       
    //                 }
    //          });

    // },

    //  deActivateQuestion:function(e){
    //     e.preventDefault();
    //     var self = this;
    //     console.log(this.model.get('question_id'));
    //     var questionId = this.model.get('question_id');
    //     var requestData = JSON.stringify({"question_id":questionId});

    //      $.ajax({
    //                 type: 'POST',
    //                 url: '/eprayoga/admin/deactivate-question',
    //                 data: requestData,
    //                 contentType:'application/json',
    //                 cache:false,
    //                 success: function(data) {
    //                   self.remove();
    //                   $( "div.success").html("country Deleted Successfully.");
    //                   $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
    //                 },
    //                 error: function(data) {
                       
    //                 }
    //          });

    // }

    actAndDeactivate:function(e)
    {
        e.preventDefault();
         var _self = this;
         var nameText =  _self.$el.find("#activate-question").attr("title");

         if( nameText == "De-Activate")
         {
            _self.deActivateQuestion(e);
         }
         else
         {
            _self.activateQuestion(e);
         }

    },

    activateQuestion:function(e){
        e.preventDefault();
         var self = this;

              var questionId = this.model.get('question_id');

              var requestData = JSON.stringify({"question_id":questionId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/activate_question',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {
                       //self.remove();
                        self.model.set({is_active: "<i class=\"glyphicon glyphicon-ok-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate-question").attr("title","De-Activate");
                       self.$el.find("#activate-question").html("<i class=\"glyphicon glyphicon-ban-circle\">");

                      $( "div.success").html("Question activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });

    },

     deActivateQuestion:function(e){
        e.preventDefault();
         var self = this;

              var questionId = this.model.get('question_id');

              var requestData = JSON.stringify({"question_id":questionId});

         $.ajax({
                    type: 'POST',
                    url: '/eprayoga/admin/deactivate_question',
                    data: requestData,
                     contentType:'application/json',
                    cache:false,
                    success: function(data) {

                          //self.remove();
                       //self.model.set({is_active: 0});
                       self.model.set({is_active: "<i class=\"glyphicon glyphicon-remove-sign\"></i>"});
                       self.render();
                        self.$el.find("#activate-question").attr("title","Activate");
                      self.$el.find("#activate-question").html("<i class=\"glyphicon glyphicon-ok-sign\"></i>");

                      $( "div.success").html("Question de-activated Successfully.");
                      $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );   
                    },
                    error: function(data) {
                       errorhandle(data);

                    }
             });

    },



});

