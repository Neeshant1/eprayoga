var user = user || {};

user.UserRenderingQuestionTableView = Backbone.View.extend(
{


  initialize: function(options)
  {
    var self = this;
    this.pageNo = 1;
    this.recIndex = 1;
    this.current_page = 1;
    this.collection = new user.UserRenderQuestionCollection();
    offset = 0;
    this.unanswerquestion = [];
    this.reviewquestion = [];
    this.reviewPagination = [];
    this.confirmquestionPagination = [];
    this.confirmquestionone = [];
    this.paginationNO = 1;
    this.k = 1;
    this.setPage = 0;
    //this.firstRender = false;
    this.orderdetail = user.orderdetail;
    // this.$el.html(options.template);
    this.collection.fetch(
    {
      protocol: 'ws',
      operation: 'queryQBank', // queryQBank, showResult, confirm
      reset: true,
      data:
      {
        order_detail_id: this.orderdetail.attributes.order_detail_id,
        product_catalog_id: this.orderdetail.attributes.product_catalog_id,
        exam_schedule_id: this.orderdetail.attributes.exam_schedule_id,
        category_id: this.orderdetail.attributes.category_id,
        subject_id: this.orderdetail.attributes.subject_id,
        topic_id: this.orderdetail.attributes.topic_id,
        user_profile_id: this.orderdetail.attributes.user_profile_id,
        // promo_master_id: this.orderdetail.attributes.prom_id,
        //  type:  'direct',  // direct, promo
        // payment_ref_no: 1,
        // client_id: 1,
        //   exam_trans_ref_no: 'MATH000001',
        examFlow: this.orderdetail.attributes.examstatus, //start, restart
      },
      success: function(data)
      {
       
        if (data.length > 0)
        {
          self.$el.html(options.template);
          $('#preloader').fadeIn('fast');
          $('#preloader').fadeOut(2000);
          self.catSubTop();
          self.render();
          self.renderingPagination();
        }
        else
        {
          var tpl = _.template($('#messageTpl').html());
          $('#page-section').append(tpl);
          $('#preloader').fadeIn('fast');
          $('#preloader').fadeOut(2000);
        }


      },
      error: function(data)
      {
        errorhandle(data);

      }
    });

  },

  events:
  {
    'click #next_question': 'renderNextQuestion',
    'click #previous_question': 'renderPreviousQuestion',
    'click #clear_question': 'renderClearQuestion',
    'click #renderIndexList': 'renderIndexList',
    'click #review_question': "reviewQuestion",
    'click #question_confirm': "confirmQuestion",
    'click #PreviousPagination': 'renderingPreviousPage',
    'click #NextPagination': 'renderingNextPage',
    'click #completed_question': 'renderingCompletedQuestion',
    'click #submitTest': 'completedexam',
    'click #close_popup': 'closePopup',
    'click #completeExam': 'completeExam',
    'click #Stay_page': 'staypage',
    'click #SubmitExam': 'SubmitExam',

  },
  render: function()
  {

    $('#sticker').hide();
    $('#flashmessage').hide();
    $('#timeElapsed').text(user.orderdetail.attributes.time_elapsed + " Minutes");
    $('#previous_question').attr("disabled", "disabled");
    $('#totalques').html(this.collection.length);
    tmpvalue = 1;
    this.collection.each(function(item)
    {
      var question = item.get('question_txt_format');
      var option = item.get('question_option_txt');
      var splitArray = option.split(OPTION_GROUP_SEPERATOR);
      item.set('question_option_txt', splitArray);
      if (item.get('question_answer_txt') != null)
      {
        item.set(
        {
          'pagination_desc': tmpvalue
        });
      }
      tmpvalue++;
    });
    this.renderIndexQuestionItem();
    return this;
  },
  renderIndexQuestionItem: function()
  {

    var self = this;
    index = this.recIndex;
    var mainIndex = this.collection.at(index - 1);
    mainIndex = new Backbone.Collection(mainIndex);
    mainIndex.each(function(item)
    {
      item.set(
      {
        'description': index
      });
      att = item.attributes;

    });
    // var tpl = _.template($('#renderAllquestionTemplate').html());
    // $('#renderQuestionList').append(tpl(att));
    self.renderQuestionItem(att);
    return this;
  },
  renderQuestionItem: function(item)
  {

    var questionItemView = new user.UserRenderQuestionRowView(
    {
      model: item
    });
    $('#renderQuestionList').append(questionItemView.render().el);

    var qid = $('#optiondisplay1 li input').attr('id');
    var revindex = this.reviewquestion.indexOf(att.question_id);
    var clearCheck = this.confirmquestionone.indexOf(att.question_id);
    if (revindex != -1)
    {
      $('#review_question').text("UnReview");
    }
    if (revindex == -1)
    {
      $('#review_question').text("Review");
    }
    this.currentQuestionItem = questionItemView;
    // if(clearCheck != -1){
    //       $('#clear_question').attr("disabled", "disabled");
    // } if(clearCheck == -1){
    //       $('#clear_question').removeAttr("disabled");
    // }

  },
  renderNextQuestion: function()
  {

    if ((att.question_type_id == 1) || (att.question_type_id == 2) || (att.question_type_id == 3) || (att.question_type_id == 4) || (att.question_type_id == 8))
    {
      var qid = $('#optiondisplay1 li input').attr('id');
      var len = $('#optiondisplay1 li').find('#' + qid + ':checked').length;

      if (len == 0)
      {
        var unansindex = this.unanswerquestion;
        unansindex = unansindex.indexOf(qid);
        if (unansindex == -1)
        {
          this.unanswerquestion.push(qid);
          $('#renderIndexList li').find('a#' + this.recIndex).css('color', '#D3D3D3');
        }

        //$('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
      }
      if (len >= 1)
      {
        // $('#questionView').find('#Unanswered').html(this.unanswerquestion.length); 
      }
      if (this.recIndex <= this.collection.length)
      {
        this.recIndex++;
      }
      if (this.recIndex >= this.collection.length)
      {
        this.recIndex = this.collection.length;
      }

      $('#renderQuestionList').empty();
      $('#previous_question').removeAttr("disabled");
      if (this.recIndex == this.collection.length)
      {
        $('#next_question').attr("disabled", "disabled");
      }


      this.renderIndexQuestionItem();

    }
    else if (att.question_type_id == 5)
    {
      var self = this;
      $('#optiondisplay3 :selected').each(function()
      {
        lenfill = $(this).val();

      });
      if (lenfill == "--Please Select--")
      {
        var unansindex = this.unanswerquestion;
        unansindex = unansindex.indexOf(att.question_id);
        if (unansindex == -1)
        {
          this.unanswerquestion.push(att.question_id);
          $('#renderIndexList li').find('a#' + this.recIndex).css('color', '#D3D3D3');
        }

        // $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
      }
      if (lenfill >= 1)
      {
        //  $('#questionView').find('#Unanswered').html(this.unanswerquestion.length); 
        console.log("lenght");
      }

      if (this.recIndex <= this.collection.length)
      {
        this.recIndex++;
      }
      if (this.recIndex >= this.collection.length)
      {
        this.recIndex = this.collection.length;
      }
      $('#renderQuestionList').empty();
      $('#previous_question').removeAttr("disabled");
      if (this.recIndex == this.collection.length)
      {
        $('#next_question').attr("disabled", "disabled");
      }
      this.renderIndexQuestionItem();

    }
    else if (att.question_type_id == 6)
    {
      var question_answer = '';
      question_answer = $('#a' + att.question_id).val();

      att.question_answer_txt = question_answer;
      var qid1 = $('#optiondisplay1 li textarea').attr('id');
      var len1 = $('#optiondisplay1 li').find('#' + qid1).val().length;

      if (len1 == 0)
      {
        var unansindex = this.unanswerquestion;
        unansindex = unansindex.indexOf(att.question_id);
        if (unansindex == -1)
        {
          this.unanswerquestion.push(att.question_id);
          $('#renderIndexList li').find('a#' + this.recIndex).css('color', '#D3D3D3');
        }

        //$('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
      }
      if (len1 >= 1)
      {
        //$('#questionView').find('#Unanswered').html(this.unanswerquestion.length); 
        console.log("lenght");
      }
      if (this.recIndex <= this.collection.length)
      {
        this.recIndex++;
      }
      if (this.recIndex >= this.collection.length)
      {
        this.recIndex = this.collection.length;
      }
      $('#renderQuestionList').empty();
      $('#previous_question').removeAttr("disabled");
      if (this.recIndex == this.collection.length)
      {
        $('#next_question').attr("disabled", "disabled");
      }

      this.renderIndexQuestionItem();

    }
    else if (att.question_type_id == 7)
    {
      if (att.question_answer_txt == null)
      {
        var unansindex = this.unanswerquestion;
        unansindex = unansindex.indexOf(att.question_id);
        if (unansindex == -1)
        {
          this.unanswerquestion.push(att.question_id);
          $('#renderIndexList li').find('a#' + this.recIndex).css('color', '#D3D3D3');
        }

        // $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
      }

      if (this.recIndex <= this.collection.length)
      {
        this.recIndex++;
      }
      if (this.recIndex >= this.collection.length)
      {
        this.recIndex = this.collection.length;
      }
      $('#renderQuestionList').empty();
      $('#previous_question').removeAttr("disabled");
      if (this.recIndex == this.collection.length)
      {
        $('#next_question').attr("disabled", "disabled");
      }

      this.renderIndexQuestionItem();

    }
    else if (att.question_type_id == 9)
    {

      var length = $('#matchansOption').find('.opdiv').text().length;

      var skip = 0;
      if (att.question_answer_txt == null)
      {
        var unansindex = this.unanswerquestion;
        unansindex = unansindex.indexOf(att.question_id);
        if (unansindex == -1)
        {
          this.unanswerquestion.push(att.question_id);
          $('#renderIndexList li').find('a#' + this.recIndex).css('color', '#D3D3D3');
        }

        // $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
      }
      if (att.question_answer_txt != null)
      {
        skip = 1;
        $('#optiondisplay1').find('.row').each(function()
        {
          var matchAnswer = $(this).find('#matchansOption').text();
          if (matchAnswer == "" || matchAnswer.length <= 1)
          {
            skip = 0;
            //alert('please enter all answer');
            $('#showalert').text("Please Drag the answer");
            $('#myModal1').modal('show');

          }
        });
        if (skip != 0)
        {
          var keyAnswerJson = '';
          $('#optiondisplay1').find('.row').each(function()
          {
            var matchOption = $(this).find('#matchansweroptiondiv #questionAnswerOptionMatch1').val();
            var matchAnswer = $(this).find('#matchansOption').text();
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
          att.question_answer_txt = keyAnswerJson;
          // $('#questionView').find('#Unanswered').html(this.unanswerquestion.length); 

        }
      }
      if (this.recIndex <= this.collection.length)
      {
        this.recIndex++;
      }
      if (this.recIndex >= this.collection.length)
      {
        this.recIndex = this.collection.length;
      }
      $('#renderQuestionList').empty();
      $('#previous_question').removeAttr("disabled");
      if (this.recIndex == this.collection.length)
      {
        $('#next_question').attr("disabled", "disabled");
      }

      this.renderIndexQuestionItem();
    }
    else if (att.question_type_id == 10)
    {
      console.log(this.currentQuestionItem.puzzle.isSnapped);
      if (att.question_answer_txt == null)
      {
        var unansindex = this.unanswerquestion;
        unansindex = unansindex.indexOf(att.question_id);
        if (unansindex == -1)
        {
          this.unanswerquestion.push(att.question_id);
          $('#renderIndexList li').find('a#' + this.recIndex).css('color', '#D3D3D3');
        }

        // $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
      }
      if (typeof(this.currentQuestionItem.puzzle) !== 'undefined'  && this.currentQuestionItem.puzzle.isSnapped)
      {
        console.log('chaning config in next');
        att.question_answer_txt = this.getPuzzleConfig();
        this.currentQuestionItem.puzzle.isSnapped = false;
      }        
      
      if (this.recIndex <= this.collection.length)
      {
        this.recIndex++;
      }
      if (this.recIndex >= this.collection.length)
      {
        this.recIndex = this.collection.length;
      }
      $('#renderQuestionList').empty();
      $('#previous_question').removeAttr("disabled");
      if (this.recIndex == this.collection.length)
      {
        $('#next_question').attr("disabled", "disabled");
      }

      this.renderIndexQuestionItem();

    }

  },
  renderPreviousQuestion: function()
  {
        console.log('rendering prev question');

    if ((att.question_type_id == 1) || (att.question_type_id == 2) || (att.question_type_id == 3) || (att.question_type_id == 4) || (att.question_type_id == 8))
    {
      var qid = $('#optiondisplay1 li input').attr('id');
      var len = $('#optiondisplay1 li').find('#' + qid + ':checked').length;
      if (len == 0)
      {
        var unansindex = this.unanswerquestion;
        unansindex = unansindex.indexOf(qid);
        if (unansindex == -1)
        {
          this.unanswerquestion.push(qid);
        }


        //$('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
        --this.recIndex;
        $('#renderQuestionList').empty();
        $('#next_question').removeAttr("disabled");
        if (this.recIndex == 1)
        {
          $('#previous_question').attr("disabled", "disabled");
        }

        this.renderIndexQuestionItem();
      }

    }
    else if (att.question_type_id == 5)
    {
      var self = this;
      $('#optiondisplay3 :selected').each(function()
      {
        lenfill = $(this).val();

      });
      if (lenfill == "--Please Select--")
      {
        var unansindex = this.unanswerquestion;
        unansindex = unansindex.indexOf(att.question_id);
        if (unansindex == -1)
        {
          this.unanswerquestion.push(att.question_id);
          $('#renderIndexList li').find('a#' + this.recIndex).css('color', '#D3D3D3');
        }

        //  $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
      }
      if (lenfill >= 1)
      {
        //    $('#questionView').find('#Unanswered').html(this.unanswerquestion.length); 
        console.log("lenght");
      }

      --this.recIndex;
      $('#renderQuestionList').empty();
      $('#next_question').removeAttr("disabled");
      if (this.recIndex == 1)
      {
        $('#previous_question').attr("disabled", "disabled");
      }
      this.renderIndexQuestionItem();

    }
    else if (att.question_type_id == 6)
    {
      var question_answer = '';
      question_answer = $('#a' + att.question_id).val();
      att.question_answer_txt = question_answer;
      var qid1 = $('#optiondisplay1 li textarea').attr('id');
      var len1 = $('#optiondisplay1 li').find('#' + qid1).val().length;
      if (len1 == 0)
      {
        var unansindex = this.unanswerquestion;
        unansindex = unansindex.indexOf(att.question_id);
        if (unansindex == -1)
        {
          this.unanswerquestion.push(att.question_id);
        }
        // $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
        --this.recIndex;
        $('#renderQuestionList').empty();
        $('#next_question').removeAttr("disabled");
        if (this.recIndex == 1)
        {
          $('#previous_question').attr("disabled", "disabled");
        }

        this.renderIndexQuestionItem();
      }

    }
    else if (att.question_type_id == 7)
    {
      if (att.question_answer_txt == null)
      {
        var unansindex = this.unanswerquestion;
        unansindex = unansindex.indexOf(att.question_id);
        if (unansindex == -1)
        {
          this.unanswerquestion.push(att.question_id);
          $('#renderIndexList li').find('a#' + this.recIndex).css('color', '#D3D3D3');
        }

        //  $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
      }

      --this.recIndex;
      $('#renderQuestionList').empty();
      $('#next_question').removeAttr("disabled");
      if (this.recIndex == 1)
      {
        $('#previous_question').attr("disabled", "disabled");
      }

      this.renderIndexQuestionItem();

    }
    else if (att.question_type_id == 9)
    {

      var length = $('#matchansOption').find('.opdiv').text().length;

      var skip = 0;
      if (att.question_answer_txt == null)
      {
        var unansindex = this.unanswerquestion;
        unansindex = unansindex.indexOf(att.question_id);
        if (unansindex == -1)
        {
          this.unanswerquestion.push(att.question_id);
          $('#renderIndexList li').find('a#' + this.recIndex).css('color', '#D3D3D3');
        }

        // $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
      }
      if (att.question_answer_txt != null)
      {
        var skip = 1;
        $('#optiondisplay1').find('.row').each(function()
        {
          var matchAnswer = $(this).find('#matchansOption').text();
          if (matchAnswer == '' || matchAnswer.length <= 1)
          {
            skip = 0;
            //alert('please enter all answer');
            $('#showalert').text("Please Drag the answer");
            $('#myModal1').modal('show');

          }
        });
        if (skip != 0)
        {
          var keyAnswerJson = '';
          $('#optiondisplay1').find('.row').each(function()
          {
            var matchOption = $(this).find('#matchansweroptiondiv #questionAnswerOptionMatch1').val();
            var matchAnswer = $(this).find('#matchansOption').text();
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
          att.question_answer_txt = keyAnswerJson;
          //  $('#questionView').find('#Unanswered').html(this.unanswerquestion.length); 

        }
      }

      --this.recIndex;
      $('#renderQuestionList').empty();
      $('#next_question').removeAttr("disabled");
      if (this.recIndex == 1)
      {
        $('#previous_question').attr("disabled", "disabled");
      }

      this.renderIndexQuestionItem();
    }

    else if (att.question_type_id == 10)
    {
      console.log(this.currentQuestionItem.puzzle.isSnapped);
      if (att.question_answer_txt == null)
      {
        var unansindex = this.unanswerquestion;
        unansindex = unansindex.indexOf(att.question_id);
        if (unansindex == -1)
        {
          this.unanswerquestion.push(att.question_id);
          $('#renderIndexList li').find('a#' + this.recIndex).css('color', '#D3D3D3');
        }

        //  $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
      }
      if (typeof(this.currentQuestionItem.puzzle) !== 'undefined'  && this.currentQuestionItem.puzzle.isSnapped)
      {
        console.log('chaning config in prev');
        att.question_answer_txt = this.getPuzzleConfig();
        this.currentQuestionItem.puzzle.isSnapped = false;
      }    

      --this.recIndex;
      $('#renderQuestionList').empty();
      $('#next_question').removeAttr("disabled");
      if (this.recIndex == 1)
      {
        $('#previous_question').attr("disabled", "disabled");
      }

      this.renderIndexQuestionItem();

    }
  },

  renderClearQuestion: function()
  {
    var self = this;
    index = this.recIndex;
    var mainIndex = this.collection.at(index - 1);
    mainIndex = new Backbone.Collection(mainIndex);


    $('#renderIndexList').find('#' + this.recIndex).removeClass(' yy bb rr').addClass('ww');
    if ((att.question_type_id == 1) || (att.question_type_id == 2) || (att.question_type_id == 3) || (att.question_type_id == 4) || (att.question_type_id == 8))
    {
      if (att.option_group.indexOf('C') >= 0)
      {
        mainIndex.each(function(item)
        {
          item.set(
          {
            'description': index
          });
          item.set(
          {
            'question_answer_txt': undefined
          });
          att = item.attributes;

        });
      }
      else
      {
        mainIndex.each(function(item)
        {
          item.set(
          {
            'description': index
          });
          item.set(
          {
            'question_answer_txt': ""
          });
          att = item.attributes;

        });
      }
      var qid = $('#optiondisplay1 li input').attr('id');
      var revindex = this.reviewquestion.indexOf(qid);
    }
    else if (att.question_type_id == 5)
    {
      mainIndex.each(function(item)
      {
        item.set(
        {
          'description': index
        });
        item.set(
        {
          'question_answer_txt': ""
        });

        att = item.attributes;

      });
      var fill = $('#optiondisplay3 :selected').val();
      var revindex = this.reviewquestion.indexOf(fill);

    }
    else if (att.question_type_id == 6)
    {
      mainIndex.each(function(item)
      {
        item.set(
        {
          'description': index
        });
        item.set(
        {
          'question_answer_txt': ""
        });

        att = item.attributes;

      });
      var qid1 = $('#optiondisplay1 li textarea').attr('id');
      var revindex = this.reviewquestion.indexOf(qid1);

    }
    else if (att.question_type_id == 7)
    {
      mainIndex.each(function(item)
      {
        item.set(
        {
          'description': index
        });
        item.set(
        {
          'question_answer_txt': null
        });

        att = item.attributes;

      });
      var qid1 = $('#optiondisplay1 ').attr('id');
      var revindex = this.reviewquestion.indexOf(qid1);

    }
    else if (att.question_type_id == 9)
    {
      mainIndex.each(function(item)
      {
        item.set(
        {
          'description': index
        });
        item.set(
        {
          'question_answer_txt': null
        });

        att = item.attributes;

      });

      var length = $('#matchansOption').find('.opdiv').text();
      var revindex = this.reviewquestion.indexOf(length);
    }
    else if (att.question_type_id == 10)
    {
      mainIndex.each(function(item)
      {
        item.set(
        {
          'description': index
        });
        item.set(
        {
          'question_answer_txt': null
        });

        att = item.attributes;

      });
      var qid1 = $('#optiondisplay1 ').attr('id');
      var revindex = this.reviewquestion.indexOf(qid1);

    }
    if (revindex != -1)
    {
      $('#renderIndexList').find('#' + this.recIndex).removeClass('ww bb rr').addClass('yy');
    }
    $('#renderQuestionList').empty();
    self.renderQuestionItem(att);
    return this;


  },

  renderIndexList: function(e)
  {


    if ((att.question_type_id == 1) || (att.question_type_id == 2) || (att.question_type_id == 3) || (att.question_type_id == 4) || (att.question_type_id == 8))
    {
      var qid = $('#optiondisplay1 li input').attr('id');
      var len = $('#optiondisplay1 li').find('#' + qid + ':checked').length;

      if (len == 0)
      {
        var unansindex = this.unanswerquestion;
        unansindex = unansindex.indexOf(qid);
        if (unansindex == -1)
        {
          this.unanswerquestion.push(qid);
        }


        // $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
      }
    }
    else if (att.question_type_id == 5)
    {
      var self = this;
      $('#optiondisplay3 :selected').each(function()
      {
        lenfillind = $(this).val();

      });
      if (lenfillind == "--Please Select--")
      {
        var unansindex = this.unanswerquestion;
        unansindex = unansindex.indexOf(att.question_id);
        if (unansindex == -1)
        {
          this.unanswerquestion.push(att.question_id);
        }

        // $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
      }

    }
    else if (att.question_type_id == 6)
    {
      var question_answer = '';
      question_answer = $('#a' + att.question_id).val();

      att.question_answer_txt = question_answer;
      var qid1 = $('#optiondisplay1 li textarea').attr('id');
      var len1 = $('#optiondisplay1 li').find('#' + qid1).val().length;
      if (len1 == 0)
      {
        var unansindex = this.unanswerquestion;
        unansindex = unansindex.indexOf(att.question_id);
        if (unansindex == -1)
        {
          this.unanswerquestion.push(att.question_id);
        }


        //$('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
      }

    }
    else if (att.question_type_id == 9)
    {

      var length = $('#matchansOption').find('.opdiv').text();

      if (length == 0)
      {
        var unansindex = this.unanswerquestion;
        unansindex = unansindex.indexOf(att.question_id);
        if (unansindex == -1)
        {
          this.unanswerquestion.push(att.question_id);
        }


        //$('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
      }
    }
    else if (att.question_type_id == 10)
    {
      console.log('isSnapped=',this.currentQuestionItem.puzzle.isSnapped);
      if (typeof (this.currentQuestionItem.puzzle) !== 'undefined' && this.currentQuestionItem.puzzle.isSnapped)
      {

        // var configClone = Object.assign({},this.currentQuestionItem.puzzle.getConfig());
        // delete configClone['imgObjURL'];
        // // console.log(configClone);
        // configClone = JSON.stringify(configClone);
        // att.question_answer_txt = configClone;
        att.question_answer_txt = this.getPuzzleConfig();
        this.currentQuestionItem.puzzle.isSnapped = false;
      }

    }

    var self = this;
    var inid = $(e.target).attr('id');
    $('#renderQuestionList').empty();
    $('#previous_question').removeAttr("disabled");
    $('#next_question').removeAttr("disabled");
    if (inid == 1)
    {
      $('#previous_question').attr("disabled", "disabled");
    }
    if (inid == this.collection.length)
    {
      $('#next_question').attr("disabled", "disabled");
    }
    this.recIndex = inid;
    var mainIndex = this.collection.at(inid - 1);
    mainIndex = new Backbone.Collection(mainIndex);
    mainIndex.each(function(item)
    {
      item.set(
      {
        'description': inid
      });
      att = item.attributes;
    });


    self.renderQuestionItem(att);
    return this;
  },
  reviewQuestion: function()
  {
    if ((att.question_type_id == 1) || (att.question_type_id == 2) || (att.question_type_id == 3) || (att.question_type_id == 4) || (att.question_type_id == 8))
    {
      var qid = $('#optiondisplay1 li input').attr('id');

      var revindex = this.reviewquestion.indexOf(att.question_id);
      if (revindex == -1)
      {
        this.reviewquestion.push(att.question_id);
        this.reviewPagination.push(this.recIndex);
        $('#review_question').text("UnReview");
      }


      $('#questionView').find('#Reviewed').html(this.reviewquestion.length);
      $('#renderIndexList').find('#' + this.recIndex).removeClass('ww bb rr').addClass('yy');
      var revindexPage = this.reviewquestion.indexOf(this.recIndex);
      if (revindex != -1)
      {
        this.reviewquestion.splice(revindex, 1);
        this.reviewquestion.splice(revindexPage, 1);
        $('#review_question').text("Review");
        $('#renderIndexList').find('#' + this.recIndex).removeClass(' yy bb rr').addClass('ww');
        $('#questionView').find('#Reviewed').html(this.reviewquestion.length);
        var qid = $('#optiondisplay1 li input').attr('id');
        var len = $('#optiondisplay1 li').find('#' + qid + ':checked').length;
        if (len != 0)
        {
          $('#renderIndexList').find('#' + this.recIndex).removeClass('ww rr yy').addClass('bb');
        }


      }

    }
    else if (att.question_type_id == 5)
    {
      var revindex = this.reviewquestion.indexOf(att.question_id);
      if (revindex == -1)
      {
        this.reviewquestion.push(att.question_id);
        this.reviewPagination.push(this.recIndex);
        $('#review_question').text("UnReview");
      }

      $('#questionView').find('#Reviewed').html(this.reviewquestion.length);
      $('#renderIndexList').find('#' + this.recIndex).removeClass('ww bb rr').addClass('yy');

      var revindexPage = this.reviewquestion.indexOf(this.recIndex);
      if (revindex != -1)
      {

        this.reviewquestion.splice(revindex, 1);
        this.reviewquestion.splice(revindexPage, 1);
        $('#review_question').text("Review");
        $('#renderIndexList').find('#' + this.recIndex).removeClass(' yy bb rr').addClass('ww');
        $('#questionView').find('#Reviewed').html(this.reviewquestion.length);

        if (att.question_answer_txt != null)
        {
          $('#renderIndexList').find('#' + this.recIndex).removeClass('ww rr yy').addClass('bb');
        }
      }
    }
    else if (att.question_type_id == 6)
    {
      var qid1 = $('#optiondisplay1 li textarea').attr('id');
      var revindex = this.reviewquestion.indexOf(att.question_id);
      if (revindex == -1)
      {
        this.reviewquestion.push(att.question_id);
        this.reviewPagination.push(this.recIndex);
        $('#review_question').text("UnReview");
      }
      $('#questionView').find('#Reviewed').html(this.reviewquestion.length);
      $('#renderIndexList').find('#' + this.recIndex).removeClass('ww bb rr').addClass('yy');
      var revindexPage = this.reviewquestion.indexOf(this.recIndex);
      if (revindex != -1)
      {
        this.reviewquestion.splice(revindex, 1);
        this.reviewquestion.splice(revindexPage, 1);
        $('#review_question').text("Review");
        $('#renderIndexList').find('#' + this.recIndex).removeClass(' yy bb rr').addClass('ww');
        $('#questionView').find('#Reviewed').html(this.reviewquestion.length);
        var qid1 = $('#optiondisplay1 li textarea').attr('id');
        var len = $('#optiondisplay1 li').find('#' + qid1 + ':checked').length;
        if (len != 0)
        {
          $('#renderIndexList').find('#' + this.recIndex).removeClass('ww rr yy').addClass('bb');
        }


      }
    }
    else if (att.question_type_id == 9)
    {

      var length = $('#matchansOption').find('.opdiv').text();
      var revindex = this.reviewquestion.indexOf(att.question_id);
      if (revindex == -1)
      {
        this.reviewquestion.push(att.question_id);
        this.reviewPagination.push(this.recIndex);
        $('#review_question').text("UnReview");
      }
      $('#questionView').find('#Reviewed').html(this.reviewquestion.length);
      $('#renderIndexList').find('#' + this.recIndex).removeClass('ww bb rr').addClass('yy');

      var revindexPage = this.reviewquestion.indexOf(this.recIndex);
      if (revindex != -1)
      {
        this.reviewquestion.splice(revindex, 1);
        this.reviewquestion.splice(revindexPage, 1);
        $('#review_question').text("Review");
        $('#renderIndexList').find('#' + this.recIndex).removeClass(' yy bb rr').addClass('ww');
        $('#questionView').find('#Reviewed').html(this.reviewquestion.length);

        if (att.question_answer_txt != null)
        {
          $('#renderIndexList').find('#' + this.recIndex).removeClass('ww rr yy').addClass('bb');
        }
      }
    }
    else if (att.question_type_id == 7)
    {
      var revindex = this.reviewquestion.indexOf(att.question_id);
      if (revindex == -1)
      {
        this.reviewquestion.push(att.question_id);
        this.reviewPagination.push(this.recIndex);
        $('#review_question').text("UnReview");
      }
      $('#questionView').find('#Reviewed').html(this.reviewquestion.length);
      $('#renderIndexList').find('#' + this.recIndex).removeClass('ww bb rr').addClass('yy');

      var revindexPage = this.reviewquestion.indexOf(this.recIndex);
      if (revindex != -1)
      {
        this.reviewquestion.splice(revindex, 1);
        this.reviewquestion.splice(revindexPage, 1);
        $('#review_question').text("Review");
        $('#renderIndexList').find('#' + this.recIndex).removeClass(' yy bb rr').addClass('ww');
        $('#questionView').find('#Reviewed').html(this.reviewquestion.length);

        if (att.question_answer_txt != null)
        {
          $('#renderIndexList').find('#' + this.recIndex).removeClass('ww rr yy').addClass('bb');
        }
      }
    }
    else if (att.question_type_id == 10)
    {
      var revindex = this.reviewquestion.indexOf(att.question_id);
      if (revindex == -1)
      {
        this.reviewquestion.push(att.question_id);
        this.reviewPagination.push(this.recIndex);
        $('#review_question').text("UnReview");
      }
      $('#questionView').find('#Reviewed').html(this.reviewquestion.length);
      $('#renderIndexList').find('#' + this.recIndex).removeClass('ww bb rr').addClass('yy');

      var revindexPage = this.reviewquestion.indexOf(this.recIndex);
      if (revindex != -1)
      {
        this.reviewquestion.splice(revindex, 1);
        this.reviewquestion.splice(revindexPage, 1);
        $('#review_question').text("Review");
        $('#renderIndexList').find('#' + this.recIndex).removeClass(' yy bb rr').addClass('ww');
        $('#questionView').find('#Reviewed').html(this.reviewquestion.length);

        if (att.question_answer_txt != null)
        {
          $('#renderIndexList').find('#' + this.recIndex).removeClass('ww rr yy').addClass('bb');
        }
      }
    }




  },


  confirmQuestion: function()
  {

    $('#previous_question').removeAttr("disabled");

    if (att.question_type_id == 1 || att.question_type_id == 2 || att.question_type_id == 3 || att.question_type_id == 4 || att.question_type_id == 8)
    {
      var qid = $('#optiondisplay1 li input').attr('id');
      var len = $('#optiondisplay1 li').find('#' + qid + ':checked').length;


      if (len != 0)
      {
        var revindex = this.confirmquestionone.indexOf(parseInt(att.question_id));
        if (revindex == -1)
        {
          this.confirmquestionone.push(att.question_id);
          this.confirmquestionPagination.push(this.recIndex);
          $('#questionView').find('#Answered').html(this.confirmquestionone.length);
          unAns = Number(this.collection.length) - Number(this.confirmquestionone.length);
          $('#questionView').find('#Unanswered').html(unAns);
        }
        $('#renderIndexList').find('#' + this.recIndex).removeClass('ww rr yy').addClass('bb');

        var unansindex = this.unanswerquestion;

        unansindex = unansindex.indexOf(qid);
        if (unansindex != -1)
        {
          this.unanswerquestion.splice(unansindex, 1);
          //$('#questionView').find('#Unanswered').html(this.unanswerquestion.length);

        }
        if (this.recIndex <= this.collection.length)
        {
          this.recIndex++;
        }
        if (this.recIndex >= this.collection.length)
        {
          this.recIndex = this.collection.length;
        }
        $('#renderQuestionList').empty();

        // Generate the Answer for each type of question
        // var answer = '';
        // if (att.question_type_id == 1 || att.question_type_id == 3 || att.question_type_id == 4) {
        //   answer = att.question_answer_txt;
        // } else if (att.question_type_id == 2) {

        // } else if (att.question_type_id == 5) {

        // } else if (att.question_type_id == 6) {

        // } else if (att.question_type_id == 7) {

        // } else if (att.question_type_id == 8) {

        // } else if (att.question_type_id == 9) {

        // }




        var renderQusModel = new user.UserRenderQuestionModel();

        renderQusModel.save(
        {
          "question_id": att.question_id,
          "online_exam_question_id": att.online_exam_question_id,
          "question_answer_txt": att.question_answer_txt
        },
        {
          url: 'dummyurl',
          protocol: 'ws',
          operation: 'confirm',
          wait: true,
          success: function(data)
          {
            console.log("success after save");
            //$('#clear_question').attr("disabled", true);
          },
          error: function(data)
          {
            errorhandle(data);


          }
        });


        this.renderIndexQuestionItem();

      }
      else
      {
        // alert("please select the answer");
        $('#showalert').text("Please Choose answer");
        $('#myModal1').modal('show');
        // $('#myModal1').modal('toggle');
      }
    }
    else if (att.question_type_id == 5)
    {
      var question_answer = '';
      var status = 0;
      $('#optiondisplay3 ').find(':selected').each(function()
      {
        var selectans = $(this).val();
        if (selectans == "--Please Select--")
        {
          status = 0;
          //alert("Please select all answer");
          $('#showalert').text("Please select answer");
          $('#myModal1').modal('show');
        }
      });
      var revindex = this.confirmquestionone.indexOf(parseInt(att.question_id));
      if (revindex == -1)
      {
        this.confirmquestionone.push(att.question_id);
        this.confirmquestionPagination.push(this.recIndex);
        $('#questionView').find('#Answered').html(this.confirmquestionone.length);
        unAns = Number(this.collection.length) - Number(this.confirmquestionone.length);
        $('#questionView').find('#Unanswered').html(unAns);
      }
      var unansindex = this.unanswerquestion;
      unansindex = unansindex.indexOf(att.question_id);
      if (unansindex != -1)
      {
        this.unanswerquestion.splice(unansindex, 1);
        // $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);

      }
      $('#optiondisplay3').find(':selected').each(function()
      {
        var selectans = $(this).val();

        if (selectans != "--Please Select--")
        {
          status = 1;

          var selectans = $(this).val();

          if (question_answer == '')
          {
            question_answer = $(this).val();

          }
          else
          {

            question_answer = question_answer + brek + $(this).val();
          }

        }
      });
      att.question_answer_txt = question_answer;
      var renderQusModel = new user.UserRenderQuestionModel();
      if (status == 1)
      {
        $('#renderIndexList').find('#' + this.recIndex).removeClass('ww rr yy').addClass('bb');
        renderQusModel.save(
        {
          "question_id": att.question_id,
          "online_exam_question_id": att.online_exam_question_id,
          "question_answer_txt": att.question_answer_txt
        },
        {
          url: 'dummyurl',
          protocol: 'ws',
          operation: 'confirm',
          wait: true,
          success: function(data)
          {
            //  $('#clear_question').attr("disabled", true);
            console.log("success after save");

          },
          error: function(data)
          {
            errorhandle(data);

          }
        });
        if (this.recIndex <= this.collection.length)
        {
          this.recIndex++;
        }
        if (this.recIndex >= this.collection.length)
        {
          this.recIndex = this.collection.length;
        }
        $('#renderQuestionList').empty();
        this.renderIndexQuestionItem();
      }
    }
    else if (att.question_type_id == 6)
    {
      var question_answer = '';
      question_answer = $('#a' + att.question_id).val();
      if (question_answer == '')
      {
        //alert("please enter answer");
        $('#showalert').text("Please Enter answer");
        $('#myModal1').modal('show');
        return false;
      }
      else
      {
        var revindex = this.confirmquestionone.indexOf(parseInt(att.question_id));
        if (revindex == -1)
        {
          this.confirmquestionone.push(att.question_id);
          this.confirmquestionPagination.push(this.recIndex);
          $('#questionView').find('#Answered').html(this.confirmquestionone.length);
          unAns = Number(this.collection.length) - Number(this.confirmquestionone.length);
          $('#questionView').find('#Unanswered').html(unAns);
        }

        var unansindex = this.unanswerquestion;
        unansindex = unansindex.indexOf(att.question_id);
        if (unansindex != -1)
        {
          this.unanswerquestion.splice(unansindex, 1);
          // $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);

        }
        $('#renderIndexList').find('#' + this.recIndex).removeClass('ww rr yy').addClass('bb');
        att.question_answer_txt = question_answer;
      }

      var renderQusModel = new user.UserRenderQuestionModel();

      renderQusModel.save(
      {
        "question_id": att.question_id,
        "online_exam_question_id": att.online_exam_question_id,
        "question_answer_txt": att.question_answer_txt
      },
      {
        url: 'dummyurl',
        protocol: 'ws',
        operation: 'confirm',
        wait: true,
        success: function(data)
        {
          // $('#clear_question').attr("disabled", true);
          console.log("success after save");

        },
        error: function(data)
        {
          errorhandle(data);

        }
      });
      if (this.recIndex <= this.collection.length)
      {
        this.recIndex++;
      }
      if (this.recIndex >= this.collection.length)
      {
        this.recIndex = this.collection.length;
      }
      $('#renderQuestionList').empty();
      this.renderIndexQuestionItem();
    }
    else if (att.question_type_id == 7)
    {
      var question_answer = '';
      $('#renderIndexList').find('#' + this.recIndex).removeClass('ww rr yy').addClass('bb');
      var revindex = this.confirmquestionone.indexOf(parseInt(att.question_id));
      if (revindex == -1)
      {
        this.confirmquestionone.push(att.question_id);
        this.confirmquestionPagination.push(this.recIndex);
        $('#questionView').find('#Answered').html(this.confirmquestionone.length);

        unAns = Number(this.collection.length) - Number(this.confirmquestionone.length);
        $('#questionView').find('#Unanswered').html(unAns);
      }
      var unansindex = this.unanswerquestion;
      unansindex = unansindex.indexOf(att.question_id);
      if (unansindex != -1)
      {
        this.unanswerquestion.splice(unansindex, 1);

        // $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);

      }
      $('#optiondisplay1').find('div').each(function()
      {
        if (question_answer == '')
        {
          question_answer = $(this).text();
        }
        else
        {
          question_answer = question_answer + brek + $(this).text();
        }


      });
      att.question_answer_txt = question_answer;

      var renderQusModel = new user.UserRenderQuestionModel();


      renderQusModel.save(
      {
        "question_id": att.question_id,
        "online_exam_question_id": att.online_exam_question_id,
        "question_answer_txt": att.question_answer_txt
      },
      {
        url: 'dummyurl',
        protocol: 'ws',
        operation: 'confirm',
        wait: true,
        success: function(data)
        {
          //  $('#clear_question').attr("disabled", true);
          console.log("success after save");

        },
        error: function(data)
        {
          errorhandle(data);

        }
      });
      
      if (this.recIndex <= this.collection.length)
      {
        this.recIndex++;
      }
      if (this.recIndex >= this.collection.length)
      {
        this.recIndex = this.collection.length;
      }
      $('#renderQuestionList').empty();
      this.renderIndexQuestionItem();
    }
    else if (att.question_type_id == 9)
    {
      var status = 0;
      var revindex = this.confirmquestionone.indexOf(parseInt(att.question_id));
      if (revindex == -1)
      {
        this.confirmquestionone.push(att.question_id);
        this.confirmquestionPagination.push(this.recIndex);
        $('#questionView').find('#Answered').html(this.confirmquestionone.length);
        unAns = Number(this.collection.length) - Number(this.confirmquestionone.length);
        $('#questionView').find('#Unanswered').html(unAns);
      }
      var unansindex = this.unanswerquestion;
      unansindex = unansindex.indexOf(att.question_id);
      if (unansindex != -1)
      {
        this.unanswerquestion.splice(unansindex, 1);
        // $('#questionView').find('#Unanswered').html(this.unanswerquestion.length);

      }

      var keyAnswerJson = '';
      $('#optiondisplay1').find('.row').each(function()
      {
        var matchOption = $.trim($(this).find('#matchansweroptiondiv #questionAnswerOptionMatch1').text());
        var matchAnswer = $.trim($(this).find('#matchansOption').text());

        if ((matchAnswer == "") || (matchAnswer == 'undefined') || (matchAnswer == null))
        {
          //alert("please Drag the answer");
          $('#showalert').text("Please Drag the answer");
          $('#myModal1').modal('show');
          status = 0;
        }
        else
        {


          status = 1;
          var finalmatch = matchOption + brek + matchAnswer;
          if (keyAnswerJson == '')
          {
            keyAnswerJson = finalmatch;
          }
          else
          {
            keyAnswerJson = keyAnswerJson + matbrek + finalmatch;
          }
        }
      });

      att.question_answer_txt = keyAnswerJson;
      if (status == 1)
      {
        var renderQusModel = new user.UserRenderQuestionModel();
        $('#renderIndexList').find('#' + this.recIndex).removeClass('ww rr yy').addClass('bb');
        renderQusModel.save(
        {
          "question_id": att.question_id,
          "online_exam_question_id": att.online_exam_question_id,
          "question_answer_txt": att.question_answer_txt
        },
        {
          url: 'dummyurl',
          protocol: 'ws',
          operation: 'confirm',
          wait: true,
          success: function(data)
          {
            //  $('#clear_question').attr("disabled", true);
            console.log("success after save");
            
          },
          error: function(data)
          {
           
            errorhandle(data);
          }
        });

        if (this.recIndex <= this.collection.length)
        {
          this.recIndex++;
        }
        if (this.recIndex >= this.collection.length)
        {
          this.recIndex = this.collection.length;
        }
        $('#renderQuestionList').empty();
        this.renderIndexQuestionItem();
      }
    }

    else if (att.question_type_id == 10)
    {
      var revindex = this.confirmquestionone.indexOf(parseInt(att.question_id));
      if (revindex == -1)
      {
        this.confirmquestionone.push(att.question_id);
        this.confirmquestionPagination.push(this.recIndex);
        $('#questionView').find('#Answered').html(this.confirmquestionone.length);

        unAns = Number(this.collection.length) - Number(this.confirmquestionone.length);
        $('#questionView').find('#Unanswered').html(unAns);
      }
      var unansindex = this.unanswerquestion;

      unansindex = unansindex.indexOf(att.question_id);
      if (unansindex != -1)
      {
        this.unanswerquestion.splice(unansindex, 1);

        //$('#questionView').find('#Unanswered').html(this.unanswerquestion.length);
      }
      // var can = document.getElementById("c");
      // keyAnswerJson = can.toDataURL("image/png");
      
      if (typeof(this.currentQuestionItem.puzzle !== 'undefined'  && this.currentQuestionItem.puzzle.isSnapped)) 
      {
        console.log('chaning config in confirm');
        console.log(this.currentQuestionItem.puzzle.drawingStack.length);
        var keyAnswerJson="";
        keyAnswerJson = this.currentQuestionItem.puzzle.drawingStack.length;
        if(keyAnswerJson > 2)
        {
          keyAnswerJson = this.getPuzzleConfig();
        }
        else
        {
          keyAnswerJson = 'pzCompliant';
        }
        this.currentQuestionItem.puzzle.isSnapped = false;
        att.question_answer_txt = keyAnswerJson;
      }

      
      var renderQusModel = new user.UserRenderQuestionModel();
      this.confirmquestionPagination.push(this.recIndex);
      $('#renderIndexList').find('#' + this.recIndex).removeClass('ww rr yy').addClass('bb');

      renderQusModel.save(
      {
        "question_id": att.question_id,
        "online_exam_question_id": att.online_exam_question_id,
        "question_answer_txt": att.question_answer_txt
      },
      {
        url: 'dummyurl',
        protocol: 'ws',
        operation: 'confirm',
        wait: true,
        success: function(data)
        {
          //  $('#clear_question').attr("disabled", true);
          console.log("success after save");
          
        },
        error: function(data)
        {
          errorhandle(data);
        }
      });

      if (this.recIndex <= this.collection.length)
      {
        this.recIndex++;
      }
      if (this.recIndex >= this.collection.length)
      {
        this.recIndex = this.collection.length;
      }
      $('#renderQuestionList').empty();
      this.renderIndexQuestionItem();
    }
  },

  getPuzzleConfig: function()
  {
    var configClone = Object.assign({},this.currentQuestionItem.puzzle.getConfig());
    delete configClone['imgObjURL'];
    // console.log(configClone);
    configClone = JSON.stringify(configClone);
    // return configClone + brek + this.currentQuestionItem.puzzle.drawingStack.length;     
    return configClone;     
  },

  catSubTop: function()
  {

    $('.catName').append(this.orderdetail.attributes.category_name);

    $('.subName').append(this.orderdetail.attributes.subject_name);

    $('.topName').append(this.orderdetail.attributes.topic_name);

    //userRouter.totalNo = parseInt(this.collection.length);

    $('#totalques').append(this.collection.length);
    $('#Unanswered').append(this.collection.length);


  },

  renderingPagination: function()
  {
    var indexli = $('#renderIndexList');
    indexli.empty();
    pagesize = 12;
    var self = this;
    totalpage = parseInt(this.collection.length / pagesize);
    indexli.append('<div class="rowsss">');
    if (this.setPage < totalpage)
    {
      for (i = 1; i <= 12; i++)
      {
        indexli.append(' <div class="nno ww" style="cursor: pointer;" id="' + this.paginationNO + '"><span id="' + this.paginationNO + '" style="color:white;">' + this.paginationNO + '</span> </div>');
        this.k++;
        this.paginationNO++;
      }
    }
    else
    {
      rem = this.collection.length - this.paginationNO + 1;
      for (i = 1; i <= rem; i++)
      {
        indexli.append(' <div class="nno ww" style="cursor: pointer;" id="' + this.paginationNO + '"><span id="' + this.paginationNO + '" style="ßcolor:White;">' + this.paginationNO + '</span> </div>');
        this.k++;
        this.paginationNO++;
      }
    }
    var tmp = this.paginationNO - this.k;
    if (this.orderdetail.attributes.examstatus == "start")
    {
      for (tmp; tmp < this.collection.length; tmp++)
      {
        for (j = 0; j < this.collection.length; j++)
        {
          var revi = $('#renderIndexList #' + tmp).text();
          if (parseInt(revi) == parseInt(this.reviewPagination[j]))
          {
            $('#renderIndexList').find('#' + tmp).removeClass('ww bb rr').addClass('yy');
          }
        }
      }
      tmp = this.paginationNO - this.k;
      for (tmp; tmp < this.collection.length; tmp++)
      {
        for (j = 0; j < this.collection.length; j++)
        {
          var revi = $('#renderIndexList #' + tmp).text();
          if (parseInt(revi) == parseInt(this.confirmquestionPagination[j]))
          {
            $('#renderIndexList').find('#' + tmp).removeClass('ww rr yy').addClass('bb');
          }

        }
      }
    }
    if (this.orderdetail.attributes.examstatus == "restart")
    {
      tmp = this.paginationNO - this.k;
      this.collection.each(function(item)
      {
        if (item.attributes.pagination_desc != null)
        {
          var revindex = self.confirmquestionone.indexOf(item.attributes.question_id);
          if (revindex == -1)
          {
            self.confirmquestionone.push(item.attributes.question_id);
          }
          $('#renderIndexList').find('#' + item.attributes.pagination_desc).removeClass('ww rr yy').addClass('bb');
          //$('#clear_question').attr("disabled","disabled");

        }

      });

      unans = Number(this.collection.length) - Number(this.confirmquestionone.length);
      $('#Answered').html(this.confirmquestionone.length);
      $('#Unanswered').html(unans);
      $('#Reviewed').html(this.reviewquestion.length);
    }
    indexli.append('</div>');
    $('#PreviousPagination').removeAttr("disabled");
    $('#NextPagination').removeAttr("disabled");
    if (this.setPage == 0)
    {
      $('#PreviousPagination').attr("disabled", "disabled");
    }
    if ((this.paginationNO - 1) == this.collection.length)
    {
      $('#NextPagination').attr("disabled", "disabled");
    }

  },
  renderingPreviousPage: function()
  {
    this.setPage--;
    this.paginationNO -= this.k + 12;
    this.k = 0;
    this.renderingPagination();
  },
  renderingNextPage: function()
  {
    this.setPage++;
    this.k = 0;
    this.renderingPagination();
  },
  renderingCompletedQuestion: function()
  {
    var self = this;

    //this.renderItem = new user.ComplitedExamView({el: $('#page-section')});
    userRouter.totalNo = parseInt(this.collection.length);
    userRouter.totalUnAnswer = parseInt(this.unanswerquestion.length);
    userRouter.totalReviewed = parseInt(this.reviewquestion.length);
    userRouter.totalAnswered = parseInt(this.confirmquestionone.length);

    //$('#page-section').empty();
    //$('#page-section').unbind();


    //userRouter.navigate("completed_exam", {trigger:true});
    //var template = _.template($('#completedTemplate').html()); 
    //$('#page-section').append(template);
    if (this.orderdetail.attributes.examstatus == "restart")
    {
      $('#com_ques').find('#total_ques').html(userRouter.totalNo);
      $('#com_ques').find('#Unanswered_qus').html(userRouter.totalUnAnswer);
      $('#com_ques').find('#Reviewed_qus').html(userRouter.totalReviewed);
      $('#com_ques').find('#answered_qus').html(userRouter.totalAnswered);
    }
    if (this.orderdetail.attributes.examstatus == "start")
    {
      $('#com_ques').find('#total_ques').html(userRouter.totalNo);
      $('#com_ques').find('#Unanswered_qus').html(userRouter.totalUnAnswer);
      $('#com_ques').find('#Reviewed_qus').html(userRouter.totalReviewed);
      $('#com_ques').find('#answered_qus').html(userRouter.totalAnswered);
    }
  },

  completedexam: function(e)
  {
    e.preventDefault();
    var self = this;

    var orderdetail = user.orderdetail;
    var renderQusModel = new user.UserRenderQuestionModel();

    renderQusModel.save(
    {
      "order_detail_id": orderdetail.attributes.order_detail_id,
      "product_catalog_id": orderdetail.attributes.product_catalog_id,
      "exam_schedule_id": orderdetail.attributes.exam_schedule_id,
      "category_id": orderdetail.attributes.category_id,
      "subject_id": orderdetail.attributes.subject_id,
      "topic_id": orderdetail.attributes.topic_id,
      "user_profile_id": orderdetail.attributes.user_profile_id,
      "promo_master_id": orderdetail.attributes.promo_id,
      "type": orderdetail.attributes.type, //direct/promo
      "payment_ref_no": 1, //only for customer
      "exam_trans_ref_no": orderdetail.attributes.exam_trans_ref_no,
      "client_id": orderdetail.attributes.client_id,


    },
    {
      url: 'dummyurl',
      protocol: 'ws',
      operation: 'showResult',
      wait: true,
      success: function(data)
      {

        $("div.success").html(data.attributes.ResMsg);
        $("div.success").fadeIn(300).delay(1500).fadeOut(400);
        if (self.orderdetail.attributes.mode == 0)
        {
          userRouter.navigate("examCatalog",
          {
            trigger: true
          });
        }
        if (self.orderdetail.attributes.mode == 1)
        {
          userRouter.navigate("examCart",
          {
            trigger: true
          });
        }
      },
      error: function(data)
      {

        errorhandle(data);

      }
    });
  },
  closePopup: function()
  {
    userRouter.navigate("startExam",
    {
      trigger: true
    });
  },

  completeExam: function()
  {
    $('#com_ques').modal('hide');
    $('body').removeClass('modal-open');
    $('.modal-backdrop').remove();
    var self = this;

    //this.renderItem = new user.ComplitedExamView({el: $('#page-section')});
    userRouter.totalNo = parseInt(this.collection.length);
    userRouter.totalUnAnswer = parseInt(this.unanswerquestion.length);
    userRouter.totalReviewed = parseInt(this.reviewquestion.length);
    userRouter.totalAnswered = parseInt(this.confirmquestionone.length);
    userRouter.examstatus = this.orderdetail.attributes.examstatus;

    var self = this;
    var orderdetail = user.orderdetail;
    var renderQusModel = new user.UserRenderQuestionModel();

    renderQusModel.save(
    {
      "order_detail_id": orderdetail.attributes.order_detail_id,
      "product_catalog_id": orderdetail.attributes.product_catalog_id,
      "exam_schedule_id": orderdetail.attributes.exam_schedule_id,
      "category_id": orderdetail.attributes.category_id,
      "subject_id": orderdetail.attributes.subject_id,
      "topic_id": orderdetail.attributes.topic_id,
      "user_profile_id": orderdetail.attributes.user_profile_id,
      "promo_master_id": orderdetail.attributes.promo_id,
      "type": orderdetail.attributes.type, //direct/promo
      "payment_ref_no": 1, //only for customer
      "exam_trans_ref_no": orderdetail.attributes.exam_trans_ref_no,
      "client_id": orderdetail.attributes.client_id,


    },
    {
      url: 'dummyurl',
      protocol: 'ws',
      operation: 'showResult',
      wait: true,
      success: function(data)
      {
        // $( "div.success" ).html(data.attributes.ResMsg);
        // $( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
        if (self.orderdetail.attributes.mode == 0)
        {
          userRouter.navigate("resultPage",
          {
            trigger: true
          });
        }
        if (self.orderdetail.attributes.mode == 1)
        {
          userRouter.navigate("resultPage",
          {
            trigger: true
          });
        }
      },
      error: function(data)
      {
        errorhandle(data);
      }
    });

  },

  staypage: function()
  {
    $('#com_ques').modal('hide');
    $('body').removeClass('modal-open');
    $('.modal-backdrop').remove();
    $('#myModal').modal('toggle');

  },
  SubmitExam: function()
  {
    console.log("confirmquestionone");
  }




});