<?php
/**
 * The main template file for display page.
 *
Template Name: Page Template
 * @package WordPress
 * @subpackage Kin
*/


/**
*	Get Current page object
**/
$page = get_page($post->ID);


/**
*	Get current page id
**/
$current_page_id = '';

if(isset($page->ID))
{
    $current_page_id = $page->ID;
}

/**
*	Check if contact page
**/
$eze_contact_page = get_option('eze_contact_page');
$eze_blog_page = get_option('eze_blog_page');



get_header();

?>


		<!-- End content -->
<div  class="iFrameSection">
        <!-- Begin content -->
        
		<!-- Begin content -->
                
        
            <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>		
            <?php do_shortcode(the_content()); ?><br/><br/>
            <?php endwhile; ?>
                
                
        
        
</div>

<?php get_footer(); ?>

