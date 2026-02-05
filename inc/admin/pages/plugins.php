<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
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

$all_plugins = TGM_Plugin_Activation::$instance->plugins;

if ( empty( $all_plugins ) ) {
	$all_plugins = array();
}

// Separate plugins into recommended and optional.
$plugins          = array();
$optional_plugins = array();

foreach ( $all_plugins as $plugin ) {
	if ( ! empty( $plugin['optional'] ) ) {
		$optional_plugins[] = $plugin;
	} else {
		$plugins[] = $plugin;
	}
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
                                    <?php echo esc_html( $number_of_plugins . ' ' ); esc_html_e( 'Recommended Plugins', 'inspiro' ); ?>
                                </h3>

                                <a href="#" title="Install & Activate Recommended Plugins" target="_blank" class="button js-inspiro-install-all-plugins"><?php esc_html_e( 'Install & Activate Recommended Plugins', 'inspiro' ); ?></a>
                            </div>

                            <div class="wpz-grid-wrap three">
                            <?php 
									foreach ( $plugins as $plugin ) {

										$plugin_name        = isset( $plugin['name'] ) ? $plugin['name'] : '';
										$plugin_description = isset( $plugin['description'] ) ? $plugin['description'] : '';
										$plugin_path        = isset( $plugin['file_path'] ) ? $plugin['file_path'] : '';
										$plugin_slug        = isset( $plugin['slug'] ) ? $plugin['slug'] : '';
										$plugin_image       = isset( $plugin['thumbnail'] ) ? $plugin['thumbnail'] : '';
										$plugin_url         = isset( $plugin['external_url'] ) ? $plugin['external_url'] : '';
										$plugin_category    = isset( $plugin['category'] ) ? $plugin['category'] : '';
										$active_installs    = isset( $plugin['active_installs'] ) ? $plugin['active_installs'] : 0;
										$rating             = isset( $plugin['rating'] ) ? $plugin['rating'] : 0;

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
											<?php if ( $rating > 0 || $active_installs > 0 ) : ?>
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
													<?php echo esc_html( inspiro_format_active_installs( $active_installs ) ); ?>
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

							<?php if ( ! empty( $optional_plugins ) ) : ?>
							<div class="wpz-onboard_content-side-section install-plugin optional-plugins-section">
								<h3 class="wpz-onboard_content-side-section-title icon-assist" style="margin-top:30px;">
									<?php esc_html_e( 'Nice to Have Plugins', 'inspiro' ); ?>
								</h3>
								<p class="wpz-onboard_content-main-intro"><?php esc_html_e( 'These plugins are not required but can enhance your website with additional features.', 'inspiro' ); ?></p>
							</div>

							<div class="wpz-grid-wrap three optional-plugins">
							<?php
								foreach ( $optional_plugins as $plugin ) {
									$plugin_name        = isset( $plugin['name'] ) ? $plugin['name'] : '';
									$plugin_description = isset( $plugin['description'] ) ? $plugin['description'] : '';
									$plugin_path        = isset( $plugin['file_path'] ) ? $plugin['file_path'] : '';
									$plugin_slug        = isset( $plugin['slug'] ) ? $plugin['slug'] : '';
									$plugin_image       = isset( $plugin['thumbnail'] ) ? $plugin['thumbnail'] : '';
									$plugin_url         = isset( $plugin['external_url'] ) ? $plugin['external_url'] : '';
									$plugin_category    = isset( $plugin['category'] ) ? $plugin['category'] : '';
									$active_installs    = isset( $plugin['active_installs'] ) ? $plugin['active_installs'] : 0;
									$rating             = isset( $plugin['rating'] ) ? $plugin['rating'] : 0;

									$is_plugin_active = is_plugin_active( $plugin_path );

									$plugin_button_label = __( 'Install & Activate', 'inspiro' );
									$plugin_button_class = 'js-inspiro-plugin-item-button';

									if ( $is_plugin_active ) {
										$plugin_button_label = esc_html__( 'Active', 'inspiro' );
										$plugin_button_class = 'button-disabled';
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
											<span class="plugin-badge optional"><?php esc_html_e( 'Optional', 'inspiro' ); ?></span>
										</div>
										<?php if ( ! empty( $plugin_url ) ) : ?>
										<a href="<?php echo esc_url( $plugin_url ); ?>" target="_blank" class="plugin-view-details"><?php esc_html_e( 'View on wordpress.org', 'inspiro' ); ?></a>
										<?php endif; ?>
										<?php if ( $rating > 0 || $active_installs > 0 ) : ?>
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
												<?php echo esc_html( inspiro_format_active_installs( $active_installs ) ); ?>
											</span>
											<?php endif; ?>
										</div>
										<?php endif; ?>
										<p class="about"><?php echo wp_kses_post( $plugin_description ); ?></p>

										<footer class="section_footer">
											<a href="#" data-plugin-path="<?php echo esc_attr( $plugin_path ); ?>" title="Install & Activate" target="_blank" class="button button-secondary <?php echo esc_attr( $plugin_button_class ); ?>">
												<?php echo esc_html( $plugin_button_label ); ?>
											</a>
										</footer>
									</div>
								</div>

							<?php } ?>
							</div>
							<?php endif; ?>

                        </div>
                    </div>
				</div>
			</div>
            <?php get_template_part( 'inc/admin/pages/footer' ); ?>

		</div>
	</div><!-- /#tabs -->

</div>
