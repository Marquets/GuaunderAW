$(document).ready(function(){


// Cuando se hace click en la rueda, aparece un input para cambiar el nombre
  $("#rueda_nombre").click(function(){
    $("#nombre").html('<input id="name" type="text" name="nombre">');
    $("#name").change(function(){
       var nombre = $("#name").val();
      $("#nombre").html(nombre);
    });
  });


// Cuando se hace click en la rueda, aparece un input para cambiar la edad
  $("#rueda_edad").click(function(){
   $("#edad").html('<input id="age" type="text" name="edad">');
    $("#age").change(function(){
      var edad = $("#age").val();
      $("#edad").html(edad);
    });  
   });


// Cuando se hace click en la rueda, aparece un input para cambiar la información personal del modal
  $("#rueda_modal").click(function(){
   $("#desc").html('<input id="info" type="text" name="info">');
    $("#info").change(function(){
      var info = $("#info").val();
      $("#desc").html(info);
    });  
   });

// Elimina las etiquetas de intereses
  $("#btn-erase").click(function(){
   $("#etiquetas").html('');
  });


// Cuando se hace click en la rueda, aparece un input para cambiar los intereses
  $("#btn-añadir").click(function(){
    $("#modal-footer").html('<input id="interes" type="text" name="interes">');
    $("#interes").change(function(){
      var interes = $("#interes").val();
      $("#etiquetas").append('<div id="new_row" class="row"></div>');
      $("#new_row").append('<div class="col-lg-4 col-sm-4 col-xs-4"> <span class= "fade-in">' + interes + '</span></div>');
    });   
  });


// Cuando se hace click en la rueda, aparece un input para cambiar la ubicación
   $("#rueda_ubi").click(function(){
   $("#ubicacion").html('<input id="ubi" type="text" name="ubi">');
    $("#ubi").change(function(){
      var ubi = $("#ubi").val();
    $("#ubicacion").html(ubi);
    });  
   });


}); 



//Esta función es utilizada para hacer funcionar el mapa de google maps.
//Se encarga de iniciarlizar el mapa.


function initAutocomplete() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 40.452896, lng: -3.733513},
          zoom: 13,
          mapTypeId: 'roadmap'
        });

         var marker = new google.maps.Marker({
          position: {lat: 40.452896, lng: -3.733513},
          map: map
          });

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      }


 

