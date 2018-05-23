
var user = user || {};


user.ProductCatalogPageView = Backbone.View.extend({
 template: $( '#shotcartTmpl' ).html(),
 template1: $( '#popupscript' ).html(),
initialize: function() {
 
    this.temp="<ul class='selectCatalog'></ul>";
    this.temp1="<ul class='selectSubject'></ul>";
    this.temp2="<ul class='selectTopic'></ul>";
    this.categorycollection = new admin.CategoryCartCollection();
    this.subjectcollection =  new admin.SubjectCartCollection();
    this.topiccollection = new admin.TopicCartCollection();
    this.productcollection = new user.ProductCatalogUserCollection();
    this.prodColl = new admin.ProductCatalogCollectionUser();
    this.cartDetailCollection = new user.CartDetailCollection();
    this.shopping_cart_master_id = 0;
     user.UserAppRouter.data=0;
     this.setPage=1;
     this.pageNo = 1;
     this.recIndex = 1;
    //this.productcollection.fetch({success:function(data){console.log("data",data);}});
    this.render();
},
events:{
'click #search' : 'SearchProduct',
'click #clear' : 'clearProduct',
'click .selectCategory li' : 'SelectCategory',
'click .selectSubject li' : 'SelectSubject',
'click .selectTopic li' : 'SelectTopic',
'click .selectAll' : 'selectAll',
'click  .buyNow'  : 'buyNow',
'click .addCartcust' : 'addCart',
'keypress #prodSearch' :'prodSearch',
'click  .previousPage'  : 'PreviousPage',
'click  .nextPage'  : 'NextPage',
'click .pageNum' : 'pageNum'
//'click #del_cart'  : 'del_cart'
}, 
render:function(){
  var _self = this;
    this.$el.html(this.template);
    this.$el.append(this.template1);

    $.when(_self.productcollection.fetch(),
     _self.prodColl.fetch(),_self.cartDetailCollection.fetch()).done(function() {
         
         _self.productcollection.each(function(item){
         
          datee = Number(item.attributes.valid_days);
          var today = new Date().toISOString().slice(0, 19).replace('T', ' ');
          var tomorrow = new Date(Date.now() + datee * 24*3600*1000).toISOString().slice(0, 19).replace('T', ' ');;
          item.set({'from' : today});
          item.set({'to' : tomorrow});
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
          var fiTax = ( tax/100) * fiprice;
          var fiprAmt = fiTax + fiprice;
          var notdiscprice = price +fiTax;        
          item.set({'discount':perdisc.toFixed(2)});
          item.set({'tax' : fiTax.toFixed(2)});
          item.set({'rate' : price.toFixed(2)});
          item.set({'price':price.toFixed(2)});
          item.set({'notdiscprice':price.toFixed(2)});
          item.set({'perdisc':perdisc.toFixed(2)});
           _self.renderItem(item);

      });


        
        if(_self.prodColl.length > 0){
         
          _self.drawCategory();
        }
         _self.productList();
          _self.del_cart();
          _self.Pagination();

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
     item.set({'notdiscprice':price.toFixed(2)});
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
            var fiTax = ( tax/100) * fiprice;
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
  
   //   for(var i=0;i<finalResult.models.length;i++){
   //    var item = finalResult.models[i].attributes;
   //  var tpl = _.template($('#shopCartRowTpl').html());
   //  _self.$el.find('#shopList').append(tpl(item));
   // }
   // }
},

clearProduct: function(){
    var _self = this;
   $(".selectCategory").empty();
   $(".selectCategory").unbind();  
   $(".selectSubject").empty();
   $(".selectSubject").unbind();  
   $(".selectTopic").empty();
   $(".selectTopic").unbind(); 
   $("#examTable").empty();
   $("#examTable").unbind(); 
  _self.drawCategory();
},

selectAll : function(){
 
  var selected1 = [],
      selectedList1 = [];
  $(".selectAll").click(function () {
   $(".checkbox").prop('checked', $(this).prop('checked'));
  });
   $('input[name="checkbox"]:checked').each(function() {
    selId = parseInt($(this).attr('id'), 10);
   
    selected1.push(selId);
   
    });
},

buyNow : function(e){
  var _self= this;
  _self.addbuyCart(e);


  // $('#cartDetails1').trigger('click');
//   var selected = [],
//       selectedList = [];
//   // $('input[name="checkbox"]:checked').each(function() {
//   //   selId = parseInt($(this).attr('id'), 10);
//   //  selected.push(selId);
//   // });
//   $('#page-section').empty();
//   $('#page-section').unbind();
//   $('#page-section').append('<div class="col-md-9"> <div class="panel panel-default"><div class="panel-heading">  <h3 class="panel-title">Your Cart</h3> </div><table class="table">  <thead><tr class= "trrc"><th>Product Name</th><th>Description</th><th>Quantity</th><th>Tax</th><th>Discount</th><th>Price</th><th>Delete</th> </tr> </thead> <tbody id="cartList"> </tbody>  </table></div></div> <button type="submit" id="placeOrder" class="btn btn-raised btn-black">Place Order</button> <button type="submit" id="backbut" class="btn btn-raised btn-black">Back</button>')
//   // for(var j=0; j<selected.length; j++){
//   //   selectedList = _.union(selectedList,_self.productcollection.where({id:selected[j]}));
//   // }
//   selectedList = _.union(selectedList,_self.productcollection.where({id:parseInt(e.target.id, 10)}));
//   selectedProdList = new Backbone.Collection(selectedList);

// window.examdataList= selectedProdList;
//   // selectedProdList.each(function(item){
//   //     var template = _.template($('#addingCart').html()); 
//   //     $('#cartList').append(template(item));
//   // });
//     if(selectedProdList.length>0){
//       for(i=0;i<selectedProdList.models.length;i++){
//       item = selectedProdList.models[i].attributes;
//       var template = _.template($('#addingCart').html()); 
//       $('#cartList').append(template(item));
//       _self.del_cart();
//       //$('#del_cart').bind('click',_self.del_cart);
//        user.UserAppRouter.productcollection = selectedProdList;
//       $('#backbut').bind('click',_self.backbut);
//       $('#placeOrder').bind('click', _self.placeOrder);
//       $('.adclass').bind('click', _self.add);
//        $('.minclass').bind('click', _self.minus);
      
//     }
//    }


  
},

del_cart :function(e){
  // $(this).remove();
  $('.del_cart').click(function(){
    alert('Do you want Delete');
   
     var tid = $(this).attr('val');
     // $('#a'+tid).remove();
     $('#placeOrder').hide();
       $.ajax({
                type: 'POST',
                url: '/eprayoga/admin/disable_cart',
                data: tid,
                contentType:'application/json',
                cache:false,
                success: function(data) {
                   $('#a'+tid).remove();
                   
                   getCartCount();
                },
                error: function(data) {
                  errorhandle(data);
                 
                }
         });
   });
   

},

backbut: function() {  
 
  //userRouter.navigate("",{ trigger: true });   
  //window.location.reload();
  Backbone.history.loadUrl(Backbone.history.fragment);
  
},
add : function(e){
    var _self = this;
    var iid = $(e.target).attr('iid');
   
    user.UserAppRouter.productcollection.each(function(item){
          disccoll = item.attributes.discount;
          taxcoll = item.attributes.tax;
          pricecoll = item.attributes.price;

        
    });
          var id  = $(e.target).siblings('input').val();
         
          value1 = Number(id)+1;
    if (value1 >0) {
           $('#a'+iid).find('#quantity').val(value1);

          var tax = $('#a'+iid).find('#tax').html();
          var discount = $('#a'+iid).find('#discount').html();
          var price = $('#a'+iid).find('#price').html();

          
        
          //var quanti = $('#quantity').val();
          var tax1 = (Number(tax) + Number(taxcoll)).toFixed(2);
          var discount1 = (Number(discount) + Number(disccoll)).toFixed(2);
          var price1 = (Number(price) + Number(pricecoll)).toFixed(2);

         
       
          $('#a'+iid).find('#tax').html(tax1);
          $('#a'+iid).find('#discount').html(discount1);
          $('#a'+iid).find('#price').html(price1);
    } 
      
      

},

minus : function(e){
    var _self = this;
    var iid = $(e.target).attr('iid');
   
    user.UserAppRouter.productcollection.each(function(item){
          disccoll = item.attributes.discount;
          taxcoll = item.attributes.tax;
          pricecoll = item.attributes.price;

         
    });
          var id  = $(e.target).siblings('input').val();
         
          value1 = Number(id)-1;
    if (value1 >0) {
           $('#a'+iid).find('#quantity').val(value1);

          var tax = $('#a'+iid).find('#tax').html();
          var discount = $('#a'+iid).find('#discount').html();
          var price = $('#a'+iid).find('#price').html();

          
        
          //var quanti = $('#quantity').val();
          var tax1 = (Number(tax) - Number(taxcoll)).toFixed(2);
          var discount1 = (Number(discount) - Number(disccoll)).toFixed(2);
          var price1 = (Number(price) - Number(pricecoll)).toFixed(2);

         
       
          $('#a'+iid).find('#tax').html(tax1);
          $('#a'+iid).find('#discount').html(discount1);
          $('#a'+iid).find('#price').html(price1);
    } 
  },

placeOrder : function() {

   var data11 = [];
  
    $('#cartList').find('tr').each(function(){
        $(this).find('#quantity').val();
      
        data11.push($(this).find('#quantity').val());
       
      });
   
    user.UserAppRouter.data = data11;
   
     userRouter.navigate("performaaPage", {trigger: true});    
},

productList:function(){
 
  var self  = this;
  $('#productTable').append('<div class="col-lg-12"> <div class="widget"> <div class="table-responsive"> <table class="table"> <thead>  <tr>  <th>Product Id</th> <th>Product Name</th><th>Exam Type</th><th>Label</th><th>Price</th><th>Discount</th><th>Valid days</th></tr> </thead><tbody id="productcatalogContainer">  </tbody> </table> </div>  </div>  </div>')
   
    this.productcollection.each(function(item){
     
      att = item.attributes;
       var tpl1 = _.template($('#productListTableTbl').html());
      self.$el.find('#productcatalogContainer').append(tpl1(att));

    });
   
},

addCart : function(e){
  var _self= this;
  
  // var selectedCount = document.querySelectorAll('input[type="checkbox"]:checked').length;
 
  // $('#cartCount').text(selectedCount);
  // var selected = [],
  var selData = $(e.target).parents('ul').prev().find('p').text();

  this.selectedCartCollection = new Backbone.Collection(null,
    {url: '/eprayoga/admin/add_shopping_cart',
      model : admin.ShoppingCartDetailModel,
      success: function(data){
        
      },
      error : function(err){
        errorhandle(err);
      }
  });
    

 //$('input[name="checkbox"]:checked').each(function() {
      //selected.push($(this).attr('id'));
     
       var selectedProductId = parseInt(e.target.id, 10);
      var selectedProduct = _self.productcollection.where({id:selectedProductId});
      var productCatalog = selectedProduct[0].toJSON();
      existingCheck = _self.cartDetailCollection.where({id:selectedProductId});

      if(existingCheck.length > 0){
           $('#messagepop').text("The product is already exist in cart !!"); 
           $('#myModalCust').modal('show');
              return false;
      } else {
          var  shoppingCartDetailModel = new admin.ShoppingCartDetailModel({
          "id" : productCatalog.id,
          "product_catalog_id":productCatalog.id,
          "shopping_cart_master_id" : _self.shopping_cart_master_id,
          "valid_from": productCatalog.from,   
          "valid_to" : productCatalog.to,  
          "order_seq" : 1,
          "price" : productCatalog.price,
          "discount" : productCatalog.discount, 
          "bundle_price" :  productCatalog.bundle_price, 
          "sgst" :  productCatalog.sgst,
          "cgst" : productCatalog.cgst,
          "igst" :  productCatalog.igst,
          "other_tax1" : productCatalog.other_tax1,
          "other_tax2" : productCatalog.other_tax2,
          "other_tax3" : productCatalog.other_tax3,
          "clnt_id" : productCatalog.clnt_id,
          "clnt_group_id" : productCatalog.clnt_group_id,
          "total_tax" : productCatalog.tax,
          "grand_total" : productCatalog.amount,

      });
     
     
 // });
  _self.selectedCartCollection.add(shoppingCartDetailModel);
   _self.cartDetailCollection.add(shoppingCartDetailModel);
 

            $.ajax({
                type: 'POST',
                url: '/eprayoga/admin/add_shopping_cart',
                data: JSON.stringify(_self.selectedCartCollection.toJSON()),
                contentType:'application/json',
                cache:false,
                success: function(data) {
                    _self.shopping_cart_master_id = data;
                    $('#messagepop').text("added successfully in cart."); 
                    $('#myModalCust').modal('show');
                    getCartCount();              
                },
                error: function(data) {
                  
                   $('#messagepop').text("Error while adding a product to the cart !!"); 
                   $('#myModalCust').modal('show');
                         
                }
            });
      }
      


   
},
 //this add cart is buy now function
addbuyCart : function(e){
  var _self= this;
  var selData = $(e.target).parents('ul').prev().find('p').text();
 
  this.selectedCartCollection = new Backbone.Collection(null,
    {url: '/eprayoga/admin/add_shopping_cart',
      model : admin.ShoppingCartDetailModel,
      success: function(data){
        
      },
      error : function(err){
        
      }
  });
    
 

      
       var selectedProductId = parseInt(e.target.id, 10);
      var selectedProduct = _self.productcollection.where({id:selectedProductId});
     
      var productCatalog = selectedProduct[0].toJSON();
      existingCheck = _self.cartDetailCollection.where({id:selectedProductId});
     
      if(existingCheck.length > 0){
           $('#cartDetails1').trigger('click'); 
      } else {
            var  shoppingCartDetailModel = new admin.ShoppingCartDetailModel({
          "product_catalog_id":productCatalog.id,
          "shopping_cart_master_id" : _self.shopping_cart_master_id,
          "valid_from": productCatalog.from,   
          "valid_to" : productCatalog.to,  
          "order_seq" : 1,
          "price" : productCatalog.price,
          "discount" : productCatalog.discount, 
          "bundle_price" :  productCatalog.bundle_price, 
          "sgst" :  productCatalog.sgst,
          "cgst" : productCatalog.cgst,
          "igst" :  productCatalog.igst,
          "other_tax1" : productCatalog.other_tax1,
          "other_tax2" : productCatalog.other_tax2,
          "other_tax3" : productCatalog.other_tax3,
          "clnt_id" : productCatalog.clnt_id,
          "clnt_group_id" : productCatalog.clnt_group_id,
          "total_tax" : productCatalog.tax,
          "grand_total" : productCatalog.amount,

      });
     
  _self.selectedCartCollection.add(shoppingCartDetailModel);
 
            $.ajax({
                type: 'POST',
                url: '/eprayoga/admin/add_shopping_cart',
                data: JSON.stringify(_self.selectedCartCollection.toJSON()),
                contentType:'application/json',
                cache:false,
                success: function(data) {
                    _self.shopping_cart_master_id = data; 
                    
                    getCartCount();
                    $('#cartDetails1').trigger('click');              
                },
                error: function(data) {
                    
                   errorhandle(data);   
                }
            });

      }
    

   
},

prodSearch:function (event) {
      //$('#findStatus').html(alert("No Records Found"));
       if(event.which == 13) {
          console.log('You pressed enter!');
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
        console.log("more 2");
        data.description = search;

        console.log(" search data "+JSON.stringify(data));
    
        console.log(this.productcollection);
        this.productcollection.fetch({url:'/eprayoga/admin/search_prod',reset: true, data:data, processData: true,
            success: function (item) {
                $("#shopList").empty();
                $("#shopList").unbind();    
                self.productcollection.each(function(item){
          console.log(item.attributes);
          datee = Number(item.attributes.valid_days);
          var today = new Date().toISOString().slice(0, 19).replace('T', ' ');
          var tomorrow = new Date(Date.now() + datee * 24*3600*1000).toISOString().slice(0, 19).replace('T', ' ');;
          console.log(today,tomorrow);
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
          console.log(typeof sgst, typeof cgst);
          var tax =Number(sgst) + Number(cgst) + Number(igst) + Number(other_tax1) + Number(other_tax2) + Number(other_tax3);
          var price = Number(item.attributes.price) * Number(item.attributes.discount)/100;
          console.log(Number(item.attributes.price) - price);
          var disP = Number(item.attributes.price) - price;
          var fiTax = Number(disP) * tax/100;
          var fiAmt = fiTax + disP;
          item.set({'tax' : fiTax});
          item.set({'rate' : disP});
          item.set({'amount' : price});
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
          console.log("empty");
          skip = 0;
           this.productcollection.fetch({reset: true, data, processData: true,
              success: function (coll) {
                  $("#shopList").empty();
                  $("#shopList").unbind();   
                  console.log(coll);     
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
    for(var i=1;i<=totalitem;i++){
    
    indexli.find('nav ul').append('<li> <a id="'+i+'"  class="pageNum" > '+i+' </a> </li>');
    }
    indexli.find('nav ul').append('<li><a href="#" class = "nextPage" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>');

  },

PreviousPage:function(){
    console.log("previous page");
    --this.pageNo;
    this.renderPagination();
  },
NextPage:function(){
    
    console.log("next page");
    this.pageNo++;
    this.renderPagination();
  },
pageNum:function(e){
    console.log($(e.target).attr('id'));
    this.pageNo = $(e.target).attr('id');
    this.renderPagination();
  },
renderPagination : function(){

       var self = this;
       console.log("current "+this.productcollection.current_page);

       this.productcollection.fetch({ url:'/eprayoga/user/get_all_product?page='+ this.pageNo,
       
        success:function(item){
          $("#shopList").empty();
          $("#shopList").unbind();  
    
         self.productcollection.each(function(item){
          console.log(item.attributes);
          datee = Number(item.attributes.valid_days);
          var today = new Date().toISOString().slice(0, 19).replace('T', ' ');
          var tomorrow = new Date(Date.now() + datee * 24*3600*1000).toISOString().slice(0, 19).replace('T', ' ');;
          console.log(today,tomorrow);
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
          console.log(typeof sgst, typeof cgst);
          var tax =Number(sgst) + Number(cgst) + Number(sgst) + Number(other_tax1) + Number(other_tax2) + Number(other_tax3);
          var price = Number(item.attributes.price) * Number(item.attributes.discount)/100;
          console.log(Number(item.attributes.price) - price);
          var disP = Number(item.attributes.price) - price;
          var fiTax = Number(disP) * tax/100;
          var fiAmt = fiTax + disP;
          item.set({'tax' : fiTax});
          item.set({'rate' : disP});
          item.set({'amount' : fiAmt});
           self.renderItem(item);
      }); 

        },
        error:function(data){
          alert(JSON.stringify(data));
          errorhandle(data);
        }
      }); 
  }




});