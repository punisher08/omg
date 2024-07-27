<?php

namespace OMG\Theme\Core;

use OMG\Theme\Utility;

abstract class PostType {

	protected $post_type;
	protected $args;
	private $label;

	/**
	 * Constructor.
	 */
	public function __construct( $post_type, $args = [] ) {
		$this->post_type = $post_type;
		$this->args      = $args;
		$this->label     = ucwords( str_replace( '-', ' ', $this->post_type ) );
		add_action( 'init', [ $this, 'register_post_type' ] );
	}

	/**
	 * Register the custom post type.
	 */
	public function register_post_type(): void {
		$labels = [
			'name'                  => Utility::pluralize( $this->label ),
			'singular_name'         => $this->label,
			'menu_name'             => Utility::pluralize( $this->label ),
			'name_admin_bar'        => $this->label,
			'all_items'             => 'All ' . Utility::pluralize( $this->label ),
			'add_new'               => __( 'Add New', 'omgwp' ),
			'add_new_item'          => __( 'Add New ' . $this->label, 'omgwp' ),
			'edit_item'             => __( 'Edit ' . $this->label, 'omgwp' ),
			'new_item'              => __( 'New ' . $this->label, 'omgwp' ),
			'view_item'             => __( 'View ' . $this->label, 'omgwp' ),
			'view_items'            => __( 'View ' . Utility::pluralize( $this->label ), 'omgwp' ),
			'search_items'          => __( 'Search ' . Utility::pluralize( $this->label ), 'omgwp' ),
			'not_found'             => __( 'No ' . Utility::pluralize( $this->label ) . ' found', 'omgwp' ),
			'not_found_in_trash'    => __( 'No ' . Utility::pluralize( $this->label ) . ' found in trash' ),
			'parent_item_colon'     => __( 'Parent ' . $this->label . ':', 'omgwp' ),
			'featured_image'        => __( 'Featured image for ' . $this->label, 'omgwp' ),
			'set_featured_image'    => __( 'Set featured image for ' . $this->label, 'omgwp' ),
			'remove_featured_image' => __( 'Remove featured image for ' . $this->label, 'omgwp' ),
			'use_featured_image'    => __( 'Use as featured image for ' . $this->label, 'omgwp' ),
			'archives'              => __( Utility::pluralize( $this->label ) . ' archives', 'omgwp' ),
			'insert_into_item'      => __( 'Insert into ' . $this->label, 'omgwp' ),
			'uploaded_to_this_item' => __( 'Uploaded to this ' . $this->label, 'omgwp' ),
			'filter_items_list'     => __( 'Filter ' . Utility::pluralize( $this->label ) . ' list', 'omgwp' ),
			'items_list_navigation' => __( Utility::pluralize( $this->label ) . ' list navigation', 'omgwp' ),
			'items_list'            => __( Utility::pluralize( $this->label ) . ' list', 'omgwp' )
		];


		$default_args = [
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'capability_type'    => 'post',
			'has_archive'        => true,
			'show_in_rest'       => false,
			'menu_position'      => 5,
			'rewrite'            => [ 'slug' => $this->post_type ],
			'menu_icon'          => $this->get_menu_icon(),
			'supports'           => $this->get_supported_features(),
		];

		$args = wp_parse_args( $this->args, $default_args );

		register_post_type( $this->post_type, $args );
	}

	/**
	 * Get the supported features for this post type.
	 *
	 * @return array The supported features.
	 */
	abstract protected function get_supported_features(): array;

	/**
	 * Get the dashicon for this post type.
	 *
	 * @return string dashicon
	 */
	abstract protected function get_menu_icon(): string;
}