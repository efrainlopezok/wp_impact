jQuery(document).ready(function() {
    jQuery('.menu-item a').on('click',function(e){
        e.preventDefault();
        jQuery('html, body').animate({
          scrollTop: jQuery(jQuery(e.target).attr("href")).offset().top
        }, 800);
      });
    
    jQuery(".primary-sidebar .sf-field-taxonomy-cat-prod .sf-level-0").click(function(){
        var textBtn = jQuery(this).text();
        jQuery("#content_container .products__list .inner_content_products .subtitle h2").text(textBtn);
    });
      
  //alert('here');

jQuery('.tabs a').click(function(){

   jQuery('.panel').hide();
   jQuery('.tabs a.active').removeClass('active');
   jQuery(this).addClass('active');
   
   var panel = jQuery(this).attr('href');
   jQuery(panel).fadeIn(1000);
   
   return false;  // prevents link action
  
});  // end click 

   jQuery('.tabs li:first a').click();
	

   	jQuery('.navbar-nav .menu-item-has-children').append('<span class="drop"></span>')

	jQuery(window).resize(function() {
	    var windowSize = jQuery(window).width();
	    if ( windowSize <= 767 ) {
	    	jQuery('.navbar-nav .menu-item-has-children').removeClass('dropdown');
	    }else{
	    	jQuery('.navbar-nav .menu-item-has-children').addClass('dropdown');
	    }
	});

	var windowSize = jQuery(window).width();
    if ( windowSize <= 767 ) {
    	jQuery('.navbar-nav .menu-item-has-children').removeClass('dropdown');
    }else{
    	jQuery('.navbar-nav .menu-item-has-children').addClass('dropdown');
    }

    jQuery('.navbar-nav .menu-item-has-children .drop').click(function(e) {
    	jQuery(this).toggleClass('arrow');
    	jQuery(this).parent().find('.dropdown-menu').toggleClass( "show" );
    });

    // Acordieon
    // var acc = document.getElementsByClassName("accordion");
    // var i;

    // for (i = 0; i < acc.length; i++) {
    //     acc[i].addEventListener("click", function() {
    //         /* Toggle between adding and removing the "active" class,
    //         to highlight the button that controls the panel */
    //         this.classList.toggle("active");

    //         /* Toggle between hiding and showing the active panel */
    //         var panel = this.nextElementSibling;
    //         console.log(panel);
    //         if (panel.style.display === "block") {
    //             panel.style.display = "none";
    //             panel.style.transition = "all .2s";
    //         } else {
    //             panel.style.display = "block";
    //         }
    //     });
    // }
    jQuery('.products--item__more__content .accordion').click(function(event) {
        /* Act on the event */
        jQuery(this).toggleClass('active');
        jQuery(this).parent().find('.panel').slideToggle(500);
    }); 

    // Slick Slide
    jQuery('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        adaptiveHeight: false,
        asNavFor: '.slider-nav'
    });
    jQuery('.slider-nav').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.slider-for',
        dots: false,
        arrows: false,
        centerMode: false,
        focusOnSelect: true
    });

    var backButton = '<span class="slick-prev"><i class="fas fa-angle-left"></i></span>';
    var nextButton = '<span class="slick-next"><i class="fas fa-angle-right"></i></span>'

    jQuery('.main_top_margin .banner-slide').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows:false,
        dots:true,
        responsive: [
            {
                breakpoint: 768,
                    settings: {
                    adaptiveHeight: true
                }
            }
        ]
    });


   function listLocation(){
    var viewportWidth = jQuery(window).width();
    console.log(viewportWidth);
    if (viewportWidth > 768)
    {  
        if( jQuery('.map-location').hasClass("slick-initialized")){
            jQuery(".map-location").slick('unslick');
        }
    }
    else {
        if(!jQuery('.map-location').hasClass("slick-initialized")){
            jQuery('.map-location').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                arrows: false,
              });
        }
        
    }
   }
   listLocation();
      jQuery(window).on('resize',function() {
        listLocation();
      });

}); // end ready
