/*
	Easy plugin to get element index position
	Author: Peerapong Pulpipatnan
	http://themeforest.net/user/peerapong
*/

$.fn.getIndex = function(){
	var $p=$(this).parent().children();
    return $p.index(this);
}

$(document).ready(function(){ 

	$('#content_wrapper .inner .card a[rel=slide]').fancybox({ 
		padding: 0,
		overlayColor: '#000', 
		overlayOpacity: .8
	});
	
	$('.gallery_vimeo').fancybox({ 
		padding: 10,
		overlayColor: '#000', 
		overlayOpacity: .8
	});
	
	$('.gallery_youtube').fancybox({ 
		padding: 10,
		overlayColor: '#000', 
		overlayOpacity: .8
	});
	
	$('.img_frame').fancybox({ 
		padding: 0,
		overlayColor: '#000', 
		overlayOpacity: .8
	});
	
	$.validator.setDefaults({
		submitHandler: function() { 
		    var actionUrl = $('#contact_form').attr('action');
		    
		    $.ajax({
  		    	type: 'GET',
  		    	url: actionUrl,
  		    	data: $('#contact_form').serialize(),
  		    	success: function(msg){
  		    		$('#contact_form').hide();
  		    		$('#reponse_msg').html(msg);
  		    	}
		    });
		    
		    return false;
		}
	});
		    
		
	$('#contact_form').validate({
		rules: {
		    your_name: "required",
		    email: {
		    	required: true,
		    	email: true
		    },
		    message: "required"
		},
		messages: {
		    your_name: "Please enter your name",
		    email: "Please enter a valid email address",
		    agree: "Please enter some message"
		}
	});	
	
	var photoItems = $('#content_wrapper .inner .card').length;
	var photoWidth = parseInt($('#gallery_width').val())+20;
	var scrollArea = (photoWidth * photoItems)+50;
	var scrollWidth = $('#wrapper').width() - 235;
	
	$('#content_wrapper').css({width: scrollWidth+'px'});
	
	$(window).resize(function() {
		var scrollWidth = $('#wrapper').width() - 235;
  		$('#content_wrapper').css({width: scrollWidth+'px'});
	});

	
	$("#content_wrapper .inner").css('width', scrollArea);
	$("#scroller").css('width', scrollArea);
	$("#content_wrapper").attr({scrollLeft: 0});					   
	
	
	
	var auto_scroll = $('#kin_gallery_auto_scroll').val();
	
	if(auto_scroll != 0)
	{
		$("#move_next").mouseenter( 
    		function() {
    	    	timerId = setInterval(function() { 
    	    	
    	    		var speed = parseInt($('#slider_speed').val());
					var slider = $('#content_slider');
					var sliderCurrent = slider.slider("option", "value");
					sliderCurrent += speed; // += and -= directions of scroling with MouseWheel
					
					if (sliderCurrent > slider.slider("option", "max")) sliderCurrent = slider.slider("option", "max");
					else if (sliderCurrent < slider.slider("option", "min")) sliderCurrent = slider.slider("option", "min");
					
					slider.slider("value", sliderCurrent);
    	    	
    	    	}, 100);
    	    	
    	    	//$(this).find('img').animate({ opacity: 1 }, 300);
    		}
    	);
    	$("#move_next").mouseleave( 
    		function() { 
    			clearInterval(timerId); 
    		}
		);
		
		$("#move_prev").mouseenter(
    		function() {
    	    	timerId = setInterval(function() { 
    	    	
    	    		var speed = parseInt($('#slider_speed').val());
					var slider = $('#content_slider');
					var sliderCurrent = slider.slider("option", "value");
					sliderCurrent -= speed; // += and -= directions of scroling with MouseWheel
					
					if (sliderCurrent > slider.slider("option", "max")) sliderCurrent = slider.slider("option", "max");
					else if (sliderCurrent < slider.slider("option", "min")) sliderCurrent = slider.slider("option", "min");
					
					slider.slider("value", sliderCurrent);
    	    	
    	    	}, 100);
    	    	
    	    	//$(this).find('img').animate({ opacity: 1 }, 300);
    		}
    	);
    	$("#move_prev").mouseleave(
    		function() { 
    			clearInterval(timerId); 
    		}
		);
	}
	
	$('#content_slider').slider({
		animate: 'slow',
		change: changeSlide,
		slide: doSlide
	});
	
	
	$("##content_wrapper .inner .card").hover(
    	function() {
    		$(this).find('.title').css({ top: -($(this).find('.title').height()+45)});
        	$(this).find('.title').animate({ opacity: .8 }, 300);
    	},
    	function() { 
    		$(this).find('.title').animate({ opacity: 0 }, 0);
    	}
	);
	
	function changeSlide(e, ui)
	{
		var maxScroll = $("#content_wrapper").attr("scrollWidth") - $("#content_wrapper").width();
		var currentScroll = (ui.value * (maxScroll / 100))-65;
		$("#content_wrapper").stop().animate({scrollLeft: currentScroll}, 1200);
	}

	function doSlide(e, ui)
	{
		var maxScroll = $("#content_wrapper").attr("scrollWidth") - $("#content_wrapper").width();
		var currentScroll = (ui.value * (maxScroll / 100))-65;
		$("#content_wrapper").stop().attr({scrollLeft: currentScroll});
	}
	
	$('#main_menu li:not(.current_page_item) a').not( 'ul li ul li a' ).each(function()
	{	
		$(this).hover(function()
		{	
			$(this).addClass('hover');
			$(this).animate({left: 5}, 200);
		},
		function()
		{	
			$(this).removeClass('hover');
			$(this).animate({left: 0}, 200);
		});	
		
	});
	
	$('#main_menu li ul li:not(.current-menu-item)').each(function()
	{	
		
		$(this).hover(function()
		{	
			$(this).find('a:first').addClass('hover');
			$(this).find('a:first').animate({left: 5}, 200);
		},
		function()
		{	
			$(this).find('a:first').removeClass('hover');
			$(this).find('a:first').animate({left: 0}, 200);
		});
		
	});
	
	$( 'ul#main_menu > li:has( ul li.current-menu-item )' ).each(function()
	{	
     	$(this).find('ul.sub-menu').css({overflow:'visible', height:'auto', display: 'block'});
	});
	
	$('ul#main_menu > li:has( ul.sub-menu )').click(function()
	{
		var $sublist = jQuery(this).find('ul:first');
		$sublist.slideToggle('fast');
		
		return false;
	});
	
	$('ul#main_menu > li > ul.sub-menu li ').click(function()
	{
		var subURL = $(this).find('a:first').attr('href');
		location.href=subURL;
		return true;
	});

});