<?php
/*
Template Name: pageAllPhotos
*/
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');  //On or Off
?>


<?php
    $wp_query->set('orderby', 'menu_order');
    $wp_query->set('order', 'DES');
    $wp_query->get_posts();


$eze_home_cat = get_option('eze_home_cat'); 
$all_photo_arr = get_posts('numberposts=-1&order=ASC&orderby=date&category='.$eze_home_cat);

			if(!empty($all_photo_arr))
			{
		?>
<style>
    body{
        background-color: #000000;
        color:#FFFFFF;
    }
</style>
<table> 
<tr>
<td> 
		<!-- Begin content -->
			
			<?php
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
                            logo:<?php echo $eze_gallery_logo ?> <br>
                            width:<?php echo $eze_gallery_width ?> <br>
                            height:<?php echo $eze_gallery_height ?> <br>
                            mediaRoot:<?php echo $eze_gallery__mediaRoot ?> <br>
                            highResFolder:<?php echo $eze_gallery_highResFolder ?> <br>
                            migResFolder:<?php echo $eze_gallery_midRes ?> <br>
                            _favicon:<?php echo $eze_gallery_favicon ?> <br>
                            _fbThumb:<?php echo $eze_gallery_fbThumb?> <br>
                            _ga_id:<?php echo $eze_gallery_ga_id?> <br>

				<?php
					foreach($all_photo_arr as $key => $photo)
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
                                                $slug = get_post_meta($photo->slug, 'credits', true);
                                               
						
				?>		
								<p style="color: #CCCCCC;font-weight: light; font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 18px; text-align: right;">
								<?php echo $photo->post_title ?> <br>
								<?php echo $photo->post_content ?> <br>
                                                                URL:<?php echo $image_url ?> <br>
                                                                LAT:<?php echo $lat ?> <br>
                                                                LONG:<?php echo $long ?> <br>
                                                                CREDITS:<?php echo $credits ?> <br>
                                                                HIGHRESURL:<?php echo $imageHighRes_url ?> <br>
                                                                FBTHUMB:<?php echo $fb_image_url ?> <br>
                                                                CATS:<?php  foreach((get_the_category($photo->ID)) as $category) {
                                                                        echo $category->slug .' ';
                                                                        
                                                                } ?><br>
                                                                CATS HIERARCHY:<?php  foreach((get_the_category($photo->ID)) as $category) {
                                                                        echo get_category_parents( $category, false, "-->");
                                                                        ?><br><?php
                                                                } ?><br>
                                                                
                                                                
                                                                Main CAT:<?php  
                                                                    $mainCat= get_category_by_slug( "mainCategories" );
                                                                    foreach((get_the_category($photo->ID)) as $category) {
                                                                        if (cat_is_ancestor_of( $mainCat, $category )){
                                                                            echo $category->slug .' ';
                                                                        }
                                                                        
                                                                        
                                                                } ?><br>
                                                                Zone CAT:<?php  
                                                                    $mainCat= get_category_by_slug( "continents" );
                                                                    foreach((get_the_category($photo->ID)) as $category) {
                                                                        if (cat_is_ancestor_of( $mainCat, $category )){
                                                                            echo get_category_parents( $category, false, "-->");
                                                                        }?><br><?php
                                                                } ?><br>
                                                                Country CAT:<?php  
                                                                    $mainCat= get_category_by_slug( "continents" );
                                                                    foreach((get_the_category($photo->ID)) as $category) {
                                                                        if (cat_is_ancestor_of( $mainCat, $category )){
                                                                            $parentCat=  get_category($category->category_parent);
                                                                            echo $parentCat->slug.' ';
                                                                        }?><br><?php
                                                                } ?><br>
                                                                
                                                                
                                                                
                                                                
                                                                </p>
                                                                
				<?php
					}	
				?>		
		

</table>



<table> 
<tr>
<td> 
		<!-- Begin content -->
			
			<?php
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
                            logo:<?php echo $eze_gallery_logo ?> <br>
                            width:<?php echo $eze_gallery_width ?> <br>
                            height:<?php echo $eze_gallery_height ?> <br>
                            mediaRoot:<?php echo $eze_gallery__mediaRoot ?> <br>
                            highResFolder:<?php echo $eze_gallery_highResFolder ?> <br>
                            migResFolder:<?php echo $eze_gallery_midRes ?> <br>
                            _favicon:<?php echo $eze_gallery_favicon ?> <br>
                            _fbThumb:<?php echo $eze_gallery_fbThumb?> <br>
                            _ga_id:<?php echo $eze_gallery_ga_id?> <br>
                                MISSING GPS COORDINATES
				<?php
					foreach($all_photo_arr as $key => $photo)
					{
					
						$image_url = get_post_meta($photo->ID, 'gallery_image_url', true);
						$small_image_url = get_post_meta($photo->ID, 'gallery_preview_image_url', true);
                                                
                                                $fb_image_url = get_post_meta($photo->ID, 'gallery_preview_fb_image_url', true);
                                                $imageHighRes_url = get_post_meta($photo->ID, 'gallery_imageHighRes_url', true);
                                                $lat = get_post_meta($photo->ID, 'gallery_coordLatitude', true);
                                                $long = get_post_meta($photo->ID, 'gallery_coordLongitude', true);
                                                $credits = get_post_meta($photo->ID, 'credits', true);
                                                $slug = get_post_meta($photo->slug, 'credits', true);
                                               
						
				?>
                                        <p style="color: #CCCCCC;font-weight: light; font-family: Geneva, Arial, Helvetica, sans-serif; font-size: 18px; text-align: right;">
                                        
                                        
                                        <?php if ( !get_post_meta($photo->ID, 'gallery_coordLatitude', true)) {?>
                                                <?php echo $photo->post_title ?> <br>
                                        </p>
                                                                
				<?php
					}	
				?>		<?php
					}	
				?>
		
		<?php
			}
		?>
</table>



