<head>
<?php if ( get_post_meta($post->ID, 'gallery_preview_fb_image_url', true)) { 
    //TODO: replace with get_site_url() + post fb thumb site option
    ?>
    
    <link rel="image_src" href="<?php echo get_post_meta($post->ID, 'gallery_preview_fb_image_url', true);?>" />

<?php } else { 
    //TODO: replace with get_site_url() + thumb_fb site option ?>
    <link rel="image_src" href="http://www.ezequielm.com/iFrameContent/photos/panoramaFlash/ir-donegal_holyHead_01.jpg" />		
<?php }
?>	

    <title> <?php echo get_the_title() ?> </title>
</head>

<style type="text/css">
  body {
    padding: 5px 0px 0px 5px; }
</style>
<style type="text/css">

img {
    width: auto;
    height: auto;
    max-width: 100%;
    max-height: 90%;
}
.btn{
    padding: 40px 40px;
    
}


 </style>

 
 
 
 
 
 
 
 
 
 
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery-1.10.0.min.js"></script>
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/offCanvasNews.js"></script>
<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/js/bootstrap.min.css" rel="stylesheet">
<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ezequielm.css" rel="stylesheet">
<?php //TODO replace with site option ?>
<link rel="image_src" href="http://www.ezequielm.com/iFrameContent/photos/landscapes/thumbs_fb/ch-chengdu_01.jpg" />

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!-- Jquery and plugins from Bootstrap-->
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery_004.js"></script>
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery-ui.js"></script>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/js/menu-cleaned.css">
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/js/black-cleaned.css" type="text/css" media="all">

<script>
    "use strict";
        $(document).ready(function(){
        new OffCanvasMenuController({
            $menu: $('#left-menu'),
            $menuToggle: $('#left-menu-toggle'),
            menuExpandedClass: 'show-left-menu',
            position: 'left'
        });
    });
 </script>

<?php
    /* Always have wp_head() just before the closing </head>
    * tag of your theme, or you will break many plugins, which
    * generally use this hook to add elements to <head> such
    * as styles, scripts, and meta tags.*/
    wp_head();
?>

<?php
    /*Get favicon URL*/
    $eze_favicon = get_option('eze_favicon');
    if(!empty($eze_favicon)) { ?>
    <link rel="shortcut icon" href="<?php echo $eze_favicon; ?>" />
<?php
	}
?>

<!-- Template stylesheet From WORDPRESS-->
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/style-cleaned.css" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/fonts/fonts.css"> 
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/skins/black.css" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/js/fancybox/jquery.fancybox-1.3.0.css" media="screen"/>

<!--[if IE]>
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ie.css" type="text/css" media="all"/>
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ie7.css" type="text/css" media="all"/>
<![endif]-->



<!-- iScroll -->
<script type="application/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/iscroll/iscroll.js"></script>
<script type="text/javascript">

var myScroll;
function loaded() {
	myScroll = new iScroll('wrapper', { zoom: true });
}
document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
document.addEventListener('DOMContentLoaded', loaded, false);
</script>

<!-- Jquery and plugins from WORDPRESS-->
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.ui.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/fancybox/jquery.fancybox-1.3.0.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/custom.js"></script>

<script>
var open = false;
var big = ($(window).width() >= 720 ? true : false);
$(document).ready(function() {
  $('#navbutton').click(function(){
    $('#menu-bar #inner ul').toggle('blind',{},1000);
    open = (open == true ? false : true);
  });

});

