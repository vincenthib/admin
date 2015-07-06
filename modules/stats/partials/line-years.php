<?php

$db_movie = getDb('movies');

$movie_years = $db_movie->query('SELECT year, COUNT(*) as count_movies FROM movies GROUP BY year ORDER BY year ASC ')->fetchAll();

$years = array();
foreach($movie_years as $movie_year) {
  $years[] = $movie_year['year'];
}

// $min_year = min($years);
// $max_year = max($years);
// // .''.''.''.''.''.''.''.''.''.''.
// $years = range($min_year, $max_year, 10);


/*
echo '<pre>';
print_r($movie_years);
echo '</pre>';
*/

  $line_data = array(
    array(
      'label' => $movie_year['year'],
      'fillColor' => "rgba(210, 214, 222, 1)",
      'strokeColor' => "rgba(210, 214, 222, 1)",
      'pointColor' => "rgba(210, 214, 222, 1)",
      'pointStrokeColor' => "#c1c7d1",
      'pointHighlightFill' => "#fff",
      'pointHighlightStroke' => "rgba(220,220,220,1)"
    )
  );

foreach($movie_years as $movie_year) {


    $line_data[0]['data'][] = (int) $movie_year['count_movies'];
}

?>

              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Year</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <div class="box-body">
                  <div class="chart">
                    <canvas id="lineChart" height="250"></canvas>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
