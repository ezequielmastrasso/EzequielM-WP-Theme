<head>
<?php
$eze_blog_page = get_option('eze_blog_page');
//Make blog menu active

require 'single_functions.php';
$siteurl=  get_site_url();
$image_url =get_post_meta($post->ID, 'gallery_image_url', true);
$eze_gallery__mediaRoot = get_option('eze_mediaRoot');
$eze_gallery_highResFolder = get_option('eze_highRes');
$eze_gallery_fbThumb = get_option('eze_fbThumbs');
$imageHighRes_url = get_post_meta($post->ID, 'gallery_imageHighRes_url', true);
$imageThumb_fb_url = get_post_meta($post->ID, 'gallery_preview_fb_image_url', true);
//midRes filename
$eze_gallery_midRes = get_option('eze_midRes');
//mid res to show on post
$midResUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . $eze_gallery_midRes . '/' . $image_url;
//facebook thumbnail
$thumb_fbUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . $eze_gallery_fbThumb . '/' . $imageThumb_fb_url;

?>
    

<?php if ( get_post_meta($post->ID, 'gallery_preview_fb_image_url', true)) { 
    //TODO: replace with get_site_url() + post fb thumb site option
    ?>
    
    <link rel="image_src" href="<?php echo get_post_meta($post->ID, 'gallery_preview_fb_image_url', true);?>" />

<?php } else { 
    //TODO: replace with get_site_url() + thumb_fb site option ?>
    <link rel="image_src" href="http://www.ezequielm.com/iFrameContent/photos/panoramaFlash/ir-donegal_holyHead_01.jpg" />		
<?php }
//TODO: replace creator and site with fields from wp panel
?>
<meta name="twitter:card" content="photo">
<meta name="twitter:site" content="@ezequielMphoto">
<meta name="twitter:creator" content="@ezequielMphoto">
<meta name="twitter:title" content="<?php echo get_the_title() ?>">
<meta name="twitter:description" content="Ezequiel Mastrasso Photography ">
<meta name="twitter:image" content="<?php echo $midResUrl ?>">
<meta name="twitter:url" content="<?php the_permalink(); ?> " />

<?php

?>

    
<title> <?php echo get_the_title() ?> </title>
</head>


<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ezequielm.css" rel="stylesheet">
<?php //TODO replace with site option ?>
<link rel="image_src" href="http://www.ezequielm.com/iFrameContent/photos/landscapes/thumbs_fb/ch-chengdu_01.jpg" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_directory' ); ?>/js/menu-cleaned.css">
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/style-cleaned.css" type="text/css" media="all"/>
<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/fonts/fonts.css"> 


<!--[if IE]>
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ie.css" type="text/css" media="all"/>
<![endif]-->
<!--[if IE 7]>
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ie7.css" type="text/css" media="all"/>
<![endif]-->


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

<style type="text/css">
<!--
body {
    background-color: #000000;
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
}
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
    opacity: .7;
    filter: alpha(opacity=70);
   //#width: 282px;
}
.NewsTable:hover {
    opacity: 1.0;
    filter: alpha(opacity=100); /* For IE8 and earlier */
}
-->
</style>


<div style="overflow-y:hidden;width: 100%;height:100%;vertical-align: middle;text-align: center;padding-left: 0%">
                <div style="width: 15%; height:100%;
                            border: 0px;
                            float: left;
                            position: relative;
                            margin-top: 3%;"
                            >
                <?php do_post_panel($post)
                ?>
                    
                </div>
                <?php do_image_div($midResUrl)?>
                
            </div>

                
<?php get_footer(); ?>

