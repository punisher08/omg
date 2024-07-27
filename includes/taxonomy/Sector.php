<?php

namespace OMG\Theme\taxonomy;

use OMG\Theme\Core\Taxonomy;

class Sector extends Taxonomy {

	protected function get_supported_post_types(): array {
		return [ 'project' ];
	}
}

new Sector( 'sector' );