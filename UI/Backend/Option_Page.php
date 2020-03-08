<?php
namespace APQ\UI\Backend;
use APQ\Inc\DB\Table;

if(!defined('ABSPATH')) die('Prevent direct access!');

class Option_Page {

  public function __construct() {
    if(is_admin()) {
      add_action( 'admin_menu', [$this, 'apq_option_menu'] );
    }
  }

  public function apq_option_menu() {
  	add_menu_page( 'Auto Parts Query Data', 'Parts Query', 'manage_options', 'auto-parts-query-options', [$this, 'apq_display_options'], 'dashicons-search', 100);
  }

  /*display options fields*/
  public function apq_display_options() {
    ?>
      <div class="apq__container">
          <h1>Auto Parts Query Data</h1>

              <!--
                Single form
                To add dinamically
              -->
              <div id="APQFieldsGroupBase" class="apq__row apq__fields_group" style="display: none;">
                <form method="post" data-rid="" >
                  <div class="apq__col">
                    <label>Year</label>
                    <input type="text" name="year" value="" />
                  </div>
                  <div class="apq__col">
                    <label>Make</label>
                    <input type="text" name="make" value="" />
                  </div>
                  <div class="apq__col">
                    <label>Model</label>
                    <input type="text" name="model" value="" />
                  </div>
                  <div class="apq__col">
                    <label>Product URL</label>
                    <input type="text" name="product_url" value="" />
                  </div>
                  <div class="apq__col">
                    <button type="button" class="apq__fields_group_btn apq__fields_group_remove_btn">
                      <span class="dashicons dashicons-trash"></span>
                      <span class="apq_loading">
                        <img src="<?= admin_url('images/loading.gif'); ?>" alt=""/>
                      </span>
                    </button>
                    <button type="submit" class="apq__fields_group_btn apq__fields_group_save_btn">
                      <span class="dashicons dashicons-yes"></span>
                      <span class="apq_loading">
                        <img src="<?= admin_url('images/loading.gif'); ?>" alt=""/>
                      </span>
                    </button>
                  </div>
                </form>
              </div>

              <!--Fields Group Container-->
              <div id="APQFieldsGroupContainer">

                <?php
                $apq_table = new Table();
                $all_data = json_decode($apq_table->get_all_query_data());

                if(!empty($all_data)) :
                  foreach($all_data as $data) :
                ?>
                <!--
                  Single Fields Group
                -->
                <div class="apq__row apq__fields_group">
                  <form method="post" data-rid="<?= $data->id; ?>">
                    <div class="apq__col">
                      <label>Year</label>
                      <input type="text" name="year" value="<?= $data->year; ?>" />
                    </div>
                    <div class="apq__col">
                      <label>Make</label>
                      <input type="text" name="make" value="<?= $data->make; ?>" />
                    </div>
                    <div class="apq__col">
                      <label>Model</label>
                      <input type="text" name="model" value="<?= $data->model; ?>" />
                    </div>
                    <div class="apq__col">
                      <label>Product URL</label>
                      <input type="text" name="product_url" value="<?= $data->product_url; ?>" />
                    </div>
                    <div class="apq__col">
                      <button type="button" class="apq__fields_group_btn apq__fields_group_remove_btn">
                        <span class="dashicons dashicons-trash"></span>
                        <span class="apq_loading">
                          <img src="<?= admin_url('images/loading.gif'); ?>" alt=""/>
                        </span>
                      </button>
                      <button type="submit" class="apq__fields_group_btn apq__fields_group_save_btn">
                        <span class="dashicons dashicons-yes"></span>
                        <span class="apq_loading">
                          <img src="<?= admin_url('images/loading.gif'); ?>" alt=""/>
                        </span>
                      </button>
                    </div>
                  </form>
                </div>

              <?php
                  endforeach;
                else:
              ?>

              <div class="apq__row apq__fields_group">
                <form method="post" data-rid="">
                  <div class="apq__col">
                    <label>Year</label>
                    <input type="text" name="year" value="" />
                  </div>
                  <div class="apq__col">
                    <label>Make</label>
                    <input type="text" name="make" value="" />
                  </div>
                  <div class="apq__col">
                    <label>Model</label>
                    <input type="text" name="model" value="" />
                  </div>
                  <div class="apq__col">
                    <label>Product URL</label>
                    <input type="text" name="product_url" value="" />
                  </div>
                  <div class="apq__col">
                    <button type="button" class="apq__fields_group_btn apq__fields_group_remove_btn">
                      <span class="dashicons dashicons-trash"></span>
                      <span class="apq_loading">
                        <img src="<?= admin_url('images/loading.gif'); ?>" alt=""/>
                      </span>
                    </button>
                    <button type="submit" class="apq__fields_group_btn apq__fields_group_save_btn">
                      <span class="dashicons dashicons-yes"></span>
                      <span class="apq_loading">
                        <img src="<?= admin_url('images/loading.gif'); ?>" alt=""/>
                      </span>
                    </button>
                  </div>
                </form>
              </div>

              <?php
                endif;
              ?>

              </div>

              <div class="apq__row">
                <div class="apq__col">
                  <button type="button" id="APQAddFieldsGroupAddBtn">+ Add</button>
                </div>
              </div>

      </div>
    <?php
  }

}
