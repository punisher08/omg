<?php

class GF_Request_A_Quote {
    private $summary_data;
    private $request_a_quote_formid;
    private $inventory_calculator_formid;
    private $inventory_calculator_data;

    public function __construct() {
        $this->summary_data = array();
        $this->inventory_calculator_data = array();

        $this->request_a_quote_formid = 8;
        $this->inventory_calculator_formid = 11;

        add_filter( 'gform_pre_render', array( $this, 'set_form_title' ) );

        add_action( 'gform_post_process', array( $this, 'post_process_actions'), 10, 3 );
        add_action( 'gform_pre_render', array( $this, 'get_inventory_calculator_values' ), 10, 3 );

        add_shortcode( 'quote_summary', array( $this, 'quote_summary_shortcode' ) );
        add_shortcode( 'live_quote_summary', array( $this, 'live_quote_summary_shortcode' ) );
        add_shortcode( 'request_quote_thank_you', array( $this, 'request_quote_thank_you_shortcode' ) );

        add_filter( 'gform_form_post_get_meta_' . $this->request_a_quote_formid, array( $this, 'add_form_inventory_calculator' ) );
        add_filter( 'gform_form_update_meta_' . $this->request_a_quote_formid, array( $this, 'remove_form_inventory_calculator' ), 10, 3 );
    }

    public function enqueue_gravity_form_script() {
        wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/src/js/gravity-form.js', array( 'jquery' ), '1.0.0', true );
    }

