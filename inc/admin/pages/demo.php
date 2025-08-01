<?php
	
	$parent = wp_get_theme();

?>

	<div class="wpz-onboard_wrapper">
    <div class="wpz_tabs_pages"><!-- #tabs -->

        <?php get_template_part( 'inc/admin/pages/main-menu' ); ?>

		<div class="wpz-onboard_content-wrapper">
			<div class="wpz-onboard_content">
				<div class="wpz-onboard_content-main">
                    <div id="license" class="wpz-onboard_content-side plugins">
                        <div class="wpz-onboard_content-side-section">
                            <h3 class="wpz-onboard_content-side-section-title icon-docs"><?php esc_html_e( 'Inspiro Starter Sites', 'inspiro' ); ?></h3> 
							<p class="wpz-onboard_content-main-intro">
								<?php esc_html_e( 'Importing demo data is the fastest and easiest way to set up your new theme. Choose your desired template, click on \'Import Demo\' and start editing pre-designed content and layouts instead of building everything from scratch.', 'inspiro' ); ?>
							</p><br/>
                            <p class="section_footer">
                                <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/inspiro/starter-sites/?utm_source=wpadmin&utm_medium=demos-starter-sites&utm_campaign=starter-sites-inspiro', 'inspiro' ) ); ?>"
                                    target="_blank" class="button button-primary">
                                        <?php esc_html_e( 'View Premium Starter Sites &rarr;', 'inspiro' ); ?>
                                </a>
                            </p>
                        </div>
                        
                        <div class="theme-info-wrap">
                            <div class="install-inspiro-starter-sites">
								<?php if ( class_exists( 'Inspiro_Starter_Sites_Importer' ) ) : ?>	
									<?php do_action( 'inspiro_starter_sites_admin_page' ); ?>
								<?php else : ?>
                                    <h3>
                                        <?php esc_html_e( 'Install Inspiro Starter Sites Plugin', 'inspiro' ); ?>
                                    </h3>
									<p class="about">
										<?php esc_html_e( 'Click the button below to install the Inspiro Starter Sites plugin to use this feature.', 'inspiro' ); ?>
									</p>
									<p class="section_footer">
										<button class="button button-primary" id="install-inspiro-starter-sites-btn">
											<span id="install-inspiro-starter-sites-btn-text" data-installing-text="<?php esc_attr_e( 'Installing Inspiro Starter Sites', 'inspiro' ); ?>">
												<?php esc_html_e( 'Install Inspiro Starter Sites', 'inspiro' ); ?>
											</span>
											<i class="dashicons dashicons-update spin-icon hidden-element"></i>
										</button>

										<a href="<?php echo esc_url( __( 'https://www.wpzoom.com/documentation/inspiro-lite/inspiro-lite-importing-the-demo-content/', 'inspiro' ) ); ?>"
											target="_blank"
											class="button button-secondary" >
											<?php esc_html_e( 'How it works? &rarr;', 'inspiro' ); ?>
			 							</a>
									</p>
								<?php endif; ?>	
                            </div>
                        </div>
                    </div>
				</div>
			</div>
            <?php get_template_part( 'inc/admin/pages/footer' ); ?>

		</div>
	</div><!-- /#tabs -->
</div>