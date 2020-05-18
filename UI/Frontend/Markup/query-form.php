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
        $model = [];

        // sanitize make
        foreach($all_data as $data) {
          array_push($year, $data->year);
          array_push($make, $data->make);
          array_push($model, $data->model);
        }

        $year = array_unique($year);
        $make = array_unique($make);
        $model = array_unique($model);

    ?>
    <form method="get" target="_blank" class="apq__query_form" action="<?= get_site_url().'/apq-query-result'; ?>">

      <div class="apq_single_field">
        <select name="apq_year" class="apq_select2">
          <option value="">Year</option>
          <?php

            for($i = 2020; $i >= 1900; $i--) :
          ?>
              <option value="<?= $i; ?>"><?= $i; ?></option>
          <?php
            endfor;
          ?>
        </select>
      </div>

      <div class="apq_single_field">
        <select name="apq_make" class="apq_select2">
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
        <select name="apq_model" class="apq_select2">
          <option value="">Model</option>
          <?php
            if(!empty($model)) :
              foreach($model as $each_model) :
          ?>
              <option value="<?= $each_model; ?>"><?= $each_model; ?></option>
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
