<?php

/**
 * The worldMap template file.
 * @package WordPress
 * @subpackage EzequielM
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off
 */
require 'eze_functions.php';
?>
<?php
get_header();
?>
<style>
    body {
            padding: 0;
            margin: 0;
        }
        html, body, #map {
            height: 100%;
        }
    .leaflet-marker-icon.leaflet-marker-photo.leaflet-zoom-animated.leaflet-clickable{
        width: 80px !important;
        height: 50px !important;
        visibility: visible;
    }
</style>
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/leaflet/v0.7.7/leaflet.css" />
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/leaflet/MarkerCluster.css" />	
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/leaflet/Leaflet.Photo.css" />	




<!--NAV BAR SECTION START-->    
<?php do_nav_bar() ?>
<!--NAV BAR SECTION END-->  
	

<!--MAP SECTION START-->
<section id="work" style="width: 100%; height: 100%;padding: 0px">
   
    <div id="mapp" style="width: 100%; height: 100%;position: absolute;padding-bottom: 100px;overflow: no-display;padding: 0px"></div>
         
</section>
<!--MAP SECTION END-->      
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/reqwest.min.js"></script>
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/leaflet/v0.7.7/leaflet.js"></script>
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/leaflet/leaflet.markercluster-src.js"></script>	
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/leaflet/Leaflet.Photo.js"></script>	
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/photos.js"></script>
<script src='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.standalone.js'></script>
<link href='https://api.mapbox.com/mapbox.js/v2.4.0/mapbox.css' rel='stylesheet' />
<link rel="stylesheet" href="../wp-content/themes/EzequielM/assets/css/theme.css" />


<script>

	L.mapbox.accessToken = 'pk.eyJ1IjoiZXplcXVpZWxtIiwiYSI6ImNpajdoaThpZjAwNWp3Z20zOWsyNW1ubXcifQ.H0i8qLcZsbWtyZPPBVZCEg';
        var map = L.map('mapp', { attributionControl:false });
        map.setView([20, 0], 3);
        L.mapbox.styleLayer('mapbox://styles/ezequielm/cij7hk832007dapktzdyaemih').addTo(map);

	var photoLayer = L.photo.cluster().on('click', function (evt) {
		var photo = evt.layer.photo,
		template = '<div><a href="{url}" target="blank"/><img src="{thumbnail}"/></a></div>';
		evt.layer.bindPopup(L.Util.template(template, photo), {
			className: 'leaflet-popup-photo'
		}).openPopup();
	});
        var imageUrlFolds = '<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/leaflet/images/paperfolds_768_2.png',
        imageBoundsFolds = [[90, -180], [-90, 180]];
        var imageUrlNoise = '<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/leaflet/images/noise_256.png',
        imageBoundsNoise = [[90, -180], [-90, 180]];
        var imageUrlShipChase = '<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/leaflet/images/ship_chase_200.png',
        imageBoundsShipChase = [[35, -75], [20, -55]];
        var imageUrlShipBilander = '<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/leaflet/images/ship_bilander_400.png',
        imageBoundsShipBilander = [[0, -28], [-23, -5]];
        var imageUrlShipJunk = '<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/leaflet/images/ship_junk_300.png',
        imageBoundsShipJunk = [[22, 129], [6, 145]];
        var imageUrlShipketch = '<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/leaflet/images/ship_ketch_400.png',
        imageBoundsShipketch = [[6, 52], [-8, 71]];
        var imageUrlShipsloop = '<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/leaflet/images/ship_sloop_200.png',
        imageBoundsShipsloop = [[-61, -44], [-69, -24]];
        var imageUrlShipsgaleon = '<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/leaflet/images/ship_galleon_300.png',
        imageBoundsShipgaleon = [[53, -25], [44, -8]];
        
        
        L.imageOverlay(imageUrlFolds, imageBoundsFolds, {opacity:.6}).addTo(map);
        L.imageOverlay(imageUrlNoise, imageBoundsNoise, {opacity:.1}).addTo(map);
        L.imageOverlay(imageUrlShipChase, imageBoundsShipChase, {opacity:0.5}).addTo(map);
        L.imageOverlay(imageUrlShipBilander, imageBoundsShipBilander, {opacity:0.5}).addTo(map);
        L.imageOverlay(imageUrlShipJunk, imageBoundsShipJunk, {opacity:0.5}).addTo(map);
        L.imageOverlay(imageUrlShipketch, imageBoundsShipketch, {opacity:0.5}).addTo(map);
        L.imageOverlay(imageUrlShipsloop, imageBoundsShipsloop, {opacity:0.5}).addTo(map);
        L.imageOverlay(imageUrlShipsgaleon, imageBoundsShipgaleon, {opacity:0.5}).addTo(map);

	reqwest({
		url: 'https://picasaweb.google.com/data/feed/api/user/118196887774002693676/albumid/6052628080819524545?alt=json-in-script',
		type: 'jsonp',
		success: function (data) {
			photoLayer.add(jsonPhotos).addTo(map);
			
		}
	});



	</script>
