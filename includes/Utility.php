<?php

namespace OMG\Theme;

class Utility {
	public static function getUri() {
		$url = $_SERVER['REQUEST_URI'];

		return parse_url( $url );
	}

	public static function getUriParts( $path ) {
		return explode( '/', $path );
	}

	public static function getLastSegmentOfUrl( $url ) {
		$segments = explode( '/', $url );
		$segments = array_filter( $segments );

		return $segments[ count( $segments ) - 1 ];
	}

	public static function getUrl() {
		$url = @( $_SERVER["HTTPS"] != 'on' ) ? 'http://' . $_SERVER["SERVER_NAME"] : 'https://' . $_SERVER["SERVER_NAME"];
		$url .= $_SERVER["REQUEST_URI"];

		return $url;
	}

	public static function truncate( $string, $length = 100, $append = "&hellip;" ) {
		$string = trim( strip_tags( $string ) );
		if ( strlen( $string ) > $length ) {
			$string = substr( $string, 0, $length );;
			$string .= $append;
		}

		return $string;
	}

	public static function removeBadFormatting( $content ) {
		return str_replace( [
			'&lt;',
			'&gt;',
			'<p>&nbsp;</p>',
			'<div>&nbsp;</div>',
			'<div>',
			'</div>'
		], [ '<', '>', '', '', '', '' ], $content );
	}

	public static function includeToVar( $file, $data = [] ) {
		ob_start();
		include( $file );

		return ob_get_clean();
	}

	public static function acfResponsiveImages( $image_id, $image_size, $max_width ) {
		// check the image ID is not blank
		if ( $image_id != '' ) {
			// set the default src image size
			$image_src = wp_get_attachment_image_url( $image_id, $image_size );

			// set the srcset with various image sizes
			$image_srcset = wp_get_attachment_image_srcset( $image_id, $image_size );

			// generate the markup for the responsive image
			return '<img class="" src="' . $image_src . '" srcset="' . $image_srcset . '" sizes="(max-width: ' . $max_width . ') 100vw, ' . $max_width . '">';
		}
	}

	public static function acf_image_url( $image_id, $image_size, $max_width ) {
		if ( $image_id != '' ) {
			// set the default src image size
			return wp_get_attachment_image_url( $image_id, $image_size );
		}
	}

	public static function dump( $data ) {

		$css = [
			'background: #FFFFE1',
			'font-size: 12px',
			'line-height: 1.6em',
			'font-family: Courier New',
			'padding: 5px',
			'border: 6px solid black',
			'text-align: left',
			'width:100%',
		];

		$style = implode( ';', $css );

		echo '<pre style="' . $style . '">';
		foreach ( func_get_args() as $arg ) {
			if ( is_string( $arg ) ) {
				echo htmlentities( $arg );
				echo '<br />';
			} else {
				var_dump( $arg );
			}
		}
		echo debug_backtrace();
		echo '</pre>';
	}

	public static function pluralize( $word, $count = 2 ) {
		if ( $count == 1 ) {
			return $word;
		}

		if ( substr( $word, - 1 ) == 'y' ) {
			return substr( $word, 0, - 1 ) . 'ies';
		}

		return $word . 's';
	}

	public static function generate_pagination_links() {
		global $wp_query;

		$big = 999999999; // need an unlikely integer

		$pagination_links = paginate_links( [
			'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'    => '?paged=%#%',
			'current'   => max( 1, get_query_var( 'paged' ) ),
			'total'     => $wp_query->max_num_pages,
			'type'      => 'array',
			'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
			'next_text' => '<i class="fa-solid fa-angle-right"></i>',
			'callback'  => function ( $link, $page ) {
				return str_replace( '<a', '<a data-page="' . $page . '"', $link );
			},
		] );

		if ( $pagination_links ) {
			$output = '<ul class="pagination__list">';
			foreach ( $pagination_links as $link ) {

				if ( strpos( $link, '<a class="page-numbers"' ) !== false ) {
					// Extract the page number from the anchor tag using regular expression
					preg_match( '/<a class="page-numbers" href="[^"]*\/(\d+)\/">(\d+)<\/a>/', $link, $matches );

					// Check if the regular expression matched and we have a valid page number
					if ( isset( $matches[1] ) ) {
						$pageNumber = $matches[1];

						// Append the data-page attribute with the page number
						$link = preg_replace(
							'/<a class="page-numbers"/',
							'<a class="page-numbers" data-page="' . $pageNumber . '"',
							$link
						);
					}
				}

				$output .= '<li class="pagination__page-item">';
				$output .= str_replace( 'page-numbers', 'pagination__page-link page-numbers', $link );
				$output .= '</li>';
			}
			$output .= '</ul>';

			return $output;
		}

		return '';
	}
}