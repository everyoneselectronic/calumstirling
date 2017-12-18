<?php
/**
 * Template Name: Home Page
 *
 * Template for the home page
 *
 * @package understrap
 */

get_header(); ?>

<div class="wrapper" id="page-wrapper">
    
    <div  id="content" class="container-fluid">

        <div class="row">
        
           <div id="primary" class="col-md-12 content-area">
           
                 <main id="main" class="site-main" role="main">

                    <?php 

                        $columns = [
                            ["4 first","3 middle","5 last"],
                            ["5 first","4 middle","3 last"],
                            ["3 first","5 middle","4 last"]
                        ];

                        $rowNum = 0;
                        $colNum = 0;

                        $posts = get_field('selected_works');
                    ?>

                    <?php if( $posts ) : ?>
                        <div class="row box-row"> 
                        <?php foreach( $posts as $post): ?>
                            <?php setup_postdata($post); ?>
                            
                                <div class="col-sm-<?php echo $columns[$rowNum][$colNum]; ?> box-container no-gutter">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="box size-<?php echo $columns[$rowNum][$colNum]; ?>">
                                            <div class="box-img" style="background: black url('<?php echo the_post_thumbnail_url(); ?>') no-repeat center center; background-size: cover;"></div>
                                            <div class="box-inner">
                                                <div class="box-inner-text">
                                                    <h3><?php the_title(); ?></h3>
                                                    <?php $cat = array(); foreach((get_the_category()) as $category) { array_push($cat, $category->cat_name); } ?>
                                                    <p><em><?php echo implode(', ', $cat); ?></em></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <?php $colNum++; ?>
                                <?php if ( $colNum > 2) : ?>
                                    </div>
                                    <div class="row box-row">
                                <?php $colNum = 0; $rowNum++; endif; ?>

                                <?php if ( $rowNum > 2) { $rowNum = 0; } ?>

                        <?php endforeach; ?>
                        </div>
                        <?php wp_reset_postdata(); ?>
                    <?php endif; ?>

                </main><!-- #main -->
               
            </div><!-- #primary -->

        </div><!-- .row -->
        
    </div><!-- Container end -->
    
</div><!-- Wrapper end -->

<?php get_footer(); ?>