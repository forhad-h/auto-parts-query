<?php
namespace APQ\Inc\DB;
use APQ\Inc\DB\APQ_WPDB;

class Table {
  private $db;
  private $table_name;
  private $charset_collate;

  function __construct() {
    $this->db = APQ_WPDB::getWPDB();
    $this->table_name = $this->db->prefix . 'apq_data';
    $this->charset_collate = $this->db->get_charset_collate();
  }

  function create_table() {

    $query = <<<QUERY
          CREATE TABLE IF NOT EXISTS {$this->table_name} (
        		id mediumint(9) NOT NULL AUTO_INCREMENT,
            year varchar(10),
            make varchar(100),
            model varchar(200),
            product_url varchar(300),
        		PRIMARY KEY  (id)
        	) {$this->charset_collate}
QUERY;

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $query );

    // tracking version
    add_option( APQ_PLUGIN['name'].'_version', APQ_PLUGIN['version'] );

  }

  function insert_query_data($year, $make, $model, $product_url) {

    $this->db->insert($this->table_name, [
      'year' => $year,
      'make' => $make,
      'model' => $model,
      'product_url' => $product_url,
    ]);

    $query = "SELECT * FROM {$this->table_name} where id={$this->db->insert_id}";

    return json_encode($this->db->get_results($query));

  }

}
