<?php
/**
 * The main template file for display error page.
 *
 * @package WordPress
 * @subpackage Kin
*/


get_header(); 

?>

		<!-- Begin content -->
		<div id="page_content_wrapper">
		
			<div class="inner">
			<br>
                        <br>
				<h1>404 Not Found</h1><br/><br/>
				
				<!-- Begin main content -->
				
				<p><?php _e( 'Apologies, but the page you requested could not be found.', 'Kin' ); ?></p>
						
				<!-- End main content -->
				
				<br class="clear"/>
			</div>
			
		</div>
		<!-- End content -->
				

<?php get_footer(); ?>