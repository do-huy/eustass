(function(global){
    'use strict';

    /**
     * @todo: overlay
     * @author: Chiến
     * @since: 14-01-2020
     */
    $('.overlay , .m-hamburger').on('click', function () { 

        var mMenu = $('.m-menu');
        if(mMenu.hasClass('is-open')){
            mMenu.removeClass('is-open');
            mMenu.addClass('is-closed');
        }else{
            mMenu.removeClass('is-closed');
            mMenu.addClass('is-open');
        }

    });

    /**
     * @todo: BANNER SLIDE
     * @author: Chiến
     * @since: 14-01-2020
     */
    $('.owl-carousel').owlCarousel({
        items:1,
        loop:true,
        margin:0,
        dots:true,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
    });

    /**
     * @todo: SLIDE category
     * @author: Chiến
     * @since: 14-01-2020
     */
    $(document).ready(function() {
        var stickyTop = $('.m-header').offset().top;
        
        $(global).scroll(function() {
            var windowTop = $(window).scrollTop();
            if (windowTop > stickyTop) {
                $('.m-header').addClass('sticky');
            } else {
                $('.m-header').removeClass('sticky');
            }
        });
    });



})(window);