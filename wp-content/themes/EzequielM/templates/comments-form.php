<?php if ('open' == $post->comment_status) : ?>
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>You must be <a href="<?php echo wp_login_url( get_permalink() ); ?>">logged in</a> to post a comment.</p><br/>
	<?php else : ?>

					<!-- Start of form --> 
					<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="comment_form"> 
					<fieldset> 

					
						<?php if ( is_user_logged_in() ) : ?>
			<?php else : ?>
						<p> 
							<label for="author"> 
								Name <span class="small">(required)</span> 
							</label> 
							<br /> 
							<input class="round m input" name="author" type="text" id="author" value="" tabindex="1" style="width:97%" /> 
						</p> 
						<p> 
							<label for="email"> 
								Email <span class="small">(required)</span> 
							</label> 
							<input class="round m input" name="email" type="text" id="email" value="" tabindex="2" style="width:97%" /> 
						</p> 
						
			<?php endif; ?>
						<p> 
							<label for="comment"> 
								Message <span class="small">(required)</span> 
							</label> 
							<textarea name="comment" cols="40" rows="3" id="comment" tabindex="4" style="width:97%"></textarea> 
						</p> 
						<p> 
							<input name="submit" type="submit" id="submit" value="submit" tabindex="5" />&nbsp;
							<?php cancel_comment_reply_link("Cancel Reply"); ?> 
						</p> 
						<?php comment_id_fields(); ?> 
						<?php do_action('comment_form', $post->ID); ?>
					</fieldset> 
					</form> 
					<!-- End of form --> 
	<?php endif; // If registration required and not logged in ?>

<?php endif; // if comment is open ?>
