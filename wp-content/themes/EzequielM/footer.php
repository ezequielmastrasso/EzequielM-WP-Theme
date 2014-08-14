<?php

/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage Kin
 */
?>	
</div>
	<!-- End template wrapper -->
        <div align="right" style="position: fixed;bottom: 0; right: 0;z-index: 20;font-size: 12px; background-color: rgba(0,0,0,0.4) ;padding: 3px;">
            <?php
        echo get_option('eze_footer_text') . ' - ' . get_option('eze_copyright_text');
        ?>
        </div>
        
<?php
		/**
    	*	Setup Google Analyric Code
    	**/
    	include (TEMPLATEPATH . "/google-analytic.php");
    	
?>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	wp_footer();
?>
</body>

</html>

