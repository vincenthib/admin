<?php

	header("Expires: 0");
	header("Cache-Control: no-cache, must-revalidate, post-check=0, pre-check=0");
	header("Pragma: no-cache");
	header('Content-type: application/json');

/*{
	{ 'user_id':'1', 'msg':'bonjour' },
	{ 'user_id':'2', 'msg':'ça va ?' },
}*/

?>
{
  "one": "Singular sensation",
  "two": "Beady little eyes",
  "three": { "toto" : "Little birds pitch by my doorstep", "tata" : "Little birds pitch by my doorstep" },
  "four":  { "titi" : "Little birds pitch by my doorstep", "tutu" : "Little birds pitch by my doorstep" },
}