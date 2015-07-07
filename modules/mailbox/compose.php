<?php require_once 'config.php';

include_once $root_dir.'/partials/header.php';
// include_once '/inc/func.php';

// Vérification id
$id = !empty($_REQUEST['id']) ? intval($_REQUEST['id']) : 0;
// Vérification paramètre action
$action = !empty($_REQUEST['action']) ? $_REQUEST['action'] : '';

//$draft = !empty($_GET['draft']) ? intval($_GET['draft']) : 1;

// action delete
// if ($action == 'delete' && !empty($id)) {
//     $query = $db->prepare('DELETE FROM mailbox WHERE id = :id');
//     $query->bindValue('id', $id, PDO::PARAM_INT);
//     $query->execute();
//     $result = $query->rowCount();
//     if (empty($result)) {
//         echo '<div class="alert alert-danger" role="danger">Une erreur est survenue</div>';
//     } else {
//         echo '<div class="alert alert-success" role="success">Le brouillon a bien été supprimé</div>';
//     }
//     goto end;
// }

// Champs du formulaire
$fields = array(
	'id' =>  array('required' => false, 'type' => 'hidden', 'default' => $id),
	'action' =>  array('required' => false, 'type' => 'hidden', 'default' => $action),
	'destinataire' => array('required' => true, 'type' => 'text',       'maxlength' => 255, 'error' => 'Veuillez saisir le mail du destinataire.'),
	'objet' =>       array('required' => true, 'type' => 'text',    'maxlength' => 255, 'error' => 'Votre message n\'a pas d\'obet.'),
	'message' =>    array('required' => true, 'type' => 'textarea',    'maxlength' => 0, 'error' => 'Votre message ne peut être vide.'),
	'attachment' => array('required' => false, 'type' => 'file')
);

// Création de l'id pour le brouillon - pour rédition du brouillon // AND sent = 1
if (($action == 'draft' || $action == 'delete') && !empty($id)) {
	$query = $db->prepare('SELECT * FROM mailbox WHERE id = :id AND trash != 1');
	$query->bindValue('id', $id, PDO::PARAM_INT);
	$query->execute();
	$mail = $query->fetch();
	if (empty($mail)) {
		exit('Undefined mail');
	}
}


// Vérification des champs du formulaire
foreach($fields as $field_name => $field_params) {
	$$field_name = !empty($_POST[$field_name]) ? $_POST[$field_name] : @$mail[$field_name];
	if (empty($$field_name) && !empty($field_params['default'])) {
		$$field_name = $field_params['default'];
	}
}

$errors = array();
// Gestion des erreurs
if (!empty($_POST)) {
	foreach($fields as $field_name => $field_params) {
		if ($field_params['required'] !== false && empty($_POST[$field_name])) {
			$error_label = !empty($field_params['error']) ? $field_params['error'] : $field_name.' est obligatoire';
			$errors[$field_name] = $error_label;
		}
	}
	if(empty($destinataire) || !filter_var($destinataire, FILTER_VALIDATE_EMAIL)) {
		$errors['destinataire'] = 'Vous devez renseigner une adresse mail valide.';
	}
	if (empty($errors)) {
		// Piece-jointe: envoie vers la BD et enregistrement dans le dossier attachments
		$attachment = '';

		$max_size = 3200000;
		if (!empty($_FILES['attachment']['tmp_name']) && empty($_FILES['attachment']['error']) && $_FILES['attachment']['size'] < $max_size) {
			//$file_infos = pathinfo($_FILES['piece-jointe']['name']);
			//$extension = $file_infos['extension'];
			$attachment = $_FILES['attachment']['name'];
			$filename = 'attachments/'.$attachment;
			move_uploaded_file($_FILES['attachment']['tmp_name'], $filename);
		}

		// envoi des brouillon dans la BD
		// $action_draft = $action == 'draft';
		// $draft = 1;
		// $sent = 0;
		$draft = $action == 'draft';
		// $sent = $action == 'draft' = 0;

		// envoi des brouillons dans la corbeille
		$delete = $action == 'delete';

		if (!empty($id)) {
			$query = $db->prepare('UPDATE mailbox SET destinataire = :destinataire, objet = :objet, message = :message, attachment = :attachment, draft = :draft, trash = :delete, date = NOW() WHERE id = :id');
			$query->bindValue('id', $id, PDO::PARAM_INT);
		// Si brouillon envoyé dans la corbeille
		} /*elseif (!empty($id) && $delete) {
		  $query = $db->prepare('UPDATE mailbox SET destinataire = :destinataire, objet = :objet, message = :message, attachment = :attachment, delete = :delete, date = NOW() WHERE id = :id');
			$query->bindValue('id', $id, PDO::PARAM_INT);
		// Si pas brouillon et pas effacé: envoi du message
	   } */
		else {
			$sql = 'INSERT INTO mailbox SET destinataire = :destinataire, objet = :objet, message = :message, attachment = :attachment, draft = :draft, trash = :delete';

			// if($draft){
			//     $sql .= ' '.$draft;
			// }

			if (!$draft) {
				$sql .= ', date = NOW()';
			}

			$query = $db->prepare($sql);
		}
		$query->bindValue('delete', $delete, PDO::PARAM_INT);
		$query->bindValue('draft', $draft, PDO::PARAM_INT);
		$query->bindValue('destinataire', $destinataire);
		$query->bindValue('objet', $objet);
		$query->bindValue('message', $message);
		$query->bindValue('attachment', $attachment);
		$query->execute();
		if (!empty($id)) {
			$result = $query !== false && empty(intval($query->errorCode()));
			//$id = $mail['id'];
		} else {
			$id = $result = $db->lastInsertId();
		}

		$result_msg = '';
		switch($action) {
			case 'draft':
				$result_msg = 'enregistré';
			break;
			case 'delete':
				$result_msg = 'supprimé';
			break;
			default:
				$result_msg = 'envoyé';
			break;
		}

		if (empty($result)) {
			echo '<div class="alert alert-danger" role="danger">Une erreur est survenue</div>';
		} /*elseif (empty($result) && $action == 'delete') {
			echo '<div class="alert alert-danger" role="success">Votre message bien été supprimé</div>';
			echo redirectJs('modules/mailbox/index.php');
		} */else {
			echo '<div class="alert alert-success" role="success">Votre message bien été '.$result_msg.'</div>';
			//echo redirectJs('modules/mailbox/index.php');
		}
		goto end;
		// exit;
	}
}

