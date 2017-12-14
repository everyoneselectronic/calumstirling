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
                <h3><?php the_title(); ?></h3>

                    <?php

                        $parentID = wp_get_post_parent_id( $post->ID );
                        $category = $post->post_name;

                        $columns = [
                            ["4","3","5"],
                            ["5","4","3"],
                            ["3","5","4"]
                        ];

                        $rowNum = 0;
                        $colNum = 0;

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

                        <div class="row">

                            <?php if ( $child_pages->have_posts() ) :  while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>

                                <div class="col-md-<?php echo $columns[$rowNum][$colNum]; ?>">
                                    <div class="featured-pwrap">
                                        <h3><?php the_title(); ?></h3>
                                        <a href="<?php the_permalink(); ?>" class="futured-more">Read more</a>
                                    </div>
                                </div>

                                <?php $colNum++; ?>
                                <?php if ( $colNum > 2) : ?>
                                    </div>
                                    <div class="row">
                                <?php $colNum = 0; $rowNum++; endif; ?>

                                <?php 
                                    if ( $rowNum > 2) {
                                        $rowNum = 0;
                                    }
                                ?>

                            <?php endwhile; endif; wp_reset_postdata(); ?>

                        </div>

            </main><!-- #main -->
               
            </div><!-- #primary -->

        <?php get_sidebar(); ?>

    </div> <!-- .row -->
        
    </div><!-- Container end -->
    
</div><!-- Wrapper end -->

<?php get_footer(); ?>
