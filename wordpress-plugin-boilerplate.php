<?php

/**
 * Plugin Name: WordPress Plugin Boilerplate
 * Description: A boilerplate for creating WordPress plugins.
 * Version: 1.0.0
 * Author: Henrik Urlund
 * Author URI: https://urlund.com
 * Text Domain: wp-plugin-boilerplate
 * Domain Path: /languages
 * License: MIT
 */

require_once __DIR__ . '/vendor/autoload.php';

use Urlund\WordPress\Feature;
use Urlund\WordPress\PluginBoilerplate\Plugin;
use Urlund\WordPress\Updater\GitHubPluginRepository;

$plugin_data = get_plugin_data(__FILE__, true, false);

define('WP_PLUGIN_BOILERPLATE_VERSION', $plugin_data['Version']);
define('WP_PLUGIN_BOILERPLATE_GITHUB_TOKEN', ''); // Should be a read-only token.

/**
 * Set up the plugin updater.
 * This is used to check for updates and download them.
 */
GitHubPluginRepository::getInstance(
    plugin_basename(__FILE__),
    'urlund/wordpress-plugin-boilerplate',
    [
        'auth' => WP_PLUGIN_BOILERPLATE_GITHUB_TOKEN ?: null,
    ]
);

/**
 * Bootstrap the plugin.
 * This is used to add the plugin to the WordPress dashboard.
 */
Feature::bootstrap([
    Plugin::class,
]);
