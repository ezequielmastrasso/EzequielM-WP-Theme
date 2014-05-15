<?php

/**

 * The main template file.

 * @package WordPress

 * @subpackage Kin

 */

/**

*	Get all photos
 * 
 * 
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off
**/




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

//posts arranged for 2 rows
$column_1_photos = array();
$column_2_photos = array();
$column_3_photos = array();
$column_4_photos = array();
$column_5_photos = array();
$cnt = count($all_photos);
for ($i = 0; $i < $cnt; $i++) {
            if (($i*$numberOfRows)<$cnt){
            array_push($column_1_photos , $all_photos[($i*$numberOfRows)]);
            }
            if (($i*$numberOfRows)+1<$cnt){
                array_push($column_2_photos , $all_photos[($i*$numberOfRows)+1]);
            }
            if (($i*$numberOfRows)+2<$cnt){
            array_push($column_3_photos , $all_photos[($i*$numberOfRows)+2]);
            }
            if (($i*$numberOfRows)+3<$cnt){
            array_push($column_4_photos , $all_photos[($i*$numberOfRows)+3]);
            }
            if (($i*$numberOfRows)+4<$cnt){
            array_push($column_5_photos , $all_photos[($i*$numberOfRows)+4]);
            }
}

$all_rows= array();
if ($numberOfRows >= 1){
    array_push($all_rows, $column_1_photos );
}
if ($numberOfRows >= 2){
    array_push($all_rows, $column_2_photos );
}
if ($numberOfRows >= 3){
    array_push($all_rows, $column_3_photos );
}
if ($numberOfRows >= 4){
    array_push($all_rows, $column_4_photos );
}
if ($numberOfRows >= 5){
    array_push($all_rows, $column_5_photos );
}


foreach ($all_rows as $column){
foreach ($column as $key => $photo){
    
    
}
}


get_header();
do_shortcode(the_content());
if(!empty($all_photos)) { ?>
		<div id="scroller">
		<!-- Begin content -->
		<div id="content_wrapper">
                    <?php foreach ($all_rows as $column){?>
                        
                        <div class="inner" style="height:<?php echo $eze_gallery_height?>px;width:82px">
				<input type="hidden" id="gallery_width" name="gallery_width" value="<?php echo ($eze_gallery_width/3)?>px"/>
				<?php
                                    foreach($column as $key => $photo){	
                                        $image_url = get_post_meta($photo->ID, 'gallery_image_url', true);
                                        $small_image_url = get_post_meta($photo->ID, 'gallery_preview_image_url', true);
                                        $image_url_permalink = get_permalink( $photo->ID );
                                        $gallery_buyPrint_url= get_post_meta($photo->ID, 'gallery_buyPrint_url', true);
                                        $small_image_url= $siteurl . '/' . $eze_gallery__mediaRoot . '/'. $eze_gallery_thumbs . '/' . $small_image_url ;
				?>
				<div class="card" style="width:<?php echo intval($eze_gallery_width); ?>px;height:<?php echo intval($eze_gallery_height)?>;margin: <?php echo $padding ?>;">
				<a href="<?php echo $image_url_permalink ?>" >
				<img src="<?php echo $small_image_url?>" alt="" style="width:<?php echo intval($eze_gallery_width); ?>px;;height:<?php echo intval($eze_gallery_height); ?>px;"/> 
				</a>
                                <div style="text-align:left"><code> </code></div>
					<?php
						if(!empty($photo->post_title) OR !empty($photo->post_content)){
					?>
					<div class="title">
						<?php if(!empty($photo->post_title)){	?>
							<h2><?php echo $photo->post_title ?></h2>
						<?php } ?>
					</div>
					<?php }	?>
				</div>
                                <?php	} ?>
			</div>
		<?php	} ?>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
			<div>
		<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/webImages/clickAndDrag.png" alt="">
		</div>
		</div>
		</div>
		</div>
		<div class=" topbar-right topbar-dark-images topbar-button-default topbar-button" id="topbar-wrapper" style="display: block; position: fixed; width: 100%;left: 0px; z-index: 5000;background:#0f0f0f;">
	</div>
		
</div>
	
</div>
		<!-- End content -->

		<br class="clear"/>

		<?php	} ?>

<?php get_footer(); ?>
