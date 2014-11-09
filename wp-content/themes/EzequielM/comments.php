<?php
if ( post_password_required() ) { ?>
	<p>This post is password protected. Enter the password to view comments.</p>
<?php
	return;
}

if( have_comments() ) : ?> 
        <br><h5 class="cufon"><?php comments_number('No comment', 'Comment', '% Comments'); ?> for <?php the_title(); ?></h5><br>
        <?php wp_list_comments( array('callback' => 'eze_comment', 'avatar_size' => '40') ); ?>
        <!-- End of thread -->  
        <class="clear"/>
<?php endif; ?>  


<?php if ('open' == $post->comment_status) : ?> 
		<div id="respond">
			<?php include(TEMPLATEPATH . '/templates/comments-form.php'); ?>
		</div>
			
<?php endif; ?> 