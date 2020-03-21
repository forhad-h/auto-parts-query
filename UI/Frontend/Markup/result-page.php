<?php
    $year = $_GET['year'];
    $make = $_GET['make'];
    $model = $_GET['model'];

    $results = json_decode($this->apq_table->get_query_result($year, $make, $model));

    if(!empty($results)) :
      foreach($results as $result) :
?>
        <div class="apq_single_tile">
          <h2><?= $result->make; ?></h2>
          <h3><?= $result->model; ?> - <?= $result->year;?></h3>
          <a href="<?= $result->product_url; ?>">Read More</a>
        </div>
<?php
      endforeach;
    endif;
