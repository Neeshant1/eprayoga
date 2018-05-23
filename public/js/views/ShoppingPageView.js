var admin = admin || {};

admin.ShoppingPageView = Backbone.View.extend({
  template: $( '#shotcartTmpl' ).html() ,

  initialize: function(options) {
    var self = this; 
     this.temp="<ul class='selectCatalog'></ul>";
    this.temp1="<ul class='selectSubject'></ul>";
    this.temp2="<ul class='selectTopic'></ul>";
    this.categorycollection = new admin.CategoryCartCollection();
    this.subjectcollection =  new admin.SubjectCartCollection();
    this.topiccollection = new admin.TopicCartCollection();
    this.productcollection = new user.ProductCatalogHomeCollection();
    this.prodColl = new admin.ProductCatalogCollectionUser();
    this.setPage=1;
     this.pageNo = 1;
     this.recIndex = 1;
     this.pagereNO = 1;
      this.render();
      
  },

  events:{
       'click .selectCategory li' : 'SelectCategory',
       'click .selectSubject li' : 'SelectSubject',
       'click .selectTopic li' : 'SelectTopic',
       'click #search' : 'SearchProduct',
       'click .addCart' : 'addCart',
       'click .buyNow' : 'buyNow',
       'keypress #prodSearch' :'prodSearch',
       'click  .previousPage'  : 'PreviousPage',
        'click  .nextPage'  : 'NextPage',
        'click .pageNum' : 'pageNum',
        'click .repreviousPage' : 'repreviousPage',
        'click .renextPage' : 'renextPage',
  },

  render: function() {          
    var self = this; 
      // this.smsListView = new admin.SmsTableView({el: $( '#smsList' )});

      this.$el.html(this.template);

      $.when(self.productcollection.fetch(),
      self.prodColl.fetch()).done(function() {
      
         self.productcollection.each(function(item){
          // var pid = parseInt(item.attributes.id, 10);
          // item.attributes.id = pid;
          // var cid = parseInt(item.attributes.category_id, 10);
          // item.attributes.category_id = cid;
          // var sid = parseInt(item.attributes.subject_id, 10);
          // item.attributes.subject_id = sid;
          // var tid = parseInt(item.attributes.topic_id, 10);
          // item.attributes.topic_id = tid;
          sgst = item.attributes.sgst;
          cgst = item.attributes.cgst;
          igst = item.attributes.igst;
          other_tax1 = item.attributes.other_tax1;
          other_tax2 = item.attributes.other_tax2;
          other_tax3 = item.attributes.other_tax3;
          var price = Number(item.attributes.price);
          var perdisc = Number(item.attributes.discount);
          var tax =Number(sgst) + Number(cgst) + Number(igst) + Number(other_tax1) + Number(other_tax2) + Number(other_tax3);
          var disprice = price * (Number(item.attributes.discount)/100);
          var fiprice = price - disprice;
          var fiTax = ( tax/100) * price;
          var fiprAmt = fiTax + fiprice;
          var notdiscprice = price +fiTax;
          item.set({'discount':perdisc.toFixed(2)});
          item.set({'tax' : fiTax.toFixed(2)});
          item.set({'rate' : price.toFixed(2)});
          item.set({'price':fiprAmt.toFixed(2)});
          item.set({'notdiscprice':notdiscprice.toFixed(2)});
          item.set({'perdisc':perdisc.toFixed(2)});
          self.renderItem(item);
         

      });

        self.Pagination();
        if(self.prodColl.length > 0){
          self.drawCategory();
        }
        
    });
    return this;
  },

  renderItem:function(item){

     var price = Number(item.attributes.price);
     var rate1 = Number(item.attributes.rate);
    var perdisc = Number(item.attributes.discount);
    var tax =Number(sgst) + Number(cgst) + Number(igst) + Number(other_tax1) + Number(other_tax2) + Number(other_tax3);
    var disprice = price * (Number(item.attributes.discount)/100);
    var fiprice = price - disprice;
    var fiTax = ( tax/100) * price;
    var fiprAmt = fiTax + fiprice;
    var perdisc = Number(item.attributes.discount);
    var notdiscprice = price +fiTax;
     item.set({'notdiscprice':rate1.toFixed(2)});
    item.set({'perdisc':perdisc.toFixed(2)});
    var tpl1 = _.template($('#shopCartRowTpl').html());
    this.$el.find('#shopList').append(tpl1(item.toJSON()));

  },

  drawCategory:function(){
   var selectel = $('.selectCategory'); 
   var exists = false;
   var _self = this;

      _self.prodColl.each(function(item){
        $('.selectCategory').find('li').each(function(){
          if($(this).text() == item.get('category_name'))
            exists = true;
        });
        if(exists == false){
            exists = false;
            selectel.append($('<li id="" class="item list-group-item pad" value="'+ item.get('category_id') +'">'+ item.get('category_name') +'</li>'));
      }
    });    
  },

  SelectCategory:function(e){
  e.preventDefault();
    var _self = this;
    if ($(e.target).hasClass('selected')) {
      $(e.target).removeClass('selected');
    } else {
      $(e.target).addClass('selected');
    }
      if ($(e.target).hasClass('selected')) {
        _self.loadSubject($(e.target).val());              
      } else { 
        $(".selectSubject").empty();
        $(".selectSubject").unbind();  
        $(".selectTopic").empty();
        $(".selectTopic").unbind();    
         $(".selectCategory").find('li.selected').each(function(){       
           _self.loadSubject($(this).val());
         });

      }    
  },

  loadSubject:function(cat_id){


 // var category_id = JSON.stringify(cat_id);
    
  var _self= this;
  var selectel = $('.selectSubject'); 

  var subjectCollection= _self.prodColl.where({category_id:cat_id});

  var subjectCollectionList = new Backbone.Collection(subjectCollection);
  var  exists=false;
  subjectCollectionList.each(function(item){
        $('.selectSubject').find('li').each(function(){
          if($(this).text() == item.get('subject_name'))
            exists = true;
        });
        if(exists == false){
            exists = false;
            selectel.append($('<li id="" class="item list-group-item pad" value="'+ item.get('subject_id') +'">'+ item.get('subject_name') +'</li>'));
      }
    });    
},

SelectSubject:function(e){
  e.preventDefault();
    var _self = this;
    if ($(e.target).hasClass('selected')) {
      $(e.target).removeClass('selected');
    } else {
      $(e.target).addClass('selected');
    }
      if ($(e.target).hasClass('selected')) {
        _self.loadTopic($(e.target).val());              
      } else {      
        $(".selectTopic").empty();
        $(".selectTopic").unbind();
         $(".selectSubject").find('li.selected').each(function(){       
           _self.loadTopic($(this).val());
         });

      }    
  },

loadTopic:function(sub_id){
  // if(typeof sub_id == 'number'){
  //       subject_id = String(sub_id);
  //       console.log(subject_id);
  //    }
  //     else{
  //       subject_id = sub_id;
  //       console.log(subject_id);
  //     }
  var _self= this;
  var selectel = $('.selectTopic'); 
  var topicCollection=_self.prodColl.where({subject_id:sub_id});
  var topicCollectionList = new Backbone.Collection(topicCollection);
  var  exists=false;
  topicCollectionList.each(function(item){
    $('.selectTopic').find('li').each(function(){
          if($(this).text() == item.get('topic_name'))
            exists = true;
        });
        if(exists == false){
            exists = false;
            selectel.append($('<li id="" class="item list-group-item pad" value="'+ item.get('topic_id') +'">'+ item.get('topic_name') +'</li>'));
      }
    });  
},

SelectTopic:function(e){
  e.preventDefault();
    var _self = this;
    if ($(e.target).hasClass('selected')) {
      $(e.target).removeClass('selected');
    } else {
      $(e.target).addClass('selected');
    }    
},

SearchProduct:function(){  
  $("#shopList").empty();
  $("#shopList").unbind();
 
 // $('#addCart').bind('click', this.addCart);
  var _self = this;
  var tpl = '';
  var selectedcategory =[],
      selectedsubject = [],
      selectedtopic=[];
  var selectedcategoryCollection =[],
      selectedsubjectCollection = [],
      selectedtopicCollection=[];    
  var finalResult = '' ;
  $(".selectCategory").find('li.selected').each(function(){     
        selectedCatID = $(this).val();
         selectedcategory.push(selectedCatID);
        
    });
    $(".selectSubject").find('li.selected').each(function(){  
      selectedSubID = $(this).val();
        
      selectedsubject.push(selectedSubID);

    });
    $(".selectTopic").find('li.selected').each(function(){    
        selectedTopID = $(this).val();
       
       selectedtopic.push(selectedTopID);
    });
   var search = $('#prodSearch').val();
   var searchdata = {};
    if(search.length >=1 )
    {
     searchdata.search = search;   
    }

    if(selectedcategory.length >=1 )
    {
    searchdata.selectedcategory = selectedcategory.toString();;   
    }

    if(selectedsubject.length >=1 )
    {
    searchdata.selectedsubject = selectedsubject.toString();;   
    }

    if(selectedtopic.length >=1 )
    {
    searchdata.selectedtopic = selectedtopic.toString();;   
    }
 
    $.ajax({
      url: "/eprayoga/admin/get_searchresult",
      type: "POST",
      data:JSON.stringify(searchdata),
      contentType:'application/json',
      cache:false,
      success: function(data) {
        console.log(data);
        for(var i=0;i<data.data.length;i++){
           sgst = data.data[i].sgst;
            cgst = data.data[i].cgst;
            igst = data.data[i].igst;
            other_tax1 = data.data[i].other_tax1;
            other_tax2 = data.data[i].other_tax2;
            other_tax3 = data.data[i].other_tax3;
            var price = Number(data.data[i].price);
            var perdisc = Number(data.data[i].discount);
            var tax =Number(sgst) + Number(cgst) + Number(igst) + Number(other_tax1) + Number(other_tax2) + Number(other_tax3);
            var disprice = price * (Number(data.data[i].discount)/100);
            var fiprice = price - disprice;
            var fiTax = ( tax/100) * price;
            var fiprAmt = fiTax + fiprice;
            var perdisc = Number(data.data[i].discount);
            var notdiscprice = price +fiTax;
            notdiscprice1 = notdiscprice.toFixed(2);
            perdisc1 = perdisc.toFixed(2);
        var tpl = _.template($('#shopCartRowTplSearch').html());
        _self.$el.find('#shopList').append(tpl(data.data[i])); 
        _self.$el.find('#'+data.data[i].id +' #notdiscprice').text("Amount: Rs." + price);
        _self.$el.find('#'+data.data[i].id +' #perdisc').html("Discount: %" + perdisc1);
      }
      },
      error: function(data) {
           errorhandle(data);
  
      }
    });
     $('#paginationList').empty();
    var indexli=$('#paginationList');
    indexli.append('<nav style="text-align: center;"> <ul class="pagination">');
    indexli.find('nav ul').append('<li><a class = "repreviousPage" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>');
    indexli.find('nav ul').append('<li><a class = "renextPage" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>');
   // if(finalResult.length>0){
   //  console.log("final result",finalResult);
   //   for(var i=0;i<finalResult.models.length;i++){
   //    var item = finalResult.models[i].attributes;
   //  var tpl = _.template($('#shopCartRowTpl').html());
   //  _self.$el.find('#shopList').append(tpl(item));
   // }
   // }
},

addCart : function(){
  $('#login-button').trigger('click');
},

buyNow : function(){
  $('#login-button').trigger('click');
},

prodSearch:function (event) {
      //$('#findStatus').html(alert("No Records Found"));
       if(event.which == 13) {
          this.SearchText();
      return false;
      }

  },


SearchText : function()
  {
   
    var search = $('#prodSearch').val();

    var data = {};
    self=this;
    if(search.length >=1 )
    {
        data.description = search;

        this.productcollection.fetch({url:'/eprayoga/admin/search_prod',reset: true, data:data, processData: true,
            success: function (item) {
                $("#shopList").empty();
                $("#shopList").unbind();   
                self.productcollection.each(function(item){
          // datee = Number(item.attributes.valid_days);
          // var today = new Date().toISOString().slice(0, 19).replace('T', ' ');
          // var tomorrow = new Date(Date.now() + datee * 24*3600*1000).toISOString().slice(0, 19).replace('T', ' ');;
          // console.log(today,tomorrow);
          // var pid = parseInt(item.attributes.id, 10);
          // item.attributes.id = pid;
          // var cid = parseInt(item.attributes.category_id, 10);
          // item.attributes.category_id = cid;
          // var sid = parseInt(item.attributes.subject_id, 10);
          // item.attributes.subject_id = sid;
          // var tid = parseInt(item.attributes.topic_id, 10);
          // item.attributes.topproductcollectionic_id = tid;
          // item.set({'from' : today});
          // item.set({'to' : tomorrow});
          sgst = item.attributes.sgst;
          cgst = item.attributes.cgst;
          igst = item.attributes.igst;
          other_tax1 = item.attributes.other_tax1;
          other_tax2 = item.attributes.other_tax2;
          other_tax3 = item.attributes.other_tax3;
          var tax =Number(sgst) + Number(cgst) + Number(sgst) + Number(other_tax1) + Number(other_tax2) + Number(other_tax3);
          var price = Number(item.attributes.price) * Number(item.attributes.discount)/100;
          var disP = Number(item.attributes.price) - price;
          var fiTax = Number(item.attributes.price) * tax/100;
          var fiAmt = fiTax + disP;
          item.set({'tax' : fiTax});
          item.set({'rate' : disP});
          item.set({'amount' : fiAmt});
           self.renderItem(item);
      }); 
               
                // var tpl1 = _.template($('#shotcartTmpl').html());
                // self.$el.append(tpl1(coll));

            },
            error: function(err) {
                errorhandle(err);
                     
            }

        });
          
      }

      if(search.length == 0)
      {            
          skip = 0;
           this.productcollection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $("#shopList").empty();
                  $("#shopList").unbind();   
                  self.render();   
              },       

          }); 
         
      }
    },
