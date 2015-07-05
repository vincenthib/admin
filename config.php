<?php
ob_start();
session_name('admin_session');
session_start();

####
####  Configuration de la racine
####

$protocol  = (@$_SERVER['HTTPS'] == 'on' ? 'https' : 'http');
$domain    = $_SERVER['HTTP_HOST'];
$root_dir  = str_replace('\\', '/', __DIR__);
$root_path = $protocol.'://'.$domain.'/'.trim(str_replace($_SERVER['DOCUMENT_ROOT'], '', $root_dir), '/').'/';
/*
echo $root_dir.'<br>';
echo $root_path.'<br>';
*/


####
####  Eléments de configuration à sécuriser
####
$config = parse_ini_file(dirname($root_dir).'/config_admin.ini',true);
/*
config_admin.ini doit être placé dans le dossier parent de DocumentRoot d'Apache
On récupère les paramètres de cette façon :
$config['nom_section']['nom_param']
*/


####
####  Configuration du login Facebook
####

define('FACEBOOK_SDK_ROOT_PATH', '/inc/facebook');

define('FACEBOOK_SDK_V4_SRC_DIR', $root_dir.FACEBOOK_SDK_ROOT_PATH.'/src/Facebook/');
require $root_dir .FACEBOOK_SDK_ROOT_PATH.'/autoload.php';

define('FB_APP_ID',     $config['facebook']['FB_APP_ID'] );
define('FB_APP_SECRET', $config['facebook']['FB_APP_SECRET']);

