<?php
/**
 * The template used for displaying page content in workpage.php
 *
 * @package understrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

<?php

// check if the flexible content field has rows of data
if( have_rows('media-gallery') ):

 	// loop through the rows of data
    while ( have_rows('media-gallery') ) : the_row();

		// check current row layout
        if( get_row_layout() == 'gallery' ):

        	$images = get_sub_field('images');

    		if( $images ):
    			$num = 1;
    			$totalImages = count($images);
			 	echo '<div class="owl-carousel owl-centered owl-theme">';

			 	// loop through the rows of data
			    foreach ($images as $image) {
			    	echo 
			    	'<div>
			    		<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" />
			    		<div class="owl-textarea">
				    		<div class="owl-number"><p>' . $num . ' of '. $totalImages .'</p></div>
				    		<div class="owl-caption"><p>Test caption</p></div>
				    	</div>
			    	</div>';
			    	$num++;
			    }

				echo '</div>';

			endif;

        endif;

    endwhile;

endif;

?>

	<header class="entry-header">

		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

	</header><!-- .entry-header -->
    
	<div class="entry-content columnizer" style="clear:both;">

		<?php the_field('description'); ?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
