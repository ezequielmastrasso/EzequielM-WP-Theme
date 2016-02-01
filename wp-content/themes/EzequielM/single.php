
<?php

/**
 * The single post template file.
 * @package WordPress
 * @subpackage EzequielM */
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 'On');  //On or Off


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
    

<?php if ( get_post_meta($post->ID, 'gallery_preview_fb_image_url', true)) { 
    //TODO: replace with get_site_url() + post fb thumb site option ?>
    
<link rel="image_src" href="<?php echo get_post_meta($post->ID, 'gallery_preview_fb_image_url', true);?>" />

<?php } else { 
    //TODO: replace with get_site_url() + thumb_fb site option ?>
    <link rel="image_src" href="http://www.ezequielm.com/iFrameContent/photos/panoramaFlash/ir-donegal_holyHead_01.jpg" />		
<?php }
//TODO: replace creator and site with fields from wp panel
?>
    


<?php
get_header();
?>

<?php //TODO replace with site option ?>
<link rel="image_src" href="http://www.ezequielm.com/iFrameContent/photos/landscapes/thumbs_fb/ch-chengdu_01.jpg" />

<?php 
                                    $mainLocationCategory= get_category_by_slug( "continents" );
                                    foreach((get_the_category($post->ID)) as $category) {
                                        if (cat_is_ancestor_of( $mainLocationCategory, $category )){
                                            $locationBreadCrumbs=wpse85202_get_taxonomy_parents($category,"category", True, " > ", True);
                                            $locationCategoryText=wpse85202_get_taxonomy_parents($category,"category", False, " ", True);
                                    break;}}?>
                                    

<style type="text/css">
    .NewsTable {
        border-top-style: none;
        border-right-style: none;
        border-bottom-style: dotted;
        border-left-style: none;
        border-right-style: none;
        border-color: #2f5569;
        border-width: 1px;
        padding-bottom: 4px;
        padding-top: 4px;
        padding-left: 4px;
        padding-right: 4px;
        text-align: left;
        opacity: .8;
        filter: alpha(opacity=80);
    }
    .NewsTable:hover {
        opacity: 1.0;
        filter: alpha(opacity=100); /* For IE8 and earlier */
    }#map {
  width: 100%;
  height: 100%;
  background-color: #000000;
}
</style>

<body class="">
   
    <nav>
        
          
          <div class="NewsTable"
                            <table width="80%" border="0">
                                <tr>
                                    <?php if (the_content()){ ?>
                                        <div class="NewsTable" >post Content:<br>
                                            <?php echo the_content()?>
                                        </div>
                                    <?php }?>
                                    
                                    <div class="NewsTable" style="text-align: center">
                                        
                                        
                                        <?php if ( in_category( 'highRes' )) {
                                            if ( in_category( 'gigapan' )) {
                                                $highResUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . '/'. $eze_gallery_highResFolder . '/highRes.html?imagesPanorama=' . $imageHighRes_url; 
                                            ?>

                                            <a href="<?php echo $highResUrl;?>" target="_blank">see High Resolution </a> 
                                            <?php

                                            }
                                            else{?>
                                                <a id="highResLink" href="#">see High Resolution </a>
                                                <?php
                                        }}?>
                                        
                                        
                                        <?php if ( get_post_meta($post->ID, 'gallery_buyPrint_url', true)) {?>
                                            <br><a href="<?php echo get_post_meta($post->ID, 'gallery_buyPrint_url', true);?>" target="_blank">buy print </a>
                                        <?php } ?>
                                        <?php if ( get_post_meta($post->ID, 'gallery_alternative_url', true)) {?>
                                            <br><a href="<?php echo get_post_meta($post->ID, 'gallery_alternative_url', true);?>"target="_blank">open alternativeLink</a>
                                        <?php } ?>
                                    </div>
                                    
                                    <?php if ( get_post_meta($post->ID, 'credits', true)){ ?>
                                        <div class="NewsTable" >credits:<br></span>
                                            <?php echo get_post_meta($post->ID, 'credits', true); ?>
                                        </div>
                                    <?php }?>
                                <br>
                                <div class="NewsTable">Location:<br>
                                    <?php 
                                    $mainLocationCategory= get_category_by_slug( "continents" );
                                    foreach((get_the_category($post->ID)) as $category) {
                                        if (cat_is_ancestor_of( $mainLocationCategory, $category )){
                                            $locationBreadCrumbs=wpse85202_get_taxonomy_parents($category,"category", True, " > ", True);
                                            $locationCategoryText=wpse85202_get_taxonomy_parents($category,"category", False, " ", True);
                                    break;}}?>
                                    <?php echo $locationBreadCrumbs?>
                                        <br>
                                    <?php if ( get_post_meta($post->ID, 'gallery_coordLatitude', true)) {?>
                                
                                            <br>
                                            <a target="_blank" href="https://maps.google.com/?q=<?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?>,<?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?>&amp;z=7">
                                            <p style="text-align: center;">
                                            <img style="width: 100%" src="http://maps.googleapis.com/maps/api/staticmap?zoom=8&sensor=false&size=230x70&markers=size:mid|color:red|<?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?>,<?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?>&sensor=false" /> 
                                            <?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?> <?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?><br>
                                            </a>
                                            </p>
                                            
                                        </div>
                                    <?php }?>
                                    <div class="NewsTable">Tags:</span>
                                        <?php echo $post_categories = get_the_category_list() ; ?>
                                    </div>
                                    <div class="NewsTable">share it!</span>
                                        <br>
                                        <br>
                                        <a class="twitter-share-button"
                                            href="https://twitter.com/share"
                                            data-size="large"
                                            data-count="none"
                                            data-text="Ezequiel Mastrasso -Medium Format Photo &#64;PhaseOnePhoto <?php if ( in_category( 'flash' )) { echo "&#64;Profoto";}; ?>"
                                            data-related="PhaseOnePhoto<?php if ( in_category( 'flash' )) { echo ",Profoto";}; ?>"
                                            data-hashtags="phaseone,CaptureOne<?php if ( in_category( 'flash' )) { echo ",profotob1";}; ?>">
                                            Tweet
                                        </a>
                                        <script>
                                        window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return t;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
                                        </script>
                                    </div>
                                </tr>
                            </table>
                        </div>
        
      </nav>
          
    <div class="navbar navbar-inverse navbar-fixed-top" style="background-color:rgba(0,0,0,0)">      
        
        <!--Include your brand here-->
        <a class="navbar-brand" href="#"><!--LOGO HERE?--></a>
        
        <div class="navbar-header pull-right">
          <a id="nav-expander" class="nav-expander fixed">
             &nbsp;<i class="fa fa-bars fa-lg white"></i>
             
          </a>
            
        </div>
    </div>

    <div id="page-content-wrapper">
            <div class="container-fluid xyz nopadding">
                <div class="row" style="margin-right:0px; margin-left: 0px">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 highResContainer nopadding" style="background: url( '<?php echo $midResUrl; ?>') center no-repeat ;-webkit-background-size: contain; -moz-background-size: contain;        -o-background-size: contain;        background-size: contain; height: 100%">
                        <?php
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
                    </div>
                </div>
            </div>
        </div>
    
<script>
    function loadHighRes() {
    var dsadsasa='<div class="map" id="map"></div><script>init()<\/script>';
    $(".map").remove();
    $(".highResContainer").append(dsadsasa);
      		$('body').removeClass('nav-expanded');
    
    
  }
      
</script>
    
      
</body>
<?php get_footer() ?>

