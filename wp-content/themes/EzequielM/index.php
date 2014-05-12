<?php

/**

 * The main template file.

 * @package WordPress

 * @subpackage Kin

 */

/**

*	Get all photos

**/





$eze_gallery_sort = get_option('eze_gallery_sort'); 
if(empty($eze_gallery_sort))
{
	$eze_gallery_sort = 'DESC';
}

$cat = get_category(get_query_var('cat'),false);
$all_photo_arr = get_posts('numberposts=-1&order='.$eze_gallery_sort.'&orderby=menu_order&category='.$cat->cat_ID);

//posts arranged for 2 rows
$all_photo_arr_even = array();
$all_photo_arr_odd = array();

$cnt = count($all_photo_arr);
for ($i = 0; $i < $cnt; $i++) { 
	if($i&1){ //odd
     	array_push($all_photo_arr_odd , $all_photo_arr[$i]);
   }else{ //even
	array_push($all_photo_arr_even , $all_photo_arr[$i]);}
;}
$cnt = count($all_photo_arr);

//posts arranged for 3 rows
$all_photo_arr_rowA = array();
$all_photo_arr_rowB = array();
$all_photo_arr_rowC = array();
for ($i = 0; $i < $cnt; $i++) { 
	if($i%3==0){//odd
     array_push($all_photo_arr_rowA , $all_photo_arr[$i]);
   }if($i%3==1){//even
	array_push($all_photo_arr_rowB , $all_photo_arr[$i]);}
   if($i%3==2){//even
	array_push($all_photo_arr_rowC , $all_photo_arr[$i]);}
;}


//Get site Options for admin panel
$eze_gallery__mediaRoot = get_option('eze_mediaRoot');
$eze_gallery_highResFolder = get_option('eze_highRes');
$eze_gallery_midRes = get_option('eze_midRes');    
$eze_gallery_thumbs = get_option('eze_thumbs');

get_header();
do_shortcode(the_content());
if(!empty($all_photo_arr)) { ?>
		<div id="scroller">
		<!-- Begin content -->
		<div id="content_wrapper">
			<?php
                            $eze_gallery_width = get_option('eze_gallery_width');
                            $eze_gallery_height = get_option('eze_gallery_height');
                            $siteurl=  get_site_url();
                        ?>
			<div class="inner" style="height:190px;width:82px">
				<input type="hidden" id="gallery_width" name="gallery_width" value="<?php echo ($eze_gallery_width/3)?>px"/>
				<?php
                                    foreach($all_photo_arr_even as $key => $photo){	
                                        $image_url = get_post_meta($photo->ID, 'gallery_image_url', true);
                                        $small_image_url = get_post_meta($photo->ID, 'gallery_preview_image_url', true);
                                        $image_url_permalink = get_permalink( $photo->ID );
                                        $gallery_buyPrint_url= get_post_meta($photo->ID, 'gallery_buyPrint_url', true);
                                        $small_image_url= $siteurl . '/' . $eze_gallery__mediaRoot . '/'. $eze_gallery_thumbs . '/' . $small_image_url ;
				?>
				<div class="card" style="width:<?php echo intval($eze_gallery_width); ?>px;height:190px;">
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
			<div class="inner" style="height:190px;width:82px">
				<input type="hidden" id="gallery_width" name="gallery_width" value="<?php echo ($eze_gallery_width/3)?>px"/>
				<?php
					foreach($all_photo_arr_odd as $key => $photo){	
						$item_type = get_post_meta($photo->ID, 'gallery_type', true); 
   		 				if(empty($item_type)){
   		 					$item_type = 'Image';
   		 				}
						$image_url = get_post_meta($photo->ID, 'gallery_image_url', true);
						$small_image_url = get_post_meta($photo->ID, 'gallery_preview_image_url', true);
						$image_url_permalink = get_permalink( $photo->ID );
						$gallery_buyPrint_url= get_post_meta($photo->ID, 'gallery_buyPrint_url', true);
                                                $small_image_url= $siteurl . '/' . $eze_gallery__mediaRoot . '/'. $eze_gallery_thumbs . '/' . $small_image_url ;
				?>
				<div class="card" style="width:<?php echo intval($eze_gallery_width); ?>px;height:190px;">
							<a href="<?php echo $image_url_permalink ?>" >
								<img src="<?php echo $small_image_url?>" alt="" style="width:<?php echo intval($eze_gallery_width); ?>px;;height:<?php echo intval($eze_gallery_height); ?>px;"/> 
							</a>

<div style="text-align:left"><code> </code></div>

					<?php if(!empty($photo->post_title) OR !empty($photo->post_content)) {	?>
					<div class="title">
						<?php if(!empty($photo->post_title)){	?>
								<h2><?php echo $photo->post_title ?></h2>
						<?php } ?>
					</div>

					<?php } ?>
				</div>
				<?php } ?>
			</div>
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
