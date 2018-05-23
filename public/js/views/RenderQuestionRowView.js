var admin = admin || {};

admin.RenderQuestionRowView = Backbone.View.extend({

    template: $( '#renderAllquestionTemplate' ).html(),

    initialize: function() {
         
      this.firstRender = true;
      this.activeId = -1;
      this.render();
     // _.bindAll(this, "render");
     // att.bind('change', this.render);
    },


    events:{
     'change input[type=radio]': 'SelectRadioButton',
     'change input[type=checkbox]': 'SelectCheckBoxButton',
     
    },

  render: function() {
          $('.popover-content').hide();

          var tmpl = _.template( this.template );
          this.$el.html( tmpl(att) );         
          var strl =att.question_option_txt.length;
          
          
       
          var alphas = _.range(
            'A'.charCodeAt(0),
            'Z'.charCodeAt(0)+1
          );

          var letters = _.map(alphas, a => String.fromCharCode(a));

      if (att.question_type_id==1){
          for(var i=0; i < strl; i++)
          {
              if( att.question_option_txt[i] == att.question_answer_txt){
              this.$el.find('#optiondisplay1').append(' <li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input checked id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
               else{
                this.$el.find('#optiondisplay1').append(' <li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
               
               // this.$el.find('#sp-'+att.attributes.question_option_txt[i]+'').on('click',function(){
               //   $('#sp-'+att.attributes.question_option_txt[i]+'').not(this).prop('checked', false);

               // });
          
        }
      }
      
      else if (att.question_type_id==2){
          if(att.question_answer_txt == null ){

             for(var i=0; i < strl; i++)
          {
             
                this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input id="'+att.question_id+'" class="mf" type="checkbox" qtid = "'+ att.question_type_id +'" name="'+att.question_type_id + att.question_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
              
             }
          }
        
          else{
            
            var strl1 = att.question_answer_txt.length;
                for(var i=0; i < strl; i++)
          {
             
                this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input id="'+att.question_id+'" class="mf" type="checkbox" qtid = "'+ att.question_type_id +'" name="'+att.question_type_id + att.question_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
              
             }
          
             for(var j=0;j<strl1;j++){
              this.$el.find('#optiondisplay1 li input').each(function(){
                 var qtname = $(this).attr('qtname');
                  if(qtname == att.question_answer_txt[j] ){
                 $(this).prop("checked", true);
              }
              });
              
             }
          }
        

      }

     
      else if (att.question_type_id==3){
          for(var i=0; i < strl; i++)
          {
            if( att.question_option_txt[i] == att.question_answer_txt){
              this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input checked id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
               else{
                this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
            
          }
        }

      else if (att.question_type_id==4){
          for(var i=0; i < strl; i++)
          {
             if( att.question_option_txt[i] == att.question_answer_txt){
              this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input checked id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
               else{
                this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
          }
        }

      else if (att.question_type_id==5){
          for(var i=0; i < strl; i++)
          {
             if( att.question_option_txt[i] == att.question_answer_txt){
              this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input checked id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
               else{
                this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
          }
        }

      else if (att.question_type_id==6){
          for(var i=0; i < strl; i++)
          {
              if( att.question_option_txt[i] == att.question_answer_txt){
              this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input checked id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
               else{
                this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
          }
        }

      else if (att.question_type_id==7){
          for(var i=0; i < strl; i++)
          {
              if( att.question_option_txt[i] == att.question_answer_txt){
              this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input checked id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
               else{
                this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
          }
        }

      else if (att.question_type_id==8){
          for(var i=0; i < strl; i++)
          {
              if( att.question_option_txt[i] == att.question_answer_txt){
              this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input checked id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
               else{
                this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
          }
        }

      else if (att.question_type_id==9){
          for(var i=0; i < strl; i++)
          {
              if( att.question_option_txt[i] == att.question_answer_txt){
              this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input checked id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
               else{
                this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
          }
        }

      else if (att.question_type_id==10){
          for(var i=0; i < strl; i++)
          {
              if( att.question_option_txt[i] == att.question_answer_txt){
              this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input checked id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
               else{
                this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
               }
          }
        }

    
    return this;
  },

  SelectRadioButton:function(e){
    var question_id = $(e.target).attr('id');
    var question_type_id = $(e.target).attr('qtid');
    var question_option_txt = $(e.target).attr('qtname');
    att.question_answer_txt= question_option_txt;
  },
  SelectCheckBoxButton:function(e){
    var question_id = $(e.target).attr('id');
    var question_type_id = $(e.target).attr('qtid');
    var question_option_txt = $(e.target).attr('qtname');
    var question_answer = [];
    $('#optiondisplay1 li').find(':checked').each(function(){
            question_answer.push($(this).attr('qtname'));
    });

    att.question_answer_txt = question_answer;

  }



});

