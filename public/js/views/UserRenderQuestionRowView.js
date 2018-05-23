  var user = user ||  {};

  user.UserRenderQuestionRowView = Backbone.View.extend(
  {

    template: $('#renderAllquestionTemplate').html(),

    initialize: function()
    {

      this.firstRender = true;
      this.activeId = -1;

      // this.render();
      // _.bindAll(this, "render");
      // att.bind('change', this.render);
    },


    events:
    {
      'change input[type=radio]': 'SelectRadioButton',
      'change input[type=checkbox]': 'SelectCheckBoxButton',
      'change input[type=text]': 'SelectMatchAnswer',
      // 'click canvas': 'renderCanvas',


    },

    render: function()
    {

      $('.popover-content').hide();

      var tmpl = _.template(this.template);
      this.$el.html(tmpl(att));

      var strl = att.question_option_txt.length;
      var alphas = _.range(
        'A'.charCodeAt(0),
        'Z'.charCodeAt(0) + 1
      );

      var letters = _.map(alphas, a => String.fromCharCode(a));

      // Check for mathquill
      // if (this.$el.find("#MathQuillQuestion").length > 0)
      // {
      //   MQ.StaticMath(this.$el.find("#MathQuillQuestion")[0]);
      // }

      if (att.question_txt_format.indexOf(LATEX_GROUP_SEPERATOR) >= 0)
      {
        var storedQnFormat = att.question_txt_format.split(LATEX_GROUP_SEPERATOR);
        var questionLatexes = storedQnFormat[1];
        var questionTxtFormat = storedQnFormat[0];

        // insert the formule in respective places
        var mathFieldLatexes = questionLatexes.split(':latex:');

        for (var i = 0; i < mathFieldLatexes.length; i++)
        {
          questionTxtFormat = questionTxtFormat.replace(':latex:', '<div id="MathQuillQuestion' + (i + 1) + '" class="mathSpan">' + mathFieldLatexes[i] + '</div>');
        }

        // Set the queston with latex format
        this.$el.find("#mathquill").html(questionTxtFormat);

        for (var i = 1; i <= mathFieldLatexes.length; i++)
        {
          var mathFieldSpan = this.$el.find("#mathquill").find('#MathQuillQuestion' + i).get(0);
          // var mathFieldSpan =  mathSpans[mathSpans.length - 1];
          MQ.StaticMath(mathFieldSpan);
        }

      }
      else if (att.question_txt_format.indexOf(KEKULE_MARKER) >= 0)
      {
        var storedQnFormat = att.question_txt_format.split(KEKULE_MARKER);
        var questionJson = storedQnFormat[1];
        var configOrig = storedQnFormat[0];

        if (configOrig)
        {
          setViewerConfigs(configOrig);
        }

        // var questionTxtFormat = storedQnFormat[0];
        var mol = Kekule.IO.loadFormatData(questionJson, 'Kekule-JSON');


        var chemViewer = new Kekule.ChemWidget.Viewer(this.$el.find("#kekule")[0]);
        chemViewer.setChemObj(mol);
        // chemViewer.setDimension('800px', '300px');
        chemViewer.resetView();
        // var cmlData = this.questionData.question_txt_format;

      }



      if (att.question_type_id == 1)
      {
        for (var i = 0; i < strl; i++)
        {

          if (att.option_group.indexOf('C') >= 0)
          {
            
            if (i == att.question_answer_txt)
            {

              this.$el.find('#optiondisplay1').append(' <li class="list-group-item"><label class="col-sm-1 col-md-1 control-label" style="white-space: nowrap;"><input checked id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="radio" name="' + att.question_id + att.question_type_id + '" qtname="' + i + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + '</label><div id="opt' + i + '" class="noma chem"></div></li>');
              // this.$el.find('#optiondisplay1').append(' <li class="list-group-item">'+ '<input checked id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/> &nbsp;&nbsp;&nbsp;' + letters[i]   +') &nbsp;' + '<div id="opt' + i + '" class="noma"></div></li>');
            }
            else
            {
              this.$el.find('#optiondisplay1').append(' <li class="list-group-item"><label class="col-sm-1 col-md-1 control-label" style="white-space: nowrap;"><input id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="radio" name="' + att.question_id + att.question_type_id + '" qtname="' + i + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + '</label><div id="opt' + i + '" class="noma chem"></div></li>');
              // this.$el.find('#optiondisplay1').append(' <li class="list-group-item">'+ '<input id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/> &nbsp;&nbsp;&nbsp;' + letters[i]   +') &nbsp;' + '<div id="opt' + i +   '" class="noma"></div></li>');
              // console.log(option.latex());

            }
            // console.log(this.$el.find('#optiondisplay1').find('#opt'+i)[0]);
            var mol = Kekule.IO.loadFormatData(att.question_option_txt[i], 'Kekule-JSON');
            var chemViewer = new Kekule.ChemWidget.Viewer(this.$el.find('#optiondisplay1').find('#opt' + i)[0]);
            chemViewer.setChemObj(mol);

          }
          // Check if the option contains maths
          else if (att.option_group.indexOf('M') >= 0)
          {
            if (att.question_option_txt[i] == att.question_answer_txt)
            {

              this.$el.find('#optiondisplay1').append(' <li class="list-group-item">' + '<input checked id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="radio" name="' + att.question_id + att.question_type_id + '" qtname="' + att.question_option_txt[i] + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + '<span id="opt' + i + '" class="noma">' + att.question_option_txt[i] + '</span></li>');
            }
            else
            {
              this.$el.find('#optiondisplay1').append(' <li class="list-group-item">' + '<input id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="radio" name="' + att.question_id + att.question_type_id + '" qtname="' + att.question_option_txt[i] + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + '<span id="opt' + i + '" class="noma">' + att.question_option_txt[i] + '</span></li>');
              // console.log(option.latex());

            }
            // console.log(this.$el.find('#optiondisplay1').find('#opt'+i)[0]);
            MQ.StaticMath(this.$el.find('#optiondisplay1').find('#opt' + i)[0]);
          }
          else
          {
            if (att.question_option_txt[i] == att.question_answer_txt)
            {
              this.$el.find('#optiondisplay1').append(' <li class="list-group-item">' + '<input checked id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="radio" name="' + att.question_id + att.question_type_id + '" qtname="' + att.question_option_txt[i] + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + att.question_option_txt[i] + '</li>');
            }
            else
            {
              this.$el.find('#optiondisplay1').append(' <li class="list-group-item">' + '<input id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="radio" name="' + att.question_id + att.question_type_id + '" qtname="' + att.question_option_txt[i] + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + att.question_option_txt[i] + '</li>');
            }
          }


          // this.$el.find('#sp-'+att.attributes.question_option_txt[i]+'').on('click',function(){
          //   $('#sp-'+att.attributes.question_option_txt[i]+'').not(this).prop('checked', false);

          // });

        }
      }
      else if (att.question_type_id == 2)
      {

        if (att.option_group.indexOf('M') >= 0)
        {
          if (att.question_answer_txt == null)
          {

            for (var i = 0; i < strl; i++)
            {
              this.$el.find('#optiondisplay1').append('<li class="list-group-item"> <input id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="checkbox" name="' + att.question_id + att.question_type_id + '" qtname="' + att.question_option_txt[i] + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + '<span id="opt' + i + '">' + att.question_option_txt[i] + '</span></li>');
              // this.$el.find('#optiondisplay1').append('<li class="list-group-item"> <input id="'+att.question_id+'" class="mf" type="checkbox" qtid = "'+ att.question_type_id +'" name="'+att.question_type_id + att.question_id +'" qtname="'+att.question_option_txt[i]+'"/> &nbsp;&nbsp;&nbsp;'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '</li>');
              MQ.StaticMath(this.$el.find('#optiondisplay1').find('#opt' + i)[0]);
            }

          }
          else
          {

            var match = false;
            var ans1 = att.question_answer_txt.split(brek);

            for (var i = 0; i < att.question_option_txt.length; i++)
            {


              for (var j = 0; j < ans1.length; j++)
              {
                if (ans1[j] == att.question_option_txt[i])
                {
                  match = true;

                }
              }
              if (match)
              {

                this.$el.find('#optiondisplay1').append('<li class="list-group-item"><input id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="checkbox" name="' + att.question_id + att.question_type_id + '" checked qtname="' + att.question_option_txt[i] + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + '<span id="opt' + i + '">' + att.question_option_txt[i] + '</span></li>');
              }
              else
              {
                this.$el.find('#optiondisplay1').append('<li class="list-group-item"><input id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="checkbox" name="' + att.question_id + att.question_type_id + '" qtname="' + att.question_option_txt[i] + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + '<span id="opt' + i + '">' + att.question_option_txt[i] + '</span></li>');

              }
              MQ.StaticMath(this.$el.find('#optiondisplay1').find('#opt' + i)[0]);
              match = false;
            }
          }
        }
        else if (att.option_group.indexOf('C') >= 0)
        {
          if (att.question_answer_txt == null)
          {
            console.log(att.question_answer_txt);

            for (var i = 0; i < strl; i++)
            {
              this.$el.find('#optiondisplay1').append(' <li class="list-group-item"><label class="col-sm-1 col-md-1 control-label" style="white-space: nowrap;"><input id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="checkbox" name="' + att.question_id + att.question_type_id + '" qtname="' + i + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + '</label><div id="opt' + i + '" class="noma chem"></div></li>');
              // this.$el.find('#optiondisplay1').append(' <li class="list-group-item">'+ '<input id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="checkbox" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/> &nbsp;&nbsp;&nbsp;' + letters[i]   +') &nbsp;' + '<div id="opt' + i +   '" class="noma"></div></li>');
              var mol = Kekule.IO.loadFormatData(att.question_option_txt[i], 'Kekule-JSON');
              var chemViewer = new Kekule.ChemWidget.Viewer(this.$el.find('#optiondisplay1').find('#opt' + i)[0]);
              chemViewer.setChemObj(mol);
            }

          }
          else
          {
            var match = false;
            var ans1 = [];
            if (att.question_answer_txt)
            {
              ans1 = att.question_answer_txt.split(brek);
            }


            for (var i = 0; i < att.question_option_txt.length; i++)
            {

              for (var j = 0; j < ans1.length; j++)
              {
                if (ans1[j] == i)
                {
                  match = true;

                }
              }
              if (match)
              {

                this.$el.find('#optiondisplay1').append(' <li class="list-group-item"><label class="col-sm-1 col-md-1 control-label" style="white-space: nowrap;"><input checked=true id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="checkbox" name="' + att.question_id + att.question_type_id + '" qtname="' + i + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + '</label><div id="opt' + i + '" class="noma chem"></div></li>');
                // this.$el.find('#optiondisplay1').append(' <li class="list-group-item">'+ '<input checked=true id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="checkbox" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/> &nbsp;&nbsp;&nbsp;' + letters[i]   +') &nbsp;' + '<div id="opt' + i + '" class="noma"></div></li>');
              }
              else
              {
                this.$el.find('#optiondisplay1').append(' <li class="list-group-item"><label class="col-sm-1 col-md-1 control-label" style="white-space: nowrap;"><input id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="checkbox" name="' + att.question_id + att.question_type_id + '" qtname="' + i + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + '</label><div id="opt' + i + '" class="noma chem"></div></li>');
                // this.$el.find('#optiondisplay1').append(' <li class="list-group-item">'+ '<input id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="checkbox" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/> &nbsp;&nbsp;&nbsp;' + letters[i]   +') &nbsp;' + '<div id="opt' + i + '" class="noma"></div></li>');

              }
              var mol = Kekule.IO.loadFormatData(att.question_option_txt[i], 'Kekule-JSON');
              var chemViewer = new Kekule.ChemWidget.Viewer(this.$el.find('#optiondisplay1').find('#opt' + i)[0]);
              chemViewer.setChemObj(mol);
              match = false;
            }
          }
        }
        else
        {
          for (var i = 0; i < strl; i++)
          {

            this.$el.find('#optiondisplay1').append('<li class="list-group-item"><input id="' + att.question_id + '" class="mf" type="checkbox" qtid = "' + att.question_type_id + '" name="' + att.question_type_id + att.question_id + '" qtname="' + att.question_option_txt[i] + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + att.question_option_txt[i] + '</li>');
            // this.$el.find('#optiondisplay1').append('<li class="list-group-item"><input id="'+att.question_id+'" class="mf" type="checkbox" qtid = "'+ att.question_type_id +'" name="'+att.question_type_id + att.question_id +'" qtname="'+att.question_option_txt[i]+'"/> &nbsp;&nbsp;&nbsp;'+ letters[i] +') &nbsp;' + att.question_option_txt[i] + '</li>');
          }
          if (att.question_answer_txt == null)
          {

            // for(var i=0; i < strl; i++)
            // {

            //     this.$el.find('#optiondisplay1').append('<li class="list-group-item"><input id="'+att.question_id+'" class="mf" type="checkbox" qtid = "'+ att.question_type_id +'" name="'+att.question_type_id + att.question_id +'" qtname="'+att.question_option_txt[i]+'"/> &nbsp;&nbsp;&nbsp;'+ letters[i] +') &nbsp;' + att.question_option_txt[i] + '</li>');
            //     // this.$el.find('#optiondisplay1').append('<li class="list-group-item"><input id="'+att.question_id+'" class="mf" type="checkbox" qtid = "'+ att.question_type_id +'" name="'+att.question_type_id + att.question_id +'" qtname="'+att.question_option_txt[i]+'"/> &nbsp;&nbsp;&nbsp;'+ letters[i] +') &nbsp;' + att.question_option_txt[i] + '</li>');
            // }
          }
          else
          {

            var samans = att.question_answer_txt;
            var splitans = samans.split(brek);
            var strl1 = splitans.length;
            // for(var i=0; i < strl; i++)
            // {

            //   this.$el.find('#optiondisplay1').append('<li class="list-group-item"><input id="'+att.question_id+'" class="mf" type="checkbox" qtid = "'+ att.question_type_id +'" name="'+att.question_type_id + att.question_id +'" qtname="'+att.question_option_txt[i]+'"/> &nbsp;&nbsp;&nbsp;'+ letters[i] +') &nbsp;' + att.question_option_txt[i] + '</li>');

            // }

            for (var j = 0; j < strl1; j++)
            {
              this.$el.find('#optiondisplay1 li input').each(function()
              {
                var qtname = $(this).attr('qtname');
                if (qtname == splitans[j])
                {
                  $(this).prop("checked", true);
                }
              });

            }
          }
        }




      }
      else if (att.question_type_id == 3)
      {
        for (var i = 0; i < strl; i++)
        {
          if (att.question_option_txt[i] == att.question_answer_txt)
          {
            this.$el.find('#optiondisplay1').append('<li class="list-group-item"> <input checked id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="radio" name="' + att.question_id + att.question_type_id + '" qtname="' + att.question_option_txt[i] + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + att.question_option_txt[i] + '</li>');
          }
          else
          {
            this.$el.find('#optiondisplay1').append('<li class="list-group-item"><input id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="radio" name="' + att.question_id + att.question_type_id + '" qtname="' + att.question_option_txt[i] + '"/>  &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + att.question_option_txt[i] + '</li>');
          }

        }
      }
      else if (att.question_type_id == 4)
      {
        for (var i = 0; i < strl; i++)
        {
          if (att.question_option_txt[i] == att.question_answer_txt)
          {
            this.$el.find('#optiondisplay1').append('<li class="list-group-item"><input checked id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="radio" name="' + att.question_id + att.question_type_id + '" qtname="' + att.question_option_txt[i] + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + att.question_option_txt[i] + '</li>');
          }
          else
          {
            this.$el.find('#optiondisplay1').append('<li class="list-group-item"><input id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="radio" name="' + att.question_id + att.question_type_id + '" qtname="' + att.question_option_txt[i] + '"/>  &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + att.question_option_txt[i] + '</li>');
          }
        }
      }
      else if (att.question_type_id == 5)
      {
        var question_txt = this.$el.find('#optiondisplay3').text();
        for (var i = 0; i < att.question_option_txt.length; i++)
        {

          var quesopt = att.question_option_txt[i];
          var splitquesopt = quesopt.split(brek);
          var ddTpl = _.template($('#fillintheblank').html());
          var optionBuffer = ddTpl(
          {
            "question_option_txt": "--Please Select--"
          });
          var selectionList = "";
          for (j = 0; j < splitquesopt.length; j++)
          {
            optionBuffer = optionBuffer + (ddTpl(
            {
              "question_option_txt": splitquesopt[j]
            }));
          }
          selectionList = "<select>" + optionBuffer + "</select>";
          question_txt = question_txt.replace('___', selectionList);

        }
        this.$el.find('#optiondisplay3').html(question_txt);
        if (att.question_answer_txt != null)
        {
          this.$el.find('#optiondisplay3 option').each(function()
          {
            var optionans1 = att.question_answer_txt.split(brek);
            question_answer = $(this).val();
            for (var j = 0; j < optionans1.length; j++)
            {
              if (question_answer == optionans1[j])
              {
                $(this).prop("selected", true);
              }

            }
          });
        }
      }
      else if (att.question_type_id == 6)
      {
        for (var i = 0; i < strl; i++)
        {
          if (att.question_answer_txt != null)
          {
            this.$el.find('#optiondisplay1').append('<li class="list-group-item"> <textarea id="' + att.question_id + '" qtid = "' + att.question_type_id + '" placeholder="Enter Your Answer" style="height: 170px;" class="ttt"  name=" style="height: 170px;"' + att.question_id + att.question_type_id + '"  rows"6"  cols="60">' + att.question_answer_txt + '</textarea></li>');
          }
          else
          {
            this.$el.find('#optiondisplay1').append('<li class="list-group-item"> <textarea id="a' + att.question_id + '" qtid = "' + att.question_type_id + '" placeholder="Enter Your Answer" style="height: 170px;" class="ttt" name="' + att.question_id + att.question_type_id + '" rows"6"  cols="60" /></li>');
          }
        }
      }
      else if (att.question_type_id == 7)
      {
        // sortableclient();

        if (att.question_answer_txt != null)
        {
          var optionans1 = att.question_answer_txt.split(brek);
          for (var i = 0; i < optionans1.length; i++)
          {
            this.$el.find('#optiondisplay1').append("<div class='sa asss' id='" + optionans1[i] + "' style='border:1px solid black; padding:10px; width:60%; margin-left:20%; margin-right:20%;'>" + optionans1[i] + "</div>");
          }
        }
        else
        {
          for (var i = 0; i < strl; i++)
          {
            this.$el.find('#optiondisplay1').append("<div class='sa asss' id='" + att.question_option_txt[i] + "' style='border:1px solid black; padding:10px; width:60%; margin-left:20%; margin-right:20%;'>" + att.question_option_txt[i] + "</div>");
          }
        }

        this.$el.find('#optiondisplay1').sortable();
      }

      // else if (att.question_type_id==8){

      //     for(var i=0; i < strl; i++)
      //     {
      //         if( att.question_option_txt[i] == att.question_answer_txt){
      //         this.$el.find('#optiondisplay1').append('<li class="list-group-item">'+ letters[i]   +') &nbsp;' + att.question_option_txt[i] + '<input checked id="'+att.question_id+'" qtid = "'+ att.question_type_id +'" class="mf" type="radio" name="'+att.question_id + att.question_type_id +'" qtname="'+att.question_option_txt[i]+'"/></li>');
      //          }
      //          else{""
      //           this.$el.find('#optiondisplay1').append("<div class='sa' id='"+ att.question_option_txt[i] +"' style='border:1px solid black; padding:5px;'>" + att.question_option_txt[i] + "</div>");
      //          }
      //     }
      //   }
      else if (att.question_type_id == 8)
      {
        var option1 = att.question_option_txt[0];
        var option2 = att.question_option_txt[1];
        var splitoption1 = option1.split(brek);
        var splitoption2 = option2.split(brek);
        if (att.question_answer_txt == null)
        {
          for (var i = 0; i < splitoption1.length; i++)
          {
            var splitans = splitoption1[i].split(brek);
            this.$el.find('#optiondisplay2').append("<div class='row' style='margin:8px 0px;'><div id='seqansweroptiondiv' class='col-md-12'><div class='form-group'><label for='txtFirstNameBilling' class='col-sm-1 col-md-1 control-label'> " + (i + 1) + "</label><div class='col-sm-11 col-md-11'><div id='seqAnswerOptionMatch1' disabled>" + splitans[0] + "</div></div></div></div></div>");


          }
          for (var i = 0; i < splitoption2.length; i++)
          {
            var splitans1 = splitoption2[i].split(brek);
            this.$el.find('#optiondisplay1').append('<li class="list-group-item">' + '<input id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="radio" name="' + att.question_id + att.question_type_id + '" qtname="' + splitans1[0] + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + splitans1[0] + '</li>');
          }


        }
        else
        {
          for (var i = 0; i < splitoption1.length; i++)
          {
            var splitans = splitoption1[i].split(brek);
            this.$el.find('#optiondisplay2').append("<div class='row' style='margin:8px 0px;'><div id='seqansweroptiondiv' class='col-md-12'><div class='form-group'><label for='txtFirstNameBilling' class='col-sm-1 col-md-1 control-label'> " + (i + 1) + "</label><div class='col-sm-11 col-md-11'><div id='seqAnswerOptionMatch1' disabled>" + splitans[0] + "</div></div></div></div></div>");


          }
          for (var i = 0; i < splitoption2.length; i++)
          {
            var splitans1 = splitoption2[i].split(brek);
            if (att.question_answer_txt == splitans1)
            {
              this.$el.find('#optiondisplay1').append('<li class="list-group-item">' + '<input checked id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="radio" name="' + att.question_id + att.question_type_id + '" qtname="' + splitans1[0] + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + splitans1[0] + '</li>');
            }
            else
            {
              this.$el.find('#optiondisplay1').append('<li class="list-group-item">' + '<input id="' + att.question_id + '" qtid = "' + att.question_type_id + '" class="mf" type="radio" name="' + att.question_id + att.question_type_id + '" qtname="' + splitans1[0] + '"/> &nbsp;&nbsp;&nbsp;' + letters[i] + ') &nbsp;' + splitans1[0] + '</li>');
            }

          }
        }


      }
      else if (att.question_type_id == 9)
      {
        var option1 = att.question_option_txt[0];
        var option2 = att.question_option_txt[1];
        var splitoption1 = option1.split(brek);
        var splitoption2 = option2.split(brek);
        if (att.question_answer_txt != null)
        {
          var optionans1 = att.question_answer_txt.split(matbrek);
          for (var i = 0; i < optionans1.length; i++)
          {
            var splitans = optionans1[i].split(brek);
            this.$el.find('#optiondisplay1').append("<div class='row'><div id='matchansweroptiondiv' class='col-md-6'><div class='form-group'><label for='txtFirstNameBilling' style='margin-top:22px;' class='col-sm-3 col-md-4 control-label'> " + (i + 1) + "</label><div class='col-sm-9 col-md-4' style='margin-top:15px;'><div id='questionAnswerOptionMatch1' >" + splitans[0] + "</div></div></div></div><div id='matchansOption' class='col-md-6'><div class='form-group'><div class='col-sm-9 col-md-4 opdiv' ondrop='drop(event)' ondragover='allowDrop(event)'><div class='sa ren' draggable='true' ondragstart='drag(event)' id='" + splitans[1] + "'>" + splitans[1] + "</div> </div></div></div></div>");
          }


        }
        else
        {

          for (var i = 0; i < splitoption1.length; i++)
          {

            this.$el.find('#optiondisplay1').append("<div class='row'><div id='matchansweroptiondiv' class='col-md-6'><div class='form-group'><label for='txtFirstNameBilling' style='margin-top:22px;' class='col-sm-3 col-md-4 control-label'> " + (i + 1) + "</label><div class='col-sm-9 col-md-4' style='margin-top:15px;'><div id='questionAnswerOptionMatch1' disabled>" + splitoption1[i] + "</div></div></div></div><div id='matchansOption' class='col-md-6'><div class='form-group'><div class='col-sm-9 col-md-4 opdiv' ondrop='drop(event)' ondragover='allowDrop(event)'> </div></div></div></div>");
            this.$el.find('#optiondisplay2').append("<div class='sa ren' draggable='true' ondragstart='drag(event)' id='a" + splitoption2[i] + "'> " + splitoption2[i] + "</div>");

          }
        }
      }
      else if (att.question_type_id == 10)
      {

        if (att.question_option_txt)
        {
          // if (!this.puzzle)
          // {

          var options = {
            view: "full",
            src: null,
            bedWidth: null,
            bedHeight: null
          };




          this.puzzle = new Puzzle(this.$el, options);
          if (att.question_option_txt && att.question_option_txt.length > 0)
          {
            var puzzleConfig;
            console.log(' att.question_answer_txt', att.question_answer_txt);
            if( att.question_answer_txt != null)
            {
              if (att.question_answer_txt == 'pzCompliant')
              {
                // show image directly
                var image = new Image();
                image.src = att.question_option_txt[1];
                console.log(image.src);
                image.height = 600;
                image.height = 480;
                // image.src = this.questionData.key_answers[0].question_answer_txt;
                // image.addEventListener('load', drawTiles, false);

                // var context = this.$el.find("#puzzleParent  #puzzleCanvas")[0].getContext('2d');
                var context = this.$el.find("#puzzleCompliant")[0].getContext('2d');
                console.log(this.$el.find("#puzzleParent  #puzzleCanvas")[0]);
                this.$el.find('#tabContentContainer').hide();
                // console.log(document.getElementById('puzzleCanvas'));
                context.canvas.width = 600;
                context.canvas.height = 480;
                image.onload = function() {
                  context.drawImage(this, 0, 0);
                };
                // var boardSize = document.getElementById('puzzleAnswer').width;
                // context.drawImage(image,0,0,600,480); 
              }
              else
              {
                puzzleConfig = att.question_answer_txt;
              // var puzzleConfig = att.question_option_txt[0];
                puzzleConfig = JSON.parse(puzzleConfig);
                // !!!!!!!! If want to use previously created puzzle need to use restore logic, but it is not working in original code itself
                // Time being everytime new puzzle is made from orignial image. 
                // puzzleConfig.imgObjURL = this.questionData.answer_options[0].question_option_txt;
                puzzleConfig.imgObjURL = att.question_option_txt[1];
                this.puzzle.create(puzzleConfig);                 
              }
              
            }
            else
            {
              puzzleConfig = att.question_option_txt[0];
              // var puzzleConfig = att.question_option_txt[0];
              puzzleConfig = JSON.parse(puzzleConfig);
              // !!!!!!!! If want to use previously created puzzle need to use restore logic, but it is not working in original code itself
              // Time being everytime new puzzle is made from orignial image. 
              // puzzleConfig.imgObjURL = this.questionData.answer_options[0].question_option_txt;
              puzzleConfig.imgObjURL = att.question_option_txt[1];
              this.puzzle.create(puzzleConfig);              
            }

          }

          // } 

          // var canvas = this.$el.find('#optiondisplay1 #c');
          // var ctx = canvas[0].getContext("2d");
          // var image = new Image();
          // image.src = att.question_answer_txt;
        }
        // ~~~~~~ old logic removed
        // if( att.question_answer_txt != null){
        // var self = this;
        // // this.$el.find('#optiondisplay1').append('');
        //   var canvas = this.$el.find('#optiondisplay1 #c');
        //   var ctx = canvas[0].getContext("2d");
        //   var image = new Image();
        //   image.src = att.question_answer_txt;
        //   var boardParts;
        //   this.imagefile = image;
        //   this.content = ctx;
        //   this.boardSize = canvas[0].width;
        //   this.tileCount = 3;
        //   this.tileSize = this.boardSize / this.tileCount;
        //   this.boardparts = boardParts ;
        //   var clickLoc = new Object;
        //   clickLoc.x = 0;
        //   clickLoc.y = 0;
        //   var emptyLoc = new Object;
        //   emptyLoc.x = 0;
        //   emptyLoc.y = 0;
        //   this.ClickLoc = clickLoc;
        //   this.EmptyLoc = emptyLoc;
        //   this.renderSetBoard();
        //   image.addEventListener('load', function(){
        //     console.log("load");
        //     self.renderDrawTiles();
        //   }, false);
        //  }
        //  else{ 
        //   var self = this;
        // // this.$el.find('#optiondisplay1').append('');
        //   var canvas = this.$el.find('#optiondisplay1 #c');
        //   var ctx = canvas[0].getContext("2d");
        //   var image = new Image();
        //   image.src = att.question_option_txt[0];
        //   var boardParts;
        //   this.imagefile = image;
        //   this.content = ctx;
        //   this.boardSize = canvas[0].width;
        //   this.tileCount = 3;
        //   this.tileSize = this.boardSize / this.tileCount;
        //   this.boardparts = boardParts ;
        //   var clickLoc = new Object;
        //   clickLoc.x = 0;
        //   clickLoc.y = 0;
        //   var emptyLoc = new Object;
        //   emptyLoc.x = 0;
        //   emptyLoc.y = 0;
        //   this.ClickLoc = clickLoc;
        //   this.EmptyLoc = emptyLoc;
        //   this.renderSetBoard();
        //   image.addEventListener('load', function(){
        //     console.log("load");
        //     self.renderDrawTiles();
        //   }, false);
        // ~~~~~~ end old logic removed


        // $('#optiondisplay1 #c').on('click',function(e) {
        //   console.log("sdfdsfdsf");
        //     clickLoc.x = Math.floor((e.pageX - this.offsetLeft) / tileSize);
        //     clickLoc.y = Math.floor((e.pageY - this.offsetTop) / tileSize);
        //     if (distance(clickLoc.x, clickLoc.y, emptyLoc.x, emptyLoc.y) == 1) {
        //       slideTile(emptyLoc, clickLoc);
        //       drawTiles();
        //     }
        //   });

        // function distance(x1, y1, x2, y2) {
        //   return Math.abs(x1 - x2) + Math.abs(y1 - y2);
        // }

        // function slideTile(toLoc, fromLoc) {
        //     boardParts[toLoc.x][toLoc.y].x = boardParts[fromLoc.x][fromLoc.y].x;
        //     boardParts[toLoc.x][toLoc.y].y = boardParts[fromLoc.x][fromLoc.y].y;
        //     boardParts[fromLoc.x][fromLoc.y].x = tileCount - 1;
        //     boardParts[fromLoc.x][fromLoc.y].y = tileCount - 1;
        //     toLoc.x = fromLoc.x;
        //     toLoc.y = fromLoc.y;
        //   }
        // }

      }
      // ===========================End of question types===================================


      return this;
    },

    renderDrawTiles: function()
    {
      ctx = this.content;
      image = this.imagefile;
      boardParts = this.boardparts;
      emptyLoc = this.EmptyLoc;
      ctx.clearRect(0, 0, this.boardSize, this.boardSize);
      for (var i = 0; i <= 2; ++i)
      {
        for (var j = 0; j <= 2; ++j)
        {
          var x = boardParts[i][j].x;
          var y = boardParts[i][j].y;
          if (i != emptyLoc.x || j != emptyLoc.y)
          {
            ctx.drawImage(image, x * this.tileSize, y * this.tileSize, this.tileSize, this.tileSize,
              i * this.tileSize, j * this.tileSize, this.tileSize, this.tileSize);
          }
        }
      }
      this.boardparts = boardParts;
      this.EmptyLoc = emptyLoc;
      return this;
    },
    renderSetBoard: function()
    {
      emptyLoc = this.EmptyLoc;
      boardParts = new Array(this.tileCount);
      for (var i = 2; i >= 0; --i)
      {
        boardParts[i] = new Array(this.tileCount);
        for (var j = 2; j >= 0; --j)
        {
          boardParts[i][j] = new Object;
          boardParts[i][j].x = i;
          boardParts[i][j].y = j;
        }
      }
      emptyLoc.x = boardParts[this.tileCount - 3][this.tileCount - 3].x;
      emptyLoc.y = boardParts[this.tileCount - 3][this.tileCount - 3].y;
      this.boardparts = boardParts;
      this.EmptyLoc = emptyLoc;
      return this;
    },

    renderCanvas: function(e)
    {
      emptyLoc = this.EmptyLoc;
      clickLoc = this.ClickLoc;
      clickLoc.x = Math.floor((e.pageX - $('canvas').offset().left) / this.tileSize);
      clickLoc.y = Math.floor((e.pageY - $('canvas').offset().top) / this.tileSize);
      if (this.renderDistance(clickLoc.x, clickLoc.y, emptyLoc.x, emptyLoc.y) == 1)
      {
        this.renderSlideTile(emptyLoc, clickLoc);
        this.renderDrawTiles();
      }
      this.EmptyLoc = emptyLoc;
      this.ClickLoc = clickLoc;
      return this;
    },

    renderDistance: function(x1, y1, x2, y2)
    {
      return Math.abs(x1 - x2) + Math.abs(y1 - y2);
    },

    renderSlideTile: function(toLoc, fromLoc)
    {
      boardParts = this.boardparts;
      boardParts[toLoc.x][toLoc.y].x = boardParts[fromLoc.x][fromLoc.y].x;
      boardParts[toLoc.x][toLoc.y].y = boardParts[fromLoc.x][fromLoc.y].y;
      boardParts[fromLoc.x][fromLoc.y].x = this.tileCount - 1;
      boardParts[fromLoc.x][fromLoc.y].y = this.tileCount - 1;
      toLoc.x = fromLoc.x;
      toLoc.y = fromLoc.y;
      this.boardparts = boardParts;
      return this;
    },

    SelectRadioButton: function(e)
    {
      var question_id = $(e.target).attr('id');
      var question_type_id = $(e.target).attr('qtid');
      var question_option_txt = $(e.target).attr('qtname');
      att.question_answer_txt = question_option_txt;
    },
    SelectCheckBoxButton: function(e)
    {
      var question_id = $(e.target).attr('id');
      var question_type_id = $(e.target).attr('qtid');
      var question_option_txt = $(e.target).attr('qtname');
      var question_answer = '';
      $('#optiondisplay1 li').find(':checked').each(function()
      {
        if (question_answer == '')
        {
          question_answer = $(this).attr('qtname');

        }
        else
        {
          question_answer = question_answer + brek + $(this).attr('qtname');
        }
      });

      att.question_answer_txt = question_answer;


    },
    SelectTextarea: function(e)
    {
      var question_id = $(e.target).attr('id');
      var question_type_id = $(e.target).attr('qtid');
      var question_answer = '';

      question_answer = $('#a' + question_id).val();
      if (question_answer == '')
      {
        alert("please enter answer");
      }
      else
      {
        att.question_answer_txt = question_answer;
      }

    },


  });