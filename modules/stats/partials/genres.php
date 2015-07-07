<?php

$db_movie = getDb('movies');

$query = $db_movie->prepare('SELECT COUNT(*) as count_genres FROM genres');
$query->execute();
$result = $query->fetch();
$count_genres = $result['count_genres'];

?>

<div class="small-box bg-green">
	<div class="inner">
		<h3><?= $count_genres ?> </h3>
		<p>Genres de films</p>
	</div>
	<div class="icon">
		<i class="fa fa-file-video-o"></i>
	</div>
	<a href="#" class="small-box-footer">
		More info <i class="fa fa-arrow-circle-right"></i>
	</a>
</div>