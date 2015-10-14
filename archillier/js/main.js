$(function(){

	function lightboxInit() {
	  // global variables for script
	  var current, size
	  var lightboxTrigger = $('.lightbox_trigger'),
	      lightboxCount = $('.lightbox_trigger').length
	  
	  $(lightboxTrigger).click(function(e) {

	  	console.log('I\'ve been clicked')

	    e.preventDefault()
	    
	    var image_href = $(this).attr('data-lightbox'),  
			slideNum = $(lightboxTrigger).index(this)

	    if ($('#lightbox').length > 0) {        
	      $('#lightbox').show()
	    } else {                                
	      var lightbox =
	          '<div id="lightbox">' +
	          '<div id="slideshow">' +
	          '<ul></ul>' +        
	          '</div>' +
	          '</div>'

	      $('body').append(lightbox);
	      
	      $('body').find(lightboxTrigger).each(function() {
	        var img_href = $(this).attr('data-lightbox'),
	            img_count = $('#slideshow li').length + 1

	        
	          $('#slideshow ul').append(
	            '<li>' +
	            '<div class="img-wrap">' +
	            '<img class="slide-nav" src="' + img_href + '">' +
	            '<div class="nav-wrap">' +
	            '<span class="text-0">' + img_count + ' of ' + lightboxCount + '</span>' +
	            '<button id="prev" class="prev slide-nav"></button>' +
	            '<button id="next" class="next slide-nav"></button>' +
	            '</div>' +
	            '</div>' +
	            '</li>'
	          )
	        


	      })    
	    }

	    size = $('#slideshow ul > li').length

	    $('#slideshow ul > li').hide()
	    $('#slideshow ul > li:eq(' + slideNum + ')').show()

	    current = slideNum
	  });
	  
	  $('body').on('click', '#lightbox', function(e) { 
	      $('#lightbox').hide()
	  })

	  $('body').on('click', '.share', function(e) {
	    e.stopPropagation()
	  })

	  $('body').on('keydown', function(e){

	      if ((e.keyCode || e.which) == 27) {
	          $('#lightbox').hide()
	      }

	    })
	  
	  $('body').on('click', '.slide-nav', function(e) {
	    e.preventDefault()
	    e.stopPropagation()
	    
	    var $this = $(this)
	    var dest;

	    if ($this.hasClass('prev')) {
	      dest = current - 1
	      if (dest < 0) {
	        dest = size - 1
	      }
	    } else {
	      dest = current + 1
	      if (dest > size - 1) {
	        dest = 0
	      }
	    }
	    
	    $('#slideshow ul > li:eq(' + current + ')').hide()
	    $('#slideshow ul > li:eq(' + dest + ')').show()

	    current = dest
	  });

	  $('body').on('keydown', function(e){
	    var dest
	    
	    if ((e.keyCode || e.which ) == 37) {
	      dest = current - 1
	      if (dest < 0) {
	        dest = size - 1
	      }
	      $('#slideshow ul > li:eq(' + current + ')').hide()
	      $('#slideshow ul > li:eq(' + dest + ')').show()
	      current = dest
	    } else if ((e.keyCode || e.which ) == 39) {
	      dest = current + 1
	      if (dest > size - 1) {
	        dest = 0
	      }
	      $('#slideshow ul > li:eq(' + current + ')').hide()
	      $('#slideshow ul > li:eq(' + dest + ')').show()
	      current = dest
	    } 

	  })

	}

	$('#nav-trigger').on('click', function(){//
		$('#nav').slideToggle()
	})

	if ($('.content-wrapper').hasClass('news')) { 
		$('.page-item-13').addClass('current_page_item') 
	} else if ($('.content-wrapper').hasClass('projects')) { 
		$('.page-item-127').addClass('current_page_item') 
	}

	// masonry

	var $grid;

	function triggerMasonry() {

	  if ( !$grid ) {
	    return
	  }

	  $grid.masonry({
	  	columnWidth: '.grid-sizer',
	    itemSelector: '.grid-item',
		percentPosition: true
	  })
	}

	$grid = $('.masonry') 

	$grid.imagesLoaded(function (){ 
	  $grid = $('.masonry')
	  triggerMasonry()
	})
	
	// sub nav toggle 

	$('#sub button').on('click', function(){

		activeId = $(this).attr('id'),  
		activeButton = $('#sub button.active')

		if (!$(this).hasClass('active')) {
			activeButton.removeClass('active')
			$(this).addClass('active')		
		} 

		var gridFilter = function() {

			if (activeId != 'dates') {
				$('.post').each(function(){

					triggerMasonry()
					
					if($(this).hasClass( activeId ) || activeId == 'all' ) {
						//$(this).fadeTo('fast', 1)
						$(this).show()				
					} else {
						//$(this).fadeTo('fast', 0.25)
						$(this).hide()
					}	
				})

			}

		}

		gridFilter()

	})

	// map toggle on projects page located in map-data.js	

	// date filter on blog page

	dateList = $('.date-list button')

	var found = {};
	$('[data-id]').each(function(){
	    var $this = $(this);
	    if(found[$this.data('id')]){
	         $this.remove();   
	    }
	    else{
	         found[$this.data('id')] = true;   
	    }
	});

	$('#dates').on('click', function(){

		$('.date-list').slideToggle()

	})

	/*$('#sub-page button').on('click', function(){

		activeId = $(this).attr('id')  
		activeButton = $('#sub-page button.active')
		activeSection = $('.main.active')

		console.log('success')

		activeButton.removeClass('active')
		activeSection.removeClass('active')

		$(this).addClass('active')

		$('.main').each(function(){

			if($(this).attr('data-section') == activeId) {
				$(this).addClass('active')
			}

		})

	})*/

	$('#sub-page a').on('click', function(){
 
		activeLink = $('#sub-page a.active')

		activeLink.removeClass('active')

		$(this).addClass('active')


	})

	$('.contact-hover').hover(function(){

		addressId = $(this).attr('data-city')


		$('.address').each(function(){
			if($(this).attr('id') != addressId) {
				$(this).toggleClass('blue')
			}
		})

	})

	// address color toggle

	$('.address a').hover(function(){
		addressId = $(this).parent().attr('id')

		$('.contact-hover').each(function(){
			if($(this).attr('data-city') != addressId) {
				$(this).toggleClass('blue')
			}
		})
	})

	// img sizing toggle

	/*$('.img-aside').on('click', function(){
		if ($(this).children().length == 1) {
			$(this).toggleClass('full')
			$(this).parent().find('.aside-text').toggleClass('none')			
		}
	})

	$('.img-aside > div').on('click', function(){
		$(this).parent().toggleClass('full')
		$(this).parent().parent().find('.aside-text').toggleClass('none')
		$(this).parent().children().toggleClass('none')
		$(this).toggleClass('full')
	})*/

	// lightbox init

	lightboxInit()

	// text overlay hide toggle 

	$('.toggle-overlay').on('click', function(e){ 
		console.log('i\'ve been clicked!')
		button = $(this)
		postTitle = $(this).parent().parent().find('.post-title')
		postTitleChildren = postTitle.find('*')
		asideContent = $(this).parent().parent().find('.aside-content')

		$(this).toggleClass('center')
		$(this).parent().parent().toggleClass('slim')
		if ( asideContent.is(':visible') ) { 
				button.text('View Info')
			} else { 
				button.text('Hide Info')
				
			}
		postTitleChildren.each(function(){
			if ( !$(this).hasClass('toggle-overlay') ) $(this).toggle()
		})

		asideContent.toggle() 

	})

	/*$('.single-featured-img').on('click', '#show-overlay', function(){ 
		$(this).hide()
		$('.text-overlay').show() 
	})*/

	$('#show-overlay').on('click', function(){
		$('.text-overlay').toggle()
	})

	// responsive iframe 

	function setAspectRatio() {
		jQuery('iframe').each(function() {
			jQuery(this).css('height',jQuery(this).width()*9/16);
		});
	}

    setAspectRatio();   
    jQuery(window).resize(setAspectRatio);

	// mobile toggle 

	$('#mobile-nav-trigger').on('click', function(){ 

		$('#mobile-nav').slideToggle()

	})

	// Signature

	console.log('@dbudell was here.')

})