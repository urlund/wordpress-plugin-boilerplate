<?php

namespace Urlund\WordPress\PluginBoilerplate;

use Urlund\WordPress\Feature;

/**
 * The main plugin class.
 * This is used to add the plugin to the WordPress dashboard.
 */
class Plugin extends Feature
{
    protected $actions = [
        'admin_notices',
    ];

    public function admin_notices()
    {
        ?>
        <div class="notice notice-warning">
            <p>
                <?php _e( 'WP Plugin Boilerplate is installed and ready to use.', 'wp-plugin-boilerplate' ); ?>
            </p>
        </div>
        <?php
    }
}
