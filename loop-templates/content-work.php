<?php
/**
 * The template used for displaying page content in workpage.php
 *
 * @package understrap
 */
?>

<!-- 
Gallery
Title
INFO
Description
-->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

	<?php

	// check if the flexible content field has rows of data
	if( have_rows('media-gallery') ):

	 	// loop through the rows of data
	    while ( have_rows('media-gallery') ) : the_row();

			// check current row layout
	        if( get_row_layout() == 'gallery' ):

	        	// check if the nested repeater field has rows of data
	        	if( have_rows('gallery') ):

				 	echo '<div class="owl-carousel owl-theme">';

				 	// loop through the rows of data
				    while ( have_rows('images') ) : the_row();

						$images = get_sub_field('images');
						$size = 'full';

						foreach ($images as $image) {
							echo '<div class="item">';
		            		echo wp_get_attachment_image( $image['ID'], $size );
		            		echo '</div>';
						}

					endwhile;

					echo '</div>';

				endif;

	        endif;

	    endwhile;

	else :

	    // no layouts found

	endif;

	?>
	
		<?php 

		$images = get_field('gallery');
		$size = 'full'; // (thumbnail, medium, large, full or custom size)

		if( $images ): ?>
		    <div class="owl-carousel owl-theme">
		        <?php foreach( $images as $image ): ?>
		            <div class="item">
		            	<?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
		            </div>
		        <?php endforeach; ?>
		    </div>
		<?php endif; ?>

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
