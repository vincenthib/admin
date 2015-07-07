<?php

try {
	require_once 'config.php';
	require $root_dir.'/modules/user.php';

	//echo 'Utilisateur connecté : ', (user_isLogged() ? 'true' : 'false');

	debug($_SESSION);

	if ( user_isLogged() ) {

		//$url = '/starter.html'; // Pour débuter
		$url = '/starter.php';  // La même avec découpage
		//$url = '/index.html';   // Le dashboard
		//$url = '/index2.html';  // Un autre dashboard

	} else {

		$url = '/modules/login_new.php';

	}
	ob_get_clean();
	header( 'Location: '.$url );

} catch ( Exception $e ) {

	header('Content-Type: text/plain; charset=utf-8');
    exit('Error >> '.$e->getMessage());

}
