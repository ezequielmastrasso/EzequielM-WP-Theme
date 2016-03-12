<?php

/**
 * Misc vars and funtions template file.
 * @package WordPress
 * @subpackage EzequielM */
//ini_set('error_reporting', E_ALL);
//ini_set('display_errors', 'On');  //On or Off

//////////////////////////////
////GLOBAL GALLERY OPTIONS////
//////////////////////////////

//Get site Options from admin panel
$siteurl=  get_site_url();
$eze_blog_page = get_option('eze_blog_page');

//Gallery options
$eze_gallery_logo = get_option('eze_logo');
$eze_gallery_ga_id= get_option('eze_ga_id');
$eze_gallery_favicon = get_option('eze_favicon');

//Gallery Images
$eze_gallery_fbThumb = get_option('eze_fbThumbs');
$eze_gallery__mediaRoot = get_option('eze_mediaRoot');
$eze_gallery_width = get_option('eze_gallery_width');
$eze_gallery_height = get_option('eze_gallery_height');
$eze_gallery_highResFolder = get_option('eze_highRes');
$eze_gallery_midRes = get_option('eze_midRes');    
$eze_gallery_highRes = get_option('eze_highRes');
$eze_gallery_thumbs = get_option('eze_thumbs');
$padding= get_option('eze_gallery_padding') . "px " . get_option('eze_gallery_padding') . "px " . get_option('eze_gallery_padding') . "px 0px" ;
$numberOfRows= intval(get_option('eze_gallery_rows')) ;


//////////////////////////////
//END GLOBAL GALLERY OPTIONS//
//////////////////////////////


function wpse85202_get_taxonomy_parents( $id, $taxonomy = 'category', $link = false, $separator = '/', $nicename = false, $visited = array() ) {
            $exclude1='continents';
            $exclude2='lens';
            $exclude3='misctags';
            $exclude4='format';
            $chain = '';
            $parent = get_term( $id, $taxonomy );

            if ( is_wp_error( $parent ) ){
            return $parent;}

            if ( $nicename ){
            $name = $parent->slug;}
            else{
            $name = $parent->name;}

            if ( $parent->parent && ( $parent->parent != $parent->term_id ) && !in_array( $parent->parent, $visited ) ) {
                    $visited[] = $parent->parent;
                    $chain .= wpse85202_get_taxonomy_parents( $parent->parent, $taxonomy, $link, $separator, $nicename, $visited );
            }

            if ( $link){
                    if ($parent->slug != $exclude1 && $parent->slug != $exclude2 && $parent->slug != $exclude3 && $parent->slug != $exclude4){
                        $chain .= '<a href="' . esc_url( get_term_link( $parent,$taxonomy ) ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $parent->name ) ) . '">'.$name.'</a>' . $separator;
            }}
            elseif ($parent->slug != $exclude1 && $parent->slug != $exclude2 && $parent->slug != $exclude3 && $parent->slug != $exclude4){
                $chain .= $name.$separator;
            }
                    

            return $chain;
    }?>





