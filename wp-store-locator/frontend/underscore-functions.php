<?php
/**
 * Create the store data templates.
 * 
 * The templates are created in JS with _.template, see http://underscorejs.org/#template
 * 
 * @since 2.0.0
 * @param string $template The type of template we need to create
 * @return void
 */
function wpsl_create_underscore_templates( $template ) {

    global $wpsl_settings, $wpsl;
   
    $locationSvg = '
<svg class="location-icon" width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<g id="marker-pin-02">
<g id="Icon">
<path d="M12.5 12.5C14.1569 12.5 15.5 11.1569 15.5 9.5C15.5 7.84315 14.1569 6.5 12.5 6.5C10.8431 6.5 9.5 7.84315 9.5 9.5C9.5 11.1569 10.8431 12.5 12.5 12.5Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M12.5 22C14.5 18 20.5 15.4183 20.5 10C20.5 5.58172 16.9183 2 12.5 2C8.08172 2 4.5 5.58172 4.5 10C4.5 15.4183 10.5 18 12.5 22Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</g>
</g>
</svg>
';
    $phoneSvg = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
    <path d="M28 21.8933V26.608C28.0002 26.9456 27.8723 27.2706 27.6421 27.5176C27.412 27.7646 27.0967 27.915 26.76 27.9387C26.1773 27.9787 25.7013 28 25.3333 28C13.5507 28 4 18.4493 4 6.66667C4 6.29867 4.02 5.82267 4.06133 5.24C4.08496 4.90326 4.23544 4.58801 4.4824 4.35788C4.72937 4.12774 5.05443 3.99985 5.392 4H10.1067C10.2721 3.99983 10.4316 4.06115 10.5543 4.17203C10.677 4.28291 10.7541 4.43544 10.7707 4.6C10.8013 4.90667 10.8293 5.15067 10.856 5.336C11.121 7.18523 11.664 8.98378 12.4667 10.6707C12.5933 10.9373 12.5107 11.256 12.2707 11.4267L9.39333 13.4827C11.1526 17.5819 14.4194 20.8487 18.5187 22.608L20.572 19.736C20.6559 19.6187 20.7784 19.5345 20.918 19.4982C21.0576 19.4619 21.2055 19.4757 21.336 19.5373C23.0227 20.3386 24.8208 20.8802 26.6693 21.144C26.8547 21.1707 27.0987 21.1987 27.4027 21.2293C27.567 21.2462 27.7192 21.3234 27.8298 21.4461C27.9404 21.5688 28.0002 21.7282 28 21.8933Z" fill="#D61D2D"/>
    </svg>';
    $timeIcon = '<svg xmlns="http://www.w3.org/2000/svg" width="32" height="33" viewBox="0 0 32 33" fill="none">
    <path d="M16.0003 2.99988C14.2494 2.99988 12.5156 3.34475 10.8979 4.01482C9.2802 4.68488 7.81035 5.66701 6.57223 6.90512C4.07175 9.40561 2.66699 12.797 2.66699 16.3332C2.66699 19.8694 4.07175 23.2608 6.57223 25.7613C7.81035 26.9994 9.2802 27.9815 10.8979 28.6516C12.5156 29.3217 14.2494 29.6665 16.0003 29.6665C19.5365 29.6665 22.9279 28.2618 25.4284 25.7613C27.9289 23.2608 29.3337 19.8694 29.3337 16.3332C29.3337 14.5823 28.9888 12.8484 28.3187 11.2308C27.6487 9.61309 26.6665 8.14324 25.4284 6.90512C24.1903 5.66701 22.7204 4.68488 21.1028 4.01482C19.4851 3.34475 17.7513 2.99988 16.0003 2.99988ZM21.6003 21.9332L14.667 17.6665V9.66654H16.667V16.5999L22.667 20.1999L21.6003 21.9332Z" fill="#D61D2D"/>
    </svg>';


    if ( $template == 'wpsl_store_locator' ) {
    ?>
<script id="wpsl-info-window-template" type="text/template">
    <?php
        $info_window_template = '<div data-store-id="<%= id %>" class="wpsl-info-window">' . "\r\n";
        $info_window_template .= "\t\t" . '<p>' . "\r\n";
        $info_window_template .= "\t\t\t" .  wpsl_store_header_template() . "\r\n";  // Check which header format we use
        $info_window_template .= "\t\t\t" . '<span><%= address %></span>' . "\r\n";
        $info_window_template .= "\t\t\t" . '<% if ( address2 ) { %>' . "\r\n";
        $info_window_template .= "\t\t\t" . '<span><%= address2 %></span>' . "\r\n";
        $info_window_template .= "\t\t\t" . '<% } %>' . "\r\n";
        $info_window_template .= "\t\t\t" . '<span>' . wpsl_address_format_placeholders() . '</span>' . "\r\n"; // Use the correct address format
        $info_window_template .= "\t\t" . '</p>' . "\r\n";
        $info_window_template .= "\t\t" . '<% if ( phone ) { %>' . "\r\n";
        $info_window_template .= "\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'phone_label', __( 'Phone', 'wpsl' ) ) ) . '</strong>: <%= formatPhoneNumber( phone ) %></span>' . "\r\n";
        $info_window_template .= "\t\t" . '<% } %>' . "\r\n";
        $info_window_template .= "\t\t" . '<% if ( fax ) { %>' . "\r\n";
        $info_window_template .= "\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'fax_label', __( 'Fax', 'wpsl' ) ) ) . '</strong>: <%= fax %></span>' . "\r\n";
        $info_window_template .= "\t\t" . '<% } %>' . "\r\n";
        $info_window_template .= "\t\t" . '<% if ( email ) { %>' . "\r\n";
        $info_window_template .= "\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'email_label', __( 'Email', 'wpsl' ) ) ) . '</strong>: <%= formatEmail( email ) %></span>' . "\r\n";
        $info_window_template .= "\t\t" . '<% } %>' . "\r\n";
        $info_window_template .= "\t\t" . '<%= createInfoWindowActions( id ) %>' . "\r\n";
        $info_window_template .= "\t" . '</div>';

        echo apply_filters( 'wpsl_info_window_template', $info_window_template . "\n" );
    ?>
</script>

<script id="wpsl-listing-template" type="text/template">
    <?php
        $listing_template = '<li data-store-id="<%= id %>">' . "\r\n";
        $listing_template .= "\t\t" . '<div class="wpsl-store-location">' . "\r\n";
        $listing_template .= "\t\t\t" . '<div class="store-address-container"><div class="icon">'.$locationSvg.'</div><div class="store-data"><p class="_content"><%= thumb %>' . "\r\n";
        $listing_template .= "\t\t\t\t" . '<span class="store-title">'.wpsl_store_header_template( 'listing' ) . '</span>'. "\r\n"; // Check which header format we use
        
        $listing_template .= "\t\t\t\t" . '<span class="wpsl-hours">';
    
     
        $listing_template .= "\t\t\t\t" . '<div class="wpsl-store-hours"><strong>';
        
     
        $listing_template .= "\t\t\t\t" . '<p><%= schedule  %></p>' . "\r\n";
 
        $listing_template .= '</strong></div>' . "\r\n";

        
        
        $listing_template .=  "\t\t\t\t". '</span>' . "\r\n";
        $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><%= address %></span>' . "\r\n";
        $listing_template .= "\t\t\t\t" . '<% if ( address2 ) { %>' . "\r\n";
        $listing_template .= "\t\t\t\t" . '<span class="wpsl-street"><%= address2 %></span>' . "\r\n";
        $listing_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
        $listing_template .= "\t\t\t\t" . '<span>' . wpsl_address_format_placeholders() . '</span>' . "\r\n"; // Use the correct address format

        if ( !$wpsl_settings['hide_country'] ) {
            $listing_template .= "\t\t\t\t" . '<span class="wpsl-country"><%= country %></span>' . "\r\n";
        }
        
        $listing_template .= "\t\t\t" . '</p>' . "\r\n";
        
        // Show the phone, fax or email data if they exist.
        if ( $wpsl_settings['show_contact_details'] ) {
            $listing_template .= "\t\t\t" . '<p class="wpsl-contact-details">' . "\r\n";
            $listing_template .= "\t\t\t" . '<% if ( phone ) { %>' . "\r\n";
            $listing_template .= "\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'phone_label', __( 'Phone', 'wpsl' ) ) ) . '</strong>: <%= formatPhoneNumber( phone ) %></span>' . "\r\n";
            $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
            $listing_template .= "\t\t\t" . '<% if ( fax ) { %>' . "\r\n";
            $listing_template .= "\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'fax_label', __( 'Fax', 'wpsl' ) ) ) . '</strong>: <%= fax %></span>' . "\r\n";
            $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
            $listing_template .= "\t\t\t" . '<% if ( email ) { %>' . "\r\n";
            $listing_template .= "\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'email_label', __( 'Email', 'wpsl' ) ) ) . '</strong>: <%= formatEmail( email ) %></span>' . "\r\n";
            $listing_template .= "\t\t\t" . '<% } %>' . "\r\n";
            $listing_template .= "\t\t\t" . '</p>' . "\r\n";
        }
        
        $listing_template .= "\t\t\t" . wpsl_more_info_template() . "\r\n"; // Check if we need to show the 'More Info' link and info
        $listing_template .= "\t\t" . '' . "\r\n";
        $listing_template .= "\t\t" . '<div class="wpsl-direction-wrap">' . "\r\n";
        
        if ( !$wpsl_settings['hide_distance'] ) {
            $listing_template .= "\t\t\t" . '<%= distance %> ' . esc_html( wpsl_get_distance_unit() ) . '' . "\r\n";
        }
        
        $listing_template .= "\t\t\t" . '<%= createDirectionUrl() %>' . "\r\n"; 
        $listing_template .= "\t\t" . '</div></div>' . "\r\n";
        $listing_template .= "\t" . '</li>';

        echo apply_filters( 'wpsl_listing_template', $listing_template . "\n" );
    ?>
</script>
    <?php
    } else {
    ?>
<script id="wpsl-cpt-info-window-template" type="text/template">
    <?php
        $cpt_info_window_template = '<div class="wpsl-info-window">' . "\r\n";
        $cpt_info_window_template .= "\t\t" . '<p class="wpsl-no-margin">' . "\r\n";
        $cpt_info_window_template .= "\t\t\t" .  wpsl_store_header_template( 'wpsl_map' ) . "\r\n";
        $cpt_info_window_template .= "\t\t\t" . '<span><%= address %></span>' . "\r\n";
        $cpt_info_window_template .= "\t\t\t" . '<% if ( address2 ) { %>' . "\r\n";
        $cpt_info_window_template .= "\t\t\t" . '<span><%= address2 %></span>' . "\r\n";
        $cpt_info_window_template .= "\t\t\t" . '<% } %>' . "\r\n";
        $cpt_info_window_template .= "\t\t\t" . '<span>' . wpsl_address_format_placeholders() . '</span>' . "\r\n"; // Use the correct address format 
        
        if ( !$wpsl_settings['hide_country'] ) {
            $cpt_info_window_template .= "\t\t\t" . '<span class="wpsl-country"><%= country %></span>' . "\r\n"; 
        }
        
        $cpt_info_window_template .= "\t\t" . '</p>' . "\r\n";
        $cpt_info_window_template .= "\t" . '</div>';

        echo apply_filters( 'wpsl_cpt_info_window_template', $cpt_info_window_template . "\n" );
    ?>
</script>
    <?php
    }
}

