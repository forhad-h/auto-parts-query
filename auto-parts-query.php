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

define( "APQ_BASE_PATH", plugin_dir_path(__FILE__) );

// include autoloader
require_once APQ_BASE_PATH . "vendor/autoload.php";

use APQ\UI\Backend\Option_Page;

$test = new Option_Page();
