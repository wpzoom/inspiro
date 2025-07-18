<?php
    $screen = get_current_screen();
    $wpz_current_page = ''; // Default

    if (isset($_GET['page'])) {
        $wpz_current_page = sanitize_text_field($_GET['page']);
    }

?>
<div class="wpz-onboard_header">
	<div class="wpz-onboard_title-wrapper">
		<h1 class="wpz-onboard_title">
			<svg width="30" height="30" viewBox="0 0 46 46" fill="none" xmlns="https://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M23 46C35.7025 46 46 35.7025 46 23C46 10.2975 35.7025 0 23 0C10.2975 0 0 10.2975 0 23C0 35.7025 10.2975 46 23 46ZM19.4036 10.3152C19.4036 8.31354 21.0263 6.69091 23.0279 6.69091H26.2897C26.4899 6.69091 26.6521 6.85317 26.6521 7.05333V13.5025C26.6521 13.622 26.5884 13.7324 26.4848 13.7922L19.9055 17.5908C19.6824 17.7196 19.4036 17.5586 19.4036 17.3011V10.3152ZM19.5709 24.0613L26.1503 20.2627C26.3733 20.134 26.6521 20.2949 26.6521 20.5525V35.6849C26.6521 37.6865 25.0295 39.3091 23.0279 39.3091H19.7661C19.5659 39.3091 19.4036 39.1468 19.4036 38.9467V24.3511C19.4036 24.2316 19.4674 24.1211 19.5709 24.0613Z" fill="#242628"/>
			</svg>
			Inspiro <span>Lite</span>
		</h1>
	</div>

	<ul class="wpz-onboard_tabs" id="wpz-onboard_tabs">

		<div class="wpz-onboard_tab-dashboard">
			<p><?php esc_html_e( 'DASHBOARD', 'inspiro' ); ?></p>
			<hr class="wpz-onboard_hr">
		</div>

		<li class="wpz-onboard_tab wpz-onboard_tab-quick-start">
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=inspiro' ) ); ?>#quick-start" title="Home">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M6.5 18.5002V14.0002C6.5 12.6192 7.619 11.5002 9 11.5002V11.5002C10.381 11.5002 11.5 12.6192 11.5 14.0002V18.5002H17V9.91425C17 9.38425 16.789 8.87525 16.414 8.50025L9.707 1.79325C9.316 1.40225 8.683 1.40225 8.293 1.79325L1.586 8.50025C1.211 8.87525 1 9.38425 1 9.91425V18.5002H6.5Z" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg> 
				<?php esc_html_e( 'Home', 'inspiro' ); ?>
			</a>
		</li>
		<li class="wpz-onboard_tab wpz-onboard_tab-theme-child">
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=inspiro' ) ); ?>#vs-pro" title="Free vs. PRO">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M5.13033 0.869084C5.42322 1.16198 5.42322 1.63685 5.13033 1.92974L2.06066 4.99941L5.13033 8.06908C5.42322 8.36198 5.42322 8.83685 5.13033 9.12974C4.83744 9.42264 4.36256 9.42264 4.06967 9.12974L0.46967 5.52974C0.176777 5.23685 0.176777 4.76198 0.46967 4.46908L4.06967 0.869084C4.36256 0.576191 4.83744 0.576191 5.13033 0.869084Z" fill="#242628"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M0.25 4.99941C0.25 4.5852 0.585786 4.24941 1 4.24941H15C15.4142 4.24941 15.75 4.5852 15.75 4.99941C15.75 5.41363 15.4142 5.74941 15 5.74941H1C0.585786 5.74941 0.25 5.41363 0.25 4.99941Z" fill="#242628"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M11.9304 10.8695C11.6375 10.5766 11.1626 10.5766 10.8697 10.8695C10.5768 11.1623 10.5768 11.6372 10.8697 11.9301L13.189 14.2494H1C0.585786 14.2494 0.25 14.5852 0.25 14.9994C0.25 15.4136 0.585786 15.7494 1 15.7494H13.1898L10.8697 18.0694C10.5768 18.3623 10.5768 18.8372 10.8697 19.1301C11.1626 19.423 11.6375 19.423 11.9304 19.1301L15.5304 15.5301C15.6852 15.3753 15.7581 15.1697 15.7493 14.9669C15.7407 14.7657 15.6529 14.585 15.5162 14.4553L11.9304 10.8695Z" fill="#242628"/>
				</svg>
				<?php esc_html_e( 'Free vs. Premium', 'inspiro' ); ?>
			</a>
		</li>
		<li class="wpz-onboard_tab wpz-onboard_tab-debug">
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=inspiro' ) ); ?>#demos" title="Premium Starter Sites">
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M4.64479 10.9348L6.77737 11.7451C8.38017 12.3542 9.64583 13.6198 10.2549 15.2226L11.0652 17.3552C11.2127 17.7434 11.5847 18 12 18C12.4152 18 12.7873 17.7434 12.9348 17.3552L13.7451 15.2226C14.3542 13.6198 15.6198 12.3542 17.2226 11.7451L19.3552 10.9348C19.7434 10.7873 20 10.4152 20 9.99999C20 9.58475 19.7434 9.21271 19.3552 9.06521L17.2226 8.25487C15.6198 7.64582 14.3542 6.38016 13.7451 4.77736L12.9348 2.64479C12.7873 2.25662 12.4152 2 12 2C11.5847 2 11.2127 2.25662 11.0652 2.64479L10.2549 4.77736C9.64583 6.38016 8.38017 7.64582 6.77737 8.25487L4.64479 9.06521C4.25662 9.21271 4 9.58475 4 9.99999C4 10.4152 4.25662 10.7873 4.64479 10.9348Z" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M4 19V15" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M2 17H6" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M3 5V1" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M1 3H5" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
				<?php esc_html_e( 'Premium Starter Sites', 'inspiro' ); ?>
			</a>
		</li>

		<li class="wpz-onboard_tab wpz-onboard_tab-plugins"><a href="<?php echo esc_url( admin_url( 'admin.php?page=inspiro' ) ); ?>#support" title="Support & Docs">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M19.5601 7.1189C21.4801 10.0889 21.4791 13.9129 19.5611 16.8819" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M15.5476 8.45236C17.5068 10.4116 17.5068 13.5882 15.5476 15.5475C13.5883 17.5067 10.4117 17.5067 8.45248 15.5475C6.49322 13.5882 6.49322 10.4116 8.45248 8.45236C10.4117 6.4931 13.5883 6.4931 15.5476 8.45236" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M14.321 7.55094L16.905 4.41194C17.281 3.95494 17.969 3.92194 18.388 4.33994L19.661 5.61294C20.08 6.03194 20.046 6.71994 19.589 7.09594L16.45 9.67994" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M9.67899 16.4491L7.09499 19.5881C6.71899 20.0451 6.03099 20.0781 5.61199 19.6601L4.33899 18.3871C3.91999 17.9681 3.95399 17.2801 4.41099 16.9041L7.54999 14.3201" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M7.55096 9.67911L4.41096 7.09511C3.95396 6.71911 3.92096 6.03111 4.33896 5.61211L5.61196 4.33911C6.03096 3.92011 6.71896 3.95411 7.09496 4.41111L9.67896 7.55011" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M16.4489 14.321L19.5879 16.905C20.0449 17.281 20.0779 17.969 19.6599 18.388L18.3869 19.661C17.9679 20.08 17.2799 20.046 16.9039 19.589L14.3199 16.45" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M16.882 19.5611C13.913 21.4791 10.088 21.4801 7.11902 19.5601" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M4.43899 7.11792C2.52099 10.0869 2.51999 13.9109 4.43999 16.8809" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				<path d="M16.881 4.43999C13.911 2.51999 10.087 2.52099 7.11804 4.43899" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
			</svg>
			<?php esc_html_e( 'Support & Docs', 'inspiro' ); ?></a>
		</li>

		<hr class="wpz-onboard_hr">

    </ul>

    <ul class="wpz-onboard_tabs">

		<li class="wpz-onboard_tab wpz-onboard_tab-demos <?php echo ($wpz_current_page === 'inspiro-demo') ? 'ui-tabs-active ui-state-active' : ''; ?>">
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=inspiro-demo' ) ); ?>" title="Starter Site Importer" >
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
				<?php esc_html_e( 'Demo Importer', 'inspiro' ); ?>
			</a>
		</li>
		<li class="wpz-onboard_tab wpz-onboard_tab-debug">
            <a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" target="_blank"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
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
				</svg> <?php esc_html_e( 'Customize', 'inspiro' ); ?> <img width="18" height="18" src="<?php echo esc_url( get_template_directory_uri() . '/inc/admin/assets/images/north-east.svg' ); ?>" alt="icon" /></a>
		</li>
		<li class="wpz-onboard_tab wpz-onboard_tab-plugins <?php echo ($wpz_current_page === 'inspiro-upgrade') ? 'ui-tabs-active ui-state-active' : ''; ?>">
			<a href="<?php echo esc_url( admin_url( 'admin.php?page=inspiro-upgrade' ) ); ?>" title="Install Premium" >
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M3 0.25C1.48079 0.25 0.25 1.48079 0.25 3C0.25 3.41421 0.585786 3.75 1 3.75C1.41421 3.75 1.75 3.41421 1.75 3C1.75 2.30921 2.30921 1.75 3 1.75C3.41421 1.75 3.75 1.41421 3.75 1C3.75 0.585786 3.41421 0.25 3 0.25Z" fill="#242628"/>
					<path d="M1.75 17C1.75 16.5858 1.41421 16.25 1 16.25C0.585786 16.25 0.25 16.5858 0.25 17C0.25 18.5192 1.48079 19.75 3 19.75C3.41421 19.75 3.75 19.4142 3.75 19C3.75 18.5858 3.41421 18.25 3 18.25C2.30921 18.25 1.75 17.6908 1.75 17Z" fill="#242628"/>
					<path d="M1 10.9199C1.41421 10.9199 1.75 11.2557 1.75 11.6699V13.6699C1.75 14.0841 1.41421 14.4199 1 14.4199C0.585786 14.4199 0.25 14.0841 0.25 13.6699V11.6699C0.25 11.2557 0.585786 10.9199 1 10.9199Z" fill="#242628"/>
					<path d="M1.75 6.33008C1.75 5.91586 1.41421 5.58008 1 5.58008C0.585786 5.58008 0.25 5.91586 0.25 6.33008V8.33008C0.25 8.74429 0.585786 9.08008 1 9.08008C1.41421 9.08008 1.75 8.74429 1.75 8.33008V6.33008Z" fill="#242628"/>
					<path d="M5.57996 19C5.57996 18.5858 5.91574 18.25 6.32996 18.25H8.32996C8.74417 18.25 9.07996 18.5858 9.07996 19C9.07996 19.4142 8.74417 19.75 8.32996 19.75H6.32996C5.91574 19.75 5.57996 19.4142 5.57996 19Z" fill="#242628"/>
					<path d="M6.32996 0.25C5.91574 0.25 5.57996 0.585786 5.57996 1C5.57996 1.41421 5.91574 1.75 6.32996 1.75H8.32996C8.74417 1.75 9.07996 1.41421 9.07996 1C9.07996 0.585786 8.74417 0.25 8.32996 0.25H6.32996Z" fill="#242628"/>
					<path d="M19 16.25C19.4142 16.25 19.75 16.5858 19.75 17C19.75 18.5192 18.5192 19.75 17 19.75C16.5858 19.75 16.25 19.4142 16.25 19C16.25 18.5858 16.5858 18.25 17 18.25C17.6908 18.25 18.25 17.6908 18.25 17C18.25 16.5858 18.5858 16.25 19 16.25Z" fill="#242628"/>
					<path d="M17 0.25C16.5858 0.25 16.25 0.585786 16.25 1C16.25 1.41421 16.5858 1.75 17 1.75C17.6908 1.75 18.25 2.30921 18.25 3C18.25 3.41421 18.5858 3.75 19 3.75C19.4142 3.75 19.75 3.41421 19.75 3C19.75 1.48079 18.5192 0.25 17 0.25Z" fill="#242628"/>
					<path d="M19 5.58008C19.4142 5.58008 19.75 5.91586 19.75 6.33008V8.33008C19.75 8.74429 19.4142 9.08008 19 9.08008C18.5858 9.08008 18.25 8.74429 18.25 8.33008V6.33008C18.25 5.91586 18.5858 5.58008 19 5.58008Z" fill="#242628"/>
					<path d="M19.75 11.6699C19.75 11.2557 19.4142 10.9199 19 10.9199C18.5858 10.9199 18.25 11.2557 18.25 11.6699V13.6699C18.25 14.0841 18.5858 14.4199 19 14.4199C19.4142 14.4199 19.75 14.0841 19.75 13.6699V11.6699Z" fill="#242628"/>
					<path d="M10 5.25C10.4142 5.25 10.75 5.58579 10.75 6V12.1893L12.4697 10.4697C12.7626 10.1768 13.2374 10.1768 13.5303 10.4697C13.8232 10.7626 13.8232 11.2374 13.5303 11.5303L10.5303 14.5303C10.4584 14.6022 10.3755 14.6565 10.2871 14.6931C10.1987 14.7298 10.1017 14.75 10 14.75C9.89831 14.75 9.80134 14.7298 9.71291 14.6931C9.62445 14.6565 9.54158 14.6022 9.46967 14.5303L6.46967 11.5303C6.17678 11.2374 6.17678 10.7626 6.46967 10.4697C6.76256 10.1768 7.23744 10.1768 7.53033 10.4697L9.25 12.1893V6C9.25 5.58579 9.58579 5.25 10 5.25Z" fill="#242628"/>
					<path d="M10.92 1C10.92 0.585786 11.2558 0.25 11.67 0.25H13.67C14.0843 0.25 14.42 0.585786 14.42 1C14.42 1.41421 14.0843 1.75 13.67 1.75H11.67C11.2558 1.75 10.92 1.41421 10.92 1Z" fill="#242628"/>
					<path d="M11.67 18.25C11.2558 18.25 10.92 18.5858 10.92 19C10.92 19.4142 11.2558 19.75 11.67 19.75H13.67C14.0843 19.75 14.42 19.4142 14.42 19C14.42 18.5858 14.0843 18.25 13.67 18.25H11.67Z" fill="#242628"/>
				</svg>
				<?php esc_html_e( 'Install Premium', 'inspiro' ); ?>
			</a>
		</li>
        <li class="wpz-onboard_tab wpz-onboard_tab-plugins <?php echo ($wpz_current_page === 'inspiro-plugins') ? 'ui-tabs-active ui-state-active' : ''; ?>">
            <a href="<?php echo esc_url( admin_url( 'admin.php?page=inspiro-plugins' ) ); ?>" title="Install Plugins" >
				<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M4.16413 9.49747C3.72694 9.40843 3.25275 9.42544 2.76354 9.58851C1.9362 9.86462 1.28093 10.5759 1.07584 11.4243C0.653665 13.168 1.96321 14.7246 3.63591 14.7246C3.81698 14.7246 3.99306 14.7056 4.16413 14.6716V17.893C4.16413 19.0585 5.10952 20.0038 6.27601 20.0038H17.8918C19.0583 20.0038 20.0037 19.0585 20.0037 17.892V6.27613C20.0037 5.10964 19.0583 4.16425 17.8918 4.16425H14.6705C14.7595 3.72707 14.7425 3.25287 14.5795 2.76367C14.3023 1.93632 13.5911 1.28105 12.7437 1.07596C11 0.653787 9.44333 1.96333 9.44333 3.63603C9.44333 3.8171 9.46233 3.99318 9.49635 4.16425H6.27501C5.10852 4.16425 4.16313 5.10964 4.16313 6.27613V9.49747H4.16413Z" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M12.0005 9.49951V13.5012" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
					<path d="M14.0012 11.5002H9.99951" stroke="#242628" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
				</svg>
				<?php esc_html_e( 'Recommended Plugins', 'inspiro' ); ?>
			</a>
		</li>

                <li class="wpz-onboard_tab wpz-onboard_tab-debug">
                    <a href="<?php echo esc_url( 'https://www.wpzoom.com/themes/inspiro-lite/changelog/' ); ?>" target="_blank"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M8.53033 0.46967C8.23744 0.176777 7.76256 0.176777 7.46967 0.46967C7.17678 0.762563 7.17678 1.23744 7.46967 1.53033L8.18934 2.25H4C1.92893 2.25 0.25 3.92893 0.25 6V14C0.25 16.0711 1.92893 17.75 4 17.75H7C7.41421 17.75 7.75 17.4142 7.75 17C7.75 16.5858 7.41421 16.25 7 16.25H4C2.75736 16.25 1.75 15.2426 1.75 14V6C1.75 4.75736 2.75736 3.75 4 3.75H8.18934L7.46967 4.46967C7.17678 4.76256 7.17678 5.23744 7.46967 5.53033C7.76256 5.82322 8.23744 5.82322 8.53033 5.53033L10.5303 3.53033C10.6022 3.45842 10.6565 3.37555 10.6931 3.28709C10.7298 3.19866 10.75 3.10169 10.75 3C10.75 2.89831 10.7298 2.80134 10.6931 2.71291C10.6565 2.62445 10.6022 2.54158 10.5303 2.46967L8.53033 0.46967Z" fill="#242628"/>
