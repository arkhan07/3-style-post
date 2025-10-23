<?php
/**
 * Uninstall Script
 * Runs when plugin is deleted
 */

// Exit if accessed directly or not uninstalling
if (!defined('WP_UNINSTALL_PLUGIN')) {
    exit;
}

// Clean up options if any (currently we don't use any)
// delete_option('post_slider_settings');

// Clean up any transients
// delete_transient('post_slider_cache');

// That's it! Plugin is clean.
