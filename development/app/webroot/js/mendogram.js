var map;
var heatmap;

function getCheckins() {
	var searchUrl = 'http://search.twitter.com/search.json?q=4sq.com&rpp=100&geocode="-32.894579,-68.842495,5mi"&callback=?';
	 $.getJSON(searchUrl, function(data) {
      console.log(data);
      //var tweets = $(data.results).get().reverse();
      var tweets = data.results;
      $.each(tweets, function(index, value) { 
      	if(value.geo !== null) {        		
        	var coor = value.geo.coordinates;

      		var center = new google.maps.LatLng(coor[0], coor[1]);
      		var marker = new google.maps.Marker({
					    position: center,
					    icon: '/img/marcador.png'
					});

					var infowindow = new google.maps.InfoWindow({
				    content: value.text,
				    maxWidth: 200
					});

					google.maps.event.addListener(marker, 'click', function() {
					  infowindow.open(map, marker);
					});
					
					marker.setMap(map);
					heatmap.pushData(coor[0], coor[1],120);

					var postHtml = "<div id='posts'><ul><li><img src='"+value.profile_image_url+
						"' class='picUsuario'><div class='picRedSocial'></div><div class='nombreUsuario'>"+value.from_user+"</div>"+
						"<time class='hora'>00:00hs</time><br><br><p>"+value.text+"</p><br><div class='local'>"+
						"</div></li></ul></div>";



					//$('#timeline').append('<img src="'+value.profile_image_url+'"><p>'+value.text+'</p><p>'+value.created_at+'</p>');
					$('#timeline').append(postHtml);
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
  heatmap = new HeatCanvasOverlayView(map, {'step':0.1, 'degree':HeatCanvas.QUAD, 'opacity':0.8});
}

$(window).ready(function(){
	loadMap();
    getCheckins();
});