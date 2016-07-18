<?php
/**
 * Create the custom post type for the plugin
 *
 * @link       http://eztouse.com
 * @since      1.0.0
 *
 * @package    Site_Messages
 * @subpackage Site_Messages/includes
 */

/**
 * @package    Site_Messages
 * @subpackage Site_Messages/includes
 * @author     EZToUse.com <webservices@eztouse.com>
 */
class Site_Messages_Posttype {
	
	/**
	 * Initialize the class
	 *
	 * @since    1.0.0
	 */
	public function __construct() {

	}

	/**
	 * Register Custom Post Type
	 *
	 * @since    1.0.0
	 */
	public function register_post_type() {
		$labels = array(
			'name'                  => _x( 'Site Messages', 'Post Type General Name', 'ez-site-messages' ),
			'singular_name'         => _x( 'Site Message', 'Post Type Singular Name', 'ez-site-messages' ),
			'menu_name'             => __( 'Site Messages', 'ez-site-messages' ),
			'name_admin_bar'        => __( 'Site Message', 'ez-site-messages' ),
			'archives'              => __( 'Message Archives', 'ez-site-messages' ),
			'parent_item_colon'     => __( 'Parent Item:', 'ez-site-messages' ),
			'all_items'             => __( 'All Messages', 'ez-site-messages' ),
			'add_new_item'          => __( 'Add New Message', 'ez-site-messages' ),
			'add_new'               => __( 'Add New', 'ez-site-messages' ),
			'new_item'              => __( 'New Message', 'ez-site-messages' ),
			'edit_item'             => __( 'Edit Message', 'ez-site-messages' ),
			'update_item'           => __( 'Update Message', 'ez-site-messages' ),
			'view_item'             => __( 'View Message', 'ez-site-messages' ),
			'search_items'          => __( 'Search Messages', 'ez-site-messages' ),
			'not_found'             => __( 'Not found', 'ez-site-messages' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'ez-site-messages' ),
			'featured_image'        => __( 'Featured Image', 'ez-site-messages' ),
			'set_featured_image'    => __( 'Set featured image', 'ez-site-messages' ),
			'remove_featured_image' => __( 'Remove featured image', 'ez-site-messages' ),
			'use_featured_image'    => __( 'Use as featured image', 'ez-site-messages' ),
			'insert_into_item'      => __( 'Insert into item', 'ez-site-messages' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'ez-site-messages' ),
			'items_list'            => __( 'Items list', 'ez-site-messages' ),
			'items_list_navigation' => __( 'Items list navigation', 'ez-site-messages' ),
			'filter_items_list'     => __( 'Filter items list', 'ez-site-messages' ),
		);
		$capabilities = array(
			'edit_post'             => 'edit_site_message',
			'read_post'             => 'read_site_message',
			'delete_post'           => 'delete_site_message',
			'edit_posts'            => 'edit_site_messages',
			'edit_others_posts'     => 'edit_others_site_messages',
			'publish_posts'         => 'publish_site_message',
			'read_private_posts'    => 'read_private_site_message',
		);
		$args = array(
			'label'                 => __( 'Site Message', 'ez-site-messages' ),
			'description'           => __( 'Alerts and Other Messages', 'ez-site-messages' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'revisions', ),
			'taxonomies'            => array(  ),
			'hierarchical'          => false,
			'public'                => false,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 20,
			'menu_icon'             => 'dashicons-warning',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => false,
			'exclude_from_search'   => true,
			'publicly_queryable'    => true,
			'rewrite'               => false,
			'capabilities'          => $capabilities,
		);
		register_post_type( 'ez_site_message', $args );
	}

	public function register_taxonomy() {

		$labels = array(
			'name'                       => _x( 'Message Categories', 'Taxonomy General Name', 'ez-site-messages' ),
			'singular_name'              => _x( 'Message Category', 'Taxonomy Singular Name', 'ez-site-messages' ),
			'menu_name'                  => __( 'Message Category', 'ez-site-messages' ),
			'all_items'                  => __( 'All Categories', 'ez-site-messages' ),
			'parent_item'                => __( 'Parent Category', 'ez-site-messages' ),
			'parent_item_colon'          => __( 'Parent Category:', 'ez-site-messages' ),
			'new_item_name'              => __( 'New Category Name', 'ez-site-messages' ),
			'add_new_item'               => __( 'Add New Category', 'ez-site-messages' ),
			'edit_item'                  => __( 'Edit Category', 'ez-site-messages' ),
			'update_item'                => __( 'Update Category', 'ez-site-messages' ),
			'view_item'                  => __( 'View Category', 'ez-site-messages' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'ez-site-messages' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'ez-site-messages' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'ez-site-messages' ),
			'popular_items'              => __( 'Popular Categories', 'ez-site-messages' ),
			'search_items'               => __( 'Search Categories', 'ez-site-messages' ),
			'not_found'                  => __( 'Not Found', 'ez-site-messages' ),
			'no_terms'                   => __( 'No Categories', 'ez-site-messages' ),
			'items_list'                 => __( 'Category list', 'ez-site-messages' ),
			'items_list_navigation'      => __( 'Category list navigation', 'ez-site-messages' ),
		);
		$capabilities = array(
			'manage_terms'               => 'manage_message_categories',
			'edit_terms'                 => 'manage_message_categories',
			'delete_terms'               => 'manage_message_categories',
			'assign_terms'               => 'edit_site_message',
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => false,
			'publicly_queriable'         => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => false,
			'show_tagcloud'              => false,
			'rewrite'                    => false,
			'capabilities'               => $capabilities,
		);
		register_taxonomy( 'ez_message_category', array( 'ez_site_message' ), $args );

	}


	public function acf_field_group_setup() {

		if( function_exists('acf_add_local_field_group') ):

			acf_add_local_field_group(array (
				'key' => 'group_5786862176050',
				'title' => 'Message Schedule',
				'fields' => array (
					array (
						'key' => 'field_57868722073df',
						'label' => 'Activate Scheduler',
						'name' => 'activate_scheduler',
						'type' => 'true_false',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => 0,
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'message' => '',
						'default_value' => 0,
					),
					array (
						'key' => 'field_5786863b073dd',
						'label' => 'Start',
						'name' => 'start_datetime',
						'type' => 'date_time_picker',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_57868722073df',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'display_format' => 'm/d/Y g:i a',
						'return_format' => 'd/m/Y g:i a',
						'first_day' => 1,
					),
					array (
						'key' => 'field_57868709073de',
						'label' => 'Stop',
						'name' => 'stop_datetime',
						'type' => 'date_time_picker',
						'instructions' => '',
						'required' => 0,
						'conditional_logic' => array (
							array (
								array (
									'field' => 'field_57868722073df',
									'operator' => '==',
									'value' => '1',
								),
							),
						),
						'wrapper' => array (
							'width' => '',
							'class' => '',
							'id' => '',
						),
						'display_format' => 'm/d/Y g:i a',
						'return_format' => 'd/m/Y g:i a',
						'first_day' => 1,
					),
				),
				'location' => array (
					array (
						array (
							'param' => 'post_type',
							'operator' => '==',
							'value' => 'ez_site_message',
						),
					),
				),
				'menu_order' => 0,
				'position' => 'side',
				'style' => 'default',
				'label_placement' => 'top',
				'instruction_placement' => 'label',
				'hide_on_screen' => '',
				'active' => 1,
				'description' => '',
			));

		endif;
	}
}