<?php
/**
 * Marketing theme functions
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.9.5
 */

// Define the Black Friday campaign dates as constants
const BTN_UPGRADE_NOW_LINK = 'https://www.wpzoom.com/themes/inspiro/pricing/?utm_source=wpadmin&utm_medium=bf-inspirolite-banner-btn&utm_campaign=bf-inspirolite';
const BF_START_DATE = '2026-11-25 00:00:00'; // this is the required date format
const BF_END_DATE = '2026-12-02 23:59:59'; // this is the required date format
const BF_DISMISS_BANNER_ACTION = 'inspiro_dismiss_bf_banner';
global $pagenow;


/**
 * Theme Marketing stuff
 * showing only on main dashboard, themes and theme dashboard pages
 */
if ( $pagenow === 'index.php' ||  $pagenow === 'themes.php' && $_SERVER['QUERY_STRING'] === '' ||
	 $pagenow === 'admin.php' && ( $_SERVER['QUERY_STRING'] === 'page=inspiro' || $_SERVER['QUERY_STRING'] === 'page=inspiro-demo' )) {

	add_action('admin_notices', 'inspiro_show_black_friday_banner');
}

/**
 * Display the Black Friday banner if the conditions are met.
 */
function inspiro_show_black_friday_banner() {
	// Get current date
	$today = current_time( 'Y-m-d H:i:s' );

	// Only show the banner between the updated Black Friday dates
	if ($today >= BF_START_DATE && $today <= BF_END_DATE && !inspiro_has_dismissed_banner()) {
		inspiro_display_black_friday_banner();
	}
}

/**
 * Check if the user has dismissed the Black Friday banner.
 *
 * @return bool
 */
function inspiro_has_dismissed_banner() {
	return (bool) get_user_meta(get_current_user_id(), BF_DISMISS_BANNER_ACTION, true);
}

/**
 * Handle the AJAX request to dismiss the Black Friday Banner.
 */
function dismiss_inspiro_black_friday_banner() {
	// Check the nonce
	if ( !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'inspiro_bf_nonce') ) {
		wp_send_json_error('Invalid nonce');
		exit;
	}
	update_user_meta(get_current_user_id(), BF_DISMISS_BANNER_ACTION, true);
	wp_send_json_success();
}
add_action('wp_ajax_inspiro_dismiss_bf_banner', 'dismiss_inspiro_black_friday_banner');


/**
 * Render the Black Friday banner markup.
 */
