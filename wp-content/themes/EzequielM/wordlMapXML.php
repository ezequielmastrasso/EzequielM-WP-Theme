<?php
/*
Template Name: worldMapXML
*/
//header('Content-type: application/xml');
//need plain text to avoid the browser to format it
header('Content-type: text/plain');

$eze_home_cat = get_option('eze_home_cat'); 
$all_photo_arr = get_posts('numberposts=-1&order=ASC&orderby=date&category='.$eze_home_cat);
$all_photo_arr = get_posts('posts_per_page= 999' ); 
			if(!empty($all_photo_arr))
			{
		?>

<!--
      always replace 
      " for &quot;
      < for &lt;
      > for &gt;
          more over

          WORKiNG ExAMple

<marker label="Panorama - Vietnam - QuangBình"
     lat="17.61315614"
     lng="106.30222321"
     html="&lt;div style=&quot;text-align: center&quot;&gt; &lt;a href=&quot;http://www.ezequielm.com/iFrameContent/photoGallery/panoramas/vi-quangbinh/&quot; rel=&quot;shadowbox&quot;  &gt; &lt;img src=&quot;http://www.ezequielm.com/iFrameContent/photos/panoramaFlash/vi-QuangBinhPano_01.jpg&quot; &gt;&lt;br&gt;
see image&lt;/a&gt; " />


Begin content -->

<markers>
<?php
	foreach($all_photo_arr as $key => $photo)
	{
 		if ( get_post_meta($photo->ID, 'gallery_coordLatitude', true)  ) { ?>
 			<marker label="<?=$photo->post_title?>"
 			<?php
			$image_url = get_post_meta($photo->ID, 'gallery_image_url', true);
			$image_thumb_fb= get_post_meta($photo->ID, 'gallery_preview_fb_image_url', true);
			$coordLatitude= get_post_meta($photo->ID, 'gallery_coordLatitude', true);
			$coordLongitude= get_post_meta($photo->ID, 'gallery_coordLongitude', true);
			$image_url_permalink = get_permalink( $photo->ID );
			?>
			lat="<?php echo $coordLatitude?>"
			lng="<?php echo $coordLongitude?>"
			html="&lt;div style=&quot;text-align: center&quot;&gt; 
			&lt;a href=&quot;<?php echo $image_url_permalink?>&quot; &gt; 
			&lt;img src=&quot;&#47_media&#47thumbs_fb&#47<?php echo $image_thumb_fb?>&quot; &gt; &lt;br&gt;
			see image&lt;/a&gt; " />
			<?php
		} 
	}	
?>		
</markers>
<?php
	}
?>