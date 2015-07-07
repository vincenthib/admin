<?php

$query = $db->prepare('SELECT * FROM browsers');
$query->execute();
$tot_visitors = $query->fetchAll();

$total_visitors = 0;
foreach ($tot_visitors as $tot_visitor) {
  $total_visitors += $tot_visitor['browser_users'];
}

?>

<div class="small-box bg-red">
	<div class="inner">
		<h3><?= $total_visitors ?></h3>
		<p>Nombres de visiteurs</p>
	</div>
	<div class="icon">
		<i class="ion ion-ios-people-outline"></i>
	</div>
	<a href="#" class="small-box-footer">
	More info <i class="fa fa-arrow-circle-right"></i>
	</a>
</div>