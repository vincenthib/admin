<?php

define('REMEMBER_ME_SECRET_KEY', $config['cryptage']['REMEMBER_ME_SECRET_KEY']);

function cryptage_hash ( $password ){
	if (version_compare(PHP_VERSION, '5.5.0', '<')) {
		return substr(hash('sha256', $password.'quelquechosedeplus'),0,60);
	}
	return password_hash($password, PASSWORD_BCRYPT);
}

function cryptage_verify( $password, $crypted_password ){
	if (version_compare(PHP_VERSION, '5.5.0', '<')) {
		return strcmp( $crypted_password, substr(hash('sha256', $password.'quelquechosedeplus'),0,60) ) === 0;
	}
	return password_verify( $password, $crypted_password );
}

function redirectJS( $url, $delay = 1 ) {
	return '
	<script>
	setTimeout(function() {
		location.href = "'.$url.'";
	}, '.($delay * 1000).');
	</script>
	';
}

function getUserToken() {
	$protocol = $_SERVER['REQUEST_SCHEME']; // Contient le protocole en cours http ou https

	// On définit l'empreinte de l'utilisateur, url en cours et user agent
	$footprints = $protocol.'://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'].$_SERVER['HTTP_USER_AGENT'];

	// On crée un jeton qui contient la clé secrète concaténée avec l'empreinte de l'utilisateur
	$token = REMEMBER_ME_SECRET_KEY.$footprints;

	return $token;
}

function setRememberMe( $user_id, $expiration ) {

	$current_time = time(); // On définit le timestamp actuel

	$token = getUserToken();

	// On définit une chaîne qui contient nos infos en clair
	$user_data = $current_time.'.'.$user_id;

	// On crypte les informations en clair concaténées avec le jeton
	$crypted_token = hash('sha256', $token.$user_data);

	// On stock les infos en clair et les infos cryptées dans des cookies
	setcookie('rememberme_data', $user_data, $current_time + $expiration);
	setcookie('rememberme_token', $crypted_token, $current_time + $expiration);
}

function getRememberMe( $expiration ) {

	if (empty($_COOKIE['rememberme_data']) || empty($_COOKIE['rememberme_token'])) {
		return false;
	}

	$current_time = time(); // On définit le timestamp actuel

	$token = getUserToken();

	// On crypt les informations du cookie concaténées avec le jeton
	$crypted_token = hash('sha256', $token.$_COOKIE['rememberme_data']);

	// On vérifie que le jeton du cookie est égal au jeton crypté au dessus
	if(strcmp($_COOKIE['rememberme_token'], $crypted_token) !== 0) {
		return false;
	}

	// On récupère les infos du cookie dans 2 variables, correspondant aux 2 entrées du tableau renvoyé par explode
	list($user_time, $user_id) = explode('.', $_COOKIE['rememberme_data']);

	// On vérifie que le timestamp défini dans le cookie expire dans le futur et qu'il a été défini dans le passé
	if($user_time + $expiration > $current_time && $user_time < $current_time) {
		return $user_id;
	}
	return false;
}
