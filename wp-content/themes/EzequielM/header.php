<?php

/**

 * The Header for the template.

 *

 * @package WordPress

 * @subpackage Kin

 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>
<title><?php bloginfo('name'); ?></title>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<meta name="description" content="Ezequiel Mastrasso Medium Format Phase one Photographie Site- Lighting Supervisor">
<meta name="keywords" content="Ezequiel Mastrasso, ezequiel, mastrasso, photos, photographie, photography, lighting, TD, technical director, lighter, fur, hair, renderman, 3delight, maya, 3d studio max, xsi, houdini, nuke, linux, shaders, shader writing, mental ray, c, c++, plugins, maya nodes, maya plugins, brown bag films, hugglemonters, henry hugglemonster, doc mcstuffins, peter rabbit, pringles, feu vert, de la post, paris, germany, dusseldorf, italy, indonesia, singapore, asia, europe, united kingdom, ireland, northern ireland, scotland, whales, photography, phase one, P25+, mamiya, afd, afdII, afdIII, canon, high resolution, leaf, leaf aptus, spain, france, rome, south america, america, argentina, laos, china, cambodia, thailand, united araba emirates, geneva, zurich, barcelona, siem reap, bangkok, phiphi, james bond island, cat ba, amsterdam, paris, mount saint mitchell, sligo, galway, connemara, london, cambridge, sion, bled, lake bled, monaco, berlin, hamburg, venice">

<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery-1.10.0.min.js"></script>
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/bootstrap.min.js"></script>
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/offCanvasNews.js"></script>
<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/js/bootstrap.min.css" rel="stylesheet">
<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/css/ezequielm.css" rel="stylesheet">

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
	border-color: #2f5569;
	border-width: 1px;
	width: 282x;
}
	
-->
</style>







<?php
/**

*	Get Current page object

**/
$page = get_page($post->ID);
/**

*	Get current page id

**/

$current_page_id = '';
if(isset($page->ID))
{
    $current_page_id = $page->ID;
}
?>

<?php
	/*	Get background */
	$eze_bg = get_option('eze_bg');
	if(!empty($eze_bg))
	{
?>

<?php } ?>

