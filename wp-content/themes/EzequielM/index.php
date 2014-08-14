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


$photosPerPage = 28;
$cnt = count($all_photos);
$amountOfPages=intval($cnt / $photosPerPage);
if (($cnt % $photosPerPage)!=0 ){
    $amountOfPages=$amountOfPages+1;
}

$pages= array_chunk($all_photos, $photosPerPage);



get_header();
do_shortcode(the_content());
if(!empty($all_photos)) { ?>

<div class="section " id="section0">
                <?php foreach($pages as $page){ ?>
                <div class="slide">
		<!-- Begin content -->
                <div style="width: 90%;height:85%;margin: 0 auto;margin-top: 80px;vertical-align: middle;padding-left: 2%">
				<?php
                                    foreach($page as $photo){
                                        $image_url = get_post_meta($photo->ID, 'gallery_image_url', true);
                                        $small_image_url = get_post_meta($photo->ID, 'gallery_preview_image_url', true);
                                        $image_url_permalink = get_permalink( $photo->ID );
                                        $gallery_buyPrint_url= get_post_meta($photo->ID, 'gallery_buyPrint_url', true);
                                        $small_image_url= $siteurl . '/' . $eze_gallery__mediaRoot . '/'. $eze_gallery_thumbs . '/' . $small_image_url ;
				?>
				
				<a href="<?php echo $image_url_permalink ?>" >
                                    <img src="<?php echo $small_image_url?>" class="border" alt="" style="max-width: 7%;min-width: 7%;max-height: 55%"/> 
				
                                </a>
				
                                <?php	} ?>
                </div>
                </div>
                
		<?php	} ?>
    <div class="slide" ></div>
</div>
    
		<?php	} ?>
                
<?php get_footer(); ?>
