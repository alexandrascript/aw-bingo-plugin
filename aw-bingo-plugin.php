<?php 
/*
    Plugin Name: Post Bingo Card
    Plugin URI: https://github.com/heyawhite/aw-bingo-plugin
    Description: Create a bingo card post for a WP post
    Author: Alexandra White
    Version: 1.1
    Author URI: https://heyawhite.com
    Requires at least: 4.8

    @package WordPress
 	@author Alexandra White
  	@since 1.0.0
 */

/**********
Include Classes 
***********/

require_once( 'classes/class-enqueue-bingo-scripts.php' );
require_once( 'classes/class-plugin-settings.php' );
require_once( 'classes/class-bingo-shortcode.php' );

/********************************************
** Add Link to Settings Page in Plugin List
********************************************/
add_filter('plugin_action_links', 'bingo_plugin_action_links', 10, 2);

function bingo_plugin_action_links($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        $settings_link = '<a href="' . get_bloginfo('wpurl') . '/wp-admin/options-general.php?page=bingosettings">Settings</a>';
        array_unshift($links, $settings_link);
    }

    return $links;
}

?>