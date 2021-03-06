<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://eztouse.com
 * @since             1.0.0
 * @package           Site_Messages
 *
 * @wordpress-plugin
 * Plugin Name:       Site Messages
 * Plugin URI:        http://eztouse.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            EZToUse.com
 * Author URI:        http://eztouse.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       site-messages
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-site-messages-activator.php
 */
function activate_site_messages() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-site-messages-activator.php';
	Site_Messages_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-site-messages-deactivator.php
 */
function deactivate_site_messages() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-site-messages-deactivator.php';
	Site_Messages_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_site_messages' );
register_deactivation_hook( __FILE__, 'deactivate_site_messages' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-site-messages.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_site_messages() {

	//ini_set("date.timezone", "America/New_York");

	$plugin = new Site_Messages();
	$plugin->run();

}
run_site_messages();
