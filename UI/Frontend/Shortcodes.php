<?php
namespace APQ\UI\Frontend;
use APQ\Inc\DB\Table;

class Shortcodes {

    private $apq_table;

    public function __construct() {
      $this->apq_table = new Table();
      add_shortcode('query_form', [$this, 'query_form']);
      add_shortcode('result_page', [$this, 'result_page']);
    }

    public function query_form($atts) {
      ob_start();
      include APQ_BASE_PATH.'UI/Frontend/Markup/query-form.php';
      return ob_get_clean();
    }

    public function result_page() {
      ob_start();
      include APQ_BASE_PATH.'UI/Frontend/Markup/result-page.php';
      return ob_get_clean();
    }

}
