<?php

/**
 * The single post template file.
 * @package WordPress
 * @subpackage EzequielM */
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 'On');  //On or Off
?>

<?php
    require 'eze_functions.php';

    //PHOTO DATA
    $image_url =get_post_meta($post->ID, 'gallery_image_url', true);
    $imageHighRes_url = get_post_meta($post->ID, 'gallery_image_url', true);
    $imageThumb_fb_url = get_post_meta($post->ID, 'gallery_image_url', true);
    //BuiLD MIDRES PATH
    $midResUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . $eze_gallery_midRes . '/' . $image_url;
    //BuiLD High PATH
    $highResUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . $eze_gallery_highRes . '/imagesHighRes/' . $image_url;
    //BuilD THuMNAIL PATH
    $thumb_fbUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . $eze_gallery_fbThumb . '/' . $imageThumb_fb_url;
?>
    

<?php
    if ( get_post_meta($post->ID, 'gallery_preview_fb_image_url', true)) { 
    //TODO: replace with get_site_url() + post fb thumb site option ?>
    <link rel="image_src" href="<?php echo get_post_meta($post->ID, 'gallery_preview_fb_image_url', true);?>" />
<?php
    }
    else { 
    //TODO: replace with get_site_url() + thumb_fb site option ?>
    <link rel="image_src" href="http://www.ezequielm.com/iFrameContent/photos/panoramaFlash/ir-donegal_holyHead_01.jpg" />		
<?php
    }  //TODO: replace creator and site with fields from wp panel
    ?>
    

<!-- DO HEADER-->
<?php get_header(); ?>

<?php //TODO replace with site option ?>
<link rel="image_src" href="http://www.ezequielm.com/iFrameContent/photos/landscapes/thumbs_fb/ch-chengdu_01.jpg" />

<?php 
    $mainLocationCategory= get_category_by_slug( "continents" );
    foreach((get_the_category($post->ID)) as $category) {
        if (cat_is_ancestor_of( $mainLocationCategory, $category )){
            $locationBreadCrumbs=wpse85202_get_taxonomy_parents($category,"category", True, " > ", True);
            $locationCategoryText=wpse85202_get_taxonomy_parents($category,"category", False, " ", True);
    break;}}
?>
                                    


<body class="">
    <!-- SIDE BAR START -->
    <nav>
        <!-- DO SIDE NAV PANEL -->
        <?php do_post_panel($post) ?>
    </nav>
    <!-- SIDE BAR END -->      
    
    <!-- TOP NAV BAR STARTS -->
    <div class="navbar navbar-inverse navbar-fixed-top" style="background-color:rgba(0,0,0,0)">      
        <!--brand name would be here-->
        <a class="navbar-brand" href="#"><!--LOGO HERE? mmmhhh... not for now--></a>
        <div class="navbar-header pull-right">
          <a id="nav-expander" class="nav-expander fixed">
             &nbsp;<i class="fa fa-bars fa-lg white"></i>
          </a>
        </div>
    </div>
    <!-- TOP NAV BAR ENDS -->
    
    <!-- IMAGE STARTS -->
    <div id="page-content-wrapper">
        <div class="container-fluid xyz nopadding">
            <div class="row" style="margin-right:0px; margin-left: 0px">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 highResContainer nopadding" style="background: url( '<?php echo $midResUrl; ?>') center no-repeat ;-webkit-background-size: contain; -moz-background-size: contain;        -o-background-size: contain;        background-size: contain; height: 100%">
                    <?php
                    if ( in_category( 'highRes' )){
                        list($width,$height ) = getimagesize($highResUrl);?>
                        <script>
                            function init() {

                              var imgDimensions={width:<?php echo $width?>, height:<?php echo $height?>} //this is the height and width of the image. It hasn't been loaded yet.

                              var map = L.map('map', {
                                maxZoom: 1,
                                minZoom: -24,
                                crs: L.CRS.Simple
                              }).setView([imgDimensions.height/2, imgDimensions.width/2], -2);

                              var imageUrl = '<?php echo $highResUrl?>'
                              var imageBounds = [
                                [imgDimensions.height , 0],
                                [0, imgDimensions.width]
                              ];

                              L.imageOverlay(imageUrl, imageBounds).addTo(map);
                            }
                        </script>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- IMAGE ENDS -->
    
<script>
    function loadHighRes() {
        //do map div
        var map='<div class="map" id="map"></div><script>init()<\/script>';
        //delete map class if exists
        $(".map").remove();
        //create the map div
        $(".highResContainer").append(map);
        //close nav bar
        $('body').removeClass('nav-expanded');
    }
</script>
    
      


<!--DO FOOTER-->
<?php get_footer() ?>