Pagination:function(){
    var indexli=$('#paginationList');
    pagesize = 5;
    totalitem = Math.ceil(this.prodColl.length/pagesize);
    indexli.append('<nav style="text-align: center;"> <ul class="pagination">');
    indexli.find('nav ul').append('<li><a href="#" class = "previousPage" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>');
    
    for(var i=1 ; i<=totalitem ; i++){
    
    indexli.find('nav ul').append('<li> <a id="'+i+'"  class="pageNum" > '+i+' </a> </li>');
    }
    indexli.find('nav ul').append('<li><a href="#" class = "nextPage" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>');

  },

PreviousPage:function(){
    --this.pageNo;
    this.renderPagination();
  },
NextPage:function(){
    
    this.pageNo++;
    this.renderPagination();
  },
pageNum:function(e){
    this.pageNo = $(e.target).attr('id');
    this.renderPagination();
  },
renderPagination : function(){

       var self = this;

       this.productcollection.fetch({ url:'/eprayoga/user/get_all_product_home?page='+ this.pageNo,
       
        success:function(item){
          $("#shopList").empty();
          $("#shopList").unbind();  
    
         self.productcollection.each(function(item){
          datee = Number(item.attributes.valid_days);
          var today = new Date().toISOString().slice(0, 19).replace('T', ' ');
          var tomorrow = new Date(Date.now() + datee * 24*3600*1000).toISOString().slice(0, 19).replace('T', ' ');;
          // var pid = parseInt(item.attributes.id, 10);
          // item.attributes.id = pid;
          // var cid = parseInt(item.attributes.category_id, 10);
          // item.attributes.category_id = cid;
          // var sid = parseInt(item.attributes.subject_id, 10);
          // item.attributes.subject_id = sid;
          // var tid = parseInt(item.attributes.topic_id, 10);
          // item.attributes.topproductcollectionic_id = tid;
          item.set({'from' : today});
          item.set({'to' : tomorrow});
          sgst = item.attributes.sgst;
          cgst = item.attributes.cgst;
          igst = item.attributes.igst;
          other_tax1 = item.attributes.other_tax1;
          other_tax2 = item.attributes.other_tax2;
          other_tax3 = item.attributes.other_tax3;
          var tax =Number(sgst) + Number(cgst) + Number(sgst) + Number(other_tax1) + Number(other_tax2) + Number(other_tax3);
          var price = Number(item.attributes.price) * Number(item.attributes.discount)/100;
          var disP = Number(item.attributes.price) - price;
          var fiTax = Number(item.attributes.price) * tax/100;
          var fiAmt = fiTax + disP;
          item.set({'tax' : fiTax});
          item.set({'rate' : disP});
          item.set({'amount' : fiAmt});
           self.renderItem(item);
      }); 

        },
        error:function(data){
         errorhandle(data);

        }
      }); 
  },
  repreviousPage:function(){
    var _self = this;
     this.pagereNO=this.pagereNO-1;
     
    $.ajax({
      url: "/eprayoga/admin/get_searchresult?page="+ this.pagereNO,
      type: "POST",
      contentType:'application/json',
      cache:false,
      success: function(data) {
        if(data.original.data.length  != 0){
          $("#shopList").empty();
          $("#shopList").unbind();
        for(var i=0;i<data.original.data.length;i++){
        var tpl = _.template($('#shopCartRowTpl').html());
        _self.$el.find('#shopList').append(tpl(data.original.data[i])); 
      }
      }
      if(data.original.data.length == 0){
         _self.pagereNO=_self.pagereNO+1;
      }
      },
      error: function(data) {
           errorhandle(data);
  
      }
    });
  },
  renextPage:function(){
    var _self = this;
    this.pagereNO=this.pagereNO+1;
     
    $.ajax({
      url: "/eprayoga/admin/get_searchresult?page="+ this.pagereNO,
      type: "POST",
      contentType:'application/json',
      cache:false,
      success: function(data) {
      if(data.original.data.length != 0){
          $("#shopList").empty();
          $("#shopList").unbind();

        for(var i=0;i<data.original.data.length;i++){
        var tpl = _.template($('#shopCartRowTpl').html());
        _self.$el.find('#shopList').append(tpl(data.original.data[i])); 
      }
      }
      if(data.original.data.length == 0){
         _self.pagereNO=_self.pagereNO-1;
      }
      },
      error: function(data) {
             errorhandle(data);

      }
    });
  }
  
});
