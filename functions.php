<?php
    add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
    function my_theme_enqueue_styles() {
        wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/css/theme.min.css' );
        wp_enqueue_style( 'fonts', get_stylesheet_directory_uri() . '/css/fonts.css' );
    }

    /** 
    *Loading slider script conditionally
    **/

    add_action("wp_enqueue_scripts","workpage_scripts");
    function workpage_scripts(){
        if ( is_page_template('page-templates/workpage.php') ) {
            // Add slider settings
            $data = array(
                "items"=> intval( get_theme_mod( 'understrap_theme_slider_count_setting', 1 ))
                );
            wp_enqueue_script("understrap-slider-script", get_stylesheet_directory_uri() . '/js/slider_settings.js', array('jquery'), '0.3.9' );
            wp_localize_script( "understrap-slider-script", "understrap_slider_variables", $data );

            // add columnizer
            wp_enqueue_script("columnizer-script", get_stylesheet_directory_uri() . '/js/jquery.columnizer.min.js', array('jquery') );
            // add columnizer settings
            wp_enqueue_script("columnizer-settings-script", get_stylesheet_directory_uri() . '/js/columnizer_settings.js', array('jquery') );
        }
    }

    /**
     * Disable wp-embed script
     */
    add_action( 'wp_footer', 'my_deregister_scripts' );
    function my_deregister_scripts(){
        wp_deregister_script( 'wp-embed' );
    }

    /**
     * Disable the emoji's
     */
    function disable_emojis() {
     remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
     remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
     remove_action( 'wp_print_styles', 'print_emoji_styles' );
     remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
     remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
     remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
     remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
     add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
     add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
    }
    add_action( 'init', 'disable_emojis' );

    /**
     * Filter function used to remove the tinymce emoji plugin.
     * 
     * @param array $plugins 
     * @return array Difference betwen the two arrays
     */
    function disable_emojis_tinymce( $plugins ) {
     if ( is_array( $plugins ) ) {
     return array_diff( $plugins, array( 'wpemoji' ) );
     } else {
     return array();
     }
    }

    /**
     * Remove emoji CDN hostname from DNS prefetching hints.
     *
     * @param array $urls URLs to print for resource hints.
     * @param string $relation_type The relation type the URLs are printed for.
     * @return array Difference betwen the two arrays.
     */
    function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
     if ( 'dns-prefetch' == $relation_type ) {
     /** This filter is documented in wp-includes/formatting.php */
     $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

    $urls = array_diff( $urls, array( $emoji_svg_url ) );
     }

    return $urls;
    }
?>