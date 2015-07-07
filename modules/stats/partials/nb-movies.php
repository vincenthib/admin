<?php 

$db_movie = getDb('movies');

$query = $db_movie->prepare('SELECT COUNT(*) as count_movies FROM movies');
$query->execute();
$result = $query->fetch();
$count_movies = $result['count_movies'];

?> 

<div class="small-box bg-aqua">
	<div class="inner">
		<h3><?= $count_movies ?></h3>
		<p>Films</p>
	</div>
	<div class="icon">
		<i class="fa fa-database"></i>
	</div>
	<a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
</div>