function inspiro_display_black_friday_banner() {
	ob_start();
	?>
	<div class="inspiro-banner-container-wrapper">
		<div id="inspiro-bf-banner-container" class="is-dismissible inspiro-bf-banner-container notice">
			<div class="radial-gradient left"></div>
			<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/admin/bf-inspiro-premium.png'); ?>"
				 class="bf-inspiro-banner-image"
				 alt="WPZOOM Black Friday Deal"
			>

			<div class="banner-text-container">
				<h2>Upgrade to <span class="green-text">Inspiro Premium!</span></h2>
				<span class="banner-text">Take your website to the next level with Inspiro Premium and unlock powerful features like:</span>

				<div class="banner-promo-btns">
                    <div class="banner-btn">50+ Premium Demos</div>
 					<div class="banner-btn">Slideshow with Video Background</div>
                    <div class="banner-btn">Elementor Templates</div>
                    <div class="banner-btn">Header Builder</div>
                    <div class="banner-btn">Woo Customizer</div>
				</div>
			</div>

			<div class="upgrade-banner">
				<div class="banner-clock">
					<span class="hurry-up">Hurry Up!</span>
					<div class="clock-digits">
						<span><i id="ins-bf-days"></i>d</span>
						<span><i id="ins-bf-hours"></i>h</span>
						<span><i id="ins-bf-minutes"></i>m</span>
						<span><i id="ins-bf-seconds"></i>s</span>
					</div>
				</div>
				<a href="<?php echo BTN_UPGRADE_NOW_LINK ?>" target="_blank" class="btn-upgrade-now">Upgrade now &rarr;</a>
			</div>
			<div class="radial-gradient right"></div>
		</div>
	</div>
	<style>
		.inspiro-banner-container-wrapper {
			margin: 10px 20px 20px 2px;
		}
		/*	rewrite WP core rule */
		.inspiro-bf-banner-container.notice.is-dismissible {
			margin: 10px 0 20px 0;
		}

		.inspiro-bf-banner-container {
			display: flex;
			align-items: center;
			justify-content: flex-start;
			color: #fff;
			/* drow squares with CSS */
			background-color: #242628; /* Base background color for the squares */
			background-image:
				linear-gradient(90deg, rgba(255, 255, 255, .1)  1px, transparent 1px),
				linear-gradient(180deg, rgba(255, 255, 255, .1) 1px, transparent 1px);
			background-size: 20px 20px; /* Size of the squares, including borders */
			border-radius: 8px;
			margin-bottom: 20px;
			padding: 15px 30px 10px;
		}

		.inspiro-bf-banner-container .radial-gradient {
			position: absolute;
			width: 150px;
			height: 150px;
			/*border: 1px solid #FFFFFF;*/
		}
		.inspiro-bf-banner-container .radial-gradient.left{
			bottom: 0;
			left: 0;
			background: radial-gradient(90% 70% at 0% 100%, #22BB66 -129%, rgba(34, 187, 102, 0) 120%);
			border-radius: 0 0 0 8px;
		}
		.inspiro-bf-banner-container .radial-gradient.right{
			right: 0;
			top: 0;
			background: radial-gradient(70% 90% at 100% 0%, #22BB66 -129%, rgba(34, 187, 102, 0) 120%);
			border-radius: 0 8px 0 0;
		}
		.inspiro-bf-banner-container.notice {
			border: unset;
		}
		.bf-inspiro-banner-image {
			max-width: 160px;
			margin: 0 0 10px;
		}
		.banner-text-container {
			margin-left: 40px;
		}
		.banner-text-container h2{
			color: #fff;
			font-size: 26px;
			line-height: 1.2;
			margin: 0 0 15px;
		}
		.banner-text-container .green-text {
			color: #22BB66;
		}
		.banner-text-container .banner-text {
			font-size: 14px;
			font-weight: 300;
			margin-bottom: 15px;
			display: inline-block;
		}
		.banner-promo-btns .banner-btn {
			padding: 4px 16px;
			border: 1px solid #22BB66;
			background: #343434;
			border-radius: 30px;
			display: inline-block;
			margin: 0 5px 8px 0;
			font-size: 12px;
			font-weight: 600;
		}
		.upgrade-banner {
			margin-left: auto;
		}
		.upgrade-banner .banner-clock {
			display: flex;
			flex-direction: column;
		}
		.upgrade-banner .banner-clock .hurry-up {
			font-size: 14px;
			margin-bottom: 5px;
		}
		.banner-clock .clock-digits {
			display: flex;
			font-size: 14px;
			font-weight: 300;
			margin-bottom: 10px;
		}
		.banner-clock .clock-digits span {
			margin-right: 8px;
		}
		.banner-clock .clock-digits i {
			font-style: normal !important;
			margin-right: 2px;
			font-weight: 600;
			font-size: 20px;
		}
		.upgrade-banner a.btn-upgrade-now {
			font-size: 16px;
			font-weight: 600;
			background: #22BB66;
			padding: 13px 25px;
			text-decoration: none;
			color: #fff;
			text-transform: uppercase;
			display: inline-block;
			z-index: 999;
			position: relative;
			border-radius: 5px;
			box-shadow: rgba(0, 0, 0, .1) 0 1px 3px 0, rgba(0, 0, 0, .06) 0 1px 2px 0;
			white-space: nowrap;
		}

		.upgrade-banner a.btn-upgrade-now:hover {
			background: #29cf73;
			box-shadow: rgba(0, 0, 0, .1) 0 4px 6px -1px, rgba(0, 0, 0, .06) 0 2px 4px -1px;
		}
		@media screen and (max-width: 1023px) {
			.inspiro-banner-container-wrapper {
				margin-right: 10px;
			}

			.upgrade-banner {
				margin-bottom: 10px;
				margin-left: 10px;
			}

			.banner-promo-btns,
			.upgrade-banner .banner-clock { display: none; }
		}
		@media screen and (max-width: 700px) {
			.bf-inspiro-banner-image { display: none; }
			.banner-text-container {
				margin-left: 0;
			}
		}
		@media screen and (max-width: 550px) {
			.inspiro-bf-banner-container {
				flex-direction: column;
			}
		}
		@media screen and (min-width: 1024px) and (max-width: 1230px) {
			.inspiro-bf-banner-container.notice.is-dismissible {
				padding-right: 0px;
			}
			.bf-inspiro-banner-image {
				margin-right: 10px;
			}
			.upgrade-banner a.btn-upgrade-now {
				font-size: 14px;
				padding: 10px 10px;
			}
		}
	</style>
	<script type="text/javascript">
		jQuery(document).ready(function () {
			jQuery(document).on('click', '#inspiro-bf-banner-container button.notice-dismiss', function (e) {
				jQuery.ajax({
					url: ajaxurl,
					type: 'POST',
					data: {
						action: 'inspiro_dismiss_bf_banner',
						nonce: '<?php echo wp_create_nonce( 'inspiro_bf_nonce' ); ?>',
					},
					// data: Your Data Here,
					// success: function(response) {
					// 	console.log('Success:', response);
					// },
					// error: function(jqXHR, textStatus, errorThrown) {
					// 	console.log('Error:', textStatus, errorThrown);
					// 	console.log('Response Text:', jqXHR.responseText);
					// }
				});
			});
		});

		// Set the date we're counting down to
		(function () {
			// Constants
			const COUNTDOWN_END_DATE = new Date("<?php echo BF_END_DATE; ?>").getTime();

			// Element references
			const daysContainer = document.getElementById("ins-bf-days");
			const hoursContainer = document.getElementById("ins-bf-hours");
			const minutesContainer = document.getElementById("ins-bf-minutes");
			const secondsContainer = document.getElementById("ins-bf-seconds");

			// Function to calculate the time difference
			function calculateTimeDifference(targetDate) {
				const now = new Date().getTime();
				const distance = targetDate - now;

				if (distance > 0) {
					return {
						days: Math.floor(distance / (1000 * 60 * 60 * 24)),
						hours: Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)),
						minutes: Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)),
						seconds: Math.floor((distance % (1000 * 60)) / 1000)
					};
				} else {
					return {days: 0, hours: 0, minutes: 0, seconds: 0};
				}
			}

			// Function to update the HTML elements with the calculated time
			function updateCountdownDisplay(time) {
				daysContainer.innerText = time.days;
				hoursContainer.innerText = time.hours;
				minutesContainer.innerText = time.minutes;
				secondsContainer.innerText = time.seconds;
			}

			// Render the countdown initially
			updateCountdownDisplay(calculateTimeDifference(COUNTDOWN_END_DATE));

			// Update the countdown every 1 second
			const intervalId = setInterval(function () {
				const timeDifference = calculateTimeDifference(COUNTDOWN_END_DATE);
				updateCountdownDisplay(timeDifference);

				// Clear interval if the countdown is over
				if (timeDifference.days === 0 && timeDifference.hours === 0 &&
					timeDifference.minutes === 0 && timeDifference.seconds === 0) {
					clearInterval(intervalId);
				}
			}, 1000);
		})();
	</script>
