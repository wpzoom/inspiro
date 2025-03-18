<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
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
                            <p class="wpz-onboard_content-main-intro"><?php esc_html_e( 'Install and activate required plugins to ensure full functionality of your theme.', 'inspiro' ); ?></p>
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
