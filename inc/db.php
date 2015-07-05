<?php
define('HOST', $config['mysql']['HOST']);
define('USER', $config['mysql']['USER']);
define('PASS', $config['mysql']['PASS']);
define('DABA', $config['mysql']['DABA']);

try {

    global $db, $db_options;
    $db_options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
    );

    $db = getDb(DABA);

} catch (Exception $e) {
    exit('MySQL Connect Error >> '.$e->getMessage());
}

function getDb($db) {
	global $db_options;
	return new PDO('mysql:host='.HOST.';dbname='.$db.'', USER, PASS, $db_options);
}

/*
CREATE SCHEMA `admin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
*/