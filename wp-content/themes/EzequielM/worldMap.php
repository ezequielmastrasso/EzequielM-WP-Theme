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
<link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
<link rel="stylesheet" href="<?php echo bloginfo( 'stylesheet_directory' )?>/assets/css/leaflet/MarkerCluster.css" />
<link rel="stylesheet" href="<?php echo bloginfo( 'stylesheet_directory' )?>/assets/css/leaflet/MarkerCluster.Default.css" />
<link rel="stylesheet" href="<?php echo bloginfo( 'stylesheet_directory' )?>/assets/css/leaflet/Leaflet.Photo.css" />
    
    


<!--NAV BAR SECTION START-->    
<?php do_nav_bar() ?>
<!--NAV BAR SECTION END-->  
	

<!--MAP SECTION START-->
<section id="work" style="width: 100%; height: 100%;">
   
    <div id="mapp" style="width: 100%; height: 100%;height: -moz-calc(100% - 10 5px);
        height: -webkit-calc(100% - 105px);
        height: calc(100% - 105px);
        margin-top: 50px;
        margin-bottom: 0px;"></div>
         
</section>
<!--MAP SECTION END-->      

<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
<script type="text/javascript" src="<?php echo bloginfo( 'stylesheet_directory' )?>/assets/js/leaflet/leaflet.markercluster-src.js"></script>
<script type="text/javascript" src="<?php echo bloginfo( 'stylesheet_directory' )?>/assets/js/leaflet/Leaflet.Photo.js"></script>
<script type="text/javascript" src="<?php echo bloginfo( 'stylesheet_directory' )?>/assets/js/leaflet/leaflet-providers.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  


<script>
    var jsonPhotos = [];
    $.getJSON( "<?php echo get_site_url()?>/worldmapjson", function( data ) {
        $.each( data, function( key, val ) {
            $.each( val, function( key, val ) {        
                jsonPhotos.push( {
                    lat: Number(val["lat"]),
                    lng: Number(val["lng"]),
                    url: val["url"],
                    thumbnail: val["thumbnail"]
                })
            });
        });

        console.log(jsonPhotos)

        var map = L.map("mapp"),
            tiles = L.tileLayer.provider('MapBox.Terrain',
            {id: 'ezequielm.97dd5313', accessToken: 'pk.eyJ1IjoiZXplcXVpZWxtIiwiYSI6ImNpajdoaThpZjAwNWp3Z20zOWsyNW1ubXcifQ.H0i8qLcZsbWtyZPPBVZCEg'
            }).addTo(map);

        // Prepare the Photo Layer (with clustering).
        var photoLayer = L.photo.cluster().on('click', function (evt) { // Prepare the click event.
            var photo = evt.layer.photo,
            template = '<div class="leaflet-popup-photo-image"><a href="{url}"/><img src="{thumbnail}"/></a></div>';
            // Here the normal photo opens in a popup.
            evt.layer.bindPopup(L.Util.template(template, photo), {
                className: 'leaflet-popup-photo',
                minWidth: "auto"
            }).openPopup();
        });
        // Finally add photos into Photo Layer and add to map!
        photoLayer.add(jsonPhotos).addTo(map);
        map.fitBounds(photoLayer.getBounds());
        // DEV LOG
        function onMapZoom(e){
            console.log("zoom level: " + map.getZoom())
        }
        map.on('zoomend', onMapZoom);
    });
    </script>


<?php get_footer(); ?>
