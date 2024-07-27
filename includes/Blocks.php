<?php

namespace OMG\Theme;

class Blocks {
	private static $blocks_dir;

	public static function register_blocks() {
		self::define_blocks_dir();

		$block_folders = self::get_block_folders();

		foreach ( $block_folders as $block_folder ) {
			$block_path = self::$blocks_dir . '/' . $block_folder;
			if ( self::is_valid_block( $block_path ) ) {
				$block_data = self::get_block_data( $block_path );

				if ( $block_data ) {
					self::register_block( $block_path . '/block.json', $block_data );
				}
			}
		}
	}

	private static function define_blocks_dir() {
		if ( ! self::$blocks_dir ) {
			self::$blocks_dir = get_template_directory() . '/blocks';
		}
	}

	private static function get_block_folders() {
		return array_diff( scandir( self::$blocks_dir ), [ '..', '.' ] );
	}

	private static function is_valid_block( $block_path ) {
		return is_dir( $block_path ) && file_exists( $block_path . '/block.json' );
	}

	private static function get_block_data( $block_path ) {
		$block_json = file_get_contents( $block_path . '/block.json' );

		if ( $block_json ) {
			return json_decode( $block_json, true );
		}

		return null;
	}

	private static function register_block( $block_path, $block_data ) {
		if ( function_exists( 'register_block_type' ) ) {
			register_block_type( $block_path, $block_data );
		}
	}

	public static function register_block_categories( $block_categories, $editor_context ) {
		if ( ! empty( $editor_context->post ) ) {
			$block_categories[] = [
				'slug'  => 'omgwp',
				'title' => 'OMG Blocks',
				'icon'  => null,
			];
		}

		return $block_categories;
	}

	public static function register_block_pattern_category() {
		register_block_pattern_category( 'omg', [
			'label' => 'All Patterns'
		] );
		register_block_pattern_category( 'omg-banner', [
			'label' => 'Banner'
		] );
	}
}
