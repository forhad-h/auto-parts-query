<?php
namespace APQ\UI\Backend;

if(!defined('ABSPATH')) die('Prevent direct access!');

/**
 * class Option_Page
 * Make a page for admin options
 * @since 1.0.0
*/


class Option_Page {

  /**
   * @method __construct
   * make navigation menu in sidebar
   * @since 1.0.0
   * @access public
   * @return void
  */

  public function __construct() {
    if(is_admin()) {
      add_action( 'admin_menu', [$this, 'apq_option_menu'] );
    }
  }

  /**
   * @method apq_option_menu
   * add option menu
   * @since 1.0.0
   * @access public
   * @return void
  */

  public function apq_option_menu() {
  	add_menu_page( 'Auto Parts Query Options', 'Parts Query', 'manage_options', 'auto-parts-query-options', [$this, 'apq_display_options'], 'dashicons-search', 100);
  }

  /*display options field*/
  public function apq_display_options() {
  ?>
    <div class="wrap">
        <h1>Custom theme options</h1>

        <form method="post" action="options.php">

            <div class="fields_wrapper">
                <h3>Header part</h3>

                <div class="single_option">
                    <h4>Header CTA button text</h4>
                    <input type="text" name="new_option_name" value="" />
                </div>
            </div>

        </form>
    </div>
  <?php
  }

}
