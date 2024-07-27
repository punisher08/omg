<?php

namespace OMG\Theme\PostType;

use OMG\Theme\Core\PostType;

class Project extends PostType {

	protected function get_supported_features(): array {
		return [ 'title', 'editor', 'thumbnail' ];
	}

	protected function get_menu_icon(): string {
		return 'dashicons-portfolio';
	}
}

new Project( 'project', [ 'show_in_rest' => true ] );