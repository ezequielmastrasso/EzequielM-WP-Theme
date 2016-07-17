<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage EzequielM
 */
?>	





<!--FOOTER SECTION STARTS-->
<div id="contact" class="content-block-nopad bg-deepocean navbar-fixed-bottom">
    <div class="container footer-1-1 ">
        <div class="row">
            <div class="col-sm-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="editContent text-margin-top h14" >
                             All Images © Ezequiel Mastrasso. All Rights Reserved. <br>
                             Site created with open source <a href="https://github.com/ezequielmastrasso/EzequielM-WP-Theme" target="_blank"> EzequielM-WP-Theme</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6" style="text-align: right">
                <div class="editContent h14">follow me
                    <a href="https://twitter.com/ezequielmphoto"  target="_blank" class="btn button-custom btn-custom-one h14" >
                            <i class="fa fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/in/ezequielm"  target="_blank" class="btn button-custom btn-custom-one h14" >
                            <i class="fa fa-linkedin "></i></a>
                    <a href="https://www.instagram.com/ezequielmastrasso/"  target="_blank" class="btn button-custom btn-custom-one h14" >
                            <i class="ion-social-instagram-outline "></i> </a>
                            <a href="https://github.com/ezequielmastrasso"  target="_blank" class="btn button-custom btn-custom-one h14" >
                            <i class="fa fa-github "></i> </a>
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<?php if (!is_single()) {?> <!--IF NOT SINGLE, DO FOOTER-->
<?php } ?>
<!--FOOTER SECTION ENDS-->




<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME -->
    
<!-- ION ICONS STYLES -->
<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/ionicons.min.css" rel="stylesheet" />

<!-- FONT AWESOME ICONS STYLES -->
<link href="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/css/font-awesome.css" rel="stylesheet" />



<!-- CUSTOM SCRIPTS -->
<script>
    $(document).ready(function(){												  
       //Navigation Menu Slider setup
        $('#nav-expander').on('click',function(e){
      		e.preventDefault();
      		$('body').toggleClass('nav-expanded');
      	});
      	$('#nav-close').on('click',function(e){
      		e.preventDefault();
      		$('body').removeClass('nav-expanded');
      	});
        
        
        //HighRes image loader for single page
        $(function() {
        $("#highResLink").click(function(e) {
          e.preventDefault(); // if desired...
          loadHighRes();
          // other methods to call...
        });
        });
    });
</script>
<script
    type="text/javascript"
    async defer
    src="<?php echo bloginfo( 'stylesheet_directory' )?>/assets/js/pinterest/pinit.js"
></script>

<!-- GOOGLE ANALYTICS SCRIPTS -->
<script type="text/javascript">
  var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
  document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script> 

<script type="text/javascript">
  var pageTracker = _gat._getTracker("UA-5215019-1");
  pageTracker._trackPageview();
</script>


</body>

</html>