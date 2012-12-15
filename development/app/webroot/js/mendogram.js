var map;

function getCheckins() {
	var searchUrl = 'http://search.twitter.com/search.json?q=4sq.com&rpp=100&geocode="-32.894579,-68.842495,5mi"&callback=?';
	 $.getJSON(searchUrl, function(data) {
      console.log(data);

      $.each(data.results, function(index, value) { 
      	if(value.geo !== null) {        		
        	var coor = value.geo.coordinates;

      		var center = new google.maps.LatLng(coor[0], coor[1]);
      		var marker = new google.maps.Marker({
					    position: center,
					    icon: '/img/marcador.png',
					    title: value.text
					});

					marker.setMap(map);
      	}
			});        
  });
}	

function loadMap() {

	var center = new google.maps.LatLng(-32.894579, -68.842495);
	map = new google.maps.Map($('#mapa').get(0), {
    center: center,
    zoom: 14,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    zoomControl: true
  });
}

$(document).ready(function() { 
    loadMap();
    getCheckins();
});	