/**
 * Create the more info template.
 *
 * @since 2.0.0
 * @return string $more_info_template The template that is used to show the "More info" content
 */
function wpsl_more_info_template() {
            
    global $wpsl_settings, $wpsl;

    if ( $wpsl_settings['more_info'] ) {
        $more_info_url = '#';

        if ( $wpsl_settings['template_id'] == 'default' && $wpsl_settings['more_info_location'] == 'info window' ) {
            $more_info_url = '#wpsl-search-wrap';
        }

        if ( $wpsl_settings['more_info_location'] == 'store listings' ) {
            $more_info_template = '<% if ( !_.isEmpty( phone ) || !_.isEmpty( fax ) || !_.isEmpty( email ) ) { %>' . "\r\n";
            $more_info_template .= "\t\t\t" . '<p><a class="wpsl-store-details wpsl-store-listing" href="#wpsl-id-<%= id %>">' . esc_html( $wpsl->i18n->get_translation( 'more_label', __( 'More info', 'wpsl' ) ) ) . '</a></p>' . "\r\n";
            $more_info_template .= "\t\t\t" . '<div id="wpsl-id-<%= id %>" class="wpsl-more-info-listings">' . "\r\n";
            $more_info_template .= "\t\t\t\t" . '<% if ( description ) { %>' . "\r\n";
            $more_info_template .= "\t\t\t\t" . '<%= description %>' . "\r\n";
            $more_info_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
            
            if ( !$wpsl_settings['show_contact_details'] ) {
                $more_info_template .= "\t\t\t\t" . '<p>' . "\r\n";
                $more_info_template .= "\t\t\t\t" . '<% if ( phone ) { %>' . "\r\n";
                $more_info_template .= "\t\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'phone_label', __( 'Phone', 'wpsl' ) ) ) . '</strong>: <%= formatPhoneNumber( phone ) %></span>' . "\r\n";
                $more_info_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
                $more_info_template .= "\t\t\t\t" . '<% if ( fax ) { %>' . "\r\n";
                $more_info_template .= "\t\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'fax_label', __( 'Fax', 'wpsl' ) ) ) . '</strong>: <%= fax %></span>' . "\r\n";
                $more_info_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
                $more_info_template .= "\t\t\t\t" . '<% if ( email ) { %>' . "\r\n";
                $more_info_template .= "\t\t\t\t" . '<span><strong>' . esc_html( $wpsl->i18n->get_translation( 'email_label', __( 'Email', 'wpsl' ) ) ) . '</strong>: <%= formatEmail( email ) %></span>' . "\r\n";
                $more_info_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
                $more_info_template .= "\t\t\t\t" . '</p>' . "\r\n";
            }

            if ( !$wpsl_settings['hide_hours'] ) {
                $more_info_template .= "\t\t\t\t" . '<% if ( hours ) { %>' . "\r\n";
                $more_info_template .= "\t\t\t\t" . '<div class="wpsl-store-hours"><strong>' . esc_html( $wpsl->i18n->get_translation( 'hours_label', __( 'Hours', 'wpsl' ) ) ) . '</strong><%= hours %></div>' . "\r\n";
                $more_info_template .= "\t\t\t\t" . '<% } %>' . "\r\n";
            }

            $more_info_template .= "\t\t\t" . '</div>' . "\r\n"; 
            $more_info_template .= "\t\t\t" . '<% } %>';

        } else {
            $more_info_template = '<p><a class="wpsl-store-details" href="' . $more_info_url . '">' . esc_html( $wpsl->i18n->get_translation( 'more_label', __( 'More info', 'wpsl' ) ) ) . '</a></p>';
        }

        return apply_filters( 'wpsl_more_info_template', $more_info_template );
    }                 
}

