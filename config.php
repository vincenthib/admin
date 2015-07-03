<?php
$protocol = (@$_SERVER['HTTPS'] == 'on' ? 'https' : 'http');
$domain = $_SERVER['HTTP_HOST'];
$root_dir = str_replace('\\', '/', __DIR__);
$root_path = $protocol.'://'.$domain.'/'.trim(str_replace($_SERVER['DOCUMENT_ROOT'], '', $root_dir), '/').'/';

/*
echo $root_dir.'<br>';
echo $root_path.'<br>';
*/