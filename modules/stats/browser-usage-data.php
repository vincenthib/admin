<?php
include_once 'config.php';

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

echo json_encode($piebrowsers);

?>