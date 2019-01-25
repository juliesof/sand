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

			<div class="hours-column col-md-6 col-xl-3">
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
			<div class="map-column ankle-column col-xl-6">
				<div class="map-frame">
					<iframe 
						width="1110"
						height="500" 
						frameborder="0" style="border:0" 
						src="https://maps.google.com/maps/embed/v1/place?key=AIzaSyAoTh6EEpN7jFS98deVPOyw8YHu_nxNt4M&q=21326+E+Sharp+Street,Rock+Hall,+MD+21661"
						allowfullscreen>
					</iframe>
				</div>
			</div>
			<div class="fb-column ankle-column col-md-6 col-xl-3">
				<div id="fb-root"></div>
					<script>(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=323087218077045';
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script>
				<div class="footer-fb-wrapper">
					<div class="fb-page" data-href="https://www.facebook.com/HickoryStickStore/" data-tabs="timeline" data-small-header="true" data-width="500px" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/HickoryStickStore/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/HickoryStickStore/">The Hickory Stick, Ltd.</a></blockquote></div>
				</div>
			</div>
		</div>
	</div><!-- #wrapper-footer-full -->
</div><!-- .ankler-canvas -->

<?php endif; ?>