<path d="M16 3.75H13C12.5858 3.75 12.25 3.41421 12.25 3C12.25 2.58579 12.5858 2.25 13 2.25H16C18.0711 2.25 19.75 3.92893 19.75 6V14C19.75 16.0711 18.0711 17.75 16 17.75H11.8107L12.5303 18.4697C12.8232 18.7626 12.8232 19.2374 12.5303 19.5303C12.2374 19.8232 11.7626 19.8232 11.4697 19.5303L9.46967 17.5303C9.39776 17.4584 9.34351 17.3755 9.30691 17.2871C9.27024 17.1987 9.25 17.1017 9.25 17C9.25 16.9871 9.25033 16.9742 9.25098 16.9614C9.25542 16.8738 9.27491 16.7901 9.30691 16.7129C9.34351 16.6245 9.39776 16.5416 9.46967 16.4697L11.4697 14.4697C11.7626 14.1768 12.2374 14.1768 12.5303 14.4697C12.8232 14.7626 12.8232 15.2374 12.5303 15.5303L11.8107 16.25H16C17.2426 16.25 18.25 15.2426 18.25 14V6C18.25 4.75736 17.2426 3.75 16 3.75Z" fill="#242628"/>
<path d="M12.5303 9.03033C12.8232 8.73744 12.8232 8.26256 12.5303 7.96967C12.2374 7.67678 11.7626 7.67678 11.4697 7.96967L9.5 9.93934L8.53033 8.96967C8.23744 8.67678 7.76256 8.67678 7.46967 8.96967C7.17678 9.26256 7.17678 9.73744 7.46967 10.0303L8.96967 11.5303C9.26256 11.8232 9.73744 11.8232 10.0303 11.5303L12.5303 9.03033Z" fill="#242628"/>
</svg> <?php esc_html_e( 'Changelog', 'inspiro' ); ?> <img width="18" height="18" src="<?php echo esc_url( get_template_directory_uri() . '/inc/admin/assets/images/north-east.svg' ); ?>" alt="icon" /></a>
                </li>

	</ul>
</div>
