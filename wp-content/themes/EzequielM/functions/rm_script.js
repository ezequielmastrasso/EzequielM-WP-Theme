    jQuery(document).ready(function(){
		jQuery('.rm_options').slideUp();
		
		jQuery('.rm_section h3').click(function(){		
			if(jQuery(this).parent().next('.rm_options').css('display')=='none')
				{	jQuery(this).removeClass('inactive');
					jQuery(this).addClass('active');
					jQuery(this).children('img').removeClass('inactive');
					jQuery(this).children('img').addClass('active');
					
				}
			else
				{	jQuery(this).removeClass('active');
					jQuery(this).addClass('inactive');		
					jQuery(this).children('img').removeClass('active');			
					jQuery(this).children('img').addClass('inactive');
				}
				
			jQuery(this).parent().next('.rm_options').slideToggle('slow');	
		});
		
		jQuery('#current_sidebar li a.sidebar_del').click(function(){
			sTarget = jQuery(this).attr('href');
			sSidebar = jQuery(this).attr('rel');
			objTarget = jQuery(this).parent('li');
			
			jQuery.ajax({
  		    	type: 'POST',
  		    	url: sTarget,
  		    	data: 'sidebar_id='+sSidebar,
  		    	success: function(msg){ 
  		    		objTarget.fadeOut();
  		    	}
		    });
			
			return false;
		});
});