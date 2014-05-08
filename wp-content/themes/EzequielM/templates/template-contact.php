<?php
/**
 * The main template file for display contact page.
 *
 * @package WordPress
 * @subpackage Kin
*/


/**
*	if not submit form
**/
if(!isset($_GET['your_name']))
{

get_header(); 

?>

		<!-- Begin content -->
		<div id="page_content_wrapper">
		
			<div class="inner">
			
				<h1><?php the_title(); ?></h1>
				
				<!-- Begin main content -->
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>		

							<?php do_shortcode(the_content()); ?>

						<?php endwhile; ?>
						
						<form id="contact_form" method="get" action="<?php echo curPageURL(); ?>">
						    <p>
						    	<label for="your_name">Name</label><br/>
						    	<input id="your_name" name="your_name" type="text" style="width:50%"/>
						    </p>
						    <p style="margin-top:15px">
						    	<label for="email">Email</label><br/>
						    	<input id="email" name="email" type="text" style="width:50%"/>
						    </p>
						    <p style="margin-top:15px">
						    	<label for="message">Message</label><br/>
						    	<input id="message" name="message" type="text" style="width:50%"/>
						    </p>
						    <p style="margin-top:15px"><br/>
								<a class="button" href="javascript:;" onclick="$('#contact_form').submit();">
									<span>Send Message</span>
								</a>
							</p>
						</form>
						<div id="reponse_msg"></div>
						<br/><br/>
				<!-- End main content -->
				
				<br class="clear"/>
			</div>
			
		</div>
		<!-- End content -->
				

<?php get_footer(); ?>
				
				
<?php
}

//if submit form
else
{

	/*
	|--------------------------------------------------------------------------
	| Mailer module
	|--------------------------------------------------------------------------
	|
	| These module are used when sending email from contact form
	|
	*/
	
	//Get your email address
	$contact_email = get_option('eze_contact_email');
	
	//Enter your email address, email from contact form will send to this addresss. Please enter inside quotes ('myemail@email.com')
	define('DEST_EMAIL', $contact_email);
	
	//Change email subject to something more meaningful
	define('SUBJECT_EMAIL', 'Email from contact form');
	
	//Thankyou message when message sent
	define('THANKYOU_MESSAGE', 'Thank you! We will get back to you as soon as possible');
	
	//Error message when message can't send
	define('ERROR_MESSAGE', 'Oops! something went wrong, please try to submit later.');
	
	
	/*
	|
	| Begin sending mail
	|
	*/
	
	$from_name = $_GET['your_name'];
	$from_email = $_GET['email'];
	
	$message = 'Name: '.$from_name.PHP_EOL;
	$message.= 'Email: '.$from_email.PHP_EOL.PHP_EOL;
	$message.= 'Message: '.PHP_EOL.$_GET['message'];
	    
	
	if(!empty($from_name) && !empty($from_email) && !empty($message))
	{
		mail(DEST_EMAIL, SUBJECT_EMAIL, $message);
	
		echo THANKYOU_MESSAGE;
		echo '</p>';
		
		exit;
	}
	else
	{
		echo ERROR_MESSAGE;
		
		exit;
	}
	
	/*
	|
	| End sending mail
	|
	*/
}

?>