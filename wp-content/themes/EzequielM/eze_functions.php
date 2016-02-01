<?php

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
function do_post_panel($post){
    ?>
    <div class="NewsTable" >
        <?php
        //GET CATEGORIES
        $mainCategoryParent= get_category_by_slug( "mainCategories" ); 
        $mainLocationCategory= get_category_by_slug( "continents" );
        $formatCategory= get_category_by_slug( "format" );
        $lensCategory= get_category_by_slug( "lens" );
        
        //GETS MAIN CATEGORY AND LINK
        $mainCategoryParent= get_category_by_slug( "mainCategories" );
        foreach((get_the_category($post->ID)) as $category) {
            if (cat_is_ancestor_of( $mainCategoryParent, $category )){
                $mainCategory= $category;
            }
        }
        //GETS LOCAION CATEGORY AND MAKES BREADCRUMBS
        //CUSTOM TAXONOMY NEEDS BOOTSTRAP BREADCRUMBS
        foreach((get_the_category($post->ID)) as $category) {
            if (cat_is_ancestor_of( $lensCategory, $category )){
                //$locationBreadCrumbs= get_category_parents( $category, true, " > ");
                $lensBreadCrumbs=wpse85202_get_taxonomy_parents($category,"category", True, " > ", True);
                $lensCategoryText=wpse85202_get_taxonomy_parents($category,"category", False, " ", True);
                break;
        }}
        
        foreach((get_the_category($post->ID)) as $category) {
            if (cat_is_ancestor_of( $formatCategory, $category )){
                //$locationBreadCrumbs= get_category_parents( $category, true, " > ");
                $formatBreadCrumbs=wpse85202_get_taxonomy_parents($category,"category", True, " > ", True);
                $formatCategoryText=wpse85202_get_taxonomy_parents($category,"category", False, " ", True);
                break;
        }}?>
        
        <?php //echo $mainCategory->slug ?><br>
        Lens:<br> <?php echo $lensBreadCrumbs?><br>
        format:<br> <?php echo $formatBreadCrumbs?><br>
        <?php $post_categories = get_the_category();
               
               echo "<br>other Tags:<br>";
               foreach ($post_categories as $category){
                   if (!cat_is_ancestor_of( $mainCategoryParent, $category )
                           && (!cat_is_ancestor_of( $mainLocationCategory, $category ))
                           && (!cat_is_ancestor_of( $formatCategory, $category ))
                           && (!cat_is_ancestor_of( $lensCategory, $category ))){
                           echo $category->slug;?><br><?php }
               }       
        ?>
    </div>
    <?php
}?>

<?php function do_nav_bar(){?>


<!--MENU SECTION START-->
    <?php if (!is_single() ) {?>
    
    <div class="navbar navbar-inverse navbar-fixed-top scroll-me" id="menu-section" >
            <div class="container">
                    <!--LOGO-->
                    <div class="navbar-header">
                        <button type="button"
                            class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> <img src="/_media/logo.png"> </a>
                    </div>
                    <!--COLLAPSABLE MENU OPTIONS-->
                    <!--TODO: IF CAT, MENU, IF SINGLE DO BREADCRUMBS-->
                    <div class="navbar-collapse collapse">
                        
                        <?php
                            if (!is_single()) { ?>
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
<?php }}?>
<!--MENU SECTION END-->             
                                    
                                    
             