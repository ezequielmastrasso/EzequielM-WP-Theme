<?php
/**
 * The main template file for display blog page.
 *
 * @package WordPress
 * @subpackage Kin
*/


get_header(); 

?>

		<!-- Begin content -->
		<div id="page_content_wrapper">
		
			<div class="inner">
			
				<h1><?php the_title(); ?></h1><br/><br/>
				
				<!-- Begin main content -->
				<?php

global $more; $more = false; # some wordpress wtf logic
//Get blog post category id
$eze_blog_cat = get_option('eze_blog_cat'); 

$query_string ="cat=$eze_blog_cat&paged=$paged";

query_posts($query_string);

if (have_posts()) : while (have_posts()) : the_post();

?>
						
						
						<!-- Begin each blog post -->
						<div class="post_wrapper">
							<div class="post_header">
								<div class="left">
									<h2 class="cufon">
										<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
											<?php the_title(); ?>									
										</a>
									</h2>
									<div class="post_detail">
										Posted by:&nbsp;<?php the_author(); ?>&nbsp;&nbsp;&nbsp;
										Tags:&nbsp;
										<?php the_tags(''); ?>&nbsp;&nbsp;&nbsp;
										Posted date:&nbsp;
										<?php the_time('F j, Y'); ?> <?php edit_post_link('edit post', ', ', ''); ?>
									</div>								
								</div>
								<div class="post_comment">
									<img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/comments.png" class="mid_align" alt=""/>
									<?php comments_number('No comment', 'Comment', '% Comments'); ?>						
								</div>
							</div>
							<br class="clear"/><br/>
							
							<?php the_content("Continue Reading&hellip;"); ?>
							
						</div>
						<!-- End each blog post -->
						



<?php endwhile; endif; ?>

						<div class="pagination"><p><?php posts_nav_link(' '); ?></p></div>
				<!-- End main content -->
				
				<br class="clear"/>
			</div>
			
		</div>
		<!-- End content -->
				

<?php get_footer(); ?>