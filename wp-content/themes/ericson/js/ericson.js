(function($) {
    "use strict"; 
    $(function() {

    	var is_touch_device = function() {
			  return !!('ontouchstart' in window);
			}

			var navHoverClick = function() {
				if(is_touch_device()) {
					//.each(function (index, elem) {
					$('.navbar-nav li.dropdown > a').click(function(event) {
						let thisLink = $(this).attr('href');
						if(!$(this).hasClass('hover')) {
							$('.navbar-nav li.dropdown > a').removeClass('hover');
							$(this).addClass('hover');
		  				event.preventDefault();
						}
						else {
							if($(this).hasClass('hover')) {
								$(this).removeClass('hover');
			  				window.location.href = thisLink;
							}
						}
					});
				}
			}

			var setLargestHeight = function(element){
				let tallestHeight = 0;
				element.each(function(){
					let thisHeight = $(this).height();
					if(thisHeight > tallestHeight){
						tallestHeight = thisHeight;
					}
				});
				element.height(tallestHeight);
			}

			var productTitleHeight = function(){
				if($('.product-category-title').length){
					let productTitle = $('.product-category-title');
					setLargestHeight(productTitle);
				}
			}
			//product-category-title

			var industryGridBlockSize = function(){
				if($('.industry-block').length) {
					$('.industry-block').height('auto');
					let windowWidth = window.innerWidth ? window.innerWidth : $(window).width();
					if(windowWidth > 575){
						let industryBlockWidth = $('.industry-block').width();
						$('.industry-block').height(industryBlockWidth);
					}
				}
			}

			var industryPageTextHeight = function() {
				if($('.industries-page .industry-overlay').length){
					let tallestHeight = 0;
					$('.industries-page .industry-overlay').height('auto');
					$('.industries-page .industry-overlay').each(function(){
						let thisHeight = $(this).height();
						if(thisHeight > tallestHeight) {
							tallestHeight = thisHeight;
						}
					});
					$('.industries-page .industry-overlay').height(tallestHeight);
				}
			}

			var servicesGridBlockSize = function(){
				if($('.service-block').length) {
					let serviceBlockWidth = $('.service-block').width();
					$('.service-block').height(serviceBlockWidth);
				}
			}

			var servicesPageTextHeight = function() {
				if($('.services-page .service-overlay').length){
					let tallestHeight = 0;
					$('.services-page .service-overlay').height('auto');
					$('.services-page .service-overlay').each(function(){
						let thisHeight = $(this).height();
						if(thisHeight > tallestHeight) {
							tallestHeight = thisHeight;
						}
					});
					$('.services-page .service-overlay').height(tallestHeight);
				}
			}

			var scrollFunction = function(primaryLogo, secondaryLogo) {
				let windowWidth = window.innerWidth ? window.innerWidth : $(window).width();
				let partnerPortal = $('.partner-portal-wrapper');
				if(windowWidth > 991){
					if (document.body.scrollTop > 160 || document.documentElement.scrollTop > 160) {
				    secondaryLogo.slideUp('fast');
				    partnerPortal.slideUp('fast');
						primaryLogo.fadeIn('fast');
				  } else {
				    secondaryLogo.slideDown('fast');
				    partnerPortal.slideDown('fast');
						primaryLogo.fadeOut('fast');
				  }
				}
			}

			var mainContentTopMargin = function() {
				if($('.site-header').length){
					let headerHeight = $('.site-header').height();
					if ($('main').length) {
						$('main').css('margin-top',headerHeight);
					}
				}
			}

			$.fn.isInViewport = function() {
				var elementTop = $(this).offset().top;
				var elementBottom = elementTop + $(this).outerHeight();
				var viewportTop = $(window).scrollTop();
				var viewportBottom = viewportTop + $(window).height();
				return elementBottom > viewportTop && elementTop < viewportBottom;
			};
    	
			var animateInViewport = function(){
				$('.history-item-info').each(function(){
					if($(this).isInViewport()){
						$(this).addClass('animated fadeInUpBig'); //fadeInUpBig fadeInUp
					}
				});
			}

			var bcSwipe = function(){
				if($('.carousel').length){
					$('.carousel').bcSwipe({ threshold: 50 });
				}
			}

			var toggleSearch = function(){
				if($('#toggle-search').length){
					$('#toggle-search').click(function(){
						$('.main-secondary-nav').slideToggle(200);
						$('.hidden-secondary-nav').slideToggle(200);
					});
					$('.close-link').click(function(){
						$('.main-secondary-nav').slideToggle(200);
						$('.hidden-secondary-nav').slideToggle(200);
					});
				}
			}

			// var is_touch_device = function() {
			//   var prefixes = ' -webkit- -moz- -o- -ms- '.split(' ');
			//   var mq = function(query) {
			//     return window.matchMedia(query).matches;
			//   }

			//   if (('ontouchstart' in window) || window.DocumentTouch && document instanceof DocumentTouch) {
			//     return true;
			//   }

			//   // include the 'heartz' as a way to have a non matching MQ to help terminate the join
			//   // https://git.io/vznFH
			//   var query = ['(', prefixes.join('touch-enabled),('), 'heartz', ')'].join('');
			//   return mq(query);
			// }

			// var mobileNavSecondClickParent = function(){
			// 	let windowWidth = window.innerWidth ? window.innerWidth : $(window).width();
			// 	if(windowWidth < 992){
			// 		if($('.main-navigation li.dropdown > a').length){
			// 			console.log('link exists');
			// 			// if(is_touch_device()){
			// 			// 	console.log('touch device');
			// 				console.log($('a.nav-link'));
			// 				$('a.nav-link').click(function(event) {
			// 					console.log(event);
			// 			    e.preventDefault();
			// 			    alert("asdasdad");
			// 			    return false;   
			// 				});
			// 				//.click(function(event){
			// 					//event.preventDefault();
			// 					// console.log(event);
			// 					// if($(this).hasClass('first-click')){
			// 					// 	console.log('clicked');
			// 					// 	let thisLink = $(this).attr('href');
			// 					// 	window.location.href = thisLink;
			// 					// }
			// 					// else {
			// 					// 	console.log('prevented');
			// 					// 	event.preventDefault();
			// 					// 	$(this).addClass('first-click');
			// 					// }
			// 				//});
			// 			//}
			// 		}
			// 	}
			// }

			industryGridBlockSize();
			mainContentTopMargin();
			industryPageTextHeight();
			servicesGridBlockSize();
			servicesPageTextHeight();
			animateInViewport();
			bcSwipe();
			navHoverClick();
			toggleSearch();
			productTitleHeight();
			//mobileNavSecondClickParent();

			$(window).resize(function() {
				mainContentTopMargin();
				industryGridBlockSize();
				industryPageTextHeight();
				servicesGridBlockSize();
				servicesPageTextHeight();
				productTitleHeight();
			});

			if ($('.history-page').length) {
				$(window).on('resize scroll', function() {
					animateInViewport();
				});
			}

			window.onscroll = function() {scrollFunction($('.navbar-brand'), $('.secondary-logo-wrapper'))};

    }); 
}(jQuery));

