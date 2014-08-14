<?php
/*
Template Name: world-map
*/

?>

<?php get_header();?>

<!-- js needed for map-->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/tags/markerclusterer/1.0/src/markerclusterer.js"></script>
<script type="text/javascript" src="<?php echo bloginfo( 'stylesheet_directory' )?>/mapUtils/infobox.js"></script>

<!-- map style js array-->
<script type="text/javascript" src="<?php echo bloginfo( 'stylesheet_directory' ) . '/css/skins/' . get_option('eze_googleMapsSkin');?>"></script>

<script type="text/javascript">
  function initialize() {
      

    var myMapOptions = {
        mapTypeControlOptions: {
    mapTypeIds: ['Styled', google.maps.MapTypeId.SATELLITE]

  },
overviewMapControl: true,
overviewMapControlOptions: {
  opened: true
},
  center: new google.maps.LatLng(25, 20),

  zoom: 3,
  disableDefaultUI: false, 

  mapTypeId: 'Styled'
    };
    var theMap = new google.maps.Map(document.getElementById("map_canvas"), myMapOptions);
    var styledMapType = new google.maps.StyledMapType(styles, { name: 'Styled' });
    theMap.mapTypes.set('Styled', styledMapType);
    theMap.setTilt(45);

  var world_geometry = new google.maps.FusionTablesLayer({
  query: {
    select: 'geometry',
    from: '1N2LBk4JHwWpOY4d9fobIn27lfnZ5MDy-NoqqRpk',
    where: "Name IN ('Andorra', 'Spain', 'France', 'Ireland', 'United Kingdom', 'United Arab Emirates', 'Vietnam', 'Laos', 'Thailand', 'Indonesia', 'Singapore', 'Germany', 'Italy', 'Switzerland', 'Mexico', 'Brazil', 'Argentina', 'Uruguay', 'Chile', 'Bolivia', 'Paraguay', 'Peru', 'Colombia', 'Singapore', 'Cambodia', 'China', 'Slovenia', 'Netherlands', 'Malaysia')",
  },styles: [{
  
  polygonOptions: {
    fillColor: "#FF0000",
    strokeColor: "#1f0811",
    fillOpacity: 0.09,
    strokeWeight: 1
  }
}],
  map: theMap,
  suppressInfoWindows: true
});

jQuery.get("../worldmapxml", {}, function(data) {

      jQuery(data).find("marker").each(function() {

        var marker = jQuery(this);
        var latlng = new google.maps.LatLng(parseFloat(marker.attr("lat")),
                                    parseFloat(marker.attr("lng")));
        var contentString = marker.attr("html");
        var marker = new google.maps.Marker({position: latlng, map: theMap});
      
    var boxText = document.createElement("div");
    boxText.style.cssText = "border: 1px solid black; margin-top: 8px; background: black; padding: 1px;";
    boxText.innerHTML = "<div style=\"width:100%\">" + contentString + "</div>";
    var myOptions = {
       content: boxText
      ,disableAutoPan: false
      ,maxWidth: 0
      ,pixelOffset: new google.maps.Size(-140, 0)
      ,zIndex: null
      ,boxStyle: {
        opacity: 1
       }
      ,closeBoxMargin: "10px 2px 2px 2px"
      ,closeBoxURL: "http://www.google.com/intl/en_us/mapfiles/close.gif"
      ,infoBoxClearance: new google.maps.Size(1, 1)
      ,isHidden: false
      ,pane: "floatPane"
      ,enableEventPropagation: false
    };
    google.maps.event.addListener(marker, "click", function (e) {
      ib.open(theMap, marker);
    });
    var ib = new InfoBox(myOptions);
  });
  });


  }
</script>


<title>WorldMap</title>
</head>
<body onload="initialize()">
  <div id="map_canvas" style="width: 100%; height: 100%"></div>
</body>

</html>