<?php $parent = wp_get_theme(); ?>

<div id="quick-start" class="wpz-onboard_content-main-tab">

	<div class="theme-info-wrap welcome-section">
		<div class="section-content">
			<div class="header-row">
				<h3 class="wpz-onboard_content-main-title welcome"><?php esc_html_e( 'Welcome to Inspiro Lite!', 'inspiro' ); ?>👋</h3>
				<span class="wpz-onboard_framework-version">v <?php echo esc_html( $parent->get( 'Version' ) ); ?></span>
			</div>
			<p class="wpz-onboard_content-main-intro"><?php esc_html_e( 'Thank you for installing the Inspiro Lite theme! Below you can find quick links to different sections in the Customizer where you can configure and customize the theme. The free version includes limited features and customization options, but if you need more flexibility and plan to take your website to the next level, make sure to check out the Premium version.', 'inspiro' ); ?></p>
			<p class="section_footer">
				<a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" target="_blank"
					class="button button-primary">
					<?php esc_html_e( 'Customize', 'inspiro' ); ?>
				</a>
				<a href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/inspiro-lite/upgrade/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-premium', 'inspiro' ) ); ?>"
					target="_blank" class="button button-secondary">
					<?php esc_html_e( 'Get Inspiro Premium &rarr;', 'inspiro' ); ?>
				</a>
			</p>
		</div>
		<div class="section-image">
			<a href="https://www.wpzoom.com/themes/inspiro-lite/upgrade/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-premium"
				title="Inspiro Premium" target="_blank"><img
				src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/admin/inspiro-premium-blocks.png' ); ?>"
				width="300" alt="<?php echo esc_attr__( 'Inspiro Premium', 'inspiro' ); ?>"/>
			</a>
		</div>
	</div>

	<div class="theme-info-wrap">
		<h3 class="wpz-onboard_content-main-title"><?php esc_html_e( 'Customize & Configure', 'inspiro' ); ?></h3>
		<div class="wpz-grid-wrap three premium-features-grid">
			<div class="section">
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.550044 13.4C6.15004 9.2 13.85 9.2 19.45 13.4C19.7814 13.6485 19.8486 14.1186 19.6 14.45C19.3515 14.7814 18.8814 14.8485 18.55 14.6C13.4834 10.8 6.51671 10.8 1.45004 14.6C1.11867 14.8485 0.648572 14.7814 0.400044 14.45C0.151516 14.1186 0.218673 13.6485 0.550044 13.4Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M6.00004 1.75C3.65283 1.75 1.75004 3.65279 1.75004 6V14C1.75004 16.3472 3.65283 18.25 6.00004 18.25H14C16.3473 18.25 18.25 16.3472 18.25 14V6C18.25 3.65279 16.3473 1.75 14 1.75H6.00004ZM0.250044 6C0.250044 2.82436 2.82441 0.25 6.00004 0.25H14C17.1757 0.25 19.75 2.82436 19.75 6V14C19.75 17.1756 17.1757 19.75 14 19.75H6.00004C2.82441 19.75 0.250044 17.1756 0.250044 14V6Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M15 5.9988C14.9994 5.44675 14.5515 4.99967 13.9994 5C13.4474 5.00033 13 5.44795 13 6C13 6.55205 13.4474 6.99967 13.9994 7C14.5508 7.00033 14.9983 6.55432 15 6.00318" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Site Logo', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Add a logo image in the Site Identity section via Customizer, and it will appear neatly in your website’s header.', 'inspiro' ); ?>
				</p>
				<p class="section_footer">
					<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=title_tagline' ) ); ?>"
						target="_blank" class="button button-primary">
						<?php esc_html_e( 'Customize', 'inspiro' ); ?>
					</a>
				</p>
			</div>

			<div class="section">
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M3 0.25C1.48054 0.25 0.25 1.48203 0.25 3V13C0.25 14.5192 1.48079 15.75 3 15.75H4.89845C5.12126 16.7058 5.84908 17.5108 6.86495 17.7829L13.8549 19.6559C15.3222 20.0492 16.8293 19.1784 17.2225 17.7116L19.6555 8.63157C20.0486 7.16565 19.1784 5.65629 17.7112 5.26302L12.987 3.99698V3C12.987 1.48079 11.7562 0.25 10.237 0.25H3ZM11.487 4.55707C11.4868 4.56766 11.4868 4.57823 11.487 4.58877V13C11.487 13.6908 10.9278 14.25 10.237 14.25H3C2.30921 14.25 1.75 13.6908 1.75 13V3C1.75 2.30997 2.30946 1.75 3 1.75H10.237C10.9278 1.75 11.487 2.30921 11.487 3V4.55707ZM12.987 5.54991L17.3229 6.71189C17.9896 6.89061 18.3853 7.57734 18.2066 8.24334L15.7736 17.3233C15.5947 17.9904 14.9098 18.3857 14.2431 18.207L7.25308 16.334C6.91913 16.2445 6.65304 16.0279 6.49328 15.75H10.237C11.7562 15.75 12.987 14.5192 12.987 13V5.54991Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Portfolio', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Quickly create a Portfolio section on your site using the free version of the WPZOOM Portfolio plugin available to everyone.', 'inspiro' ); ?>
				</p>
				<p class="section_footer">
					<?php if ( class_exists( 'WPZOOM_Portfolio_Custom_Posts' ) ) { ?>
						<a href="<?php echo esc_url( admin_url( 'edit.php?post_type=portfolio_item' ) ); ?>"
						   target="_blank" class="button button-primary">
							<?php esc_html_e( 'Add new post', 'inspiro' ); ?>
						</a>
					<?php } else { ?>
					<a href="<?php echo esc_url( admin_url( 'plugin-install.php?s=wpzoom%2520portfolio&tab=search&type=term' ) ); ?>"
						   target="_blank" class="button button-primary">
							<?php esc_html_e( 'Install Portfolio', 'inspiro' ); ?>
					</a>
					<?php } ?>
					<a href="<?php echo esc_url( __( 'https://www.wpzoom.com/documentation/inspiro-lite/inspiro-lite-how-to-create-a-portfolio-section/', 'inspiro' ) ); ?>"
						target="_blank" class="button button-secondary-gray">
						<?php esc_html_e( 'Documentation', 'inspiro' ); ?>
					</a>
				</p>
			</div>
			<div class="section quick-action-section">
				<h4>
					<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M8.7062 1.79315C10.7847 -0.234165 14.1069 -0.213458 16.16 1.83961C18.2131 3.89268 18.2338 7.21491 16.2065 9.29341L16.1999 9.3001L14.008 11.492C13.7151 11.7849 13.2402 11.7849 12.9473 11.492C12.6544 11.1991 12.6544 10.7242 12.9473 10.4313L15.1358 8.24287C16.5866 6.75198 16.5707 4.37166 15.0993 2.90027C13.628 1.42889 11.2476 1.413 9.75676 2.86383L7.56829 5.05229C7.2754 5.34519 6.80053 5.34519 6.50763 5.05229C6.21474 4.7594 6.21474 4.28453 6.50763 3.99163L8.7062 1.79315Z" fill="#242628"/>
						<path d="M12.1982 5.8017C12.4911 6.09459 12.4911 6.56947 12.1982 6.86236L6.862 12.1986C6.5691 12.4915 6.09423 12.4915 5.80133 12.1986C5.50844 11.9057 5.50844 11.4308 5.80133 11.1379L11.1376 5.8017C11.4305 5.50881 11.9053 5.50881 12.1982 5.8017Z" fill="#242628"/>
						<path d="M5.05229 7.56842C5.34519 7.27552 5.34519 6.80065 5.05229 6.50776C4.7594 6.21486 4.28453 6.21486 3.99163 6.50776L1.79968 8.69963L1.79315 8.70632C-0.234165 10.7848 -0.213458 14.1071 1.83961 16.1601C3.89268 18.2132 7.21495 18.2339 9.29345 16.2066L11.492 14.0081C11.7849 13.7152 11.7849 13.2403 11.492 12.9474C11.1991 12.6545 10.7242 12.6545 10.4313 12.9474L8.24287 15.1359C6.75198 16.5867 4.37166 16.5709 2.90027 15.0995C1.42889 13.6281 1.413 11.2478 2.86383 9.75688L5.05229 7.56842Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Quick Links', 'inspiro' ); ?>
				</h4>
				<p class="about about-quick-links">
					<a href="https://www.wpzoom.com/documentation/inspiro-lite/" target="_blank" class="description-link">
						<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M3.1875 2C3.1875 1.27534 3.77534 0.6875 4.5 0.6875H6.75C7.67007 0.6875 8.48689 1.1292 9 1.81214C9.51311 1.1292 10.3299 0.6875 11.25 0.6875H13.5C14.2247 0.6875 14.8125 1.27534 14.8125 2V2.1875H15C16.1394 2.1875 17.0625 3.11059 17.0625 4.25V13.25C17.0625 14.3894 16.1394 15.3125 15 15.3125H3C1.86059 15.3125 0.9375 14.3894 0.9375 13.25V4.25C0.9375 3.11059 1.86059 2.1875 3 2.1875H3.1875V2ZM9.5625 12.4997C10.0325 12.1467 10.6168 11.9375 11.25 11.9375H13.5C13.6033 11.9375 13.6875 11.8533 13.6875 11.75V2C13.6875 1.89666 13.6033 1.8125 13.5 1.8125H11.25C10.3179 1.8125 9.5625 2.56791 9.5625 3.5V12.4997ZM8.4375 3.5C8.4375 2.56791 7.68209 1.8125 6.75 1.8125H4.5C4.39666 1.8125 4.3125 1.89666 4.3125 2V11.75C4.3125 11.8533 4.39666 11.9375 4.5 11.9375H6.75C7.38318 11.9375 7.96745 12.1467 8.4375 12.4997V3.5ZM15 3.3125H14.8125V11.75C14.8125 12.4747 14.2247 13.0625 13.5 13.0625H11.25C10.5152 13.0625 9.89012 13.532 9.65849 14.1875H15C15.5181 14.1875 15.9375 13.7681 15.9375 13.25V4.25C15.9375 3.73191 15.5181 3.3125 15 3.3125ZM6.75 13.0625C7.48485 13.0625 8.10988 13.532 8.34151 14.1875H3C2.48191 14.1875 2.0625 13.7681 2.0625 13.25V4.25C2.0625 3.73191 2.48191 3.3125 3 3.3125H3.1875V11.75C3.1875 12.4747 3.77534 13.0625 4.5 13.0625H6.75Z" fill="#3496FF"/>
						</svg>
						<?php esc_html_e( 'Theme Documentation', 'inspiro' ); ?>
					</a>
					<a href="https://wordpress.org/support/theme/inspiro/" target="_blank" class="description-link">
						<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M5.31723 0.502779C2.95867 0.421836 0.91239 2.11793 0.554361 4.45056C0.196331 6.7832 1.63974 9.01491 3.91401 9.64505C4.21339 9.728 4.52333 9.55254 4.60628 9.25316C4.68923 8.95378 4.51378 8.64384 4.2144 8.56089C2.48953 8.08298 1.3948 6.39038 1.66634 4.62124C1.93788 2.85209 3.48984 1.56573 5.27865 1.62712C7.06745 1.68851 8.52757 3.07824 8.67718 4.86184C8.70315 5.17141 8.97516 5.40132 9.28473 5.37535C9.59431 5.34938 9.82421 5.07737 9.79825 4.7678C9.60098 2.41611 7.67579 0.583722 5.31723 0.502779Z" fill="#3496FF"/>
							<path d="M6.68215 4.22861C6.90188 4.44822 6.90197 4.80438 6.68236 5.02411L5.27627 6.43094C5.05669 6.65064 4.70059 6.65077 4.48085 6.43122L3.636 5.58712C3.41623 5.36755 3.41607 5.0114 3.63564 4.79163C3.85522 4.57186 4.21137 4.5717 4.43114 4.79128L4.87814 5.23788L5.88665 4.22882C6.10626 4.00909 6.46242 4.009 6.68215 4.22861Z" fill="#3496FF"/>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M5.75266 8.56606C5.75266 7.42662 6.67635 6.50293 7.81578 6.50293H13.068C14.2074 6.50293 15.1311 7.42662 15.1311 8.56606V11.5673C15.1311 12.7067 14.2074 13.6304 13.068 13.6304H11.4918L9.90848 14.9197C9.62785 15.1482 9.24076 15.1949 8.9139 15.0395C8.58705 14.8842 8.37875 14.5546 8.37875 14.1926V13.6304H7.81578C6.67635 13.6304 5.75266 12.7067 5.75266 11.5673V8.56606ZM7.81578 7.62793C7.29767 7.62793 6.87766 8.04794 6.87766 8.56606V10.3176V11.5673C6.87766 12.0854 7.29767 12.5054 7.81578 12.5054H8.28281H8.94125C9.25191 12.5054 9.50375 12.7573 9.50375 13.0679V13.7985L10.9365 12.6318C11.0369 12.55 11.1623 12.5054 11.2917 12.5054H13.068C13.5861 12.5054 14.0061 12.0854 14.0061 11.5673V8.56606C14.0061 8.04794 13.5861 7.62793 13.068 7.62793H7.81578Z" fill="#3496FF"/>
						</svg>
						<?php esc_html_e( 'Support Forum', 'inspiro' ); ?>
					</a>
					<a href="https://www.facebook.com/groups/wpzoom" target="_blank" class="description-link">
						<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M7.85925 7.29906C7.85925 6.04565 8.87609 5.02881 10.1295 5.02881H10.737C11.0477 5.02881 11.2995 5.28065 11.2995 5.59131C11.2995 5.90197 11.0477 6.15381 10.737 6.15381H10.1295C9.49741 6.15381 8.98425 6.66697 8.98425 7.29906V7.92334H10.7362C11.0469 7.92334 11.2987 8.17518 11.2987 8.48584C11.2987 8.7965 11.0469 9.04834 10.7362 9.04834H8.98425V12.4088C8.98425 12.7195 8.73241 12.9713 8.42175 12.9713C8.11109 12.9713 7.85925 12.7195 7.85925 12.4088V9.04834H7.26297C6.95231 9.04834 6.70047 8.7965 6.70047 8.48584C6.70047 8.17518 6.95231 7.92334 7.26297 7.92334H7.85925V7.29906Z" fill="#3496FF"/>
							<path fill-rule="evenodd" clip-rule="evenodd" d="M9 0.9375C4.5472 0.9375 0.9375 4.5472 0.9375 9C0.9375 13.4528 4.5472 17.0625 9 17.0625C13.4528 17.0625 17.0625 13.4528 17.0625 9C17.0625 4.5472 13.4528 0.9375 9 0.9375ZM2.0625 9C2.0625 5.16852 5.16852 2.0625 9 2.0625C12.8315 2.0625 15.9375 5.16852 15.9375 9C15.9375 12.8315 12.8315 15.9375 9 15.9375C5.16852 15.9375 2.0625 12.8315 2.0625 9Z" fill="#3496FF"/>
						</svg>
						<?php esc_html_e( 'Join our Facebook group', 'inspiro' ); ?>
					</a>
					<a href="https://www.wpzoom.com/themes/inspiro-lite/upgrade/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-premium" target="_blank" class="description-link">
						<svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M3.98359 8.70108L5.58302 9.30884C6.78512 9.76562 7.73437 10.7149 8.19115 11.917L8.7989 13.5164C8.90953 13.8075 9.18856 14 9.49999 14C9.81143 14 10.0905 13.8075 10.2011 13.5164L10.8088 11.917C11.2656 10.7149 12.2149 9.76562 13.417 9.30884L15.0164 8.70108C15.3075 8.59046 15.5 8.31143 15.5 7.99999C15.5 7.68856 15.3075 7.40953 15.0164 7.2989L13.417 6.69115C12.2149 6.23437 11.2656 5.28512 10.8088 4.08302L10.2011 2.48359C10.0905 2.19247 9.81143 2 9.49999 2C9.18856 2 8.90953 2.19247 8.7989 2.48359L8.19115 4.08302C7.73437 5.28512 6.78513 6.23437 5.58302 6.69115L3.98359 7.2989C3.69247 7.40953 3.5 7.68856 3.5 7.99999C3.5 8.31143 3.69247 8.59046 3.98359 8.70108Z" stroke="#3496FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M3.5 14.75V11.75" stroke="#3496FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M2 13.25H5" stroke="#3496FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M2.75 4.25V1.25" stroke="#3496FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
							<path d="M1.25 2.75H4.25" stroke="#3496FF" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
						<?php esc_html_e( 'Upgrade to Inspiro Premium', 'inspiro' ); ?>
					</a>
					<a href="https://wordpress.org/support/theme/inspiro/reviews/#new-post" target="_blank" class="description-link">
						<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path fill-rule="evenodd" clip-rule="evenodd" d="M9.19037 2.625C8.97642 2.625 8.78095 2.74628 8.68595 2.93798L8.68481 2.94028L7.08289 6.13586C7.00027 6.30067 6.84213 6.41453 6.65963 6.44062L3.1114 6.94783L3.10988 6.94805C2.89606 6.97802 2.71821 7.12764 2.6521 7.33318C2.58598 7.53872 2.64324 7.76397 2.7995 7.91298L2.80049 7.91392L5.35605 10.3629C5.49135 10.4926 5.5532 10.6811 5.52099 10.8657L4.91399 14.3449L4.91369 14.3466C4.87617 14.5579 4.96203 14.7721 5.13508 14.899C5.30813 15.0259 5.53826 15.0434 5.7285 14.9441L5.73064 14.943L8.93223 13.2893C9.09419 13.2056 9.28665 13.2057 9.4486 13.2894L12.6502 14.9438L12.6522 14.9449C12.8425 15.0442 13.0726 15.0267 13.2457 14.8998C13.4187 14.7729 13.5046 14.5586 13.467 14.3474L13.4667 14.3457L12.8597 10.8657C12.8275 10.6811 12.8894 10.4926 13.0247 10.3629L15.5803 7.91392L15.5812 7.91298C15.7375 7.76397 15.7948 7.53872 15.7286 7.33318C15.6625 7.12764 15.4847 6.97802 15.2709 6.94805L15.2693 6.94783L11.7211 6.44062C11.5386 6.41453 11.3805 6.30067 11.2979 6.13586L9.69478 2.93798C9.59978 2.74628 9.40432 2.625 9.19037 2.625ZM7.67857 2.43717C7.96366 1.86311 8.54933 1.5 9.19037 1.5C9.83137 1.5 10.417 1.86307 10.7021 2.43709C10.7023 2.43753 10.7026 2.43797 10.7028 2.43842L12.1717 5.36859L15.427 5.83394C15.4273 5.83398 15.4276 5.83402 15.4279 5.83405C16.0686 5.92419 16.6015 6.37268 16.7996 6.98869C16.9977 7.60453 16.8264 8.27938 16.3586 8.72617C16.3586 8.72618 16.3586 8.72616 16.3586 8.72617C16.3583 8.72647 16.358 8.72681 16.3576 8.72712L14.0195 10.9678L14.5747 14.1507C14.5748 14.151 14.5748 14.1513 14.5749 14.1517C14.6869 14.7848 14.4295 15.4267 13.9109 15.807C13.3924 16.1872 12.703 16.2398 12.1329 15.9428C12.1325 15.9426 12.1321 15.9424 12.1317 15.9422L9.19031 14.4222L6.24907 15.9414C6.24862 15.9417 6.24816 15.9419 6.2477 15.9421C5.67759 16.2391 4.98825 16.1864 4.46981 15.8062C3.95121 15.4259 3.69377 14.784 3.80586 14.1508C3.80591 14.1505 3.80597 14.1502 3.80602 14.1499L4.3612 10.9677L2.02309 8.72712C2.02288 8.72692 2.02268 8.72672 2.02247 8.72652C1.55444 8.27973 1.38299 7.60469 1.58114 6.98869C1.77929 6.37266 2.31218 5.92416 2.95294 5.83405C2.9532 5.83401 2.95346 5.83397 2.95373 5.83394L6.20907 5.36859L7.67857 2.43717Z" fill="#3496FF"/>
						</svg>
						<?php esc_html_e( 'Leave a Review', 'inspiro' ); ?>
					</a>
				</p>
			</div>

			<div class="section">
				<h4>
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M3 9H21" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M11 5.995L10.995 6L11 6.005L11.005 6L11 5.995" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M8.5 5.995L8.495 6L8.5 6.005L8.505 6L8.5 5.995" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M6 5.995L5.995 6L6 6.005L6.005 6L6 5.995" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M11 5.995L10.995 6L11 6.005L11.005 6L11 5.995" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M8.5 5.995L8.495 6L8.5 6.005L8.505 6L8.5 5.995" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M6 5.995L5.995 6L6 6.005L6.005 6L6 5.995" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M17.5 21H18C19.6569 21 21 19.6569 21 18V6C21 4.34315 19.6569 3 18 3H6C4.34315 3 3 4.34315 3 6V18C3 19.6569 4.34315 21 6 21H6.5" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M12 18L14 16" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M10 16L12 18" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M12 13.5V18" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M14 21H10" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					<?php esc_html_e( 'Demo Content', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Importing demo data is the easiest way to set up your theme, so you can edit everything quickly without building content manually.', 'inspiro' ); ?>
				</p>
				<p class="section_footer">
					<a href="<?php echo esc_url( admin_url( 'admin.php?page=inspiro-demo' ) ); ?>"
						class="button button-primary">
						<?php esc_html_e( 'Import Demo', 'inspiro' ); ?>
					</a>
					<a href="<?php echo esc_url( __( 'https://www.wpzoom.com/documentation/inspiro-lite/inspiro-lite-importing-the-demo-content/', 'inspiro' ) ); ?>"
						target="_blank" class="button button-secondary-gray">
						<?php esc_html_e( 'Documentation', 'inspiro' ); ?>
					</a>
				</p>
			</div>

			<div class="section">
				<h4>
					<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 9C0.246582 8.58579 0.582368 8.25 0.996582 8.25H13.0016C13.4158 8.25 13.7516 8.58579 13.7516 9C13.7516 9.41421 13.4158 9.75 13.0016 9.75H0.996582C0.582368 9.75 0.246582 9.41421 0.246582 9Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 13.002C0.246582 12.5877 0.582368 12.252 0.996582 12.252H16.0028C16.417 12.252 16.7528 12.5877 16.7528 13.002C16.7528 13.4162 16.417 13.752 16.0028 13.752H0.996582C0.582368 13.752 0.246582 13.4162 0.246582 13.002Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 17.0039C0.246582 16.5897 0.582368 16.2539 0.996582 16.2539H7.9995C8.41371 16.2539 8.7495 16.5897 8.7495 17.0039C8.7495 17.4181 8.41371 17.7539 7.9995 17.7539H0.996582C0.582368 17.7539 0.246582 17.4181 0.246582 17.0039Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 1.99707C0.246582 1.03057 1.03008 0.24707 1.99658 0.24707H16.0032C16.9697 0.24707 17.7532 1.03057 17.7532 1.99707V3.99874C17.7532 4.96523 16.9697 5.74874 16.0032 5.74874H1.99658C1.03008 5.74874 0.246582 4.96523 0.246582 3.99874V1.99707ZM1.99658 1.74707C1.85851 1.74707 1.74658 1.859 1.74658 1.99707V3.99874C1.74658 4.13681 1.85851 4.24874 1.99658 4.24874H16.0032C16.1413 4.24874 16.2532 4.13681 16.2532 3.99874V1.99707C16.2532 1.859 16.1413 1.74707 16.0032 1.74707H1.99658Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Header', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Configure your Header settings to suit your theme. Adjust menus, logos, and other elements for a polished, branded look.', 'inspiro' ); ?>
				</p>
				<p class="section_footer">
					<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=header-area' ) ); ?>"
					    target="_blank" class="button button-primary">
						<?php esc_html_e( 'Customize', 'inspiro' ); ?>
					</a>
				</p>
			</div>

			<div class="section">
				<h4>
					<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 1C0.246582 0.585786 0.582368 0.25 0.996582 0.25H13.0016C13.4158 0.25 13.7516 0.585786 13.7516 1C13.7516 1.41421 13.4158 1.75 13.0016 1.75H0.996582C0.582368 1.75 0.246582 1.41421 0.246582 1Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 5.00195C0.246582 4.58774 0.582368 4.25195 0.996582 4.25195H16.0028C16.417 4.25195 16.7528 4.58774 16.7528 5.00195C16.7528 5.41617 16.417 5.75195 16.0028 5.75195H0.996582C0.582368 5.75195 0.246582 5.41617 0.246582 5.00195Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 9.00391C0.246582 8.58969 0.582368 8.25391 0.996582 8.25391H7.9995C8.41371 8.25391 8.7495 8.58969 8.7495 9.00391C8.7495 9.41812 8.41371 9.75391 7.9995 9.75391H0.996582C0.582368 9.75391 0.246582 9.41812 0.246582 9.00391Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 13.9971C0.246582 13.0306 1.03008 12.2471 1.99658 12.2471H16.0032C16.9697 12.2471 17.7532 13.0306 17.7532 13.9971V15.9987C17.7532 16.9652 16.9697 17.7487 16.0032 17.7487H1.99658C1.03008 17.7487 0.246582 16.9652 0.246582 15.9987V13.9971ZM1.99658 13.7471C1.85851 13.7471 1.74658 13.859 1.74658 13.9971V15.9987C1.74658 16.1368 1.85851 16.2487 1.99658 16.2487H16.0032C16.1413 16.2487 16.2532 16.1368 16.2532 15.9987V13.9971C16.2532 13.859 16.1413 13.7471 16.0032 13.7471H1.99658Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Footer', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Use the Footer settings to personalize your theme’s layout. Add widgets in the Widgets section to enhance your site’s footer.', 'inspiro' ); ?>
				</p>
				<p class="section_footer">
					<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=footer-area' ) ); ?>"
					   target="_blank" class="button button-primary">
						<?php esc_html_e( 'Customize', 'inspiro' ); ?>
					</a>
				</p>
			</div>

			<div class="section">
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0 2.75083C0 1.23159 1.23159 0 2.75083 0H5.75208C7.27133 0 8.50292 1.23159 8.50292 2.75083V4.99292L10.9613 2.53581C12.0355 1.462 13.7768 1.46202 14.851 2.53588L16.9729 4.65784C18.0468 5.73204 18.0469 7.4734 16.973 8.5476L14.5157 11.0049H16.7567C18.2759 11.0049 19.5075 12.2365 19.5075 13.7557V16.757C19.5075 18.2762 18.2759 19.5078 16.7567 19.5078H4.25146C4.24358 19.5078 4.23572 19.5077 4.22789 19.5074C1.89072 19.4947 0 17.5962 0 15.256V2.75083ZM2.75083 1.5C2.06002 1.5 1.5 2.06002 1.5 2.75083V5.91602H7.00292V2.75083C7.00292 2.06002 6.4429 1.5 5.75208 1.5H2.75083ZM7.00292 7.41602H1.5V11.9619H7.00292V7.41602ZM7.00292 13.4619H1.5V15.256C1.5 16.7756 2.73187 18.0075 4.25146 18.0075C5.77105 18.0075 7.00292 16.7756 7.00292 15.256V13.4619ZM8.50292 14.8964V7.11367L12.0218 3.5967C12.5102 3.10842 13.302 3.10847 13.7905 3.5967L15.9122 5.71842C16.4005 6.20684 16.4004 6.99864 15.9122 7.4871L8.50292 14.8964ZM7.51279 18.0078H16.7567C17.4475 18.0078 18.0075 17.4478 18.0075 16.757V13.7557C18.0075 13.0649 17.4475 12.5049 16.7567 12.5049H13.0157L7.51279 18.0078Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Colors', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Align your site with your brand by setting up global colors. Customize the background, text, and link colors for consistency.', 'inspiro' ); ?>
				</p>
				<p class="section_footer">
					<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[section]=colors' ) ); ?>"
					   target="_blank" class="button button-primary">
						<?php esc_html_e( 'Customize', 'inspiro' ); ?>
					</a>
				</p>
			</div>

			<div class="section">
				<h4>
					<svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M1 14H17" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M13 18H1" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M4.91445 0.25C4.81536 0.249894 4.71462 0.269541 4.61781 0.311162C4.4314 0.391295 4.2941 0.538016 4.22176 0.711589L1.06661 8.02655C1.03983 8.07365 1.018 8.12394 1.00184 8.17671L0.337401 9.71715C0.173349 10.0975 0.348686 10.5388 0.729027 10.7029C1.10937 10.8669 1.55069 10.6916 1.71474 10.3112L2.21705 9.14668H7.59971L8.09998 10.3104C8.26357 10.6909 8.70467 10.8668 9.08521 10.7032C9.46576 10.5396 9.64163 10.0985 9.47804 9.71799L8.80159 8.14442C8.791 8.11476 8.77859 8.08597 8.76451 8.05817L5.60668 0.712449C5.53455 0.53878 5.39743 0.391885 5.21111 0.311523C5.11432 0.269771 5.01357 0.250002 4.91445 0.25ZM4.91289 2.8966L2.86404 7.64668H6.95488L4.91289 2.8966Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Fonts', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Reflect your brand’s style by customizing global fonts. Select font families, sizes, and weights for a cohesive, professional look.', 'inspiro' ); ?>
				</p>
				<p class="section_footer">
					<a href="<?php echo esc_url( admin_url( 'customize.php?autofocus[panel]=inspiro_typography_panel' ) ); ?>"
						target="_blank" class="button button-primary">
						<?php esc_html_e( 'Customize', 'inspiro' ); ?>
					</a>
				</p>
			</div>
		</div>
	</div>

	<div class="wpz-onboard_content-side-section discover-premium">
        <div class="image-column">
            <a href="https://www.wpzoom.com/themes/inspiro-lite/upgrade/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-premium"
                title="Inspiro Premium" target="_blank">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/admin/inspiro-premium.png' ); ?>"
                    width="300" alt="<?php echo esc_attr__( 'Inspiro Premium', 'inspiro' ); ?>"/>
            </a>
        </div>
        <div class="text-column">
            <h3 class="wpz-onboard_content-side-section-title icon-docs">
				<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M4.64479 10.9348L6.77737 11.7451C8.38017 12.3542 9.64583 13.6198 10.2549 15.2226L11.0652 17.3552C11.2127 17.7434 11.5847 18 12 18C12.4152 18 12.7873 17.7434 12.9348 17.3552L13.7451 15.2226C14.3542 13.6198 15.6198 12.3542 17.2226 11.7451L19.3552 10.9348C19.7434 10.7873 20 10.4152 20 9.99999C20 9.58475 19.7434 9.21271 19.3552 9.06521L17.2226 8.25487C15.6198 7.64582 14.3542 6.38016 13.7451 4.77736L12.9348 2.64479C12.7873 2.25662 12.4152 2 12 2C11.5847 2 11.2127 2.25662 11.0652 2.64479L10.2549 4.77736C9.64583 6.38016 8.38017 7.64582 6.77737 8.25487L4.64479 9.06521C4.25662 9.21271 4 9.58475 4 9.99999C4 10.4152 4.25662 10.7873 4.64479 10.9348Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M4 19V15" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M2 17H6" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M3 5V1" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M1 3H5" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
				<?php esc_html_e( 'Discover Inspiro Premium!', 'inspiro' ); ?>
			</h3>

            <ul>
                <li>
					<svg width="18" height="18" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M14.6706 6.08301L9.00365 11.75L6.1709 8.91651" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M15.75 9.5C15.75 13.2283 12.7283 16.25 9 16.25C5.27175 16.25 2.25 13.2283 2.25 9.5C2.25 5.77175 5.27175 2.75 9 2.75C10.0897 2.75 11.1158 3.01475 12.027 3.473" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					40+ Starter Sites
				</li>
                <li>
					<svg width="18" height="18" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M14.6706 6.08301L9.00365 11.75L6.1709 8.91651" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M15.75 9.5C15.75 13.2283 12.7283 16.25 9 16.25C5.27175 16.25 2.25 13.2283 2.25 9.5C2.25 5.77175 5.27175 2.75 9 2.75C10.0897 2.75 11.1158 3.01475 12.027 3.473" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					Portfolio with Video Integration
				</li>
                <li>
					<svg width="18" height="18" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M14.6706 6.08301L9.00365 11.75L6.1709 8.91651" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M15.75 9.5C15.75 13.2283 12.7283 16.25 9 16.25C5.27175 16.25 2.25 13.2283 2.25 9.5C2.25 5.77175 5.27175 2.75 9 2.75C10.0897 2.75 11.1158 3.01475 12.027 3.473" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					Video Slideshow
				</li>
                <li>
					<svg width="18" height="18" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M14.6706 6.08301L9.00365 11.75L6.1709 8.91651" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M15.75 9.5C15.75 13.2283 12.7283 16.25 9 16.25C5.27175 16.25 2.25 13.2283 2.25 9.5C2.25 5.77175 5.27175 2.75 9 2.75C10.0897 2.75 11.1158 3.01475 12.027 3.473" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					Video Backgrounds
				</li>
                <li>
					<svg width="18" height="18" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M14.6706 6.08301L9.00365 11.75L6.1709 8.91651" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M15.75 9.5C15.75 13.2283 12.7283 16.25 9 16.25C5.27175 16.25 2.25 13.2283 2.25 9.5C2.25 5.77175 5.27175 2.75 9 2.75C10.0897 2.75 11.1158 3.01475 12.027 3.473" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					Advanced WooCommerce Integration
				</li>
                <li>
					<svg width="18" height="18" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M14.6706 6.08301L9.00365 11.75L6.1709 8.91651" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M15.75 9.5C15.75 13.2283 12.7283 16.25 9 16.25C5.27175 16.25 2.25 13.2283 2.25 9.5C2.25 5.77175 5.27175 2.75 9 2.75C10.0897 2.75 11.1158 3.01475 12.027 3.473" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					Video Background on Hover
				</li>
                <li>
					<svg width="18" height="18" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M14.6706 6.08301L9.00365 11.75L6.1709 8.91651" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M15.75 9.5C15.75 13.2283 12.7283 16.25 9 16.25C5.27175 16.25 2.25 13.2283 2.25 9.5C2.25 5.77175 5.27175 2.75 9 2.75C10.0897 2.75 11.1158 3.01475 12.027 3.473" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					Custom Elementor Widgets
				</li>
                <li>
					<svg width="18" height="18" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M14.6706 6.08301L9.00365 11.75L6.1709 8.91651" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M15.75 9.5C15.75 13.2283 12.7283 16.25 9 16.25C5.27175 16.25 2.25 13.2283 2.25 9.5C2.25 5.77175 5.27175 2.75 9 2.75C10.0897 2.75 11.1158 3.01475 12.027 3.473" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					...and much more
				</li>
            </ul>
                            
            <div class="wpz-onboard_content-side-section-button">
                <a href="https://www.wpzoom.com/themes/inspiro-lite/upgrade/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-premium"
                    title="Inspiro Premium" target="_blank" class="button">
					<?php esc_html_e( 'Get Inspiro Premium &rarr;', 'inspiro' ); ?>
				</a>
                <a href="https://www.wpzoom.com/themes/inspiro/starter-sites/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-premium"
                    title="Inspiro Premium" target="_blank" class="button button-starter">
					<?php esc_html_e( 'View Starter Sites &rarr;', 'inspiro' ); ?>
				</a>
            </div>
        </div>
    </div>

	<div class="theme-info-wrap">
		<h3 class="wpz-onboard_content-main-title">
			<?php esc_html_e( 'Premium Features', 'inspiro' ); ?>
		</h3>
		<div class="wpz-grid-wrap three premium-features-grid">
			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M6.55 18.65C6.55 19.1471 6.14706 19.55 5.65 19.55C5.15294 19.55 4.75 19.1471 4.75 18.65C4.75 18.1529 5.15294 17.75 5.65 17.75C6.14706 17.75 6.55 18.1529 6.55 18.65Z" fill="#242628"/>
						<path d="M10.55 18.65C10.55 19.1471 10.1471 19.55 9.65 19.55C9.15294 19.55 8.75 19.1471 8.75 18.65C8.75 18.1529 9.15294 17.75 9.65 17.75C10.1471 17.75 10.55 18.1529 10.55 18.65Z" fill="#242628"/>
						<path d="M14.55 18.65C14.55 19.1471 14.1471 19.55 13.65 19.55C13.1529 19.55 12.75 19.1471 12.75 18.65C12.75 18.1529 13.1529 17.75 13.65 17.75C14.1471 17.75 14.55 18.1529 14.55 18.65Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0 4.75C0 2.12665 2.12665 0 4.75 0H14.75C17.3734 0 19.5 2.12665 19.5 4.75V10.75C19.5 13.3734 17.3734 15.5 14.75 15.5H4.75C2.12665 15.5 0 13.3734 0 10.75V4.75ZM4.75 1.5C2.95507 1.5 1.5 2.95507 1.5 4.75V10.75C1.5 12.5449 2.95507 14 4.75 14H14.75C16.5449 14 18 12.5449 18 10.75V4.75C18 2.95507 16.5449 1.5 14.75 1.5H4.75Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Advanced Slideshow', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Create a fully working slideshow with videos from YouTube or Vimeo, plus mobile video options, popups, and more.', 'inspiro' ); ?>
				</p>
			</div>
							
			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M9.75003 0C4.3647 0 0 4.36468 0 9.74996C0 15.1335 4.3647 19.5 9.75003 19.5C15.1353 19.5 19.5 15.1352 19.5 9.74996C19.4983 4.36468 15.1336 0 9.75003 0ZM7.31297 13.811H5.68884V5.68703H7.31297V13.811ZM13.8112 13.811H8.93709V12.187H13.8112V13.811ZM13.8112 10.5611H8.93709V8.93703H13.8112V10.5611ZM13.8112 7.31115H8.93709V5.68703H13.8112V7.31115Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Custom Elementor Modules', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Enhance your site with exclusive Elementor modules like Portfolio Showcase and Slideshow widgets for a dynamic experience.', 'inspiro' ); ?>
				</p>
			</div>

			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M8.22467 8.71967C8.51756 8.42678 8.99244 8.42678 9.28533 8.71967L9.29033 8.72467C9.58322 9.01756 9.58322 9.49244 9.29033 9.78533L9.28533 9.79033C8.99244 10.0832 8.51756 10.0832 8.22467 9.79033L8.21967 9.78533C7.92678 9.49244 7.92678 9.01756 8.21967 8.72467L8.22467 8.71967Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M3.22467 8.71967C3.51756 8.42678 3.99244 8.42678 4.28533 8.71967L4.29033 8.72467C4.58322 9.01756 4.58322 9.49244 4.29033 9.78533L4.28533 9.79033C3.99244 10.0832 3.51756 10.0832 3.22467 9.79033L3.21967 9.78533C2.92678 9.49244 2.92678 9.01756 3.21967 8.72467L3.22467 8.71967Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M5.72467 8.71967C6.01756 8.42678 6.49244 8.42678 6.78533 8.71967L6.79033 8.72467C7.08322 9.01756 7.08322 9.49244 6.79033 9.78533L6.78533 9.79033C6.49244 10.0832 6.01756 10.0832 5.72467 9.79033L5.71967 9.78533C5.42678 9.49244 5.42678 9.01756 5.71967 8.72467L5.72467 8.71967Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M16.73 3.10293V2.53846C16.73 1.13651 15.846 0 14.7556 0H4.70434C3.61393 0 2.72998 1.13651 2.72998 2.53846V3.11543C1.72746 3.43813 1 4.40092 1 5.53846V6.62858C0.389248 7.13298 0 7.89603 0 8.75V16.75C0 18.2688 1.23122 19.5 2.75 19.5H16.75C18.2688 19.5 19.5 18.2688 19.5 16.75V8.75C19.5 7.89603 19.1108 7.13298 18.5 6.62858V5.53846C18.5 4.38583 17.7531 3.41262 16.73 3.10293ZM14.7556 1.38462H4.70434C4.67125 1.38462 4.55307 1.39831 4.40121 1.59357C4.24789 1.79069 4.1146 2.12014 4.1146 2.53846V3H15.3454V2.53846C15.3454 2.12014 15.2121 1.79069 15.0588 1.59357C14.9069 1.39831 14.7887 1.38462 14.7556 1.38462ZM3.46795 4.38462H16.0321C16.5938 4.38462 17.1154 4.86418 17.1154 5.53846V6.02406C16.9958 6.00819 16.8739 6 16.75 6H2.75C2.62612 6 2.50416 6.00819 2.38462 6.02406V5.53846C2.38462 4.86418 2.90615 4.38462 3.46795 4.38462ZM1.5 8.75C1.5 8.05964 2.05964 7.5 2.75 7.5H16.75C17.4404 7.5 18 8.05964 18 8.75V11H1.5V8.75ZM18 12.5V16.75C18 17.4404 17.4404 18 16.75 18H2.75C2.05964 18 1.5 17.4404 1.5 16.75V12.5H18Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( '40+ Starter Sites', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Import demos quickly with the built-in demo importer, featuring beautiful templates for business or portfolio websites.', 'inspiro' ); ?>
				</p>
			</div>

			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M7.38123 7.38076C8.07576 6.68623 9.01776 6.29604 9.99999 6.29604C10.9822 6.29604 11.9242 6.68623 12.6187 7.38076C13.3133 8.0753 13.7035 9.0173 13.7035 9.99953C13.7035 10.9818 13.3133 11.9237 12.6187 12.6183C11.9242 13.3128 10.9822 13.703 9.99999 13.703C9.01776 13.703 8.07576 13.3128 7.38123 12.6183C6.68669 11.9237 6.2965 10.9818 6.2965 9.99953C6.2965 9.0173 6.68669 8.0753 7.38123 7.38076ZM9.99999 7.6565C9.37858 7.6565 8.78262 7.90336 8.34322 8.34276C7.90382 8.78216 7.65696 9.37812 7.65696 9.99953C7.65696 10.6209 7.90382 11.2169 8.34322 11.6563C8.78262 12.0957 9.37858 12.3425 9.99999 12.3425C10.6214 12.3425 11.2174 12.0957 11.6568 11.6563C12.0962 11.2169 12.343 10.6209 12.343 9.99953C12.343 9.37812 12.0962 8.78216 11.6568 8.34276C11.2174 7.90336 10.6214 7.6565 9.99999 7.6565Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M8.99241 0.25C8.7708 0.249937 8.55135 0.293514 8.34659 0.378245L8.99241 0.25ZM8.99208 1.61046C8.94908 1.61044 8.9065 1.6189 8.86676 1.63534C8.82703 1.65178 8.79092 1.67589 8.7605 1.70629C8.73009 1.73669 8.70596 1.77279 8.6895 1.81251C8.67304 1.85224 8.66457 1.89482 8.66457 1.93782V2.5328L8.66456 2.53475C8.66356 2.88388 8.55422 3.22409 8.35164 3.50844C8.15623 3.78271 7.88335 3.99196 7.56841 4.10963C7.26066 4.24799 6.91818 4.29097 6.58528 4.23252C6.24111 4.17209 5.92424 4.00624 5.67844 3.75794L5.26343 3.34342C5.23312 3.31277 5.19704 3.28843 5.15726 3.27182C5.11749 3.25521 5.07481 3.24666 5.0317 3.24666C4.9886 3.24666 4.94592 3.25521 4.90614 3.27182C4.86636 3.28843 4.83027 3.31276 4.79996 3.34341L4.79551 3.34791L3.354 4.77874C3.32328 4.80921 3.29875 4.84562 3.28211 4.88556C3.26547 4.92551 3.2569 4.96836 3.2569 5.01163C3.2569 5.0549 3.26547 5.09775 3.28211 5.13769C3.29875 5.17764 3.32313 5.2139 3.35386 5.24437L3.35551 5.24601L3.7678 5.65782C4.01627 5.90367 4.18222 6.22066 4.24267 6.56496C4.30111 6.8978 4.25816 7.24023 4.11985 7.54794C4.00226 7.86309 3.79296 8.13617 3.51856 8.33171C3.23404 8.53446 2.89358 8.64384 2.54421 8.64473L1.93782 8.64473C1.851 8.64473 1.76774 8.67922 1.70635 8.74062C1.64495 8.80201 1.61046 8.88527 1.61046 8.97209V10.9878C1.61046 11.0746 1.64495 11.1578 1.70635 11.2192C1.76774 11.2806 1.851 11.3151 1.93782 11.3151H2.53487C2.88409 11.3162 3.22438 11.4256 3.50873 11.6284C3.78297 11.8239 3.99215 12.0969 4.1097 12.4119C4.248 12.7196 4.29096 13.062 4.23252 13.3949C4.17207 13.7391 4.00617 14.0561 3.75778 14.3019L3.34611 14.7136L3.34411 14.7155C3.31343 14.746 3.28907 14.7822 3.27245 14.8221C3.25583 14.862 3.24727 14.9048 3.24727 14.948C3.24727 14.9912 3.25583 15.034 3.27245 15.0739C3.28907 15.1138 3.31343 15.15 3.34411 15.1804L3.34612 15.1824L4.76905 16.6053C4.79952 16.636 4.83577 16.6604 4.8757 16.677C4.91563 16.6937 4.95846 16.7022 5.00171 16.7022C5.04497 16.7022 5.08779 16.6937 5.12773 16.677C5.16766 16.6604 5.2039 16.636 5.23438 16.6053L5.23614 16.6036L5.64602 16.1937L5.64796 16.1918C5.89376 15.9435 6.21063 15.7776 6.5548 15.7172C6.88764 15.6587 7.23007 15.7017 7.53777 15.84C7.8528 15.9575 8.12579 16.1667 8.32132 16.441C8.52406 16.7253 8.63351 17.0656 8.63457 17.4148L8.63458 17.4169L8.63458 18.0622C8.63458 18.149 8.66906 18.2323 8.73046 18.2937C8.79185 18.355 8.87511 18.3895 8.96193 18.3895H10.9776C11.0644 18.3895 11.1477 18.355 11.2091 18.2937C11.2705 18.2323 11.305 18.149 11.305 18.0622V17.4672L11.305 17.4651C11.306 17.1159 11.4155 16.7756 11.6182 16.4913C11.8137 16.217 12.0867 16.0079 12.4017 15.8903C12.7095 15.752 13.0519 15.709 13.3847 15.7675C13.729 15.8279 14.046 15.9939 14.2918 16.2423L14.2935 16.244L14.7063 16.6567C14.7366 16.6874 14.7727 16.7118 14.8125 16.7284C14.8522 16.745 14.8949 16.7536 14.9381 16.7536C14.9812 16.7536 15.0239 16.745 15.0637 16.7284C15.1035 16.7118 15.1396 16.6874 15.1699 16.6568L15.1727 16.6539L16.5934 15.2332L16.5963 15.2303C16.627 15.2 16.6513 15.1639 16.6679 15.1241C16.6846 15.0843 16.6931 15.0417 16.6931 14.9985C16.6931 14.9554 16.6846 14.9127 16.6679 14.8729C16.6513 14.8331 16.627 14.797 16.5963 14.7667L16.5931 14.7636L16.1836 14.3535L16.1816 14.3515C15.9333 14.1057 15.7674 13.7889 15.707 13.4447C15.6486 13.1119 15.6915 12.7695 15.8298 12.4617C15.9474 12.1466 16.1567 11.8735 16.4311 11.678C16.7156 11.4752 17.0561 11.3658 17.4055 11.3649L17.4072 11.3649L18.0622 11.3649C18.149 11.3649 18.2323 11.3305 18.2937 11.2691C18.355 11.2077 18.3895 11.1244 18.3895 11.0376V8.99144C18.3895 8.90462 18.355 8.82136 18.2937 8.75996C18.2323 8.69857 18.149 8.66408 18.0622 8.66408H17.4672L17.4652 8.66408C17.1161 8.66308 16.7759 8.55374 16.4916 8.35116C16.2173 8.15575 16.008 7.88288 15.8904 7.56795C15.752 7.26019 15.709 6.9177 15.7675 6.58479C15.8279 6.24065 15.9937 5.92379 16.242 5.67799L16.244 5.67601L16.6536 5.26593L16.6566 5.26296C16.6872 5.23265 16.7116 5.19656 16.7282 5.15678C16.7448 5.117 16.7533 5.07432 16.7533 5.03122C16.7533 4.98811 16.7448 4.94544 16.7282 4.90566C16.7116 4.86588 16.6872 4.82979 16.6566 4.79948L16.6521 4.79503L15.2213 3.35352C15.1908 3.3228 15.1544 3.29827 15.1144 3.28163C15.0745 3.26499 15.0316 3.25642 14.9884 3.25642C14.9451 3.25642 14.9023 3.26499 14.8623 3.28163C14.8224 3.29827 14.7861 3.32265 14.7556 3.35337L14.754 3.35502L14.3438 3.76565L14.3421 3.76738C14.0963 4.01581 13.7793 4.18174 13.435 4.24219C13.1045 4.30022 12.7646 4.25828 12.4585 4.12226C12.1372 4.00841 11.8576 3.7997 11.657 3.52327C11.4477 3.23486 11.3351 2.88757 11.3354 2.53122V1.93782C11.3354 1.89482 11.327 1.85224 11.3105 1.81251C11.294 1.77279 11.2699 1.73669 11.2395 1.70629C11.2091 1.67589 11.173 1.65178 11.1332 1.63534C11.0935 1.6189 11.0509 1.61044 11.0079 1.61046H8.99208ZM11.0076 0.25C11.2292 0.249937 11.4486 0.293514 11.6534 0.378245C11.8583 0.463019 12.0444 0.587327 12.2013 0.744066C12.3581 0.900805 12.4825 1.0869 12.5673 1.29173C12.6522 1.49656 12.6959 1.71611 12.6959 1.93782V2.53183C12.6958 2.6007 12.7176 2.66843 12.758 2.72417C12.7985 2.77991 12.8556 2.8214 12.9211 2.84269C12.9491 2.85182 12.9766 2.86277 13.0033 2.87546C13.0644 2.90458 13.1331 2.91393 13.1998 2.90222C13.2665 2.89051 13.3278 2.85832 13.3754 2.81013L13.3783 2.80716L13.7898 2.39524L13.7908 2.39424C13.9475 2.2365 14.1339 2.11128 14.3392 2.02577C14.5449 1.94008 14.7655 1.89596 14.9884 1.89596C15.2112 1.89596 15.4319 1.94008 15.6376 2.02577C15.8433 2.11146 16.03 2.23703 16.187 2.39524L17.6157 3.83456C17.7731 3.99089 17.8981 4.17675 17.9836 4.38151C18.0696 4.58734 18.1138 4.80817 18.1138 5.03122C18.1138 5.25427 18.0696 5.4751 17.9836 5.68093C17.898 5.886 17.7727 6.07211 17.6149 6.22859L17.6132 6.23033L17.2031 6.64094L17.1995 6.64443C17.1514 6.69199 17.1192 6.75338 17.1075 6.82007C17.0957 6.88675 17.1051 6.95543 17.1342 7.01656C17.1448 7.03886 17.1542 7.06172 17.1624 7.08504C17.1846 7.14875 17.226 7.204 17.281 7.24315C17.3357 7.28217 17.4012 7.30329 17.4685 7.30362H18.0622C18.5098 7.30362 18.9391 7.48144 19.2556 7.79797C19.5722 8.1145 19.75 8.5438 19.75 8.99144V11.0376C19.75 11.4852 19.5722 11.9145 19.2556 12.2311C18.9391 12.5476 18.5098 12.7254 18.0622 12.7254H17.4082C17.341 12.7257 17.2754 12.7469 17.2207 12.7859C17.1657 12.8251 17.1242 12.8804 17.102 12.9441C17.0939 12.9676 17.0844 12.9905 17.0737 13.0129C17.0446 13.0741 17.0353 13.1428 17.047 13.2094C17.0587 13.2761 17.0909 13.3375 17.1391 13.3851L17.1426 13.3886L17.5525 13.799L17.5543 13.8007C17.7122 13.9572 17.8376 14.1434 17.9233 14.3486C18.0093 14.5545 18.0536 14.7754 18.0536 14.9985C18.0536 15.2217 18.0093 15.4426 17.9233 15.6485C17.8376 15.8537 17.7121 16.0399 17.5542 16.1964L17.5525 16.198L16.1376 17.613L16.1359 17.6147C15.9794 17.7726 15.7932 17.8981 15.588 17.9838C15.3821 18.0698 15.1612 18.114 14.9381 18.114C14.7149 18.114 14.494 18.0698 14.2881 17.9838C14.0829 17.8981 13.8967 17.7726 13.7402 17.6147L13.7386 17.613L13.3283 17.2028L13.3251 17.1995C13.2775 17.1514 13.2162 17.1192 13.1495 17.1075C13.0828 17.0957 13.0141 17.1051 12.953 17.1342C12.9306 17.1449 12.9076 17.1543 12.8842 17.1625C12.8204 17.1847 12.7651 17.2261 12.726 17.2811C12.6869 17.3358 12.6658 17.4013 12.6654 17.4685V18.0622C12.6654 18.5098 12.4876 18.9391 12.1711 19.2556C11.8545 19.5722 11.4252 19.75 10.9776 19.75H8.96193C8.5143 19.75 8.08499 19.5722 7.76846 19.2556C7.45193 18.9391 7.27411 18.5098 7.27411 18.0622V17.4182C7.27374 17.3509 7.2526 17.2855 7.21357 17.2308C7.17439 17.1758 7.11912 17.1344 7.05538 17.1122C7.03195 17.104 7.00898 17.0946 6.98657 17.0839C6.92544 17.0548 6.85676 17.0454 6.79007 17.0571C6.72338 17.0689 6.662 17.101 6.61444 17.1492L6.61124 17.1525L6.19989 17.5638L6.19882 17.5649C6.04211 17.7225 5.85583 17.8476 5.65065 17.933C5.44501 18.0186 5.22446 18.0627 5.00171 18.0627C4.77896 18.0627 4.55841 18.0186 4.35277 17.933C4.14761 17.8476 3.96135 17.7225 3.80464 17.5649L3.80353 17.5638L2.38612 16.1464L2.38503 16.1453C2.22733 15.9886 2.10213 15.8023 2.01663 15.5971C1.93093 15.3914 1.88681 15.1708 1.88681 14.948C1.88681 14.7252 1.93093 14.5045 2.01663 14.2988C2.10213 14.0936 2.22733 13.9073 2.38503 13.7506L2.38612 13.7496L2.80044 13.3352C2.84864 13.2877 2.88084 13.2263 2.89255 13.1596C2.90426 13.0929 2.89491 13.0243 2.86579 12.9631C2.85512 12.9407 2.84568 12.9177 2.83752 12.8943C2.81533 12.8306 2.7739 12.7753 2.71894 12.7361C2.66421 12.6971 2.59875 12.676 2.53154 12.6756H1.93782C1.49019 12.6756 1.06088 12.4978 0.744352 12.1812C0.427823 11.8647 0.25 11.4354 0.25 10.9878V8.97209C0.25 8.52445 0.427824 8.09515 0.744352 7.77862C1.06088 7.46209 1.49018 7.28427 1.93782 7.28427H2.54135C2.60865 7.28397 2.67422 7.26284 2.72904 7.22378C2.78402 7.1846 2.82548 7.1293 2.84768 7.06554C2.85584 7.0421 2.86528 7.01913 2.87595 6.99673C2.90506 6.9356 2.91442 6.86692 2.90271 6.80023C2.891 6.73354 2.85881 6.67216 2.81061 6.6246L2.80765 6.62168L2.39572 6.21021L2.39481 6.2093C2.23703 6.05255 2.11178 5.86616 2.02625 5.66084C1.94056 5.45512 1.89644 5.23448 1.89644 5.01163C1.89644 4.78878 1.94056 4.56813 2.02625 4.36242C2.11192 4.15677 2.23744 3.9701 2.39558 3.81319L3.83511 2.38428C3.99142 2.22688 4.17726 2.10185 4.38199 2.01638C4.58782 1.93044 4.80865 1.88619 5.0317 1.88619C5.25475 1.88619 5.47558 1.93044 5.68141 2.01638C5.8865 2.102 6.07264 2.22732 6.22912 2.38511L6.64493 2.80044C6.69249 2.84864 6.75386 2.88084 6.82055 2.89255C6.88724 2.90426 6.95592 2.89491 7.01705 2.86579C7.03935 2.85517 7.06221 2.84577 7.08553 2.83764C7.14924 2.81542 7.20448 2.77397 7.24363 2.71902C7.28264 2.66427 7.30375 2.59881 7.3041 2.5316V1.93782C7.3041 1.71611 7.34779 1.49656 7.43266 1.29173C7.51753 1.0869 7.64193 0.900805 7.79874 0.744066C7.95555 0.587327 8.14172 0.463019 8.34659 0.378245M11.0076 0.25H8.99241H11.0076Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Theme Options Panel', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Configure various features and functionalities of the theme through the Theme Options panel to suit your needs.', 'inspiro' ); ?>
				</p>
			</div>

			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M3 5.5H6.07" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M10.3238 3.73223C11.3001 4.70854 11.3001 6.29145 10.3238 7.26776C9.34748 8.24407 7.76457 8.24407 6.78826 7.26776C5.81195 6.29145 5.81195 4.70854 6.78826 3.73223C7.76457 2.75592 9.34748 2.75592 10.3238 3.73223" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M11.0601 5.5H21.0001" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M10.3238 3.73223C11.3001 4.70854 11.3001 6.29145 10.3238 7.26776C9.34748 8.24407 7.76457 8.24407 6.78826 7.26776C5.81195 6.29145 5.81195 4.70854 6.78826 3.73223C7.76457 2.75592 9.34748 2.75592 10.3238 3.73223" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M20.9999 12H17.9399" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M12.94 12H3" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M17.2119 10.2322C18.1882 11.2085 18.1882 12.7915 17.2119 13.7678C16.2355 14.7441 14.6526 14.7441 13.6763 13.7678C12.7 12.7915 12.7 11.2085 13.6763 10.2322C14.6526 9.25592 16.2355 9.25592 17.2119 10.2322" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M11.0601 18.5H21.0001" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M3 18.5H6.06" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						<path d="M10.3238 16.7322C11.3001 17.7085 11.3001 19.2915 10.3238 20.2678C9.34748 21.2441 7.76457 21.2441 6.78826 20.2678C5.81195 19.2915 5.81195 17.7085 6.78826 16.7322C7.76457 15.7559 9.34748 15.7559 10.3238 16.7322" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					</svg>
					<?php esc_html_e( 'Advanced Customization', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Easily change the theme’s colors and fonts for each element without custom CSS, ensuring a seamless design process.', 'inspiro' ); ?>
				</p>
			</div>

			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 9C0.246582 8.58579 0.582368 8.25 0.996582 8.25H13.0016C13.4158 8.25 13.7516 8.58579 13.7516 9C13.7516 9.41421 13.4158 9.75 13.0016 9.75H0.996582C0.582368 9.75 0.246582 9.41421 0.246582 9Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 13.002C0.246582 12.5877 0.582368 12.252 0.996582 12.252H16.0028C16.417 12.252 16.7528 12.5877 16.7528 13.002C16.7528 13.4162 16.417 13.752 16.0028 13.752H0.996582C0.582368 13.752 0.246582 13.4162 0.246582 13.002Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 17.0039C0.246582 16.5897 0.582368 16.2539 0.996582 16.2539H7.9995C8.41371 16.2539 8.7495 16.5897 8.7495 17.0039C8.7495 17.4181 8.41371 17.7539 7.9995 17.7539H0.996582C0.582368 17.7539 0.246582 17.4181 0.246582 17.0039Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 1.99707C0.246582 1.03057 1.03008 0.24707 1.99658 0.24707H16.0032C16.9697 0.24707 17.7532 1.03057 17.7532 1.99707V3.99874C17.7532 4.96523 16.9697 5.74874 16.0032 5.74874H1.99658C1.03008 5.74874 0.246582 4.96523 0.246582 3.99874V1.99707ZM1.99658 1.74707C1.85851 1.74707 1.74658 1.859 1.74658 1.99707V3.99874C1.74658 4.13681 1.85851 4.24874 1.99658 4.24874H16.0032C16.1413 4.24874 16.2532 4.13681 16.2532 3.99874V1.99707C16.2532 1.859 16.1413 1.74707 16.0032 1.74707H1.99658Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Header Builder', 'inspiro' ); ?> <sup><small><?php esc_html_e( 'NEW', 'inspiro' ); ?></small></sup>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Select from 6 unique Header Styles to customize your website’s header or use the new built-in header builder to design your own header.', 'inspiro' ); ?>
				</p>
			</div>

			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 1C0.246582 0.585786 0.582368 0.25 0.996582 0.25H13.0016C13.4158 0.25 13.7516 0.585786 13.7516 1C13.7516 1.41421 13.4158 1.75 13.0016 1.75H0.996582C0.582368 1.75 0.246582 1.41421 0.246582 1Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 5.00195C0.246582 4.58774 0.582368 4.25195 0.996582 4.25195H16.0028C16.417 4.25195 16.7528 4.58774 16.7528 5.00195C16.7528 5.41617 16.417 5.75195 16.0028 5.75195H0.996582C0.582368 5.75195 0.246582 5.41617 0.246582 5.00195Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 9.00391C0.246582 8.58969 0.582368 8.25391 0.996582 8.25391H7.9995C8.41371 8.25391 8.7495 8.58969 8.7495 9.00391C8.7495 9.41812 8.41371 9.75391 7.9995 9.75391H0.996582C0.582368 9.75391 0.246582 9.41812 0.246582 9.00391Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 13.9971C0.246582 13.0306 1.03008 12.2471 1.99658 12.2471H16.0032C16.9697 12.2471 17.7532 13.0306 17.7532 13.9971V15.9987C17.7532 16.9652 16.9697 17.7487 16.0032 17.7487H1.99658C1.03008 17.7487 0.246582 16.9652 0.246582 15.9987V13.9971ZM1.99658 13.7471C1.85851 13.7471 1.74658 13.859 1.74658 13.9971V15.9987C1.74658 16.1368 1.85851 16.2487 1.99658 16.2487H16.0032C16.1413 16.2487 16.2532 16.1368 16.2532 15.9987V13.9971C16.2532 13.859 16.1413 13.7471 16.0032 13.7471H1.99658Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Footer Builder', 'inspiro' ); ?> <sup><small><?php esc_html_e( 'NEW', 'inspiro' ); ?></small></sup>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Build custom footers with drag-and-drop modules, flexible column layouts, and per-device control directly in the Customizer.', 'inspiro' ); ?>
				</p>
			</div>

			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 1C0.246582 0.585786 0.582368 0.25 0.996582 0.25H13.0016C13.4158 0.25 13.7516 0.585786 13.7516 1C13.7516 1.41421 13.4158 1.75 13.0016 1.75H0.996582C0.582368 1.75 0.246582 1.41421 0.246582 1Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 5.00195C0.246582 4.58774 0.582368 4.25195 0.996582 4.25195H16.0028C16.417 4.25195 16.7528 4.58774 16.7528 5.00195C16.7528 5.41617 16.417 5.75195 16.0028 5.75195H0.996582C0.582368 5.75195 0.246582 5.41617 0.246582 5.00195Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 9.00391C0.246582 8.58969 0.582368 8.25391 0.996582 8.25391H7.9995C8.41371 8.25391 8.7495 8.58969 8.7495 9.00391C8.7495 9.41812 8.41371 9.75391 7.9995 9.75391H0.996582C0.582368 9.75391 0.246582 9.41812 0.246582 9.00391Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M0.246582 13.9971C0.246582 13.0306 1.03008 12.2471 1.99658 12.2471H16.0032C16.9697 12.2471 17.7532 13.0306 17.7532 13.9971V15.9987C17.7532 16.9652 16.9697 17.7487 16.0032 17.7487H1.99658C1.03008 17.7487 0.246582 16.9652 0.246582 15.9987V13.9971ZM1.99658 13.7471C1.85851 13.7471 1.74658 13.859 1.74658 13.9971V15.9987C1.74658 16.1368 1.85851 16.2487 1.99658 16.2487H16.0032C16.1413 16.2487 16.2532 16.1368 16.2532 15.9987V13.9971C16.2532 13.859 16.1413 13.7471 16.0032 13.7471H1.99658Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Multiple Footer Layouts', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Pick from 9 Footer Layouts to create a flexible and tailored footer that matches your site’s overall style.', 'inspiro' ); ?>
				</p>
			</div>

			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 3C1.67157 3 1 3.67157 1 4.5V15.5C1 16.3284 1.67157 17 2.5 17H17.5C18.3284 17 19 16.3284 19 15.5V4.5C19 3.67157 18.3284 3 17.5 3H2.5ZM2.5 1.5C0.843146 1.5 -0.5 2.84315 -0.5 4.5V15.5C-0.5 17.1569 0.843145 18.5 2.5 18.5H17.5C19.1569 18.5 20.5 17.1569 20.5 15.5V4.5C20.5 2.84315 19.1569 1.5 17.5 1.5H2.5Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M7.75 7.59767C7.75 6.81782 8.59143 6.3368 9.25808 6.73033L13.3221 9.13266C13.9808 9.52202 13.9808 10.478 13.3221 10.8673L9.25808 13.2697C8.59143 13.6632 7.75 13.1822 7.75 12.4023V7.59767ZM9.25 8.14597V11.854L12.3856 10L9.25 8.14597Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Movies & TV Shows Module', 'inspiro' ); ?> <sup><small><?php esc_html_e( 'NEW', 'inspiro' ); ?></small></sup>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Create a rich movies and TV shows catalog with dedicated Shows, Seasons, and Episodes content types for entertainment websites.', 'inspiro' ); ?>
				</p>
			</div>
		</div>

			<h3 class="wpz-onboard_content-main-title premium-subsection-title">
				<?php esc_html_e( 'Portfolio Premium Features', 'inspiro' ); ?>
			</h3>
		<div class="wpz-grid-wrap three portfolio-premium-grid">
			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 2C1.67157 2 1 2.67157 1 3.5V8.5C1 9.32843 1.67157 10 2.5 10H8.5C9.32843 10 10 9.32843 10 8.5V3.5C10 2.67157 9.32843 2 8.5 2H2.5ZM2.5 0.5C0.843146 0.5 -0.5 1.84315 -0.5 3.5V8.5C-0.5 10.1569 0.843146 11.5 2.5 11.5H8.5C10.1569 11.5 11.5 10.1569 11.5 8.5V3.5C11.5 1.84315 10.1569 0.5 8.5 0.5H2.5Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M11.5 3.5C11.5 1.84315 12.8431 0.5 14.5 0.5H17.5C19.1569 0.5 20.5 1.84315 20.5 3.5V6.5C20.5 8.15685 19.1569 9.5 17.5 9.5H14.5C12.8431 9.5 11.5 8.15685 11.5 6.5V3.5ZM14.5 2C13.6716 2 13 2.67157 13 3.5V6.5C13 7.32843 13.6716 8 14.5 8H17.5C18.3284 8 19 7.32843 19 6.5V3.5C19 2.67157 18.3284 2 17.5 2H14.5Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M1 14.5C1 12.8431 2.34315 11.5 4 11.5H17.5C19.1569 11.5 20.5 12.8431 20.5 14.5V16.5C20.5 18.1569 19.1569 19.5 17.5 19.5H4C2.34315 19.5 1 18.1569 1 16.5V14.5ZM4 13C3.17157 13 2.5 13.6716 2.5 14.5V16.5C2.5 17.3284 3.17157 18 4 18H17.5C18.3284 18 19 17.3284 19 16.5V14.5C19 13.6716 18.3284 13 17.5 13H4Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Multiple Portfolio Templates', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Display your work using multiple portfolio layouts including grid, masonry, and other presentation styles tailored to creative sites.', 'inspiro' ); ?>
				</p>
			</div>

			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M2 4.5C2 3.11929 3.11929 2 4.5 2H15.5C16.8807 2 18 3.11929 18 4.5V6C18 7.38071 16.8807 8.5 15.5 8.5H4.5C3.11929 8.5 2 7.38071 2 6V4.5ZM4.5 3.5C3.94772 3.5 3.5 3.94772 3.5 4.5V6C3.5 6.55228 3.94772 7 4.5 7H15.5C16.0523 7 16.5 6.55228 16.5 6V4.5C16.5 3.94772 16.0523 3.5 15.5 3.5H4.5Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M2 14C2 12.6193 3.11929 11.5 4.5 11.5H9.5C10.8807 11.5 12 12.6193 12 14V15.5C12 16.8807 10.8807 18 9.5 18H4.5C3.11929 18 2 16.8807 2 15.5V14ZM4.5 13C3.94772 13 3.5 13.4477 3.5 14V15.5C3.5 16.0523 3.94772 16.5 4.5 16.5H9.5C10.0523 16.5 10.5 16.0523 10.5 15.5V14C10.5 13.4477 10.0523 13 9.5 13H4.5Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M13 14C13 12.6193 14.1193 11.5 15.5 11.5H15.505C16.8857 11.5 18.005 12.6193 18.005 14V15.5C18.005 16.8807 16.8857 18 15.505 18H15.5C14.1193 18 13 16.8807 13 15.5V14ZM15.5 13C14.9477 13 14.5 13.4477 14.5 14V15.5C14.5 16.0523 14.9477 16.5 15.5 16.5H15.505C16.0573 16.5 16.505 16.0523 16.505 15.5V14C16.505 13.4477 16.0573 13 15.505 13H15.5Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Category Filtering Effects', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Help visitors browse faster with category-based portfolio filtering and smooth transitions between portfolio groups.', 'inspiro' ); ?>
				</p>
			</div>

			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 3C1.67157 3 1 3.67157 1 4.5V15.5C1 16.3284 1.67157 17 2.5 17H17.5C18.3284 17 19 16.3284 19 15.5V4.5C19 3.67157 18.3284 3 17.5 3H2.5ZM2.5 1.5C0.843146 1.5 -0.5 2.84315 -0.5 4.5V15.5C-0.5 17.1569 0.843145 18.5 2.5 18.5H17.5C19.1569 18.5 20.5 17.1569 20.5 15.5V4.5C20.5 2.84315 19.1569 1.5 17.5 1.5H2.5Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M7.75 7.59767C7.75 6.81782 8.59143 6.3368 9.25808 6.73033L13.3221 9.13266C13.9808 9.52202 13.9808 10.478 13.3221 10.8673L9.25808 13.2697C8.59143 13.6632 7.75 13.1822 7.75 12.4023V7.59767ZM9.25 8.14597V11.854L12.3856 10L9.25 8.14597Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Video Support with Popup', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Open portfolio videos in an elegant popup and showcase video-based work without sending visitors away from the gallery.', 'inspiro' ); ?>
				</p>
			</div>

			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M2 3.5C2 2.11929 3.11929 1 4.5 1H15.5C16.8807 1 18 2.11929 18 3.5V16.5C18 17.8807 16.8807 19 15.5 19H4.5C3.11929 19 2 17.8807 2 16.5V3.5ZM4.5 2.5C3.94772 2.5 3.5 2.94772 3.5 3.5V16.5C3.5 17.0523 3.94772 17.5 4.5 17.5H15.5C16.0523 17.5 16.5 17.0523 16.5 16.5V3.5C16.5 2.94772 16.0523 2.5 15.5 2.5H4.5Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 5.5C5.5 5.22386 5.72386 5 6 5H14C14.2761 5 14.5 5.22386 14.5 5.5V11.5C14.5 11.7761 14.2761 12 14 12H6C5.72386 12 5.5 11.7761 5.5 11.5V5.5ZM7 6.5V10.5H13V6.5H7Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 14.5C5.5 14.2239 5.72386 14 6 14H10C10.2761 14 10.5 14.2239 10.5 14.5C10.5 14.7761 10.2761 15 10 15H6C5.72386 15 5.5 14.7761 5.5 14.5Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Video Thumbnail Previews', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Use dedicated video thumbnails to make motion projects stand out visually before visitors even open the portfolio item.', 'inspiro' ); ?>
				</p>
			</div>
		</div>

			<h3 class="wpz-onboard_content-main-title premium-subsection-title">
				<?php esc_html_e( 'Video Premium Features', 'inspiro' ); ?>
			</h3>
		<div class="wpz-grid-wrap three video-premium-grid">
			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 3C1.67157 3 1 3.67157 1 4.5V15.5C1 16.3284 1.67157 17 2.5 17H17.5C18.3284 17 19 16.3284 19 15.5V4.5C19 3.67157 18.3284 3 17.5 3H2.5ZM2.5 1.5C0.843146 1.5 -0.5 2.84315 -0.5 4.5V15.5C-0.5 17.1569 0.843145 18.5 2.5 18.5H17.5C19.1569 18.5 20.5 17.1569 20.5 15.5V4.5C20.5 2.84315 19.1569 1.5 17.5 1.5H2.5Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M7.75 7.59767C7.75 6.81782 8.59143 6.3368 9.25808 6.73033L13.3221 9.13266C13.9808 9.52202 13.9808 10.478 13.3221 10.8673L9.25808 13.2697C8.59143 13.6632 7.75 13.1822 7.75 12.4023V7.59767ZM9.25 8.14597V11.854L12.3856 10L9.25 8.14597Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Advanced Video Embeds', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Embed videos from YouTube, Vimeo, or self-hosted files with a polished player that fits seamlessly into your site design.', 'inspiro' ); ?>
				</p>
			</div>

			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 2C1.67157 2 1 2.67157 1 3.5V16.5C1 17.3284 1.67157 18 2.5 18H17.5C18.3284 18 19 17.3284 19 16.5V3.5C19 2.67157 18.3284 2 17.5 2H2.5ZM2.5 0.5C0.843146 0.5 -0.5 1.84315 -0.5 3.5V16.5C-0.5 18.1569 0.843145 19.5 2.5 19.5H17.5C19.1569 19.5 20.5 18.1569 20.5 16.5V3.5C20.5 1.84315 19.1569 0.5 17.5 0.5H2.5Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M4.5 5.5C4.5 5.22386 4.72386 5 5 5H15C15.2761 5 15.5 5.22386 15.5 5.5V14.5C15.5 14.7761 15.2761 15 15 15H5C4.72386 15 4.5 14.7761 4.5 14.5V5.5ZM6 6.5V13.5H14V6.5H6Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 8.09767C8.25 7.31782 9.09143 6.8368 9.75808 7.23033L12.3221 8.74566C12.9808 9.13502 12.9808 10.091 12.3221 10.4803L9.75808 11.9957C9.09143 12.3892 8.25 11.9082 8.25 11.1283V8.09767Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Video Background on Hover', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Assign a video preview to portfolio items so motion starts playing on hover and instantly brings your projects to life.', 'inspiro' ); ?>
				</p>
			</div>

			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M8.5 2C4.91015 2 2 4.91015 2 8.5C2 12.0899 4.91015 15 8.5 15C9.94364 15 11.2773 14.5296 12.3562 13.7332L16.3115 17.6885C16.6044 17.9814 17.0793 17.9814 17.3722 17.6885C17.6651 17.3956 17.6651 16.9207 17.3722 16.6278L13.4169 12.6724C14.2135 11.5934 14.6842 10.2595 14.6842 8.81579C14.6842 5.22594 11.7741 2.31579 8.18421 2.31579H8.5ZM3.5 8.5C3.5 5.73858 5.73858 3.5 8.5 3.5C11.2614 3.5 13.5 5.73858 13.5 8.5C13.5 11.2614 11.2614 13.5 8.5 13.5C5.73858 13.5 3.5 11.2614 3.5 8.5Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M7.5 6.84767C7.5 6.06782 8.34143 5.5868 9.00808 5.98033L11.5721 7.49566C12.2308 7.88502 12.2308 8.84102 11.5721 9.23034L9.00808 10.7457C8.34143 11.1392 7.5 10.6582 7.5 9.87833V6.84767Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Video Lightbox with Direct Link', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Open videos in a lightbox and share direct links that launch the popup immediately, ideal for campaigns and portfolio presentations.', 'inspiro' ); ?>
				</p>
			</div>

			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M2 3.5C2 2.11929 3.11929 1 4.5 1H15.5C16.8807 1 18 2.11929 18 3.5V16.5C18 17.8807 16.8807 19 15.5 19H4.5C3.11929 19 2 17.8807 2 16.5V3.5ZM4.5 2.5C3.94772 2.5 3.5 2.94772 3.5 3.5V16.5C3.5 17.0523 3.94772 17.5 4.5 17.5H15.5C16.0523 17.5 16.5 17.0523 16.5 16.5V3.5C16.5 2.94772 16.0523 2.5 15.5 2.5H4.5Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 5.5C5.5 5.22386 5.72386 5 6 5H14C14.2761 5 14.5 5.22386 14.5 5.5V8.5C14.5 8.77614 14.2761 9 14 9H6C5.72386 9 5.5 8.77614 5.5 8.5V5.5ZM7 6.5V7.5H13V6.5H7Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M8.25 11.0977C8.25 10.3178 9.09143 9.8368 9.75808 10.2303L12.3221 11.7457C12.9808 12.135 12.9808 13.091 12.3221 13.4803L9.75808 14.9957C9.09143 15.3892 8.25 14.9082 8.25 14.1283V11.0977Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Video Headers in Posts, Pages & Portfolio', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Add striking video headers to posts, pages, and portfolio entries using YouTube, Vimeo, or self-hosted sources for more immersive storytelling.', 'inspiro' ); ?>
				</p>
			</div>
		</div>

			<h3 class="wpz-onboard_content-main-title premium-subsection-title">
				<?php esc_html_e( 'WooCommerce Premium Features', 'inspiro' ); ?>
			</h3>
		<div class="wpz-grid-wrap three woocommerce-premium-grid">
			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M6.5 2.5C6.5 1.11929 7.61929 0 9 0H11C12.3807 0 13.5 1.11929 13.5 2.5V3H16C16.4142 3 16.75 3.33579 16.75 3.75C16.75 4.16421 16.4142 4.5 16 4.5H15.8185L15.1071 9.48054C14.967 10.4612 14.1275 11.1905 13.137 11.1905H6.86298C5.87253 11.1905 5.03299 10.4612 4.89289 9.48054L4.1815 4.5H4C3.58579 4.5 3.25 4.16421 3.25 3.75C3.25 3.33579 3.58579 3 4 3H6.5V2.5ZM8 3H12V2.5C12 1.94772 11.5523 1.5 11 1.5H9C8.44772 1.5 8 1.94772 8 2.5V3ZM5.69617 4.5L6.37813 9.27382C6.41262 9.51529 6.61915 9.69048 6.86298 9.69048H13.137C13.3809 9.69048 13.5874 9.51529 13.6219 9.27382L14.3038 4.5H5.69617Z" fill="#242628"/>
						<path d="M7 14.5C7.82843 14.5 8.5 15.1716 8.5 16C8.5 16.8284 7.82843 17.5 7 17.5C6.17157 17.5 5.5 16.8284 5.5 16C5.5 15.1716 6.17157 14.5 7 14.5Z" fill="#242628"/>
						<path d="M13 14.5C13.8284 14.5 14.5 15.1716 14.5 16C14.5 16.8284 13.8284 17.5 13 17.5C12.1716 17.5 11.5 16.8284 11.5 16C11.5 15.1716 12.1716 14.5 13 14.5Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Shopping Cart Icon', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Add a shopping cart icon to the header so customers can quickly review their cart and move to checkout from any page.', 'inspiro' ); ?>
				</p>
			</div>

			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M5 1.5C3.067 1.5 1.5 3.067 1.5 5V15C1.5 16.933 3.067 18.5 5 18.5H15C16.933 18.5 18.5 16.933 18.5 15V5C18.5 3.067 16.933 1.5 15 1.5H5ZM3 5C3 3.89543 3.89543 3 5 3H15C16.1046 3 17 3.89543 17 5V15C17 16.1046 16.1046 17 15 17H5C3.89543 17 3 16.1046 3 15V5Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 6.25C5.5 5.83579 5.83579 5.5 6.25 5.5H13.75C14.1642 5.5 14.5 5.83579 14.5 6.25C14.5 6.66421 14.1642 7 13.75 7H6.25C5.83579 7 5.5 6.66421 5.5 6.25Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 10C5.5 9.58579 5.83579 9.25 6.25 9.25H13.75C14.1642 9.25 14.5 9.58579 14.5 10C14.5 10.4142 14.1642 10.75 13.75 10.75H6.25C5.83579 10.75 5.5 10.4142 5.5 10Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M5.5 13.75C5.5 13.3358 5.83579 13 6.25 13H10C10.4142 13 10.75 13.3358 10.75 13.75C10.75 14.1642 10.4142 14.5 10 14.5H6.25C5.83579 14.5 5.5 14.1642 5.5 13.75Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Woo Customizer Options', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Fine-tune your shop and product pages from the Customizer with premium WooCommerce layout and styling options.', 'inspiro' ); ?>
				</p>
			</div>

			<div class="section">
				<p class="pro-label">
					<?php esc_html_e( 'PRO', 'inspiro' ); ?>
				</p>
				<h4>
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M10 3C5.58172 3 2 6.13401 2 10C2 13.866 5.58172 17 10 17C14.4183 17 18 13.866 18 10C18 6.13401 14.4183 3 10 3ZM3.5 10C3.5 7.06157 6.31371 4.5 10 4.5C13.6863 4.5 16.5 7.06157 16.5 10C16.5 12.9384 13.6863 15.5 10 15.5C6.31371 15.5 3.5 12.9384 3.5 10Z" fill="#242628"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M10 7.25C8.48122 7.25 7.25 8.48122 7.25 10C7.25 11.5188 8.48122 12.75 10 12.75C11.5188 12.75 12.75 11.5188 12.75 10C12.75 8.48122 11.5188 7.25 10 7.25ZM8.75 10C8.75 9.30964 9.30964 8.75 10 8.75C10.6904 8.75 11.25 9.30964 11.25 10C11.25 10.6904 10.6904 11.25 10 11.25C9.30964 11.25 8.75 10.6904 8.75 10Z" fill="#242628"/>
					</svg>
					<?php esc_html_e( 'Quick View', 'inspiro' ); ?>
				</h4>
				<p class="about">
					<?php esc_html_e( 'Let shoppers preview product details and images in a popup without leaving the catalog, making browsing faster and smoother.', 'inspiro' ); ?>
				</p>
			</div>
		</div>

		<br>
        <br>
		<a href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/inspiro-lite/upgrade/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-table', 'inspiro' ) ); ?>"
			target="_blank" class="button button-primary">
			<?php esc_html_e( 'Get Inspiro Premium &rarr;', 'inspiro' ); ?>
		</a>
		<a href="https://www.wpzoom.com/themes/inspiro/starter-sites/?utm_source=wpadmin&utm_medium=about-inspiro-page&utm_campaign=upgrade-premium"
			title="Inspiro Premium" target="_blank"
			class="button button-secondary-gray">
			<?php esc_html_e( 'View Starter Sites &rarr;', 'inspiro' ); ?>
		</a>
	</div>
</div>
