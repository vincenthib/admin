<?php
$icone_starO = 'fa-star-o';
$icone_star = 'fa-star';

if(isset($_REQUEST['icone-star'])){
	if($_REQUEST['icone-star'] == $icone_star){
		echo "top";
	} else {
		echo "suck";
	}
}

$query = $db->prepare('SELECT * FROM mailbox WHERE favoris');
$query->execute();
$result_favoris = $query->fetch();

if(!empty($result_favoris['favoris'])){
	$("#mailbox-star").addClass( "fa-star" );
}


$query = $db->prepare('SELECT * FROM mailbox UPDATE favoris SET 1 WHERE ');
$query->bindValue('star', $star);
$query->execute();
?>
