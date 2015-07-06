<?php

$db_movie = getDb('movies');

$genres = $db_movie->query('SELECT * FROM genres')->fetchAll();

$genres_counts = array();

foreach($genres as $key => $genre) {

  $genre_label = $genre['genre_label'];
  $genre_name = $genre['genre_name'];

  $query = $db_movie->prepare('SELECT COUNT(*) as count_genre FROM movies WHERE genres LIKE :genre');
  $query->bindValue(':genre', '%'.$genre_label.'%', PDO::PARAM_STR);
  $query->execute();
  $result = $query->fetch();
  $genres_counts[$genre_name] = $result['count_genre'];
}

$colors = array('#f56954', '#00a65a', '#f39c12', '#00c0ef' ,'#3c8dbc',
'#d2d6de','#7CF2C6', '#F2A57C', '#BFF27C', '#7CC9F2','#f56954', '#00a65a', '#f39c12', '#00c0ef' ,'#3c8dbc',
'#d2d6de','#7CF2C6', '#F2A57C', '#BFF27C', '#7CC9F2','#f56954', '#00a65a', '#f39c12', '#00c0ef' ,'#3c8dbc',
'#d2d6de','#7CF2C6', '#F2A57C', '#BFF27C', '#7CC9F2','#f56954', '#00a65a', '#f39c12', '#00c0ef' ,'#3c8dbc',
'#d2d6de','#7CF2C6', '#F2A57C', '#BFF27C', '#7CC9F2' );


$donut_data = array();
$i = 0;
foreach($genres_counts as $genre => $count) {

  $color = !empty($colors[$i]) ? $colors[$i] : '#666';

  $donut_data[] = array(
	'value' => (int) $count,
	'color' => $color,
	'highlight' => $color,
	'label' => $genre
  );
  $i++;
}

// echo '<pre>';
// print_r($donut_data);
// echo '</pre>';

/*
$pie_data = array(
  array(
	'value' => 700,
	'color' => "#f56954",
	'highlight' => "#f56954",
	'label' => "Chrome"
  ),
  array(
	'value' => 500,
	'color' => "#00a65a",
	'highlight' => "#00a65a",
	'label' => "IE"
  ),
  array(
	'value' => 400,
	'color' => "#f39c12",
	'highlight' => "#f39c12",
	'label' => "FireFox"
  ),
  array(
	'value' => 600,
	'color' => "#00c0ef",
	'highlight' => "#00c0ef",
	'label' => "Safari"
  ),
  array(
	'value' => 300,
	'color' => "#3c8dbc",
	'highlight' => "#3c8dbc",
	'label' => "Opera"
  ),
  array(
	'value' => 100,
	'color' => "#d2d6de",
	'highlight' => "#d2d6de",
	'label' => "Navigator"
  ),

);
*/
?>

<div class="box box-danger">
	<div class="box-header with-border">
		<h3 class="box-title">Différents genres</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		</div>
	</div>
	<div class="box-body">
		<canvas id="pieChart-genres" height="250"></canvas>
	</div><!-- /.box-body -->
</div><!-- /.box -->
