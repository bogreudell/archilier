$(function(){
    // sticky sub nav

    var sticky_navigation_offset_top = $('#sub-page').offset().top;
        
    var sticky_navigation = function(){
        var scroll_top = $(window).scrollTop() 
         
        if (scroll_top > sticky_navigation_offset_top) { 
            $('#sub-page').css({ 'z-index':'6', 'position':'fixed', 'top':'0', 'left':'0', 'opacity':'.98' })
        } else {
            $('#sub-page').css({ 'position': 'relative','opacity':'1' }) 
        }   

    };
     
    sticky_navigation()    
    
    $(window).scroll(function() {
         sticky_navigation()
    })
})