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

    wp_enqueue_script( 'apq_admin_js', APQ_BASE_URL.'assets/js/admin.js', ['jquery'], '', true );

    wp_localize_script('apq_admin_js', 'apqAjax', ['url' => admin_url('admin-ajax.php')] );

  }

  public function apq_client_scripts() {
    wp_enqueue_style( 'apq_client_css', APQ_BASE_URL.'assets/css/client.css');
    wp_enqueue_style( 'apq_bootstrap_css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    wp_enqueue_style( 'apq_select2_css', 'https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css');
    wp_enqueue_script( 'apq_select2_js', 'https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js', ['jquery'], '', true );

    wp_enqueue_script( 'apq_client_js', APQ_BASE_URL.'assets/js/client.js', ['jquery'], '', true );

  }

}
