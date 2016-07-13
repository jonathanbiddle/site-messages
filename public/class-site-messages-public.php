<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://eztouse.com
 * @since      1.0.0
 *
 * @package    Site_Messages
 * @subpackage Site_Messages/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Site_Messages
 * @subpackage Site_Messages/public
 * @author     EZToUse.com <webservices@eztouse.com>
 */
class Site_Messages_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/site-messages-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/site-messages-public.js', array( 'jquery' ), $this->version, false );

	}

	// Add Shortcode
	public function display_messages( $atts ) {
		// Attributes
		$atts = shortcode_atts(
			array(
				'display' => 'messages',
				'limit' => 5,
			),
			$atts,
			'site-messages'
		);

		$fetch_alerts = ($atts['display'] == 'alerts') False : True;

		$messages = $this->_get_messages( $fetch_alerts );

		echo $this->_render( $messages );
	}

	// Query for the messages
	private _get_messages( $fetch_alerts = False ) {
		$compare = '!=';

		if ($fetch_alerts) {
			$compare = '=';
		}

		// WP_Query arguments
		$args = array (
			'post_type'              => array( 'ez_site_message' ),
			'post_status'            => array( 'publish' ),
			'meta_query'             => array(
				array(
					'key'       => 'is_alert',
					'value'     => '1',
					'compare'   => $compare,
				),
			),
		);

		// The Query
		$query = new WP_Query( $args );
		return $query->get_posts();
	}

	// Render the HTML
	private _render( $messages ) {
		ob_start();

		foreach ($messages as $message) {
			include('partials/site-message-public-display.php');
		}

		return ob_get_clean();
	}
}
