<?php
namespace APQ\Inc;
use APQ\Inc\Utils;

if(!defined('ABSPATH')) die('Prevent direct access!');

class Register_Scripts {

  public function __construct() {
    if(Utils::is_valid_admin()) {
      add_action( 'admin_enqueue_scripts', [$this, 'apq_admin_scripts'] );
    }else {
      add_action( 'wp_enqueue_scripts', [$this, 'apq_client_scripts'] );
    }
  }

  public function apq_admin_scripts() {
    wp_enqueue_style( 'apq_admin_css', APQ_BASE_URL.'assets/css/admin.css');
    wp_enqueue_script( 'apq_admin_js', APQ_BASE_URL.'assets/js/admin.js', '', '', true );
  }

  public function apq_client_scripts() {
    wp_enqueue_style( 'apq_admin_css', APQ_BASE_URL.'assets/css/client.css');
    wp_enqueue_script( 'apq_admin_js', APQ_BASE_URL.'assets/js/client.js', '', '', true );
  }

}
