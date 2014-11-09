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
   //#width: 282px;
}
-->
</style>

<?php
$eze_blog_page = get_option('eze_blog_page');
//Make blog menu active

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
<div style="overflow-y:hidden;width: 100%;height:100%;vertical-align: middle;text-align: center;padding-left: 0%">
                <div style="width: 15%; height:100%;
                            border: 0px;
                            float: left;
                            position: relative;
                            margin-top: 3%;"
                            >
                
                <div class="NewsTable">
                            <table width="80%" border="0">
                                <tr>
                                    <?php if (the_content()){ ?>
                                        <div class="NewsTable" >post Content:<br></span>
                                            <?php echo the_content()?>
                                        </div>
                                    <?php }?>

                                    <div class="NewsTable" style="text-align: center">
                                        <?php if ( get_post_meta($post->ID, 'gallery_imageHighRes_url', true)) {?>
                                        <?php 
                                        if ( in_category( 'gigapan' )) {
                                            $highResUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . '/'. $eze_gallery_highResFolder . '/highRes.html?imagesPanorama=' . $imageHighRes_url; 
                                        }
                                        else{
                                            $highResUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . '/'. $eze_gallery_highResFolder . '/highRes.html?imagesHighRes=' . $imageHighRes_url; 
                                        }?>
                                        <a href="<?php echo $highResUrl;?>" target="_blank">see High Resolution </a> 
                                        <?php }?>
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
                                    <?php if ( get_post_meta($post->ID, 'gallery_coordLatitude', true)) {?>
                                        <div class="NewsTable" >location:
                                            <br>
                                            <a target="_blank" href="https://maps.google.com/?q=<?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?>,<?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?>&amp;z=7">
                                            <p style="text-align: center;">
                                            <?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?> <?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?><br>
                                            <img src="http://maps.googleapis.com/maps/api/staticmap?zoom=8&sensor=false&size=230x70&markers=size:mid|color:red|<?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?>,<?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?>&sensor=false" /> 
                                            </a>
                                            </p>
                                        </div>
                                    <?php }?>
                                    <div class="NewsTable">Tags:</span>
                                        <?php echo $post_categories = get_the_category_list() ; ?>
                                    </div>
                                </tr>
                            </table>
                        </div>
                </div>
                <div style="width: 85%; height:100%;
                            position: relative;
                            border: 0px;
                            float: left;
                            background: url( '<?php echo $midResUrl; ?>') center no-repeat ;
                            -webkit-background-size: contain;
                            -moz-background-size: contain;
                            -o-background-size: contain;
                            background-size: contain;">
                    
                </div>
                
            </div>

                
<?php get_footer(); ?>

