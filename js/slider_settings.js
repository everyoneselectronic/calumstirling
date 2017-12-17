
    jQuery(document).ready(function() {
        var owl = jQuery('.owl-carousel');
        owl.owlCarousel({
            items:(understrap_slider_variables.items),
            loop:true,
            autoplay:false,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            nav: true,
            dots: false,
            margin:0,
            autoHeight:true
        });

        jQuery('.play').on('click',function(){
            owl.trigger('autoplay.play.owl',[1000])
        });
        jQuery('.stop').on('click',function(){
            // owl.trigger('autoplay.stop.owl')
        });
    });
