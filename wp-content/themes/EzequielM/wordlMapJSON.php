<?php
/*
Template Name: worldMapJSON
*/
//header('Content-type: application/xml');
//need plain text to avoid the browser to format it
header('Content-type: text/plain');


$eze_gallery__mediaRoot = get_option('eze_mediaRoot');
$eze_gallery_highResFolder = get_option('eze_highRes');
$eze_gallery_midRes = get_option('eze_midRes');
$siteurl=  get_site_url();
$all_photo_arr = get_posts('numberposts=-1&order=ASC&orderby=date&category='.$eze_home_cat);
$all_photo_arr = get_posts('posts_per_page= 999' ); 
			if(!empty($all_photo_arr))
			{
		?>

{"photos":[
        
<?php
	foreach($all_photo_arr as $key => $photo)
	{
 		if ( get_post_meta($photo->ID, 'gallery_coordLatitude', true)  ) { ?>
 			<?php
			$image_url = get_post_meta($photo->ID, 'gallery_image_url', true);
			$image_thumb_fb= get_post_meta($photo->ID, 'gallery_preview_fb_image_url', true);
                        
                        $image_thumb_fb_url= $siteurl . '/_media/thumbs_fb/' . $image_url;
                        
			$coordLatitude= get_post_meta($photo->ID, 'gallery_coordLatitude', true);
			$coordLongitude= get_post_meta($photo->ID, 'gallery_coordLongitude', true);
			$image_url_permalink = get_permalink( $photo->ID );
			?>
                        {
                            "label": "<?=$photo->post_title?>",
                            "lat":"<?php echo $coordLatitude?>",
                            "lng":"<?php echo $coordLongitude?>",
                            "url":"<?php echo $image_url_permalink?>",
                            "thumbnail":"<?php echo $image_thumb_fb_url?>"
                        }             
			<?php
                        
                 end($all_photo_arr);
                if (!($key === key($all_photo_arr))){
                    echo ',';           
		}
                
                }
	}	
?>		
]}
<?php
	}
?>