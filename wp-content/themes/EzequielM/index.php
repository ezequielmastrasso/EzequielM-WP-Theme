<?php

/**
 * The main template file.
 * @package WordPress
 * @subpackage EzequielM*/
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 'On');  //On or Off



$eze_home_cat = get_option('eze_home_cat');
if (is_home()) {
    //Redirect to category set in settings if page is Home
    $category_link = get_category_link( $eze_home_cat);
    wp_redirect($category_link); exit;
    }
?>


<!-- DO HEADER -->
<?php get_header();?>




 


<?php
    $eze_gallery_sort = get_option('eze_gallery_sort'); 
    if(empty($eze_gallery_sort)){
            $eze_gallery_sort = 'DESC';
    }
    require 'eze_functions.php';
    
    $cat = get_category(get_query_var('cat'),false);
    $all_photos = get_posts('numberposts=-1&order='.$eze_gallery_sort.'&orderby=menu_order&category='.$cat->cat_ID);
    $wp_query->set('orderby', 'menu_order');
    $wp_query->set('order', 'DES');
    $wp_query->get_posts();

    $all_photo_arr = get_posts('numberposts=-1&order=DESC&orderby=date&category='.$eze_home_cat);                               
?>


<!--DO NAV BAR-->    
<?php do_nav_bar() ?>  



<!--WORK SECTION START-->
<section id="work" >
    <div class="container-fluid">
        <div class="row text-center" id="work-div">
            <div id="Container" class="container-fluid">
                <?php
                    foreach($all_photos as $key => $photo){
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
                        $midResUrl= $siteurl . '/' . $eze_gallery__mediaRoot . "/" . $eze_gallery_thumbs . "/" . $small_image_url;
                        ?>
                        <!-- PHOTO START -->
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
                                <img src="<?php echo $midResUrl?>" alt="<?php echo $locationCategoryText," ", get_the_title($photo->ID)?>" title="<?php echo $locationCategoryText," ", get_the_title($photo->ID)?>"/>
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
                        </div><!-- PHOTO END -->
                    <?php
                    } 
                    ?>  
            </div><!--container end-->
        </div><!--row end-->
    </div><!--Container Fluid end-->
</section><!--section end-->
<!--WORK SECTION END-->


<!-- DO Footer -->
<?php get_footer();?>
