var admin = admin || {};

admin.MgntStateCollectionView = Backbone.View.extend({

  initialize: function(options) {
    this.mode = options.mode;
     
      this.collection = new admin.StateCollection(options.stateCollection);

        this.city_id = options.city_id;
       
    _.bindAll(this, "renderState");
    _.bindAll(this, "render");
    this.render();
  },

  events:{
    "change" : "isSelected"
  },

  render: function() {
     
      //this.$el.html( '<option value="">--Please Select--</option>' );
      if( this.collection )
      {
        
         // this.$el.html( '<option value="">Select</option>' );
      this.collection.each(function(item) {
           
        this.renderState(item);
      }, this );
    }

      return this;
  },

  renderState: function( item ) {
    var stateItemView = new admin.MgntStateItemView({
      model: item
    });
      this.$el.append( stateItemView.render().el );
  },

  isSelected: function(){
    
    var  stateId = $(this.el).val();
    

    var requestJson = JSON.stringify({"state_id":stateId});
   
    var self = this;

     $.when(
              $.ajax({
              url: "/eprayoga/admin/get_city_by_state_id",
                  type: "POST",
                  data: requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   
                    self.citytdata = data
                   
                     
                  },
                  error: function(data) {
                       
                  }
                })
                ).done(function(){    

                  if(new String(self.mode).valueOf() == new String('address_type1').valueOf()){
                    if( self.cityCollectionView != undefined ) {
                      self.cityCollectionView.collection=new admin.CityCollection(self.citytdata);
                      $('#select_city').empty();
                        $('#select_city').unbind();
                        $("#loading-State").fadeIn('fast');
                        $("#loading-State").fadeOut('2000');
                        $("#loading-State1").fadeIn('fast');
                        $("#loading-State1").fadeOut('2000');
                      self.cityCollectionView.render();
                    }
                    if( self.city_id != undefined ){
                       $('#select_city').val(self.city_id);
                    }
                     
                  } else if(new String(self.mode).valueOf() == new String('address_type2').valueOf()){
                    if( self.cityCollectionView2 != undefined ) {
                      self.cityCollectionView2.collection=new admin.CityCollection(self.citytdata);
                      $('#select_city2').empty();
                        $('#select_city2').unbind();
                        $("#loading-State").fadeIn('fast');
                        $("#loading-State").fadeOut('2000');
                        $("#loading-State1").fadeIn('fast');
                        $("#loading-State1").fadeOut('2000');
                      self.cityCollectionView2.render();
                    }
                      if( self.city_id != undefined ){
                          $('#select_city2').val(self.city_id);
                      }
                    
                  } else {
                    if( self.cityCollectionView != undefined ) {
                      self.cityCollectionView.collection=new admin.CityCollection(self.citytdata);
                       $('#select_city').empty();
                        $('#select_city').unbind();
                        $("#loading-State").fadeIn('fast');
                        $("#loading-State").fadeOut('2000');
                        $("#loading-State1").fadeIn('fast');
                        $("#loading-State1").fadeOut('2000');
                      self.cityCollectionView.render();
                    }
                      if( self.city_id != undefined )
                      $('#select_city').val(self.city_id);
                  }

              });

  }


});
