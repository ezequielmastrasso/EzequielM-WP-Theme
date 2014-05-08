<head>
<?php if ( get_post_meta($post->ID, 'gallery_preview_fb_image_url', true)) { ?> 
		<link rel="image_src" href="<?php echo get_post_meta($post->ID, 'gallery_preview_fb_image_url', true);?>" />
		
<?php } else { ?>
	<link rel="image_src" href="http://www.ezequielm.com/iFrameContent/photos/panoramaFlash/ir-donegal_holyHead_01.jpg" />		
<?php }
?>	

<title>replaced automatically by wordpress</title>
</head>
<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_directory' ); ?>/style.css" type="text/css" media="all"/>
<style type="text/css">
  body {
    padding: 5px 0px 0px 5px; }

 </style>
<style type="text/css">

img {
	width: auto;
	height: auto;
	max-width: 100%;
	max-height: 90%;
}
 </style>

<?php

$eze_blog_page = get_option('eze_blog_page');
//Make blog menu active
if(!empty($eze_blog_page))
{}
?>
		<!-- Begin content -->
		<div id="page_content_wrapper">
			<div class="inner">
				<?php
if (have_posts()) : while (have_posts()) : the_post();
?>
						<!-- Begin each blog post -->
						<div class="post_wrapper">
							<div class="post_header">
								<div class="left">
<?php
//IF included in cat gigapan, make the flash viewer, else use the midRes Url
if ( in_category( 'gigapan' )) {?>
    <?php $xml_url=get_post_meta($post->ID, 'gallery_xml_url', true);  ?>
    <div id="krpanoDIV"> 
        <noscript><table width="100%" height="100%"><tr valign="top"><td><center>ERROR:<br><br>Javascript not activated<br><br></center></td></tr></table></noscript> 
    </div>
    <div style="text-align:center"><code>
    <?php if ( get_post_meta($post->ID, 'gallery_buyPrint_url', true)) {?>
		| <a href="<? echo get_post_meta($post->ID, 'gallery_buyPrint_url', true);?>" target="_blank">buy print </a>
    <?php } else { } ?>

    <?php if ( get_post_meta($post->ID, 'gallery_alternative_url', true)) {?>
                    | <a href="<? echo get_post_meta($post->ID, 'gallery_alternative_url', true);?>"target="_blank">alternativeLink</a> |
    <?php } else { }?>
    </code></div>
 
    <script type="text/javascript" src="http://www.ezequielm.com/iFrameContent/photos/panoramaFlash/swfkrpano.js"></script> 
    <script>
      var viewer = createPanoViewer({swf:"http://www.ezequielm.com/iFrameContent/photos/panoramaFlash/krPano.swf",height:"90%"});
      viewer.addVariable("xml", "<?echo $xml_url?>");
      viewer.embed("krpanoDIV");
    </script>

<?php } else {
//not in gigapan, use midResUrl
    $image_url =get_post_meta($post->ID, 'gallery_image_url', true);
    $eze_gallery__mediaRoot = get_option('eze_mediaRoot');
    $eze_gallery_highResFolder = get_option('eze_highRes');
    $eze_gallery_midRes = get_option('eze_midRes');
    
    $midResUrl= 'http://localhost/' . $eze_gallery__mediaRoot . '/' . $eze_gallery_midRes . '/' . $image_url;
    
    //REPLACE BELOW WITH XML LINK
    $highResUrl= 'http://localhost/' . $eze_gallery__mediaRoot . '/' . '/'. $eze_gallery_highResFolder . '/' . $image_url;
    
    ?>
    <img src="<?php echo $midResUrl ?>"/><br>
    <?php }?>
            <div style="text-align:center"><code>
            <?php if ( get_post_meta($post->ID, 'gallery_imageHighRes_url', true)) {?>
                    <?php if ( get_post_meta($post->ID, 'credits', true)){ ?>
                    Credits: <?php echo get_post_meta($post->ID, 'credits', true); }?> <br>
                    
                    
                    
                    <a href="<?php echo $highResUrl;?>" target="_blank">open High Resolution  </a> 
                    <?php }?>
                    <?php if ( get_post_meta($post->ID, 'gallery_coordLatitude', true)) {?><br>
                            <a class="googleMapsThumbnail" target="_blank" href="https://maps.google.com/?q=<?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?>,<?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?>&amp;z=7">
                                    Lat: <?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?> Long: <?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?>
                                    
                                    <span>
                                            <img src="http://maps.googleapis.com/maps/api/staticmap?zoom=8&sensor=false&size=400x100&markers=size:mid|color:red|<?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?>,<?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?>&sensor=false" />
                                            
                                    </span>
                            </a> 
                    <?php }?>
	
</code></div>
</div>
<div id="fb-root" style="text-align:left"></div><script src="http://connect.facebook.net/en_US/all.js#appId=161605903920447&amp;xfbml=1"></script><fb:like href="<?echo get_permalink( $photo->ID );?>" send="false" width="450" show_faces="false" colorscheme="dark" font=""></fb:like> 							
								
<?php endwhile; endif; ?>
				
			</div>
			
		</div>
		<!-- End content -->