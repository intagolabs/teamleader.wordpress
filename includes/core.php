<?php

// Register the administrator settings page

function teamleader_add_admin_settings()
{
    add_menu_page('Teamleader Invoices', 'Teamleader Invoices', 'manage_options', 'teamleader', 'teamleader_admin_settings', 'dashicons-editor-code');
    add_action('admin_init', 'teamleader_update_admin_settings');
}

add_action('admin_menu', 'teamleader_add_admin_settings');

// Show the administrator settings page
function sereni_admin_settings()
{
    include plugin_dir_path(__FILE__) . 'settings.php';
}

// Register the administrator settings
function teamleader_update_admin_settings()
{
    register_setting('teamleader_settings', 'teamleader_connect_endpoint');
}