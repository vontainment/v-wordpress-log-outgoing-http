<?php

/**
 * Plugin Name: Log External Connections
 * Description: Logs all external communications from WordPress to a file.
 * Version: 1.0
 * Author: Vontainment
 */

// Abort the execution if the Wordpress URL is not set
if (!defined('ABSPATH')) {
    exit;
}

function log_external_connections($args, $url)
{
    // Get the current date and time.
    $date = date('Y-m-d H:i:s');

    // Prepare the log entry.
    $log_entry = "{$date} - {$url}\n";

    // Append the log entry to the log file.
    file_put_contents(WP_CONTENT_DIR . '/connections.log', $log_entry, FILE_APPEND);

    // Return the unmodified request arguments.
    return $args;
}
add_filter('http_request_args', 'log_external_connections', 10, 2);