<body <?php body_class(); ?>>
	<?php 
		$eze_gallery_auto_scroll = get_option('eze_gallery_auto_scroll');
	?>
    <div id="outer-wrapper" style="height:80%">
        <div id="inner-wrapper">
        	<nav id="left-menu" class="off-canvas-menu">


				<div id="newsLayer">
				<div class="NewsTable">
				<table width="80%" border="0">
				      <tr>
				        <div class="NewsTable" style="padding:5px;" >_Tags by Country_ :</span>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/Argentina/" <?php if (is_category( 'Argentina' )){ ?> style="color:#FFFFFF"  <?php } ?> >    Argentina </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/Andorra/" <?php if (is_category( 'Andorra' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Andorra </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/cambodia/" <?php if (is_category( 'cambodia' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Cambodia </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/china/" <?php if (is_category( 'china' )){ ?> style="color:#FFFFFF"  <?php } ?> >  China </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/france/" <?php if (is_category( 'france' )){ ?> style="color:#FFFFFF"  <?php } ?> >  France </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/germany/" <?php if (is_category( 'germany' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Germany </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/indonesia/" <?php if (is_category( 'indonesia' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Indonesia </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/ireland/" <?php if (is_category( 'ireland' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Ireland </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/italy/" <?php if (is_category( 'italy' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Italy </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/netherlands/" <?php if (is_category( 'netherlands' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Netherlands </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/northernireland/" <?php if (is_category( 'northernireland' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Northern ireland </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/laos/" <?php if (is_category( 'laos' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Laos </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/singapore/" <?php if (is_category( 'singapore' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Singapore </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/slovenia/" <?php if (is_category( 'slovenia' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Slovenia </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/spain/" <?php if (is_category( 'spain' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Spain </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/Switzerland/" <?php if (is_category( 'Switzerland' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Switzerland </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/thailand/" <?php if (is_category( 'thailand' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Thailand </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/united-arab-emirates/" <?php if (is_category( 'united-arab-emirates' )){ ?> style="color:#FFFFFF"  <?php } ?> >  United Arab Emirates </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/unitedkingdom/" <?php if (is_category( 'unitedkingdom' )){ ?> style="color:#FFFFFF"  <?php } ?> >  United Kingdom </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/vietnam/" <?php if (is_category( 'vietnam' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Vietnam </a>
						</div>

						<div class="NewsTable" style="padding:5px" >_Tags by Continent_ :</span>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/asia/" <?php if (is_category( 'asia' )){ ?> style="color:#FFFFFF"  <?php } ?> >  asia</a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/europe/" <?php if (is_category( 'europe' )){ ?> style="color:#FFFFFF"  <?php } ?> >  europe</a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/middleEast/" <?php if (is_category( 'middleEast' )){ ?> style="color:#FFFFFF"  <?php } ?> >  middleEast</a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/southAmerica/" <?php if (is_category( 'southAmerica' )){ ?> style="color:#FFFFFF"  <?php } ?> > southAmerica </a>
						</div>

						<div class="NewsTable" style="padding:5px" >_Tags Miscelaneous_ :</span>
						<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/aerial/" <?php if (is_category( 'aerial' )){ ?> style="color:#FFFFFF"  <?php } ?> >  aerial</a>
						<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/macro/" <?php if (is_category( 'macro' )){ ?> style="color:#FFFFFF"  <?php } ?> >  macro</a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/templesAndReligion/" <?php if (is_category( 'templesAndReligion' )){ ?> style="color:#FFFFFF"  <?php } ?> >  templesAndReligion</a>
						<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/weather/" <?php if (is_category( 'weather' )){ ?> style="color:#FFFFFF"  <?php } ?> >  weather</a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/water/" <?php if (is_category( 'water' )){ ?> style="color:#FFFFFF"  <?php } ?> >  water</a>
						</div>

						<div class="NewsTable" style="padding:5px" >_Tags by Camera_ :</span>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/phaseonep25plus/" <?php if (is_category( 'phaseonep25plus' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Phase One P25+</a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/phaseonedf/" <?php if (is_category( 'phaseonedf' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Phase One DF</a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/mamiyaafdiii/" <?php if (is_category( 'mamiyaafdiii' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Mamiya AFDIII</a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/canon5dmarkii/" <?php if (is_category( 'canon5dmarkii' )){ ?> style="color:#FFFFFF"  <?php } ?> > Canon 5d Mark II </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/canon7d/" <?php if (is_category( 'canon7d' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Canon 7d </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/canon400d/" <?php if (is_category( 'canon400d' )){ ?> style="color:#FFFFFF"  <?php } ?> > Canon 400d </a>
						</div>
						<div class="NewsTable" style="padding:5px" >_Tags by flash_ :</span>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/profoto/" <?php if (is_category( 'profoto' )){ ?> style="color:#FFFFFF"  <?php } ?> >  profoto</a>

						</div>

						<div class="NewsTable" style="padding:5px" >_Tags by Size_ :</span>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/gigapan/" <?php if (is_category( 'gigapan' )){ ?> style="color:#FFFFFF"  <?php } ?> >  gigapan</a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/highres/" <?php if (is_category( 'highres' )){ ?> style="color:#FFFFFF"  <?php } ?> >  high resolution</a>
						</div>


						<div class="NewsTable" style="padding:5px" >_Tags by Format_ :</span>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/mediumformat/" <?php if (is_category( 'mediumformat' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Medium Format</a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/fullframe/" <?php if (is_category( 'fullframe' )){ ?> style="color:#FFFFFF"  <?php } ?> >  35mm full frame</a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/aps/" <?php if (is_category( 'aps' )){ ?> style="color:#FFFFFF"  <?php } ?> >  35mm 1.6x crop</a>
						</div>

						<div class="NewsTable" style="padding:5px" >_Tags by Lens_ :</span>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/mamiya80mm28afd/" <?php if (is_category( 'mamiya80mm28afd' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Phase One 80mm f2.8 AF _ </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/mamiya150mm35af/" <?php if (is_category( 'mamiya150mm35af' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Mamiya 150mm f3.5 AF _ </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/mamiya210mm40af/" <?php if (is_category( 'mamiya210mm40af' )){ ?> style="color:#FFFFFF"  <?php } ?> >  M</span>amiya 210mm f4.0 MF _ </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/canonl24-70mm28/" <?php if (is_category( 'canonl24-70mm28' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Canon L 24-70mm f2.8 _ </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/canonl70-200mm28/" <?php if (is_category( 'canonl70-200mm28' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Canon L 70-200mm f2.8 _ </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/canonl17-40mm40/" <?php if (is_category( 'canonl17-40mm40' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Canon L 17-40mm f4.0 _ </a>
							<a class="topbar-cta-link" href="http://photos.ezequielm.com/category/canon50mm14/" <?php if (is_category( 'canon50mm14' )){ ?> style="color:#FFFFFF"  <?php } ?> >  Canon L 50mm f1.4 _ </a>
						</div>
				      </tr>
				    </table>
				</div>

				</div>





          	</nav>
            <div class="navbar navbar-inverse navbar-fixed-top" >
              <div class="navbar-inner" style="height:20px;min-height:20px;">
                <div class="pull-left" >
                  <button type="button;" style="text-align=left" id="left-menu-toggle" class="btn btn-navbar off-canvas-menu-toggle" ><div class="blancoBold">
                    <img src=http://www.ezequielm.com/iFrameContent/webImages/leftArrow.png> tags </div>
                  </button>
                </div>
                                <div align="center">
                <span class="blancoBold">3d Lighting & Visual effects</span> <a class="blancoBold" href="http://www.ezequielm.com/">-> ezequielm.com</a>
              </div>
            </div>
            </div>
			<input type="hidden" id="eze_gallery_auto_scroll" name="eze_gallery_auto_scroll" value="<?php echo $eze_gallery_auto_scroll; ?>"/>
			<?php
				$eze_gallery_slider_speed = get_option('eze_gallery_slider_speed'); 
				if(empty($eze_gallery_slider_speed))
				{
					$eze_gallery_slider_speed = 5;
				}
			?>
			<div id="menu-bar">
			  <div id="inner">
			    <div class="accent"></div>
			    <a href= "http://photos.ezequielm.com" class="logo"><img src="http://www.ezequielm.com/iFrameContent/photoGallery/photoGallery.png"></a>
			    <!--Start Facebook-->
				<div style="float: right; margin-left: 0px;margin-top: 4px">
					<iframe style="align: right" width="95" height="25" src="http://www.facebook.com/plugins/like.php?href=http://photos.ezequielm.com&amp;layout=button_count&amp;show_faces=false&amp;width=95&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:95px; height:25px"></iframe>
				</div>
				<!--End Facebook-->
			    <div class="menu-top-container">
			      <ul id="menu-top" class="menu">
			        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="http://photos.ezequielm.com/category/panoramas/" 
			        	<?php if (is_category( 'panoramas' )){ ?> 
			        		style="color:#FFFFFF" 
			        		<?php } ?> >Panoramas</a></li>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="http://photos.ezequielm.com/category/landscapes/" 
			        	<?php if (is_category( 'landscapes' )){ ?> 
			        		style="color:#FFFFFF" 
			        		<?php } ?> >Landscapes</a></li>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="http://photos.ezequielm.com/category/places/ "
			        	<?php if (is_category( 'places' )){ ?> 
			        		style="color:#FFFFFF" 
			        		<?php } ?> >Places</a></li>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="http://photos.ezequielm.com/category/people/" 
			        	<?php if (is_category( 'people' )){ ?> 
			        		style="color:#FFFFFF" 
			        		<?php } ?> >people</a></li>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="http://photos.ezequielm.com/category/flash/" 
			        	<?php if (is_category( 'flash' )){ ?> 
			        		style="color:#FFFFFF" 
			        		<?php } ?> >strobes</a></li>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="http://photos.ezequielm.com/world-map/" 
			        	<?php if (is_page( 'world-map' )){ ?> 
			        		style="color:#FFFFFF" 
			        		<?php } ?> >worldMap</a></li>
			        <li class="menu-item menu-item-type-post_type menu-item-object-page"><a href="http://photos.ezequielm.com/about/" 
			        	<?php if (is_page( 'about' )){ ?> 
			        		style="color:#FFFFFF" 
			        		<?php } ?> >about</a></li>
			      </ul>
			    </div>
			  </div>
			  <a href="#_" id="navbutton"></a>
			</div>

		                  <div id="wrapper" style="overflow: hidden;bottom: 0px;">
		       

				    <!-- End main nav -->