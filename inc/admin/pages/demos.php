<?php
// Resolve the premium demos list once: remote (auto-updating) with a bundled fallback.
$designs = function_exists( 'inspiro_get_premium_demos' ) ? inspiro_get_premium_demos() : array();
if ( empty( $designs ) && function_exists( 'inspiro_get_premium_demos_fallback' ) ) {
	$designs = inspiro_get_premium_demos_fallback();
}
$inspiro_premium_count = count( $designs );
?>

<style>
    #demos .preview-thumbnail-demo { position: relative; }
    #demos .inspiro-demo-badge-new {
        position: absolute;
        top: 12px;
        inset-inline-start: 12px;
        z-index: 4;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 6px 12px;
        border-radius: 999px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .08em;
        line-height: 1;
        text-transform: uppercase;
        color: #434f69;
        background: #f0f8ff;
        box-shadow: 0 6px 18px rgba(36, 38, 40, .16);
    }
</style>

<div id="demos" class="wpz-onboard_content-main-tab wpz-onboard_content-main-theme-child demos wpz-onboard_content-side">
    <div class="wpz-onboard_content-side-section block-premium">
        <div class="section-content">
            <div class="header-row">
                <h3 class="wpz-onboard_content-main-title">
                    <?php esc_html_e( 'Premium Starter Sites', 'inspiro' ); ?>
                </h3>
            </div>
            <p class="wpz-onboard_content-main-intro">
                <?php esc_html_e( 'Explore the available demos in the Inspiro Premium theme below. Unlock access to all demos by upgrading to the premium version.', 'inspiro' ); ?>
            </p>
            <p class="section_footer">
                <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/inspiro-lite/upgrade/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium', 'inspiro' ) ); ?>"
                    target="_blank" class="button button-primary">
                        <?php esc_html_e( 'Discover Inspiro Premium', 'inspiro' ); ?>
                </a>
                <a href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/inspiro/starter-sites/?utm_source=wpadmin&utm_medium=demos-inspiro-page&utm_campaign=upgrade-premium', 'inspiro' ) ); ?>"
                    target="_blank" class="button button-primary">
                        <?php esc_html_e( 'Premium Starter Sites', 'inspiro' ); ?>
                </a>
            </p>
        </div>
    </div>

    <div class="theme-info-wrap">
        <h3 class="wpz-onboard_content-main-title">
            <?php printf( esc_html__( 'Inspiro Premium • %s Starter Sites', 'inspiro' ), number_format_i18n( $inspiro_premium_count ) ); ?>
        </h3>
        <div class="theme-buttons filters">
            <a class="button button-common active" data-filter="*">
                <?php esc_html_e( 'All', 'inspiro' ); ?>
            </a>
            <a class="button button-common" data-filter="elementor">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M0 8.99998C0 13.9703 4.0297 18 8.99997 18C13.9703 18 18 13.9703 18 8.99998C18 4.0297 13.9703 0 8.99997 0C4.0297 0 0 4.0297 0 8.99998ZM6.74964 5.2499H5.24987V12.7501H6.74964V5.2499ZM8.24943 5.2499H12.7488V6.74967H8.24943V5.2499ZM12.7488 8.24944H8.24943V9.74922H12.7488V8.24944ZM8.24943 11.2503H12.7488V12.7501H8.24943V11.2503Z" fill="#92123A"/>
                </svg>
                <?php esc_html_e( 'Elementor', 'inspiro' ); ?>
            </a>
            <a class="button button-common" data-filter="gutenberg">
                <svg width="18" height="18" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M14 28C21.732 28 28 21.732 28 14C28 6.26801 21.732 0 14 0C6.26801 0 0 6.26801 0 14C0 21.732 6.26801 28 14 28ZM20.7598 11.7135C20.5168 11.5354 20.1841 11.6073 20.0192 11.873C19.053 13.4452 17.0019 13.5296 16.8948 13.5296H16.8456C14.3172 13.5296 13.351 15.8614 13.3134 15.9551C13.1977 16.2489 13.322 16.5865 13.5853 16.7147C13.6547 16.7459 13.7328 16.7678 13.7994 16.7678C14.0048 16.7678 14.1986 16.6428 14.2883 16.4209C14.297 16.399 14.9623 14.7955 16.6692 14.6923V17.6774C16.5997 18.3213 16.3191 18.8276 15.8187 19.2058C15.3008 19.5966 14.6094 19.7966 13.7589 19.7966C12.7435 19.7966 11.9132 19.4184 11.2999 18.6682C10.675 17.9181 10.3626 16.8553 10.3626 15.4831L10.3713 12.1918C10.4204 10.979 10.7213 10.0194 11.2999 9.3349C11.9248 8.58473 12.7435 8.20652 13.7589 8.20652C14.6094 8.20652 15.3008 8.40656 15.8187 8.79728C16.3365 9.18799 16.6287 9.72561 16.6779 10.4226V10.4977C16.6779 10.8977 16.9816 11.2259 17.3519 11.2259C17.7222 11.2259 18.026 10.8977 18.026 10.4977V10.4226C17.9276 9.37865 17.4879 8.5566 16.6981 7.93458C15.9083 7.30632 14.9247 7 13.7328 7C12.3182 7 11.1755 7.50636 10.3076 8.50659C9.48891 9.44429 9.05786 10.6789 9.00868 12.198C9.00868 12.2512 9.00651 12.3035 9.00434 12.3559C9.00217 12.4082 9 12.4606 9 12.5137L9.00868 15.4769H9C9 17.1523 9.43973 18.4932 10.3076 19.4934C11.1755 20.4936 12.3182 21 13.7328 21C14.9247 21 15.9083 20.6937 16.701 20.0717C17.4242 19.5028 17.8524 18.7526 17.9999 17.8243L18.0289 14.5142C18.917 14.2829 20.1262 13.7546 20.89 12.5106C21.0809 12.2512 21.0144 11.8917 20.7598 11.7135Z" fill="#242628"/>
				</svg>
                <?php esc_html_e( 'Block Editor', 'inspiro' ); ?>
            </a>
        </div>
     
        <ol class="wpz-onboard_content-main-steps">

            <li id="step-choose-design" class="wpz-onboard_content-main-step step-1 step-choose-design">
                <div class="wpz-onboard_content-main-step-content premium">

                    <form method="post" action="#">

                        <ul id="grid theme-ul">
                            <?php

                                $elementor_svg = '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14 0C6.26727 0 0 6.26723 0 13.9999C0 21.7302 6.26727 28 14 28C21.7327 28 28 21.7326 28 13.9999C27.9976 6.26723 21.7303 0 14 0ZM10.5007 19.8312H8.16859V8.16599H10.5007V19.8312ZM19.8315 19.8312H12.8327V17.4993H19.8315V19.8312ZM19.8315 15.1647H12.8327V12.8327H19.8315V15.1647ZM19.8315 10.4981H12.8327V8.16599H19.8315V10.4981Z" fill="#92123A"/>
                                </svg>';

                                $gutenberg_svg = '<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M14 28C21.732 28 28 21.732 28 14C28 6.26801 21.732 0 14 0C6.26801 0 0 6.26801 0 14C0 21.732 6.26801 28 14 28ZM20.7598 11.7135C20.5168 11.5354 20.1841 11.6073 20.0192 11.873C19.053 13.4452 17.0019 13.5296 16.8948 13.5296H16.8456C14.3172 13.5296 13.351 15.8614 13.3134 15.9551C13.1977 16.2489 13.322 16.5865 13.5853 16.7147C13.6547 16.7459 13.7328 16.7678 13.7994 16.7678C14.0048 16.7678 14.1986 16.6428 14.2883 16.4209C14.297 16.399 14.9623 14.7955 16.6692 14.6923V17.6774C16.5997 18.3213 16.3191 18.8276 15.8187 19.2058C15.3008 19.5966 14.6094 19.7966 13.7589 19.7966C12.7435 19.7966 11.9132 19.4184 11.2999 18.6682C10.675 17.9181 10.3626 16.8553 10.3626 15.4831L10.3713 12.1918C10.4204 10.979 10.7213 10.0194 11.2999 9.3349C11.9248 8.58473 12.7435 8.20652 13.7589 8.20652C14.6094 8.20652 15.3008 8.40656 15.8187 8.79728C16.3365 9.18799 16.6287 9.72561 16.6779 10.4226V10.4977C16.6779 10.8977 16.9816 11.2259 17.3519 11.2259C17.7222 11.2259 18.026 10.8977 18.026 10.4977V10.4226C17.9276 9.37865 17.4879 8.5566 16.6981 7.93458C15.9083 7.30632 14.9247 7 13.7328 7C12.3182 7 11.1755 7.50636 10.3076 8.50659C9.48891 9.44429 9.05786 10.6789 9.00868 12.198C9.00868 12.2512 9.00651 12.3035 9.00434 12.3559C9.00217 12.4082 9 12.4606 9 12.5137L9.00868 15.4769H9C9 17.1523 9.43973 18.4932 10.3076 19.4934C11.1755 20.4936 12.3182 21 13.7328 21C14.9247 21 15.9083 20.6937 16.701 20.0717C17.4242 19.5028 17.8524 18.7526 17.9999 17.8243L18.0289 14.5142C18.917 14.2829 20.1262 13.7546 20.89 12.5106C21.0809 12.2512 21.0144 11.8917 20.7598 11.7135Z" fill="#242628"/>
                                </svg>';


                                foreach ($designs as $design) :
                            ?>
                            <li class="<?php echo esc_attr($design['class']); ?>" data-design-id="<?php echo esc_attr($design['id']); ?>">
                                <figure title="<?php echo esc_attr($design['title']); ?>">
                                    <div class="preview-thumbnail-demo">
                                        <?php if ( ! empty( $design['is_new'] ) ) : ?>
                                            <span class="inspiro-demo-badge-new"><?php esc_html_e( 'New', 'inspiro' ); ?></span>
                                        <?php endif; ?>
                                        <a href="<?php echo esc_url($design['demo_url']); ?>" target="_blank"><img src="<?php echo esc_url($design['thumbnail_url']); ?>" alt="<?php echo esc_attr($design['title']); ?>" /></a>
                                    </div>
                                    <figcaption>
                                        <h5><?php echo esc_html($design['name']); ?></h5>
                                        <p>
                                            <?php esc_html_e('Available for ', 'inspiro'); ?>
                                            <?php 
                                                if (!empty($design['available_for'])) {
                                                    $builders = is_array($design['available_for']) ? $design['available_for'] : [$design['available_for']];
                                                    foreach ($builders as $builder) {
                                                        if ($builder === 'Elementor') {
                                                            echo $elementor_svg;
                                                        } elseif ($builder === 'Gutenberg') {
                                                            echo $gutenberg_svg;
                                                        }
                                                    }
                                                }
                                            ?>
                                        </p>
                                        <a href="<?php echo esc_url($design['premium_url']); ?>" target="_blank" class="button button-primary">
                                            <?php esc_html_e('More Info', 'inspiro'); ?>
                                        </a>
                                        <a href="<?php echo esc_url($design['demo_url']); ?>" target="_blank" class="button button-secondary-gray">
                                            <?php esc_html_e('Preview', 'inspiro'); ?>
                                        </a>
                                    </figcaption>
                                </figure>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </form>
                </div>
            </li>
        </ol>    
    </div>

</div>
