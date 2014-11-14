<?php
function do_post_panel($post){

$siteurl=  get_site_url();
$image_url =get_post_meta($post->ID, 'gallery_image_url', true);
$eze_gallery__mediaRoot = get_option('eze_mediaRoot');
$eze_gallery_highResFolder = get_option('eze_highRes');
$eze_gallery_fbThumb = get_option('eze_fbThumbs');
$imageHighRes_url = get_post_meta($post->ID, 'gallery_imageHighRes_url', true);
$imageThumb_fb_url = get_post_meta($post->ID, 'gallery_preview_fb_image_url', true);
//midRes filename
$eze_gallery_midRes = get_option('eze_midRes');
//mid res to show on post
$midResUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . $eze_gallery_midRes . '/' . $image_url;
//facebook thumbnail
$thumb_fbUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . $eze_gallery_fbThumb . '/' . $imageThumb_fb_url;
    
    
    ?>
<div class="NewsTable" >
                            <table width="80%" border="0">
                                <tr>
                                    <?php if (the_content()){ ?>
                                        <div class="NewsTable" >post Content:<br></span>
                                            <?php echo the_content()?>
                                        </div>
                                    <?php }?>

                                    <div class="NewsTable" style="text-align: center">
                                        <?php if ( get_post_meta($post->ID, 'gallery_imageHighRes_url', true)) {?>
                                        <?php 
                                        if ( in_category( 'gigapan' )) {
                                            $highResUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . '/'. $eze_gallery_highResFolder . '/highRes.html?imagesPanorama=' . $imageHighRes_url; 
                                        }
                                        else{
                                            $highResUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . '/'. $eze_gallery_highResFolder . '/highRes.html?imagesHighRes=' . $imageHighRes_url; 
                                        }?>
                                        <a href="<?php echo $highResUrl;?>" target="_blank">see High Resolution </a> 
                                        <?php }?>
                                        <?php if ( get_post_meta($post->ID, 'gallery_buyPrint_url', true)) {?>
                                            <br><a href="<?php echo get_post_meta($post->ID, 'gallery_buyPrint_url', true);?>" target="_blank">buy print </a>
                                        <?php } ?>
                                        <?php if ( get_post_meta($post->ID, 'gallery_alternative_url', true)) {?>
                                            <br><a href="<?php echo get_post_meta($post->ID, 'gallery_alternative_url', true);?>"target="_blank">open alternativeLink</a>
                                        <?php } ?>
                                    </div>
                                    
                                    <?php if ( get_post_meta($post->ID, 'credits', true)){ ?>
                                        <div class="NewsTable" >credits:<br></span>
                                            <?php echo get_post_meta($post->ID, 'credits', true); ?>
                                        </div>
                                    <?php }?>
                                    <?php if ( get_post_meta($post->ID, 'gallery_coordLatitude', true)) {?>
                                        <div class="NewsTable" >location:
                                            <br>
                                            <a target="_blank" href="https://maps.google.com/?q=<?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?>,<?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?>&amp;z=7">
                                            <p style="text-align: center;">
                                            <?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?> <?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?><br>
                                            <img style="width: 100%" src="http://maps.googleapis.com/maps/api/staticmap?zoom=8&sensor=false&size=230x70&markers=size:mid|color:red|<?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?>,<?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?>&sensor=false" /> 
                                            </a>
                                            </p>
                                        </div>
                                    <?php }?>
                                    <div class="NewsTable">Tags:</span>
                                        <?php echo $post_categories = get_the_category_list() ; ?>
                                    </div>
                                </tr>
                            </table>
                        </div>
<?php
}

function do_image_div($midResUrl){
    ?>
<div style="width: 85%; height:100%;
                            position: relative;
                            border: 0px;
                            float: left;
                            background: url( '<?php echo $midResUrl; ?>') center no-repeat ;
                            -webkit-background-size: contain;
                            -moz-background-size: contain;
                            -o-background-size: contain;
                            background-size: contain;">
                    
                </div>
<?php
   
}