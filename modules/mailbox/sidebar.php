 <?php

 //compte des mails
 $bindings = array();

 $query = $db->prepare('SELECT COUNT(*) as count_mail FROM mailbox WHERE draft = 0');

 foreach($bindings as $key => $value) {
 	$type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
 	$query->bindValue($key, $value, $type);
 }

 $query->execute();
 $result = $query->fetch();
 $count_mail = $result['count_mail'];
//fin compte des mails

//compte des drafts
 $bindings_trash = array();

 $query = $db->prepare('SELECT COUNT(*) as count_drafts FROM mailbox WHERE draft = 1');

 foreach($bindings_trash as $key => $value) {
 	$type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
 	$query->bindValue($key, $value, $type);
 }

 $query->execute();
 $result = $query->fetch();
 $count_drafts = $result['count_drafts'];
//fin compte des drafts

//compte des sent
 $bindings_sent = array();

 $query = $db->prepare('SELECT COUNT(*) as count_sent FROM mailbox WHERE sent = 1');

 foreach($bindings_trash as $key => $value) {
 	$type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
 	$query->bindValue($key, $value, $type);
 }

 $query->execute();
 $result = $query->fetch();
 $count_sent = $result['count_sent'];
//fin compte des sent


//compte des trash
 $bindings_trash = array();

 $query = $db->prepare('SELECT COUNT(*) as count_trash FROM mailbox WHERE trash = 1');

 foreach($bindings_trash as $key => $value) {
 	$type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
 	$query->bindValue($key, $value, $type);
 }

 $query->execute();
 $result = $query->fetch();
 $count_trash = $result['count_trash'];
//fin compte des trash

 ?>

 <div class="box box-solid">
 	<div class="box-header with-border">
 		<h3 class="box-title">Folders</h3>
 		<div class='box-tools'>
 			<button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
 		</div>
 	</div>
 	<div class="box-body no-padding">
 		<ul class="nav nav-pills nav-stacked">
 			<li class="active"><a href="modules/mailbox/index.php"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right"><?= $count_mail ?></span></a></li>
 			<li><a href="modules/mailbox/inbox.php?filter=sent"><i class="fa fa-envelope-o"></i> Sent<span class="label label-primary pull-right"><?= $count_sent ?></span></a></li>
 			<li><a href="modules/mailbox/inbox.php?filter=draft"><i class="fa fa-file-text-o"></i> Drafts<span class="label label-primary pull-right"><?= $count_drafts ?></span></a></li>
 			<li><a href="modules/mailbox/junk.php"><i class="fa fa-filter"></i> Junk <span class="label label-waring pull-right">65</span></a></li>
 			<li><a href="modules/mailbox/inbox.php?filter=trash"><i class="fa fa-trash-o"></i> Trash<span class="label label-primary pull-right"><?= $count_trash ?></span></a></li>
 		</ul>
 	</div><!-- /.box-body -->
 </div><!-- /. box -->
 <div class="box box-solid">
 	<div class="box-header with-border">
 		<h3 class="box-title">Labels</h3>
 		<div class='box-tools'>
 			<button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
 		</div>
 	</div><!-- /.box-header -->
 	<div class="box-body no-padding">
 		<ul class="nav nav-pills nav-stacked">
 			<li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
 			<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
 			<li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
 		</ul>
 	</div><!-- /.box-body -->
</div><!-- /.box -->