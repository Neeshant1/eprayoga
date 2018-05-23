var user = user || {};

user.PerformaPageCartView= Backbone.View.extend({
	initialize: function(options) {
		var _self = this;
		this.template = options.template;
		this.performaCollection = new user.PerformaCollection();
		this.cartDetailCollection = new user.CartDetailCollection();
		$.when(_self.performaCollection.fetch(),
      		_self.cartDetailCollection.fetch()).done(function() {
      		_self.render();
       
    });
		  this.quantitydata = user.UserAppRouter.data; 
		//  window.cartDetailCollection = this.cartDetailCollection;
	},

	events : {
		'click #confirmOrderCart' : 'confirmOrder',
		'click #usergeneratepdf' : 'usergeneratePDF',
		'click #backShop' : 'backShop'
		
	},

	render: function() {	
		var self = this;		
   		self.performaCollection.each(function(item){
   			
   			att = item.attributes;
   		});
		var template = _.template($('#performaPageCartTpl').html()); 
    	self.$el.append(template(att));

   		var date = new Date();
   		
   		$('#orderDateCart').val(moment().format('D MMM, YYYY'));
   		$('#invoiceDate').val(moment().format('D MMM, YYYY'));
   		
    	var i =0;
    	
   		this.cartDetailCollection.each(function(item){
   			
   			datee = Number(item.attributes.valid_days);
            var today = new Date().toISOString().slice(0, 19).replace('T', ' ');
	        var tomorrow = new Date(Date.now() + datee * 24*3600*1000).toISOString().slice(0, 19).replace('T', ' ');;
	        if(tomorrow <= item.attributes.valid_to){

	        }else{
	        	tomorrow=item.attributes.valid_to;
	        }

	        item.set({'from' : today});
	        item.set({'to' : tomorrow});
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
   			
   			// item.set({'discount':disprice.toFixed(2)});
   			// item.set({'tax' : fiTax.toFixed(2)});
    		item.set({'rate' : price.toFixed(2)});
    		item.set({'totalprice':fiprAmt.toFixed(2)});
    		quantity = String(JSON.parse(self.quantitydata[i++]));
    		
    		fintax = fiTax * quantity;
    		findis = disprice * quantity;
    		fiAmt = fiprAmt * quantity;
    		
    		item.set({'tax' : fintax.toFixed(2)});
    		item.set({'discount' : findis.toFixed(2)});
    		item.set({'amount' : fiAmt.toFixed(2)});
    		item.set({'quantity':quantity});
   			var template = _.template($('#examListTpl').html()); 
    		$('#examShopCartList').append(template(item.attributes));
   			$('#invoiceDate').val(moment().format('D MMM, YYYY'));
   			
   		});
   		
		return this;
	},

	confirmOrder : function(data){
	  var self = this;
	  var selectedCartList = self.cartDetailCollection.toJSON();
	    var requestData = JSON.stringify(selectedCartList);
	   
	            $.ajax({
	                type: 'POST',
	                url: '/eprayoga/admin/confirm_order_cart',
	                data: requestData,
	                contentType:'application/json',
	                cache:false,
	                success: function(data1) {
	                
	                  user.UserAppRouter.orderData = data1;
	                 getCartCount();
	                 //appRouter.navigate("performaPage", {trigger: true}); 
	                 self.performaCollection.each(function(item){
			   			
			   			data = item.attributes;
			   		});          
	                 $('#page-section').empty();
	                 $('#page-section').unbind(); 
	                 var template = _.template($('#InvoicePageTpl').html());  
	                 self.$el.append(template(data));  
	                  $('#promoCodeCartGenerate').bind('click', self.promoCodeGenerate);   
	                  $('#Stay_page').bind('click', self.staypage);
	                  $('#generatepdf2').bind('click', self.usergeneratePDF);
	                 var date1 = new Date();
			   		
			   		$('#orderConfirmDate').val(moment().format('D MMM, YYYY'));

	                },
	                error: function(data) {
	                   
	                   errorhandle(data);    
	                }
	            });

	},

	usergeneratePDF:function(){
			    usergeneratePDF();
			    $('#generatepdf2').hide();
			    $('#usergeneratepdf').hide();
	},


	promoCodeGenerate : function(){
		var self = this;
		 var requestData = JSON.stringify(user.UserAppRouter.orderData);
	    
	    
	              $.ajax({
	                type: 'POST',
	                url: '/eprayoga/admin/generate_promo_code',
	                data: requestData,
	                contentType:'application/json',
	                cache:false,
	                success: function(data) {
	               
	                $('#myModal').modal('toggle');
					$('#com_ques').modal('hide');
					$('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
	                $( "div.success" ).html("Promo code has been generated successfully.");
					$( "div.success" ).fadeIn( 300 ).delay( 5000 ).fadeOut( 400 );
	                 getCartCount();
	                $('#promoGenerate').hide();
	                },
	                error: function(data) {
	                    
	                   errorhandle(data);  
	                }
	            });
	    
	},
backShop : function(){
	appRouter.navigate("",{ trigger: true });   
	//Backbone.history.loadUrl(Backbone.history.fragment);
},

staypage:function(){
  $('#myModal').modal('toggle');
  $('#com_ques').modal('hide');
  $('body').removeClass('modal-open');
  $('.modal-backdrop').remove();
  // userRouter.navigate("startExam", {trigger:true});
}



});