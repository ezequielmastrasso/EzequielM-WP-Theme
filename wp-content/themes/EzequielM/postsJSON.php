<?php
/*
Template Name: postsJSON
*/
//header('Content-type: application/xml');
//need plain text to avoid the browser to format it
header('Content-type: text/plain');

$eze_home_cat = get_option('eze_home_cat'); 
$all_photo_arr = get_posts('numberposts=-1&order=ASC&orderby=date&category='.$eze_home_cat);
$all_photo_arr = get_posts('posts_per_page= 999' ); 
			if(!empty($all_photo_arr))
			{

/**

* Returns ID of top-level parent category, or current category if you are viewing a top-level

*

* @param    string      $catid      Category ID to be checked

* @return   string      $catParent  ID of top-level parent category

*/
$countryCategoryID=get_cat_ID( "continents" );
$lensCategoryID=get_cat_ID( "lens" );
$mainCategoryID=get_cat_ID( "mainCategories" );
$miscTagsCategoryID=get_cat_ID( "miscTags" );



?>
{"posts":
	[
	    {	
	    	"title": "Landscapes - Ireland - valentiaIsland ",
	    	"country":"Ireland",
	    	"area":"Kerry",
	    	"lens":"Mamiya 80mm 2.8 AFD",
	    	"lat":"51.884597453184526",
		"lng":"-10.419373512268066"
	    }
	    {	
	    	"title": "Landscapes - Ireland - valentiaIsland ",
	    	"country":"Ireland",
	    	"area":"Kerry",
	    	"lens":"Mamiya 80mm 2.8 AFD",
	    	"lat":"51.884597453184526",
		"lng":"-10.419373512268066"
	    } 
	    
	]
}




<?php

foreach($all_photo_arr as $key => $photo)
{
	if ( get_post_meta($photo->ID, 'gallery_coordLatitude', true)  ) { ?>
		
		<?php
		$siteurl=  get_site_url();
		$eze_gallery__mediaRoot = get_option('eze_mediaRoot');
		$eze_gallery_width = get_option('eze_gallery_width');
		$eze_gallery_height = get_option('eze_gallery_height');
		$eze_gallery_highResFolder = get_option('eze_highRes');
		$eze_gallery_midRes = get_option('eze_midRes');    
		$eze_gallery_thumbs = get_option('eze_thumbs');
		
		$image_url = get_post_meta($photo->ID, 'gallery_image_url', true);
		$image_thumb_fb= get_post_meta($photo->ID, 'gallery_preview_fb_image_url', true);
		$coordLatitude= get_post_meta($photo->ID, 'gallery_coordLatitude', true);
		$coordLongitude= get_post_meta($photo->ID, 'gallery_coordLongitude', true);
		$image_url_permalink = get_permalink( $photo->ID );
		$content= get_the_content( $photo->ID );
		$postDate = get_the_date( "d/m/Y",$photo->ID );

		$args = array(
			'show_option_all'    => '',
			'orderby'            => 'name',
			'order'              => 'ASC',
			'style'              => 'list',
			'show_count'         => 0,
			'hide_empty'         => 1,
			'use_desc_for_title' => 1,
			'child_of'           => 0,
			'feed'               => '',
			'feed_type'          => '',
			'feed_image'         => '',
			'exclude'            => '',
			'exclude_tree'       => '',
			'include'            => '',
			'hierarchical'       => 1,
			'title_li'           => __( 'Categories' ),
			'show_option_none'   => __( '' ),
			'number'             => null,
			'echo'               => 1,
			'depth'              => 0,
			'current_category'   => 0,
			'pad_counts'         => 0,
			'taxonomy'           => 'category',
			'walker'             => null
		    );
		$countryArea="";
		$country="";
		$lens="";
		$wpcats =wp_get_post_categories( $photo->ID, $args );
		$cats = array();
			
		 	foreach ($wpcats as $c) {
			if (cat_is_ancestor_of($countryCategoryID, $c)){
				$countryArea = $c;
				$country= get_category($c)->category_parent ;
				
				}
			if (cat_is_ancestor_of($lensCategoryID, $c)){
				$lens= $c;
				}
			}
		$lister = implode(",", $cats);

		?>
		{"<?php printf($photo->post_title)?> ":
		
		countryy="<?php printf(get_cat_name($country)) ?>"
		
		
		area="<?php print_r(get_cat_name($countryArea)) ?>"
		
		
		lens="<?php print_r(get_cat_name($lens)) ?>"
		lat="<?php echo $coordLatitude?>"
		lng="<?php echo $coordLongitude?>"
		imageLink="<?php echo $image_url_permalink?>"
		thumnail="<?php echo $image_thumb_fb?>"
		permalink="<?php echo $image_url_permalink?>"
		postDate ="<?php echo $postDate ?>"
		
		}
		<?php
	} 
}	
}?>

}