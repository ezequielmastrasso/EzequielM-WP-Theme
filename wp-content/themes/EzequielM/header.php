<?php
/**
 * The Header for the template.
 *
 * @package WordPress
 * @subpackage Eze*/
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 'On');  //On or Off

//Get site Options from admin panel
$siteurl=  get_site_url();
$eze_blog_page = get_option('eze_blog_page');

//Gallery options
$eze_gallery_logo = get_option('eze_logo');
$eze_gallery_ga_id= get_option('eze_ga_id');
$eze_gallery_favicon = get_option('eze_favicon');

//Gallery Images
$eze_gallery_fbThumb = get_option('eze_fbThumbs');
$eze_gallery__mediaRoot = get_option('eze_mediaRoot');
$eze_gallery_width = get_option('eze_gallery_width');
$eze_gallery_height = get_option('eze_gallery_height');
$eze_gallery_highResFolder = get_option('eze_highRes');
$eze_gallery_midRes = get_option('eze_midRes');    
$eze_gallery_thumbs = get_option('eze_thumbs');
$padding= get_option('eze_gallery_padding') . "px " . get_option('eze_gallery_padding') . "px " . get_option('eze_gallery_padding') . "px 0px" ;
$numberOfRows= intval(get_option('eze_gallery_rows')) ;
$image_url =get_post_meta($post->ID, 'gallery_image_url', true);
?>


<!DOCTYPE html>

<html <?php language_attributes(); ?>>
<head>      
    <!-- BOOTSTRAP CORE CSS -->
    <link href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/bootstrap.css" rel="stylesheet" />
    <!-- ION ICONS STYLES -->
    <link href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/ionicons.css" rel="stylesheet" />
    <!-- FONT AWESOME ICONS STYLES -->
    <link href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/font-awesome.css" rel="stylesheet" />
    <!-- EZE CUSTOM CSS -->
    <link href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/theme.css" rel="stylesheet" />
    <link href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/fonts.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.css" />
