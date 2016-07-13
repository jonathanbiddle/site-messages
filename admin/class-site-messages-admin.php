<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://eztouse.com
 * @since      1.0.0
 *
 * @package    Site_Messages
 * @subpackage Site_Messages/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Site_Messages
 * @subpackage Site_Messages/admin
 * @author     EZToUse.com <webservices@eztouse.com>
 */
class Site_Messages_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Site_Messages_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Site_Messages_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/site-messages-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Site_Messages_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Site_Messages_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/site-messages-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function add_capabilities() {
		$role = get_role( 'administrator' );
		$role->add_cap( 'edit_site_message' );
		$role->add_cap( 'read_site_message' );
		$role->add_cap( 'delete_site_message' );
		$role->add_cap( 'edit_site_messages' );
		$role->add_cap( 'edit_others_site_messages' );
		$role->add_cap( 'publish_site_message' );
		$role->add_cap( 'read_private_site_message' );
	}

}