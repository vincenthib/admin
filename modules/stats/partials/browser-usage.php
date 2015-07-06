<?php

$browsers = $db->query('SELECT * FROM browsers')->fetchAll();

$colors = array('#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc');

$i = 0;
$piebrowsers = array();

foreach ($browsers as $browser) {
	$browser_name = $browser['browser'];
	$browser_qty = $browser['browser_users'];
	$color = !empty($colors[$i]) ? $colors[$i] : '#666';
	$piebrowsers[] = array(
		'value' => (int) $browser_qty,
		'color' => $color,
		'hightlight' => $color,
		'label' => $browser_name
		);
	$i++;
}

/*echo '<pre>';
print_r($piebrowsers);
echo '</pre>';*/

?>

<div class="box box-danger">

	<div class="box-header with-border">
		<h3 class="box-title">Browser usage</h3>
		<div class="box-tools pull-right">
			<button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
		</div>
	</div>

	<div class="box-body">

		<div class="row">

			<div class="col-md-8">
				<canvas id="pieChart" height="250"></canvas>
			</div>

			<div class="col-md-4">
				<ul class="chart-legend clearfix">

					<?php
					$id = 0;
					foreach ($browsers as $browser) { ?>
					<li>
						<i class="fa fa-circle" style="color:<?= $colors[$id] ?>"> <?= $browser['browser'] ?></i>
					</li>
					<?php
					$id++;
				} ?>

				</ul>
			</div>
		</div>

	</div><!-- /.box-body -->
</div><!-- /.box -->
