<?php
namespace APQ\Inc;
use APQ\Inc\DB\Table;

class Ajax {
  private $apq_table;

  function __construct() {
    $this->apq_table = new Table();
    add_action( 'wp_ajax_save_query_info', [$this, 'save_query_info'] );
    wp_localize_script(ADMIN_JS_HANDLE, 'apqAjax', [ 'url' => admin_url('admin-ajax.php') ])
  }

  private function save_query_info() {
    $year = $_POST['year'];
    $make = $_POST['make'];
    $model = $_POST['model'];
    $product_url = $_POST['$product_url'];

    echo $this->apq_table->insert_query_data($year, $make, $model, $product_url);

    wp_die();
  }

}
