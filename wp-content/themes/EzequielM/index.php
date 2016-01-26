<?php

/**

 * The main template file.

 * @package WordPress

 * @subpackage EzequielM
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off
 */

if (is_home()) {
    //Redirect to category set in settings if page is Home
    $eze_home_cat = get_option('eze_home_cat');
    $category_link = get_category_link( $eze_home_cat);
    wp_redirect($category_link); exit;
}

//Get site Options from admin panel
$siteurl=  get_site_url();
$eze_gallery__mediaRoot = get_option('eze_mediaRoot');
$eze_gallery_width = get_option('eze_gallery_width');
$eze_gallery_height = get_option('eze_gallery_height');
$eze_gallery_highResFolder = get_option('eze_highRes');
$eze_gallery_midRes = get_option('eze_midRes');    
$eze_gallery_thumbs = get_option('eze_thumbs');
$padding= get_option('eze_gallery_padding') . "px " . get_option('eze_gallery_padding') . "px " . get_option('eze_gallery_padding') . "px 0px" ;
$numberOfRows= intval(get_option('eze_gallery_rows')) ;

$eze_gallery_sort = get_option('eze_gallery_sort'); 
if(empty($eze_gallery_sort))
{
	$eze_gallery_sort = 'DESC';
}

$cat = get_category(get_query_var('cat'),false);
$all_photos = get_posts('numberposts=-1&order='.$eze_gallery_sort.'&orderby=menu_order&category='.$cat->cat_ID);




/**
 * Retrieve category parents with separator for general taxonomies.
 * Modified version of get_category_parents()
 *
 * @param int $id Category ID.
 * @param string $taxonomy Optional, default is 'category'. 
 * @param bool $link Optional, default is false. Whether to format with link.
 * @param string $separator Optional, default is '/'. How to separate categories.
 * @param bool $nicename Optional, default is false. Whether to use nice name for display.
 * @param array $visited Optional. Already linked to categories to prevent duplicates.
 * @return string
 */
function wpse85202_get_taxonomy_parents( $id, $taxonomy = 'category', $link = false, $separator = '/', $nicename = false, $visited = array() ) {
            $exclude='continents';
            $chain = '';
            $parent = get_term( $id, $taxonomy );

            if ( is_wp_error( $parent ) )
                    return $parent;

            if ( $nicename )
                    $name = $parent->slug;
            else
                    $name = $parent->name;

            if ( $parent->parent && ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited ) ) {
                    $visited[] = $parent->parent;
                    $chain .= wpse85202_get_taxonomy_parents( $parent->parent, $taxonomy, $link, $separator, $nicename, $visited );
            }

            if ( $link){
                    if ($parent->slug != $exclude){
                        $chain .= '<a href="' . esc_url( get_term_link( $parent,$taxonomy ) ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $parent->name ) ) . '">'.$name.'</a>' . $separator;
            }}
            elseif ($parent->slug != $exclude){
                $chain .= $name.$separator;
            }
                    

            return $chain;
    }
?>


























<!DOCTYPE html>
<html lang="en" class="no-js" >
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="Ezequiel Mastrasso 3d lighting supervisor, hair fur and photograph Workfolio" />
<meta name="author" content="Ezequiel Mastrasso" />
<link rel="image_src" href="http://www.ezequielm.com/iFrameContent/webImages/emailSignature.jpg" />

<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<meta name="description" content="Ezequiel Mastrasso - Lighting Supervisor - 3d Vfx lighting portfolio">
<meta name="keywords" content="Ezequiel Mastrasso, ezequiel, mastrasso, 3d, vfx, rendering, lighting, TD, technical director, lighter, fur, hair, renderman, 3delight, maya, 3d studio max, xsi, houdini, nuke, linux, shaders, shader writing, mental ray, c, c++, plugins, maya nodes, maya plugins, brown bag films, hugglemonters, henry hugglemonster, doc mcstuffins, peter rabbit, pringles, feu vert, de la post, paris, germany, dusseldorf, photography, phase one, P25+, mamiya, afd, afdII, afdIII, canon">
<!--[if IE]>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<![endif]-->
<title>Ezequiel Mastrasso</title>
<!-- BOOTSTRAP CORE CSS -->
<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/bootstrap.css" rel="stylesheet" />
<!-- ION ICONS STYLES -->
<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/ionicons.css" rel="stylesheet" />
<!-- FONT AWESOME ICONS STYLES -->
<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/font-awesome.css" rel="stylesheet" />
<!-- CUSTOM CSS -->
<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/theme.css" rel="stylesheet" />
<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/fonts.css" rel="stylesheet" />
<!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<body data-spy="scroll" data-target="#menu-section">

<?php
    $wp_query->set('orderby', 'menu_order');
    $wp_query->set('order', 'DES');
    $wp_query->get_posts();



$all_photo_arr = get_posts('numberposts=-1&order=DESC&orderby=date&category='.$eze_home_cat);    

$eze_gallery_logo = get_option('eze_logo');
                                        $eze_gallery_width = get_option('eze_gallery_width');
          $eze_gallery_height = get_option('eze_gallery_height');
                                        $eze_gallery__mediaRoot = get_option('eze_mediaRoot');
                                        $eze_gallery_highResFolder = get_option('eze_highRes');
                                        $eze_gallery_midRes = get_option('eze_midRes');
                                        
                                        $eze_gallery_ga_id= get_option('eze_ga_id');
                                        
                                        $eze_gallery_favicon = get_option('eze_favicon');
                                        $eze_gallery_fbThumb= get_option('eze_fbThumb');
                                        
