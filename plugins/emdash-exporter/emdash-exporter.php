<?php
/**
 * Plugin Name: EmDash Exporter
 * Plugin URI: https://github.com/emdash-cms/wp-emdash
 * Description: Export your WordPress content to EmDash CMS with one click
 * Version: 1.0.0
 * Requires at least: 5.6
 * Requires PHP: 7.4
 * Author: Matt Kane
 * License: GPL3
 * Text Domain: emdash-exporter
 */

defined('ABSPATH') || exit;

define('EMDASH_EXPORTER_VERSION', '1.0.0');
define('EMDASH_EXPORTER_PATH', plugin_dir_path(__FILE__));

// Load REST API endpoints
require_once EMDASH_EXPORTER_PATH . 'includes/class-rest-controller.php';
require_once EMDASH_EXPORTER_PATH . 'includes/class-content-exporter.php';
require_once EMDASH_EXPORTER_PATH . 'includes/class-media-exporter.php';

/**
 * Initialize the plugin
 */
function emdash_exporter_init() {
    // Register REST API routes
    $controller = new EmDash_Exporter_REST_Controller();
    $controller->register_routes();
}
add_action('rest_api_init', 'emdash_exporter_init');

/**
 * Add admin notice with connection info
 */
function emdash_exporter_admin_notice() {
    $screen = get_current_screen();
    if ($screen->id !== 'plugins') {
        return;
    }
    
    $site_url = get_site_url();
    $api_url = rest_url('emdash/v1/');
    
    ?>
    <div class="notice notice-info is-dismissible">
        <p>
            <strong>EmDash Exporter:</strong> 
            Your site is ready for export. Connect from EmDash using:
            <code><?php echo esc_html($site_url); ?></code>
        </p>
        <p>
            <small>API endpoint: <code><?php echo esc_html($api_url); ?></code></small>
        </p>
    </div>
    <?php
}
add_action('admin_notices', 'emdash_exporter_admin_notice');

/**
 * Add settings link on plugins page
 */
function emdash_exporter_settings_link($links) {
    $api_url = rest_url('emdash/v1/probe');
    $links[] = '<a href="' . esc_url($api_url) . '" target="_blank">Test API</a>';
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'emdash_exporter_settings_link');
