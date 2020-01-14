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

    $('.owl-carousel').owlCarousel({
        loop:true,
        // margin:10,
        // nav:false,
        // items:1,
        // center:true,
        // animateOut: 'fadeOut'
        animateOut: 'slideOutDown',
        animateIn: 'flipInX',
        items:1,
        margin:30,
        stagePadding:30,
        smartSpeed:450,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
    })



})(window);