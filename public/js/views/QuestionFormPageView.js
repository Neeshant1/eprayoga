var admin = admin || {};

admin.QuestionFormPageView = Backbone.View.extend(
{
  el: $('#page-section'),
template1: $( '#popupscript' ).html(),
  initialize: function(options)
  {
    $('.popover-content').hide();
    $("#form-tabs-t-1").show();
    this.mode = options.mode;
    this.questionId = options.id;
    this.template = options.template;

    var self = this;

   

    if (new String(this.mode).valueOf() == new String('create').valueOf())
    {
      $.when(
        $.ajax(
        {
          url: "/eprayoga/admin/get_client_id",
          type: "GET",
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {

            

            self.clientData = data;
          },
          error: function(data) {
           errorhandle(data);

          }
        }),

        // $.ajax({
        //     url: "/eprayoga/admin/get-category-list-client",
        //     type: "GET",
        //     data:requestData1,
        //     contentType:'application/json',
        //     cache:false,
        //     success: function(data) {

       

        //        self.categoryData = data;
        //     },
        //     error: function(data) {
        //        errorhandle(data);

        //     }
        // }),
        $.ajax(
        {
          url: "/eprayoga/admin/select_question_complexity",
          type: "GET",
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
            
            self.complexityData = data;
          },
          error: function(data)
          {
           
            errorhandle(data);
          }
        }),
        $.ajax(
        {
          url: "/eprayoga/admin/select_question_type",
          type: "GET",
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
           
            self.questionTypeData = data;
          },
          error: function(data)
          {
            
            errorhandle(data);
          }
        })
      ).done(function()
      {

        self.render();

        self.clientCollectionView = new admin.MgntClientCollectionView(
        {
          el: $('#questionClient'),
          clientCollection: self.clientData
        });

        // self.catCollectionView = new admin.MgntCategoryCollectionView({
        //    el: $( '#questionCategory' ),
        //    catCollection: self.categoryData
        //  });

        self.complexityCollectionView = new admin.MgmtComplexityQuestionCollectionView(
        {
          el: $('#questionComplexity'),
          complexityCollection: self.complexityData
        });

        self.questionTypeCollectionView = new admin.MgntQuestionTypeCollectionView(
        {
          el: $('#questionType'),
          questionTypeCollection: self.questionTypeData
        });

      });
    }
    else
    { //mode=edit
      self.reqJSON = JSON.stringify(
      {
        "question_id": this.questionId
      });
      $.when(
        $.ajax(
        {
          url: "/eprayoga/admin/get_question_by_id",
          type: "POST",
          data: self.reqJSON,
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
            self.questionData = data;
           
          },
          error: function(data) {
            errorhandle(data);
          }
        }),
        $.ajax(
        {
          url: "/eprayoga/admin/get_client_id",
          type: "GET",
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {

           
            self.clientData = data;
          },
          error: function(data) {
            errorhandle(data);

          }
        }),
        $.ajax(
        {
          url: "/eprayoga/admin/get_category_list",
          type: "GET",
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {


            self.categoryData = data;
          },
          error: function(data) {
            errorhandle(data);

          }
        }),
        $.ajax(
        {
          url: "/eprayoga/admin/select_question_complexity",
          type: "GET",
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
           
            self.complexityData = data;
          },
          error: function(data)
          {
           
            errorhandle(data);
          }
        }),
        $.ajax(
        {
          url: "/eprayoga/admin/select_question_type",
          type: "GET",
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
           
            self.questionTypeData = data;
          },
          error: function(data)
          {
           
            errorhandle(data);
          }
        })
      ).done(function()
      {
        self.render();

        self.clientCollectionView = new admin.MgntClientCollectionView(
        {
          el: $('#questionClient'),
          clientCollection: self.clientData
        });

        $('#questionClient').val(self.questionData.clnt_id);


        self.catCollectionView = new admin.MgntCategoryCollectionView(
        {
          el: $('#questionCategory'),
          catCollection: self.categoryData,
          subject_id: self.questionData.subject_id,
          topic_id: self.questionData.topic_id

        });

        $('#questionCategory').val(self.questionData.category_id);
        self.catCollectionView.isSelected();
        // $('#questionSubject' ).val(self.questionData.subject_id);
        // $('#questionSubject' ).val(self.questionData.subject_id);



        //self.complexityCollectionView.isSelected();


        self.questionTypeCollectionView = new admin.MgntQuestionTypeCollectionView(
        {
          el: $('#questionType'),
          questionTypeCollection: self.questionTypeData
        });

        $('#questionType').val(self.questionData.question_type_id);
        //self.questquestionComplexityionTypeCollectionView.isSelected();

        self.complexityCollectionView = new admin.MgmtComplexityQuestionCollectionView(
        {
          el: $('#questionComplexity'),
          complexityCollection: self.complexityData
        });

        $('#questionComplexity').val(self.questionData.difficulty_level_id);

        
      });
    }
  },

  events:
  {
    'click  #saveQuestion': 'saveQuestion',
    'click  #cancel': 'cancelCreateQuestionForm',
    'click #addAnswer': 'addAnswer',
    'click #removeAnswer': 'removeAnswer',
    'click #addOption': 'addOption',
    'click #removeOption': 'removeOption',
    'click #questionClient': 'questionClientFocus',
    'click #questionCategory': 'questionCategoryFocus',
    'click #questionSubject': 'questionSubjectFocus',
    'click #questionTopic': 'questionTopicFocus',
    'click #questionText': 'questionTextFocus',
    'change #questionType': 'renderquestionType',
    'click #questionComplexity': 'questionComplexityFocus',
    'click .q_desc': 'questionDescriptiveFocus',
    'click #questionTotalMark': 'questionTotalMarkFocus',
    'click #questionNegativeMark': 'questionNegativeMarkFocus',
    'click #questionWeightage': 'questionWeightageFocus',
    'click #optionDiv input[type="text"]': 'optionDivInputFocus',
    'click #answerDiv input[type="text"]': 'answerDivInputFocus',
    'click #form-tabs-t-1': 'tabClicked',
    'click #form-tabs-t-2': 'tabClicked1',
    'click textarea': 'focustextarea',
    'click .addBlankOption': 'addBlankOption',
    'click .removeBlankOption': 'removeBlankOption',
    'change  #questionClient': 'selectcatsuptop',

    'click #mathQuestion': 'enableMathQuestion',
    'click #plainText': 'enablePlainText',
    'click #chemistryQuestion'       : 'enableChemsitryQuestion',

    'click #mathOptions': 'enableMathOption',
    'click #plainOptions': 'enablePlainOption',
    'click #chemistryOptions': 'enableChemistryOption',
    'click .editfield': 'editField',
    'click .removefield': 'removeField',
    'change #plainAnswerdiv .optionChanged': 'optionChange',
    'change #matchOption .optionChanged': 'optionChange',
    'change #matchAnswer .optionChanged': 'optionChange',
    'change #sequenceAnswer .optionChanged': 'optionChange',
    'change #blankOptions1 #questionAnswerOptionMatch1' : 'optionChange',
    'change #blankOptions2 #questionAnswerOptionMatch1' : 'optionChange',
    'change #blankOptions0 #questionAnswerOption1' : 'optionChange',
   'change #blankOptions1 #questionAnswerOption1' : 'optionChange',
    'change #imageupload' : 'UploadImage',
    'click #del_Country_id' : 'showPopup'
    //  'change #mathquillAnswerdiv .mq-math-mode' : 'optionChange'



    // 'tabsbeforeactivate #form-tabs' : 'tabClicked',
    // 'click #form-tabs-t-1' : 'tabClicked'
  },

  // tabClicked : function(e){
  //   e.preventDefault();
  //   $("#form-tabs-t-0").click();
  // },
  selectcatsuptop: function()
  {
    var self = this;
    var questionFormData1 = $("#questionClient").val();
    self.reqJSON = {
      "client_id": questionFormData1
    }
    if (new String(this.mode).valueOf() == new String('create').valueOf())
    {
      $.when(
        $.ajax(
        {
          url: "/eprayoga/admin/get_category_list_client",
          type: "GET",
          data: self.reqJSON,
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
            self.categoryData = data;
          },
          error: function(data)
          {
            errorhandle(data);
          }
        })
      ).done(function()
      {

        // self.render();                     
        self.catCollectionView = new admin.MgntCategoryCollectionView(
        {
          el: $('#questionCategory'),
          catCollection: self.categoryData
        });


      });
    }
    else
    {
      $.when(
        $.ajax(
        {
          url: "/eprayoga/admin/get_category_list_client",
          type: "GET",
          data: self.reqJSON,
          contentType: 'application/json',
          cache: false,
          success: function(data)
          {
            self.categoryData = data;
          },
          error: function(data)
          {
            errorhandle(data);

          }
        })
      ).done(function()
      {

        self.catCollectionView = new admin.MgntCategoryCollectionView(
        {
          el: $('#questionCategory'),
          catCollection: self.categoryData,
          subject_id: self.questionData.subject_id,
          topic_id: self.questionData.topic_id

        });
      });
    }

  },

  // ===================================================================================
  //                                OPTION Screen Rendering
  // ===================================================================================   
  tabClicked: function()
  {
    var type = $("#questionType").val();

    $('#formatLinks').hide();


    //this.blankOptions = {};
    if (type == 8)
    {
      sortableSeq();
      $('#sequenceRow').show();
      this.matchlength = $('#sequenceOption').find('input:text').length;
     
    }
    else if (type == 9)
    {
      $('#matchRow').show();
      this.matchlength = $('#matchOption').find('input:text').length;
    
    }
    else if (type == 10)
    {
      if (!this.puzzle)
      {
        console.log('---------calling makeGadgets from tabClicked---------');
        this.puzzle = makeGadgets();
        // if edit
        if (this.questionData && this.questionData.answer_options && this.questionData.answer_options.length > 0)
        {
          var puzzleConfig = this.questionData.answer_options[0].question_option_txt;
          puzzleConfig = JSON.parse(puzzleConfig);
          // !!!!!!!! If want to use previously created puzzle need to use restore logic, but it is not working in original code itself
          // Time being everytime new puzzle is made from orignial image. 
          // puzzleConfig.imgObjURL = this.questionData.answer_options[0].question_option_txt;
          puzzleConfig.imgObjURL = this.questionData.answer_options[1].question_option_txt;
          // puzzleConfig.imgObjURL = this.questionData.key_answers[0].question_answer_txt; //~~~ not used key answer value
          this.puzzle.create(puzzleConfig);
        }

      }      
    }
    else
    {
      // Show option for fill in the blanks
      if (type == 5)
      {
        // for fill in the blanks
        var question = $("#questionText").val();
      
        var noOfBlanks = (question.match(/___/g) || []).length;

        if (!this.question || this.question != question)
        {
         
          this.question = question;
          $('#fillIntheBlanks').empty();
          this.blankOptions = {};
          // if ($.isEmptyObject(this.blankOptions))
          {
           
            for (var i = 1; i <= noOfBlanks; i++)
            {

              $('#fillIntheBlanks').append("<div class='row'><h3>Blank " + i + " Options</h3><div id='blankOptions" + i + "' class='col-md-6'><div class='form-group'><center><div id='question_answers_error' style='color:red'></div></center></div><div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option 1</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOptionMatch1'  type='text' class='form-control'></div><button type='button' name='blankOptions" + i + "' class='addBlankOption btn btn-raised btn-black'>+</button> <button type='button' name='blankOptions" + i + "'  class='removeBlankOption btn btn-raised btn-black'>-</button></div></div></div>");
              this.blankOptions['blankOptions' + i] = 1;
            }
          
          }
        }
        $('#sequenceRow').hide();
        $('#fillIntheBlanks').show();

      }
      else
      {
        $('#matchRow').hide();
        $('#matchOption').hide();
        $('#matchAnswer').hide();
        $('#fillIntheBlanks').hide();
        $('#sequenceRow').hide();

        
        if (type == 1 || type == 2)
        {
         
          $('#formatLinks').show();
          $('#optionDiv').show();
        }
        var oldRedraw = this.redraw;
        // Refresh the math objects to display symbols correctly
        $.each(this.mathOptionFields, function(i, opt)
        {
          opt.reflow();
        });
        this.redraw = oldRedraw;

        $.each(this.chemOptionFields, function(i, opt)
        {
          opt.setDimension('400px','250px');
          opt.resetView();
        });        

      }

    }

    // To handle edit only for chemistry
     if (this.optionFormat == 'chemistry')
     {
      this.redraw = true;
     }

    this.length1 = $('#optionDiv').find('#plainAnswerdiv').find('input:text').length;
   

    if (type == 3 || type == 4)
    {
      $('#form-tabs-t-2').trigger('click');

    }
    // else if (type == 4)
    // {
    //   $('#form-tabs-t-2').trigger('click');

    // }
  },

  // ===================================================================================
  //                                Key Answer Screen Rendering
  // ===================================================================================    
  tabClicked1: function()
  {
   
    if (this.redraw)
    {
      $('#answerDiv #answeroptiondiv').empty();
      $('#matchAnswerDiv #matchansweroptiondiv').empty();
      $('#matchAnserDiv').empty();
      $('#matchAnswerDiv').empty();
      $('#matchAnswerDiv #matchansOption').empty();
      $('#finalDiv').hide();
      $('#chemistryOptionDiv').empty();

      // this.length2 = $('#answerDiv').find('input:text').length;
     
      //$('#addAnswer').trigger('click');
     

      // ------------------------------------------------------------------------------------------
      //                           Show key answers in create mode
      // ------------------------------------------------------------------------------------------
      if (new String(this.mode).valueOf() == new String('create').valueOf())
      {
        var type = $("#questionType").val();
        var answerOption = [];
        if (this.optionFormat == '')
        $('#optionDiv #plainAnswerdiv input[type="text"]').each(function()
        {
          answerOption.push(
          {
            "question_option_txt": this.value
          });
        });
       
        var matchOptionQus = [];
        $('#matchOption input[type="text"]').each(function()
        {
          matchOptionQus.push(
          {
            "question_option_txt": this.value
          });
        });

       

        var matchOptionAns = [];
        $('#matchAnswer input[type="text"]').each(function()
        {
          matchOptionAns.push(
          {
            "question_option_txt": this.value
          });
        });
      

        var sequenceAns = [];
        $('#sequenceAnswer input[type="text"]').each(function()
        {
          sequenceAns.push(
          {
            "question_option_txt": this.value
          });
        });
      
        if (type == 1)
        {
          if (this.optionFormat == 'latex')
          {
            $.each(this.mathOptionFields, (function(i, option)
            {
             
              $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1' class='optionChanged' type='radio' name='single' value='" + option.latex() + "' > <label for='txtFirstNameBilling' ><span id='opt" + i + "'>" + option.latex() + "</span></label></div> ");

              MQ.StaticMath($('#answeroptiondiv').find('#opt' + i)[0]);
            }));
          }
          else if (this.optionFormat == 'chemistry')
          {
            $.each(this.chemOptionFields, (function(i, option)
            {
             
              $('#answerDiv').find("#chemistryOptionDiv").append("<div><label for='txtFirstNameBilling' class='col-sm-2 col-md-2 control-label'><input id='chemistryAnswerOption1' class='optionChanged' type='radio' name='single' value='" + i + "' ></label><div id='opt" + i + "' style='border: 2px dashed #ccc;'></div></div> ");
              // $('#answerDiv').find("#chemistryOptionDiv").append("<div><label for='txtFirstNameBilling' class='col-sm-2 col-md-2 control-label'></label><input id='chemistryAnswerOption1' class='optionChanged' type='radio' name='single' value='" + i + "' ><div id='opt" + i + "' style='border: 2px dashed #ccc;'></div></div> ");
             
              var chemViewer = new Kekule.ChemWidget.Viewer($('#chemistryOptionDiv').find('#opt' + i)[0]);
              chemViewer.setChemObj(option.getChemObj());
              chemViewer.setDimension('400px', '250px');
            }));            
          }
          else
          {
            for (var i = 0; i < answerOption.length; i++)
            {
             
              $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1' class='optionChanged' type='radio' name='single' value='" + answerOption[i]['question_option_txt'] + "' > <label for='txtFirstNameBilling' >" + answerOption[i]['question_option_txt'] + "</label></div> ");
            }
          }
        }
        else if (type == 2)
        {
          if (this.optionFormat == 'latex')
          {
            $.each(this.mathOptionFields, (function(i, option)
            {
             
              $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1' class='optionChanged' type='checkbox' name='single' value='" + option.latex() + "' > <label for='txtFirstNameBilling' ><span id='opt" + i + "'>" + option.latex() + "</span></label></div> ");

              MQ.StaticMath($('#answeroptiondiv').find('#opt' + i)[0]);
            }));
          }
          else if (this.optionFormat == 'chemistry')
          {
            $.each(this.chemOptionFields, (function(i, option)
            {
            
              // $('#answerDiv').find("#chemistryOptionDiv").append("<div><label for='txtFirstNameBilling' class='col-sm-2 col-md-2 control-label'></label><input id='chemistryAnswerOption1' class='optionChanged' type='checkbox' name='single' value='" + i + "' ><div id='opt" + i + "' style='border: 2px dashed #ccc;'></div></div> ");
              $('#answerDiv').find("#chemistryOptionDiv").append("<div><label for='txtFirstNameBilling' class='col-sm-2 col-md-2 control-label'><input id='chemistryAnswerOption1' class='optionChanged' type='checkbox' name='single' value='" + i + "' ></label><div id='opt" + i + "' style='border: 2px dashed #ccc;'></div></div> ");
             
              var chemViewer = new Kekule.ChemWidget.Viewer($('#chemistryOptionDiv').find('#opt' + i)[0]);
              chemViewer.setChemObj(option.getChemObj());
              chemViewer.setDimension('400px', '250px');
            }));   
          }
          else
          {
            for (i = 0; i < answerOption.length; i++)
            {
             
              $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1' class='optionChanged' type='checkbox' name='single' value='" + answerOption[i]['question_option_txt'] + "' > <label for='txtFirstNameBilling' >" + answerOption[i]['question_option_txt'] + "</label></div> ");
            }
          }
        }
        else if (type == 3)
        {
          for (i = 0; i < answerOption.length; i++)
          {
           
            $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1' class='optionChanged' type='radio' name='single' value=" + answerOption[i]['question_option_txt'] + " > <label for='txtFirstNameBilling' >" + answerOption[i]['question_option_txt'] + "</label></div> ");
          }
        }
        else if (type == 4)
        {
          for (i = 0; i < answerOption.length; i++)
          {
           
            $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1' class='optionChanged' type='radio' name='single' value=" + answerOption[i]['question_option_txt'] + " > <label for='txtFirstNameBilling' >" + answerOption[i]['question_option_txt'] + "</label></div> ");
          }
        }
        else if (type == 5)
        {
          $('#sequenceRow').hide();
          // Display drop down list for fill in the blanks
          var question = $("#questionText").val();
          // var $option;
          var blanksArray = Object.keys(this.blankOptions);
          var ddTpl = _.template($('#fillintheblank').html());
          var optionBuffer = "";
          var selectionList = "";

          $.each(blanksArray, function(i, val)
          {
            optionBuffer = "";
            $('#' + val + ' input[type="text"]').each(function()
            {
             
              // question_option_txt = answerOption[i]['question_option_txt'];
              question_option_txt = this.value;
              optionBuffer = optionBuffer + (ddTpl(
              {
                question_option_txt: question_option_txt,
                isSelected: ""
              }));
            });
            selectionList = "<select>" + optionBuffer + "</select>";
            question = question.replace('___', selectionList);

          });
          $('#answerDiv').find("#answeroptiondiv").append(question);
         



          // for(i=0; i<answerOption.length; i++)
          // {
         
          //   // question_option_txt = answerOption[i]['question_option_txt'];
          //   // tpl1 =  tpl1+(tpl(question_option_txt));
          // // }
          // var tpl2 = "<select>"  +tpl1+"</select>" ;
         
          // $('#answerDiv').find("#answeroptiondiv").append(question.replace('___',tpl2 ));

        }
        else if (type == 6)
        {
          $('#answerDiv').find("#answeroptiondiv").append("<textarea class='ttt optionChanged' rows='6' id='questionAnswerOption1' cols='60'></textarea>");
        }
        else if (type == 7)
        {
          sortable();
          for (i = 0; i < answerOption.length; i++)
          {
           
            $('#answerDiv').find("#answeroptiondiv").append("<div class='sa ass' id='" + answerOption[i]['question_option_txt'] + "'>" + answerOption[i]['question_option_txt'] + "</div>");
          }

        }
        else if (type == 8)
        {
          for (i = 0; i < sequenceAns.length; i++)
          {
           
            $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1' class='optionChanged' type='radio' name='single' value=" + sequenceAns[i]['question_option_txt'] + " > <label for='txtFirstNameBilling' >" + sequenceAns[i]['question_option_txt'] + "</label></div> ");
          }
        }
        else if (type == 9)
        {
          $('#finalDiv').show();
          $('#matchAnswerDiv').show();
          for (i = 0; i < matchOptionQus.length; i++)
          {
           
            // $('#matchAnswerDiv').find('#matchansweroptiondiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option: " +(i + 1) + "</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOptionMatch1'  type='text' class='form-control' value='"+matchOptionQus[i]['question_option_txt']+"'></div></div>");
            // $('#matchAnswerDiv').find('#matchansOption').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer: " +(i + 1) + "</label><div class='col-sm-9 col-md-4' id='Hai' ondrop='drop(event)' ondragover='allowDrop(event)' style='border:1px solid;height:40px'> </div></div>")
            $('#matchAnswerDiv').append("<div class='row'><div id='matchansweroptiondiv' class='col-md-6'><div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOptionMatch1'  type='text' class='form-control' value='" + matchOptionQus[i]['question_option_txt'] + "'></div></div></div><div id='matchansOption' class='col-md-6'><div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><div class='col-sm-9 col-md-4 opdiv' ondrop='drop(event)' ondragover='allowDrop(event)'> </div></div></div></div>")
            // $('#matchAnswerDiv').find('#row1').append("<div id='matchansOption' class='col-md-6'><div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer: " +(i + 1) + "</label><div class='col-sm-9 col-md-4' id='Hai' ondrop='drop(event)' ondragover='allowDrop(event)' style='border:1px solid;height:40px'> </div></div></div><br>")
          }

          for (j = 0; j < matchOptionAns.length; j++)
          {
            //  $('#matchAnswerDiv').append(matchOptionAns[j]['question_option_txt']);
           
            $('#matchAnserDiv').append("<div class='sa ren' draggable='true' ondragstart='drag(event)' id='" + matchOptionAns[j]['question_option_txt'] + "'>" + matchOptionAns[j]['question_option_txt'] + "</div>");

          }
        }
        else if (type == 10)
        {
          console.log(this.questionData);
            // var image = new Image();
            var image = this.puzzle.imageSource;
            image.height = 600;
            image.height = 480;
            // image.src = this.questionData.key_answers[0].question_answer_txt;
            // image.addEventListener('load', drawTiles, false);

            var context = document.getElementById('puzzleAnswer').getContext('2d');
            context.canvas.width = 600;
            context.canvas.height = 480;
            // var boardSize = document.getElementById('puzzleAnswer').width;
            context.drawImage(image,0,0,600,480); 
             // context.scale(0.25,0.25);
         }
      }
      else
      {
        // ------------------------------------------------------------------------------------------
        //                                  Show KEY ANSWER in EDIT mode
        // ------------------------------------------------------------------------------------------
        $('#matchRow').hide();
        var type = $("#questionType").val();
        var answerOption = [];
        if (this.optionFormat == '')
        {
          $('#optionDiv #plainAnswerdiv input[type="text"]').each(function()
          {
            answerOption.push(
            {
              "question_option_txt": this.value
            });
          });
                 
        }

        var matchOptionQus = [];
        $('#matchOption input[type="text"]').each(function()
        {
          matchOptionQus.push(
          {
            "question_option_txt": this.value
          });
        });
       

        var matchOptionAns = [];
        $('#matchAnswer input[type="text"]').each(function()
        {
          matchOptionAns.push(
          {
            "question_option_txt": this.value
          });
        });
       

        var sequenceAns = [];
        $('#sequenceAnswer input[type="text"]').each(function()
        {
          sequenceAns.push(
          {
            "question_option_txt": this.value
          });
        });
      
        if (type == 1)
        {
          $('#puzzle').remove();
          $('#puzzle1').remove();
          $('#finalAns').empty();
          singleVal = this.questionData.key_answers[0].question_answer_txt;
         

          if (this.optionFormat == '')
          {
           
            for (i = 0; i < answerOption.length; i++)
            {
            
              $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1' class='optionChanged' type='radio' name='single' value='" + answerOption[i]['question_option_txt'] + "'><label for='txtFirstNameBilling' >" + answerOption[i]['question_option_txt'] + "</label> </div> ");
              // $('input[value = "' + singleVal + '"]').attr("checked",true);
            }
            $('input[value = "' + singleVal + '"]').attr("checked", true);
          }
          else if (this.optionFormat == 'latex')
          {
            $.each(this.mathOptionFields, (function(i, option)
            {
            
              if (singleVal == option.latex())
              {
              
                $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1' class='optionChanged' type='radio' name='single' value='" + option.latex() + "' checked='checked' > <label for='txtFirstNameBilling' ><span id='opt" + i + "'>" + option.latex() + "</span></label></div> ");

              }
              else
              {
                $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1' class='optionChanged' type='radio' name='single' value='" + option.latex() + "' > <label for='txtFirstNameBilling' ><span id='opt" + i + "'>" + option.latex() + "</span></label></div> ");
              

              }
              MQ.StaticMath($('#answeroptiondiv').find('#opt' + i)[0]);
            }));

          }
          else if (this.optionFormat == 'chemistry')
          {
            $.each(this.chemOptionFields, (function(i, option)
            {
             
              if (i == singleVal)
              {
                $('#answerDiv').find("#chemistryOptionDiv").append("<div><label for='txtFirstNameBilling' class='col-sm-2 col-md-2 control-label'><input id='chemistryAnswerOption1' class='optionChanged' type='radio' name='single' value='" + i + "' checked='checked'></label><div id='opt" + i + "' style='border: 2px dashed #ccc;'></div></div> ");
              }
              else
              {
                $('#answerDiv').find("#chemistryOptionDiv").append("<div><label for='txtFirstNameBilling' class='col-sm-2 col-md-2 control-label'><input id='chemistryAnswerOption1' class='optionChanged' type='radio' name='single' value='" + i + "' ></label><div id='opt" + i + "' style='border: 2px dashed #ccc;'></div></div> ");
              }
             
              var chemViewer = new Kekule.ChemWidget.Viewer($('#chemistryOptionDiv').find('#opt' + i)[0]);
              chemViewer.setChemObj(option.getChemObj());
              chemViewer.setDimension('400px', '250px');


            }));            
          }          
         
        }
        else if (type == 2)
        {
          var ans1=[];
          $('#puzzle').remove();
          $('#puzzle1').remove();
          $('#finalAns').empty();
          ansMultiple = this.questionData.key_answers[0].question_answer_txt;
         

          if (ansMultiple != undefined)
          {
            ans1 = ansMultiple.split('<fziu>');
          }
          
          if (this.optionFormat == '')
          {
            for (var i = 0; i < answerOption.length; i++)
            {
              $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1' class='optionChanged' type='checkbox' name='single' value='" + answerOption[i]['question_option_txt'] + "' ><label for='txtFirstNameBilling' >" + answerOption[i]['question_option_txt'] + "</label> </div> ");
              for (var j = 0; j < ans1.length; j++)
              {
               
                if (answerOption[i]['question_option_txt'] == ans1[j])
                {
                  // $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer: "+ (i + 1) +"</label><label for='txtFirstNameBilling' >"+ answerOption[i]['question_option_txt'] +"</label><input id='questionAnswerOption1' class='optionChanged' type='checkbox' name='single' value='"+ answerOption[i]['question_option_txt'] +"' > </div> ");
                 
                  $('input[value = "' + ans1[j] + '"]').attr("checked", true);

                }
              }

            }
          }
          else if (this.optionFormat == 'latex')
          {
            var match = false;
            $.each(this.mathOptionFields, (function(i, option)
            {
             
              for (var j = 0; j < ans1.length; j++)
              {
                if (ans1[j] == option.latex())
                {
                  match = true;

                }
              }
              if (match)
              {

                $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1' class='optionChanged' type='checkbox' name='single' value='" + option.latex() + "' checked=true> <label for='txtFirstNameBilling' ><span id='opt" + i + "'>" + option.latex() + "</span></label></div> ");

              }
              else
              {
                $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1' class='optionChanged' type='checkbox' name='single' value='" + option.latex() + "' > <label for='txtFirstNameBilling' ><span id='opt" + i + "'>" + option.latex() + "</span></label></div> ");
                

              }
              MQ.StaticMath($('#answeroptiondiv').find('#opt' + i)[0]);
              match = false;
            }));
          }
          else if (this.optionFormat == 'chemistry')
          {
            $.each(this.chemOptionFields, (function(i, option)
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
                $('#answerDiv').find("#chemistryOptionDiv").append("<div><label for='txtFirstNameBilling' class='col-sm-2 col-md-2 control-label'><input id='chemistryAnswerOption1' class='optionChanged' type='checkbox' name='single' value='" + i + "' checked=true></label><div id='opt" + i + "' style='border: 2px dashed #ccc;'></div></div> ");
              }
              else
              {
                $('#answerDiv').find("#chemistryOptionDiv").append("<div><label for='txtFirstNameBilling' class='col-sm-2 col-md-2 control-label'><input id='chemistryAnswerOption1' class='optionChanged' type='checkbox' name='single' value='" + i + "' ></label><div id='opt" + i + "' style='border: 2px dashed #ccc;'></div></div> ");
              }
             
              var chemViewer = new Kekule.ChemWidget.Viewer($('#chemistryOptionDiv').find('#opt' + i)[0]);
              chemViewer.setChemObj(option.getChemObj());
              chemViewer.setDimension('400px', '250px');
              match = false;
            }));            
          }             
        }
        else if (type == 3)
        {
          $('#puzzle').remove();
          $('#puzzle1').remove();
          $('#finalAns').empty();
         
          tFVal = this.questionData.key_answers[0].question_answer_txt;
          for (i = 0; i < answerOption.length; i++)
          {
         
            $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1' class='optionChanged' type='radio' name='single' value=" + answerOption[i]['question_option_txt'] + " ><label for='txtFirstNameBilling' >" + answerOption[i]['question_option_txt'] + "</label> </div> ");
            $('input[value = "' + tFVal + '"]').attr("checked", true);
          }
        }
        else if (type == 4)
        {
          $('#puzzle').remove();
          $('#puzzle1').remove();
          $('#finalAns').empty();
          yNVal = this.questionData.key_answers[0].question_answer_txt;
          for (i = 0; i < answerOption.length; i++)
          {
           
            $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1' class='optionChanged' type='radio' name='single' value=" + answerOption[i]['question_option_txt'] + " > <label for='txtFirstNameBilling' >" + answerOption[i]['question_option_txt'] + "</label></div> ");
            $('input[value = "' + yNVal + '"]').attr("checked", true);
          }
        }
        else if (type == 5)
        {
          $('#puzzle').remove();
          $('#puzzle1').remove();
          $('#sequenceRow').hide();
          $('#finalAns').empty();
          var question = $("#questionText").val();
          // Display drop down list for fill in the blanks
          // var question = $("#questionText").val();
          var question = $("#questionText").val();         
          var blanksArray = Object.keys(this.blankOptions);
          var ddTpl = _.template($('#fillintheblank').html());
          var optionBuffer = "";
          var selectionList = "";
          var selectedAnswers = this.questionData.key_answers[0].question_answer_txt.split(OPTION_GROUP_SEPERATOR);
          var isSelected = "";

          $.each(blanksArray, function(i, val)
          {
            optionBuffer = "";
            $('#' + val + ' input[type="text"]').each(function()
            {
              
              // question_option_txt = answerOption[i]['question_option_txt'];
              question_option_txt = this.value;
              // optionBuffer =  optionBuffer+(ddTpl(question_option_txt));
             
              if (selectedAnswers[i] == question_option_txt)
              {
                isSelected = "selected";
              }
              optionBuffer = optionBuffer + (ddTpl(
              {
                question_option_txt: question_option_txt,
                isSelected: isSelected
              }));
              isSelected = "";
            });
            selectionList = "<select>" + optionBuffer + "</select>";
            question = question.replace('___', selectionList);

          });
          $('#answerDiv').find("#answeroptiondiv").append(question);
         
        }
        else if (type == 6)
        {
          $('#puzzle').remove();
          $('#puzzle1').remove();
          var anwerTxt = this.questionData.key_answers[0].question_answer_txt;
         
          // document.getElementById("#questionAnswerOption1").value =anwerTxt;
          $("#answeroptiondiv").append("<textarea class='ttt optionChanged' rows='6' id='questionAnswerOption1' cols='60'> " + anwerTxt + " </textarea>");
          //$('#questionAnswerOption1').val(anwerTxt);

        }
        else if (type == 7)
        {
          $('#puzzle').remove();
          $('#puzzle1').remove();
          $('#answeroptiondiv').empty();
          sortable();
         
          if(this.optionEdited == false){
            jQuery.each(this.questionData.key_answers, function(i, item)
            {
              
              tt = item.question_answer_txt;
              t = tt.split(brek);
              for (i = 0; i < t.length; i++)
              {
               
                $('#answeroptiondiv').append("<div class='sa ass' id='" + t[i] + "' style='border:1px solid black; padding:5px;'>" + t[i] + "</div>");
              }
            });
          } else {
            for(i=0; i<answerOption.length; i++){
              ordAns = answerOption[i].question_option_txt;
            $('#answerDiv').find("#answeroptiondiv").append("<div class='sa ass' id='" + ordAns + "'>" + ordAns + "</div>");
           }
            this.optionEdited = true;
            this.redraw = false;
          }
         
          // for(i=0; i<answerOption.length; i++){
         
          // $('#answerDiv').find("#answeroptiondiv").append("<div class='sa' id='"+answerOption[i]['question_option_txt']+"' style='border:1px solid black; padding:5px;'>" + answerOption[i]['question_option_txt'] + "</div>");
          // }

          
        }
        else if (type == 8)
        {
          $('#puzzle').remove();
          $('#puzzle1').remove();
          $('#finalAns').empty();
          var singleVal = this.questionData.key_answers[0].question_answer_txt;

         
          // $('#answerDiv').empty();
          for (i = 0; i < sequenceAns.length; i++)
          {

            
            $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1' class='optionChanged' type='radio' name='single' value=" + sequenceAns[i]['question_option_txt'] + " > <label for='txtFirstNameBilling' >" + sequenceAns[i]['question_option_txt'] + "</label></div> ");
            $("#answerDiv").find('input[value=' + singleVal + ']').prop('checked', true);
          }
        }
        else if (type == 9)
        {
          $('#puzzle').remove();
          $('#puzzle1').remove();
          $('#finalDiv').show();
          $('#matchRow').show();
         
         originalOptionQus = this.questionData.key_answers[0].question_answer_txt.split(matbrek);
        
         if(this.optionEdited == false){
          for (i = 0; i < matchOptionQus.length; i++)
          {
           
           

           // matchanswer = matchOptionQus[i].split(brek);
           matchanswer = matchOptionQus[i].question_option_txt;
           matchANs = matchOptionAns[i].question_option_txt;

            $('#matchAnswerDiv').append("<div class='row'><div id='matchansweroptiondiv' class='col-md-6'><div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOptionMatch1' type='text' class='form-control' value='" + matchanswer + "'></div></div></div></div>");

          }
          $('#matchAnswerDiv .row').each(function(i,row){
            let originalAns = originalOptionQus[i].split(brek);
            $(row).append("<div id='matchansOption' class='col-md-6'><div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><div class='col-sm-9 col-md-4 opdiv' ondrop='drop(event)' ondragover='allowDrop(event)'><div class='sa ren' draggable='true' ondragstart='drag(event)' id='" + i + "'>" + originalAns[1] + "</div></div></div></div>");
          });
         } else {
          $('#finalDiv').show();
          $('#matchAnswerDiv').show();
          for (i = 0; i < matchOptionQus.length; i++)
          {
           
            // $('#matchAnswerDiv').find('#matchansweroptiondiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option: " +(i + 1) + "</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOptionMatch1'  type='text' class='form-control' value='"+matchOptionQus[i]['question_option_txt']+"'></div></div>");
            // $('#matchAnswerDiv').find('#matchansOption').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer: " +(i + 1) + "</label><div class='col-sm-9 col-md-4' id='Hai' ondrop='drop(event)' ondragover='allowDrop(event)' style='border:1px solid;height:40px'> </div></div>")
            $('#matchAnswerDiv').append("<div class='row'><div id='matchansweroptiondiv' class='col-md-6'><div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOptionMatch1'  type='text' class='form-control' value='" + matchOptionQus[i]['question_option_txt'] + "'></div></div></div><div id='matchansOption' class='col-md-6'><div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><div class='col-sm-9 col-md-4 opdiv' ondrop='drop(event)' ondragover='allowDrop(event)'> </div></div></div></div>")
            // $('#matchAnswerDiv').find('#row1').append("<div id='matchansOption' class='col-md-6'><div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer: " +(i + 1) + "</label><div class='col-sm-9 col-md-4' id='Hai' ondrop='drop(event)' ondragover='allowDrop(event)' style='border:1px solid;height:40px'> </div></div></div><br>")
          }

          for (j = 0; j < matchOptionAns.length; j++)
          {
            //  $('#matchAnswerDiv').append(matchOptionAns[j]['question_option_txt']);
           
            $('#matchAnserDiv').append("<div class='sa ren' draggable='true' ondragstart='drag(event)' id='" + matchOptionAns[j]['question_option_txt'] + "'>" + matchOptionAns[j]['question_option_txt'] + "</div>");

          }
          this.optionEdited = true;
          this.redraw = false;

          // for(j=0; j<matchOptionAns.length; j++){
          // //  $('#matchAnswerDiv').append(matchOptionAns[j]['question_option_txt']);
         
          //   $('#matchAnserDiv').append("<div class='sa ren' draggable='true' ondragstart='drag(event)' id='"+matchOptionAns[j]['question_option_txt']+"'>" + matchOptionAns[j]['question_option_txt'] + "</div>");

          // }

        }
         }else if (type == 10){
         
            var image = new Image();
            image = this.puzzle.imageSource;
            image.height = 600;
            image.height = 480;
            // image.src = this.questionData.key_answers[0].question_answer_txt;
            // image.addEventListener('load', drawTiles, false);

             var context = document.getElementById('puzzleAnswer').getContext('2d');
             context.canvas.width = 600;
              context.canvas.height = 480;
            var boardSize = document.getElementById('puzzleAnswer').width;
             context.drawImage(image,0,0,600,480); 
             // context.scale(0.25,0.25);
        }

        // else if (type == 10)
        // {
        //   console.log(this.questionData);
        //   var image = new Image();
        //   image.src = this.puzzle.imageSource;
        //   // image.src = this.questionData.key_answers[0].question_answer_txt;
        //   // image.addEventListener('load', drawTiles, false);

        //   var context = document.getElementById('puzzle').getContext('2d');
        //   var c=document.getElementById("puzzle1");
        //   var ctx=c.getContext("2d");
        //   var boardSize = document.getElementById('puzzle').width;
        //   context.drawImage(image,0,0); 


          // var tileCount = 3;
          // var tileSize = boardSize / tileCount;

          // var clickLoc = new Object;
          // clickLoc.x = 0;
          // clickLoc.y = 0;

          // var emptyLoc = new Object;
          // emptyLoc.x = 0;
          // emptyLoc.y = 0;

          // var solved = false;

          // var boardParts;
          // setBoard();

          // function setBoard() {
          //   boardParts = new Array(tileCount);
          //   for (var i = 0; i < tileCount; ++i) {
          //     boardParts[i] = new Array(tileCount);
          //     for (var j = 0; j < tileCount; ++j) {
          //       boardParts[i][j] = new Object;
          //       boardParts[i][j].x = (tileCount - 1) - i;
          //       boardParts[i][j].y = (tileCount - 1) - j;
          //     }
          //   }
          //   emptyLoc.x = boardParts[tileCount - 1][tileCount - 1].x;
          //   emptyLoc.y = boardParts[tileCount - 1][tileCount - 1].y;
          //   solved = false;
          // }

          // function drawTiles() {
          //   context.clearRect ( 0 , 0 , boardSize , boardSize );
          //   for (var i = 0; i < tileCount; ++i) {
          //     for (var j = 0; j < tileCount; ++j) {
          //       var x = boardParts[i][j].x;
          //       var y = boardParts[i][j].y;
          //       //if(i != emptyLoc.x || j != emptyLoc.y || solved == true) {
          //         context.drawImage(image, x * tileSize, y * tileSize, tileSize, tileSize,
          //             i * tileSize, j * tileSize, tileSize, tileSize);
          //      // }
          //     }
          //   }
          //   ctx.drawImage(image,0,0); 
          // }

          // function distance(x1, y1, x2, y2) {
          //   return Math.abs(x1 - x2) + Math.abs(y1 - y2);
          // }
        // }
      }
    }

    this.redraw = false;
    this.rendered = true;
   
  },

  enablePlainText: function(e)
  {
    e.preventDefault();
    $('#mathquill').hide();
    $('#questionText').show();
    this.questionFormat = '';
    $('#instruction').hide();
    $('#latex_instruction').hide();
    $("#kekule").hide();
  },

  enableMathQuestion: function(e)
  {
    e.preventDefault();
    $('#mathquill').show();
    $('#questionText').hide();
    this.questionFormat = 'latex';
    $('#instruction').show();
    $('#latex_instruction').show();
    $("#kekule").hide();

  },

  enableChemsitryQuestion: function(e)
  {
   
    if (e)
      e.preventDefault();
  

    if(!this.chemQuestionViewer)
    {


      this.chemQuestionViewer = makeChemistryViewer('kekule');
      this.chemQuestionViewer.setToolButtons([
        'molHideHydrogens','zoomIn', 'zoomOut','rotateLeft', 'rotateRight', 'rotateX', 'rotateY', 'rotateZ','reset', 'openEditor', 'config'
      ]);
      this.chemQuestionViewer.resetView();

      // this.chemQuestionViewer.setDimension(763,300);
        // this.chemQuestionViewer = new Kekule.Editor.Composer(document.getElementById('kekule'));
        // this.chemQuestionViewer.setPredefinedSetting('fullFunc');
        // this.chemQuestionViewer
        // .setEnableStyleToolbar(true)
        // .setEnableOperHistory(true)
        // .setEnableLoadNewFile(true)
        // .setEnableCreateNewDoc(true)
        // .setAllowCreateNewChild(true)
        // .setCommonToolButtons(['undo', 'redo', 'copy', 'cut', 'paste',
        //   'zoomIn', 'reset', 'zoomOut', 'objInspector'])   // create all default common tool buttons
        // .setChemToolButtons(['manipulate', 'erase', 'bond', 'atom', 'formula',
        //   'ring', 'charge','glyph', 'textBlock'])   // create only chem tool buttons related to molecule
        // .setStyleToolComponentNames(['fontName', 'fontSize', 'color',
        //   'textDirection', 'textAlign']);  // create all default style components


        // .setCommonToolButtons(['newDoc', 'loadData', 'saveData', 'undo', 'redo', 'copy', 'cut', 'paste',
        //   'zoomIn', 'reset', 'zoomOut', 'config', 'objInspector'])   // create all default common tool buttons
        // .setChemToolButtons(['manipulate', 'erase', 'bond', 'atom', 'formula',
        //   'ring', 'charge'])   // create only chem tool buttons related to molecule
        // .setStyleToolComponentNames(['fontName', 'fontSize', 'color',
        //   'textDirection', 'textAlign']);  // create all default style components
    }


    
    $('#mathquill').hide();
    $('#questionText').hide();
    this.questionFormat = 'chemistry';
    $('#instruction').hide();
    $('#latex_instruction').hide();  
    $("#kekule").show();
  },

  enablePlainOption: function(e)
  {
    e.preventDefault();
    $('#kekuleAnswerdiv').hide();
    $('#mathquillAnswerdiv').hide();
    $('#plainAnswerdiv').show();
    this.optionFormat = '';
    this.redraw = true;
    this.optionEdited = true;
   
  },

  enableMathOption: function(e)
  {
    e.preventDefault();
    $('#kekuleAnswerdiv').hide();
    $('#mathquillAnswerdiv').show();
    $('#plainAnswerdiv').hide();
    this.optionFormat = 'latex';
    this.redraw = true;
    this.optionEdited = true;
   
  },

  enableChemistryOption: function(e)
  {
    e.preventDefault();
    $('#kekuleAnswerdiv').show();
    $('#mathquillAnswerdiv').hide();
    $('#plainAnswerdiv').hide();
    this.optionFormat = 'chemistry';
    this.redraw = true;
    this.optionEdited = true;
   
  },

  editField: function(e)
  {

    $(e.target).prev().addClass("mq-editable-field");
    $(e.target).prev().prop("disabled", false);
    this.mathMode = 'edit';
    this.mathQuestionFields[$(e.target).prev().attr('id')].focus();
    this.currentMathFieldSpan = $(e.target).prev();
  },

  removeField: function(e)
  {

    delete this.mathQuestionFields[$(e.target).prev().attr('id')];
    $(e.target).parent().remove();
    this.mathMode = '';

  },

  // ===================================================================================
  //                       Render function - default screen rendering
  // ===================================================================================
  render: function()
  {
    this.redraw = true;
    this.questionFormat = '';

    this.puzzle;
    console.log(this.mode);
    // ------------------------------------------------------------------------------------------
    //                                      Create Mode - Render
    // ------------------------------------------------------------------------------------------
    if (new String(this.mode).valueOf() == new String('create').valueOf())
    {

      this.$el.html(this.template);
      this.$el.append(this.template1);
      initializeTabMenu();
      $('#form-tabs-t-1').hide();
      $('#form-tabs-t-2').hide();
      $('#qnformat_links').hide();
      $('#mathquill').hide();
      $('#imageupload').hide();
      $('#pix').hide();
      $('#instruction').hide();
      $("#kekule").hide();

      this.optionFormat = '';
      this.optionEdited = true;

      // -----------------------------------------------------------------------------------------
      //                                   Mathfield Question editor 
      // ----------------------------------------------------------------------------------------
      this.mathMode = '';
      var backref = this;
      var mathFieldCount = 1
      var mathFieldSpan;
      this.currentMathFieldSpan;
      this.mathQuestionFields = {};


      document.getElementById("mathquill").onpaste = function(e)
      {
        e.preventDefault()
      };
      document.getElementById("mathquill").oncut = function(e)
      {
        e.preventDefault();
        return false;
      };

      $('#mathquill').keydown(function(e)
      {
        // if (e.ctrmathFieldSpanlKey && e.keyCode == 52)
        if (e.keyCode == 192 && backref.mathMode == '')
        {
          //var self = this;

          e.preventDefault();
         
          // $('#mathquill').append('<div id="MathQuillQuestion' + mathFieldCount +'" class="mathSpan"></div>&nbsp;');
          backref.pasteHtmlAtCaret('<div style="display:inline-block"><span id="MathQuillQuestion' + mathFieldCount + '" class="mathSpan"></span></div>&nbsp;');
          // var mathSpans = document.getElementsByClassName('mathSpan');
          mathFieldSpan = document.getElementById('MathQuillQuestion' + mathFieldCount);
          // var mathFieldSpan =  mathSpans[mathSpans.length - 1];
          
          // var latexSpan = document.getElementById('latex');
          // MQ = MathQuill.getInterface(2); // for backcompat

          var mathfieldObject = MQ.MathField(mathFieldSpan,
          {
            spaceBehavesLikeTab: false, // configurable
            handlers:
            {
              edit: function()
              { // useful event handlers
                // latexSpan.textContent = mathfieldObject.latex(); // simple API
                //self.redraw = true;
              }
            }
          });

          backref.mathQuestionFields["MathQuillQuestion" + mathFieldCount] = mathfieldObject;
          backref.mathMode = 'new';
          mathfieldObject.focus();
          mathFieldCount++;
          backref.currentMathFieldSpan = $(mathFieldSpan);
        }
        else if (e.keyCode == 192 && backref.mathMode == 'new')
        {
          e.preventDefault();
          // $('#mathquill').focus();
          if (backref.mathQuestionFields[mathFieldSpan.id].latex() == '')
          {
            delete backref.mathQuestionFields[mathFieldSpan.id];
            $(mathFieldSpan).parent().remove();
          }
          else
          {
            $(mathFieldSpan).parent().append('<span class="glyphicon editfield aba">&#x270f;</span><span class="glyphicon removefield aba" delonbksp="yes">&#x2212;</span>');
            $(mathFieldSpan).prop('disabled', true);
            $(mathFieldSpan).removeClass("mq-editable-field");
          }
          // $(mathFieldSpan).addClass("");
          backref.setEndOfContenteditable(document.getElementById('mathquill'));
          backref.mathMode = '';
        
        }
        else if (e.keyCode == 192 && backref.mathMode == 'edit')
        {
          e.preventDefault();
        
          if (backref.mathQuestionFields[backref.currentMathFieldSpan.attr('id')].latex() == '')
          {
            delete backref.mathQuestionFields[backref.currentMathFieldSpan.attr('id')];
            backref.currentMathFieldSpan.parent().remove();
          }
          else
          // $('#mathquill').focus();
          // $(backref.currentMathFieldSpan).parent().append('<span class="glyphicon editfield">&#x270f;</span><span class="glyphicon delfield">&#x2212;</span>');
          {
            (backref.currentMathFieldSpan).prop('disabled', true);
            (backref.currentMathFieldSpan).removeClass("mq-editable-field");
          }
          // $(mathFieldSpan).addClass("");
          backref.setEndOfContenteditable(document.getElementById('mathquill'));
          backref.mathMode = '';
          backref.currentMathFieldSpan == '';
         
        }
        else if (e.keyCode == 46) // Disable del key
        {
          e.preventDefault();
        }

      });

      // To delete the mathfield totally by backspace.
      $("#mathquill").keyup(function(e)
      {
        if (e.keyCode == 8)
        {
          var selected = window.getSelection();
         
          // var parentTag = selected.anchorNode.parentElement.tagName;
         
          if (selected.anchorNode.parentElement.attributes[1].nodeValue == 'yes')
          {
            selected.anchorNode.parentElement.parentNode.remove();
          }

        }

      });

      // Check where to place the cursor when math editor is focused
      $("#mathquill").mousedown(function(e)
      {
        if (backref.mathMode == 'new' || backref.mathMode == 'edit')
        {
          e.preventDefault();
          backref.mathQuestionFields[backref.currentMathFieldSpan.attr('id')].focus();
       
        }
       
      });


      // default question and option format to plain text
      // this.questionFormat = '';
      
      // -------------------------------------------------------------------------------------------
    }
    else
    {
      // ===================================================================================
      //                                      Edit Mode - Render
      // ===================================================================================
      this.rendered = false;
      this.optionEdited = false;
      $('#qnformat_links').hide();

        $('#instruction').hide();
        
      this.optionFormat = '';
      this.$el.html(this.template(this.questionData));
      this.$el.append(this.template1);
      $('#imageupload').hide();
      $('#pix').hide();

      $('#tabHeaderContainer').hide();
      $('#tabContentContainer').hide();
      $('#puzzleAnswer').hide();

      initializeTabMenu();
     


      // -----------------------------------------------------------------------------------------
      //                                   Mathfield Question editor 
      // ----------------------------------------------------------------------------------------
      this.mathMode = '';
      var backref = this;
      var mathFieldCount = 1;
      var mathFieldSpan;
      this.currentMathFieldSpan;
      this.mathQuestionFields = {};
      // for making mathfield objects
      // this.mathMode = '';
      // var backref = this;
      // var mathFieldCount = 1;
      // this.mathQuestionFields = {};

      document.getElementById("mathquill").onpaste = function(e)
      {
        e.preventDefault()
      };
      document.getElementById("mathquill").oncut = function(e)
      {
        e.preventDefault();
        return false;
      };
      // ============== Interpret the question in latex format ================================
      // var mathFieldSpan = document.getElementById('MathQuillQuestion');
      if (this.questionData.question_txt_format.indexOf(LATEX_GROUP_SEPERATOR) >= 0)
      {
        $('#qnformat_links').show();
        var storedQnFormat = this.questionData.question_txt_format.split(LATEX_GROUP_SEPERATOR);
        var questionLatexes = storedQnFormat[1];
        var questionTxtFormat = storedQnFormat[0];

       

        this.questionFormat = 'latex';
        var mathFieldLatexes = [];

        // insert the formule in respective places
        if (questionLatexes != undefined && questionLatexes != '')
        {
          mathFieldLatexes = questionLatexes.split(':latex:');
          // var noOfFields = (storedQnFormat[0].match(/:latex:/g) || []).length;
         

          for (var i = 0; i < mathFieldLatexes.length; i++)
          {
            questionTxtFormat = questionTxtFormat.replace(':latex:', '<div style="display:inline-block"><span id="MathQuillQuestion' + (i + 1) + '" class="mathSpan">' + mathFieldLatexes[i] + '</span><span class="glyphicon editfield">&#x270f;</span><span class="glyphicon removefield" delonbksp="yes">&#x2212;</span></div>');
          }
        }
       

        // Set the queston with latex format
        $('#mathquill').html(questionTxtFormat);


        for (var i = 1; i <= mathFieldLatexes.length; i++)
        {
          //var self = this;
          var mathFieldSpan = document.getElementById('MathQuillQuestion' + i);
          // var mathFieldSpan =  mathSpans[mathSpans.length - 1];
         
          // var latexSpan = document.getElementById('latex');
          // MQ = MathQuill.getInterface(2); // for backcompat

          var mathfieldObject = MQ.MathField(mathFieldSpan,
          {
            spaceBehavesLikeTab: false, // configurable
            handlers:
            {
              edit: function()
              { // useful event handlers
                // latexSpan.textContent = mathfieldObject.latex(); // simple API
                //self.redraw = true;
              }
            }
          });
          backref.mathQuestionFields["MathQuillQuestion" + i] = mathfieldObject;
          $(mathFieldSpan).prop('disabled', true);
          $(mathFieldSpan).removeClass("mq-editable-field");
          // mathMode = true;
          // mathfieldObject.focus();
          // mathFieldCount++;            
        }

        mathFieldCount = mathFieldLatexes.length + 1;

      }
      else if (this.questionData.question_txt_format.indexOf(KEKULE_MARKER) >= 0)
      {
        $('#qnformat_links').show();
        var storedQnFormat = this.questionData.question_txt_format.split(KEKULE_MARKER);
        var questionJson = storedQnFormat[1];
        var configOrig = storedQnFormat[0];


        if (configOrig)
        {
          setViewerConfigs(configOrig);
        }
        
        var mol = Kekule.IO.loadFormatData(questionJson, 'Kekule-JSON');
        this.enableChemsitryQuestion();
        this.chemQuestionViewer.setChemObj(mol);

      }


      // Set the toggle key for inseting math field
      // ==========================================
      $('#mathquill').keydown(function(e)
      {
        // if (e.ctrmathFieldSpanlKey && e.keyCode == 52)
        if (e.keyCode == 192 && backref.mathMode == '')
        {
          e.preventDefault();
        
          // $('#mathquill').append('<div id="MathQuillQuestion' + mathFieldCount +'" class="mathSpan"></div>&nbsp;');
          backref.pasteHtmlAtCaret('<div style="display:inline-block"><span id="MathQuillQuestion' + mathFieldCount + '" class="mathSpan"></span></div>&nbsp;');
          // var mathSpans = document.getElementsByClassName('mathSpan');
          mathFieldSpan = document.getElementById('MathQuillQuestion' + mathFieldCount);
          // var mathFieldSpan =  mathSpans[mathSpans.length - 1];
         
          // var latexSpan = document.getElementById('latex');
          // MQ = MathQuill.getInterface(2); // for backcompat
          // var self = this;
          var mathfieldObject = MQ.MathField(mathFieldSpan,
          {
            spaceBehavesLikeTab: false, // configurable
            handlers:
            {
              edit: function()
              { // useful event handlers
                // latexSpan.textContent = mathfieldObject.latex(); // simple API
                //self.redraw = true;
              }
            }
          });

          backref.mathQuestionFields["MathQuillQuestion" + mathFieldCount] = mathfieldObject;
          backref.mathMode = 'new';
          mathfieldObject.focus();
          mathFieldCount++;
          backref.currentMathFieldSpan = $(mathFieldSpan);
        }
        else if (e.keyCode == 192 && backref.mathMode == 'new')
        {
          e.preventDefault();
          // $('#mathquill').focus();
          if (backref.mathQuestionFields[mathFieldSpan.id].latex() == '')
          {
            delete backref.mathQuestionFields[mathFieldSpan.id];
            $(mathFieldSpan).parent().remove();
          }
          else
          {
            $(mathFieldSpan).parent().append('<span class="glyphicon editfield">&#x270f;</span><span class="glyphicon removefield" delonbksp="yes">&#x2212;</span>');
            $(mathFieldSpan).prop('disabled', true);
            $(mathFieldSpan).removeClass("mq-editable-field");
          }
          // $(mathFieldSpan).addClass("");
          backref.setEndOfContenteditable(document.getElementById('mathquill'));
          backref.mathMode = '';
         
        }
        else if (e.keyCode == 192 && backref.mathMode == 'edit')
        {
          e.preventDefault();
        
          if (backref.mathQuestionFields[backref.currentMathFieldSpan.attr('id')].latex() == '')
          {
            delete backref.mathQuestionFields[backref.currentMathFieldSpan.attr('id')];
            backref.currentMathFieldSpan.parent().remove();
          }
          else
          // $('#mathquill').focus();
          // $(backref.currentMathFieldSpan).parent().append('<span class="glyphicon editfield">&#x270f;</span><span class="glyphicon delfield">&#x2212;</span>');
          {
            (backref.currentMathFieldSpan).prop('disabled', true);
            (backref.currentMathFieldSpan).removeClass("mq-editable-field");
          }
          // $(mathFieldSpan).addClass("");
          backref.setEndOfContenteditable(document.getElementById('mathquill'));
          backref.mathMode = '';
          backref.currentMathFieldSpan == '';
          
        }
        else if (e.keyCode == 46) // Disable del key
        {
          e.preventDefault();
        }

      });

      // To delete the mathfield totally by backspace.
      // --------------------------------------------
      $("#mathquill").keyup(function(e)
      {
        if (e.keyCode == 8)
        {
          var selected = window.getSelection();
         
          // var parentTag = selected.anchorNode.parentElement.tagName;
          
          if (selected.anchorNode.parentElement.attributes[1].nodeValue == 'yes')
          {
            selected.anchorNode.parentElement.parentNode.remove();
          }

        }

      });

      // Check where to place the cursor when math editor is focused
      // -----------------------------------------------------------
      $("#mathquill").mousedown(function(e)
      {
        if (backref.mathMode == 'new' || backref.mathMode == 'edit')
        {
          e.preventDefault();
          backref.mathQuestionFields[backref.currentMathFieldSpan.attr('id')].focus();
          // alert('Please press toggle key (back quote) to return normal mode');
        }
       
        // alert( "Handler for .mousedown() called." );
      });

      
      // // var latexSpan = document.getElementById('latex');
      // // MQ = MathQuill.getInterface(2); // for backcompat

      // var mathQnObject = MQ.MathField(mathFieldSpan, {
      //   spaceBehavesLikeTab: false, // configurable
      //   handlers: {
      //     edit: function() { // useful event handlers
      //       latexSpan.textContent = mathQnObject.latex(); // simple API
      //     }
      //   }
      // });

      // this.mathQuestion = mathQnObject;

     
      // if (this.mathQuestion.latex() != '')
      // {
      //   this.questionFormat = 'latex';
      // }


      // Set the options for options screen
      // ===================================
    

      if (this.questionData.question_type_id == 7)
      {
        $('#questionKeyAnswer1').empty();
        $('#finalAns').empty();
        $('#sequenceRow').empty();
        $('#matchOption').empty();
        $('#matchAnswer').empty();
        $('#qnformat_links').hide();
        $('#instruction').hide();
        $('#latex_instruction').hide();
        sortable();

        $('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option 1</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div><button type='button' id='addOption' name='btnSubmit' class='btn btn-raised btn-black'>+</button> <button id='removeOption' type='button' name='btnSubmit' class='btn btn-raised btn-black'>-</button></div>");
        jQuery.each(this.questionData.answer_options, function(i, item)
        {
          if (i == 0)
          {
            $('#questionAnswerOption1').val(item.question_option_txt);
          }
          else
          {
            // $('#optionDiv').                        append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer </label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption"+i+ "' value='"+ item.question_option_txt + "' type='text' class='form-control'></div></div>");
            $('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option " + (i + 1) + "</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' value='" + item.question_option_txt + "'  type='text' class='form-control optionChanged'></div></div>");
          }

        });
      }
      else if (this.questionData.question_type_id == 6)
      { //short answer/single anwer question
        $('#form-tabs-t-1').hide();
        $('#qnformat_links').hide();
        $('#instruction').hide();
        $('#latex_instruction').hide();
        $('#finalAns').empty();
        $('#sequenceRow').empty();
        $('#answeroptiondiv').empty();
        var anwerTxt = this.questionData.key_answers[0].question_answer_txt;
       
      
        // document.getElementById("#questionAnswerOption1").value =anwerTxt;
        //$("#answeroptiondiv").append("<textarea rows='6' id='questionAnswerOption1' cols='60'> "+ anwerTxt +" </textarea>");
        //$('#questionAnswerOption1').val(anwerTxt);
      }

       else if (this.questionData.question_type_id == 10)
      { //short answer/single anwer question
        // $('#form-tabs-t-1').hide();
        $('#qnformat_links').hide();
        $('#instruction').hide();
        $('#latex_instruction').hide();
        $('#finalAns').empty();
        $('#sequenceRow').empty();
        $('#answeroptiondiv').empty();
        $('#matchOption').empty(); 
        $('#form-tabs-t-2').show();
        $('#otherType').hide();
        $('#questionText').show();
        $('#imageupload').show();
        $('#pix').show();
        // $('#imageupload').text(this.questionData.question_txt_format);
        $('#slider').show();
        // $('#puzzle').show();
        $('#mathquill').hide(); 

        $('#tabHeaderContainer').show();
        $('#tabContentContainer').show();
        $('#puzzleAnswer').show();

      }
      // else if(this.questionData.question_type_id == 3 || this.questionData.question_type_id == 4)
      // {
      //     $('#form-tabs-t-1').hide();
      //     $('#sequenceRow').empty();
      //      jQuery.each(this.questionData.key_answers, function(i, item) {
      //       if(i==0){

      //           $('#questionKeyAnswer1').val(item.question_answer_txt);
      //       }else{
     
      //           $('#answerDiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer </label><div class='col-sm-9 col-md-4'><input id=questionKeyAnswer'" + i + "'  type='text' class='form-control'></div></div>"); 
      //       }

      //   });

      //   jQuery.each(this.questionData.answer_options, function(i,item) {
      //     if(i==0){
      //       $('#questionAnswerOption1').val(item.question_option_txt);
      //     }else{
      //        $('#optionDiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer </label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption"+i+ "' value='"+ item.question_option_txt + "' type='text' class='form-control'></div></div>"); 
      //     }

      //   });
      // } 
      else if (this.questionData.question_type_id == 9)
      {
        $('#qnformat_links').hide();
        $('#instruction').hide();
        $('#latex_instruction').hide();
        $('#optionDiv').empty();
        $('#sequenceRow').empty();
        $('#answerDiv').empty();
        var ans = [];
        jQuery.each(this.questionData.key_answers, function(i, item)
        {
         
          ans.push(item);
        });
        var keyOpt = ans[0].question_answer_txt.split('<fziu>');
        //var keyOpt1 = ans[1].question_answer_txt.split('<fziu>');

        for (var i = 0; i < keyOpt.length; i++)
        {

         
          //$('#matchAnswerDiv').append("<div class='row'><div id='matchansweroptiondiv' class='col-md-6'><div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOptionMatch1'  type='text' class='form-control' value='"+keyOpt[i]+"'></div></div></div><div id='matchansOption' class='col-md-6'><div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><div class='col-sm-9 col-md-4' ondrop='drop(event)' ondragover='allowDrop(event)' style='border:1px solid;height:40px'> </div></div></div></div>");
          $('#matchAnswerDiv').append("<div class='row'><div id='matchansweroptiondiv' class='col-md-6'><div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOptionMatch1' type='text' class='form-control' value='" + keyOpt[0] + "'></div></div></div><div id='matchansOption' class='col-md-6'><div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><div class='col-sm-9 col-md-4 opdiv' ondrop='drop(event)' ondragover='allowDrop(event)'><div class='sa ren' draggable='true' ondragstart='drag(event)' id='" + keyOpt[1] + "'>" + keyOpt[1] + "</div></div></div></div></div>");
        }


        // for(var j =0; j < keyOpt1.length; j++){

      
        //     //$('#matchAnswer').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer </label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption"+j+ "' value='"+ str1[j] + "' type='text' class='form-control'></div></div>");
        // }

        var obj = [];

        jQuery.each(this.questionData.answer_options, function(i, item)
        {
         
          obj.push(item);

        });
       
        var str = obj[0].question_option_txt.split('<fziu>');
        var str1 = obj[1].question_option_txt.split('<fziu>');

      

        for (var m = 0; m < str.length; m++)
        {
          
          $('#matchOption').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-2 control-label'>Option </label><div class='col-sm-9 col-md-8'><input id='questionAnswerOption" + m + "' value='" + str[m] + "' type='text' class='form-control optionChanged'></div></div>");
        }

        for (var j = 0; j < str1.length; j++)
        {
         
          $('#matchAnswer').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer </label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption" + j + "' value='" + str1[j] + "' type='text' class='form-control optionChanged'></div></div>");
        }


      }
      else if (this.questionData.question_type_id == 5)
      {
        // Fill in the blanks edit options
        $('#optionDiv').hide();
        $('#matchRow').hide();
        $('#qnformat_links').hide();
        $('#instruction').hide();
        $('#latex_instruction').hide();
        $('#sequenceRow').empty();
        // -------------------- Options screen -------------------

        this.blankOptions = {};


        this.question = $("#questionText").val();;
        // ~~jQuery.each(this.questionData.answer_options, function(i,item) {
        for (var i = 0; i < this.questionData.answer_options.length; i++)
        {
         
          var opt = this.questionData.answer_options[i].question_option_txt;
          var options = opt.split('<fziu>');
         
          for (var j = 0; j < options.length; j++)
          {
            if (j == 0)
            {

              $('#fillIntheBlanks').append("<div class='row'><h3>Blank " + (i + 1) + " Options</h3><div id='blankOptions" + i + "' class='col-md-6'><div class='form-group'><center><div id='question_answers_error' style='color:red'></div></center></div><div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option 1</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' value='" + options[j] + "' type='text' class='form-control optionChanged'></div><button type='button' name='blankOptions" + i + "' class='addBlankOption btn btn-raised btn-black'>+</button> <button type='button' name='blankOptions" + i + "'  class='removeBlankOption btn btn-raised btn-black'>-</button></div></div></div>");

            }
            else
            {
             
              $('#blankOptions' + i).append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option " + (j + 1) + " </label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' value='" + options[j] + "' type='text' class='form-control optionChanged'></div></div>");
            }
            this.blankOptions['blankOptions' + i] = options.length;
          }
        }

      }
      else if (this.questionData.question_type_id == 8)
      {
        $('#qnformat_links').hide();
        $('#instruction').hide();
        $('#latex_instruction').hide();
        $('#optionDiv').empty();
        // $('#answerDiv').empty();
        $('#matchRow').empty();
      


        var obj = [];
        jQuery.each(this.questionData.answer_options, function(i, item)
        {
          obj.push(item);       
          var opt = item.question_option_txt;        
        });       
        //for(var n= 0 ; n< obj.length;n++){      
        var str = obj[0].question_option_txt.split('<fziu>');
       
        //$('#matchOption').hide();

        for (var m = 0; m < str.length; m++)
        {
         
          $('#sequenceOption').append('<div class="form-group"> <center><div id="question_answers_error" style="color:red"></div></center></div><div class="form-group" id="matchOpt"> <label for="txtFirstNameBilling" class="col-sm-3 col-md-2 control-label">Option</label> <div class="col-sm-9 col-md-8" > <input id="questionAnswerOption1" type="text" class="form-control optionChanged" value="' + str[m] + '"> </div>   </div> </div>')

          // })             
        }

        var str1 = obj[1].question_option_txt.split('<fziu>');
        
        for (var m = 0; m < str1.length; m++)
        {
         
          $("#sequenceAnswer").append('<div class="form-group"> <center><div id="question_answers_error" style="color:red"></div></center> </div> <div class="form-group"> <label for="txtFirstNameBilling" class="col-sm-3 col-md-4 control-label">Answer</label> <div class="col-sm-9 col-md-4" id="ans"> <input id="questionAnswerOption1" type="text" class="form-control optionChanged" value="' + str1[m] + '" > </div> </div> </div>');
        }

        // }
        var sequenceAns = [];
        $('#sequenceAnswer input[type="text"]').each(function()
        {
          sequenceAns.push(
          {
            "question_option_txt": this.value
          });
        });

       

        jQuery.each(this.questionData.key_answers, function(i, item)
        {
         

          if (i == 0)
          {
            //for(var m =0; m < str1.length; m++){

            for (i = 0; i < sequenceAns.length; i++)
            {
              
              $('#answerDiv').find('#answeroptiondiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1' class='optionChanged' type='radio' name='single' value=" + sequenceAns[i]['question_option_txt'] + " > <label for='txtFirstNameBilling' >" + sequenceAns[i]['question_option_txt'] + "</label></div> ");
              //$("#answerDiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'></label><input id='questionAnswerOption1'  type='radio' name='single' value = '"+str1[m]+"'><label for='txtFirstNameBilling' >"+ str1[m] +"</label> </div> ")      
            }
          }
          else
          {
           
            $('#answerDiv').find('#answeroptiondiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer </label><div class='col-sm-9 col-md-4'><input id=questionKeyAnswer'" + i + "'  type='text' class='form-control'></div></div>");
          }

        });
      }
      else
      {
        // For question types 1,2,3,4  EDIT options
        //$('#instruction').hide();
       

        if (this.questionData.question_type_id == 3 || this.questionData.question_type_id == 4)
        {
          $('#form-tabs-t-1').hide();
          $('#sequenceRow').empty();
        }
        $('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option 1 </label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div><button type='button' id='addOption' name='btnSubmit' class='btn btn-raised btn-black'>+</button> <button id='removeOption' type='button' name='btnSubmit' class='btn btn-raised btn-black'>-</button></div>");


        this.mathOptionFields = []; // for storing the mathfield objects for later process
        var self = this;
        $('#optionDiv').find('#mathquillAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option 1 </label><div class='col-sm-9 col-md-4'><span id='mathOptionSpan1'  style='width: 100%;'></span></div><button type='button' id='addOption' name='btnSubmit' class='btn btn-raised btn-black'>+</button> <button id='removeOption' type='button' name='btnSubmit' class='btn btn-raised btn-black'>-</button></div>");

        let mathOptionSpan = document.getElementById('mathOptionSpan1');
       

        let mathfieldObject = MQ.MathField(mathOptionSpan);
        mathfieldObject.config(
        {
          spaceBehavesLikeTab: false, // configurable
          handlers:
          {
            edit: function()
            { // useful event handlers
              // latexAnswerSpan.textContent = mathAnswerField.latex(); // simple API
            
              self.redraw = true;
              self.optionEdited = true;
            }
          }
        });

        // Make the option <span> as Mathfield and keep it in array for usage
        this.mathOptionFields.push(mathfieldObject);


        // Keep default chemistry viewer for option
        $('#optionDiv').find('#kekuleAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-2 col-md-2 control-label'>Option 1 </label><div class='col-md-8'><div id='chemistryOptionDiv1' style='border: 2px dashed #ccc;'></div></div><button type='button' id='addOption' name='btnSubmit' class='btn btn-raised btn-black'>+</button> <button id='removeOption' type='button' name='btnSubmit' class='btn btn-raised btn-black'>-</button></div>");

        this.chemOptionFields = []; // for storing the chemistry field objects for later process
        // let chemOptionDiv = document.getElementById('chemistryOptionDiv1');
       
        let viewer = makeChemistryViewer('chemistryOptionDiv1');
        // let optComposer = new Kekule.Editor.Composer(document.getElementById('chemistryOptionDiv1'));
        // // this.composer.setPredefinedSetting('fullFunc');
        // optComposer
        //   .setEnableStyleToolbar(true)
        //   .setEnableOperHistory(true)
        //   .setEnableLoadNewFile(true)
        //   .setEnableCreateNewDoc(true)
        //   .setAllowCreateNewChild(true)
        //   .setCommonToolButtons(['undo', 'redo', 'copy', 'cut', 'paste',
        //     'zoomIn', 'reset', 'zoomOut', 'objInspector'])   // create all default common tool buttons
        //   .setChemToolButtons(['manipulate', 'erase', 'bond', 'atom', 'formula',
        //     'ring', 'charge'])   // create only chem tool buttons related to molecule
        //   .setStyleToolComponentNames(['fontName', 'fontSize', 'color',
        //     'textDirection', 'textAlign']);

        // let mol = new Kekule.Molecule();
        // optComposer.setChemObj(mol);      
        
        // // Make the option <span> as Mathfield and keep it in array for usage
        // // this.mathOptionFields.push(mathfieldObject);
        // this.chemOptionFields.push(optComposer);
        this.chemOptionFields.push(viewer);
        // $('#chemistryOptionDiv1 canvas').attr({width:496,height:246});

      
        if (this.questionData.answer_options[0].option_group == 'C')
        {
          this.optionFormat = 'chemistry';
          $('#plainAnswerdiv').hide();
          $('#mathquillAnswerdiv').hide();
        }        
        else if (this.questionData.answer_options[0].option_group == 'M')
        {
          this.optionFormat = 'latex';
          $('#plainAnswerdiv').hide();
          $('#kekuleAnswerdiv').hide();
          $('#instruction').show();
        }
        else
        {
          this.optionFormat = '';
          $('#mathquillAnswerdiv').hide();
          $('#kekuleAnswerdiv').hide();
          $('#instruction').hide();
        }

        // set plain text options
        if (this.optionFormat == '')
        {
          
          jQuery.each(this.questionData.answer_options, function(i, item)
          {
            if (i == 0)
            {
              $('#questionAnswerOption1').val(item.question_option_txt);
            }
            else
            {
              $('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option " + (i + 1) + "</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption" + (i + 1) + "' value='" + item.question_option_txt + "'  type='text' class='form-control optionChanged'></div></div>");
              // $('#optionDiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer </label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption"+i+ "' value='"+ item.question_option_txt + "' type='text' class='form-control'></div></div>"); 
            }

          });
          this.length1 = this.questionData.answer_options.length;

          // // Set the key answer page
          // ~~~ no need to set answer page here as it was emptied in tabclick1 event
          // jQuery.each(this.questionData.key_answers, function(i, item) 
          // {
          //   if(i==0){

          //       $('#questionKeyAnswer1').val(item.question_answer_txt);
          //   }else{
          
          //       $('#answerDiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer </label><div class='col-sm-9 col-md-4'><input id=questionKeyAnswer'" + i + "'  type='text' class='form-control'></div></div>"); 
          //   }

          // });


        }
        else if (this.optionFormat == 'latex')
        {
         
          this.mathOptionFields[0].latex(this.questionData.answer_options[0].question_option_txt);
          // span = document.getElementById("mathOptionSpan1");
          // txt = document.createTextNode(this.questionData.answer_options[0].question_option_txt);
          // span.appendChild(txt);
          // Set the math options
          for (var i = 1; i < this.questionData.answer_options.length; i++)
          {
            // if (i == 0)
            // {
            //   span = document.getElementById("mathOptionSpan1");
            //   txt = document.createTextNode(this.questionData.answer_options[i].question_option_txt);
            //   span.appendChild(txt);
            //   // $('#questionAnswerOption1').val(item.question_option_txt);
            //   // document.getElementById('mathOptionSpan1').innerHTML=(this.questionData.answer_options[i].question_option_txt);
            //   // $('#mathOptionSpan1').innerHTML=(this.questionData.answer_options[i].question_option_txt);
            //   // this.mathOptionFields[0].latex(this.questionData.answer_options[i].question_option_txt);
            // }
            // else
            {
            
              // var nextElmentNo = this.mathOptionFields.length + 1;
              // $('#optionDiv').find('#mathquillAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option " + nextElmentNo + " </label><div class='col-sm-9 col-md-4'><span id='mathOptionSpan" + nextElmentNo + "'  style='width: 100%;'>" + this.questionData.answer_options[i].question_option_txt + "</span></div></div>");
              $('#optionDiv').find('#mathquillAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option " + (i + 1) + " </label><div class='col-sm-9 col-md-4'><span id='mathOptionSpan" + (i + 1) + "'  style='width: 100%;'>" + this.questionData.answer_options[i].question_option_txt + "</span></div></div>");
              // this.mathOptionLength ++;          

              // var mathOptionSpan = document.getElementById('mathOptionSpan'+ nextElmentNo);
            
              // // var latexAnswerSpan = document.getElementById('latexAnswerSpan');
              // // var MQ = MathQuill.getInterface(2); // for backcompat

              // var mathfieldObject = MQ.MathField(mathOptionSpan, {
              //   spaceBehavesLikeTab: false, // configurable
              //   handlers: {
              //     edit: function() { // useful event handlers
              //       // latexAnswerSpan.textContent = mathAnswerField.latex(); // simple API
             
              //     }
              //   }
              // });  

              // // Make the option <span> as Mathfield and keep it in array for usage
              // this.mathOptionFields.push(mathfieldObject);

              // $('#optionDiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer </label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption"+i+ "' value='"+ item.question_option_txt + "' type='text' class='form-control'></div></div>"); 
            }
          }


          // ~~~~~~~~~moved to tabclick for testing


          // Create Math object for each option
          // ----------------------------------
          
          for (var i = 2; i <= this.questionData.answer_options.length; i++)
          {

            let mathOptionSpan = document.getElementById('mathOptionSpan' + i);
          

            let mathfieldObject = MQ.MathField(mathOptionSpan);
            mathfieldObject.config(
            {
              spaceBehavesLikeTab: false, // configurable
              handlers:
              {
                edit: function()
                { // useful event handlers
                  // latexAnswerSpan.textContent = mathAnswerField.latex(); // simple API
                 
                  self.redraw = true;
                  self.optionEdited = true;
                }
              }
            });

            // Make the option <span> as Mathfield and keep it in array for usage
            this.mathOptionFields.push(mathfieldObject);

          }

        }
        else if (this.optionFormat == 'chemistry')
        {
         
          var mol1 = Kekule.IO.loadFormatData(this.questionData.answer_options[0].question_option_txt, 'Kekule-JSON');
          this.chemOptionFields[0].setChemObj(mol1);   

          for (let i = 1; i < this.questionData.answer_options.length; i++)
          {

            $('#optionDiv').find('#kekuleAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-2 col-md-2 control-label'>Option " + (i+1) + " </label><div class='col-sm-9 col-md-6'><div id='chemistryOptionDiv" + (i+1) + "' style='border: 2px dashed #ccc;'></div></div></div>");
         
            // this.chemOptionFields.push(new Kekule.Editor.Composer(document.getElementById('chemistryOptionDiv'+ (i+1))));
            // this.chemQuestionViewer.setPredefinedSetting('fullFunc');

            let viewer = makeChemistryViewer('chemistryOptionDiv'+ (i+1));
            // let optComposer = new Kekule.Editor.Composer(document.getElementById('chemistryOptionDiv'+ (i+1)));
            // // this.chemOptionFields[i]
            // optComposer
            //   .setEnableStyleToolbar(true)
            //   .setEnableOperHistory(true)
            //   .setEnableLoadNewFile(true)
            //   .setEnableCreateNewDoc(true)
            //   .setAllowCreateNewChild(true)
            //   .setCommonToolButtons(['undo', 'redo', 'copy', 'cut', 'paste',
            //     'zoomIn', 'reset', 'zoomOut', 'objInspector'])   // create all default common tool buttons
            //   .setChemToolButtons(['manipulate', 'erase', 'bond', 'atom', 'formula',
            //     'ring', 'charge'])   // create only chem tool buttons related to molecule
            //   .setStyleToolComponentNames(['fontName', 'fontSize', 'color',
            //     'textDirection', 'textAlign']);

            // let mol = new Kekule.Molecule();
            // optComposer.setChemObj(mol);    
            // // // this.chemOptionFields[i]
            // optComposer.setChemObj(Kekule.IO.loadFormatData(this.questionData.answer_options[i].question_option_txt, 'Kekule-JSON'));
            // this.chemOptionFields.push(optComposer);

            viewer.setChemObj(Kekule.IO.loadFormatData(this.questionData.answer_options[i].question_option_txt, 'Kekule-JSON'));
            this.chemOptionFields.push(viewer);
            // $('#chemistryOptionDiv'+ (i+1) + ' canvas').attr({width:496,height:246});
          }
        }

      }


    }

    return this;
  },


  setEndOfContenteditable: function(contentEditableElement)
  {
    var range, selection;
    if (document.createRange) //Firefox, Chrome, Opera, Safari, IE 9+
    {
      range = document.createRange(); //Create a range (a range is a like the selection but invisible)
      range.selectNodeContents(contentEditableElement); //Select the entire contents of the element with the range
      range.collapse(false); //collapse the range to the end point. false means collapse to end rather than the start
      selection = window.getSelection(); //get the selection object (allows you to change selection)
      selection.removeAllRanges(); //remove any selections already made
      selection.addRange(range); //make the range you have just created the visible selection
    }
    else if (document.selection) //IE 8 and lower
    {
      range = document.body.createTextRange(); //Create a range (a range is a like the selection but invisible)
      range.moveToElementText(contentEditableElement); //Select the entire contents of the element with the range
      range.collapse(false); //collapse the range to the end point. false means collapse to end rather than the start
      range.select(); //Select the range (make it the visible selection
    }
  },

  pasteHtmlAtCaret: function(html)
  {
    var sel, range;
    if (window.getSelection)
    {
      // IE9 and non-IE
      sel = window.getSelection();
      if (sel.getRangeAt && sel.rangeCount)
      {
        range = sel.getRangeAt(0);
        range.deleteContents();
      
        // Range.createContextualFragment() would be useful here but is
        // only relatively recently standardized and is not supported in
        // some browsers (IE9, for one)
        var el = document.createElement("div");
        el.innerHTML = html;
        var frag = document.createDocumentFragment(),
          node, lastNode;
        while ((node = el.firstChild))
        {
          lastNode = frag.appendChild(node);
        }
        var firstNode = frag.firstChild;
        range.insertNode(frag);

        // Preserve the selection
        if (lastNode)
        {
          range = range.cloneRange();
          range.setStartAfter(lastNode);
          // if (selectPastedContent) {
          //     range.setStartBefore(firstNode);
          // } else {
          //     range.collapse(true);
          // }
          range.collapse(true);
          sel.removeAllRanges();
          sel.addRange(range);
        }
      }
    }
    else if ((sel = document.selection) && sel.type != "Control")
    {
      // IE < 9
      var originalRange = sel.createRange();
      originalRange.collapse(true);
      sel.createRange().pasteHTML(html);
    }
  },


  renderquestionType: function(e)
  {
    $('#fillIntheBlanks').hide(); // hide fill in the blanks
    $('#myModal1').modal('hide');
    $('#optionDiv #plainAnswerdiv').empty();
    $('#optionDiv #mathquillAnswerdiv').empty();
    $('#sequenceRow').hide();
    $('#matchOption').hide();
    $('#matchAnswer').hide();
    //$("#form-tabs-t-1").show();
    $('#addOption').show();
    $('#removeOption').show();
    $('#otherType').show();
    $('#fillIntheBlanks').hide();

    $('#tabHeaderContainer').hide();
    $('#tabContentContainer').hide();
    $('#puzzleAnswer').hide();
    $('#questionText').val("");
    $('#kekuleAnswerdiv').hide();
    this.redraw = true;
    var questiontype = $(e.target).val();
   
    if (questiontype == 1 || questiontype == 2)
    {
      $('#form-tabs-t-1').show();
      $('#form-tabs-t-2').show();

      // $('#puzzle1').hide();
      $('#qnformat_links').show();
      $('#optionDiv #plainAnswerdiv').show();
      $('#optionDiv #mathquillAnswerdiv').show();
      $('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option 1 </label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div><button type='button' id='addOption' name='btnSubmit' class='btn btn-raised btn-black'>+</button> <button id='removeOption' type='button' name='btnSubmit' class='btn btn-raised btn-black'>-</button></div>");
      $('#imageupload').hide();
      $('#pix').hide();
      $('#questionText').show();


      // --- for math field options -----
      this.mathOptionFields = []; // for storing the mathfield objects for later process
      $('#optionDiv').find('#mathquillAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option 1 </label><div class='col-sm-9 col-md-4'><span id='mathOptionSpan1'  style='width: 100%;'></span></div><button type='button' id='addOption' name='btnSubmit' class='btn btn-raised btn-black'>+</button> <button id='removeOption' type='button' name='btnSubmit' class='btn btn-raised btn-black'>-</button></div>");
      var mathOptionSpan = document.getElementById('mathOptionSpan1');
     
      // var latexAnswerSpan = document.getElementById('latexAnswerSpan');
      // var MQ = MathQuill.getInterface(2); // for backcompat
      var self = this;
      var mathfieldObject = MQ.MathField(mathOptionSpan,
      {
        spaceBehavesLikeTab: false, // configurable
        handlers:
        {
          edit: function()
          { // useful event handlers
            // latexAnswerSpan.textContent = mathAnswerField.latex(); // simple API
           
            self.redraw = true;
            self.optionEdited = true;
          }
        }
      });

      // Make the option <span> as Mathfield and keep it in array for usage
      this.mathOptionFields.push(mathfieldObject);
      $('#mathquillAnswerdiv').hide();

      $('#kekuleAnswerdiv').empty();
      $('#kekuleAnswerdiv').unbind();

      // Keep default chemistry editor for option
      $('#optionDiv').find('#kekuleAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-2 col-md-2 control-label'>Option 1 </label><div class='col-md-8'><div id='chemistryOptionDiv1' style='border: 2px dashed #ccc;'></div></div><button type='button' id='addOption' name='btnSubmit' class='btn btn-raised btn-black'>+</button> <button id='removeOption' type='button' name='btnSubmit' class='btn btn-raised btn-black'>-</button></div>");

      this.chemOptionFields = []; // for storing the chemistry field objects for later process
 
      var viewer = makeChemistryViewer('chemistryOptionDiv1');
      this.chemOptionFields.push(viewer);
      //$('#kekuleAnswerdiv').hide();
    }
    // else if(questiontype == 2){
    //   $('#form-tabs-t-1').show();
    //   $('#form-tabs-t-2').show();
    //    $('#qnformat_links').show();
    //   // $('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1'  type='text' class='form-control'></div></div>");
    //   $('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option 1 </label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1'  type='text' class='form-control'></div><button type='button' id='addOption' name='btnSubmit' class='btn btn-raised btn-black'>+</button> <button id='removeOption' type='button' name='btnSubmit' class='btn btn-raised btn-black'>-</button></div>");
    // }
    else if (questiontype == 3)
    {
      $('#imageupload').hide();
      $('#pix').hide();
      $('#questionText').show();

      $('#form-tabs-t-1').hide();
      $('#form-tabs-t-2').show();
      $('#qnformat_links').show();
      $('#kekule').hide();
      $('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' value='True' class='form-control optionChanged'></div></div>");
      $('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' value='False' class='form-control optionChanged'></div></div>");
    }
    else if (questiontype == 4)
    {
      $('#imageupload').hide();
      $('#pix').hide();
      $('#questionText').show();

      $('#form-tabs-t-1').hide();
      $('#form-tabs-t-2').show();
      $('#qnformat_links').show();
      $('#kekule').hide();
      $('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' value='Yes' class='form-control optionChanged'></div></div>");
      $('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' value='No' class='form-control optionChanged'></div></div>");
    }
    else if (questiontype == 5)
    {
      // $('#imageupload').hide();
      // $('#pix').hide();
      // $('#questionText').show();
      // $('#puzzle').hide();
      // $('#puzzle1').hide();
      $('#myModal1').modal('show');
     // alert("Please use 3 underscore symbol (___) For Blank Spaces");
      // $('#form-tabs-t-1').show();
      // $('#form-tabs-t-2').show();
      // $('#otherType').hide();
      // $('#addOption').hide();
      // $('#removeOption').hide();
      // $('#sequenceRow').hide();
      // $('#fillIntheBlanks').show();
      // $('#qnformat_links').hide();
      // $('#instruction').hide();
      // $('#latex_instruction').hide();
       $('#kekule').hide();
      // $('#mathquill').hide();

      // $('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option 1 </label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1'  type='text' class='form-control'></div></div>");
    }
    else if (questiontype == 6)
    {
      $('#imageupload').hide();
      $('#pix').hide();
      $('#questionText').show();

      $('#form-tabs-t-1').hide();
      $('#form-tabs-t-2').show();
      $('#qnformat_links').hide();
      $('#instruction').hide();
      $('#latex_instruction').hide();
      $('#kekule').hide();
      $('#mathquill').hide();
      //$('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div></div>");
    }
    else if (questiontype == 7)
    {
      $('#imageupload').hide();
      $('#pix').hide();
      $('#questionText').show();

      $('#form-tabs-t-1').show();
      $('#form-tabs-t-2').show();
      $('#qnformat_links').hide();
      $('#instruction').hide();
      $('#latex_instruction').hide();
      $('#kekule').hide();
      $('#mathquill').hide();
      // $('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1'  type='text' class='form-control'></div></div>");
      $('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option 1 </label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div><button type='button' id='addOption' name='btnSubmit' class='btn btn-raised btn-black'>+</button> <button id='removeOption' type='button' name='btnSubmit' class='btn btn-raised btn-black'>-</button></div>");
    }

    if (questiontype == 8)
    {
      $('#imageupload').hide();
      $('#pix').hide();
      $('#questionText').show();

      $('#form-tabs-t-1').show();
      $('#form-tabs-t-2').show();
      $('#qnformat_links').hide();
      $('#instruction').hide();
      $('#latex_instruction').hide();
      // $('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option 1 </label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1'  type='text' class='form-control'></div></div>");
      $('#addOption').hide();
      $('#removeOption').hide();
      $('#otherType').hide();
      $('#sequenceOption').show();
      $('#sequenceAnswer').show();
      $('#kekule').hide();
      $('#mathquill').hide();
      $('#sequenceOption').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option</label> <div class='col-sm-9 col-md-4' id='ans'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div></div>");
      $('#sequenceAnswer').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div></div>");
      //  sortableSeq();
      // $("#dragSequence").sortable("refresh");
    }
    else if (questiontype == 9)
    {
      $('#imageupload').hide();
      $('#pix').hide();
      $('#questionText').show();
      $('#form-tabs-t-1').show();
      $('#form-tabs-t-2').show();
      $('#qnformat_links').hide();
      $('#addOption').show();
      $('#removeOption').show();
      $('#otherType').hide();
      $('#matchOption').show();
      $('#matchAnswer').show();
      $('#instruction').hide();
      $('#latex_instruction').hide();
      $('#kekule').hide();
      $('#mathquill').hide();
      $('#matchOption').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div></div>");
      $('#matchAnswer').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div></div>");
    }
    else if(questiontype == 10){
      $('#form-tabs-t-2').show();
      $('#form-tabs-t-1').show();
      $('#qnformat_links').hide();
      $('#addOption').show();
      $('#removeOption').show();
      $('#otherType').hide();
      $('#matchOption').hide();
      $('#matchAnswer').hide();
      $('#instruction').hide();
      $('#latex_instruction').hide();
      $('#questionText').show();
      $('#questionText').val('Solve the puzzle. Find instructions below the puzzle.');
      // $('#imageupload').show();
      $('#pix').show();
      $('#slider').show();
      // $('#puzzle').show();
      $('#tabHeaderContainer').show();
      $('#tabContentContainer').show();
      $('#puzzleAnswer').show();

      $('#mathquill').hide();
      $('#kekule').hide();
      
      
    }
    
   
  },


  validateMatchTheFollowing: function()
  {
    return true;
  },

  saveMatchTheFollowing: function()
  {
    var self = this;
   
    //if( this.validateMatchTheFollowing()){
    var questiontypeMatch = $('#questionType').val();

    if (questiontypeMatch == 9)
    {

      if (!this.validateQuestion())
      {
        $('#form-tabs-t-0').trigger('click');
        return false;
      }
      else if (!this.validateQuestionOption())
      {
        $('#form-tabs-t-1').trigger('click');
        return false;
      }
      else if (this.validateDuplicates())
      {
        $('#form-tabs-t-1').trigger('click');
        return false;
      }
      else if (!this.validateKeyAnswers())
      {
        $('#form-tabs-t-2').trigger('click');
        return false;
      }

      var keyAnswerJson = '';
      if (this.rendered)
      {
        $('#matchAnswerDiv').find('.row').each(function()
        {

          var matchOption =  $.trim($(this).find('#matchansweroptiondiv #questionAnswerOptionMatch1').val());
          var matchAnswer =  $.trim($(this).find('#matchansOption').text());
          var finalmatch = matchOption + brek + matchAnswer;
          if (keyAnswerJson == '')
          {
            keyAnswerJson = finalmatch;
          }
          else
          {
            keyAnswerJson = keyAnswerJson + matbrek + finalmatch;
          }
        });
      }
      else
      {
        keyAnswerJson = this.questionData.key_answers[0].question_answer_txt;
      }

      var matchOptionQus = '';
      if (this.rendered)
      {
        $('#matchOption input[type="text"]').each(function()
        {
          if (matchOptionQus == '')
          {
            matchOptionQus = this.value;
          }
          else
          {
            matchOptionQus = matchOptionQus + brek + this.value;
          }

        });
        var matchOptionAns = '';
        $('#matchAnswer input[type="text"]').each(function()
        {
          if (matchOptionAns == '')
          {
            matchOptionAns = this.value;
          }
          else
          {
            matchOptionAns = matchOptionAns + brek + this.value;
          }

        });
        var answerOptionJson = [];
        answerOptionJson.push(
        {
          "question_option_txt": matchOptionQus,
          "description": matchOptionQus,
          "option_group": 'Column-1'
        });
        answerOptionJson.push(
        {
          "question_option_txt": matchOptionAns,
          "description": matchOptionAns,
          "option_group": 'Column-2'
        });
      }
      else
      {
        var answerOptionJson = [];
        answerOptionJson.push(
        {
          "question_option_txt": this.questionData.answer_options[0].question_option_txt,
          "description": this.questionData.answer_options[0].description,
          "option_group": 'Column-1'
        });
        answerOptionJson.push(
        {
          "question_option_txt": this.questionData.answer_options[1].question_option_txt,
          "description": this.questionData.answer_options[0].description,
          "option_group": 'Column-2'
        });
      }

      var questionFormData = {
        "clnt_id": $("#questionClient").val(),
        "category_id": $("#questionCategory").val(),
        "subject_id": $("#questionSubject").val(),
        //"topic_id":$("#questionTopic").val(),
        "difficulty_level_id": $("#questionComplexity").val(),
        "contributed_by": $("#questionClient").val(),
        "question_type_id": $("#questionType").val(),
        "descriptive": $("input[type=radio][name=questionDescriptive]:checked").val(),
        "question_txt_format": $("#questionText").val().trim(),
        "pos_marks": $("#questionTotalMark").val(),
        //  "neg_marks":$("#questionNegativeMark").val(),
        "weightage": $("#questionWeightage").val(),
        "tips": $("#tips_id").val(),
        "answer_options": answerOptionJson,
        "key_answers": keyAnswerJson
      };

      
      var topic_id = $("#questionTopic").val();
      if (topic_id == null || topic_id == undefined || topic_id == '')
      {
        questionFormData.topic_id = 10;
      }
      else
      {
        questionFormData.topic_id = $("#questionTopic").val();
      }
      if (new String(this.mode).valueOf() == new String('edit').valueOf())
      {
        questionFormData.question_id = parseInt($('#question_id').val(), 10);
        var neg_marks = $("#questionNegativeMark").val();
        if (neg_marks == null || neg_marks == undefined || neg_marks == '')
        {
          questionFormData.neg_marks = 0;
        }
        else
        {
          questionFormData.neg_marks = $("#questionNegativeMark").val();
        }
        // var requestData = JSON.stringify(questionFormData); 
       
        var requestData = JSON.stringify(questionFormData);
        saveQuestion = "/eprayoga/admin/update_question_bank";
        var successMsg = "Question Updated Successfully.";
        var failureMsg = "Error while updating the city. Contact Administrator.";

      }
      else
      {
        // alert(JSON.stringify(questionFormData));
        var neg_marks = $("#questionNegativeMark").val();
        if (neg_marks == null || neg_marks == undefined || neg_marks == '')
        {
          questionFormData.neg_marks = 0;
        }
        else
        {
          questionFormData.neg_marks = $("#questionNegativeMark").val();
        }
        var requestData = JSON.stringify(questionFormData);
        saveQuestion = "/eprayoga/admin/create_question_bank";
        var successMsg = "Question Created Successfully.";
        var failureMsg = "Error while creating the Faq. Contact Administrator.";
      }

     
      $('#saveQuestion').attr('disabled','disabled');

      $.ajax(
      {
        url: saveQuestion,
        type: "POST",
        data: requestData,
        contentType: 'application/json',
        cache: false,
        success: function(data)
        {
          if (data.status != undefined)
          {
            // $("div.success").html('Question Already Exist !!');
            // $("div.success").fadeIn(300).delay(1500).fadeOut(400);
            $('#messagepop').text('Question Already Exist !!'); 
            $('#myModalPopup').modal('show');
          }
          else
          {
           
            // appRouter.navigate("questionList",
            // {
            //   trigger: true
            // });
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          }

        },
        error: function(data)
        {
           $('#saveQuestion').removeAttr('disabled');
          var errData = JSON.parse(data.responseText);
          if (errData.question_txt_format)
          {
          
            var failureMsg = JSON.stringify(errData.question_txt_format[0]);
            var errormsg = failureMsg.replace(/\"/g, "");
            $('#form-tabs-t-0').trigger('click');

            $("#question_input_error").html('The Question txt format has already been taken');

          }else{
            errorhandle(data);
            }
        }
      });


      return true;

    }
    else
    {
      return false;
    }


  },

savePuzzle : function(){
   
    var self = this;
    
      var questiontypeMatch = $('#questionType').val();

    if (questiontypeMatch == 10 ){

       // if(!this.validateQuestion()){
       //      $('#form-tabs-t-0').trigger('click');
       //      return false;
       //  }else if(!this.validateKeyAnswers()){
       //      $('#form-tabs-t-2').trigger('click');
       //      return false;
       //  }

      // var can=document.getElementById("puzzle");
      // var can1=document.getElementById("puzzle1");
      var puzzleCanvas=document.getElementById("puzzleCanvas");
      // console.log(puzzleCanvas);
      var puzzleAnswer=document.getElementById("puzzleAnswer");
      // console.log(puzzleAnswer);
      var answerOptionJson = [];
      var configClone = Object.assign({},this.puzzle.getConfig());
      delete configClone['imgObjURL'];
      console.log(configClone);
      configClone = JSON.stringify(configClone);
      answerOptionJson.push(
      {
        "question_option_txt": configClone,
        "option_group": "P-Options"
      });      
      answerOptionJson.push(
      {
        "question_option_txt": puzzleAnswer.toDataURL("image/png"),
        
        "option_group": "I-Data-Original"
      });
      // answerOptionJson.push(
      // {
      //   "question_option_txt": puzzleCanvas.toDataURL("image/png"),
        
      //   "option_group": "I-Data-Puzzle"
      // });
      // answerOptionJson = puzzleCanvas.toDataURL("image/png");
      // keyAnswerJson = puzzleAnswer.toDataURL("image/png");
      keyAnswerJson = 2;
      // console.log("canvas",answerOptionJson);
      // console.log("canvas",keyAnswerJson);
          var questionFormData ={
                  "clnt_id":$("#questionClient").val(),
                  "category_id": $("#questionCategory").val(),
                  "subject_id":$("#questionSubject").val(),
                  //"topic_id":$("#questionTopic").val(),
                  "difficulty_level_id":$("#questionComplexity").val(),
                  "contributed_by":$("#questionClient").val(),
                  "question_type_id":$("#questionType").val(),
                  "descriptive": $( "input[type=radio][name=questionDescriptive]:checked" ).val(),
                  
                  "pos_marks":$("#questionTotalMark").val(),
                //  "neg_marks":$("#questionNegativeMark").val(),
                  "weightage": $("#questionWeightage").val(),
                  "question_txt_format": $("#questionText").val().trim(),
                  "tips": $("#tips_id").val(),
                  "answer_options":  answerOptionJson ,
                  "key_answers": keyAnswerJson
              };

              // questionFormData.question_txt_format =this.fileName ;
              
              // console.log(questionFormData);
              var topic_id = $("#questionTopic").val();
            if(topic_id == null || topic_id == undefined || topic_id == ''){
              
                questionFormData.topic_id = 10;
            }else {
             
              questionFormData.topic_id = $("#questionTopic").val();
            }
          if (new String(this.mode).valueOf() == new String('edit').valueOf()) {
            questionFormData.question_id = parseInt($('#question_id').val(), 10);
            var neg_marks = $("#questionNegativeMark").val();
            if(neg_marks == null || neg_marks == undefined || neg_marks == ''){
                questionFormData.neg_marks = 0;
            }else {
              questionFormData.neg_marks = $("#questionNegativeMark").val();
            }
           // var requestData = JSON.stringify(questionFormData); 

            var requestData = JSON.stringify(questionFormData); 
            saveQuestion = "/eprayoga/admin/update_question_bank";
            var successMsg = "Question Updated Successfully.";
            var failureMsg = "Error while updating the city. Contact Administrator.";

        }else {
            // alert(JSON.stringify(questionFormData));
            var neg_marks = $("#questionNegativeMark").val();
            if(neg_marks == null || neg_marks == undefined || neg_marks == ''){
                questionFormData.neg_marks = 0;
            }else {
              questionFormData.neg_marks = $("#questionNegativeMark").val();
            }
            var requestData = JSON.stringify(questionFormData); 
            saveQuestion = "/eprayoga/admin/create_question_bank";
            var successMsg = "Question Created Successfully.";
            var failureMsg = "Error while creating the Faq. Contact Administrator.";
          }
        $('#saveQuestion').attr('disabled','disabled');


           $.ajax({
              url     : saveQuestion,
              type    : "POST",
              data    : requestData ,
              contentType:'application/json',
              cache:false,
              success : function(data) {
                if(data.status != undefined){
                   $('#messagepop').text('Question Already Exist !!'); 
                   $('#myModalPopup').modal('show');

                }else{
                
                  // appRouter.navigate("questionList", {trigger: true});
                   $('#messagepop').text(successMsg); 
                    $('#myModalPopup').modal('show');
                    $('.okClass').bind('click', self.routepopup);
                }
                
              },
              error: function(data) {
                $('#saveQuestion').removeAttr('disabled');
                var errData = JSON.parse(data.responseText);
                if(errData.question_txt_format){
                          
                           var failureMsg = JSON.stringify(errData.question_txt_format[0]); 
                           var errormsg = failureMsg.replace(/\"/g, "");
                           $('#form-tabs-t-0').trigger('click');
                       $( "#question_input_error").html('The question txt format has already been taken');

              }else{
            errorhandle(data);
            }
            }
            }); 
    
    return true;
  } else {
    return false;
  }
},
  saveShortAnswer: function()
  {
    var self = this;
    var questiontype = $('#questionType').val();
    if (questiontype == 6)
    {
      if (!this.validateQuestion())
      {
        $('#form-tabs-t-0').trigger('click');
        return false;
      }
      else if (!this.validateKeyAnswers())
      {
        $('#form-tabs-t-2').trigger('click');
        return false;
      }

      if (this.rendered)
      {
        keyAnswerJson = $('textarea#questionAnswerOption1').val().trim();
      }
      else
      {
        keyAnswerJson = this.questionData.key_answers[0].question_answer_txt;
      }

      var answerOptionJson = [];

      if (this.rendered)
      {
        answerOptionJson.push(
        {
          "question_option_txt": $('textarea#questionAnswerOption1').val().trim(),
          "description": $('textarea#questionAnswerOption1').val().trim()
        });
      }
      else
      {
        // keyAnswerJson = this.questionData.key_answers[0].question_answer_txt;
       
        answerOptionJson.push(
        {
          "question_option_txt": this.questionData.answer_options[0].question_option_txt,
          "description": this.questionData.answer_options[0].description
        });
      }




      var questionFormData = {
        "clnt_id": $("#questionClient").val(),
        "category_id": $("#questionCategory").val(),
        "subject_id": $("#questionSubject").val(),
        //"topic_id":$("#questionTopic").val(),
        "difficulty_level_id": $("#questionComplexity").val(),
        "contributed_by": $("#questionClient").val(),
        "question_type_id": $("#questionType").val(),
        "descriptive": $("input[type=radio][name=questionDescriptive]:checked").val(),
        "question_txt_format": $("#questionText").val().trim(),
        "pos_marks": $("#questionTotalMark").val(),
        //"neg_marks":$("#questionNegativeMark").val(),
        "weightage": $("#questionWeightage").val(),
        "tips": $("#tips_id").val(),
        "answer_options": answerOptionJson,
        "key_answers": keyAnswerJson
      };

     
      var topic_id = $("#questionTopic").val();
      if (topic_id == null || topic_id == undefined || topic_id == '')
      {

        questionFormData.topic_id = 10;
      }
      else
      {

        questionFormData.topic_id = $("#questionTopic").val();
      }
      if (new String(this.mode).valueOf() == new String('edit').valueOf())
      {
        questionFormData.question_id = parseInt($('#question_id').val(), 10);
        var neg_marks = $("#questionNegativeMark").val();
        if (neg_marks == null || neg_marks == undefined || neg_marks == '')
        {
          questionFormData.neg_marks = 0;
        }
        else
        {
          questionFormData.neg_marks = $("#questionNegativeMark").val();
        }
        // var requestData = JSON.stringify(questionFormData); 
        var requestData = JSON.stringify(questionFormData);
        saveQuestion = "/eprayoga/admin/update_question_bank";
        var successMsg = "Question Updated Successfully.";
        var failureMsg = "Error while updating the city. Contact Administrator.";

      }
      else
      {
        var neg_marks = $("#questionNegativeMark").val();
        if (neg_marks == null || neg_marks == undefined || neg_marks == '')
        {
          questionFormData.neg_marks = 0;
        }
        else
        {
          questionFormData.neg_marks = $("#questionNegativeMark").val();
        }
        var requestData = JSON.stringify(questionFormData);
        saveQuestion = "/eprayoga/admin/create_question_bank";
        var successMsg = "Question Created Successfully.";
        var failureMsg = "Error while creating the Faq. Contact Administrator.";
      }

      $('#saveQuestion').attr('disabled','disabled');


      $.ajax(
      {
        url: saveQuestion,
        type: "POST",
        data: requestData,
        contentType: 'application/json',
        cache: false,
        success: function(data)
        {
          if (data.status != undefined)
          {
            $('#messagepop').text('Question Already Exist !!'); 
            $('#myModalPopup').modal('show');

          }
          else
          {
           
            // appRouter.navigate("questionList",
            // {
            //   trigger: true
            // });
             $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);

          }

        },
        error: function(data)
        {
          $('#saveQuestion').removeAttr('disabled');
          var errData = JSON.parse(data.responseText);
          if (errData.question_txt_format)
          {
            var failureMsg = JSON.stringify(errData.question_txt_format[0]);
            var errormsg = failureMsg.replace(/\"/g, "");
            $('#form-tabs-t-0').trigger('click');

            $("#question_input_error").html('The question txt format has already been taken');


          }else{
            errorhandle(data);
            }
        }
      });
      return true;
    }
    else
    {
      return false;
    }
  },

  saveOrdering: function()
  {
    var self = this;
    var questiontype = $('#questionType').val();

    if (questiontype == 7)
    {
      if (!this.validateQuestion())
      {
        $('#form-tabs-t-0').trigger('click');
        return false;
      }
      else if (!this.validateQuestionOption())
      {
        $('#form-tabs-t-1').trigger('click');
        return false;
      }
      else if (this.validateDuplicates())
      {
        $('#form-tabs-t-1').trigger('click');
        return false;
      }
      else if (!this.validateKeyAnswers())
      {
        $('#form-tabs-t-2').trigger('click');
        return false;
      }

      var keyAnswerJson = '';

     if (this.rendered)
      {
       $('#answeroptiondiv').find('div').each(function()
      {
        // text = $(this).text();
       
        // keyAnswerJson = $(this).text() + brek + $(this).text();
       
        if (keyAnswerJson == '')
        {
          keyAnswerJson = $(this).text();
       
        } 
        else
        {
          keyAnswerJson = keyAnswerJson + brek + $(this).text();
          
        }      

      })
    }
      else
      {
        keyAnswerJson = this.questionData.key_answers[0].question_answer_txt;
        
      }

     

      var answerOptionJson = [];

     

        $('#optionDiv #plainAnswerdiv input[type="text"]').each(function()
      {
        answerOptionJson.push(

        {
          "question_option_txt": this.value,
          "description": this.value

        });

      });
      




      var questionFormData = {
        "clnt_id": $("#questionClient").val(),
        "category_id": $("#questionCategory").val(),
        "subject_id": $("#questionSubject").val(),
        //"topic_id":$("#questionTopic").val(),
        "difficulty_level_id": $("#questionComplexity").val(),
        "contributed_by": $("#questionClient").val(),
        "question_type_id": $("#questionType").val(),
        "descriptive": $("input[type=radio][name=questionDescriptive]:checked").val(),
        "question_txt_format": $("#questionText").val(),
        "pos_marks": $("#questionTotalMark").val(),
        // "neg_marks":$("#questionNegativeMark").val(),
        "weightage": $("#questionWeightage").val(),
        "tips": $("#tips_id").val(),
        "answer_options": answerOptionJson,
        "key_answers": keyAnswerJson
      };

     
      var topic_id = $("#questionTopic").val();
      if (topic_id == null || topic_id == undefined || topic_id == '')
      {

        questionFormData.topic_id = 10;
      }
      else
      {

        questionFormData.topic_id = $("#questionTopic").val();
      }
      if (new String(this.mode).valueOf() == new String('edit').valueOf())
      {
        questionFormData.question_id = parseInt($('#question_id').val(), 10);
        var neg_marks = $("#questionNegativeMark").val();
        if (neg_marks == null || neg_marks == undefined || neg_marks == '')
        {
          questionFormData.neg_marks = 0;
        }
        else
        {
          questionFormData.neg_marks = $("#questionNegativeMark").val();
        }
        // var requestData = JSON.stringify(questionFormData); 
       
        var requestData = JSON.stringify(questionFormData);
        saveQuestion = "/eprayoga/admin/update_question_bank";
        var successMsg = "Question Updated Successfully.";
        var failureMsg = "Error while updating the city. Contact Administrator.";

      }
      else
      {
        // alert(JSON.stringify(questionFormData));
        var neg_marks = $("#questionNegativeMark").val();
        if (neg_marks == null || neg_marks == undefined || neg_marks == '')
        {
          questionFormData.neg_marks = 0;
        }
        else
        {
          questionFormData.neg_marks = $("#questionNegativeMark").val();
        }
        var requestData = JSON.stringify(questionFormData);
        saveQuestion = "/eprayoga/admin/create_question_bank";
        var successMsg = "Question Created Successfully.";
        var failureMsg = "Error while creating the Faq. Contact Administrator.";
      }

     
     $('#saveQuestion').attr('disabled','disabled');


      $.ajax(
      {
        url: saveQuestion,
        type: "POST",
        data: requestData,
        contentType: 'application/json',
        cache: false,
        success: function(data)
        {
          if (data.status != undefined)
          {
            $('#messagepop').text('Question Already Exist !!'); 
            $('#myModalPopup').modal('show');
          }
          else
          {
           
            // appRouter.navigate("questionList",
            // {
            //   trigger: true
            // });
             $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);

          }

        },
        error: function(data)
        {
           $('#saveQuestion').removeAttr('disabled');
          var errData = JSON.parse(data.responseText);
          if (errData.question_txt_format)
          {
           
            var failureMsg = JSON.stringify(errData.question_txt_format[0]);
            var errormsg = failureMsg.replace(/\"/g, "");
            $('#form-tabs-t-0').trigger('click');

            $("#question_input_error").html('The question txt format has already been taken');


          }else{
            errorhandle(data);
            }
        }
      });
      return true;
    }
    else
    {
      return false;
    }


  },


  saveSingleTrueYesSequence: function()
  {
    var self = this;

    if (!this.validateQuestion())
    {
      $('#form-tabs-t-0').trigger('click');
      return false;
    }
    else if (!this.validateQuestionOption())
    {
      $('#form-tabs-t-1').trigger('click');
      return false;
    }
    else if (this.validateDuplicates())
    {
      $('#form-tabs-t-1').trigger('click');
      return false;
    }
    else if (!this.validateKeyAnswers())
    {
      $('#form-tabs-t-2').trigger('click');
      return false;
    }


    var questiontype = $('#questionType').val();
    var keyAnswerJson = [];
    if (questiontype == 1 || questiontype == 3 || questiontype == 4)
    {

      if (this.rendered)
      {
        if (this.optionFormat == 'chemistry')
        {
          $('#chemistryOptionDiv input:radio:checked').each(function()
          {
           
            // keyAnswerJson = this.chemOptionFields[this.value];
            keyAnswerJson = this.value;//~~~ not assigning the actaul value for simplicity
          });           
        }
        else
        {
          $('#answerDiv input:radio:checked').each(function()
          {
           
            // if(keyAnswerJson == '')
            {
              keyAnswerJson = this.value;
            }
            // else
            // {
            //   keyAnswerJson = keyAnswerJson +brek+ $('#answerDiv input:radio:checked').value;
            
            // }
          });          
        }

      }
      else
      {
        keyAnswerJson = this.questionData.key_answers[0].question_answer_txt;
      }

     
      var question;
      var answerOptionJson = [];

      // if math options load it from Mathfield Object
      if (this.questionFormat == 'latex')
      {
        // question = 'latex:'+this.mathQuestion.latex();
        var questionLatexes = "";
        var backref = this;
        $('.mathSpan').each(function()
        {
         
          $('#mathquill').find('#' + this.id).parent().replaceWith(':latex:');
         
          questionLatexes += backref.mathQuestionFields[this.id].latex() + ':latex:';
        });

        // $.each(this.mathQuestionFields, function(id, obj){
        //   $('#mathquill').find('#'+id).replaceWith(':latex:');
        //   questionLatexes += obj.latex()+':latex:';
        // });

      
        questionLatexes = questionLatexes.substring(0, questionLatexes.lastIndexOf(':latex:'));
        question = $('#mathquill').html() + LATEX_GROUP_SEPERATOR + questionLatexes;
       

      }
      else if (this.questionFormat == 'chemistry')
      {
        var chemDoc = this.chemQuestionViewer.getChemObj();       
        // var render2DConfigsClone = $.extend(true, {},  Kekule.Render.Render2DConfigs.getInstance());
        // var render2DConfigsClone = Kekule.Render.Render2DConfigs.getInstance().clone();
        // var currentConfig = Kekule.Render.Render2DConfigs.getInstance().getMoleculeDisplayConfigs().clone();

         // Kekule.Render.Render2DConfigs.getInstance().__$moleculeDisplayConfigs.setPropValue("defMoleculeDisplayType", 2, true)
        // Kekule.Render.Render2DConfigs.getInstance().getMoleculeDisplayConfigs().setPropValue("defMoleculeDisplayType", 2, true)

        // Kekule.Render.Render2DConfigs.getInstance().setMoleculeDisplayConfigs(currentConfig);
        // var displayLabelConfigsClone = render2DConfigsClone.getDisplayLabelConfigs();
        var displayLabelConfigsClone = Kekule.Render.Render2DConfigs.getInstance().getDisplayLabelConfigs();
        var displayLabelConfigs = 
        {
          "enableIsotopeAlias": displayLabelConfigsClone.getEnableIsotopeAlias(),
          "unsetElement": displayLabelConfigsClone.getUnsetElement(),
          "dummyAtom": displayLabelConfigsClone.getDummyAtom(),
          "heteroAtom": displayLabelConfigsClone.getHeteroAtom(),
          "anyAtom": displayLabelConfigsClone.getAnyAtom(),
          "variableAtom": displayLabelConfigsClone.getVariableAtom(),
          "rgroup": displayLabelConfigsClone.getRgroup(),
          "isoListLeadingBracket": displayLabelConfigsClone.getIsoListLeadingBracket(),
          "isoListTailingBracket": displayLabelConfigsClone.getIsoListTailingBracket(),
          "isoListDelimiter": displayLabelConfigsClone.getIsoListDelimiter(),
          "isoListDisallowPrefix": displayLabelConfigsClone.getIsoListDisallowPrefix(),
        };
        
        var render2DConfigsClone = Kekule.Render.Render2DConfigs.getInstance().clone();
        var currentConfig = JSON.stringify(
        {
          "generalConfigs": render2DConfigsClone.getGeneralConfigs(),
          "moleculeDisplayConfigs": render2DConfigsClone.getMoleculeDisplayConfigs(),
          "displayLabelConfigs": displayLabelConfigs,
          "textFontConfigs": render2DConfigsClone.getTextFontConfigs(),
          "lengthConfigs": render2DConfigsClone.getLengthConfigs(),
          "colorConfigs": render2DConfigsClone.getColorConfigs()
        });
       
        question = currentConfig + KEKULE_MARKER + Kekule.IO.saveFormatData(chemDoc, 'Kekule-JSON');
       
      }

      else
      {
        question = $("#questionText").val();
      }

      // if math options load it from Chemsistry Objects
      if (this.optionFormat == 'chemistry')
      {
        // question = this.mathQuestion;
        $.each(this.chemOptionFields, function(i, opt)
        {
          var chemJSON = Kekule.IO.saveFormatData(opt.getChemObj(), 'Kekule-JSON');
          answerOptionJson.push(
          {

            "question_option_txt": chemJSON,
            "description": chemJSON,
            "option_group": "C"
          });
        });
      }
      // if math options load it from Mathfield Objects
      else if (this.optionFormat == 'latex')
      {
        // question = this.mathQuestion;
        $.each(this.mathOptionFields, function(i, opt)
        {
          answerOptionJson.push(
          {
            "question_option_txt": this.latex(),
            "description": this.latex(),
            "option_group": "M"
          });
        });
      }
      else
      {
        $('#optionDiv #plainAnswerdiv input[type="text"]').each(function()
        {
          answerOptionJson.push(
          {
            "question_option_txt": this.value,
            "description": this.value
          });
        });
      }
     

      var questionFormData = {
        "clnt_id": $("#questionClient").val(),
        "category_id": $("#questionCategory").val(),
        "subject_id": $("#questionSubject").val(),
        //"topic_id":$("#questionTopic").val(),
        "difficulty_level_id": $("#questionComplexity").val(),
        "contributed_by": $("#questionClient").val(),
        "question_type_id": $("#questionType").val(),
        "descriptive": $("input[type=radio][name=questionDescriptive]:checked").val(),
        "question_txt_format": question,
        "pos_marks": $("#questionTotalMark").val(),
        // "neg_marks":$("#questionNegativeMark").val(),
        "weightage": $("#questionWeightage").val(),
        "tips": $("#tips_id").val(),
        "answer_options": answerOptionJson,
        "key_answers": keyAnswerJson
      };

     
      var topic_id = $("#questionTopic").val();
      if (topic_id == null || topic_id == undefined || topic_id == '')
      {

        questionFormData.topic_id = 10;
      }
      else
      {

        questionFormData.topic_id = $("#questionTopic").val();
      }
      if (new String(this.mode).valueOf() == new String('edit').valueOf())
      {
        questionFormData.question_id = parseInt($('#question_id').val(), 10);
        var neg_marks = $("#questionNegativeMark").val();
        if (neg_marks == null || neg_marks == undefined || neg_marks == '')
        {
          questionFormData.neg_marks = 0;
        }
        else
        {
          questionFormData.neg_marks = $("#questionNegativeMark").val();
        }
        // var requestData = JSON.stringify(questionFormData); 
       
        var requestData = JSON.stringify(questionFormData);
        saveQuestion = "/eprayoga/admin/update_question_bank";
        var successMsg = "Question Updated Successfully.";
        var failureMsg = "Error while updating the question. Contact Administrator.";

      }
      else
      {
        // alert(JSON.stringify(questionFormData));
        var neg_marks = $("#questionNegativeMark").val();
        if (neg_marks == null || neg_marks == undefined || neg_marks == '')
        {
          questionFormData.neg_marks = 0;
        }
        else
        {
          questionFormData.neg_marks = $("#questionNegativeMark").val();
        }

        var requestData = JSON.stringify(questionFormData);
        saveQuestion = "/eprayoga/admin/create_question_bank";
        var successMsg = "Question Created Successfully.";
        var failureMsg = "Error while creating the question. Contact Administrator.";
      }

    
      
      $('#saveQuestion').attr('disabled','disabled');

      $.ajax(
      {
        url: saveQuestion,
        type: "POST",
        data: requestData,
        contentType: 'application/json',
        cache: false,
        success: function(data)
        {
          if (data.status != undefined)
          {
            $('#messagepop').text('Question Already Exist !!'); 
            $('#myModalPopup').modal('show');
          }
          else
          {
          

            // appRouter.navigate("questionList",
            // {
            //   trigger: true
            // });
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          }

        },
        error: function(data)
        {
          $('#saveQuestion').removeAttr('disabled');
          var errData = JSON.parse(data.responseText);
          if (errData.question_txt_format)
          {
            
            var failureMsg = JSON.stringify(errData.question_txt_format[0]);
            var errormsg = failureMsg.replace(/\"/g, "");
            $('#form-tabs-t-0').trigger('click');
            $("#question_input_error").html('The question txt format has already been taken');

          }else{
            errorhandle(data);
            }
        }
      });

      return true;
    }
    else
    {
      return true;
    }
  },

  saveMultiple: function()
  {
    var self = this;
    var questiontype = $('#questionType').val();
    var keyAnswerJson = [];
    if (questiontype == 2)
    {
      if (!this.validateQuestion())
      {
        $('#form-tabs-t-0').trigger('click');
        return false;
      }
      else if (!this.validateQuestionOption())
      {
        $('#form-tabs-t-1').trigger('click');
        return false;
      }
      else if (this.validateDuplicates())
      {
        $('#form-tabs-t-1').trigger('click');
        return false;
      }
      else if (!this.validateKeyAnswers())
      {
        $('#form-tabs-t-2').trigger('click');
        return false;
      }

      var question;
     

      // if math options load it from Mathfield Object
      if (this.questionFormat == 'latex')
      {
        // question = 'latex:'+this.mathQuestion.latex();
        var questionLatexes = "";
        var backref = this;
        $('.mathSpan').each(function()
        {
         
          $('#mathquill').find('#' + this.id).parent().replaceWith(':latex:');
        
          questionLatexes += backref.mathQuestionFields[this.id].latex() + ':latex:';
        });

       

        questionLatexes = questionLatexes.substring(0, questionLatexes.lastIndexOf(':latex:'));
        question = $('#mathquill').html() + LATEX_GROUP_SEPERATOR + questionLatexes;
       

      }
      else if (this.questionFormat == 'chemistry')
      {
        var chemDoc = this.chemQuestionViewer.getChemObj();
      
        question = KEKULE_MARKER + Kekule.IO.saveFormatData(chemDoc, 'Kekule-JSON');
       
      }      

      else
      {
        question = $("#questionText").val();
      }

      if (this.rendered)
      {
        var answers;
        if (this.optionFormat == 'chemistry')
        {
          answers = $('#chemistryOptionDiv input[name=single]:checked');
         
        }
        else
        {
          answers = $('#answeroptiondiv input[name=single]:checked');
        }

        answers.map(function()
        {

          if (keyAnswerJson == '')
          {
            keyAnswerJson = $(this).val();
            //keyAnswerJson = $(this).prev('label').text();
           
          }
          else
          {
           
            keyAnswerJson = keyAnswerJson + brek + $(this).val();
          }
        });
       
      }
      else
      {
        keyAnswerJson = this.questionData.key_answers[0].question_answer_txt;
      }



      var answerOptionJson = [];
      // $('#optionDiv input[type="text"]').each(function(){
      //     answerOptionJson.push({"question_option_txt" :  this.value ,"description":this.value});
      //  });

      // if math options load it from Mathfield Objects
      if (this.optionFormat == 'latex')
      {
        // question = this.mathQuestion;
        $.each(this.mathOptionFields, function(i, opt)
        {
          answerOptionJson.push(
          {
            "question_option_txt": this.latex(),
            "description": this.latex(),
            "option_group": "M"
          });
        });
      }      // if math options load it from Chemsistry Objects
      else if (this.optionFormat == 'chemistry')
      {
        // question = this.mathQuestion;
        $.each(this.chemOptionFields, function(i, opt)
        {
          var chemJSON = Kekule.IO.saveFormatData(opt.getChemObj(), 'Kekule-JSON');
          answerOptionJson.push(
          {

            "question_option_txt": chemJSON,
            "description": chemJSON,
            "option_group": "C"
          });
        });
      }
      else
      {
        $('#optionDiv #plainAnswerdiv input[type="text"]').each(function()
        {
          answerOptionJson.push(
          {
            "question_option_txt": this.value,
            "description": this.value
          });
        });
      }

      var questionFormData = {
        "clnt_id": $("#questionClient").val(),
        "category_id": $("#questionCategory").val(),
        "subject_id": $("#questionSubject").val(),
        //"topic_id":$("#questionTopic").val(),
        "difficulty_level_id": $("#questionComplexity").val(),
        "contributed_by": $("#questionClient").val(),
        "question_type_id": $("#questionType").val(),
        "descriptive": $("input[type=radio][name=questionDescriptive]:checked").val(),
        "question_txt_format": question,
        "pos_marks": $("#questionTotalMark").val(),
        // "neg_marks":$("#questionNegativeMark").val(),
        "weightage": $("#questionWeightage").val(),
        "tips": $("#tips_id").val(),
        "answer_options": answerOptionJson,
        "key_answers": keyAnswerJson
      };

     
      var topic_id = $("#questionTopic").val();
      if (topic_id == null || topic_id == undefined || topic_id == '')
      {

        questionFormData.topic_id = 10;
      }
      else
      {

        questionFormData.topic_id = $("#questionTopic").val();
      }
      if (new String(this.mode).valueOf() == new String('edit').valueOf())
      {
        questionFormData.question_id = parseInt($('#question_id').val(), 10);
        var neg_marks = $("#questionNegativeMark").val();
        if (neg_marks == null || neg_marks == undefined || neg_marks == '')
        {
          questionFormData.neg_marks = 0;
        }
        else
        {
          questionFormData.neg_marks = $("#questionNegativeMark").val();
        }
        // var requestData = JSON.stringify(questionFormData); 
       
        var requestData = JSON.stringify(questionFormData);
        saveQuestion = "/eprayoga/admin/update_question_bank";
        var successMsg = "Question Updated Successfully.";
        var failureMsg = "Error while updating the question. Contact Administrator.";

      }
      else
      {
        // alert(JSON.stringify(questionFormData));
        var neg_marks = $("#questionNegativeMark").val();
        if (neg_marks == null || neg_marks == undefined || neg_marks == '')
        {
          questionFormData.neg_marks = 0;
        }
        else
        {
          questionFormData.neg_marks = $("#questionNegativeMark").val();
        }
        var requestData = JSON.stringify(questionFormData);
        saveQuestion = "/eprayoga/admin/create_question_bank";
        var successMsg = "Question Created Successfully.";
        var failureMsg = "Error while creating the question. Contact Administrator.";
      }

      $('#saveQuestion').attr('disabled','disabled');

      $.ajax(
      {
        url: saveQuestion,
        type: "POST",
        data: requestData,
        contentType: 'application/json',
        cache: false,
        success: function(data)
        {
          if (data.status != undefined)
          {
            $('#messagepop').text('Question Already Exist !!'); 
            $('#myModalPopup').modal('show');
          }
          else
          {
           
            // appRouter.navigate("questionList",
            // {
            //   trigger: true
            // });
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          }

        },
        error: function(data)
        {
           $('#saveQuestion').removeAttr('disabled');
          var errData = JSON.parse(data.responseText);
          if (errData.question_txt_format)
          {
           
            var failureMsg = JSON.stringify(errData.question_txt_format[0]);
            var errormsg = failureMsg.replace(/\"/g, "");
            $('#form-tabs-t-0').trigger('click');

            $("#question_input_error").html('The question txt format has already been taken');


          }else{
            errorhandle(data);
            }
        }
      });
      return true;
    }
    else
    {
      return false;
    }
  },


  saveFillInTheBlanks: function()
  { //question type id = 5
    var self = this;
    var questiontype = $('#questionType').val();
    var keyAnswerJson = '';
    var answerOptionJson = [];
    var optionBuffer = '';
    if (questiontype == 5)
    {

      if (!this.validateQuestion())
      {
        $('#form-tabs-t-0').trigger('click');
        return false;
      }
      else if (!this.validateQuestionOption())
      {
        $('#form-tabs-t-1').trigger('click');
        return false;
      }
      else if (this.validateDuplicates())
      {
        $('#form-tabs-t-1').trigger('click');
        return false;
      }
      else if (!this.validateKeyAnswers())
      {
        $('#form-tabs-t-2').trigger('click');
        return false;
      }




      var blanksArray = Object.keys(this.blankOptions);
      $.each(blanksArray, function(i, val)
      {
        optionBuffer = "";
        $('#' + val + ' input[type="text"]').each(function()
        {

         
          if (optionBuffer == '')
          {
            optionBuffer = this.value;
           
          }
          else
          {
           
            optionBuffer = optionBuffer + brek + this.value;
           
          }

        });

        answerOptionJson.push(
        {
          "question_option_txt": optionBuffer,
          "description": optionBuffer,
          "option_group": "Blank-" + (i + 1)
        });

      });
     

      $('#answeroptiondiv :selected').map(function()
      {
        if (keyAnswerJson == '')
        {
          keyAnswerJson = $(this).val();
        }
        else
        {
         
          keyAnswerJson = keyAnswerJson + brek + $(this).val();
        
        }
      });


    
      var questionFormData = {
        "clnt_id": $("#questionClient").val(),
        "category_id": $("#questionCategory").val(),
        "subject_id": $("#questionSubject").val(),
        //"topic_id":$("#questionTopic").val(),
        "difficulty_level_id": $("#questionComplexity").val(),
        "contributed_by": $("#questionClient").val(),
        "question_type_id": $("#questionType").val(),
        "descriptive": $("input[type=radio][name=questionDescriptive]:checked").val(),
        "question_txt_format": $("#questionText").val(),
        "pos_marks": $("#questionTotalMark").val(),
        "neg_marks": $("#questionNegativeMark").val(),
        "weightage": $("#questionWeightage").val(),
        "tips": $("#tips_id").val(),
        "answer_options": answerOptionJson,
        "key_answers": keyAnswerJson
      };

     
      var topic_id = $("#questionTopic").val();
      if (topic_id == null || topic_id == undefined || topic_id == '')
      {

        questionFormData.topic_id = 10;
      }
      else
      {

        questionFormData.topic_id = $("#questionTopic").val();
      }

      if (new String(this.mode).valueOf() == new String('edit').valueOf())
      {
        questionFormData.question_id = parseInt($('#question_id').val(), 10);
        // var requestData = JSON.stringify(questionFormData); 
       
        var requestData = JSON.stringify(questionFormData);
        saveQuestion = "/eprayoga/admin/update_question_bank";
        var successMsg = "Question Updated Successfully.";
        var failureMsg = "Error while updating the question. Contact Administrator.";

      }
      else
      {
        var requestData = JSON.stringify(questionFormData);
        saveQuestion = "/eprayoga/admin/create_question_bank";
        var successMsg = "Question Created Successfully.";
        var failureMsg = "Error while creating the question. Contact Administrator.";
      }

      $('#saveQuestion').attr('disabled','disabled');
    
      $.ajax(
      {
        url: saveQuestion,
        type: "POST",
        data: requestData,
        contentType: 'application/json',
        cache: false,
        success: function(data)
        {
          if (data.status != undefined)
          {
            $('#messagepop').text('Question Already Exist !!'); 
            $('#myModalPopup').modal('show');
          }
          else
          {
           
            // appRouter.navigate("questionList",
            // {
            //   trigger: true
            // });
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          }

        },

        error: function(data)
        {
         
           $('#saveQuestion').removeAttr('disabled');
          var errData = JSON.parse(data.responseText);
         
          if (errData.question_txt_format)
          {
          
            var failureMsg = JSON.stringify(errData.question_txt_format[0]);
            var errormsg = failureMsg.replace(/\"/g, "");
            $('#form-tabs-t-0').trigger('click');

            $("#question_input_error").html('The Question txt format has already been taken');


          }else{
            errorhandle(data);
            }
        }
      });
      return true;

    }
    else
    {
      return false;
    }

  },

  saveSequence: function()
  {
    var self = this;
   
    //if( this.validateMatchTheFollowing()){
    var questiontype = $('#questionType').val();

    if (questiontype == 8)
    {

      if (!this.validateQuestion())
      {
        $('#form-tabs-t-0').trigger('click');
        return false;
      }
      else if (!this.validateQuestionOption())
      {
        $('#form-tabs-t-1').trigger('click');
        return false;
      }
      else if (this.validateDuplicates())
      {
        $('#form-tabs-t-1').trigger('click');
        return false;
      }
      else if (!this.validateKeyAnswers())
      {
        $('#form-tabs-t-2').trigger('click');
        return false;
      }

      var keyAnswerJson = [];

      if (this.rendered)
      {
        $('#answerDiv input:radio:checked').each(function()
      {
        if (keyAnswerJson == '')
        {
          keyAnswerJson = $('#answerDiv input:radio:checked').next('label').text();
        }
        else
        {
          keyAnswerJson = keyAnswerJson + brek + $('#answerDiv input:radio:checked').next('label').text();
         
        }

      });      

    }
      else
      {
        keyAnswerJson = this.questionData.key_answers[0].question_answer_txt;
      }

      


      // var answerOptionJson = [];
      // $('#sequenceAnswer input[type="text"]').each(function(){
      //   answerOptionJson.push({"question_option_txt" :  this.value ,"description":this.value});

      //   });
      var seqOptionQus = '';
      $('#sequenceOption input[type="text"]').each(function()
      {
        if (seqOptionQus == '')
        {
          seqOptionQus = this.value;
        }
        else
        {
          seqOptionQus = seqOptionQus + brek + this.value;
        }

      });


      var seqOptionAns = '';
      $('#sequenceAnswer input[type="text"]').each(function()
      {
        if (seqOptionAns == '')
        {
          seqOptionAns = this.value;
        }
        else
        {
          seqOptionAns = seqOptionAns + brek + this.value;
        }

      });
      var answerOptionJson = [];
      answerOptionJson.push(
      {
        "question_option_txt": seqOptionQus,
        "description": seqOptionQus,
        "option_group": 'Question'
      });
      answerOptionJson.push(
      {
        "question_option_txt": seqOptionAns,
        "description": seqOptionAns,
        "option_group": 'option'
      });

      var questionFormData = {
        "clnt_id": $("#questionClient").val(),
        "category_id": $("#questionCategory").val(),
        "subject_id": $("#questionSubject").val(),
        //"topic_id":$("#questionTopic").val(),
        "difficulty_level_id": $("#questionComplexity").val(),
        "contributed_by": $("#questionClient").val(),
        "question_type_id": $("#questionType").val(),
        "descriptive": $("input[type=radio][name=questionDescriptive]:checked").val(),
        "question_txt_format": $("#questionText").val().trim(),
        "pos_marks": $("#questionTotalMark").val(),

        "weightage": $("#questionWeightage").val(),
        "tips": $("#tips_id").val(),
        "answer_options": answerOptionJson,
        "key_answers": keyAnswerJson
      };

     
      var topic_id = $("#questionTopic").val();
      if (topic_id == null || topic_id == undefined || topic_id == '')
      {

        questionFormData.topic_id = 10;
      }
      else
      {

        questionFormData.topic_id = $("#questionTopic").val();
      }
      if (new String(this.mode).valueOf() == new String('edit').valueOf())
      {
        questionFormData.question_id = parseInt($('#question_id').val(), 10);
        // var requestData = JSON.stringify(questionFormData); 
       
        var requestData = JSON.stringify(questionFormData);
        saveQuestion = "/eprayoga/admin/update_question_bank";
        var successMsg = "Question Updated Successfully.";
        var failureMsg = "Error while updating the question. Contact Administrator.";

      }
      else
      {
        // alert(JSON.stringify(questionFormData));
        var neg_marks = $("#questionNegativeMark").val();
        if (neg_marks == null || neg_marks == undefined || neg_marks == '')
        {
          questionFormData.neg_marks = 0;
        }
        else
        {
          questionFormData.neg_marks = $("#questionNegativeMark").val();
        }
        var requestData = JSON.stringify(questionFormData);
        saveQuestion = "/eprayoga/admin/create_question_bank";
        var successMsg = "Question Created Successfully.";
        var failureMsg = "Error while creating the question. Contact Administrator.";
      }

     
      $('#saveQuestion').attr('disabled','disabled');
      $.ajax(
      {
        url: saveQuestion,
        type: "POST",
        data: requestData,
        contentType: 'application/json',
        cache: false,
        success: function(data)
        {
          if (data.status != undefined)
          {
            $('#messagepop').text('Question Already Exist !!'); 
            $('#myModalPopup').modal('show');
          }
          else
          {
           
            // appRouter.navigate("questionList",
            // {
            //   trigger: true
            // });
            $('#messagepop').text(successMsg); 
            $('#myModalPopup').modal('show');
            $('.okClass').bind('click', self.routepopup);
          }

        },
        error: function(data)
        {
          $('#saveQuestion').removeAttr('disabled');
          var errData = JSON.parse(data.responseText);
          if (errData.question_txt_format)
          {
           
            var failureMsg = JSON.stringify(errData.question_txt_format[0]);
            var errormsg = failureMsg.replace(/\"/g, "");
            $('#form-tabs-t-0').trigger('click');

            $("#question_input_error").html('The Question txt format has already been taken');


          }else{
            errorhandle(data);
            }
        }
      });


      return true;

    }
    else
    {
      return false;
    }


  },
 

  saveQuestion: function(e)
  {
    var self = this;
    e.preventDefault();
   
     if (!this.validateQuestion())
    {
      $('#form-tabs-t-0').trigger('click');
      return false;
    }
    else if (!this.validateQuestionOption())
    {
      $('#form-tabs-t-1').trigger('click');
      return false;
    }
    else if (this.validateDuplicates())
    {
      $('#form-tabs-t-1').trigger('click');
      return false;
    }
    else if (!this.validateKeyAnswers())
    {
      $('#form-tabs-t-2').trigger('click');
      return false;
    }


    var questionType = $('#questionType').val();
   
    if (questionType == 9)
    {
      if (!this.saveMatchTheFollowing())
      {
       
        return false;
      }
      else
      {
        
        return true;
      }
    }
    else if (questionType == 1 || questionType == 3 || questionType == 4)
    {
      if (!this.saveSingleTrueYesSequence())
      {
       
        return false;
      }
      else
      {
        
        return true;
      }

    }
    else if (questionType == 2)
    {
      if (!this.saveMultiple())
      {
       
        return false;
      }
      else
      {
       
        return true;
      }
    }
    else if (questionType == 7)
    {
      if (!this.saveOrdering())
      {
       
        return false;
      }
      else
      {
        
        return true;
      }
    }
    else if (questionType == 6)
    {
      if (!this.saveShortAnswer())
      {
        
        return false;
      }
      else
      {
        
        return true;
      }
    }
    else if (questionType == 5)
    {
      if (!this.saveFillInTheBlanks())
      {
       
        return false;
      }
      else
      {
        
        return true;
      }
    }
    else if (questionType == 8)
    {
      if (!this.saveSequence())
      {
       
        return false;
      }
      else
      {
       
        return true;
      }
    }
     else if (questionType == 10)
    {
      if (!this.savePuzzle())
      {
       
        return false;
      }
      else
      {
        return true;
      }
    }


    // else if(!this.validateQuestion()){
    //     $('#form-tabs-t-0').trigger('click');
    // }else if(!this.validateQuestionOption()){
    //     $('#form-tabs-t-1').trigger('click');
    // }else if(this.validateDuplicates()){
    //     $('#form-tabs-t-1').trigger('click');
    // }else if(!this.validateKeyAnswers()){
    //     $('#form-tabs-t-2').trigger('click');
    // }else if(!this.validateKeyAnswerWithOptions()){
    //        document.getElementById('question_key_answers_error').innerHTML= "Please fill right answer !!";             
    //       $('#form-tabs-t-2').trigger('click');
    // }
    // else { 

    //  }
  },

  cancelCreateQuestionForm: function(e)
  {
    e.preventDefault();
    appRouter.navigate("questionList",
    {
      trigger: true
    });
  },

  addAnswer: function(e)
  {
    e.preventDefault();
   
    var multiSelect = $("#questionType").val();
    var storyboard = $("#questionType").val();
    var answerOption = [];
    $('#optionDiv #plainAnswerdiv input[type="text"]').each(function()
    {
      answerOption.push(
      {
        "question_option_txt": this.value
      });
    });
    for (i = 0; i < answerOption.length; i++)
    {
     
      $('#answerDiv').find("#answeroptiondiv").append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer</label><input id='questionAnswerOption1' class='optionChanged' type='radio' value=" + answerOption[i]['question_option_txt'] + " > <label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>" + answerOption[i]['question_option_txt'] + "</label></div> ");
    }
    // if($('#answerDiv').find('input:text').length < 1){
    //      $('#answerDiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer "+ (this.length2 + 1) +"</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1'  type='text' class='form-control'></div></div>");
    //      this.length2 ++;
    //  } else if((multiSelect == 2) && ($('#answerDiv').find('input:text').length < 5)){
   
    //      $('#answerDiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer "+ (this.length2 + 1) +"</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1'  type='text' class='form-control'></div></div>");
    //      this.length2 ++;
    //  } else if((multiSelect == 2) || ($('#answerDiv').find('input:text').length < 5)){
    //     $( "div.failure").html("Your question type is selectable/choosable , you can not add fields!!");
    //    $( "div.failure" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 ); 
    //  }
    //   else if((storyboard == 5) && ($('#answerDiv').find('input:text').length < 5)){
    
    //      $('#answerDiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer "+ (this.length2 + 1) +"</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1'  type='text' class='form-control'></div></div>");
    //      this.length2 ++;
    //  }

    //  else if((storyboard == 5) || ($('#answerDiv').find('input:text').length < 5)){
    //    $( "div.failure").html("Your question type is selectable/choosable , you can not add fields!!");
    //    $( "div.failure" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 ); 
    //  }
    //  else {
    //     $( "div.failure").html("Your question type is selectable/choosable , you can not add fields!!");
    //     $( "div.failure" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 ); 
    //  }

  },
  removeAnswer: function(e)
  {
    e.preventDefault();

    if ($('#answerDiv').find('input:text').length == 1)
    {
      
      $('#messagepop').text("You can not remove the answer field!!"); 
      $('#myModalPopup').modal('show');

    }
    else
    {
      $('#answerDiv').find('div.form-group').last().remove();
    }
  },
  addOption: function(e)
  {
    e.preventDefault();
    this.redraw = true;
    this.optionEdited = true;
    var yes = $("#questionType").val();
  
    // if ((yes == 3) && $('#optionDiv').find('input:text').length < 3)
    // {
   
    //   $('#optionDiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div></div>");
    //   this.length1++;
    // }
    // else if ((yes == 3) && $('#optionDiv').find('input:text').length > 2)
    // {
    //   $("div.failure").html("Answer option reached the limit.");
    //   $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
    // }
    // else 
    // if ((yes == 4) && $('#optionDiv').find('input:text').length < 3)
    // {
    //   $('#optionDiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div></div>");
    //   this.length1++;
    // }
    // else if ((yes == 4) && $('#optionDiv').find('input:text').length > 2)
    // {
    //   $("div.failure").html("Answer option reached the limit.");
    //   $("div.failure").fadeIn(300).delay(1500).fadeOut(400);
    // }
    // else 
    if ((yes == 8) && $('#sequenceOption').find('div .sa').length < 6)
    {

      $('#sequenceOption').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-2 control-label'>Option</label><div class='col-sm-9 col-md-8' id='ans'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div></div>");
      $('#sequenceAnswer').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Answer</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div></div>");
      this.matchlength++;
      //  sortableSeq();
      //$("#ans").sortable("refresh");
    }
    else if ((yes == 9) && $('#matchOption').find('input:text').length < 6)
    {
      $('#matchOption').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-2 control-label'>Option</label><div class='col-sm-9 col-md-8'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div></div>");
      $('#matchAnswer').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-2 control-label'>Answer</label><div class='col-sm-9 col-md-8'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div></div>");
      this.matchlength++;
    }
    else if ($('#matchOption').find('input:text').length > 6)
    {
      
      $('#messagepop').text("option reached the limit !!"); 
      $('#myModalPopup').modal('show');

    }
    else if ((yes == 7) && ($('#optionDiv').find('#plainAnswerdiv').find('input:text').length < 7))
    {
      $('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option " + (this.length1 + 1) + "</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div></div>");
      this.length1++;
    }
    else if (($('#optionDiv').find('#plainAnswerdiv').find('input:text').length < 7 && this.optionFormat == ''))
    {
      $('#optionDiv').find('#plainAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option " + (this.length1 + 1) + "</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div></div>");
      this.length1++;
    }
    else if (this.optionFormat == 'latex' && this.mathOptionFields.length < 7)
    {
      var self = this;
      var nextElmentNo = this.mathOptionFields.length + 1;
      $('#optionDiv').find('#mathquillAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option " + nextElmentNo + " </label><div class='col-sm-9 col-md-4'><span id='mathOptionSpan" + nextElmentNo + "'  style='width: 100%;'></span></div></div>");
      // this.mathOptionLength ++;          

      var mathOptionSpan = document.getElementById('mathOptionSpan' + nextElmentNo);
     
      // var latexAnswerSpan = document.getElementById('latexAnswerSpan');
      // var MQ = MathQuill.getInterface(2); // for backcompat

      var mathfieldObject = MQ.MathField(mathOptionSpan,
      {
        spaceBehavesLikeTab: false, // configurable
        handlers:
        {
          edit: function()
          { // useful event handlers
            // latexAnswerSpan.textContent = mathAnswerField.latex(); // simple API
           
            self.redraw = true;
            self.optionEdited = true;
          }
        }
      });

      // Make the option <span> as Mathfield and keep it in array for usage
      this.mathOptionFields.push(mathfieldObject);

    
    }
    else if (this.optionFormat == 'chemistry' && this.chemOptionFields.length < 7)
    {
      
      let nextElmentNo = this.chemOptionFields.length + 1;
     
      $('#optionDiv').find('#kekuleAnswerdiv').append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-2 col-md-2 control-label'>Option " + nextElmentNo + " </label><div class='col-sm-9 col-md-6'><div id='chemistryOptionDiv" + nextElmentNo + "' style='border: 2px dashed #ccc;'></div></div></div>");
     
      // let optComposer = new Kekule.Editor.Composer(document.getElementById('chemistryOptionDiv'+nextElmentNo));
      // // this.chemOptionFields.push(new Kekule.Editor.Composer(document.getElementById('chemistryOptionDiv'+nextElmentNo)));
      // // this.chemQuestionViewer.setPredefinedSetting('fullFunc');
      // // this.chemOptionFields[nextElmentNo - 1]
      // optComposer
      //   .setEnableStyleToolbar(true)
      //   .setEnableOperHistory(true)
      //   .setEnableLoadNewFile(true)
      //   .setEnableCreateNewDoc(true)
      //   .setAllowCreateNewChild(true)
      //   .setCommonToolButtons(['undo', 'redo', 'copy', 'cut', 'paste',
      //     'zoomIn', 'reset', 'zoomOut', 'objInspector'])   // create all default common tool buttons
      //   .setChemToolButtons(['manipulate', 'erase', 'bond', 'atom', 'formula',
      //     'ring', 'charge'])   // create only chem tool buttons related to molecule
      //   .setStyleToolComponentNames(['fontName', 'fontSize', 'color',
      //     'textDirection', 'textAlign']);

      // // let mol = new Kekule.Molecule();
      // // optComposer.setChemObj(mol);
      var viewer = makeChemistryViewer('chemistryOptionDiv'+nextElmentNo);
      this.chemOptionFields.push(viewer);
      if (this.questionData && this.questionData.key_answers[0].question_answer_txt)
        this.questionData.key_answers[0].question_answer_txt = undefined;
      // this.chemOptionFields.push(optComposer);
    }
    else
    {
     
      $('#messagepop').text("Answer option reached the limit !!"); 
      $('#myModalPopup').modal('show');
    }
  },
  removeOption: function(e)
  {

    e.preventDefault();
    this.redraw = true;
    this.optionEdited = true;
    var questiontype = $('#questionType').val();
   
    if (questiontype == 8)
    {
      if ($('#sequenceOption').find('input:text').length == 1)
      {
        
        $('#messagepop').text("You reached miminmum answer policy !!"); 
            $('#myModalPopup').modal('show');
      }
      else
      {
        $('#sequenceOption').find('div.form-group').last().remove();
        $('#sequenceAnswer').find('div.form-group').last().remove();

      }
    }
    else if (questiontype == 9)
    {
      if ($('#matchOption').find('input:text').length == 1)
      {
        
        $('#messagepop').text("You reached miminmum answer policy !!"); 
        $('#myModalPopup').modal('show');

      }
      else
      {
        $('#matchOption').find('div.form-group').last().remove();
        $('#matchAnswer').find('div.form-group').last().remove();
      }
    }
    else
    {
      
      if (this.optionFormat == 'chemistry' && this.chemOptionFields.length > 1)
      {
        $('#optionDiv').find('#kekuleAnswerdiv').find('div.form-group').last().remove();
        this.chemOptionFields.pop();
        if (this.questionData && this.questionData.key_answers[0].question_answer_txt)
          this.questionData.key_answers[0].question_answer_txt = undefined;
       
      }      
      else if (this.optionFormat == 'latex' && this.mathOptionFields.length > 1)
      {
        $('#optionDiv').find('#mathquillAnswerdiv').find('div.form-group').last().remove();
        this.mathOptionFields.pop();
       
      }
      else if (this.optionFormat == '' && $('#optionDiv').find('#plainAnswerdiv').find('input:text').length > 1)
      {
        $('#optionDiv').find('#plainAnswerdiv').find('div.form-group').last().remove();
        this.length1--;
      }
      else
      {
        
        $('#messagepop').text("You reached miminmum answer policy !!"); 
        $('#myModalPopup').modal('show');
      }
    }

  },

  addBlankOption: function(e)
  {
    e.preventDefault();
    this.redraw = true;
    this.optionEdited = true;
    var targetDiv = $(e.target).attr('name');
   
    if ($('#' + targetDiv).find('input:text').length > 6)
    {
      
      $('#messagepop').text("option reached the limit."); 
      $('#myModalPopup').modal('show');
    }
    else if ($('#' + targetDiv).find('input:text').length < 7)
    {
      $('#' + targetDiv).append("<div class='form-group'><label for='txtFirstNameBilling' class='col-sm-3 col-md-4 control-label'>Option " + (this.blankOptions[targetDiv] + 1) + "</label><div class='col-sm-9 col-md-4'><input id='questionAnswerOption1' type='text' class='form-control optionChanged'></div></div>");
      this.blankOptions[targetDiv]++;
    }
  },

  removeBlankOption: function(e)
  {
    e.preventDefault();
    this.redraw = true;
    this.optionEdited = true;
    var targetDiv = $(e.target).attr('name');
    if ($('#' + targetDiv).find('input:text').length == 1)
    {
      
      $('#messagepop').text("You reached miminmum answer policy !!"); 
      $('#myModalPopup').modal('show');
    }
    else
    {
      $('#' + targetDiv).find('div.form-group').last().remove();
      this.blankOptions[targetDiv]--;
    }

  },


  validateQuestion: function(e)
  {
    var questiontype = $('#questionType').val();
    document.getElementById("client_not_select_error").innerHTML = "";
    document.getElementById("category_not_select_error").innerHTML = "";
    document.getElementById("subject_not_select_error").innerHTML = "";
    document.getElementById("topic_not_select_error").innerHTML = "";
    document.getElementById("question_input_error").innerHTML = "";
    document.getElementById("question_type_not_select_error").innerHTML = "";
    document.getElementById("complexity_not_select_error").innerHTML = "";
    document.getElementById("descriptive_not_select_error").innerHTML = "";
    document.getElementById("total_mark_input_error").innerHTML = "";
    document.getElementById("negative_mark_input_error").innerHTML = "";
    document.getElementById("weightage_input_error").innerHTML = "";

     var regex=/[0-9]/;

    if (!validateSelect($('#questionClient').val().trim()))
    {
      $('#questionClient').focus();
      document.getElementById('client_not_select_error').innerHTML = "Please select a client";
      return false;
    }

    if (!validateSelect($('#questionCategory').val().trim()))
    {
      $('#questionCategory').focus();
      document.getElementById('category_not_select_error').innerHTML = "Please select a category";
      return false;
    }

    if (!validateSelect($('#questionSubject').val()))
    {
      $('#questionSubject').focus();
      document.getElementById('subject_not_select_error').innerHTML = "Please select a subject";
      return false;
    }

    // if (!validateSelect($('#questionTopic').val())) {
    //   $('#questionTopic').focus();
    //   document.getElementById('topic_not_select_error').innerHTML= "Please select a topic";             
    //   return false;
    // }

    if (!validateSelect($('#questionType').val().trim()))
    {
      $('#questionType').focus();
      document.getElementById('question_type_not_select_error').innerHTML = "Please select a question type";
      return false;
    }

    if (!validateSelect($('#questionComplexity').val().trim()))
    {
      $('#questionComplexity').focus();
      document.getElementById('complexity_not_select_error').innerHTML = "Please select a question complexity";
      return false;
    }

    if (!$('input[name=questionDescriptive]:checked').val())
    {
      $('#questionDescriptive').focus();
      document.getElementById('descriptive_not_select_error').innerHTML = "Please select a question descriptive";
      return false;
    }

    if (!regex.test($('#questionTotalMark').val()))
    {
      $('#questionTotalMark').focus();
      document.getElementById('total_mark_input_error').innerHTML = "Please provide total mark";
      return false;
    }

    if (!validatePositiveNumber($('#questionNegativeMark').val()))
    {
      $('#questionNegativeMark').focus();
      document.getElementById('negative_mark_input_error').innerHTML = "Please provide valid negative mark [examble >0]";
      return false;
    }

    if (!validatePositiveNumber($('#questionWeightage').val()))
    {
      $('#questionWeightage').focus();
      document.getElementById('weightage_input_error').innerHTML = "Please provide weightage";
      return false;
    }
      
    if (this.questionFormat == '' && !validateTextArea($('#questionText').val().trim()))
    {
      if(questiontype != 10){
        $('#questionText').focus();
        document.getElementById('question_input_error').innerHTML = "Please provide a question";
        return false;
      }
      else
      {
        $('#questionText').val('Solve the puzzle. Find instructions below the puzzle.').trim();
      }

    }
    
    console.log(this.mathQuestionFields);

    if (this.questionFormat == 'latex') //&& $('#mquill:empty').length > 0) //~~~ also check for empty mathfields
    {
      if ($.isEmptyObject(this.mathQuestionFields))
      {
        if ($('#mathquill').text().trim().length == 0)
        {
         
          document.getElementById('question_input_error').innerHTML = "Please provide a question";
          return false;
        }
        return true;
      }
      else
      {
        var flag = true;
        $.each(this.mathQuestionFields, function(id, obj)
        {
          if (obj.latex() == '')
          {
           
            // $('#'+id).focus();
            document.getElementById('question_input_error').innerHTML = "Please enter math question";
            // obj.focus();
            flag = false;
            return false
          }
        });
        return flag;
      }

    }
    else if (this.questionFormat == 'chemistry')
    {
     
      if (this.chemQuestionViewer.getChemObj().getChildCount() == 0)
      {
        document.getElementById('question_input_error').innerHTML = "Please enter chemistry question";
        return false;
      }
      return true;
    }    

    // if (this.questionFormat == 'latex' )//&& $('#mquill:empty').length > 0) //~~~ also check for empty mathfields
    // {
    
    //   divHtml = $('#mathquill').html();
    
    //   checkEmpty = divHtml.replace(' ', '').replace('<br>', '');
    //   if(checkEmpty.length == 0){
    //     $('#mathquill').focus();
    //     document.getElementById('question_input_error').innerHTML= "Please provide a question";             
    //     return false; 
    //   }       
    // }


    return true;
  },

  validateQuestionOption: function()
  {

    document.getElementById("question_answers_error").innerHTML = "";
    var flag = true;
    var questiontype = $('#questionType').val();
    if (questiontype == 9)
    {
      $('#matchOption input[type="text"]').each(function()
      {
        if (!validateTextArea(this.value.trim()))
        {
          $('#matchOption input[type="text"]').focus();
          $('#matchOption').find('#question_answers_error').text("Please fill all fields (or) Remove unnecessary fields!!");
          flag = false;

        }
      });
      $('#matchAnswer input[type="text"]').each(function()
      {
        if (!validateTextArea(this.value.trim()))
        {
          $('#matchAnswer input[type="text"]').focus();
          $('#matchOption').find('#question_answers_error').text("Please fill all fields (or) Remove unnecessary fields!!");
          flag = false;

        }
      });
    }
    else if (questiontype == 5)
    {
     
      var blanksArray = Object.keys(this.blankOptions);
      $.each(blanksArray, function(i, val)
      {
        optionBuffer = "";
        $('#' + val + ' input[type="text"]').each(function()
        {
          if (!validateTextArea(this.value.trim()))
          {
            $('#' + val + ' input[type="text"]').focus();
            $('#' + val).find('#question_answers_error').text("Please fill all fields (or) Remove unnecessary fields!!");
            flag = false;
          }
        });

      });
    }
    else if (questiontype == 8)
    {
     
      $('#sequenceOption input[type="text"]').each(function()
      {
        if (!validateTextArea(this.value.trim()))
        {
          $('#sequenceOption input[type="text"]').focus();
          $('#sequenceOption').find('#question_answers_error').text("Please fill all fields (or) Remove unnecessary fields!!");
          flag = false;

        }
      });
      $('#sequenceAnswer input[type="text"]').each(function()
      {
        if (!validateTextArea(this.value.trim()))
        {
          $('#sequenceAnswer input[type="text"]').focus();
          $('#sequenceOption').find('#question_answers_error').text("Please fill all fields (or) Remove unnecessary fields!!");
          flag = false;

        }
      });
    }
    else
    {
      if (this.optionFormat == '')
      {
        $('#optionDiv #plainAnswerdiv input[type="text"]').each(function()
        {
          if (!validateTextArea(this.value.trim()))
          {
            $('#optionDiv #plainAnswerdiv input[type="text"]').focus();
            document.getElementById('question_answers_error').innerHTML = "Please fill all fields (or) Remove unnecessary fields!!";
            flag = false;

          }
        });
      }
      else if (this.optionFormat == 'latex')
      {
        $.each(this.mathOptionFields, function(i, opt)
        {
          if (opt.latex() == '')
          {
            document.getElementById('question_answers_error').innerHTML = "Please fill all fields (or) Remove unnecessary fields!!";
            flag = false;
          }
        });
      }
      else if (this.optionFormat == 'chemistry')
      {
        var backref = this;
        $.each(this.chemOptionFields, function(i, opt)
        {
         
          // if (opt.exportObjs(Kekule.Molecule).length == 0)
          if (opt.getChemObj().isEmpty && opt.getChemObj().isEmpty())
          {
            document.getElementById('question_answers_error').innerHTML = "Please fill all fields (or) Remove unnecessary fields!!";
            flag = false;
           
          }
        
          if (!backref.optionEdited && this.rendered && opt.getComposerDialog().getComposer().isDirty())
          {
            backref.redraw = true;
            backref.optionEdited = true;
          }
        });
      }

    }
    
    return flag;
  },

  validateDuplicates: function()
  {
    var values = [];
   
    document.getElementById("question_answers_error").innerHTML = "";
    var isDuplicated = false;
    if (this.optionFormat == '')
    {
      
      $('#optionDiv #plainAnswerdiv input[type="text"]').each(function()
      {
        if (values.indexOf(this.value) !== -1)
        {
          isDuplicated = true;
          document.getElementById("question_answers_error").innerHTML = "Please provide different option";

          return false;
        }
        values.push(this.value);
      });
    }
    else if (this.optionFormat == 'latex')
    {

      $.each(this.mathOptionFields, (function(i, opt)
      {
        if (values.indexOf(opt.latex()) !== -1)
        {
          isDuplicated = true;
          document.getElementById("question_answers_error").innerHTML = "Please provide different option";
          return false;
        }
        values.push(opt.latex());
      }));    
    }
    else if (this.optionFormat == 'chemistry')
    {
      // ~~~ need to implement
    }
    return isDuplicated;
  },

  validateKeyAnswers: function()
  {

    var flag = true;
    var questiontype = $('#questionType').val();
    if (questiontype == 1 || questiontype == 3 || questiontype == 4 || questiontype == 8)
    {
 
        // if (!this.rendered)
      if (this.mode == 'edit' && !this.optionEdited && !this.rendered)
      {
        if (this.questionData == undefined || !this.questionData || this.questionData.key_answers[0].question_answer_txt == undefined || !this.questionData.key_answers[0].question_answer_txt)
        {
         
          $('#form-tabs-t-2').trigger('click');
          document.getElementById("question_key_answers_error").innerHTML = "Please select the answer";
          flag = false;
        }
      }
      else
      {
       
        if (this.optionEdited && this.redraw)
        {
          document.getElementById("question_key_answers_error").innerHTML = "Please select the answer";
          flag = false; 
        }
        else
        {
          if (this.optionFormat != 'chemistry' && $('#answeroptiondiv input[type="radio"]').is(':checked'))
          {
            flag = true;
          }

          else if (this.optionFormat == 'chemistry' && $('#chemistryOptionDiv input[type="radio"]').is(':checked'))
          {
            flag = true;
          }
          else
          {
            document.getElementById("question_key_answers_error").innerHTML = "Please select the answer";
            flag = false;
          }          
        }

      }
      
    }

    if(questiontype == 7 ){
      if (this.mode == 'edit' && !this.optionEdited && !this.rendered)
      {
        if (this.questionData == undefined || !this.questionData || this.questionData.key_answers[0].question_answer_txt == undefined || !this.questionData.key_answers[0].question_answer_txt)
        {
         
          $('#form-tabs-t-2').trigger('click');
          document.getElementById("question_key_answers_error").innerHTML = "Please drag the answer";
          flag = false;
        }
      }else{
        if (this.optionEdited && this.redraw)
        {
          document.getElementById("question_key_answers_error").innerHTML = "Please drag the answer";
          flag = false; 
        } else {
          flag = true;
        }
        }
      
    }
    if (questiontype == 2)
    {
      
      if (this.mode == 'edit' && !this.optionEdited && !this.rendered)
      {
        if (this.questionData == undefined || !this.questionData || this.questionData.key_answers[0].question_answer_txt == undefined || !this.questionData.key_answers[0].question_answer_txt)
        {
          
          $('#form-tabs-t-2').trigger('click');
          document.getElementById("question_key_answers_error").innerHTML = "Please select the answer";
          flag = false;
        }
      }
      else
      {
        if (this.optionEdited && this.redraw)
        {
          document.getElementById("question_key_answers_error").innerHTML = "Please select the answer";
          flag = false; 
        }
        else
        {
          // if ($('#answerDiv input[type="checkbox"]').is(':checked'))
          // {
          //   flag = true;
          // }
         
          if (this.optionFormat != 'chemistry' && $('#answeroptiondiv input[type="checkbox"]').is(':checked'))
          {
            flag = true;
          }

          else if (this.optionFormat == 'chemistry' && $('#chemistryOptionDiv input[type="checkbox"]').is(':checked'))
          {
            flag = true;
          }

          else
          {
            document.getElementById("question_key_answers_error").innerHTML = "Please select the answer";
            flag = false;
          }
         
        }        
      }
    }
    if (questiontype == 6)
    {
      var ques6 = $('textarea#questionAnswerOption1').val();
     
      if (!this.rendered)
      {
        if (this.questionData.key_answers[0].question_answer_txt == null || this.questionData.key_answers[0].question_answer_txt == undefined || this.questionData.key_answers[0].question_answer_txt == '')
        {
         
          $('#form-tabs-t-2').trigger('click');
          flag = false;
        }
      }
      else
      {
        if (!validateTextArea(ques6.trim()))
        {
          document.getElementById("question_key_answers_error").innerHTML = "Please Enter the answer";
          $('textarea#questionAnswerOption1').focus();
          flag = false;
        }
        else
        {
          flag = true;
        }
      }


    }
    if (questiontype == 9)
    {
     
      if (this.mode == 'edit' && !this.optionEdited)
      {
        if (this.questionData.key_answers[0].question_answer_txt == null || this.questionData.key_answers[0].question_answer_txt == undefined || this.questionData.key_answers[0].question_answer_txt == '')
        {
          
          $('#form-tabs-t-2').trigger('click');
          flag = false;
        }
      }
      else
      {
         if (this.optionEdited && this.redraw){
     
            document.getElementById("question_key_answers_error").innerHTML = "Please Drag the answer";
            flag = false;
         }else {
           $('#matchAnswerDiv').find('.row').each(function()
          {

            var ques9 = $(this).find('#matchansweroptiondiv #questionAnswerOptionMatch1').val();
            var quesone9 = $(this).find('#matchansOption').text();
            
            if (ques9 == '')
            {
                
              document.getElementById("question_key_answers_error").innerHTML = "Please Drag the answer";
              flag = false;
              return false;
            }
            // else if (!validateTextArea(quesone9.trim()))
            // {
            
            //   document.getElementById("question_key_answers_error").innerHTML = "Please Drag the answer";
            //   flag = false;
            //   return false;
            // }
            else
            {

              flag = true;
            }
          });
         }
       
       
      }

    }
   
    return flag;
  },


  validateKeyAnswerWithOptions: function()
  {

    document.getElementById("question_key_answers_error").innerHTML = "";
    var flag = false;


    $('#optionDiv #plainAnswerdiv input[type="text"]').each(function()
    {
      flag = true;
    });
    return flag;
  },


UploadImage:function(e){
  var self = this;
e.preventDefault();
$('#answerDiv').remove();
$('#matchAnswerDiv').remove();
$('#finalDiv').remove();
 this.fileName = e.target.files[0].name; 
 var fileNameArray = this.fileName.split('.');
 if(fileNameArray[1] == 'png'){
  
var image = new Image();
image.src = URL.createObjectURL(e.target.files[0]);


 var context = document.getElementById('puzzle').getContext('2d');
  var c=document.getElementById("puzzle1");
    var ctx=c.getContext("2d");
var boardSize = document.getElementById('puzzle').width;
var tileCount = 3;
var tileSize = boardSize / tileCount;

var clickLoc = new Object;
clickLoc.x = 0;
clickLoc.y = 0;

var emptyLoc = new Object;
emptyLoc.x = 0;
emptyLoc.y = 0;

var solved = false;

var boardParts;
setBoard();
context.canvas.width = 480;
context.canvas.height = 480;
ctx.canvas.width = 480;
ctx.canvas.height = 480;
image.addEventListener('load', drawTiles, false);
function setBoard() {
  boardParts = new Array(tileCount);
  for (var i = 0; i < tileCount; ++i) {
    boardParts[i] = new Array(tileCount);
    for (var j = 0; j < tileCount; ++j) {
      boardParts[i][j] = new Object;
      boardParts[i][j].x = (tileCount - 1) - i;
      boardParts[i][j].y = (tileCount - 1) - j;
    }
  }
  emptyLoc.x = boardParts[tileCount - 1][tileCount - 1].x;
  emptyLoc.y = boardParts[tileCount - 1][tileCount - 1].y;
  solved = false;
}

function drawTiles() {
  context.clearRect ( 0 , 0 , boardSize , boardSize );
  ctx.clearRect ( 0 , 0 , boardSize , boardSize );
  for (var i = 0; i < tileCount; ++i) {
    for (var j = 0; j < tileCount; ++j) {
      var x = boardParts[i][j].x;
      var y = boardParts[i][j].y;
      //if(i != emptyLoc.x || j != emptyLoc.y || solved == true) {
        context.drawImage(image, x * tileSize, y * tileSize, tileSize, tileSize,
            i * tileSize, j * tileSize, tileSize, tileSize);
     // }
    }
  }
  ctx.drawImage(image,0,0,480,480); 
}

function distance(x1, y1, x2, y2) {
  return Math.abs(x1 - x2) + Math.abs(y1 - y2);
}
  
 }else{
  alert("Please Upload Image Only");
 }
},
 routepopup: function(){
    $('.modal-backdrop').remove(); 
   
     appRouter.navigate("questionList", {trigger: true});

  },

  uploadPuzzleImage: function(e)
  {
    var self = this;
    e.preventDefault();
    $('#answerDiv').remove();
    $('#matchAnswerDiv').remove();
    $('#finalDiv').remove();
    console.log(e.target.files[0]);
    this.fileName = e.target.files[0].name; 
    var fileNameArray = this.fileName.split('.');
    console.log(this.fileName);
    if(fileNameArray[1] == 'png' || fileNameArray[1] == 'jpg' || fileNameArray[1] == 'jpeg' ){
        
        var image = new Image();
        image.src = URL.createObjectURL(e.target.files[0]);    
    }
    else
    {
      console.log('invalid format');
    }
  },
  questionClientFocus: function() {
     $('#client_not_select_error').html("");
   },

  questionCategoryFocus: function()
  {
    $('#category_not_select_error').html("");
  },

  questionSubjectFocus: function()
  {
    $('#subject_not_select_error').html("");
  },

  questionTopicFocus: function()
  {
    $('#topic_not_select_error').html("");
  },

  questionTextFocus: function()
  {
    $('#question_input_error').html("");
  },

  questionTypeFocus: function()
  {
    $('#question_type_not_select_error').html("");
  },
  questionComplexityFocus: function()
  {
    $('#complexity_not_select_error').html("");
  },
  questionTotalMarkFocus: function()
  {
    $('#total_mark_input_error').html("");
  },
  questionDescriptiveFocus: function()
  {
    $('#descriptive_not_select_error').html("");
  },

  questionNegativeMarkFocus: function()
  {
    $('#negative_mark_input_error').html("");
  },

  questionWeightageFocus: function()
  {
    $('#weightage_input_error').html("");
  },
  optionDivInputFocus: function()
  {
    $('#question_answers_error').html("");
  },

  answerDivInputFocus: function()
  {
    $('#question_key_answers_error').html("");
  },
  focustextarea: function()
  {
    $('#question_key_answers_error').html('');
  },

  //  allowDrop : function(ev) {
  //     ev.preventDefault();
  //  },

  //   drag : function(ev) {
  //     ev.dataTransfer.setData("text", ev.target.id);
  //  },

  // drop : function(ev) {
  //     ev.preventDefault();
  //     var data = ev.dataTransfer.getData("text");
  //     alert(data);
  //     ev.target.appendChild(document.getElementById(data));
  //  }
  optionChange: function(e)
  {
   
    this.redraw = true;
    this.optionEdited = true;
   
  },

  showPopup : function(){
      $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModal1').modal('toggle');
    $('#imageupload').hide();
      $('#pix').hide();
      $('#questionText').show();
      $('#puzzle').hide();
      $('#puzzle1').hide();
      $('#form-tabs-t-1').show();
      $('#form-tabs-t-2').show();
      $('#otherType').hide();
      $('#addOption').hide();
      $('#removeOption').hide();
      $('#sequenceRow').hide();
      $('#fillIntheBlanks').show();
      $('#qnformat_links').hide();
      $('#instruction').hide();
      $('#latex_instruction').hide();
      $('#questionText').show();
      $('#mathquill').hide();
  }



});