<?php
/*
Template Name: world-map
*/

?>

<?php get_header();?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>WorldMap</title>
    <style>
        body {
            padding: 0;
            margin: 0;
        }
        html, body, #map {
            height: 100%;
        }
        
.leaflet-marker-icon.leaflet-marker-photo.leaflet-zoom-animated.leaflet-clickable
{
    width: 60px !important;
    height: 40px !important;
    visibility: visible;
}

    </style>
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
    <link rel="stylesheet" href="<?php echo bloginfo( 'stylesheet_directory' )?>/assets/css/leaflet/MarkerCluster.css" />
    <link rel="stylesheet" href="<?php echo bloginfo( 'stylesheet_directory' )?>/assets/css/leaflet/MarkerCluster.Default.css" />
    <link rel="stylesheet" href="<?php echo bloginfo( 'stylesheet_directory' )?>/assets/css/leaflet/Leaflet.Photo.css" />
    
</head>
<body>
    <div id="mapp" style="width: 100%; height: 100%;height: -moz-calc(100% - 100px);
                        height: -webkit-calc(100% - 100px);
                        height: calc(100% - 100px);
            margin-top: 80px;
                        margin-bottom: 20px;"></div>

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
        }
            
            )
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
        minWidth: 400
    }).openPopup();
});


photoLayer.add(jsonPhotos).addTo(map);

map.fitBounds(photoLayer.getBounds());

function onMapZoom(e) {

    console.log("zoom level: " + map.getZoom())
}

map.on('zoomend', onMapZoom);

});

// Finally add photos into Photo Layer and add to map!

    </script>
</body>

</html>