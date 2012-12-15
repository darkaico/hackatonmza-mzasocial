<script type="text/javascript">
	function loadMap() {
    new GMaps({
		  div: '#mapa',
		  lat: -12.043333,
		  lng: -77.028333
		});
  }

	$(document).ready(function() { 
	    loadMap();
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