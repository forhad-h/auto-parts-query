<div class="apq__container">
    <h1>Auto Parts Query Data</h1>

    <?php
        $all_data = json_decode($this->apq_table->get_all_query_data());
    ?>
    <form method="get" target="_blank" action="<?= get_site_url().'/query-results-page'; ?>">

      <div class="apq__col">
        <label>Year</label>
        <select name="apq_year">
          <option value="">Select Year</option>
          <?php
            if(!empty($all_data)) :
              foreach($all_data as $data) :
          ?>
              <option value="<?= $data->year; ?>"><?= $data->year; ?></option>
          <?php
              endforeach;
            endif;
          ?>
        </select>
      </div>

      <div class="apq__col">
        <label>Make</label>
        <select name="apq_make">
          <option value="">Select Make</option>
          <?php
            if(!empty($all_data)) :
              foreach($all_data as $data) :
          ?>
              <option value="<?= $data->make; ?>"><?= $data->make; ?></option>
          <?php
              endforeach;
            endif;
          ?>
        </select>
      </div>

      <div class="apq__col">
        <label>Model</label>
        <select name="apq_model">
          <option value="">Select Model</option>
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

      <div class="apq__col">
        <button type="submit">
          <span class="dashicons dashicons-yes"></span> Submit
        </button>
      </div>

    </form>
</div>
