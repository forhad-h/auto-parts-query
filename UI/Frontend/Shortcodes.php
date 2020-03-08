<?php
namespace APQ\UI\Frontend;
use APQ\Inc\DB\Table;

class Shortcodes {

    private $apq_table;

    public function __construct() {
      $this->apq_table = new Table();
      add_shortcode('query_form', [$this, 'query_form']);
    }

    function query_form($atts) {
      ob_start();
      include_once APQ_BASE_PATH.'UI/Frontend/Markup/query-form.php';
      return ob_get_clean();
    }
}
