<?php

function getMonthLabel($month) {

	static $month_labels = array(
		'january' => 'janvier',
		'february' => 'février',
		'march' => 'mars',
		'april' => 'avril',
		'may' => 'mai',
		'june' => 'juin',
		'july' => 'juillet',
		'august' => 'août',
		'september' => 'septembre',
		'october' => 'octobre',
		'november' => 'novembre',
		'december' => 'décembre'
	);

	if (!isset($month_labels[$month])) {
		return $month;
	}
	return $month_labels[$month];
}

function debug($array) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';
	//echo '<pre>'.print_r($array, true).'</pre>';
}

function redirectJS($url, $delay = 1) {
	return '
	<script>
	setTimeout(function() {
		location.href = "'.$url.'";
	}, '.($delay * 1000).');
	</script>
	';
}
