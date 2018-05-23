var admin = admin || {};

admin.MgntZoneCollectionView = Backbone.View.extend({

  initialize: function(options) {
    this.mode = options.mode;
   
      $("#loading-zone").hide();
      $("#loading-Country").hide();
      $("#loading-State").hide();
       $("#loading-zone1").hide();
      $("#loading-Country1").hide();
      $("#loading-State1").hide();

       
      this.collection = new admin.ZoneCollection(options.zoneCollection);
     
      this.country_id = options.country_id;
     
      this.countryCollectionView=null;
      this.countryCollectionView2=null;

    _.bindAll(this, "renderZoneCategory");
    _.bindAll(this, "render");
    this.render();
  },

  events:{
     "change" : "isSelected"
  },

  render: function() {
     
      if( this.collection )
      {
        
         // this.$el.html( '<option value="">Select</option>' );
      this.collection.each(function(item) {
         
        this.renderZoneCategory(item);
      }, this );
    }
      return this;
  },

  renderZoneCategory: function( item ) {
    var zoneItemView = new admin.MgntZoneItemView({
      model: item
    });
      this.$el.append( zoneItemView.render().el );
  },

  isSelected: function(){
    
    var  zoneId = $(this.el).val();
    
      
    var requestJson = JSON.stringify({"zone_id":zoneId});
   //$('#select_country').html(' <option value="">--Please Select--</option>');
    var self =this;

     $.when(
              $.ajax({
              url: "/eprayoga/admin/get_country_by_zone_id",
                  type: "POST",
                  data: requestJson,
                  contentType:'application/json',
                  cache:false,
                  success: function(data) {
                   
            
                    self.countrytdata = data
                                     
                  },
                  error: function(data) {
                         
                  }
                })
                ).done(function(){
                 
                 /* if( self.countryCollectionView != undefined )
                  {
                    self.countryCollectionView.collection=new admin.CountryCollection(self.countrytdata);
                    self.countryCollectionView.render();
                  }*/
                  if(new String(self.mode).valueOf() == new String('address_type1').valueOf()){
                      if( self.countryCollectionView != undefined ) {
                        self.countryCollectionView.collection=new admin.CountryCollection(self.countrytdata);
                        //$('#select_country').empty();
                        //$('#select_country').unbind();
                        el: $( '#select_country' );
                       $('#select_country').html(' <option value="">--Please Select--</option>');
                       $("#loading-zone").fadeIn('fast');
                        $("#loading-zone").fadeOut('2000');
                        $("#loading-zone1").fadeIn('fast');
                        $("#loading-zone1").fadeOut('2000');
                        self.countryCollectionView.render();
                      }
                      if( self.country_id != undefined ){
                        $('#select_country').val(self.country_id);
                      self.countryCollectionView.isSelected();
                      }
                      
                  } else if (new String(self.mode).valueOf() == new String('address_type2').valueOf()) {
                    if( self.countryCollectionView2 != undefined ) {
                      self.countryCollectionView2.collection=new admin.CountryCollection(self.countrytdata);
                    //$('#select_country2').empty();
                    //$('#select_country2').unbind();
                      el: $( '#select_country2' );
                       $('#select_country2').html(' <option value="">--Please Select--</option>');
                       $("#loading-zone").fadeIn('fast');
                       $("#loading-zone").fadeOut('2000');
                       $("#loading-zone1").fadeIn('fast');
                        $("#loading-zone1").fadeOut('2000');
                      self.countryCollectionView2.render();
                    }
                    if( self.country_id != undefined ){
                      $('#select_country2').val(self.country_id);
                    self.countryCollectionView2.isSelected();
                    }
                    
                  } else {
                    if( self.countryCollectionView != undefined ) {
                    self.countryCollectionView.collection=new admin.CountryCollection(self.countrytdata);

                    el: $( '#select_country' );
                    $('#select_country').html(' <option value="">--Please Select--</option>');
                    $("#loading-zone").fadeIn('fast');
                       $("#loading-zone").fadeOut('2000');
                       $("#loading-zone1").fadeIn('fast');
                        $("#loading-zone1").fadeOut('2000');
                    self.countryCollectionView.render();
                    }
                   
                    if( self.mode != 'country'){

                    $('#select_country').val(self.country_id);
                    self.countryCollectionView.isSelected();
                    }
                  }
                      
                });

  }

});
