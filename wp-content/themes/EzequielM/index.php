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
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>

        <script type="text/javascript" src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/jquery.fullPage.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#fullpage').fullpage({
				sectionsColor: [],
                                anchors: ['page'],
				slidesNavigation: true,
                                loopHorizontal:false,
				css3: true,
				paddingtop: '100px',
				paddingBottom: '100px',
				menu: '#menu',
				resize: false
			});

		});
	</script>

<?php



if ( isset( $_GET['mode'] ) && $_GET['mode']==slideshow ){
    //do slide of category photos!
    require 'single_functions.php';
?>

    <div class="section " id="section0">
            <?php foreach($all_photos as $post){ ?>
            <div class="slide"  data-anchor="<?php echo $post->post_name ?>">
                <?php 
                $image_url =get_post_meta($post->ID, 'gallery_image_url', true);
                $eze_gallery__mediaRoot = get_option('eze_mediaRoot');
                //midRes filename
                $eze_gallery_midRes = get_option('eze_midRes');
                
                $midResUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . $eze_gallery_midRes . '/' . $image_url;
                ?>
                <a href="<?php echo $image_url_permalink = get_permalink( $photo->ID ); ?>" > 
                <div style="margin-top: 80px;margin-left: 5%;margin-right: 5%;width: 90%; text-align: center;">
                    click here see the post info
                </div>
                <div style="margin-top: 0px;margin-left: 5%;margin-right: 5%;height: 85%; width: 90%; text-align: center;
                            background: url( '<?php echo $midResUrl; ?>') center no-repeat ;
                            -webkit-background-size: contain;
                            -moz-background-size: contain;
                            -o-background-size: contain;
                            background-size: contain;">
                </div>
                </a>
            </div>
            <?php } ?>
    </div>
<?php
} else {
    //no slideshow, thumbnails view
    if(!empty($all_photos)) { ?>
        <div class="section " id="section0">
            <?php foreach($pages as $page){ ?>
                <div class="slide">
                <!-- Begin content -->
                    <div style="width: 90%;height:85%;margin: 0 auto;margin-top: 80px;vertical-align: middle;padding-left: 2%">
                        <?php
                        //DUPLICATED functionality so we can do this table arragement NEEDS RECODING
                        //1357...
                        //2468...
                        $i = 0;
                            foreach($page as $photo){
                                if ($i++ % 2 != 0) continue;
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

                        <?php //duplicate begin
                        $i = 0;
                            foreach($page as $photo){
                                if ($i++ % 2 == 0) continue;
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
            <div class="slide" style="margin-top:80px;">
                 <div style="margin-left:5%;">
                    <?php 
                    $page_id = get_page_by_title( 'tags' );
                    $page_data = get_page( $page_id );  
                    echo $page_data->post_content;
                    ?>
                 </div>
            </div>
        </div>
    
<?php } ?>
<div align="right" style="position: fixed;top: 0; right: 0;z-index: 999;font-size: 12px;padding-top: 62px;padding-right: 6%">
    <?php $category_slide = get_category_link( $cat);?>
    <a href="<?php echo $category_slide ?>?mode=slideshow">category slideshow</a>
</div>     
<?php get_footer(); ?>

<?php	} ?>
