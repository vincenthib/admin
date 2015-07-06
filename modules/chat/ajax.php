<?php
	require 'config.php';
	require $root_dir.'/inc/func.php';
	require $root_dir.'/inc/db.php';
	require $root_dir.'/inc/user.php';

	header("Expires: 0");
	header("Cache-Control: no-cache, must-revalidate, post-check=0, pre-check=0");
	header("Pragma: no-cache");
	header("Content-type: application/json");

	$chat_id = $_SESSION['chat_id'];
	$chat = [];

	if (!empty($chat_id)) {
		$query = $db->prepare(
			 'SELECT *, chat_msg.id as msg_id, chat_msg.date as date_sent '
			.'FROM chat,chat_msg WHERE chat.id = chat_msg.chat_id AND chat.id = :id ORDER BY msg_id ASC'
		);
		$query->bindValue(':id', $chat_id);
		$query->execute();
		$messages = $query->fetchAll();
		foreach ($messages as $key => $message) {
			if ($key==0) $fullname = user_fullname( $message['to_user_id'] );
			$chat[] = [
				'msg_id'    => $message['msg_id'],
				'fullname'  => $fullname,
				'date_sent' => $message['date_sent'],
				'photo'     => 'user'.$message['from_user_id'].'-128x128.jpg',
				'msg'       => $message['message'],
				'user_id'   => $message['to_user_id'],
			];
		}
	}
// 		[ "Alexander Pierce", "23 Jan 2:00 pm",  "user1-128x128.jpg",  "Is this template really for free? That's unbelievable!" ],

	echo json_encode($chat);
