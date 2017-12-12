<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package understrap
 */

get_header(); ?>

<div class="wrapper" id="archive-wrapper">
    
    <div  id="content" class="container">

        <div class="row">
        
            <div id="primary" class="<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?> content-area">
               
            <main id="main" class="site-main" role="main">

                    <?php

                        $parentID = wp_get_post_parent_id( $post->ID );
                        $category = $post->post_name;

                    global $post;
                    $child_pages_query_args = array(
                        'post_type'         => 'page',
                        'post_parent'       => $parentID,
                        'order'             => 'ASC',
                        'orderby'           => 'title',
                        'posts_per_page'    => -1,
                        'category_name'     => $category
                    );
                    $child_pages = new WP_Query( $child_pages_query_args );
                    ?>

                    <?php if ( $child_pages->have_posts() ) :  while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>

                    <div class="col-lg-12">
                        <div class="featured-pwrap">
                            <h3><?php the_title(); ?></h3>
                            <a href="<?php the_permalink(); ?>" class="futured-more">Read more</a>
                        </div>
                    </div>
                    <?php endwhile; endif; wp_reset_postdata(); ?>

            </main><!-- #main -->
               
            </div><!-- #primary -->

        <?php get_sidebar(); ?>

    </div> <!-- .row -->
        
    </div><!-- Container end -->
    
</div><!-- Wrapper end -->

<?php get_footer(); ?>
