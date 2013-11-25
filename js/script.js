jQuery(document).ready(function($) {

    $('#slideshow-container').liquidSlider({
            autoSlide: true,
            hoverArrows: false,
            autoSlideInterval: 5000
          });
          
    $('.page-numbers').find('.prev').parent().addClass('move-up');
    $('.page-numbers').find('.next').parent().addClass('move-up');
    
    $( ".page-id-28 .post-entry" ).accordion({ heightStyle: "content" });
    $( "#accordion-products" ).accordion({ heightStyle: "content" });
    $( "#accordion-delivery" ).accordion({ heightStyle: "content", collapsible: true, active: false });
    
    $( ".learn-more" ).click(function() {
		NWin = window.open("http://mylittlesweetpea.com.au/wp-content/themes/mylittlesweetpea/learn-more.html", "Learn More", "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,width=400,height=300");
		NWin.focus();
	});
    
});