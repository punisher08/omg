<?php
/**
 * Contains all the methods for Blog
 */

class Blog {
    public function __construct() {
        // Constructor code here if needed
    }

    public function get_all($args = array(), $paged = 1,$filter = 'mostrecent'){
      
        $default_args = array(
            'post_type' => 'post',
            'posts_per_page' => 9,
            'paged' => $paged ,
        );

        switch( $filter ){
            case 'last7days':
                $date = "1 week ago";
                break;
            case 'lastmonth':
                $date = "1 month ago";
                break;
            default:
                $date = "1 year ago";
                break;
        }
        $default_args = array_merge($default_args, array(
            'date_query' => array(
                array(
                    'after' => $date
                )
            )
        ));
     
        $query_args = wp_parse_args($args, $default_args);
        $blogs = new WP_Query($query_args);
        return $blogs;
    }

    public function add_filter($args , $paged, $filter = 'mostrecent') {

        return $this->get_all($args , $paged, $filter);
    }
}
?>
