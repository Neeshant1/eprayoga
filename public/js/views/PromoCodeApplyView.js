var admin = admin || {};

admin.PromoCodeApplyView = Backbone.View.extend({
    template: $( '#promoCodeApplyTpl' ).html(),
    template1: $( '#popupscript' ).html(),
	initialize: function() {

		 this.collection = new admin.PromoEmployeeCollection();

		 this.examcollection = new admin.PcExamDetailCollection();



        this.render(); 
		     

	},

		events:{
     //  'click #create_addresstype' : 'addressTypeCreate',
     'click #search-employee' :'searchEmployee',
     'click #promo_apply_save' : 'promo_assign',
     'click #close_search'     : 'close_search'
      
	},

	render: function() {

		var self = this;

	    this.$el.html(this.template);	
	    this.$el.append(this.template1);
	    this.$el.find("#emphide").hide();

	  $.when(this.examcollection.fetch()).done(function() {
              
		  	self.renderExams();
		  });

	   
		return this;
	},

	promo_assign:function(e){
		e.preventDefault();

		var self = this;

		//var array = [];
		var selected_emp_id = [],
        selectedList = [];

		$('input[type="checkbox"]:checked').each(function() {

			    empid = parseInt($(this).attr('id'), 10);
				  
				 selected_emp_id.push(empid);
		 });


		var selectedexam = [];
		
		var product_catalog_id = $('input[type="radio"]:checked').val();

		
		if($('input[type="radio"]:checked').length == 0){

			$('#messagepop').text("Please Choose all the fields before Submiting the Exam"); 
 			$('#myModalPopup').modal('show');
 			
			return false;

		} else if($('input[type="checkbox"]:checked').length == 0){
			
			$('#messagepop').text("Please Choose all the fields before Submiting the Exam"); 
 			$('#myModalPopup').modal('show');
 			
			return false;
		} 

		//alert(product_id);


		// $('input[type="radio"]:checked').each(function() {

		// 	    var examid = parseInt($(this).attr('id'), 10);
		
		// 		 var filterexam = self.examcollection.where({id:examid});
		// 		 self.examfilteringcollection = filterexam;


		//  });
		
		// var examdata = this.examfilteringcollection[0].toJSON();
		

		

		  var arremp = [];

          for(var i=0; i< selected_emp_id.length; i++){

		    var emparr = String(JSON.parse(selected_emp_id[i]));
           
            arremp.push({'emp_id':emparr});
           }


		var formdata = {
			"product_catalog_id" : product_catalog_id,
			"employeelist"       : arremp
		};

		

		var requestdata = JSON.stringify(formdata);

		 $.ajax({
                type: 'POST',
                url: '/eprayoga/admin/pc_to_employee',
                data: requestdata,
                contentType:'application/json',
                cache:false,
                success: function(data) {
                   
                      
                    $('#messagepop').text("Promo Code Assign to Selected Employee Successfuly"); 
 					$('#myModalPopup').modal('show');
 					$('.okClass').bind('click', self.routepopup);
 					           
                },
                error: function(data) {
                 var errData = JSON.parse(data.responseText);
                
                   if(errData.code == 401){
                   
                    	var examname = errData.data[0].exam_name;
                    	var empname = errData.data[0].emp_first_name;
                    
                    $('#messagepop').text(empname+" already assigned to these "+ examname +" Exam."); 
 					$('#myModalPopup').modal('show');
                     return false;

                    }    
                }
            });


	},
	routepopup: function(){
    $('.modal-backdrop').remove(); 
   
    self.initialize();
  },

	renderExams:function(){

		var self= this;

		this.examcollection.each(function(item) {

			self.examdata= item;
			this.renderExamItem( item );
		}, this);
	   
	    initializePopover();
	    return this;  
	},

	renderExamItem:function(item){

		var self = this;

		

		//var examattr = item;

		var examattr = item.toJSON();

  //      var examItemView = new admin.PcExamDetailsTemplate({
		// 	model: item
		// });

       var tpl1 = _.template($('#pcExamTemplate').html());
        this.$el.find('#exams_list').append(tpl1(examattr));

	   
	},

	// renderEmployee:function(){

	
	// 	this.collection.each(function(item) {
	// 		this.renderEmployeeItem( item );
	// 	}, this);
	
	//     initializePopover();
	//     return this;  
	// },

	renderEmployeeItem:function(item){

		var self = this;


		self.empdata= item;

		var empattr = item.toJSON();
   
		// var employeeItemView = new admin.PcEmployeeTemplate({
		// 	model: item
		// });

		var tpl1 = _.template($('#searchEmployeeTemplate').html());
        this.$el.find('#emp_list').append(tpl1(empattr));
	

	   // this.$el.find("#emp_list").append(employeeItemView.render().el );
	},

	searchEmployee:function(e){

		e.preventDefault();


            //$('#findStatus').html("");
    var number = $('#number_search').val();
    var band = $('#band_search').val();
    var department = $('#dept_search').val();
    var location = $('#loc_search').val();


   // alert(search);
    var data = {};
    self=this;
    if(department.length >=1 || number.length >=1 || band.length >=1 || location.length >=1)
    {
       

        data.department = department;


       	data.employee_no = number;


       	data.band = band;
       	data.location = location;


   
      //  data.emp_department = department;l
 
      

        //this.empcollection = new admin.EmployeeCollection(); 

        this.collection.fetch({url:'/eprayoga/admin/search_employee_pc',reset: true, data:data, processData: true,
            success: function (coll) {
            //	alert(coll.toJSON());
                $( '#emp_list' ).empty();
                $( '#emp_list' ).unbind();
                self.$el.find("#emphide").show();   

               coll.each(function(item) {
						self.renderEmployeeItem( item );
					}, self);
            
               // var item = coll;                  
                //self.pcemployee.render();

                //self.renderEmployeeItem(item);
            },
            error: function(err) { 
     			errorhandle(data);                   
            }

        });
       // $("#employeeLoadMore").hide();     
      }
     
	},

	close_search : function(e){
		e.preventDefault();
       this.$el.find("#emphide").hide();

	}

});