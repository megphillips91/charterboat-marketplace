<?php
namespace CharterBoat_Marketplace;

add_shortcode('remote_boat_charter_listing', __NAMESPACE__.'\\get_remote_charters');

function get_remote_charters($atts){
    $atts = shortcode_atts(
        array(
            'domain' => 'https://phillipsboatworks.com/',
        ), $atts, 'remote_boat_charter_listing' );
    $url = $atts['domain'].'/wp-json/charter-bookings-pro/global_availability';
    $response = \wp_remote_get($url);
    $list_products = json_decode(\wp_remote_retrieve_body($response));
    //echo '<pre>'; var_dump($list_products); echo '</pre>';
    return $list_products->html;
}

add_shortcode('remote_boat_global_calendar', __NAMESPACE__.'\\get_global_calendar');

function get_global_calendar($atts){
    $atts = shortcode_atts(
        array(
            'domain' => 'https://phillipsboatworks.com/',
        ), $atts, 'remote_boat_charter_listing' );
    $url = $atts['domain'].'/wp-json/charter-bookings-pro/global_calendar';
    $response = \wp_remote_get($url);
    $calendar = json_decode(\wp_remote_retrieve_body($response));
    //echo '<pre>'; var_dump($calendar); echo '</pre>';
    return $calendar;
}

?>