
    jQuery(document).ready(function() {
        var owl = jQuery('.owl-carousel');
        owl.owlCarousel({
            items:(understrap_slider_variables.items),
            loop:true,
            autoplay:false,
            nav:true,
            dots:false,
            margin:0,
            autoHeight:true,
            lazyLoad:true,
            video:true
        });

        owl.on('changed.owl.carousel', function(event) {

            // get cloned num
            var cloned = jQuery('.owl-item.cloned').length;
            var item = event.item.index-cloned/2;

            var num = jQuery('.owl-item').not('.cloned').eq(item).find('.item').data('slide-number');
            jQuery('.owl-information>.owl-number>p>.owl-number-data').text(num);

            var caption = jQuery('.owl-item').not('.cloned').eq(item).find('.item').data('caption');
            jQuery('.owl-information>.owl-caption>p').text(caption);

        });

        // jQuery('.play').on('click',function(){
            // owl.trigger('autoplay.play.owl',[1000])
        // });
    });
