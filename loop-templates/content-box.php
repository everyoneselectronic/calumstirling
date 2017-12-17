<?php
/**
 * The template used for displaying box in archivepage.php and homepage.php
 *
 * @package understrap
 */
?>

<div class="col-sm-<?php echo $columns[$rowNum][$colNum]; ?> box-container no-gutter">
	<a href="<?php the_permalink(); ?>">
	    <div class="box size-<?php echo $columns[$rowNum][$colNum]; ?>">
	        <div class="box-img" style="background: black url('<?php echo the_post_thumbnail_url(); ?>') no-repeat center center; background-size: cover;"></div>
	        <div class="box-inner">
	            <div class="box-inner-text">
	                <h3><?php the_title(); ?></h3>
	            </div>
	        </div>
	    </div>
	</a>
</div>