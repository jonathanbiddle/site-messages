<?php

/**
 * Fired during plugin activation
 *
 * @link       http://eztouse.com
 * @since      1.0.0
 *
 * @package    Site_Messages
 * @subpackage Site_Messages/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Site_Messages
 * @subpackage Site_Messages/includes
 * @author     EZToUse.com <webservices@eztouse.com>
 */
class Site_Messages_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		Site_Messages_Activator::add_capabilities();
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
		$role->add_cap( 'manage_message_categories' );

		$role = get_role( 'editor' );
		$role->add_cap( 'edit_site_message' );
		$role->add_cap( 'read_site_message' );
		$role->add_cap( 'delete_site_message' );
		$role->add_cap( 'edit_site_messages' );
		$role->add_cap( 'edit_others_site_messages' );
		$role->add_cap( 'publish_site_message' );
		$role->add_cap( 'read_private_site_message' );
		$role->add_cap( 'manage_message_categories' );
	}
}
