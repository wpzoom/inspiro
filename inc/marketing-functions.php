<?php
/**
 * Marketing theme functions
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.9.5
 */

// Define the Black Friday campaign dates as constants
const BTN_UPGRADE_NOW_LINK = '#';
const BF_START_DATE = '2024-10-24 00:00:00'; // this is the required date format
const BF_END_DATE = '2024-10-30 23:59:59'; // this is the required date format

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
add_action('admin_notices', 'inspiro_show_black_friday_banner');

/**
 * Check if the user has dismissed the Black Friday banner.
 *
 * @return bool
 */
function inspiro_has_dismissed_banner() {
	return (bool) get_user_meta(get_current_user_id(), 'inspiro_dismiss_black_friday_banner', true);
}

/**
 * Handle dismissing the Black Friday banner.
 */
function inspiro_dismiss_black_friday_banner() {
	update_user_meta(get_current_user_id(), 'inspiro_dismiss_black_friday_banner', 1);
}
add_action('wp_ajax_inspiro_dismiss_black_friday_banner', 'inspiro_dismiss_black_friday_banner');

/**
 * Output the Black Friday banner markup.
 */
function inspiro_display_black_friday_banner() {

	// - Functionality for render first date/time - //
	$today = new DateTime();
	$endDay = new DateTime( BF_END_DATE );

	// Calculate the difference in days between today and the end date
	$interval = $today->diff( $endDay );
	?>
	<div class="inspiro-banner-container-wrapper">
		<div class="is-dismissible inspiro-bf-banner-container notice">
			<div class="radial-gradient left"></div>
			<img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/marketing/bf-inspiro-premium.png'); ?>"
				 class="bf-inspiro-banner-image"
				 alt="WPZOOM Black Friday Deal"
			>

			<div class="banner-text-container">
				<h2>Upgrade to <span class="green-text">Inspiro Premium!</span></h2>
				<span class="banner-text">Take your website to the next level with Inspiro Premium and unlock powerful features like:</span>

				<div class="banner-promo-btns">
					<div class="banner-btn">Advanced Video Integration</div>
					<div class="banner-btn">Slideshow with Video Background</div>
					<div class="banner-btn">15+ Premium Starter Sites</div>
					<div class="banner-btn">Exclusive Premium Support</div>
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
<?php }
