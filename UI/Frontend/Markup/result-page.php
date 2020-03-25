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
          <h2><?= $result->make; ?></h2>
          <h3><?= $result->model; ?> - <?= $result->year;?></h3>
          <a href="<?= $result->product_url; ?>">Buy now</a>
        </div>
      </div>
<?php
      endforeach;
    endif;
?>
  </div>
</div>
