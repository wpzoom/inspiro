<?php
/**
 * Theme admin leave review notice
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.2.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Main PHP class for notice review
 */
class Inspiro_Notice_Review extends Inspiro_Notices {

    /**
     * The constructor.
     */
    public function __construct() {
        // Register with Notice Center if available.
        add_filter( 'wpzoom_notice_center_notices', array( $this, 'register_notice_center' ) );

        add_action( 'wp_loaded', array( $this, 'review_notice' ), 20 );
        add_action( 'wp_loaded', array( $this, 'hide_notices' ), 15 );

        $this->current_user_id = get_current_user_id();
    }

    /**
     * Register the review notice with the WPZOOM Notice Center.
     *
     * @param array $notices Existing notices.
     * @return array
     */
    public function register_notice_center( $notices ) {
        if ( ! get_option( 'inspiro_theme_installed_time' ) ) {
            update_option( 'inspiro_theme_installed_time', time() );
        }

        // Only show after 4 days.
        if ( get_option( 'inspiro_theme_installed_time' ) > strtotime( '-4 day' ) ) {
            return $notices;
        }

        // Skip if dismissed via legacy system.
        $this_notice_was_dismissed = $this->get_notice_status( 'review-user-' . $this->current_user_id );
        if ( $this_notice_was_dismissed ) {
            return $notices;
        }

        $notices[] = array(
            'id'               => 'inspiro_review',
            'heading'          => __( 'Love Inspiro Theme? Share a 5-Star Review!', 'inspiro' ),
            'content'          => '<p>' . esc_html__( "We'd be grateful if you could take a moment to share your positive experience by leaving a review on WordPress.org.", 'inspiro' ) . '</p>',
            'icon'             => array(
                'type'             => 'dashicon',
                'dashicon'         => 'dashicons-star-filled',
            ),
            'primary_button'   => array(
                'label'   => __( 'Leave a Review', 'inspiro' ),
                'url'     => 'https://wordpress.org/support/theme/inspiro/reviews/?rate=5#new-post',
                'new_tab' => true,
            ),
            'secondary_button' => array(
                'label' => __( 'Maybe Later', 'inspiro' ),
                'url'   => '',
            ),
            'capability'       => 'edit_theme_options',
            'screens'          => array( 'dashboard', 'themes' ),
            'source'           => 'Inspiro Theme',
            'priority'         => 20,
        );

        return $notices;
    }

    /**
     * Update option 'inspiro_theme_installed_time' if is not exists
     * Add action if notice wasn't dismissed
     *
     * @return void
     */
    public function review_notice() {
        // Skip when Notice Center is handling notices.
        if ( class_exists( 'WPZOOM_Notice_Center' ) ) {
            return;
        }

        global $pagenow, $inspiro_version;

        if ( ! get_option( 'inspiro_theme_installed_time' ) ) {
            update_option( 'inspiro_theme_installed_time', time() );
        }

        $this_notice_was_dismissed = $this->get_notice_status( 'review-user-' . $this->current_user_id );

        $current_user_can      = current_user_can( 'edit_theme_options' );

        $should_display_notice = ( $current_user_can && 'index.php' === $pagenow  ) || ( $current_user_can && 'themes.php' === $pagenow && isset( $_GET['activated'] ) ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended

        if ( $should_display_notice ) {

            if ( ! $this_notice_was_dismissed ) {

                wp_enqueue_style( 'welcome-notice', get_template_directory_uri() . '/assets/css/minified/welcome-notice.min.css' );

                add_action( 'admin_notices', array( $this, 'review_notice_markup' ) ); // Display this notice.
            }

        }
    }

    /**
     * Show HTML markup if conditions meet
     *
     * @return void
     */
    public function review_notice_markup() {
        $dismiss_url = wp_nonce_url(
            remove_query_arg( array( 'activated' ), add_query_arg( 'inspiro-hide-notice', 'review-user-' . $this->current_user_id ) ),
            'inspiro_hide_notices_nonce',
            '_inspiro_notice_nonce'
        );

        $theme_data   = wp_get_theme();
        $current_user = wp_get_current_user();

        if ( ( get_option( 'inspiro_theme_installed_time' ) > strtotime( '-4 day' ) ) ) {
            return;
        }
        ?>
        <div id="message" class="notice inspiro-notice inspiro-review-notice wpz-review-notice">
            <a class="inspiro-message-close notice-dismiss" href="<?php echo esc_url( $dismiss_url ); ?>"></a>

                <div class="wpz-notice-image">
                    <img class="inspiro-screenshot" src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/admin/inspiro-top.png" width="180" alt="<?php esc_attr_e( 'Inspiro', 'inspiro' ); ?>" />
                </div>
                <div class="wpz-notice-text">

                    <h3><?php echo esc_html__( 'Love Inspiro Theme? Share a 5-Star Review! 🌟', 'inspiro' ); ?></h3>

                    <p>
                        <?php
                        printf(
                            /* Translators: %1$s current user display name. */
                            esc_html__(
                                'We hope you are enjoying the %1$s theme! %2$sWe\'d be grateful if you could take a moment to share your positive experience with others by leaving a review on WordPress.org. This helps us continue providing updates and support for this theme.',
                                'inspiro'
                            ),
                            // phpcs:ignore WordPress.NamingConventions.ValidVariableName.UsedPropertyNotSnakeCase
                            '<a href="' . esc_url( admin_url( 'admin.php?page=inspiro' ) ) . '"><strong>' . esc_html( $theme_data->Name ) . '</strong></a>',
                            '<br>'
                        );
                        ?>
                    </p>

                    <div class="wpz-welcome-notice-button">

                       <a href="https://wordpress.org/support/theme/inspiro/reviews/?rate=5#new-post" class="button button-primary" target="_blank"><span class="dashicons dashicons-star-filled"></span> <?php esc_html_e( 'Leave a Review', 'inspiro' ); ?></a>

                        <a href="<?php echo esc_url( $dismiss_url ); ?>" class="button button-secondary"><?php esc_html_e( 'Hide this notice', 'inspiro' ); ?></a>
                        </a>
                    </div>

                </div><!-- .inspiro-message-text -->

        </div><!-- #message -->
        <?php
    }
}

new Inspiro_Notice_Review();