<link rel="stylesheet" href="<?php echo bloginfo( 'stylesheet_directory' )?>/assets/css/leaflet/MarkerCluster.css" />
<link rel="stylesheet" href="<?php echo bloginfo( 'stylesheet_directory' )?>/assets/css/leaflet/MarkerCluster.Default.css" />
<link rel="stylesheet" href="<?php echo bloginfo( 'stylesheet_directory' )?>/assets/css/leaflet/Leaflet.Photo.css" />
<script src="http://cdn.leafletjs.com/leaflet/v0.7.7/leaflet.js"></script>
<script type="text/javascript" src="<?php echo bloginfo( 'stylesheet_directory' )?>/assets/js/leaflet/leaflet.markercluster-src.js"></script>
<script type="text/javascript" src="<?php echo bloginfo( 'stylesheet_directory' )?>/assets/js/leaflet/Leaflet.Photo.js"></script>
<script type="text/javascript" src="<?php echo bloginfo( 'stylesheet_directory' )?>/assets/js/leaflet/leaflet-providers.js"></script>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="description" content="Ezequiel Mastrasso Medium Format Phase one Photographie Site- Lighting Supervisor">
    
    <meta name="keywords" content="Ezequiel Mastrasso, ezequiel, mastrasso, photos, photographie, Phase One, DF, DF+, Capture One, AFD, AFDII, AF, Medium Format, 645, photography, lighting, TD, technical director, lighter, fur, hair, renderman, 3delight, maya, 3d studio max, xsi, houdini, nuke, linux, shaders, shader writing, mental ray, c, c++, plugins, maya nodes, maya plugins, brown bag films, hugglemonters, henry hugglemonster, doc mcstuffins, peter rabbit, pringles, feu vert, de la post, paris, germany, dusseldorf, italy, indonesia, singapore, asia, europe, united kingdom, ireland, northern ireland, scotland, whales, photography, phase one, P25+, mamiya, afd, afdII, afdIII, canon, high resolution, leaf, leaf aptus, spain, france, rome, south america, america, argentina, laos, china, cambodia, thailand, united araba emirates, geneva, zurich, barcelona, siem reap, bangkok, phiphi, james bond island, cat ba, amsterdam, paris, mount saint mitchell, sligo, galway, connemara, london, cambridge, sion, bled, lake bled, monaco, berlin, hamburg, venice">
    
    <?php
    if (is_single()){
        $mainLocationCategory= get_category_by_slug( "continents" );
        foreach((get_the_category($post->ID)) as $category) {
            if (cat_is_ancestor_of( $mainLocationCategory, $category )){
                $locationBreadCrumbs=wpse85202_get_taxonomy_parents($category,"category", True, " > ", True);
                $locationCategoryText=wpse85202_get_taxonomy_parents($category,"category", False, " ", True);
        break;}}
        //BuiLD MIDRES PATH
        $midResUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . $eze_gallery_midRes . '/' . $image_url;?>
        <title><?php echo single_post_title(); ?> - <?php echo $locationCategoryText?> - <?php echo bloginfo('name') ; ?></title>
        <meta name="twitter:card" content="photo">
        <meta name="twitter:site" content="@ezequielMphoto">
        <meta name="twitter:creator" content="@ezequielMphoto">
        <meta name="twitter:title" content="<?php echo get_the_title() ?>">
        <meta name="twitter:description" content="<?php echo single_post_title(); ?> <?php echo bloginfo('name') ; ?>">
        <meta name="twitter:image" content="<?php echo $midResUrl ?>">
        <meta name="twitter:url" content="<?php the_permalink(); ?> " />
        <meta property=”og:title” content=”<?php echo single_post_title(); ?> <?php echo bloginfo('name') ; ?>”/>
        <meta property=”og:type” content=”article”/>
        <meta property=”og:url” content=”<?php the_permalink(); ?>/>
        <meta property=”og:description” content=”<?php echo single_post_title(); ?> <?php echo bloginfo('name') ; ?>”/>
        <?php 
    }
    elseif (is_category( )) {
        $cat = get_query_var('cat');
        $yourcat = get_category ($cat);?>
        <title><?php echo $yourcat->slug ; ?> - <?php bloginfo('name') ; ?></title>
        <meta name="twitter:card" content="photo">
        <meta name="twitter:site" content="@ezequielMphoto">
        <meta name="twitter:creator" content="@ezequielMphoto">
        <meta name="twitter:title" content="<?php echo $yourcat->slug ; ?> - <?php bloginfo('name') ; ?>">
        <meta name="twitter:description" content="<?php echo $yourcat->slug ; ?> - <?php bloginfo('name') ; ?>">
        <meta name="twitter:url" content="<?php the_permalink(); ?> " />
        <meta property=”og:title” content=”<?php echo $yourcat->slug ; ?> - <?php bloginfo('name') ; ?>”/>
        <meta property=”og:type” content=”article”/>
        <meta property=”og:url” content=”<?php the_permalink(); ?>/>
        <meta property=”og:description” content=”<?php echo $yourcat->slug ; ?> - <?php bloginfo('name') ; ?>”/>
        <?php
    }
    else {?>
        <title><?php bloginfo('name') ; ?></title>
    <?php
        
    }
?>
    
    
    

    
    
    
    
    <!-- img for when liked in facebook-->
    <link rel="image_src" href="http://photos.ezequielm.com/_media/midRes/ch-chengdu_01.jpg" />
    <link rel="image_src" href="http://www.ezequielm.com/iFrameContent/photos/landscapes/thumbs_fb/ch-chengdu_01.jpg" />

    <?php
        /*Get favicon URL*/
        $eze_favicon = get_option('eze_favicon');
        if(!empty($eze_favicon)) { ?>
        <link rel="shortcut icon" href="<?php echo $eze_favicon; ?>" />
    <?php
            }
    ?>

    <?php
        /* Always have wp_head() just before the closing </head>
        * tag of your theme, or you will break many plugins, which
        * generally use this hook to add elements to <head> such
        * as styles, scripts, and meta tags.*/
        wp_head();
    ?>




</head>

<body data-spy="scroll" data-target="#menu-section">                    