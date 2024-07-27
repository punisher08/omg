<?php
/**
 * Custom Walker to add a sub-menu class.
 */
class Submenu_Check_Walker extends Walker_Nav_Menu {

    // Add sub-menu class to the list of sub-menus and wrap in submenu-container
    function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $class_names = 'sub-menu-lists parent-menu-lists';

        $output .= "\n$indent<div class=\"submenu-container\">\n";
        $output .= "$indent<div class=\"sub-menu\">\n";
        $output .= "$indent<div class=\"_menu_header\">\n";
        $output .= '<div class="title">Services</div>';
        $output .= '<div class="text">We offer a wide range of services to help you get the most out of your website.</div>';
        $output .= "$indent</div>\n";
        $output .= "$indent<div class=\"submenu-groups\">\n";
        $output .= "$indent<div class=\"column-one columns\">\n";
        $output .= "$indent<ul class=\"$class_names\">\n";
    }

    // Close the sub-menu structure
    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
        $output .= "$indent</div>\n";
        $output .= "$indent</div>\n";
        $output .= "$indent</div>\n";
        $output .= "$indent</div>\n";
    }

    function display_element($element, &$children_elements, $max_depth, $depth = 0, $args = array(), &$output) {
        $id_field = $this->db_fields['id'];

        if (isset($children_elements[$element->$id_field])) {
            $element->has_children = true;
        }

        parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }

    // Add custom HTML after the menu item title
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="flex-group  ' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
        $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
        $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
        $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        // Add custom HTML after the menu item title
        $custom_html = get_post_meta($item->ID, '_menu_item_custom_html', true);
        if (!empty($custom_html)) {
            $item_output .= '<div class="custom-html">' . $custom_html . '</div>';
        }

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}