/**
 * Create the store header template.
 *
 * @since 2.0.0
 * @param  string $location        The location where the header is shown ( info_window / listing / wpsl_map shortcode )
 * @return string $header_template The template for the store header
 */
function wpsl_store_header_template( $location = 'info_window' ) {

    global $wpsl_settings;

    if ( $wpsl_settings['new_window'] ) {
        $new_window = ' target="_blank"';
    } else {
        $new_window = '';
    }

    /* 
     * To keep the code readable in the HTML source we ( unfortunately ) need to adjust the 
     * amount of tabs in front of it based on the location were it is shown. 
     */
    if ( $location == 'listing') {
        $tab = "\t\t\t\t";    
    } else {
        $tab = "\t\t\t";                 
    }

    if ( $wpsl_settings['permalinks'] ) {
        
        /**
         * It's possible the permalinks are enabled, but not included in the location data on 
         * pages where the [wpsl_map] shortcode is used. 
         * 
         * So we need to check for undefined, which isn't necessary in all other cases.
         */
        if ( $location == 'wpsl_map') {
            $header_template = '<% if ( typeof permalink !== "undefined" ) { %>' . "\r\n";
            $header_template .= $tab . '<strong><a' . $new_window . ' href="<%= permalink %>"><%= store %></a></strong>' . "\r\n";
            $header_template .= $tab . '<% } else { %>' . "\r\n";
            $header_template .= $tab . '<strong><%= store %></strong>' . "\r\n";
            $header_template .= $tab . '<% } %>';   
        } else {
            $header_template = '<strong><a' . $new_window . ' href="<%= permalink %>"><%= store %></a></strong>';
        }
    } else {
        $header_template = '<% if ( wpslSettings.storeUrl == 1 && url ) { %>' . "\r\n";
        $header_template .= $tab . '<strong><a' . $new_window . ' href="<%= url %>"><%= store %></a></strong>' . "\r\n";
        $header_template .= $tab . '<% } else { %>' . "\r\n";
        $header_template .= $tab . '<strong><%= store %></strong>' . "\r\n";
        $header_template .= $tab . '<% } %>'; 
    }

    return apply_filters( 'wpsl_store_header_template', $header_template );
}

/**
 * Create the address placeholders based on the structure defined on the settings page.
 * 
 * @since 2.0.0
 * @return string $address_placeholders A list of address placeholders in the correct order
 */
function wpsl_address_format_placeholders() {

    global $wpsl_settings;

    $address_format = explode( '_', $wpsl_settings['address_format'] );
    $placeholders   = '';
    $part_count     = count( $address_format ) - 1;
    $i              = 0;

    foreach ( $address_format as $address_part ) {
        if ( $address_part != 'comma' ) {

            /* 
             * Don't add a space after the placeholder if the next part 
             * is going to be a comma or if it is the last part. 
             */
            if ( $i == $part_count || $address_format[$i + 1] == 'comma' ) {
                $space = '';    
            } else {
                $space = ' ';      
            }

            $placeholders .= '<%= ' . $address_part . ' %>' . $space;
        } else {
            $placeholders .= ', ';
        }

        $i++;
    }

    return $placeholders;
}