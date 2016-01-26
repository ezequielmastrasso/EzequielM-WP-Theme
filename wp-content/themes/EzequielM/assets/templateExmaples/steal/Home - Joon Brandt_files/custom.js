
!function ($) {

jQuery(document).ready(function($){	
	
	
	
	
	//sharing buttons
	jQuery.sharedCount = function(url, fn) {
		url = encodeURIComponent(url || location.href);
		var arg = {
			url: "//" + (location.protocol == "https:" ? "sharedcount.appspot" : "api.sharedcount") + ".com/?url=" + url,
			cache: true,
			dataType: "json"
		};
		if ('withCredentials' in new XMLHttpRequest) {
			arg.success = fn;
		}
		else {
			var cb = "sc_" + url.replace(/\W/g, '');
			window[cb] = fn;
			arg.jsonpCallback = cb;
			arg.dataType += "p";
		}
		return jQuery.ajax(arg);
	};
	
	

	var completed = 0;
	
	if( $('a.facebook-share').length > 0 || $('a.twitter-share').length > 0 || $('a.pinterest-share').length > 0) {

	
		////facebook
		
		//load share count on load  
		$.getJSON("http://graph.facebook.com/?id="+ window.location +'&callback=?', function(data) {
			if((data.shares != 0) && (data.shares != undefined) && (data.shares != null)) { 
				$('.facebook-share a span.count, a.facebook-share span.count').html( data.shares );	
			}
			else {
				$('.facebook-share a span.count, a.facebook-share span.count').html( 0 );	
			}
			completed++;
			socialFade();
		});
	 
		function facebookShare(){
			window.open( 'https://www.facebook.com/sharer/sharer.php?u='+window.location, "facebookWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
			return false;
		}
		
		$('.facebook-share').click(facebookShare);
		
		
		//google plus
		
		//load share count on load  
		$.sharedCount(location.href, function(data){
			
			$('.google-plus-share a span.count, a.google-plus-share span.count').html( data.GooglePlusOne );	
			
			completed++;
			socialFade();
		});
	 
		function googlePlusShare(){
			window.open( 'https://m.google.com/app/plus/x/?v=compose&content=INSERT_MESSAGE_HERE_WITH_URL_IF_YOU_WANT', "googlePlusWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
			return false;
		}
		
		$('.google-plus-share').click(googlePlusShare);
		
		
		
		
		////twitter
		
		//load tweet count on load 
		$.getJSON('http://urls.api.twitter.com/1/urls/count.json?url='+window.location+'&callback=?', function(data) {
			if((data.count != 0) && (data.count != undefined) && (data.count != null)) { 
				$('.twitter-share a span.count, a.twitter-share span.count').html( data.count );
			}
			else {
				$('.twitter-share a span.count, a.twitter-share span.count').html( 0 );
			}
			completed++;
			socialFade();
		});
		
		function twitterShare(){
			window.open( 'http://twitter.com/intent/tweet?text='+$("h1.project-title").text() +' '+window.location, "twitterWindow", "height=380,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
			return false;
		}
		
		$('.nectar-social .twitter-share').click(twitterShare);

		
		////pinterest
		
		//load pin count on load 
		$.getJSON('http://api.pinterest.com/v1/urls/count.json?url='+window.location+'&callback=?', function(data) {
			if((data.count != 0) && (data.count != undefined) && (data.count != null)) { 
				$('.pinterest-share a span.count, a.pinterest-share span.count').html( data.count );
			}
			else {
				$('.pinterest-share a span.count, a.pinterest-share span.count').html( 0 );
			}
			completed++;
			socialFade();
		});
		
		function pinterestShare(){
		
			var $sharingImg = $('.project-image img').attr('src'); 
			
			window.open( 'http://pinterest.com/pin/create/button/?url='+window.location+'&media='+$sharingImg+'&description='+$('.project-header h1').text(), "pinterestWindow", "height=640,width=660,resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0" ) 
			return false;
		}
		
		
		
		$('.nectar-social .pinterest-share').click(pinterestShare);
		
		
		//fadeIn
		//$('a.nectar-sharing > span.count').hide().css('width','auto');
		function socialFade(){

			if(completed == $('a.nectar-sharing').length && $('a.nectar-sharing').parent().hasClass('in-sight')) {
				
				$('.nectar-social > .nectar-sharing').animate({'padding-right':'15px'},350,'easeOutSine');
				
				
				
				//sharing loadin
				$('.nectar-social a.nectar-sharing').each(function(i){
					var $that = $(this);
					
					$(this).find('> span').show(350,'easeOutSine',function(){
						$that.find('> span').animate({'opacity':1},800);
					});
					
				});
			}
		}
		
		//social light up
		$('.nectar-social').each(function() {

			$(this).appear(function() {
				
				$(this).addClass('in-sight');
				socialFade();
				
				$(this).find('> *').each(function(i){
					
					var $that = $(this);
					
					setTimeout(function(){ 
						
						$that.delay(i*100).queue(function(){ 
							
							var $that = $(this); $(this).addClass('hovered'); 
							
							setTimeout(function(){ 
								$that.removeClass('hovered');
							},300); 
							
						});
					
					},450);
				});
			
			},{accX: 0, accY: -115});
		
		}); 
		
		
	}
	
	
	
});	
	
	
	
}(window.jQuery);	
	
	














(function ($, window, document, Modernizr) {

	"use strict";
	
	$.QueryString = (function (a) {
		if (a == "") return {};
		var b = {};
		var p = a.split('=');
			b[p[0]] = decodeURIComponent(p[1].replace(/\+/g, " "));
		return b;
	}(window.location.hash.substr(1)));	

	
	
	//var tabsNavLis = $('body').find('.tabs-nav').children('li');
	//tabsNavLis.first().addClass('active');
	//if (!$('body').hasClass('tax-portfolio_photo-category')) {
		$("ul.tabs-nav li:nth-child(2)").addClass('active');
	//}
	
	/* ---------------------------------------------------------------------- */
	/*	Ready																  */
	/* ---------------------------------------------------------------------- */
	

	$(window).load(function () {
		
		var module = new Module();
			module.init(['custom', 'portfolio', 'panel', 'tabs']);
			
	});
	
	var Module = function () {}
	
	Module.prototype = {
		init: function (options) {
			this.folio = $('#portfolio-items');
			this.refreshJS(options);
			this.count = '';
			this.elements = [];
			this.items = this.folio.children('li');	
			this.support = Modernizr.csstransitions;
			this.touch = Modernizr.touch;
			this.prefixed = function (property) {
				return Modernizr.prefixed(property);
			};
			
			var page_id = this.queryString('page_id');
			
			if (page_id) {
				this.checkWhatToLoad(page_id);
			}
			
			this.eachItems(page_id);
			
			this.listeners.setProjectNav.call(this, this, page_id);
			this.helper.removeTemplateLoader();
		},
		refreshJS: function (options) {
			if (options) {
				for (var key in options) {
					this.initJS[options[key]].call(this);
				}		
			}
		},
	    helper:  {
			toHome: function () {
				var url = document.URL;
					window.location.href = url.split('#')[0] || url;
			},
			setPageTitle: function(val) {
				$('head title').empty().append(val.text());
			},
			removeTemplateLoader: function() {
				$('.main-template-loader').stop(true, true).animate({
					opacity : 0
				}, 500, function () { 
					$(this).remove(); 
				});
			},	
			fitVids: function () { 
				$('.container').fitVids(); 
			},
			navAction: function (id) {
			
			
			
			
				var self = this;
				
				
				if ($('body').hasClass('single') || $('body').hasClass('tax-portfolio_photo-category')) {
					if ($('.nav-filter:hidden')) {
						$('.nav-filter').stop(true, true).slideUp(250);
					}		
					if ($('.nav-project:hidden')) {
						$('.nav-project').stop(true, true).slideDown(750);
					}
					$('#template-menu').on('click', function (e) {
					
						e.preventDefault();
						if ($('#module-container').hasClass('active')) {
							$('.nav-project').stop(true, true).slideUp(450);
							$('.nav-filter').stop(true, true).slideUp(0);
						} else {
							$('.nav-filter').stop(true, true).slideUp(0);
							$('.nav-project').stop(true, true).slideDown(750);
						}
					});
				} else {
					if ($('.nav-filter:hidden')) {
						$('.nav-filter').stop(true, true).slideDown(700);
					}

					
					
				}
			},
			navActionActivePanel: function (self) {
			
			
				var page_id = self.queryString('page_id');
				
				if ($('#module-container').hasClass('active')) {
					$('.nav-project').stop(true, true).slideUp(450);
					$('.nav-filter').stop(true, true).slideUp(450);
				} else {
					if (page_id) {
						$('.nav-project').stop(true, true).slideUp(450);
					} else {
						$('.nav-filter').stop(true, true).slideDown(450);
					}
				}
			}
		},
		loadModule: function (id) {
			var loadContainer = $('#load-container'),
				loadContainerOld = $('#load-container-old');
				loadContainer.data('self', this);
				
			var self = this;
				
			if (id) {
				if (!loadContainer.html()) {
					loadContainer.load(id + '.html title, #module-container > *', function (response, status, xhr) {
						loadContainerOld.fadeOut(400, function () {
							$('html, body').stop(true, true).animate({
								scrollTop: 0
							}, 200);
							self.folio.fadeIn(300);
							loadContainer.fadeIn(700);
							loadContainerOld.html('');
							self.moduleLoaded(response, status, xhr, self);
						});
					});
				} else {
					loadContainerOld.hide().load(id + '.html title, #module-container > *', function (response, status, xhr) {
						loadContainer.fadeOut(400, function () {
							$('html, body').stop(true, true).animate({
								scrollTop: 0
							}, 200);
							self.folio.fadeIn(300);
							loadContainerOld.fadeIn(700);
							loadContainer.html('');
							self.moduleLoaded(response, status, xhr, self);
						});
					});
				}	
			}
			
		},
		moduleLoaded: function (response, status, xhr, self) {
			var videoLoaded = true;
			var $module = $("#module-container");
			
			switch (status) {
				case "error": console.log("Error loading the page: " + response);
					break;
				case "success":
					var showModuleTimeout = setTimeout(function () {
						self.helper.setPageTitle($module.find('title'));
						$module.find('title').remove();
						if (videoLoaded) {
							self.helper.fitVids();
							videoLoaded = false;
						}
						clearTimeout(showModuleTimeout);
					}, 50);
					break;
			}
		},			
		getIDtoLoad: function (id) {
			if (id != '' && typeof(id) != 'undefined') {
				window.location.hash = 'page_id=' + id;
				this.loadModule(id);	
			}						
		},
		process: function (index) {
			this.getIDtoLoad(this.elements[index]);
		},
		listeners: {
			
			setProjectNav: function (self, id) {
				if ($('.nav-project').length) {
					
					var $navProject = $('.nav-project');
					
					if (Modernizr.touch) {
						$('.nav-filter li:first').on('touchstart', function () {
							var $this = $(this), submenu = $this.children('ul');

							if (submenu.length) {
								submenu.stop(true, true).fadeIn(300);
								$('.portfolio-filter').on('click', 'a', function (e) {
								
								
								
									e.preventDefault();
									submenu.stop(true, true).delay(400).fadeOut(200);
								});
							}
						});	
					} else {
						$('.nav-filter li:first').on('mouseenter', function () {
							var $this = $(this), submenu = $this.children('ul');
							if (submenu.length) {
								submenu.hide().stop(true, true).fadeIn(300);
							}
						}).on('mouseleave', function () {
							$(this).children('ul').stop(true, true).fadeOut(50);
						});	
					}
					
					self.helper.navAction(id);
					
			
				}
			}
		},
		pushElements: function (items) {
			var self = this;
			items.each(function (idx, value) {
				var $this = $(value), 
					link = $this.find('a'),
					pageID = link.data('page-id');
				self.elements.push(pageID);
			});
			this.count = this.elements.length;
		},
		currentElement: function (id) {
			if (id) {
				for (var i in this.elements) {
					if (this.elements[i] == id) {
						this.current_id = i;
					}
				}
			}
		},
		eachItems: function (id) {
			this.pushElements(this.items);
			this.currentElement(id);
		},
		checkWhatToLoad: function (id) {
			this.loadModule(id);
		},
		queryString: function (val) {
			if ($.QueryString[val] != "" && typeof($.QueryString[val]) != 'undefined') {
				return $.QueryString[val];
			} else {
				return '';
			}
		},
		initJS : {
			custom: function () {
				$('#module-container').css({
					minHeight: $(window).outerHeight(true)
				});
			},
			portfolio: function () {
				
				var self = this;
				
				if (self.folio.length) {
					
				
					
					self.folio.mixitup({
						targetSelector: '.mix',
						filterSelector: '.filter',
						buttonEvent: 'click',
						effects: ['fade'],
						listEffects: null,
						easing: 'smooth',
						layoutMode: 'grid',
						targetDisplayGrid: 'inline-block',
						targetDisplayList: 'block',
						transitionSpeed: 500,
						showOnLoad: 'all',
						sortOnLoad: false,
						multiFilter: false,
						resizeContainer: true,
						minHeight: 0,
						perspectiveDistance: '2000',
						perspectiveOrigin: '50% 50%',
						animateGridList: true,
						onMixLoad: null,
						onMixStart: function (elem) { },
						onMixEnd: null
					});
					
					self.folio.infinitescroll({
						navSelector  : '#page-nav',   
						nextSelector : '#page-nav a', 
						itemSelector : '.mix',  
						loading: {
							finishedMsg: 'No more projects to load',
							img: paththeme+'/assets/loader.png'
						}
					}, function (newElements) {
							self.pushElements($(newElements));
						var $newElems = $(newElements).css({ opacity: 0 });
							self.folio.mixitup('remix', 'all');	
						$newElems.imagesLoaded(function () {
							$newElems.stop(true, true).animate({ opacity: 1 }, 400);
						});
					});

					self.folio.on('click', 'a', function (e) {
						//e.preventDefault();
						var $this = $(this), 
							parent = $this.parent('li'),
							index = parent.index(),
							id = $this.data('page-id');
							
						if (Modernizr.touch) {
							
							$('a', self.folio).not($this).removeClass('touched');
							
							if ($this.hasClass('touched')) {
								self.getIDtoLoad(id);
								self.current_id = index;
								self.helper.navAction(id);			
							} else {
								$this.addClass('touched');
							}
						} else {
							self.getIDtoLoad(id);
							self.current_id = index;
							self.helper.navAction(id);			
						}
					});	
					
					self.initJS.hoverMouseMove();
				}
			},
			
			
			
			hoverMouseMove: function () {
				$('.mix').each(function () {
					  $.data(this, 'css', {
						left: 0,
						top: 0
					});
				}).on('mouseenter', function (a) {
					var $target = $(this), 
						css = $.data(this, 'css');
						$target.find('img').css(css);
				}).on('mousemove', function (e) {
					var $target = $(this),
						$img = $target.find('img');
					var c, d;
					 c = ($target.position().left - e.pageX + $target.outerWidth() / 2) / 14;
					 d = ($target.position().top - e.pageY + $target.outerHeight() / 2) / 12;
					 d = Math.round(d);
					 c = Math.round(c);
					 $img.css({
						 top: d,
						 left: c
					 });
				}).on('mouseleave', function (e) {
					var $target = $(this),
						css = $.data(this, 'css');
					 $target.find('img').css(css);
				});	
			},
			
			
			
			
			
			panel: function () {
				var self = this;
				
				$('#template-menu').on('click', function (e) {
					
					e.preventDefault();
					
					var $this = $(this), 
						$module = $('#module-container');

					if (!$this.is('.active') && !$module.is('.active')) {
						if (self.support) {
							$module.css(
								self.prefixed('transform') , !self.touch ? 'translateX(90%)' : 'translateX(100%)'
							);
							$module.addClass('active');
							$this.addClass('active');
						} else {
							$module.stop(true, true).animate({
								left: '80%'
							}, 1000, function () {
								$module.addClass('active');
							});
							$this.addClass('active');
						}
					} else {
						if (self.support) {
							$module.css(
								self.prefixed('transform') , 'translateX(0)'
							);
							$module.removeClass('active');
							$this.removeClass('active');
						} else {
							$module.stop(true, true).animate({
								left: '0'
							}, 1000, function () {
								$module.removeClass('active');
							});
							$this.removeClass('active');
						}
					}
					self.helper.navActionActivePanel(self);
				});	

			},
			tabs: function () {
				
				var self = this;
				
				if ($('.extra-entry').length) {
					var $extraEntry = $('.extra-entry'),
							$tabsNav = $('.tabs-nav'),
							$tabsNavLis = $tabsNav.children('[data-id]'),
							$extraItems = $('.extra', $extraEntry);
					
					//$tabsNav.children('li:first').on('click', 'a', function (e) {
						//e.preventDefault();
						//self.helper.toHome();
					//});

					$tabsNavLis.on('click', 'a', function (e) {
					
						
						var $this = $(this).parent('li'),
							$id = $this.data('id');
							
						if ($this.hasClass('page_sections')) {
							e.preventDefault();
						}	
							
						if ($this.hasClass('active')) {
							return;
						}
						$this.siblings().removeClass('active').end().addClass('active');
						$extraItems.stop(true, true).hide().filter($id).stop(true, true).fadeIn(600);
					});
				}
			}
		}		
	}

	/* ---------------------------------------------------------------------- */
	/*	Plugins																  */
	/* ---------------------------------------------------------------------- */

		/* ---------------------------------------------------- */
		/*	FitVids												*/
		/* ---------------------------------------------------- */

		$.fn.fitVids = function(options) {
			var settings = {
				customSelector: null
			};

			if (!document.getElementById('fit-vids-style')) {

				var div = document.createElement('div'),
				ref = document.getElementsByTagName('base')[0] || document.getElementsByTagName('script')[0],
				cssStyles = '&shy;<style>.fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}</style>';

				div.className = 'fit-vids-style';
				div.id = 'fit-vids-style';
				div.style.display = 'none';
				div.innerHTML = cssStyles;

				ref.parentNode.insertBefore(div,ref);

			}

			if (options) {
				$.extend(settings, options);
			}

			return this.each(function() {
				var selectors = [
					"iframe[src*='player.vimeo.com']",
					"iframe[src*='youtube.com']",
					"iframe[src*='youtube-nocookie.com']",
					"iframe[src*='kickstarter.com'][src*='video.html']",
					"object",
					"embed"
				];

				if (settings.customSelector) {
					selectors.push(settings.customSelector);
				}

				var $allVideos = $(this).find(selectors.join(','));
				$allVideos = $allVideos.not("object object"); // SwfObj conflict patch

				$allVideos.each(function(){
					var $this = $(this);
					if (this.tagName.toLowerCase() === 'embed' && $this.parent('object').length || $this.parent('.fluid-width-video-wrapper').length) {
						return;
					}
					var height = ( this.tagName.toLowerCase() === 'object' || ($this.attr('height') && !isNaN(parseInt($this.attr('height'), 10))) ) ? parseInt($this.attr('height'), 10) : $this.height(),
					width = !isNaN(parseInt($this.attr('width'), 10)) ? parseInt($this.attr('width'), 10) : $this.width(),
					aspectRatio = height / width;
					if(!$this.attr('id')) {
						var videoID = 'fitvid' + Math.floor(Math.random()*999999);
						$this.attr('id', videoID);
					}
					$this.wrap('<div class="fluid-width-video-wrapper"></div>').parent('.fluid-width-video-wrapper').css('padding-top', (aspectRatio * 100)+"%");
					$this.removeAttr('height').removeAttr('width');
				});
			});

		};
		
}(jQuery, window, document, Modernizr));



