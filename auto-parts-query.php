<?php
/**
  * Plugin Name:       Auto Parts Query
  * Description:       Query for specific auto parts
  * Plugin URI:        https://github.com/forhad-h/auto-parts-query
  * Version:           1.0.0
  * Requires at least: 5.2
  * Requires PHP:      7.2
  * Author:            Forhad Hosain
  * Author URI:        https://github.com/forhad-h
  * License:           GPL v2 or later
  * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
  * Text Domain:       auto-parts-query
**/

define( 'APQ_BASE_PATH', plugin_dir_path(__FILE__) );
define( 'APQ_PLUGIN_FILE', __FILE__  );
define( 'APQ_BASE_URL', plugin_dir_url(__FILE__) );
define( 'APQ_PLUGIN', [ 'name' => 'auto_parts_query', 'version' => '1.0.0' ] );
define( 'ADMIN_JS_HANDLE', 'apq_admin_js');


// include autoloader
require_once APQ_BASE_PATH . 'vendor/autoload.php';

use APQ\UI\Backend\Option_Page;
use APQ\UI\Frontend\Shortcodes;
use APQ\Inc\Register_Scripts;
use APQ\Inc\DB\Table;
use APQ\Inc\Ajax;

register_activation_hook(APQ_PLUGIN_FILE, 'apq_plugin_activation');

function apq_plugin_activation() {
    if(!current_user_can('activate_plugin')) return;

    global $wpdb;

    if(null === $wpdb->get_row( "SELECT post_name FROM {$wpdb->prefix}posts WHERE post_name='query-result-page'", 'ARRAY_A' )) {
      $current_user = wp_get_current_user();

      // create post object
      $page = [
        'post_title' => __('Query Results Page', 'auto-parts-query'),
        'post_status' => 'publish',
        'post_author' => $current_user->ID,
        'post_type' => 'page',
        'post_content' => 'Works in the content',
      ];

      wp_insert_post($page);
    }

}

function apq_initialization() {

  //TODO: need to instantiate objects in appropriate place

  // Render option page in admin panel
  new Option_Page();

  // Register scripts and styles
  new Register_Scripts();

  // Create table
  $apq_table = new Table();
  $apq_table->create_table();

  // ajax
  $ajax = new Ajax();

  // shortcodes
  $shortcodes = new Shortcodes();

}
add_action('init', 'apq_initialization');
