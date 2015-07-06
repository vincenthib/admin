<?php

function debug($array) {
	echo '<pre class="prettyprint lang-php">';
	print_r($array);
	echo '</pre>';
	//echo '<pre>'.print_r($array, true).'</pre>';
}

function show_bool( $bool ){
	return $bool ? 'true' : 'false';
}

?>