<?php

/**
 * Fired during plugin deactivation
 *
 * @link       http://eztouse.com
 * @since      1.0.0
 *
 * @package    Site_Messages
 * @subpackage Site_Messages/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Site_Messages
 * @subpackage Site_Messages/includes
 * @author     EZToUse.com <webservices@eztouse.com>
 */
class Site_Messages_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		Site_Messages_Deactivator::remove_capabilities();
	}

	public static function remove_capabilities() {
		$role = get_role( 'administrator' );
		$role->remove_cap( 'edit_site_message' );
		$role->remove_cap( 'read_site_message' );
		$role->remove_cap( 'delete_site_message' );
		$role->remove_cap( 'edit_site_messages' );
		$role->remove_cap( 'edit_others_site_messages' );
		$role->remove_cap( 'publish_site_message' );
		$role->remove_cap( 'read_private_site_message' );
		$role->remove_cap( 'manage_message_categories' );

		$role = get_role( 'editor' );
		$role->remove_cap( 'edit_site_message' );
		$role->remove_cap( 'read_site_message' );
		$role->remove_cap( 'delete_site_message' );
		$role->remove_cap( 'edit_site_messages' );
		$role->remove_cap( 'edit_others_site_messages' );
		$role->remove_cap( 'publish_site_message' );
		$role->remove_cap( 'read_private_site_message' );
		$role->remove_cap( 'manage_message_categories' );
	}
}
