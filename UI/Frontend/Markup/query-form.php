<div class="apq__query_form_wrapper">
    <div class="apq_logo">
        <img src="<?= APQ_BASE_URL."assets/img/Vogtland-logo.png"; ?>" />
    </div>
    <h1>MY VEHICLE</h1>
    <h3>Select your vehicle year, make and model to view Vogtland products that fit your vehicle</h3>

    <?php
        $all_data = json_decode($this->apq_table->get_all_query_data());
        $year = [];
        $make = [];

        // sanitize make
        foreach($all_data as $data) {
          array_push($year, $data->year);
          array_push($make, $data->make);
        }

        $year = array_unique($year);
        $make = array_unique($make);

    ?>
    <form method="get" target="_blank" class="apq__query_form" action="<?= get_site_url().'/apq-query-result'; ?>">

      <div class="apq_single_field">
        <select name="apq_year">
          <option value="">Year</option>
          <?php
            if(!empty($year)) :
              foreach($year as $each_year) :
          ?>
              <option value="<?= $each_year; ?>"><?= $each_year; ?></option>
          <?php
              endforeach;
            endif;
          ?>
        </select>
      </div>

      <div class="apq_single_field">
        <select name="apq_make">
          <option value="">Make</option>
          <?php
            if(!empty($make)) :
              foreach($make as $each_make) :
          ?>
              <option value="<?= $each_make; ?>"><?= $each_make; ?></option>
          <?php
              endforeach;
            endif;
          ?>
        </select>
      </div>

      <div class="apq_single_field">
        <select name="apq_model">
          <option value="">Model</option>
          <?php
            if(!empty($all_data)) :
              foreach($all_data as $data) :
          ?>
              <option value="<?= $data->model; ?>"><?= $data->model; ?></option>
          <?php
              endforeach;
            endif;
          ?>
        </select>
      </div>

      <div class="apq_single_field">
        <button type="submit">
          <span class="dashicons dashicons-yes"></span> Submit
        </button>
      </div>

    </form>
</div>