<?php echo ob_get_clean(); }

/**
 * Premium demos shown on the Inspiro > Demos admin tab.
 *
 * Fetches the list from the remote WPZOOM endpoint (cached for a day) so new
 * premium demos appear automatically without a theme update. Returns an empty
 * array on any failure (no connection, non-200, malformed JSON), in which case
 * the caller keeps its bundled fallback list.
 *
 * @return array
 */
function inspiro_get_premium_demos() {
	$cache_key = 'inspiro_premium_demos_remote';
	$cached    = get_transient( $cache_key );

	// A cached value (including an empty array from a recent failure) short-circuits.
	if ( false !== $cached ) {
		return is_array( $cached ) ? $cached : array();
	}

	$url = apply_filters(
		'inspiro/premium_demos_remote_url',
		'https://www.wpzoom.com/frame/inspiro-starter-sites.json'
	);

	$response = wp_remote_get( $url, array( 'timeout' => 10 ) );

	if ( is_wp_error( $response ) || 200 !== (int) wp_remote_retrieve_response_code( $response ) ) {
		// Cache the failure briefly so we don't hammer the endpoint on every page load.
		set_transient( $cache_key, array(), HOUR_IN_SECONDS );
		return array();
	}

	$data = json_decode( wp_remote_retrieve_body( $response ), true );

	if ( empty( $data['demos'] ) || ! is_array( $data['demos'] ) ) {
		set_transient( $cache_key, array(), HOUR_IN_SECONDS );
		return array();
	}

	$utm = array(
		'utm_source'   => 'wpadmin',
		'utm_medium'   => 'demos-inspiro-page',
		'utm_campaign' => 'upgrade-premium',
	);

	$designs = array();
	foreach ( $data['demos'] as $demo ) {
		if ( empty( $demo['title'] ) || empty( $demo['demo'] ) ) {
			continue;
		}

		$builders = ( ! empty( $demo['builders'] ) && is_array( $demo['builders'] ) ) ? $demo['builders'] : array();

		// CSS classes consumed by the Elementor / Block Editor filter buttons.
		$class = implode( ' ', array_map( 'sanitize_html_class', $builders ) );

		// Capitalized labels that map to the builder icons in the template.
		$available_for = array();
		foreach ( $builders as $builder ) {
			$available_for[] = ( 'gutenberg' === $builder ) ? 'Gutenberg' : ucfirst( $builder );
		}

		$premium_url = ! empty( $demo['url'] ) ? add_query_arg( $utm, $demo['url'] ) : '';

		$designs[] = array(
			'class'         => $class,
			'id'            => '',
			'title'         => sanitize_text_field( $demo['title'] ),
			'thumbnail_url' => isset( $demo['image'] ) ? esc_url_raw( $demo['image'] ) : '',
			'demo_url'      => esc_url_raw( $demo['demo'] ),
			'name'          => sanitize_text_field( $demo['title'] ),
			'available_for' => $available_for,
			'premium_url'   => esc_url_raw( $premium_url ),
			'is_new'        => ! empty( $demo['is_new'] ),
		);
	}

	// Nothing usable parsed out — fall back rather than caching an empty list for a day.
	if ( empty( $designs ) ) {
		set_transient( $cache_key, array(), HOUR_IN_SECONDS );
		return array();
	}

	$ttl = apply_filters( 'inspiro/premium_demos_cache_ttl', DAY_IN_SECONDS );
	set_transient( $cache_key, $designs, $ttl );

	return $designs;
}

