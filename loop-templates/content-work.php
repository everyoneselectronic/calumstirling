<?php
/**
 * The template used for displaying page content in workpage.php
 *
 * @package understrap
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >

<div class="row">
	<div class="col-md-10 col-md-push-1">
		
		<header class="entry-header">

			<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>

		</header><!-- .entry-header -->

	</div>
</div>

<div class="row">
	<div class="col-md-10 col-md-push-1">
		<?php

		// check if the flexible content field has rows of data
		if( have_rows('media-gallery') ):
			echo '<div class="owl-carousel owl-centered owl-theme">';
			$num = 1;
			$totalSlides = 0;
			$firstCaption = array();

		 	// loop through the rows of data
		    while ( have_rows('media-gallery') ) : the_row();

				// check current row layout
		        if( get_row_layout() == 'gallery' ):

		        	$images = get_sub_field('images');

		    		if( $images ):
		    		 	// loop through the rows of data
					    foreach ($images as $image) {
							$imgURL = $image['url'];
							$imgALT = $image['alt'];
							$imgCAP = $image['caption'];

							// if ALT then add real alt else add title
							// if cap then add ral cap else dont add

					    	echo 
					    	'<div class="item" data-slide-number="' . $num . '" data-caption="' . $imgCAP .  '">
					    		<img src="' . $imgURL . '" alt="' . $imgURL . '" />
					    	</div>';
					    	$num++;
							$totalSlides++;
							array_push($firstCaption, $imgCAP);
					    }

					endif;

		        endif;

		        if( get_row_layout() == 'video' ):
		        	$videoCAP = get_sub_field('video-caption');
		        	echo '<div class="item" data-slide-number="' . $num . '" data-caption="' . $videoCAP . '"><div class="embed-container">';
						the_sub_field('video');
					echo '</div></div>';
		        	$num++;
					$totalSlides++;

					array_push($firstCaption, $videoCAP);

		        endif;

		        

		    endwhile;

		    echo '</div>';

			echo
	    	'<div class="owl-information">
	    		<div class="owl-number"><p><span class="owl-number-data">1</span> of '. $totalSlides .'</p></div>
	    		<div class="owl-caption"><p>' . $firstCaption[0] . '</p></div>
	    	</div>';

		endif;

		?>
	</div>
</div>

<div class="row">
	<div class="col-md-10 col-md-push-1">

		<div class="work-info">
			<?php if ( get_field('medium') ): ?><p><span class="medium-title">Medium: </span><span class=""><?php the_field('medium'); ?></span></p><?php endif ?>
			<?php if ( get_field('format') ): ?><p><span class="format-title">Format: </span><span class=""><?php the_field('format'); ?></span></p><?php endif ?>
			<?php if ( get_field('size') ): ?><p><span class="size-title">Size: </span><span class=""><?php the_field('size'); ?></span></p><?php endif ?>
			<?php if ( get_field('show') ): ?><p><span class="show-title">Show: </span><span class=""><?php the_field('show'); ?></span></p><?php endif ?>
			<?php if ( get_field('venue') ): ?><p><span class="venue-title">Venue: </span><span class=""><?php the_field('venue'); ?></span></p><?php endif ?>
			<?php if ( get_field('year') ): ?><p><span class="year-title">Year: </span><span class=""><?php the_field('year'); ?></span></p><?php endif ?>
			<?php if ( get_field('duration') ): ?><p><span class="duration-title">Duration: </span><span class=""><?php the_field('duration'); ?></span></p><?php endif ?>
		</div>
	    
		<div class="entry-content columnizer" style="clear:both;">

			<?php the_field('description'); ?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">

			<?php edit_post_link( __( 'Edit', 'understrap' ), '<span class="edit-link">', '</span>' ); ?>

		</footer><!-- .entry-footer -->

	</div>
</div>

</article><!-- #post-## -->
