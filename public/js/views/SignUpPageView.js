var admin = admin || {};

admin.SignUpPageView = Backbone.View.extend({
    template: $( '#signuppage' ).html(),
  initialize: function() {
    this.render(); 
  },

  events:{
       'click #selectcustomer' : 'Customer',
       'click #selectclient' : 'Client'
  },
  render: function() {          
      this.$el.html(this.template);
    return this;
  },
  Customer:function(e){
        e.preventDefault();
    appRouter.navigate("renderCustomerRegisterForm", {trigger: true});
  },
   Client:function(e){
        e.preventDefault();
    appRouter.navigate("renderClientCreateForm", {trigger: true});
  }
});
