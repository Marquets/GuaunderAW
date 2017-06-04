$(document).ready(function(){
//Esta linea hace aparecer un popover cuando pasamos por encima el ratón de el elemento con id popover
$('#popover').popover();
}); 


//Esta función es utilizada para hacer funcionar el mapa de google maps.
//Se encarga de iniciarlizar el mapa.

function initAutocomplete() {

address = $('#ubicacion').html();
 var geocoder = new google.maps.Geocoder();
 geocoder.geocode({ 'address': address}, function(results, status) {
   if (status == 'OK')
   {
     var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: results[0].geometry.location.lat(), lng: results[0].geometry.location.lng()},
      zoom: 13,
      mapTypeId: 'roadmap'
    });

     var marker = new google.maps.Marker({
      position: {lat: results[0].geometry.location.lat(), lng: results[0].geometry.location.lng() },
      map: map
    });

   }
 });
 
}