<?php
include_once 'config.php';
include_once '../../inc/db.php';

$id = !empty($_POST['id']) ? intval($_POST['id']) : 0;
$action = !empty($_POST['action']) ? $_POST['action'] : 'NO ACTION';


if (empty($action)) {
  exit(json_encode(array('ERROR' => 'Undefined ACTION')));
}

switch($action) {

  case 'persistToFalse':
    if (empty($id)) {
      exit(json_encode(array('ERROR' => 'Undefined ID')));
    }
    $query = $db -> prepare('UPDATE evenement SET persist=0 WHERE id=:id');
    $query -> bindValue('id', $id, PDO::PARAM_INT);
    $query -> execute();
  break;

  case 'add':
    if (!empty($id)) {
      exit(json_encode(array('ERROR' => 'Event already exist')));
    }
    $title = !empty($_POST['title']) ? $_POST['title'] : 0;
    $color = !empty($_POST['color']) ? $_POST['color'] : 0;

    if ($color && $title) {
      $query = $db -> prepare('INSERT INTO evenement SET title = :title, color = :color, persist = :persist');
      $query -> bindValue('title', $title);
      $query -> bindValue('color', $color);
      $query -> bindValue('persist', 1);
      $query -> execute();
    }
    exit(json_encode($db->lastInsertId()));
  break;

  case 'resize':
    if (empty($id)) {
      exit(json_encode(array('ERROR' => 'Undefined ID')));
    }

    $end = !empty($_POST['end']) ? $_POST['end'] : 0;
    $end = date('Y-m-d H:i:s' , $end);

    if ($end) {
      $query = $db -> prepare('UPDATE evenement SET end = :end WHERE id=:id');
      // $query -> bindValue('end', $end);
      $query -> bindValue('end', $end);
      $query -> bindValue('id', $id, PDO::PARAM_INT);
      $query -> execute();
    }
  break;

  case 'update':

     $start = !empty($_POST['start']) ? $_POST['start'] : '';
     $start= date('Y-m-d H:i:s', $start);
     $allDay = !empty($_POST['allDay']) ? $_POST['allDay'] : 0;

     $query = $db -> prepare('UPDATE evenement SET start = :start, allDay = :allDay WHERE id = :id');
     $query -> bindValue('id', $id, PDO::PARAM_INT);
     $query -> bindValue('allDay', $allDay, PDO::PARAM_INT);
     $query -> bindValue('start', $start);
     $query -> execute();

  break;

 case 'dropevent':

     $start = !empty($_POST['start']) ? $_POST['start'] : '';
     $start= date('Y-m-d H:i:s', $start);
     $end = !empty($_POST['end']) ? $_POST['end'] : '';
     $end= date('Y-m-d H:i:s', $end);
     $allDay = !empty($_POST['allDay']) ? $_POST['allDay'] : '';

     $query = $db -> prepare('UPDATE evenement SET start = :start, end = :end, allDay = :allDay WHERE id = :id');
     $query -> bindValue('id', $id, PDO::PARAM_INT);
     $query -> bindValue('start', $start);
     $query -> bindValue('end', $end);
     $query -> bindValue('allDay', $allDay, PDO::PARAM_INT);
     $query -> execute();

  break;

  default:
    exit(json_encode(array('ERROR' => 'Undefined ACTION (in switch)')));
  break;

}

?>
