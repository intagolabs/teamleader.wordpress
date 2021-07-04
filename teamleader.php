<?php

/*
Plugin Name: Teamleader Invoices
Plugin URI: https://focus.teamleader.eu
Description: Create invoices for WooCommerce Orders.
Version: 0.1
Author: Intago
Author URI: https://www.intago.eu
Text Domain: intago-teamleader
*/


if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Require helper files
require_once plugin_dir_path(__FILE__) . 'includes/logging.php';
require_once plugin_dir_path(__FILE__) . 'includes/core.php';
require_once plugin_dir_path(__FILE__) . 'includes/api.php';
require_once plugin_dir_path(__FILE__) . 'includes/update.php';
require_once plugin_dir_path(__FILE__) . "includes/Parsedown.php";

if (is_admin()) {
    new IntagoTeamleaderPluginUpdater(__FILE__, 'intagolabs', "teamleader.wordpress", "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");
}

// Create Invoice After Order Completed
function teamleader_invoice($order_id)
{
    write_log('Start creating invoice for order with id: ' . $order_id);
    $client_id = teamleader_create_client($order_id);
    write_log('client_id: ' . $client_id);
    $invoice_number = teamleader_create_invoice($client_id, $order_id);
    write_log('invoice_number: ' . $invoice_number);
}

add_action('woocommerce_order_status_completed', 'teamleader_invoice',  1, 1);
//for testing without paying use woocommerce_checkout_order_processed as hook
