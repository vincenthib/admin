<?php

$db_movie = getDb('movies');

$movie_years_result = $db_movie->query('SELECT year, COUNT(*) as count_movies FROM movies GROUP BY year HAVING count_movies > 0 ORDER BY year ASC ')->fetchAll();

$movie_years = array();
foreach($movie_years_result as $movie_year) {
  $movie_years[$movie_year['year']] = $movie_year['count_movies'];
}

$min_year = min(array_keys($movie_years));
//$max_year = max(array_keys($movie_years));
$max_year = date('Y');
$range_years = range($min_year, $max_year);

foreach($range_years as $_year) {
  if (!isset($movie_years[$_year])) {
	$movie_years[$_year] = 0;
  }
}

ksort($movie_years);

/*
echo '<pre>';
print_r($movie_years);
echo '</pre>';
*/

$line_data = array(
	array(
		//'label' => 'TEST',
		'fillColor' => "rgba(210, 214, 222, 1)",
		'strokeColor' => "rgba(210, 214, 222, 1)",
		'pointColor' => "rgba(210, 214, 222, 1)",
		'pointStrokeColor' => "#c1c7d1",
		'pointHighlightFill' => "#fff",
		'pointHighlightStroke' => "rgba(220,220,220,1)"
	)
);

foreach($movie_years as $movie_year => $movie_count) {
	$line_data[0]['data'][] = (int) $movie_count;
}

?>

			  <div class="box box-info">
				<div class="box-header with-border">
				  <h3 class="box-title">Nombre de films par année</h3>
				  <div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
					<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				  </div>
				</div>
				<div class="box-body">
				  <div class="chart">
					<canvas id="lineChart" height="400"></canvas>
				  </div>
				</div><!-- /.box-body -->
			  </div><!-- /.box -->