/**
 * Bundled premium demos list for the Inspiro > Demos tab.
 *
 * Used as a fallback by inc/admin/pages/demos.php when the remote list
 * (inspiro_get_premium_demos()) is unavailable.
 *
 * @return array
 */
function inspiro_get_premium_demos_fallback() {
	return [
                                    [
                                        'class' => 'design_default-elementor elementor',
                                        'id' => '',
                                        'title' => 'Portfolio (Default)',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro/',
                                        'name' => 'Business / Portfolio',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/business-portfolio/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_default-elementor gutenberg',
                                        'id' => '',
                                        'title' => 'Portfolio (Default)',
                                        'thumbnail_url' => 'https://www.wpzoom.com/wp-content/uploads/2024/12/inspiro-pp-blocks-1.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-premium-blocks/',
                                        'name' => 'Business / Portfolio (Blocks)',
                                        'available_for' => ['Gutenberg'],
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/gutenberg-block-editor/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_eccentric elementor',
                                        'id' => 'inspiro-studio',
                                        'title' => 'STUDIO*',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-studio/home2-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-studio/',
                                        'name' => 'STUDIO*',
                                        'available_for' => ['Elementor', 'Gutenberg'],
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/studio/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                        'preview_url' => 'https://demo.wpzoom.com/inspiro/',
                                    ],
                                    [
                                        'class' => 'design_eccentric elementor',
                                        'id' => 'inspiro-energy',
                                        'title' => 'Green Energy',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-energy/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-energy/',
                                        'name' => 'Green Energy',
                                        'available_for' => ['Elementor', 'Gutenberg'],
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/green-energy/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                        'preview_url' => 'https://demo.wpzoom.com/inspiro/',
                                    ],
                                    [
                                        'class' => 'design_eccentric elementor',
                                        'id' => 'inspiro-eccentric',
                                        'title' => 'Eccentric',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro-pro/flow-1/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-eccentric/',
                                        'name' => 'Eccentric',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/eccentric/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                        'preview_url' => 'https://demo.wpzoom.com/inspiro-eccentric/',
                                    ],
                                    [
                                        'class' => 'design_default-elementor gutenberg',
                                        'id' => '',
                                        'title' => 'Portfolio (Default)',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-persona/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-persona/',
                                        'name' => 'Persona (Blocks)',
                                        'available_for' => ['Gutenberg'],
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/persona/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_video elementor',
                                        'id' => 'inspiro-video',
                                        'title' => 'Video Production',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/home-video-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-video/',
                                        'name' => 'Video Production',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/video-portfolio-agency/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_video gutenberg',
                                        'id' => 'inspiro-video-blocks',
                                        'title' => 'Video Production (Blocks)',
                                        'thumbnail_url' => 'https://www.wpzoom.com/wp-content/uploads/2025/02/inspiro-video-blocks.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-video-blocks/',
                                        'name' => 'Video Production (Blocks)',
                                        'available_for' => 'Gutenberg',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/video-portfolio-blocks/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_video2 elementor',
                                        'id' => 'inspiro-video2',
                                        'title' => 'Video Production #2',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/home-video2-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-video2/',
                                        'name' => 'Video Production #2',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/video-portfolio-agency-2/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_business elementor',
                                        'id' => 'inspiro-business',
                                        'title' => 'Business',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro-pro/business/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-business/',
                                        'name' => 'Business',
                                        'available_for' => ['Elementor', 'Gutenberg'],
                                        'preview_url' => 'https://demo.wpzoom.com/inspiro-business/',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/business/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_eccentric elementor',
                                        'id' => 'inspiro-logistics',
                                        'title' => 'Cargo & Logistics',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-logistics/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-logistics/',
                                        'name' => 'Cargo & Logistics',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/cargo-logistics/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                        'preview_url' => 'https://demo.wpzoom.com/inspiro-logistics/',
                                    ],
                                    [
                                        'class' => 'design_eccentric elementor',
                                        'id' => 'inspiro-investment',
                                        'title' => 'Investment Startup',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-investment/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-investment/',
                                        'name' => 'Investment Startup',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/investment-startup/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                        'preview_url' => 'https://demo.wpzoom.com/inspiro-investment/',
                                    ],
                                    [
                                        'class' => 'design_eccentric elementor',
                                        'id' => 'inspiro-podcast',
                                        'title' => 'Podcast',
                                        'thumbnail_url' => 'https://www.wpzoom.com/wp-content/uploads/2025/11/podcast.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-podcast/',
                                        'name' => 'Podcast',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/podcast/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                        'preview_url' => 'https://demo.wpzoom.com/inspiro-podcast/',
                                    ],
                                    [
                                        'class' => 'design_eccentric elementor',
                                        'id' => 'inspiro-moving',
                                        'title' => 'Moving Company',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-moving/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-moving/',
                                        'name' => 'Moving Company',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/moving-company/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                        'preview_url' => 'https://demo.wpzoom.com/inspiro-moving/',
                                    ],
                                    [
                                        'class' => 'design_medical elementor',
                                        'id' => 'inspiro-dental',
                                        'title' => 'Dental Clinic',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-dental/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-dental/',
                                        'name' => 'Dental Clinic',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/dental-clinic/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                        'preview_url' => 'https://demo.wpzoom.com/inspiro-dental/',
                                    ],
                                    [
                                        'class' => 'design_movie elementor',
                                        'id' => 'inspiro-movie',
                                        'title' => 'Movies & TV Shows',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-movie/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-movie/',
                                        'name' => 'Movies & TV Shows',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/movies-shows/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                        'preview_url' => 'https://demo.wpzoom.com/inspiro-movie/',
                                    ],
                                    [
                                        'class' => 'design_agency-elementor elementor',
                                        'id' => 'inspiro-agency',
                                        'title' => 'Agency / Business',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/home-agency-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-agency/',
                                        'name' => 'Agency / Business #2',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/agency/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_video elementor',
                                        'id' => '',
                                        'title' => 'Portfolio (Default)',
                                        'thumbnail_url' => 'https://demo.wpzoom.com/inspiro-pro-demo/wp-content/themes/inspiro-pro-select/images/site-layout_agency-dark.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-agency2/',
                                        'name' => 'Agency / Business',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/agency-business-2/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_eccentric elementor',
                                        'id' => 'inspiro-remix',
                                        'title' => 'Remix',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-remix/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-remix/',
                                        'name' => 'Remix',
                                        'available_for' => 'Gutenberg',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/remix/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                        'preview_url' => 'https://demo.wpzoom.com/inspiro/',
                                    ],
                                    [
                                        'class' => 'design_eccentric elementor',
                                        'id' => 'inspiro-real-estate',
                                        'title' => 'Real Estate',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-real-estate/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-real-estate/',
                                        'name' => 'Real Estate',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/real-estate/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                        'preview_url' => 'https://demo.wpzoom.com/inspiro/',
                                    ],
                                    [
                                        'class' => 'design_kids elementor',
                                        'id' => 'inspiro-kids',
                                        'title' => 'Camp',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-scout/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-kids/',
                                        'name' => 'Kids Summer Camp',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/kids-summer-camp/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_architecture elementor',
                                        'id' => 'inspiro-architecture',
                                        'title' => 'Architecture',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-architecture/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-architecture/',
                                        'name' => 'Architecture',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/architecture/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_photography elementor',
                                        'id' => 'inspiro-wedding-photography',
                                        'title' => 'Photographer',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/wedding/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-wedding-photography/',
                                        'name' => 'Wedding Photographer',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/wedding-photographer/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_photography elementor',
                                        'id' => 'inspiro-photography',
                                        'title' => 'Photography',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/home-photography-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-photography/',
                                        'name' => 'Photography',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/photography-wedding/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_food elementor',
                                        'id' => 'inspiro-food',
                                        'title' => 'Food Blog',
                                        'thumbnail_url' => 'https://www.wpzoom.com/wp-content/uploads/2024/12/inspiro-recipe-1.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-recipe/',
                                        'name' => 'Food Blog',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/food-blog/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_coffee elementor',
                                        'id' => 'inspiro-coffee',
                                        'title' => 'Coffee Shop',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-coffee/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-coffee-shop/',
                                        'name' => 'Coffee Shop',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/coffee-shop/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_hotel elementor',
                                        'id' => 'inspiro-construction',
                                        'title' => 'Construction',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-construction/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-construction/',
                                        'name' => 'Construction',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/construction/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_hotel elementor',
                                        'id' => 'inspiro-construction-light',
                                        'title' => 'Construction (Light)',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-construction-light/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-construction-light/',
                                        'name' => 'Construction (Light)',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/construction-light/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_hotel elementor',
                                        'id' => 'inspiro-education',
                                        'title' => 'Education / University',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-education/thumbs/home.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-school/',
                                        'name' => 'Education / University',
                                        'available_for' => ['Elementor', 'Gutenberg'],
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/education/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_hotel elementor',
                                        'id' => 'inspiro-lawyer',
                                        'title' => 'Lawyer / Law Firm',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-lawyer/thumbs/home.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-lawyer/',
                                        'name' => 'Lawyer / Law Firm',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/lawyer/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_hotel elementor',
                                        'id' => 'inspiro-insurance',
                                        'title' => 'Insurance Company',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-insurance/thumbs/home.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-insurance/',
                                        'name' => 'Insurance Company',
                                        'available_for' => ['Elementor', 'Gutenberg'],
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/insurance-company/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_hotel elementor',
                                        'id' => 'inspiro-hotel',
                                        'title' => 'Hotel',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/home-hotel-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-hotel/',
                                        'name' => 'Hotel / Real Estate',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/hotel-real-estate/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_events elementor gutenberg',
                                        'id' => 'inspiro-shop',
                                        'title' => 'Shop / WooCommerce',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/shop-home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-shop/',
                                        'name' => 'Shop / WooCommerce',
                                        'available_for' => ['Elementor', 'Gutenberg'],
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/gear-shop-woocommerce/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_events elementor gutenberg',
                                        'id' => 'inspiro-jewelry',
                                        'title' => 'Furniture Shop / WooCommerce',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro-pro/shop/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-furniture/',
                                        'name' => 'Furniture Shop / WooCommerce',
                                        'available_for' => ['Elementor', 'Gutenberg'],
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/furniture-shop-woocommerce/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_events elementor gutenberg',
                                        'id' => 'inspiro-jewelry',
                                        'title' => 'Jewelry Shop / WooCommerce',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/shop2/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-jewelry2/',
                                        'name' => 'Jewelry Shop / WooCommerce',
                                        'available_for' => ['Elementor'],
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/jewelry-shop-woocommerce/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_restaurant elementor',
                                        'id' => 'inspiro-restaurant',
                                        'title' => 'Restaurant',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/home-restaurant-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-restaurant/',
                                        'name' => 'Restaurant',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/restaurant-cafe/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_events elementor',
                                        'id' => 'inspiro-events',
                                        'title' => 'Events / Conference',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/demo-events.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-event/',
                                        'name' => 'Events / Conference',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/events-conference/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_wellness elementor',
                                        'id' => 'inspiro-wellness',
                                        'title' => 'Wellness / Spa',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-wellness/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-wellness/',
                                        'name' => 'Wellness / Spa',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/wellness-spa/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_wellness elementor',
                                        'id' => 'inspiro-fitness',
                                        'title' => 'Gym / Fitness',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro-pro/fitness/fitness-home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-fitness/',
                                        'name' => 'Gym / Fitness',
                                        'available_for' => 'Gutenberg',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/fitness-gym/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_magazine elementor',
                                        'id' => 'inspiro-nowmag',
                                        'title' => 'NowMag Magazine',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-nowmag/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-nowmag/',
                                        'name' => 'NowMag Magazine',
                                        'available_for' => 'Gutenberg',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/nowmag-magazine/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_magazine elementor',
                                        'id' => 'inspiro-magazine',
                                        'title' => 'Magazine',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-magazine/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-magazine/',
                                        'name' => 'Magazine',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/magazine/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_magazine elementor',
                                        'id' => 'inspiro-auto',
                                        'title' => 'Car Rental',
                                        'thumbnail_url' => 'https://demo.wpzoom.com/inspiro-demo/wp-content/themes/inspiro-select/images/inspiro-rent.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-auto/',
                                        'name' => 'Car Rental / Dealer',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/car-rental/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_magazine elementor gutenberg',
                                        'id' => 'inspiro-coach',
                                        'title' => 'Author / Coach',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-author/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-author/',
                                        'name' => 'Author / Coach',
                                        'available_for' => ['Elementor', 'Gutenberg'],
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/author-coach/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_magazine elementor',
                                        'id' => 'inspiro-church',
                                        'title' => 'Church',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-church/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-church/',
                                        'name' => 'Church',
                                        'available_for' => 'Elementor',
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/church/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_medical elementor gutenberg',
                                        'id' => 'inspiro-medical',
                                        'title' => 'Doctor / Medical',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-medical/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-medical/',
                                        'name' => 'Doctor / Medical',
                                        'available_for' => ['Elementor', 'Gutenberg'],
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/medical-doctor/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_winery gutenberg',
                                        'id' => 'inspiro-pro-winery',
                                        'title' => 'Winery',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro-pro/winery/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-pro-winery/',
                                        'name' => 'Winery',
                                        'available_for' => ['Gutenberg'],
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/winery/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_charity gutenberg',
                                        'id' => 'inspiro-pro-charity',
                                        'title' => 'Charity / NGO',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro-pro/charity/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-pro-charity/',
                                        'name' => 'Charity / NGO',
                                        'available_for' => ['Gutenberg'],
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/charity-ngo/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_tech gutenberg',
                                        'id' => 'inspiro-tech',
                                        'title' => 'Tech',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-finance/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-finance/',
                                        'name' => 'Tech / Finance',
                                        'available_for' => ['Gutenberg'],
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/finance-tech/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_tech gutenberg',
                                        'id' => 'inspiro-band',
                                        'title' => 'Music Band (One-pager)',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-band/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-band/',
                                        'name' => 'Music Band (One-pager)',
                                        'available_for' => ['Elementor', 'Gutenberg'],
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/music-band/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
                                    [
                                        'class' => 'design_tech gutenberg',
                                        'id' => 'inspiro-freelancer',
                                        'title' => 'Freelancer (One-pager)',
                                        'thumbnail_url' => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-freelancer/home-thumb.png',
                                        'demo_url' => 'https://demo.wpzoom.com/inspiro-freelancer2/',
                                        'name' => 'Freelancer (One-pager)',
                                        'available_for' => ['Gutenberg'],
                                        'premium_url' => 'https://www.wpzoom.com/themes/inspiro/starter-sites/freelancer-2/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium',
                                    ],
	];
}