    public function get_inventory_calculator_values( $form, $ajax, $field_values ) {
        $this->inventory_calculator_data['Bedroom'] = array(
            'Beds' => $_POST['input_3007'][0] ?? 0,
            'King Beds' => $_POST['input_3025'][0] ?? 0,
            'Queen Beds' => $_POST['input_3029'][0] ?? 0,
            'Double Beds' => $_POST['input_3030'][0] ?? 0,
            'Single Beds' => $_POST['input_3031'][0] ?? 0,
            'Side Tables' => $_POST['input_3032'][0] ?? 0,
            'Drawers' => $_POST['input_3033'][0] ?? 0,
            'Wardrobes' => $_POST['input_3034'][0] ?? 0,
            'Desks' => $_POST['input_3035'][0] ?? 0,
        );

        $this->inventory_calculator_data['Living Room'] = array(
            'Armchair' => $_POST['input_3011'][0] ?? 0,
            '2 Seater Couches' => $_POST['input_3026'][0] ?? 0,
            '3 Seater Couches' => $_POST['input_3036'][0] ?? 0,
            '4 Seater Couches' => $_POST['input_3038'][0] ?? 0,
            'TVs' => $_POST['input_3039'][0] ?? 0,
            'TVs (L)' => $_POST['input_3040'][0] ?? 0,
            'TV Stands' => $_POST['input_3041'][0] ?? 0,
            'Wall Units' => $_POST['input_3042'][0] ?? 0,
            'Coffee Tables' => $_POST['input_3043'][0] ?? 0,
        );

        $this->inventory_calculator_data['Dining Room'] = array(
            'Dining Table' => $_POST['input_3009'][0] ?? 0,
            'Chair' => $_POST['input_3027'][0] ?? 0,
            'Buffet' => $_POST['input_3044'][0] ?? 0,
            'Bar Stools' => $_POST['input_3045'][0] ?? 0,
            'Cabinets' => $_POST['input_3046'][0] ?? 0,
            'Shelves' => $_POST['input_3047'][0] ?? 0,
            'Chandeliers' => $_POST['input_3048'][0] ?? 0,
            'Dining Storage' => $_POST['input_3049'][0] ?? 0,
        );

        $this->inventory_calculator_data['Outdoor'] = array(
            'Wheel Barrows' => $_POST['input_3024'][0] ?? 0,
            'Lawn Mowers' => $_POST['input_3028'][0] ?? 0,
            'Outdoor Tables' => $_POST['input_3050'][0] ?? 0,
            'Outdoor Chairs' => $_POST['input_3051'][0] ?? 0,
            'Benches' => $_POST['input_3052'][0] ?? 0,
            'BBQ Machines' => $_POST['input_3053'][0] ?? 0,
            'Pot Plants (S)' => $_POST['input_3054'][0] ?? 0,
            'Pot Plants (L)' => $_POST['input_3055'][0] ?? 0,
        );

        $this->inventory_calculator_data['Electronics'] = array(
            'Computers' => $_POST['input_3059'][0] ?? 0,
            'Air Conditioners' => $_POST['input_3061'][0] ?? 0,
            'Heaters' => $_POST['input_3062'][0] ?? 0,
            'Electronics (S)' => $_POST['input_3063'][0] ?? 0,
            'Electronics (M)' => $_POST['input_3064'][0] ?? 0,
            'Electronics (L)' => $_POST['input_3065'][0] ?? 0,
        );

        $this->inventory_calculator_data['Kitchen'] = array(
            'Fridges (S)' => $_POST['input_3059'][0] ?? 0,
            'Fridges (M)' => $_POST['input_3061'][0] ?? 0,
            'Fridges (L)' => $_POST['input_3062'][0] ?? 0,
            'Microwaves' => $_POST['input_3063'][0] ?? 0,
            'Dish Washers' => $_POST['input_3064'][0] ?? 0,
            'Boxed Cutlery' => $_POST['input_3065'][0] ?? 0,
            'Boxed Tools' => $_POST['input_3065'][0] ?? 0,
        );

        $this->inventory_calculator_data['Laundry'] = array(
            'Washing Machines' => $_POST['input_3072'][0] ?? 0,
            'Dryers' => $_POST['input_3088'][0] ?? 0,
            'Ironing Boards' => $_POST['input_3089'][0] ?? 0,
            'Baskets' => $_POST['input_3090'][0] ?? 0,
            'Vacuums' => $_POST['input_3091'][0] ?? 0,
            'Sewing Machines' => $_POST['input_3092'][0] ?? 0,
            'Laundry Shelves' => $_POST['input_3093'][0] ?? 0,
        );

        $this->inventory_calculator_data['Nursery'] = array(
            'Bassinettes' => $_POST['input_3074'][0] ?? 0,
            'Prams' => $_POST['input_3094'][0] ?? 0,
            'Boxed Toys' => $_POST['input_3095'][0] ?? 0,
            'Boxed Baby Tools' => $_POST['input_3096'][0] ?? 0,
            'Baby Tables' => $_POST['input_3097'][0] ?? 0,
            'Baby Chairs' => $_POST['input_3098'][0] ?? 0,
        );

        $this->inventory_calculator_data['Sports Gear'] = array(
            'Bikes' => $_POST['input_3076'][0] ?? 0,
            'Golf Clubs' => $_POST['input_3099'][0] ?? 0,
            'Trampolines' => $_POST['input_3100'][0] ?? 0,
            'Camping Gears' => $_POST['input_3101'][0] ?? 0,
        );

        $this->inventory_calculator_data['Miscellaneous'] = array(
            'Luggages (S)' => $_POST['input_3078'][0] ?? 0,
            'Luggages (M)' => $_POST['input_3102'][0] ?? 0,
            'Luggages (L)' => $_POST['input_3103'][0] ?? 0,
            'Bins' => $_POST['input_3104'][0] ?? 0,
            'Pianos' => $_POST['input_3105'][0] ?? 0,
            'Mats/Rugs' => $_POST['input_3106'][0] ?? 0,
            'Boxes (S)' => $_POST['input_3107'][0] ?? 0,
            'Boxes (M)' => $_POST['input_3108'][0] ?? 0,
            'Boxes (L)' => $_POST['input_3109'][0] ?? 0,
        );

        return $form;
    }

    public function post_process_actions( $form, $page_number, $source_page_number ) {
        $this->summary_data['moving_from'] = rgpost( 'input_7' );
        $this->summary_data['moving_to'] = rgpost( 'input_8' );
        $this->summary_data['type_of_property'] = rgpost( 'input_9' );
        $this->summary_data['date_of_move'] = rgpost( 'input_10' );
        $this->summary_data['extra_service_packing'] = rgpost( 'input_12_1' );
        $this->summary_data['extra_service_unpacking'] = rgpost( 'input_12_2' );
        $this->summary_data['extra_service_storage'] = rgpost( 'input_12_3' );
        $this->summary_data['extra_service_site_visit'] = rgpost( 'input_12_4' );
        $this->summary_data['extra_service_cleaning'] = rgpost( 'input_12_5' );
        $this->summary_data['freight_calculation'] = rgpost( 'input_32' );
        $this->summary_data['amount_of_rooms'] = rgpost( 'input_18' );
        $this->summary_data['first_name'] = rgpost( 'input_26_3' );
        $this->summary_data['last_name'] = rgpost( 'input_26_6' );
        $this->summary_data['email'] = rgpost( 'input_27' );
        $this->summary_data['phone_number'] = rgpost( 'input_31' );
        $this->summary_data['message'] = rgpost( 'input_28' );

        return $this->summary_data;
    }

