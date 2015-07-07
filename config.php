<?php
ob_start();
session_name('admin_session');
session_start();

<<<<<<< HEAD
####
####  Configuration de la racine
####
=======
$protocol = (@$_SERVER['HTTPS'] == 'on' ? 'https' : 'http');
$domain = $_SERVER['HTTP_HOST'];
$root_dir = str_replace('\\', '/', __DIR__); // C:\xampp\htodcs\admin
$root_folder = trim(str_replace($_SERVER['DOCUMENT_ROOT'], '', $root_dir), '/'); // admin
$root_path = $protocol.'://'.$domain.'/'.$root_folder.'/'; // http://localhost/admin/

$current_path = trim(str_replace($root_folder, '', $_SERVER['PHP_SELF']), '/');
$current_page = basename($current_path);

$referer = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $root_path.'index.php';
$back_link = !empty($_GET['from']) ? $_GET['from'] : $root_path.'index.php';
>>>>>>> f94565921487128ddaa340d424ac5ccd396b158b

$protocol  = (@$_SERVER['HTTPS'] == 'on' ? 'https' : 'http');
$domain    = $_SERVER['HTTP_HOST'];
$root_dir  = str_replace('\\', '/', __DIR__);
$root_path = $protocol.'://'.$domain.'/'.trim(str_replace($_SERVER['DOCUMENT_ROOT'], '', $root_dir), '/').'/';
/*
echo $root_dir.'<br>';
echo $root_path.'<br>';
*/

<<<<<<< HEAD

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
=======
require_once $root_dir.'/inc/db.php';
require_once $root_dir.'/inc/func.php';
require_once $root_dir.'/modules/users/user.php';
>>>>>>> f94565921487128ddaa340d424ac5ccd396b158b

define('FACEBOOK_SDK_ROOT_PATH', '/inc/facebook');

define('FACEBOOK_SDK_V4_SRC_DIR', $root_dir.FACEBOOK_SDK_ROOT_PATH.'/src/Facebook/');
require $root_dir .FACEBOOK_SDK_ROOT_PATH.'/autoload.php';

<<<<<<< HEAD
define('FB_APP_ID',     $config['facebook']['FB_APP_ID'] );
define('FB_APP_SECRET', $config['facebook']['FB_APP_SECRET']);

=======
define('FB_APP_ID', '');
define('FB_APP_SECRET', '');

define('FB_REGISTER_LINK', $root_path.'modules/users/register.php');
>>>>>>> f94565921487128ddaa340d424ac5ccd396b158b
