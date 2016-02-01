<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage EzequielM
 */
?>	


<?php if (!is_single()) {?>
<!--FOOTER SECTION STARTS-->

<div id="contact" class="content-block-nopad bg-deepocean navbar-fixed-bottom">
		<div class="container footer-1-1 ">
			<div class="row">
				<div class="col-sm-8">
					<div class="row">
						<div class="col-md-12">
							<div class="editContent text-margin-top">
							<i class="fa ion-ios-email"></i>ezequielm@gmail.com 
							<i class="ion-ios-telephone"></i>+353 83 003 0034 
							<i class="fa ion-social-skype"></i>ezequiel.mastrasso 
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="editContent">
					<a href="https://twitter.com/ezequielmphoto"  target="_blank" class="btn button-custom btn-custom-one" >
						<i class="fa fa-twitter"></i></a>
					<a href="https://www.linkedin.com/in/ezequielm"  target="_blank" class="btn button-custom btn-custom-one" >
						<i class="fa fa-linkedin "></i></a>
					<a href="https://www.instagram.com/ezequielmastrasso/"  target="_blank" class="btn button-custom btn-custom-one" >
						<i class="ion-social-instagram-outline "></i> </a>
						<a href="https://github.com/ezequielmastrasso"  target="_blank" class="btn button-custom btn-custom-one" >
						<i class="fa fa-github "></i> </a>
					</div>
				</div>
				
				
			
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div>
    <!--// END Footer 1-1 -->
<?php } ?>
<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME -->
<!-- CORE JQUERY -->
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/jquery-1.11.1.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/js/bootstrap.js"></script>

<!-- CUSTOM SCRIPTS -->


<!-- GOOGLE ANALYTICS SCRIPTS -->
<script type="text/javascript">
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script> 

<script type="text/javascript">
  var pageTracker = _gat._getTracker("UA-5215019-1");
  pageTracker._trackPageview();
</script>


<script>
    $(document).ready(function(){												
       
       //Navigation Menu Slider
        $('#nav-expander').on('click',function(e){
      		e.preventDefault();
      		$('body').toggleClass('nav-expanded');
      	});
      	$('#nav-close').on('click',function(e){
      		e.preventDefault();
      		$('body').removeClass('nav-expanded');
      	});
      	
  
        	
      });
      
          
</script>


</body>

</html>