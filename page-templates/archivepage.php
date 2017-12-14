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
                <div class="row">
                    <div class="col-xs-12">
                        <h3><?php the_title(); ?></h3>
                    </div>
                </div>

                    <?php

                        $parentID = wp_get_post_parent_id( $post->ID );
                        $category = $post->post_name;

                        $columns = [
                            ["4 first","3 middle","5 last"],
                            ["5 first","4 middle","3 last"],
                            ["3 first","5 middle","4 last"]
                        ];

                        $rowNum = 0;
                        $colNum = 0;

                        $currentYear = "";
                        $previousYear = "0";

                        global $post;
                        $child_pages_query_args = array(
                            'post_type'         => 'page',
                            'post_parent'       => $parentID,
                            'order'             => 'DSC',
                            'orderby'           => 'date',
                            'posts_per_page'    => -1,
                            'category_name'     => $category
                        );

                        $child_pages = new WP_Query( $child_pages_query_args );
                        ?>

                        <div class="row">                

                            <?php if ( $child_pages->have_posts() ) :  while ( $child_pages->have_posts() ) : $child_pages->the_post(); ?>
                                <?php $currentYear = get_the_date('Y'); ?>
                                <?php if ( $currentYear != $previousYear ) : ?>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <h3><?php echo $currentYear; ?></h3>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <?php $colNum = 0; $rowNum++; if ( $rowNum > 2) { $rowNum = 0; }; $previousYear = $currentYear; ?>
                                <?php endif; ?>

                                <div class="col-md-<?php echo $columns[$rowNum][$colNum]; ?> box">
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

                                <?php if ( $rowNum > 2) { $rowNum = 0; } ?>

                            <?php endwhile; endif; wp_reset_postdata(); ?>

                        </div>

            </main><!-- #main -->
               
            </div><!-- #primary -->

        <?php get_sidebar(); ?>

    </div> <!-- .row -->
        
    </div><!-- Container end -->
    
</div><!-- Wrapper end -->

<?php get_footer(); ?>
