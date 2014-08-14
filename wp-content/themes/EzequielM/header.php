<?php

/**

 * The Header for the template.

 *

 * @package WordPress

 * @subpackage Eze
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off
 */
 



?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>      
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.fullPage.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/js/examples.css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/fonts/fonts.css">
        <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ezequielm.css"> 

<script type="text/javascript">
function myfunction()
{
url='http://photos.ezequielm.com/bycolor/';
url=url+"?r="+document.getElementById('red').value;
url=url+"&g="+document.getElementById('green').value;
url=url+"&b="+document.getElementById('blue').value;
url=url+"&range="+document.getElementById('range').value;
window.open(url,"_self");
}
</script>


<script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jscolor/jscolor.js"></script>
                
        
<title><?php bloginfo('name'); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<meta name="description" content="Ezequiel Mastrasso Medium Format Phase one Photographie Site- Lighting Supervisor">
<meta name="keywords" content="Ezequiel Mastrasso, ezequiel, mastrasso, photos, photographie, photography, lighting, TD, technical director, lighter, fur, hair, renderman, 3delight, maya, 3d studio max, xsi, houdini, nuke, linux, shaders, shader writing, mental ray, c, c++, plugins, maya nodes, maya plugins, brown bag films, hugglemonters, henry hugglemonster, doc mcstuffins, peter rabbit, pringles, feu vert, de la post, paris, germany, dusseldorf, italy, indonesia, singapore, asia, europe, united kingdom, ireland, northern ireland, scotland, whales, photography, phase one, P25+, mamiya, afd, afdII, afdIII, canon, high resolution, leaf, leaf aptus, spain, france, rome, south america, america, argentina, laos, china, cambodia, thailand, united araba emirates, geneva, zurich, barcelona, siem reap, bangkok, phiphi, james bond island, cat ba, amsterdam, paris, mount saint mitchell, sligo, galway, connemara, london, cambridge, sion, bled, lake bled, monaco, berlin, hamburg, venice">

<!-- EzequielM Css for colors, fonts, and off canvas frame-->

<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_directory' ); ?>/fonts/fonts.css"> 
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/style-cleaned.css" type="text/css" media="all"/>



<!-- img for when liked in facebook-->
<link rel="image_src" href="http://www.ezequielm.com/iFrameContent/photos/landscapes/thumbs_fb/ch-chengdu_01.jpg" />
<style>

		/* Sections
		 * --------------------------------------- */
		.li{
			
		}
		.fp-slidesNav span {
			background:none repeat scroll 0% 0% rgb(128, 128, 128);
		}
		.fp-slidesNav .active span {
			background:none repeat scroll 0% 0% rgb(255, 255, 255);
		}
                #menu{
			
			text-align: center;
			margin-top: 0px;
			padding-top: 0px;
			vertical-align: top;
                        width: -moz-calc(100% - 175px);
                        width: -webkit-calc(100% - 175px);
                        width: calc(100% - 175px);
                        margin-left: 175px
		}
                .fp-slides{
                    overflow: visible;
                }
                
		.iFrameSlides{
			width:90%;
			height: -moz-calc(100% - 80px);
                        height: -webkit-calc(100% - 80px);
                        height: calc(100% - 80px);
			margin-top: 80px;
                        
                        
		}
		.iFrameSection{
			width:100%;
			height: -moz-calc(100% - 100px);
                        height: -webkit-calc(100% - 100px);
                        height: calc(100% - 100px);
			margin-top: 80px;
                        margin-bottom: 20px;
                        overflow-y: auto;
		}
                img.border{
                    margin: 0;
                    padding: 0;
                    display: block;
                    float: left;
                 
                }
                body{
                    height:100%;
                    min-height:100%;
                }




	</style>
	<!--[if IE]>
		<script type="text/javascript">
			 var console = { log: function() {} };
		</script>
	<![endif]-->

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>

        <script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.fullPage.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
				sectionsColor: [],
				slidesNavigation: true,
				css3: true,
				paddingtop: '100px',
				paddingBottom: '100px',
				menu: '#menu',
				resize: false
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











<?php

//Get Current page object
$page = get_page($post->ID);
//Get current page id
$current_page_id = '';

if(isset($page->ID))
{
    $current_page_id = $page->ID;
}?>

<?php
    //TODO: What Background???
    /*	Get background */
    $eze_bg = get_option('eze_bg');
    if(!empty($eze_bg))
    { } ?>

<body <?php body_class(); ?>>
<?php 
    $eze_gallery_auto_scroll = get_option('eze_gallery_auto_scroll');
    $eze_logo = get_option('eze_logo');
    $eze_mediaRoot = get_option('eze_mediaRoot');
    $logo_url="/" . $eze_mediaRoot . "/" . $eze_logo ;

?>
    <div align="right" style="position: fixed;top: 0; left: 0;z-index: 900"> <img src="<?php echo $logo_url?>" ></div>
    
    <ul id="menu" >
        <?php 
        $items = wp_get_nav_menu_items( "main" );
        foreach($items as $item)
            {
            echo '<li> <a href=' . $item->url;
            if (is_category( $item->title )){
                echo ' style="color:#FFFFFF"';
            }
            echo ' >' . $item->title . "</a></li>";
            }
            ?>  
</ul>


		       

				    <!-- End main nav -->