?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
	Mailbox
	<small><?= $count_mail ?> new messages</small>
</h1>
<ol class="breadcrumb">
	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Mailbox</li>
</ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-md-3">
	  <a href="modules/mailbox/index.php" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>
		<?php

		include_once 'partials/sidebar.php';
		?>

</div><!-- /.col -->
<div class="col-md-9">
  <div class="box box-primary">

		<form id="form-mailbox-compose" class="form-horizontal" action="" method="POST" enctype="multipart/form-data" novalidate>

	<?php
	if (!empty($errors)) {
		echo '<div class="alert alert-danger" role="danger">';
		foreach($errors as $error) {
			echo $error.'<br>';
		}
		echo '</div>';
	}
	?>

	<div class="box-header with-border">
	  <h3 class="box-title">Compose New Message</h3>
  </div><!-- /.box-header -->
  <div class="box-body">

	<?php
	foreach($fields as $field_name => $field_params) {
		$required = $field_params['required'];
		$type = $field_params['type'];
		$maxlength = !empty($field_params['maxlength']) ? intval($field_params['maxlength']) : 0;
		$label = ucfirst(!empty($field_params['label']) ? $field_params['label'] : $field_name);
		echo PHP_EOL;
		if ($type == 'textarea') {
			?>
			<div class="form-group">
				<!--label for="<?= $field_name ?>" class="col-sm-2 control-label"><?= $label ?></label -->
				<div class="col-sm-12">
					<textarea id="compose-textarea" name="<?= $field_name ?>" class="form-control" placeholder="<?= $label ?>" style="height: 300px;"><?= $$field_name ?></textarea>
				</div>
			</div>
			<?php } elseif ($type === 'file') { ?>

			<div class="form-group">
				<div class="col-sm-6">
					<div class="btn btn-default btn-file">
					  <i class="fa fa-paperclip"></i> Attachment
					  <input type="<?= $type ?>" name="<?= $field_name ?>"/>
				  </div>
				  <!-- <p class="help-block"><?= $field_name ?></p> -->
				  <p class="help-block">Max. 32MB</p>
			  </div>
			</div>

			<?php } elseif ($type === 'text' || $type == 'hidden') { ?>
			<div class="form-group"<?= $type == 'hidden' ? ' style="display:none"' : '' ?>>
				<div class="col-sm-12">
				<input class="form-control" type="<?= $type ?>" id="<?= $field_name ?>" name="<?= $field_name ?>" class="form-control" placeholder="<?= $label ?>:" value="<?= $$field_name ?>">
				</div>
			</div>
		<?php } /*else { ?>


		<?php } */
	}
	?>

</div><!-- /.box-body -->

<div class="box-footer">

	<a href="javascript:;">
<!--     <a href="drafts.php?draft=1&amp;id=<?= $id ?>"> -->
		<button id="btn-mailbox-draft" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
	</a>
	<a href="javascript:;">
		<button id="btn-mailbox-delete" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
	</a>

	<div class="pull-right">
		<button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i>
			Send
		</button>
	</div>
</form>

</div><!-- /.box-footer -->
</div><!-- /. box -->
</div><!-- /.col -->
</div><!-- /.row -->
</section><!-- /.content -->
</div><!-- /.content-wrapper -->
<?php end: ?>
<footer class="main-footer">
	<div class="pull-right hidden-xs">
	  <b>Version</b> 2.0
  </div>
  <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<?php include_once $root_dir.'/partials/sidebar-right.php' ?>

<!-- FOOTER -->
</div><!-- ./wrapper -->

<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- FastClick -->
<script src='plugins/fastclick/fastclick.min.js'></script>
<!-- AdminLTE App -->
<script src="js/app.min.js" type="text/javascript"></script>
<!-- AdminLTE for demo purposes -->
<script src="js/demo.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- Page Script -->
<script>
$(function () {
	//Add text editor
	$("#compose-textarea").wysihtml5();

	$('#btn-mailbox-draft').click(function() {
		//$('#form-mailbox-compose input[name="id"]').
		$('#form-mailbox-compose input[name="action"]').val('draft');
		$('#form-mailbox-compose').submit();
	});

	$('#btn-mailbox-delete').click(function() {
		if (confirm('Are you sure ?')) {
			//$('#form-mailbox-compose input[name="id"]').
			$('#form-mailbox-compose input[name="action"]').val('delete');
			$('#form-mailbox-compose').submit();
		}
		return false;
	});

});
</script>
</body>
</html>