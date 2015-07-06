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
