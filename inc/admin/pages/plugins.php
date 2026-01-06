<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Get plugin information from WordPress.org API with caching.
 *
 * @param string $slug Plugin slug.
 * @return array|false Plugin info array or false on failure.
 */
function inspiro_get_plugin_info( $slug ) {
	$cache_key = 'inspiro_plugin_info_' . $slug;
	$plugin_info = get_transient( $cache_key );

	if ( false === $plugin_info ) {
		if ( ! function_exists( 'plugins_api' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		}

		$plugin_info = plugins_api(
			'plugin_information',
			array(
				'slug'   => $slug,
				'fields' => array(
					'active_installs' => true,
					'rating'          => true,
					'num_ratings'     => true,
				),
			)
		);

		if ( is_wp_error( $plugin_info ) ) {
			return false;
		}

		// Cache for 12 hours
		set_transient( $cache_key, $plugin_info, 12 * HOUR_IN_SECONDS );
	}

	return $plugin_info;
}

/**
 * Format active installs number.
 *
 * @param int $installs Number of active installs.
 * @return string Formatted number.
 */
function inspiro_format_active_installs( $installs ) {
	if ( $installs >= 1000000 ) {
		return number_format_i18n( $installs / 1000000, 1 ) . 'M+';
	} elseif ( $installs >= 1000 ) {
		return number_format_i18n( $installs / 1000, 0 ) . 'K+';
	}
	return number_format_i18n( $installs ) . '+';
}

$plugins = TGM_Plugin_Activation::$instance->plugins;

if( empty( $plugins ) ) {
	$plugins = array();
}

$number_of_plugins = count( $plugins );

?>
<div class="wpz-onboard_wrapper">
    <div class="wpz_tabs_pages"><!-- #tabs -->

        <?php get_template_part( 'inc/admin/pages/main-menu' ); ?>

		<div class="wpz-onboard_content-wrapper">
			<div class="wpz-onboard_content">
				<div class="wpz-onboard_content-main">
                    <div id="license" class="wpz-onboard_content-side plugins">
                        <div class="wpz-onboard_content-side-section">
                            <h3 class="wpz-onboard_content-side-section-title icon-docs">
                            <?php esc_html_e( 'Recommended Plugins', 'inspiro' ); ?></h3>
                            <p class="wpz-onboard_content-main-intro"><?php esc_html_e( 'Install and activate recommended plugins to ensure full functionality of your theme.', 'inspiro' ); ?></p>
                        </div>
                        
                        <div class="theme-info-wrap">
                            <div class="wpz-onboard_content-side-section install-plugin">
                                <h3 class="wpz-onboard_content-side-section-title icon-assist">
                                    <?php echo esc_html( $number_of_plugins . ' ' ); esc_html_e( 'recommended plugins', 'inspiro' ); ?>
                                </h3>

                                <a href="#" title="Install & Activate all plugins" target="_blank" class="button js-inspiro-install-all-plugins"><?php esc_html_e( 'Install & Activate All Plugins', 'inspiro' ); ?></a>
                            </div>

                            <div class="wpz-grid-wrap three">
                            <?php 
									foreach(  $plugins as $plugin ) {

										$plugin_name = isset( $plugin['name'] ) ? $plugin['name'] : '';
										$plugin_description = isset( $plugin['description'] ) ? $plugin['description'] : '';
										$plugin_path = isset( $plugin['file_path'] ) ? $plugin['file_path'] : '';
										$plugin_slug = isset( $plugin['slug'] ) ? $plugin['slug'] : '';
                                        $plugin_image = isset( $plugin['thumbnail'] ) ? $plugin['thumbnail'] : '';
										$plugin_url = isset( $plugin['external_url'] ) ? $plugin['external_url'] : '';
										$plugin_category = isset( $plugin['category'] ) ? $plugin['category'] : '';

										// Get plugin info from WordPress.org API
										$plugin_api_info = inspiro_get_plugin_info( $plugin_slug );
										$active_installs = $plugin_api_info && isset( $plugin_api_info->active_installs ) ? $plugin_api_info->active_installs : 0;
										$rating = $plugin_api_info && isset( $plugin_api_info->rating ) ? $plugin_api_info->rating : 0;
										$num_ratings = $plugin_api_info && isset( $plugin_api_info->num_ratings ) ? $plugin_api_info->num_ratings : 0;

										$is_plugin_active = is_plugin_active( $plugin_path );

										// Check if plugin is already installed
										$plugin_file = WP_PLUGIN_DIR . '/' . $plugin_slug . '/' . $plugin_slug . '.php';
										$is_plugin_installed = file_exists( $plugin_file );

										$plugin_button_label = __( 'Install & Activate', 'inspiro' );
										$plugin_button_class = 'js-inspiro-plugin-item-button';

										if ( $is_plugin_active ) {
											$plugin_button_label = esc_html__( 'Active', 'inspiro' );
											$plugin_button_class = 'button-disabled';
										}
										else if ( $is_plugin_installed ) {
											$plugin_button_label = esc_html__( 'Activate', 'inspiro' );
										}
									?>

									<div class="section inspiro-plugin-item plugin-item-<?php echo esc_attr( $plugin_slug ); ?>">
                                        <div class="plugin-item-icon"><img width="80" height="80" src="<?php echo esc_html( $plugin_image ); ?>" /></div>
                                        <div clas="plugin-item-info">
    										<h4><?php echo esc_html( $plugin_name ); ?></h4>
											<div class="plugin-badges">
												<?php if ( ! empty( $plugin_category ) ) : ?>
												<span class="plugin-badge category"><?php echo esc_html( $plugin_category ); ?></span>
												<?php endif; ?>
												<span class="plugin-badge recommended"><?php esc_html_e( 'Recommended', 'inspiro' ); ?></span>
											</div>
											<?php if ( ! empty( $plugin_url ) ) : ?>
											<a href="<?php echo esc_url( $plugin_url ); ?>" target="_blank" class="plugin-view-details"><?php esc_html_e( 'View on wordpress.org', 'inspiro' ); ?></a>
											<?php endif; ?>
											<?php if ( $plugin_api_info ) : ?>
											<div class="plugin-stats">
                                                <?php if ( $rating > 0 ) : ?>
                                                <span class="plugin-rating" title="<?php printf( esc_attr__( '%s out of 5 stars', 'inspiro' ), number_format_i18n( $rating / 20, 1 ) ); ?>">
                                                    <span class="dashicons dashicons-star-filled"></span>
                                                    <?php echo esc_html( number_format_i18n( $rating / 20, 1 ) ); ?>
                                                </span>
                                                <?php endif; ?>
												<?php if ( $active_installs > 0 ) : ?>
												<span class="plugin-installs" title="<?php esc_attr_e( 'Active Installations', 'inspiro' ); ?>">
													<span class="dashicons dashicons-download"></span>
													<?php echo esc_html( inspiro_format_active_installs( $active_installs ) ); ?> active installs
												</span>
												<?php endif; ?>
											</div>
											<?php endif; ?>
    										<p class="about"><?php echo wp_kses_post( $plugin_description ); ?></p>

    										<footer class="section_footer">
    											<a href="#" data-plugin-path="<?php echo esc_attr( $plugin_path ); ?>" title="Install & Activate" target="_blank" class="button button-secondary <?php echo esc_attr( $plugin_button_class ); ?>">
    												<?php echo esc_html( $plugin_button_label ); ?>
    											</a>
    											<input type="checkbox" class="hidden" id="inspiro-<?php echo esc_attr( $plugin_slug ); ?>-plugin" name="<?php echo esc_attr( $plugin_slug ); ?>" <?php checked( true ); ?><?php disabled( $is_plugin_active ) ?>>
    										</footer>
                                        </div>
									</div>

								<?php } ?>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
            <?php get_template_part( 'inc/admin/pages/footer' ); ?>

		</div>
	</div><!-- /#tabs -->

</div>
