<?php
/**
 * Template Name: Work Page
 *
 * Template for individual work
 *
 * @package understrap
 */

get_header(); ?>

<div class="wrapper" id="page-wrapper">
    
    <div  id="content" class="container">

        <div class="row">
        
           <div id="primary" class="col-md-8 col-md-push-2 content-area">
           
                 <main id="main" class="site-main" role="main">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'loop-templates/content', 'work' ); ?>

                    <?php endwhile; // end of the loop. ?>

                </main><!-- #main -->
               
            </div><!-- #primary -->

        </div><!-- .row -->
        
    </div><!-- Container end -->
    
</div><!-- Wrapper end -->

<?php get_footer(); ?>