$(window).resize(function() {
  var width = $(window).width();
  if (width <= 720 && big && !open) {
    $('#menu-bar #inner ul').hide();
    if (big)
      big = false;
  }
  if (width > 720) {
    if (!big)
      big = true;
    $('#menu-bar #inner ul').show();
  }
});
</script>
<style type="text/css">
<!--
body {
    background-color: #000000;
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}
.NewsTop {
    border-top-style: 0;
    border-right-style: 0;
    border-bottom-style: solid;
    border-left-style: 0;
    border-color: #69BDE9;
    border-width: 1px;
    width: 292px;
}
.NewsTableFirst {
    border-top-style: 0;
    border-right-style: 0;
    border-bottom-style: 0;
    border-left-style: solid;
    border-color: #2f5569;
    border-width: 1px;
    width: 282x;
}
.NewsTable {
    border-top-style: 0;
    border-right-style: 0;
    border-bottom-style: dotted;
    border-left-style: solid;
    border-right-style: 0;
    border-color: #2f5569;
    border-width: 1px;
    width: 282x;
}
.btn:first-child{
    padding:0px 0px;
background-image:linear-gradient(to bottom,#0C0C0C,#000000);
border-bottom-color:#000000;
}
.btn:hover{
    background-color:#000000;
}

-->
</style>


 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
<?php
$eze_blog_page = get_option('eze_blog_page');
//Make blog menu active
if(!empty($eze_blog_page))
{}

$image_url =get_post_meta($post->ID, 'gallery_image_url', true);
$eze_gallery__mediaRoot = get_option('eze_mediaRoot');
$eze_gallery_highResFolder = get_option('eze_highRes');
$imageHighRes_url = get_post_meta($post->ID, 'gallery_imageHighRes_url', true);

$eze_gallery_midRes = get_option('eze_midRes');
$midResUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . $eze_gallery_midRes . '/' . $image_url;
$siteurl=  get_site_url();


?>
                <!-- Begin content -->
<div id="page_content_wrapper">
    <div class="inner">
        <?php
        if (have_posts()) : while (have_posts()) : the_post();
        ?>
        <!-- Begin each blog post -->

        <div id="outer-wrapper" style="height:80%">
            <div id="inner-wrapper">
                <nav id="left-menu" class="off-canvas-menu">
                    <div id="newsLayer">
                        <div class="NewsTable">
                            <table width="80%" border="0">
                                <tr>
                                    <div class="NewsTable" style="padding:7px;" >post Content:</span><br>
                                        <?php echo the_content()?>
                                    </div>
                                    <div class="NewsTable" style="padding:7px;" >Other links:<br>
                                        <?php if ( get_post_meta($post->ID, 'gallery_imageHighRes_url', true)) {?>
                                        <?php 
                                        if ( in_category( 'gigapan' )) {
                                            $highResUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . '/'. $eze_gallery_highResFolder . '/highRes.html?imagesPanorama=' . $imageHighRes_url; 
                                        }
                                        else{
                                            $highResUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . '/'. $eze_gallery_highResFolder . '/highRes.html?imagesHighRes=' . $imageHighRes_url; 
                                        }?>
                                        <a href="<?php echo $highResUrl;?>" target="_blank">open High Resolution |</a> 
                                        <?php }?>
                                        <?php if ( get_post_meta($post->ID, 'gallery_buyPrint_url', true)) {?>
                                            | <a href="<?php echo get_post_meta($post->ID, 'gallery_buyPrint_url', true);?>" target="_blank">buy print |</a>
                                        <?php } ?>
                                        <?php if ( get_post_meta($post->ID, 'gallery_alternative_url', true)) {?>
                                            | <a href="<?php echo get_post_meta($post->ID, 'gallery_alternative_url', true);?>"target="_blank">alternativeLink</a> |
                                        <?php } ?>
                                    </div>
                                    <?php if ( get_post_meta($post->ID, 'credits', true)){ ?>
                                    <div class="NewsTable" style="padding:7px;" >credits:<br></span>
                                        <?php echo get_post_meta($post->ID, 'credits', true); ?> <br>
                                    </div>
                                    <?php }?>
                                    <div class="NewsTable" style="padding:7px;" >
                                        <div id="fb-root" style="text-align:left"></div><script src="http://connect.facebook.net/en_US/all.js#appId=161605903920447&amp;xfbml=1"></script><fb:like href="<?echo get_permalink( $photo->ID );?>" send="false" width="450" show_faces="false" colorscheme="dark" font=""></fb:like>
                                    </div>
                                    <?php if ( get_post_meta($post->ID, 'gallery_coordLatitude', true)) {?>
                                    <div class="NewsTable" style="padding:7px;" >location:
                                        <br>
                                        <a target="_blank" href="https://maps.google.com/?q=<?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?>,<?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?>&amp;z=7">
                                        <?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?> <?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?><br>
                                         
                                        <span>
                                        <img src="http://maps.googleapis.com/maps/api/staticmap?zoom=8&sensor=false&size=590x140&markers=size:mid|color:red|<?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?>,<?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?>&sensor=false" /> 
                                        </span>
                                        </a>
                                    </div>
                                        <?php }?>
                                        <div class="NewsTable" style="padding:7px;" >Tags And Cats:</span>
                                        <?php echo $post_categories = get_the_category_list() ; ?>
                                    </div>
                                      <div class="NewsTable" style="padding:7px;" >
                                        <?php echo get_option('eze_copyright_text'); ?>
                                    </div>
                                
                                
                                    
                                </tr>
                            </table>
                        </div>
                    </div>
                </nav>
            <div class="navbar navbar-inverse navbar-fixed-top" >
                <div class="navbar-inner" style="height:20px;min-height:20px;">
                    <div class="pull-left" >
                      
                    </div>
                    <div align="center">
                        <?php echo get_option('eze_topBar_text'); ?>
                    </div>
                </div>
            </div>
            <div id="wrapper" style="overflow: hidden;bottom: 0px;">
                <div class="post_wrapper">
                    <div class="post_header" align="center">
                        <button type="button;" id="left-menu-toggle" class="btn btn-navbar off-canvas-menu-toggle" style=".btn:first-child">
                                <img src="<?php echo $midResUrl ?>"/><br>
                        </button>
                        </div>
                    <?php endwhile; endif; ?>

                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>