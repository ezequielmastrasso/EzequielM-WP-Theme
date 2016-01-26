<?php
/**
 * The main template file for display error page.
 *
 * @package WordPress
 * @subpackage Kin
*/


get_header(); 


$eze_404logo = get_option('eze_404');
$eze_mediaRoot = get_option('eze_mediaRoot');
$logo_url="/" . $eze_mediaRoot . "/" . $eze_404logo ;
?>
<style>
    body{ 
  background-image: url("<?php echo $logo_url ?>");
  background-position: 50% 50%;
  background-repeat: no-repeat;
} 
    
</style>
<div  class="iFrameSection">
    <!-- Begin content -->
    <br/>
    <div style="text-align: center; vertical-align: bottom;">
    <h1>mmmhh... something's not right... did I...?</h1><br/>
    <p><?php _e( 'boll*cks!, the page you requested could not be found.<br>'
            . 'Makes sense though... this site has been under heavy development! sorry!<br>'
            . 'try to find it yourself browsing from the home page'); ?></p>
    </div>
    <!-- End main content -->
			
</div>
				

<?php get_footer(); ?>