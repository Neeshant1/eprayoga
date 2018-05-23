var admin = admin || {};

admin.PerformaPageViewAdmin= Backbone.View.extend({
	initialize: function(options) {
	 	var _self = this;
		this.template = options.template;
		this.performaCollection = new user.PerformaCollection();
		this.cartDetailCollection = new user.CartDetailCollection();
		$.when(_self.performaCollection.fetch(),
      		_self.cartDetailCollection.fetch()).done(function() {     		
    	 		_self.render();
    	 		
       
    });
      		this.quantitydata = admin.AdminAppRouter.data;
      
	
	},


	events : {
		'click #confirmOrder' : 'confirmOrder',
		'click #admingeneratepdf' : 'generatePDF',
		'click #backShop' : 'backShop'
		
	},

	render: function() {	
		var self = this;		
		
   		self.performaCollection.each(function(item){
   			
   			att = item.attributes;
   		});
		var template = _.template($('#performaPageTpl').html()); 
    	self.$el.append(template(att));

   		var date = new Date();
   		
   		$('#orderDate').val(moment().format('D MMM, YYYY'));
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
   			var dpr = Number(item.attributes.discount)   			
   			var tax =Number(sgst) + Number(cgst) + Number(igst) + Number(other_tax1) + Number(other_tax2) + Number(other_tax3);
   			var disprice = price * (dpr/100);  			
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
    		 $('#examCartList').append(template(item.attributes));
    		 $('#invoiceDate').val(moment().format('D MMM, YYYY'));
   			
   		});


		return this;
	},

	confirmOrder : function(data){
		
	  var self = this;
	  var selectedProdList = self.cartDetailCollection.toJSON();
	  var requestData = JSON.stringify(selectedProdList);
	  
	  // requestData['quantity'] = JSON.parse(user.UserAppRouter.data);
	
	            $.ajax({
	                type: 'POST',
	                url: '/eprayoga/admin/confirm_order',
	                data: requestData,
	                contentType:'application/json',
	                cache:false,
	                success: function(data1) {
	                
	                admin.AdminAppRouter.orderData = data1;
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
	                 $('#generatepdf2').bind('click', self.generatePDF);
	                 var date1 = new Date();
			   		
			   		$('#invoiceDate').val(moment().format('D MMM, YYYY'));
			   		$('#orderConfirmDate').val(moment().format('D MMM, YYYY'));


	                },
	                error: function(data) {
	                  
	                   errorhandle(data);      
	                }
	            });

	},
	generatePDF:function(){
		generatePDF();
		$('#generatepdf2').hide();
	    $('#admingeneratepdf').hide();
	},

	promoCodeGenerate : function(){
		var self = this;
		
	  	var requestData = JSON.stringify(admin.AdminAppRouter.orderData);
	   
	    
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
	                $( "div.success" ).html("Promo code has been generated successfully !!");
					$( "div.success" ).fadeIn( 300 ).delay( 1500 ).fadeOut( 400 );
					getCartCount(); 
	                $('#promoGenerate').hide();
	                },
	                error: function(data) {
	                  
	                   errorhandle(data);       
	                }
	            });
	             
	},

	backShop : function(){
	appRouter.navigate("buyExams",{ trigger: true });   
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