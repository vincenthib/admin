<?php

require_once 'config.php';
include_once $root_dir.'/partials/header.php';

$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;

$fields = array(
	'destinataire' =>	array('required' => true, 'type' => 'text',		'maxlength' => 255, 'error' => 'Veuillez saisir le mail du destinataire.'),
	'objet' =>			array('required' => true, 'type' => 'text',		'maxlength' => 255, 'error' => 'Votre message doit avoir un obet.'),
	'message' =>		array('required' => true, 'type' => 'textarea',	'maxlength' => 0, 	'error' => 'Votre message ne peut être vide.')
);

foreach($fields as $field_name => $field_params) {
	$$field_name = !empty($_POST[$field_name]) ? $_POST[$field_name] : @$mailbox[$field_name];
	if (empty($$field_name) && !empty($field_params['default'])) {
		$$field_name = $field_params['default'];
	}
}

$errors = array();

if (!empty($_POST)) {
	foreach($fields as $field_name => $field_params) {
		if ($field_params['required'] !== false && empty($_POST[$field_name])) {
			$error_label = !empty($field_params['error']) ? $field_params['error'] : $field_name.' est obligatoire';
			$errors[$field_name] = $error_label;
		}
	}
	if (empty($errors)) {

		$query = $db->prepare('INSERT INTO mailbox SET destinataire = :destinataire, objet = :objet, message = :message, received = NOW()');
		$query->bindValue('destinataire', $destinataire);
		$query->bindValue('objet', $objet);
		$query->bindValue('message', $message);
		$query->execute();

		$id = $result = $db->lastInsertId();

		if (empty($result)) {
			echo '<div class="alert alert-danger" role="danger">Une erreur est survenue</div>';
		} else {
			echo '<div class="alert alert-success" role="success">Votre message bien été envoyé.</div>';
		}
		goto end;
	}
}

// echo '<pre>';
// print_r($errors);
// echo '</pre>';

// echo '<pre>';
// print_r($fields);
// echo '</pre>';
?>


<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">

				<form class="form-horizontal" action="" method="POST" enctype="multipart/form-data" novalidate>

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
						<i class="fa fa-envelope"></i>
						<h3 class="box-title">Quick Email</h3>
						<!-- tools box -->
						<div class="pull-right box-tools">
							<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
						</div><!-- /. tools -->
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
										<textarea id="compose-textarea" name="<?= $field_name ?>" class="form-control" placeholder="<?= $label ?>" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $$field_name ?></textarea>
									</div>
								</div>
								<?php } else { ?>
								<div class="form-group"<?= $type == 'hidden' ? ' style="display:none"' : '' ?>>
									<!--label for="<?= $field_name ?>" class="col-sm-2 control-label"><?= $label ?></label -->
									<div class="col-sm-12">
										<input class="form-control" type="<?= $type ?>" id="<?= $field_name ?>" name="<?= $field_name ?>" class="form-control" placeholder="<?= $label ?>:" value="<?= $$field_name ?>">
									</div>
								</div>
								<?php
							}
						}
						?>

					</div><!-- /.box-body -->
					<div class="box-footer">
						<div class="pull-right">
							<button type="submit" class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
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
	});
</script>
</body>
</html>
