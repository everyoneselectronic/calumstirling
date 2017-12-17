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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
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
