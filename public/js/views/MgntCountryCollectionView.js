var admin = admin || {};

admin.MgntCountryCollectionView = Backbone.View.extend({

  initialize: function(options) {
    this.mode = options.mode;
      
      this.collection = new admin.CountryCollection(options.countryCollection);
      this.state_id = options.state_id;
      this.stateCollectionView = null;
      this.stateCollectionView2 = null;

    _.bindAll(this, "renderCountry");
    _.bindAll(this, "render");
    this.render();
  },

  events:{
    "change" : "isSelected"
  },

  render: function() {
      
      //this.$el.html( '<option value="">--Please Select--</option>' );


      //$("#select_country").html('<option value="">--Please Select--</option>' );
      if( this.collection )
      {
        
         // this.$el.html( '<option value="">Select</option>' );

      this.collection.each(function(item) {
         
        this.renderCountry(item);
      }, this );
    } 
      
      return this;
  },

  renderCountry: function( item ) {
    var countryItemView = new admin.MgntCountryItemView({
      model: item
    });
     
      this.$el.append( countryItemView.render().el );
  },

  isSelected:function(){
    var  countryId = $(this.el).val();  
    var requestJson = JSON.stringify({"country_id":countryId});
    var self =this;

     $.when(
              $.ajax({
              url: "/eprayoga/admin/get_state_by_country_id",
                  type: "POST",
                  data: requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   
                    self.statetdata = data                 
                   
                  },
                  error: function(data) {
                         
                  }
                })
                ).done(function(){
                  

                 if(new String(self.mode).valueOf() == new String('address_type1').valueOf()){
                  if( self.stateCollectionView != undefined ) {
                       self.stateCollectionView.collection=new admin.StateCollection(self.statetdata);
                        //$('#select_state').empty();
                        //$('#select_state').unbind();
                         el: $( '#select_state' );
                        $('#select_state').html(' <option value="">--Please Select--</option>');
                        $("#loading-Country").fadeIn('fast');
                        $("#loading-Country").fadeOut('2000');
                        $("#loading-Country1").fadeIn('fast');
                        $("#loading-Country1").fadeOut('2000');
                       self.stateCollectionView.render();
                  }
                  if( self.state_id != undefined ){
                      $('#select_state').val(self.state_id);
                      self.stateCollectionView.isSelected();
                  }
                      
                  } else if(new String(self.mode).valueOf() == new String('address_type2').valueOf()){
                    if( self.stateCollectionView2 != undefined ) {
                       self.stateCollectionView2.collection=new admin.StateCollection(self.statetdata);
                        //$('#select_state2').empty();
                        //$('#select_state2').unbind();
                         el: $( '#select_state2' );
                        $('#select_state2').html(' <option value="">--Please Select--</option>');
                        $("#loading-Country").fadeIn('fast');
                        $("#loading-Country").fadeOut('2000');
                        $("#loading-Country1").fadeIn('fast');
                        $("#loading-Country1").fadeOut('2000');
                       self.stateCollectionView2.render();
                    }
                      if( self.state_id != undefined ){
                        $('#select_state2').val(self.state_id);
                      self.stateCollectionView2.isSelected();
                      }
                      
                  } else {
                    if( self.stateCollectionView != undefined ) {
                       self.stateCollectionView.collection=new admin.StateCollection(self.statetdata);
                        // $('#select_state').empty();
                        // $('#select_state').unbind();
                         el: $( '#select_state' );
                        $('#select_state').html(' <option value="">--Please Select--</option>');

                       self.stateCollectionView.render();
                      }
                      if( self.mode != 'state' ){
                      $('#select_state').val(self.state_id);
                      self.stateCollectionView.isSelected();
                  }
                }
                });
  }

});