?>
<!--MENU SECTION START-->
<div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
	<div class="container">
		<div class="navbar-header">
			<button type="button"
				class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#"> <img src="http://localhost/site/assets/img/logo.png"> </a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
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
		</div>
	</div>
</div>
<!--MENU SECTION END-->

	

<!--WORK SECTION START-->



        
<section id="work" >
  <div class="container-fluid">
    <div class="row text-center" id="work-div">
      <div id="Container" class="container-fluid">



  <?php
          foreach($all_photos as $key => $photo)
          {
            $item_type = get_post_meta($photo->ID, 'gallery_type', true); 

              if(empty($item_type))
              {
                $item_type = 'Image';
              }
          
            $image_url = get_post_meta($photo->ID, 'gallery_image_url', true);
            $small_image_url = get_post_meta($photo->ID, 'gallery_preview_image_url', true);
                                                
                                                $fb_image_url = get_post_meta($photo->ID, 'gallery_preview_fb_image_url', true);
                                                $imageHighRes_url = get_post_meta($photo->ID, 'gallery_imageHighRes_url', true);
                                                $lat = get_post_meta($photo->ID, 'gallery_coordLatitude', true);
                                                $long = get_post_meta($photo->ID, 'gallery_coordLongitude', true);
                                                $credits = get_post_meta($photo->ID, 'credits', true);
                                                
                                                $midResUrl= $siteurl . '/site/test/thumbs/' . $image_url;
                                               
            
        ?> 


    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-3 nopadding">
        <?php 
                        //GETS MAIN CATEGORY AND LINK
                        $mainCategoryParent= get_category_by_slug( "mainCategories" );
                        foreach((get_the_category($photo->ID)) as $category) {
                            if (cat_is_ancestor_of( $mainCategoryParent, $category )){
                                $mainCategory= $category;
                                }
                            }
                        //GETS LOCAION CATEGORY AND MAKES BREADCRUMBS
                        //CUSTOM TAXONOMY NEEDS BOOTSTRAP BREADCRUMBS
                        $mainLocationCategory= get_category_by_slug( "continents" );
                        foreach((get_the_category($photo->ID)) as $category) {
                            if (cat_is_ancestor_of( $mainLocationCategory, $category )){
                                //$locationBreadCrumbs= get_category_parents( $category, true, " > ");
                                $locationBreadCrumbs=wpse85202_get_taxonomy_parents($category,"category", True, " > ", True);
                                $locationCategoryText=wpse85202_get_taxonomy_parents($category,"category", False, " ", True);
                                break;
                        }}?>
        <figure class="effect-julia">
            <img src="<?php echo $midResUrl?>" alt="<?php echo $locationCategoryText," ", get_the_title($photo->ID)?>"/>
                <figcaption>
                        
                       
                    <h2><a href="<?php echo get_category_link($mainCategory); ?>"> <?php echo $mainCategory->slug ?> </a></h2>
                        <h2><a href="<?php echo get_permalink($photo->ID); ?>"><span><?php echo get_the_title($photo->ID); ?></span></a></h2>
                        
                        <div>
                                <p><?php
                                        echo $locationBreadCrumbs;?>
                                </p>
                                

                        </div>
                <a href="<?php echo get_permalink($photo->ID); ?>">View more</a>
                </figcaption>
                
        </figure>
   
  </div>
                                                                
        <?php
          } 
        ?>  

</div>
</div>
  </div>
</section>
<!--WORK SECTION END-->
<!--FOOTER SECTION STARTS-->

<div id="contact" class="content-block-nopad bg-deepocean navbar-fixed-bottom">
		<div class="container footer-1-1 ">
			<div class="row">
				<div class="col-sm-8">
					<div class="row">
						<div class="col-md-12">
							<div class="editContent text-margin-top">
							<i class="fa ion-ios-email"></i>ezequielm@gmail.com 
							<i class="ion-ios-telephone"></i>+353 83 003 0034 
							<i class="fa ion-social-skype"></i>ezequiel.mastrasso 
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="editContent">
					<a href="https://twitter.com/ezequielmphoto"  target="_blank" class="btn button-custom btn-custom-one" >
						<i class="fa fa-twitter"></i></a>
					<a href="https://www.linkedin.com/in/ezequielm"  target="_blank" class="btn button-custom btn-custom-one" >
						<i class="fa fa-linkedin "></i></a>
					<a href="https://www.instagram.com/ezequielmastrasso/"  target="_blank" class="btn button-custom btn-custom-one" >
						<i class="ion-social-instagram-outline "></i> </a>
						<a href="https://github.com/ezequielmastrasso"  target="_blank" class="btn button-custom btn-custom-one" >
						<i class="fa fa-github "></i> </a>
					</div>
				</div>
				
				
			
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div>
    <!--// END Footer 1-1 -->

<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME -->
<!-- CORE JQUERY -->
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/jquery-1.11.1.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/bootstrap.js"></script>

<!-- CUSTOM SCRIPTS -->


<!-- GOOGLE ANALYTICS SCRIPTS -->
<script type="text/javascript">
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script> 

<script type="text/javascript">
  var pageTracker = _gat._getTracker("UA-5215019-1");
  pageTracker._trackPageview();
</script>

</body>

</html>
