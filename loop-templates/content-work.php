<?php
/**
 * The template used for displaying page content in workpage.php
 *
 * @package understrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

<div class="row">
	<div class="col-md-8 col-md-push-2">
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
							$imgURL = $image['url'];
							$imgALT = $image['alt'];
							$imgCAP;

							// if ALT then add real alt else add title
							// if cap then add ral cap else dont add

					    	echo 
					    	'<div class="item">
					    		<img src="' . $imgURL . '" alt="' . $imgURL . '" data-slide-number=' . $num . ' data-caption="' . 'Test caption' .  '"  />
					    	</div>';
					    	$num++;
					    }

						echo '</div>';

						echo
				    	'<div class="owl-information">
				    		<div class="owl-number"><p><span class="owl-number-data">1</span> of '. $totalImages .'</p></div>
				    		<div class="owl-caption"><p>Test caption</p></div>
				    	</div>';

					endif;

		        endif;

		    endwhile;

		endif;

		?>
	</div>
</div>

<div class="row">
	<div class="col-md-10 col-md-push-1">
		
		<header class="entry-header">

			<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>

		</header><!-- .entry-header -->
	    
		<div class="entry-content columnizer" style="clear:both;">

			<?php the_field('description'); ?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">

			<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

		</footer><!-- .entry-footer -->

	</div>
</div>

</article><!-- #post-## -->
