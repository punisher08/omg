<?php
require_once( get_template_directory() . '/includes/Setup.php' );
new \OMG\Theme\Setup();

// remove_theme_support('widgets-block-editor');

// add_filter('gutenberg_use_widgets_block_editor', '__return_false');

// add_filter('use_widgets_block_editor', '__return_false');

if(!defined('NLR_BASE_DIR')){
    define('NLR_BASE_DIR', get_template_directory());
}

function enqueue_scss(){
    wp_enqueue_style('splide-styles','https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css', array(), false, 'all');
    wp_enqueue_script('splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), false, true);
    wp_enqueue_script('block-js', get_template_directory_uri() . '/templates/js/blocks.js', array('splide','jquery'), false, true);
    // blogs
    wp_enqueue_script('blog-js', get_template_directory_uri() . '/templates/js/blog.js', array('jquery'), false, true);

    wp_localize_script('blog-js', 'blog', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('blog-nonce')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_scss');
add_action('admin_enqueue_scripts', 'enqueue_scss');


/**
 * description: Use for main navigation menu
 */
require_once( NLR_BASE_DIR . '/includes/menu/menu-walker.php' );


function custom_breadcrumb_separator($this_options) {
    // Replace 'chevron-right.svg' with the path to your custom SVG file.
    $image = site_url() . '/wp-content/uploads/2024/07/chevron-right.svg';
    $this_options = '<img src="' . $image . '" alt="breadcrumb separator" />';
    return $this_options;
}
add_filter('wpseo_breadcrumb_separator', 'custom_breadcrumb_separator');
function custom_breadcrumb_items($breadcrumbs) {
    global $post;
    foreach ($breadcrumbs as $key => $breadcrumb) {
        if ($breadcrumb['text'] === 'Blog') {
            unset($breadcrumbs[$key]);
        }
    }
    switch ($post->post_type) {
        case 'services':
            $args = [
                'text' => 'Services',
                'url' => '/services'
            ];
            break;
        case 'post':
        case $post->ID == 87:
            $args = [
                'text' => 'Blog',
                'url' => '/blog'
            ];
            break;
        default:
            $args = [
                'text' => '',
                'url' => ''
            ];
            break;
    }
    
    $blog_page_id = get_option(87); 
    $blog_breadcrumb = array(
        'url' => $args['url'],
        'text' => $args['text'],
    );
    array_splice($breadcrumbs, 1, 0, array($blog_breadcrumb));
    $breadcrumbs = array_values($breadcrumbs);

    return $breadcrumbs;
}
add_filter('wpseo_breadcrumb_links', 'custom_breadcrumb_items');




/**
 * description: Blog Class
 */
require_once( NLR_BASE_DIR . '/includes/blog/Blog.php' );


/////////////////////////////////////////////////////////////////////////////////////////////////////
// WP Store Locator - Custom 
/////////////////////////////////////////////////////////////////////////////////////////////////////

add_filter( 'wpsl_meta_box_fields', 'custom_meta_box_fields' );

function custom_meta_box_fields( $meta_fields ) {
    
    $meta_fields[__( 'Schedule', 'wpsl' )] = array(
        'schedule' => array(
            'label' => __( 'Schedule', 'wpsl' )
        )
    );

    return $meta_fields;
}
add_filter( 'wpsl_frontend_meta_fields', 'custom_frontend_meta_fields' );

function custom_frontend_meta_fields( $store_fields ) {

    $store_fields['wpsl_schedule'] = array( 
        'name' => 'schedule',
        'type' => 'text'
    );

    return $store_fields;
}


// Hook to add custom fields
add_action('wp_nav_menu_item_custom_fields', 'custom_nav_menu_item_html_field', 10, 4);

function custom_nav_menu_item_html_field($item_id, $item, $depth, $args) {
    // Retrieve the existing value from the item's metadata
    $custom_html = get_post_meta($item_id, '_menu_item_custom_html', true);
    ?>
    <p class="description description-wide">
        <label for="edit-menu-item-custom-html-<?php echo esc_attr($item_id); ?>">
            <?php _e('Custom HTML'); ?><br>
            <textarea id="edit-menu-item-custom-html-<?php echo esc_attr($item_id); ?>" class="widefat" name="menu-item-custom-html[<?php echo esc_attr($item_id); ?>]"><?php echo esc_html($custom_html); ?></textarea>
        </label>
    </p>
    <?php
}


// Hook to save the custom fields
add_action('wp_update_nav_menu_item', 'save_custom_nav_menu_item_html_field', 10, 3);

function save_custom_nav_menu_item_html_field($menu_id, $menu_item_db_id, $args) {
    if (isset($_POST['menu-item-custom-html'][$menu_item_db_id])) {
        $custom_html = sanitize_text_field($_POST['menu-item-custom-html'][$menu_item_db_id]);
        update_post_meta($menu_item_db_id, '_menu_item_custom_html', $custom_html);
    } else {
        delete_post_meta($menu_item_db_id, '_menu_item_custom_html');
    }
}

add_action('acf/init', 'my_register_blocks');
function my_register_blocks() {

    // check function exists.
    if( function_exists('acf_register_block_type') ) {

        // register a subment block.
        acf_register_block_type(array(
            'name'              => 'submenu',
            'title'             => __('Submenu'),
            'description'       => __('A custom submenu block.'),
            'render_callback'   => 'submenu_block_render_callback',
            'category'          => 'widgets',
        ));
    }
}

/**
 * Submenu Block Callback Function.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
function submenu_block_render_callback( $block, $content = '', $is_preview = false, $post_id = 0, $wp_block = false, $context = false ) {

    // Create id attribute allowing for custom "anchor" value.
    $id = 'submenu-' . $block['id'];
    if( !empty($block['anchor']) ) {
        $id = $block['anchor'];
    }

    // Create class attribute allowing for custom "className" and "align" values.
    $className = 'submenu';
    if( !empty($block['className']) ) {
        $className .= ' ' . $block['className'];
    }
    ?>
    <div>
        <h2>Submenu</h2>
    </div>
    <?php
}


function display_page_content($atts) {
    $page = get_page($atts['id']);
    return apply_filters('the_content', $page->post_content);
}
add_shortcode('display_page_content', 'display_page_content');