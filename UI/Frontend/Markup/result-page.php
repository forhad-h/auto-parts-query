<div class="apq__query_results">
  <div class="container">
    <div class="row">
  <?php
      $year = $_GET['apq_year'];
      $make = $_GET['apq_make'];
      $model = $_GET['apq_model'];

      $results = json_decode($this->apq_table->get_query_result($year, $make, $model));

      if(!empty($results)) :
        foreach($results as $result) :
  ?>
        <div class="col-md-3">
          <div class="apq_single_tile">
            <img src="<?= $result->product_image_url; ?>" />
            <h3>Make: <?= $result->make; ?></h3>
            <h4>Model: <?= $result->model; ?></h4>
            <h4>Year: <?= $result->year; ?></h4>
            <a href="<?= $result->product_url; ?>" class="apq_buy_now_btn">Buy now</a>
          </div>
        </div>
  <?php
        endforeach;
      else:
  ?>
        <p class="apq_empty_text">No product found in your search!</p>
  <?php
      endif;
  ?>
    </div>
  </div>
</div>
