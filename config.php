<?php
session_name('admin_session');
session_start();

$protocol = (@$_SERVER['HTTPS'] == 'on' ? 'https' : 'http');
$domain = $_SERVER['HTTP_HOST'];
$root_dir = str_replace('\\', '/', __DIR__);
$root_path = $protocol.'://'.$domain.'/'.trim(str_replace($_SERVER['DOCUMENT_ROOT'], '', $root_dir), '/').'/';

/*
echo $root_dir.'<br>';
echo $root_path.'<br>';
*/

require_once $root_dir.'/inc/func.php';
require_once $root_dir.'/inc/db.php';

define('FACEBOOK_SDK_ROOT_PATH', '/inc/facebook');

define('FACEBOOK_SDK_V4_SRC_DIR', $root_dir.FACEBOOK_SDK_ROOT_PATH.'/src/Facebook/');
require $root_dir .FACEBOOK_SDK_ROOT_PATH.'/autoload.php';

define('FB_APP_ID', '');
define('FB_APP_SECRET', '');
