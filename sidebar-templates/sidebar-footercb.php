<?php
/**
 * Sidebar setup for footer full.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

?>

<?php if ( get_field( 'title', 'option' ) ) : 
	$hours_title = get_field('title','option');
?>

	<!-- ******************* The Footer CB ACF Area ******************* -->
<div class="ankler-canvas">
	
	<!-- Map Row -->
	<div id="footer-cb-map" class="container-fluid" tabindex="-1">
		<div class="row">
			<div class="col-12 map-column">
				
				<div class="map-frame">
					<iframe 
						width="1110"
						height="500" 
						frameborder="0" style="border:0" 
						src="https://maps.google.com/maps/embed/v1/place?key=AIzaSyAoTh6EEpN7jFS98deVPOyw8YHu_nxNt4M&q=21326+E+Sharp+Street,Rock+Hall,+MD+21661"
						allowfullscreen>
					</iframe>
				</div>

			</div><!-- .map-column -->
		</div><!-- .row -->
	</div><!-- #footer-cb-map -->

	<div id="footer-cb-content" class="container-fluid">
		<div class="row">
			<div id="store-contact" class="hours-column col-sm-6 col-xl-3">
				<div class="store-hours-wrapper">	
					
					<div class="store-phone-wrapper">
						<?php $phone_title = get_field('phone_title','option'); 
							if ( $phone_title ) : 
							?>
							
							<h3 class="phone-title">
								<?php echo $phone_title; ?>
							</h3>

						<?php endif ?>

						<?php $phone_content = get_field('phone_content','option');
							if ( $phone_content ) : 
							?>

							<p class="phone-content">
								<strong><?php echo $phone_content; ?></strong>
							</p>

						<?php endif; ?>
					</div>

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
			<div class="contact-column ankle-column col-xl-6">
				<div class="footer-contact-form">
					<?php echo do_shortcode( '[ninja_form id=3]' ); ?>
				</div>
			</div>
			<div class="fb-column ankle-column col-sm-6 col-xl-3">
				<!-- <div id="fb-root"></div>
					<script>(function(d, s, id) {
						var js, fjs = d.getElementsByTagName(s)[0];
						if (d.getElementById(id)) return;
						js = d.createElement(s); js.id = id;
						js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=323087218077045';
						fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));</script> -->
				<div id="fb-root"></div>
					<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=323087218077045"></script>
				<div class="footer-fb-wrapper text-center">
					<div class="fb-page" data-href="https://www.facebook.com/HickoryStickStore/" data-tabs="timeline" data-small-header="true" data-width="500" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false"><blockquote cite="https://www.facebook.com/HickoryStickStore/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/HickoryStickStore/">The Hickory Stick, Ltd.</a></blockquote></div>
				</div>
			</div>
		</div>
	</div><!-- #wrapper-footer-full -->
</div><!-- .ankler-canvas -->

<?php endif; ?>

