var user = user || {};

user.CartDetailsPageView= Backbone.View.extend({
	template:  $( '#cartDetailsPageTpl' ).html(),
	initialize: function(options) {
		var self = this;
		this.cartDetailCollection = new user.CartDetailCollection();
		this.cartDetailCollection.fetch({ url:'/eprayoga/user/get_all_cart_details',
    	 	//url:'/getAllSubDoc',
    	 	success:function(data){
    	 		self.data = data;
    	 		self.render();

    	 	},
    	 	error:function(data){
    	 		errorhandle(data);
    	 	}
    	}); 
		   
	},

	events : {
		'click #placeOrderCart' : 'placeOrderCart',
		'click #backShop' : 'backShop',
    'click .addclass' : 'add',
    'click .minclass' : 'minus',   
    'click #deleteCart' : 'delpopup',
    'click #del_Country_id' : 'deleteCart',     
	},

	render: function() {	
		var self = this;		
 		this.$el.html(this.template);
 		if(self.cartDetailCollection.length > 0 ){
   		self.cartDetailCollection.each(function(item){
   			
   			att = item.attributes;
        sgst = item.attributes.sgst;
        cgst = item.attributes.cgst;
        igst = item.attributes.igst;
        other_tax1 = item.attributes.other_tax1;
        other_tax2 = item.attributes.other_tax2;
        other_tax3 = item.attributes.other_tax3;
        var price = Number(item.attributes.price);
        var tax =Number(sgst) + Number(cgst) + Number(igst) + Number(other_tax1) + Number(other_tax2) + Number(other_tax3);
        var disprice = price * (Number(item.attributes.discount)/100);
        var fiprice = price - disprice;
        var fiTax = ( tax/100) * fiprice;
       
        var fiprAmt = fiTax + fiprice;
        item.set({'discount':disprice.toFixed(2)});
        item.set({'tax' : fiTax.toFixed(2)});
        item.set({'rate' : price.toFixed(2)});
        item.set({'totalprice':fiprAmt.toFixed(2)});
       
   			var template = _.template($('#cartDetailsRowTpl').html()); 
		    $('#cartPageList').append(template(att));
		  //  $('#deleteCart').bind('click', self.deleteCart);
		      // $('.addclass').bind('click', self.add);
       	// 	$('.minclass').bind('click', self.minus);
   		});
   	} else{
        $('#cartUser').hide();
        $('#placeOrderCart').hide();
        $('#backShop').hide();
        $('#cartHide').append('<center><a><img class="img-responsive" src="js/img/Empty Cart.png" alt="logo"></a><h2>Your Shopping Cart is empty</h2></center>');
    }
    user.UserAppRouter.cartDetailCollection =self.cartDetailCollection;
	},

add : function(e){
    var _self = this;
    var iid = $(e.target).attr('iid');
    name = $('#a'+iid).find('td.name').html();
    collection = this.cartDetailCollection.where({'name' : name});
  
    disccoll = collection[0].attributes.discount;
    taxcoll = collection[0].attributes.tax;
    pricecoll = collection[0].attributes.totalprice;

    
    var id = $(e.target).attr('iid');
    var vid = $('#a'+id).find('#quantity1').val();
     
    value1 = Number(vid)+1;
   
    if(value1 >0)               
          $('#a'+iid).find('#quantity1').val(value1);
             // $('#a'+iid).find('#quantity1').each(function(){
                  var tax = $('#a'+iid).find('td.tax').html();
                  var discount = $('#a'+iid).find('td.discount').html();
                  var price = $('#a'+iid).find('td.price').html();
                 
                  
            
                  //var quanti = $('#quantity').val();
                  var tax1 = (Number(tax) + Number(taxcoll)).toFixed(2);
                  var discount1 = (Number(discount) + Number(disccoll)).toFixed(2);
                  var price1 = (Number(price) + Number(pricecoll)).toFixed(2);
                
                 
    
                $('#a'+iid).find('td.tax').html(tax1);
                $('#a'+iid).find('td.discount').html(discount1);
                $('#a'+iid).find('td.price').html(price1);
            

},

minus : function(e){
    var _self = this;
    var iid = $(e.target).attr('iid');
    name = $('#a'+iid).find('td.name').html();
    collection = this.cartDetailCollection.where({'name' : name});
  
         disccoll = collection[0].attributes.discount;
         taxcoll = collection[0].attributes.tax;
         pricecoll = collection[0].attributes.totalprice;
        
    var id = $(e.target).attr('iid');
    var vid = $('#a'+id).find('#quantity1').val();
   // var id = $(e.target).siblings('input').val();
    
     
    value1 = Number(vid)-1;
    
    if(value1 >0){               
          $('#a'+iid).find('#quantity1').val(value1);
             // $('#a'+iid).find('#quantity1').each(function(){
                  var tax = $('#a'+iid).find('td.tax').html();
                  var discount = $('#a'+iid).find('td.discount').html();
                  var price = $('#a'+iid).find('td.price').html();
                 

            
                  //var quanti = $('#quantity').val();
                  var tax1 = (Number(tax) - Number(taxcoll)).toFixed(2);
                  var discount1 = (Number(discount) - Number(disccoll)).toFixed(2);
                  var price1 = (Number(price) - Number(pricecoll)).toFixed(2);
                 

    
                $('#a'+iid).find('td.tax').html(tax1);
                $('#a'+iid).find('td.discount').html(discount1);
                $('#a'+iid).find('td.price').html(price1);
            
    }
},
delpopup:function(e){
    e.preventDefault();
    
      $('#myModal').modal('show');
         
},
 
deleteCart : function(e) {
   
     var tid = $(e.target).attr('iid');
      $('body').removeClass('modal-open');                
        $('.modal-backdrop').remove();                      
        $('#myModal').modal('toggle');

     
    // $('#placeOrderCart').hide();
         $.ajax({
                type: 'POST',
                url: '/eprayoga/admin/disable_cart',
                data: tid,
                contentType:'application/json',
                cache:false,
                success: function(data) {
                   if(data == 0){
                        $('#placeOrderCart').hide();
                    }
                   $('#a'+tid).remove();
                   
                   getCartCount();
                },
                error: function(data) {
                 
                }
         });
},


placeOrderCart : function(){
	var data11 = [];
	
	$('#cartPageList').find('tr').each(function(){
        $(this).find('#quantity1').val();
        data11.push($(this).find('#quantity1').val());
       
  });

user.UserAppRouter.data = data11;

	appRouter.navigate("performaPageCartUser", {trigger: true});
},

backShop : function(){
	userRouter.navigate("",{ trigger: true });   
	//Backbone.history.loadUrl(Backbone.history.fragment);
}



});