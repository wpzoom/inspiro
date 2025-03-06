<div class="wpz-onboard_wrapper">
	<div class="wpz_tabs_pages"><!-- #tabs -->

		<?php get_template_part( 'inc/admin/pages/main-menu' ); ?>

		<div class="wpz-onboard_content-wrapper">
			<div class="wpz-onboard_content">
				<div class="wpz-onboard_content-main">
                    <div id="license" class="wpz-onboard_content-side upgrade-install">
                        <div class="wpz-onboard_content-side-section block-premium">

                            <div class="section-content">
                                <div class="header-row">
                                    <h3 class="wpz-onboard_content-main-title">
                                        <?php esc_html_e( 'Install Inspiro Premium', 'inspiro' ); ?>
                                    </h3>
                                </div>
                                <p class="wpz-onboard_content-main-intro">
                                    <?php esc_html_e( 'Upgrade to Inspiro Premium or PRO for exclusive demos, advanced features, priority support, and regular updates.', 'inspiro' ); ?>
                                </p>
                                <p class="section_footer">
                                    <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/inspiro/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-premium', 'inspiro' ) ); ?>"
                                        target="_blank" class="button button-primary">
                                            <?php esc_html_e( 'Get Inspiro Premium &#8599;', 'inspiro' ); ?>
                                    </a>
                                    <a href="https://www.wpzoom.com/themes/inspiro/starter-sites/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-premium" target="_blank" class="button button-secondary">
                                        <?php esc_html_e( 'View starter sites &#8599;', 'inspiro' ); ?>
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="theme-info-wrap">

                            <h3>
                                <?php esc_html_e( 'Upload theme', 'inspiro' ); ?>
                            </h3>
                            <div class="wpz-grid-wrap">

                                <div class="section quick-action-section">

                                    <form method="post" enctype="multipart/form-data" class="wp-upload-form ml-block-form" action="<?php echo esc_url( self_admin_url( 'update.php?action=upload-theme' ) ); ?>">
                                        <?php wp_nonce_field( 'theme-upload' ); ?>
                                        <label class="screen-reader-text" for="themezip">
                                            <?php
                                            /* translators: Hidden accessibility text. */
                                            _e( 'Theme zip file', 'inspiro' );
                                            ?>
                                        </label>
                                        <input type="file" id="themezip" name="themezip" accept=".zip"/>
                                        <?php submit_button( _x( 'Install Now', 'theme', 'inspiro' ), '', 'install-theme-submit', false ); ?>
                                    </form>

                                </div>
                                <div class="section quick-action-section">
                                    <div class="section-content">
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M26 27.5C26 26.6716 26.6716 26 27.5 26H29.5C30.3284 26 31 26.6716 31 27.5C31 28.3284 30.3284 29 29.5 29H27.5C26.6716 29 26 28.3284 26 27.5Z" fill="#242628"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M26 15.5C26 14.6716 26.6716 14 27.5 14H29.5C30.3284 14 31 14.6716 31 15.5C31 16.3284 30.3284 17 29.5 17H27.5C26.6716 17 26 16.3284 26 15.5Z" fill="#242628"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6 3.5C4.61929 3.5 3.5 4.61929 3.5 6V30C3.5 31.3807 4.61929 32.5 6 32.5H34C35.3807 32.5 36.5 31.3807 36.5 30V12C36.5 10.6193 35.3807 9.5 34 9.5H21.0704C19.9001 9.5 18.8073 8.91514 18.1582 7.94145L15.3457 3.72265C15.253 3.58355 15.0968 3.5 14.9297 3.5H6ZM0.5 6C0.5 2.96243 2.96243 0.5 6 0.5H14.9297C16.0999 0.5 17.1927 1.08485 17.8418 2.05855L20.6544 6.27735C20.7471 6.41645 20.9032 6.5 21.0704 6.5H34C37.0376 6.5 39.5 8.96243 39.5 12V30C39.5 33.0376 37.0376 35.5 34 35.5H6C2.96243 35.5 0.5 33.0376 0.5 30V6Z" fill="#242628"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M26 21.5C26 20.6716 26.6716 20 27.5 20H29.5C30.3284 20 31 20.6716 31 21.5C31 22.3284 30.3284 23 29.5 23H27.5C26.6716 23 26 22.3284 26 21.5Z" fill="#242628"/>
                                        </svg>
                                        <?php esc_html_e( 'If you have purchased the Premium or PRO version of the theme, please download it as a ZIP file from the Members Area and upload it in the form on the left.', 'inspiro' ); ?>
                                    </div>
                                </div>
                            </div>

                            <hr class="wpz-onboard_hr" />

                            <div>
                                <h3>
                                    <?php esc_html_e( 'From the documentation', 'inspiro' ); ?>
                                </h3>
                                <p class="about-quick-links">
                                    <a class="description-link" href="https://www.wpzoom.com/documentation/inspiro/inspiro-how-to-install-inspiro/" target="_blank">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M3.75 1.6875C2.61059 1.6875 1.6875 2.61059 1.6875 3.75C1.6875 4.06066 1.93934 4.3125 2.25 4.3125C2.56066 4.3125 2.8125 4.06066 2.8125 3.75C2.8125 3.23191 3.23191 2.8125 3.75 2.8125C4.06066 2.8125 4.3125 2.56066 4.3125 2.25C4.3125 1.93934 4.06066 1.6875 3.75 1.6875Z" fill="#3496FF"/>
                                            <path d="M2.8125 14.25C2.8125 13.9393 2.56066 13.6875 2.25 13.6875C1.93934 13.6875 1.6875 13.9393 1.6875 14.25C1.6875 15.3894 2.61059 16.3125 3.75 16.3125C4.06066 16.3125 4.3125 16.0607 4.3125 15.75C4.3125 15.4393 4.06066 15.1875 3.75 15.1875C3.23191 15.1875 2.8125 14.7681 2.8125 14.25Z" fill="#3496FF"/>
                                            <path d="M2.25 9.68994C2.56066 9.68994 2.8125 9.94178 2.8125 10.2524V11.7524C2.8125 12.0631 2.56066 12.3149 2.25 12.3149C1.93934 12.3149 1.6875 12.0631 1.6875 11.7524V10.2524C1.6875 9.94178 1.93934 9.68994 2.25 9.68994Z" fill="#3496FF"/>
                                            <path d="M2.8125 6.24756C2.8125 5.9369 2.56066 5.68506 2.25 5.68506C1.93934 5.68506 1.6875 5.9369 1.6875 6.24756V7.74756C1.6875 8.05822 1.93934 8.31006 2.25 8.31006C2.56066 8.31006 2.8125 8.05822 2.8125 7.74756V6.24756Z" fill="#3496FF"/>
                                            <path d="M5.68497 15.75C5.68497 15.4393 5.93681 15.1875 6.24747 15.1875H7.74747C8.05813 15.1875 8.30997 15.4393 8.30997 15.75C8.30997 16.0607 8.05813 16.3125 7.74747 16.3125H6.24747C5.93681 16.3125 5.68497 16.0607 5.68497 15.75Z" fill="#3496FF"/>
                                            <path d="M6.24747 1.6875C5.93681 1.6875 5.68497 1.93934 5.68497 2.25C5.68497 2.56066 5.93681 2.8125 6.24747 2.8125H7.74747C8.05813 2.8125 8.30997 2.56066 8.30997 2.25C8.30997 1.93934 8.05813 1.6875 7.74747 1.6875H6.24747Z" fill="#3496FF"/>
                                            <path d="M15.75 13.6875C16.0607 13.6875 16.3125 13.9393 16.3125 14.25C16.3125 15.3894 15.3894 16.3125 14.25 16.3125C13.9393 16.3125 13.6875 16.0607 13.6875 15.75C13.6875 15.4393 13.9393 15.1875 14.25 15.1875C14.7681 15.1875 15.1875 14.7681 15.1875 14.25C15.1875 13.9393 15.4393 13.6875 15.75 13.6875Z" fill="#3496FF"/>
                                            <path d="M14.25 1.6875C13.9393 1.6875 13.6875 1.93934 13.6875 2.25C13.6875 2.56066 13.9393 2.8125 14.25 2.8125C14.7681 2.8125 15.1875 3.23191 15.1875 3.75C15.1875 4.06066 15.4393 4.3125 15.75 4.3125C16.0607 4.3125 16.3125 4.06066 16.3125 3.75C16.3125 2.61059 15.3894 1.6875 14.25 1.6875Z" fill="#3496FF"/>
                                            <path d="M15.75 5.68506C16.0607 5.68506 16.3125 5.9369 16.3125 6.24756V7.74756C16.3125 8.05822 16.0607 8.31006 15.75 8.31006C15.4393 8.31006 15.1875 8.05822 15.1875 7.74756V6.24756C15.1875 5.9369 15.4393 5.68506 15.75 5.68506Z" fill="#3496FF"/>
                                            <path d="M16.3125 10.2524C16.3125 9.94178 16.0607 9.68994 15.75 9.68994C15.4393 9.68994 15.1875 9.94178 15.1875 10.2524V11.7524C15.1875 12.0631 15.4393 12.3149 15.75 12.3149C16.0607 12.3149 16.3125 12.0631 16.3125 11.7524V10.2524Z" fill="#3496FF"/>
                                            <path d="M9 5.4375C9.31066 5.4375 9.5625 5.68934 9.5625 6V10.642L10.8523 9.35225C11.0719 9.13258 11.4281 9.13258 11.6477 9.35225C11.8674 9.57192 11.8674 9.92808 11.6477 10.1477L9.39775 12.3977C9.34382 12.4517 9.28166 12.4924 9.21532 12.5198C9.14899 12.5473 9.07627 12.5625 9 12.5625C8.92373 12.5625 8.85101 12.5473 8.78468 12.5198C8.71834 12.4924 8.65618 12.4517 8.60225 12.3977L6.35225 10.1477C6.13258 9.92808 6.13258 9.57192 6.35225 9.35225C6.57192 9.13258 6.92808 9.13258 7.14775 9.35225L8.4375 10.642V6C8.4375 5.68934 8.68934 5.4375 9 5.4375Z" fill="#3496FF"/>
                                            <path d="M9.69003 2.25C9.69003 1.93934 9.94187 1.6875 10.2525 1.6875H11.7525C12.0632 1.6875 12.315 1.93934 12.315 2.25C12.315 2.56066 12.0632 2.8125 11.7525 2.8125H10.2525C9.94187 2.8125 9.69003 2.56066 9.69003 2.25Z" fill="#3496FF"/>
                                            <path d="M10.2525 15.1875C9.94187 15.1875 9.69003 15.4393 9.69003 15.75C9.69003 16.0607 9.94187 16.3125 10.2525 16.3125H11.7525C12.0632 16.3125 12.315 16.0607 12.315 15.75C12.315 15.4393 12.0632 15.1875 11.7525 15.1875H10.2525Z" fill="#3496FF"/>
                                        </svg>
                                        <?php esc_html_e( 'How to Install the Premium version', 'inspiro' ); ?>
                                    </a>
                                    <a class="description-link" href="https://www.wpzoom.com/documentation/inspiro/inspiro-how-to-activate-the-license-key/" target="_blank">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.75546 3.93518C8.64894 3.41351 8.39329 2.9162 7.98852 2.51142C6.89044 1.41276 5.10924 1.41296 4.01077 2.51142C2.9121 3.61009 2.9121 5.3905 4.01077 6.48917C5.10944 7.58784 6.88985 7.58784 7.98852 6.48917C8.39464 6.08304 8.65065 5.58375 8.75652 5.06018L10.6875 5.05222V6.45292C10.6875 6.76358 10.9393 7.01542 11.25 7.01542C11.5607 7.01542 11.8125 6.76358 11.8125 6.45292V5.04758L13.6875 5.03984V6.42802C13.6875 6.73868 13.9393 6.99052 14.25 6.99052C14.5607 6.99052 14.8125 6.73868 14.8125 6.42802V4.47502C14.8125 4.47424 14.8125 4.47346 14.8125 4.47269C14.8112 4.1631 14.5599 3.91252 14.25 3.91252M7.19285 3.30675C6.5344 2.64774 5.46569 2.64749 4.80627 3.30692C4.14693 3.96625 4.14693 5.03434 4.80627 5.69367C5.4656 6.353 6.53369 6.353 7.19302 5.69367C7.5218 5.36489 7.68663 4.93447 7.68751 4.50378C7.68751 4.50322 7.68751 4.50265 7.6875 4.50209C7.6875 4.50004 7.6875 4.49799 7.68751 4.49595C7.68641 4.06554 7.52141 3.63531 7.19285 3.30675Z" fill="#3496FF"/>
                                            <path d="M14.2488 3.91252C14.2485 3.91252 14.2481 3.91252 14.2477 3.91252L8.75546 3.93518" fill="#3496FF"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.4977 12.3324C13.9389 12.3304 14.2924 12.6879 14.2924 13.1241C14.2924 13.561 13.9394 13.9172 13.5 13.9172C13.0622 13.9172 12.7076 13.5626 12.7076 13.1248C12.7076 12.6878 13.061 12.3337 13.4977 12.3324ZM13.4977 12.3324L13.4955 12.3325L13.497 12.5436L13.5 12.5427V12.3324L13.4977 12.3324Z" fill="#3496FF"/>
                                            <path d="M11.2924 13.1241C11.2924 12.6879 10.9389 12.3304 10.4977 12.3324L10.5 12.3324V12.5427L10.497 12.5436L10.4955 12.3325L10.4977 12.3324C10.061 12.3337 9.70761 12.6878 9.70761 13.1248C9.70761 13.5626 10.0622 13.9172 10.5 13.9172C10.937 13.9172 11.2924 13.5626 11.2924 13.1241Z" fill="#3496FF"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.49773 12.3324C7.93886 12.3304 8.29236 12.6879 8.29236 13.1241C8.29236 13.5626 7.93703 13.9172 7.49999 13.9172C7.06219 13.9172 6.70761 13.5626 6.70761 13.1248C6.70761 12.6878 7.06097 12.3337 7.49773 12.3324ZM7.49773 12.3324L7.49547 12.3325L7.49704 12.5436L7.49999 12.5427V12.3324L7.49773 12.3324Z" fill="#3496FF"/>
                                            <path d="M5.29236 13.1241C5.29236 12.6879 4.93886 12.3304 4.49773 12.3324L4.49999 12.3324V12.5427L4.49704 12.5436L4.49547 12.3325L4.49773 12.3324C4.06097 12.3337 3.70761 12.6878 3.70761 13.1248C3.70761 13.5626 4.06219 13.9172 4.49999 13.9172C4.93703 13.9172 5.29236 13.5626 5.29236 13.1241Z" fill="#3496FF"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.9375 13.1249C0.9375 11.3645 2.36459 9.93742 4.125 9.93742H13.875C15.6354 9.93742 17.0625 11.3645 17.0625 13.1249C17.0625 14.8853 15.6354 16.3124 13.875 16.3124H4.125C2.36459 16.3124 0.9375 14.8853 0.9375 13.1249ZM4.125 11.0624C2.98591 11.0624 2.0625 11.9858 2.0625 13.1249C2.0625 14.264 2.98591 15.1874 4.125 15.1874H13.875C15.0141 15.1874 15.9375 14.264 15.9375 13.1249C15.9375 11.9858 15.0141 11.0624 13.875 11.0624H4.125Z" fill="#3496FF"/>
                                        </svg>
                                        <?php esc_html_e( 'How to Activate your License Key', 'inspiro' ); ?>
                                    </a>
                                    <a class="description-link" href="https://www.wpzoom.com/documentation/inspiro/inspiro-upgrade-from-inspiro-lite-free-to-inspiro-premium-pro/" target="_blank">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M12.2023 6.97824C12.2704 7.00569 12.3343 7.04703 12.3895 7.10225L13.5145 8.22725C13.7342 8.44692 13.7342 8.80308 13.5145 9.02275C13.2948 9.24242 12.9387 9.24242 12.719 9.02275L12.5543 8.85799V10.5C12.5543 11.6357 11.6274 12.5625 10.4918 12.5625H8.25C7.93934 12.5625 7.6875 12.3107 7.6875 12C7.6875 11.6893 7.93934 11.4375 8.25 11.4375H10.4918C11.0061 11.4375 11.4293 11.0143 11.4293 10.5V8.85801L11.2645 9.02275C11.0448 9.24242 10.6887 9.24242 10.469 9.02275C10.2493 8.80308 10.2493 8.44692 10.469 8.22725L11.592 7.1043C11.5988 7.09741 11.6058 7.0907 11.6129 7.08418C11.7129 6.99306 11.8458 6.9375 11.9918 6.9375C12.0662 6.9375 12.1373 6.95196 12.2023 6.97824Z" fill="#3496FF"/>
                                            <path d="M5.27275 8.97725C5.05308 8.75758 4.69692 8.75758 4.47725 8.97725C4.25758 9.19692 4.25758 9.55308 4.47725 9.77275L5.60225 10.8977C5.65618 10.9517 5.71834 10.9924 5.78468 11.0198C5.85101 11.0473 5.92373 11.0625 6 11.0625C6.14396 11.0625 6.28791 11.0076 6.39775 10.8977L7.52275 9.77275C7.74242 9.55308 7.74242 9.19692 7.52275 8.97725C7.30308 8.75758 6.94692 8.75758 6.72725 8.97725L6.5625 9.142V7.5C6.5625 6.98191 6.98191 6.5625 7.5 6.5625H9.75C10.0607 6.5625 10.3125 6.31066 10.3125 6C10.3125 5.68934 10.0607 5.4375 9.75 5.4375H7.5C6.36059 5.4375 5.4375 6.36059 5.4375 7.5V9.142L5.27275 8.97725Z" fill="#3496FF"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.6875 8.9985C1.6875 4.96109 4.96109 1.6875 8.9985 1.6875H9.0015C13.0389 1.6875 16.3125 4.96109 16.3125 8.9985C16.3125 13.0382 13.0382 16.3125 8.9985 16.3125C4.96109 16.3125 1.6875 13.0389 1.6875 9.0015V8.9985ZM8.9985 2.8125C5.58241 2.8125 2.8125 5.58241 2.8125 8.9985V9.0015C2.8125 12.4176 5.58241 15.1875 8.9985 15.1875C12.4168 15.1875 15.1875 12.4168 15.1875 8.9985C15.1875 5.58241 12.4176 2.8125 9.0015 2.8125H8.9985Z" fill="#3496FF"/>
                                        </svg>
                                        <?php esc_html_e( 'How to Migrate from Inspiro Lite to Inspiro Premium', 'inspiro' ); ?>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
            <?php get_template_part( 'inc/admin/pages/footer' ); ?>

		</div>
	</div><!-- /#tabs -->

</div>