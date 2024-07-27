<?php

namespace OMG\Theme\Core;

use OMG\Theme\Utility;

abstract class Taxonomy {

	protected $taxonomy;
	protected $post_types;
	protected $args;
	private $label;

	/**
	 * Constructor.
	 */
	public function __construct( $taxonomy, $args = [] ) {
		$this->taxonomy   = $taxonomy;
		$this->post_types = $this->get_supported_post_types();
		$this->args       = $args;
		$this->label      = ucwords( str_replace( '-', ' ', $this->taxonomy ) );
		add_action( 'init', [ $this, 'register_taxonomy' ] );
	}

	/**
	 * Register the custom taxonomy.
	 */
	public function register_taxonomy(): void {
		$default_labels = [
			'name'                       => Utility::pluralize( $this->label ),
			'singular_name'              => $this->label,
			'search_items'               => __( 'Search ' . Utility::pluralize( $this->label ), 'omgwp' ),
			'all_items'                  => __( 'All ' . Utility::pluralize( $this->label ), 'omgwp' ),
			'parent_item'                => __( 'Parent ' . $this->label, 'omgwp' ),
			'parent_item_colon'          => __( 'Parent ' . $this->label . ':', 'omgwp' ),
			'edit_item'                  => __( 'Edit ' . $this->label, 'omgwp' ),
			'update_item'                => __( 'Update ' . $this->label, 'omgwp' ),
			'add_new_item'               => __( 'Add New ' . $this->label, 'omgwp' ),
			'new_item_name'              => __( 'New ' . $this->label . ' Name', 'omgwp' ),
			'menu_name'                  => Utility::pluralize( $this->label ),
			'view_item'                  => __( 'View ' . $this->label, 'omgwp' ),
			'view_items'                 => __( 'View ' . Utility::pluralize( $this->label ), 'omgwp' ),
			'popular_items'              => __( 'Popular ' . Utility::pluralize( $this->label ), 'omgwp' ),
			'separate_items_with_commas' => __( 'Separate ' . Utility::pluralize( $this->label ) . ' with commas', 'omgwp' ),
			'add_or_remove_items'        => __( 'Add or remove ' . Utility::pluralize( $this->label ), 'omgwp' ),
			'choose_from_most_used'      => __( 'Choose from the most used ' . Utility::pluralize( $this->label ), 'omgwp' ),
			'not_found'                  => __( 'No ' . Utility::pluralize( $this->label ) . ' found', 'omgwp' ),
			'back_to_items'              => __( 'Back to ' . Utility::pluralize( $this->label ), 'omgwp' ),
		];

		$default_args = [
			'labels'            => $default_labels,
			'public'            => true,
			'show_ui'           => true,
			'show_in_nav_menus' => true,
			'show_admin_column' => true,
			'show_in_rest'      => true,
			'hierarchical'      => true,
			'rewrite'           => [ 'slug' => $this->taxonomy ],
		];

		$args = wp_parse_args( $this->args, $default_args );

		register_taxonomy( $this->taxonomy, $this->post_types, $args );
	}

	/**
	 * Get the supported post type.
	 *
	 * @return array The supported post types.
	 */
	abstract protected function get_supported_post_types(): array;
}
