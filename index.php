<?php

try {
	require_once 'config.php';

	//echo 'Utilisateur connecté : ', (user_isLogged() ? 'true' : 'false');

	/*
	debug($_SESSION);

	if ( user_isLogged() ) {
		$url = 'starter.php';
	} else {
		$url = 'modules/users/login_new.php';
	}
	ob_get_clean();
	header( 'Location: '.$url );
	*/
	include_once 'starter.php';

} catch ( Exception $e ) {

	header('Content-Type: text/plain; charset=utf-8');
    exit('Error >> '.$e->getMessage());

}
