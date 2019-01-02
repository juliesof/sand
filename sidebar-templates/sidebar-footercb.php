<?php
/**
 * Sidebar setup for footer full.
 *
 * @package understrap
 */

?>

<?php if ( get_field( 'title', 'option' ) ) : 
		$hours_title = get_field('title','option');
		?>

	<!-- ******************* The Footer CB ACF Area ******************* -->
<div class="ankler-canvas">
	<div class="container" id="footer-cb-content" tabindex="-1">

		<div class="row">

			<div class="col-md-3 hours-column ankle-column">
				<div class="store-hours-wrapper">	
					<h3 class="hours-title">
						<?php echo $hours_title; ?>
					</h3>
					<div id="store-hours">
						<?php 
							if( have_rows( 'hours', 'option' ) ):
								while( have_rows( 'hours', 'option' ) ): the_row();
									$days = get_sub_field('day_range');
									$hours = get_sub_field('time_range');
						?>
						<p class="day-block">
							<?php echo $days ?>
						</p>
						<p class="hour-block">
							<?php echo $hours ?>
						</p>
						<?php
								endwhile;
							endif;
						?>
					</div>
				</div>
			</div>
			<div class="col-md-6 map-column ankle-column">
				<div class="footer-image-wrapper">
					<?php echo wp_get_attachment_image(124, "full"); ?>
				</div>
			</div>
			<div class="col-md-3 fb-column ankle-column">
				<div class="footer-fb-wrapper">
					<?php echo wp_get_attachment_image(125, "full"); ?>
				</div>
			</div>
		</div>
	</div><!-- #wrapper-footer-full -->
</div><!-- .ankler-canvas -->

<?php endif; ?>
