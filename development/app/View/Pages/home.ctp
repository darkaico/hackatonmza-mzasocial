<script type="text/javascript">
	var map;

	function getCheckins() {
		var searchUrl = 'http://search.twitter.com/search.json?q=4sq.com&rpp=100&geocode="-32.894579,-68.842495,1mi"&callback=?';
		 $.getJSON(searchUrl, function(data) {
        console.log(data);

        $.each(data.results, function(index, value) { 
        	if(value.geo !== null) {        		
	        	var coor = value.geo.coordinates;
					  //console.log(value.text);
					  map.addMarker({
						  lat: coor[0],
						  lng: coor[1],
						  title: value.text
						});
        	}
				});        
    });
	}	

	function loadMap() {
    map = new GMaps({
		  div: '#mapa',		
		  mapTypeId: google.maps.MapTypeId.ROADMAP,  
		  lat: -32.894579,
		  lng: -68.842495,
		});
  }

	$(document).ready(function() { 
	    loadMap();
	    getCheckins();
	});	
</script>

<div class="row">
	<div id="header">
		<h1>Mendogram&reg;</h1>
		<p class="lead">
			¿Dónde va el mendocino a la noche? Esta es la pregunta que nos hicimos en el 1er Hackatón de Mendoza. La respuesta la obtenemos desde las redes sociales (Foursquare)
		</p>
	</div>

	<div class="span8">		
		<div id="mapa"></div>
	</div>

	<aside class="span4">Línea de tiempo</aside>
</div>