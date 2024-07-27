<?php

namespace OMG\Theme\PostType;

use OMG\Theme\Core\PostType;

class Testimonial extends PostType {

	protected function get_supported_features(): array {
		return [ 'title', 'editor' ];
	}

	protected function get_menu_icon(): string {
		return 'dashicons-testimonial';
	}
}

new Testimonial( 'testimonial', [
	'show_in_rest'       => false,
	'public'             => false,
	'publicly_queryable' => false,
] );