    function add_form_inventory_calculator( $form ) {
        return $this->add_form_repeater_fields( $form, $this->inventory_calculator_formid, 1000, 2, 'Inventory Calculator Form', 'Inventory Calculator Form', 'second_page_end' );
    }

    function remove_form_inventory_calculator( $form_meta, $form_id, $meta_name ) {
        return $this->remove_form_repeater_fields( $form_meta, $meta_name, 1000 );
    }

    function add_form_repeater_fields( $form, $source_form_id, $base_id, $page_number, $label, $add_button_text, $position ) {
        $repeater = GF_Fields::create(array(
            'type' => 'repeater',
            'description' => '',
            'id' => $base_id,
            'formId' => $form['id'],
            'label' => $label,
            'pageNumber' => $page_number,
        ));

        $source_form = GFAPI::get_form($source_form_id);
        if (!$source_form) {
            error_log("Error: Source form ID $source_form_id not found.");
            return $form;
        }

        foreach ($source_form['fields'] as $field) {
            $field->id = $field->id + $base_id;
            $field->formId = $form['id'];
            $field->pageNumber = $page_number;

            if (is_array($field->inputs)) {
                foreach ($field->inputs as &$input) {
                    $input['id'] = (string)($input['id'] + $base_id);
                }
            }
        }

        $repeater->fields = $source_form['fields'];

        if ($position === 'second_page_end') {
            $last_field_index = null;
            foreach ($form['fields'] as $index => $field) {
                if ($field->pageNumber == $page_number) {
                    $last_field_index = $index;
                }
            }

            if ($last_field_index !== null) {
                array_splice($form['fields'], $last_field_index + 1, 0, array($repeater));
                error_log("Repeater field added at the end of page number: $page_number");
            } else {
                $form['fields'][] = $repeater;
                error_log("Repeater field added at the end of the form.");
            }
        } else {
            $form['fields'][] = $repeater;
            error_log("Repeater field added at the end of the form.");
        }

        return $form;
    }

    function remove_form_repeater_fields( $form_meta, $meta_name, $base_id ) {
        if ( $meta_name == 'display_meta' ) {
            $form_meta['fields'] = wp_list_filter( $form_meta['fields'], array('id' => $base_id ), 'NOT' );
        }

        return $form_meta;
    }

    public function set_form_title( $form ) {
        $current_page = GFFormDisplay::get_current_page( 8 );
        $object = get_queried_object();
        $current_page_id = $object->ID;
        if( $current_page_id != 1180) :
          
            if ( in_array( $current_page, [ 1, 2, 3 ] ) ) {
                $form['title'] = 'Request a Quote';
            } else if ( $current_page === 4 ) {
                $form['title'] = 'Quote Summary';
            }

            return $form;
        endif;
        return $form;
    }

    public function quote_summary_shortcode() {
        $data = array(
            'summary_data' => $this->summary_data,
            'inventory_calculator' => $this->inventory_calculator_data,
        );

        ob_start();
        include( get_template_directory() . '/includes/gravity-form/templates/gf-quote-summary-template.php' );
        $output = ob_get_clean();

        return $output;
    }

    public function live_quote_summary_shortcode() {
        ob_start();
        include( get_template_directory() . '/includes/gravity-form/templates/gf-live-summary-template.php' );
        $output = ob_get_clean();

        return $output;
    }

    public function request_quote_thank_you_shortcode( $atts ) {
        $atts = shortcode_atts(
            array(
                'message' => 'Thanks for contacting us! We will get in touch with you shortly',
            ),
            $atts,
            'request_quote_thank_you'
        );

        ob_start();
        include( get_template_directory() . '/includes/gravity-form/templates/gf-thank-you-template.php' );
        $output = ob_get_clean();

        return $output;
    }
}

$gf_request_a_quote = new GF_Request_A_Quote();
