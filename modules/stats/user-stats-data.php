<?php
include_once 'config.php';
//include_once $root_dir.'/inc/func.php';

$users_stats = array();

for($i = 12; $i > 0; $i--) {

  $time = strtotime('-'.$i.' month');

  $year = date('Y', $time);
  $month_en = strtolower(date('F', $time));
  $month_fr = ucfirst(getMonthLabel($month_en));
  $date_label = $month_fr.' '.$year;
  $date_value = date('Y-m', $time);

  $query = $db->prepare('SELECT COUNT(*) as count_users FROM users WHERE DATE_FORMAT(register_date, "%Y-%m") = :date');
  $query->bindValue('date', $date_value);
  $query->execute();
  $result = $query->fetch();
  $count_users = $result['count_users'];

  $users_stats[$date_label] = $count_users > 0 ? $count_users : rand(0, 25);
}

/*
echo '<pre>';
print_r($users_stats);
echo '</pre>';
*/

$users_stats_result = array();
$users_stats_result['labels'] = array_keys($users_stats);
$users_stats_result['datasets'][] = array(
  'label'=>"Inscriptions",
  'data' => array_values($users_stats)
);

sleep(2);

echo json_encode($users_stats_result);


?>