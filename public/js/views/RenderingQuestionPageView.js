    var admin = admin || {};
     
    admin.RenderingQuestionPageView = Backbone.View.extend({
        template: $( '#renderingQuestionTmpl' ).html(),
        initialize: function() {
            console.log("RenderingQuestionPageView");
            this.render();    
        },

        events:{
           // 'click .mf' : 'checkall',
        },
     

        render: function() {                    
            this.$el.html(this.template);
            this.questionListView = new admin.RenderingQuestionTableView({el: $( '#renderQuestionList' )});
            return this;
        },

        // checkall:function(id){

        //      console.log(id.currentTarget.attributes.id);

        //      $('.mf').click(function() {

        //      $('.mf').not(this).prop('checked', false);

        //     });
        // }

 });


    