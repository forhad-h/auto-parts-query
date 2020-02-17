<?php
namespace APQ\UI\Backend;

if(!defined('ABSPATH')) die('Prevent direct access!');

class Option_Page {

  public function __construct() {
    if(is_admin()) {
      add_action( 'admin_menu', [$this, 'apq_option_menu'] );
    }
  }

  public function apq_option_menu() {
  	add_menu_page( 'Auto Parts Query Options', 'Parts Query', 'manage_options', 'auto-parts-query-options', [$this, 'apq_display_options'], 'dashicons-search', 100);
  }

  /*display options fields*/
  public function apq_display_options() {
    ?>
      <div class="apq__container">
          <h1>Auto Parts Query Options</h1>

          <form method="post" action="">

              <!--
                Single Fields Group
                To add dinamically
              -->
              <div id="APQFieldsGroupBase" class="apq__row apq__fields_group" style="display: none;">
                <div class="apq__col">
                  <label>Year</label>
                  <input type="text" name="year[]" value="" />
                </div>
                <div class="apq__col">
                  <label>Make</label>
                  <input type="text" name="make[]" value="" />
                </div>
                <div class="apq__col">
                  <label>Model</label>
                  <input type="text" name="model[]" value="" />
                </div>
                <div class="apq__col">
                  <label>Product URL</label>
                  <input type="text" name="product_url[]" value="" />
                </div>
                <div class="apq__col">
                  <button type="button" class="apq__fields_group_remove_btn">Remove</button>
                </div>
              </div>

              <!--Fields Group Container-->
              <div id="APQFieldsGroupContainer">

                <!--
                  Single Fields Group
                -->
                <div class="apq__row apq__fields_group">
                  <div class="apq__col">
                    <label>Year</label>
                    <input type="text" name="year[]" value="" />
                  </div>
                  <div class="apq__col">
                    <label>Make</label>
                    <input type="text" name="make[]" value="" />
                  </div>
                  <div class="apq__col">
                    <label>Model</label>
                    <input type="text" name="model[]" value="" />
                  </div>
                  <div class="apq__col">
                    <label>Product URL</label>
                    <input type="text" name="product_url[]" value="" />
                  </div>
                  <div class="apq__col">
                    <button type="button" class="apq__fields_group_remove_btn">Remove</button>
                  </div>
                </div>

              </div>

              <div class="apq__row">
                <div class="apq__col">
                  <button type="button" id="APQAddFieldsGroupAddBtn">+ Add</button>
                </div>
              </div>

              <div class="apq__row">
                <div class="apq__col">
                  <button>Save</button>
                </div>
              </div>

          </form>
      </div>
    <?php
  }

}
