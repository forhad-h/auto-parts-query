<?php
namespace APQ\Inc;
use APQ\Inc\DB\Table;

class Ajax {
  private $apq_table;

  function __construct() {
    $this->apq_table = new Table();
    add_action( 'wp_ajax_save_query_info', [$this, 'save_query_info'] );
    add_action( 'wp_ajax_delete_query_data', [$this, 'delete_query_info'] );
  }

  public function save_query_info() {
    $row_id = !empty($_POST['row_id']) ? $_POST['row_id'] : '';
    $year = !empty($_POST['year']) ? $_POST['year'] : '';
    $make = !empty($_POST['make']) ? $_POST['make'] : '';
    $model = !empty($_POST['model']) ? $_POST['model'] : '';
    $product_url = !empty($_POST['product_url']) ? $_POST['product_url'] : '';

    if(!empty($row_id)) {
      echo $this->apq_table->update_query_data($row_id, $year, $make, $model, $product_url);
    }else {
      echo $this->apq_table->insert_query_data($year, $make, $model, $product_url);
    }

    wp_die();
  }

  public function delete_query_info() {
    $row_id = !empty($_POST['row_id']) ? $_POST['row_id'] : '';

    if(!empty($row_id)) {
      echo $this->apq_table->delete_query_data($row_id);
    }
    
  }

}