<?php
function do_post_panel($post){ ?>
    <div class="NewsTable">
            <table width="80%" border="0">
                <tr>
                    <!-- --------------------------------------------------DO CONTENT -->
                    <?php if (the_content()){ ?>
                        <div class="NewsTable" >post Content:<br>
                            <?php echo the_content()?>
                        </div>
                    <?php }?>
                
                    <!-- --------------------------------------------------DO HIGH RES -->
                    <div class="NewsTable" style="text-align: center">
                        <?php if ( in_category( 'highRes' )) {
                            if ( in_category( 'gigapan' )) {
                                $highResUrl= $siteurl . '/' . $eze_gallery__mediaRoot . '/' . '/'. $eze_gallery_highResFolder . '/highRes.html?imagesPanorama=' . $imageHighRes_url; 
                            ?>

                            <a href="<?php echo $highResUrl;?>" target="_blank">see High Resolution </a> 
                            <?php

                            }
                            else{?>
                                <a id="highResLink" href="#">see High Resolution </a>
                                <?php
                        }}?>


                        <?php if ( get_post_meta($post->ID, 'gallery_buyPrint_url', true)) {?>
                            <br><a href="<?php echo get_post_meta($post->ID, 'gallery_buyPrint_url', true);?>" target="_blank">buy print </a>
                        <?php } ?>
                        <?php if ( get_post_meta($post->ID, 'gallery_alternative_url', true)) {?>
                            <br><a href="<?php echo get_post_meta($post->ID, 'gallery_alternative_url', true);?>"target="_blank">open alternativeLink</a>
                        <?php } ?>
                    </div>

                    <!-- --------------------------------------------------DO CREDITS -->
                    <?php if ( get_post_meta($post->ID, 'credits', true)){ ?>
                        <div class="NewsTable" >credits:<br></span>
                            <?php echo get_post_meta($post->ID, 'credits', true); ?>
                        </div>
                    <?php }?>
                    <br>
                    
                    <!-- --------------------------------------------------DO CONTENT -->
                    <div class="NewsTable">Location:<br>
                        <?php 
                            $mainLocationCategory= get_category_by_slug( "continents" );
                            foreach((get_the_category($post->ID)) as $category) {
                                if (cat_is_ancestor_of( $mainLocationCategory, $category )){
                                    $locationBreadCrumbs=wpse85202_get_taxonomy_parents($category,"category", True, " > ", True);
                                    $locationCategoryText=wpse85202_get_taxonomy_parents($category,"category", False, " ", True);
                                    break;    
                                }
                            }
                        ?>
                        <?php echo $locationBreadCrumbs?>
                        <br>
                        <?php if ( get_post_meta($post->ID, 'gallery_coordLatitude', true)) {?>
                            <br>
                            <a target="_blank" href="https://maps.google.com/?q=<?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?>,<?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?>&amp;z=7">
                            <p style="text-align: center;">
                            <img style="width: 100%" src="http://maps.googleapis.com/maps/api/staticmap?zoom=8&sensor=false&size=230x70&markers=size:mid|color:red|<?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?>,<?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?>&sensor=false" /> 
                            <?php echo get_post_meta($post->ID, 'gallery_coordLatitude', true);?> <?php echo get_post_meta($post->ID, 'gallery_coordLongitude', true);?><br>
                            </a>
                            </p>
                        <?php }?>
                    </div>
                    
                    <!-- --------------------------------------------------DO TAGS -->
                    <div class="NewsTable">Tags:</span>
                        <?php echo $post_categories = get_the_category_list() ; ?>
                    </div>
                    
                    <!-- --------------------------------------------------DO SHARE TOOLS -->
                    <div class="NewsTable">share it!</span>
                        <?php  //BuiLD MIDRES PATH
                        $image_url =get_post_meta($post->ID, 'gallery_image_url', true);
                        $midResUrl= get_site_url() . '/' . get_option('eze_mediaRoot') . '/' . get_option('eze_midRes') . '/' . $image_url;
                        ?>
                        <div id="fb-root"></div>
                        <script>(function(d, s, id) {
                          var js, fjs = d.getElementsByTagName(s)[0];
                          if (d.getElementById(id)) return;
                          js = d.createElement(s); js.id = id;
                          js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=123903024376011";
                          fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));</script>
                        <div class="fb-share-button" data-href="<?php echo get_the_permalink()?>" data-layout="button"></div>
                        <br>
                        
                  
                        <a data-pin-do="buttonPin" href="https://www.pinterest.com/pin/create/button/?url=<?php echo get_the_permalink()?>&media=<?php echo $midResUrl?>" data-pin-height="28"></a>
                        
                        
                        
                        <br>
                        <a class="twitter-share-button"
                            href="https://twitter.com/share"
                            data-size="large"
                            data-count="none"
                            data-text="Ezequiel Mastrasso -Medium Format Photo &#64;PhaseOnePhoto <?php if ( in_category( 'flash' )) { echo "&#64;Profoto";}; ?>"
                            data-related="PhaseOnePhoto<?php if ( in_category( 'flash' )) { echo ",Profoto";}; ?>"
                            data-hashtags="phaseone,CaptureOne<?php if ( in_category( 'flash' )) { echo ",profotob1";}; ?>">
                            Tweet
                        </a>
                        <script>
                        window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return t;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));
                        </script>
                    </div>
                </tr>
            </table>
        </div>
<?php } ?>

<?php function do_nav_bar(){?>
    <?php if (!is_single() ) {?>
        <!-- IF NOT SINGLE -->
        <!-- MENU SECTION START -->
        <div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
            <div class="container">
                <!-- LOGO -->
                <div class="navbar-header">
                    <button type="button"
                        class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"> <img src="/_media/logo.png"> </a>
                </div>
                <!-- COLLAPSABLE MENU ITEMS-->
                <div class="navbar-collapse collapse">
                    <?php
                        if (!is_single()) { ?>
                            <!-- IF NOT SINGLE, DO MAIN MENU-->
                            <ul class="nav navbar-nav navbar-right">
                                <?php 
                                    $items = wp_get_nav_menu_items( "main" );
                                    foreach($items as $item){
                                        echo '<li> <a href=' . $item->url;
                                        if (is_category( $item->title )){
                                            echo ' style="color:#FFFFFF"';
                                        }
                                        echo ' >' . $item->title . "</a></li>";
                                    }
                                ?>
                            </ul>
                        <?php }
                        else{
                            $mainLocationCategory= get_category_by_slug( "continents" );
                            foreach((get_the_category($post->ID)) as $category) {
                                if (cat_is_ancestor_of( $mainLocationCategory, $category )){
                                    $locationBreadCrumbs=wpse85202_get_taxonomy_parents($category,"category", True, " > ", True);
                                    $locationCategoryText=wpse85202_get_taxonomy_parents($category,"category", False, " ", True);
                                    break;
                            }}?>
                            <ul class="nav navbar-nav navbar-right">
                                <h2><?php echo $locationBreadCrumbs?></h2>
                            </ul>    

                        <?php }?>
                </div>
            </div>
        </div>
    <?php }
}?>
<!--MENU SECTION END-->             
                                    
                                    
             