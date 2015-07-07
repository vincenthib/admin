<?php

	function user_id(){
		return !empty($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
	}

	function user_isLogged(){
		return !empty($_SESSION['user_id']);
	}

	function user_fullname ( $user_id =-1 ) {
		global $db;
		if ( $user_id ===-1 ) $user_id = user_id();
		if (empty($user_id)) return '';
		$query = $db->prepare('SELECT firstname, lastname FROM users WHERE id = :id');
		$query->bindValue(':id', $user_id);
		$query->execute();
		$result = $query->fetch();
		return $result['firstname']." ".$result['lastname'];
	}
