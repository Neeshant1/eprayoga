var user = user || {};

user.PromoCodePageView = Backbone.View.extend({
 template: $( '#promo_code_search' ).html(),
 template1: $( '#popupscript' ).html(),
initialize: function() {

  
   this.render();
},


    events: {       
        'click #search_promocode': 'searchpromocode',

    },

render:function(){
  var self = this;
    this.$el.html(this.template);
    this.$el.append(this.template1);

        
    return this;
},


searchpromocode : function()
  {
    var self=this;

    var template = _.template($('#customExamlist').html());
    var template1 = _.template($('#customExamlist2').html());
    var search = $('#promoSearch').val();
    var data ={};
    if(search.length >=1 )
    {
     data.search = search;
    $.ajax({
      url: '/eprayoga/user/get_search_promocode',
      type: 'POST',
      contentType:'application/json',
      data:JSON.stringify(data),
      cache:false,
      success: function(data) {
       
        $('#page-section').empty();
        $('#page-section').unbind();
        if(data[0].length != 0){
        $('#page-section').append(template);
        $('#page-section').find('#customExamlist1').append(template1(data[0]));
        vid = data[0].id;
       
        $('#submit_promocode').on("click",function(e){
              $.ajax({
              url:"/eprayoga/user/allocate_promocode_exam",
              type:'POST',
              contentType:'application/json',
              data:JSON.stringify({vid}),
              cache:false,
              success:function(){
                 userRouter.navigate("examCatalog", {trigger:true});
              }
            });
              
            });
        
      }
        if(data.length == 0){
        $('#page-section').append('<center><h2>There is no promo code for your search.</h2></center>');
        }
        
      },
      error: function(data) {
            
               $('#messagepop').text(data.responseJSON.data); 
               $('#myModalCust').modal('show'); 
      }
    });   
          
      }
      if(search.length == 0)
      {            
        $('#messagepop').text("Please enter promo code."); 
        $('#myModalCust').modal('show'); 
      }
  },

    
});
