<?php require_once 'config.php';

include_once $root_dir.'/partials/header.php';

$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
$action = !empty($_GET['action']) ? $_GET['action'] : '';

if ($action == 'delete' && !empty($id)) {
    $query = $db->prepare('DELETE FROM mailbox WHERE id = :id');
    $query->bindValue('id', $id, PDO::PARAM_INT);
    $query->execute();
    $result = $query->rowCount();
    if (empty($result)) {
        echo '<div class="alert alert-danger" role="danger">Une erreur est survenue</div>';
    } else {
        echo '<div class="alert alert-success" role="success">Le brouillon a bien été supprimé</div>';
    }
    goto end;
}

$fields = array(
    'destinataire' =>        array('required' => true, 'type' => 'text',       'maxlength' => 255, 'error' => 'Veuillez saisir le mail du destinataire.'),
    'objet' =>       array('required' => true, 'type' => 'text',    'maxlength' => 255, 'error' => 'Votre message n\'a pas d\'obet.'),
    'message' =>    array('required' => true, 'type' => 'textarea',    'maxlength' => 0, 'error' => 'Votre message ne peut être vide.'),
    'attachment' => array('required' => false, 'type' => 'file')
);


if ($action == 'draft' && !empty($id)) {
    $query = $db->prepare('SELECT * FROM mailbox WHERE id = :id');
    $query->bindValue('id', $id, PDO::PARAM_INT);
    $query->execute();
    $mailbox = $query->fetch();
    if (empty($mailbox)) {
        exit('Undefined mailbox');
    }
}



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
    if(empty($destinataire) || !filter_var($destinataire, FILTER_VALIDATE_EMAIL)) {
        $errors['destinataire'] = 'Vous devez renseigner une adresse mail valide.';
    }
    if (empty($errors)) {

        $attachment = '';

        $max_size = 3200000;
        if (!empty($_FILES['attachment']['tmp_name']) && empty($_FILES['attachment']['error']) && $_FILES['attachment']['size'] < $max_size) {
            //$file_infos = pathinfo($_FILES['piece-jointe']['name']);
            //$extension = $file_infos['extension'];
            $attachment = $_FILES['attachment']['name'];
            $filename = 'attachments/'.$attachment;
            move_uploaded_file($_FILES['attachment']['tmp_name'], $filename);
        }

        $draft = $action == 'draft';

        if (!empty($id)) {
            $query = $db->prepare('UPDATE mailbox SET destinataire = :destinataire, objet = :objet, message = :message, attachment = :attachment, draft = :draft, date = NOW() WHERE id = :id');
            $query->bindValue('id', $id, PDO::PARAM_INT);
        } else {
            $sql = 'INSERT INTO mailbox SET destinataire = :destinataire, objet = :objet, message = :message, attachment = :attachment, draft = :draft';

            if (!$draft) {
                $sql .= ', date = NOW()';
            }
            $query = $db->prepare($sql);
        }
        $query->bindValue('draft', $draft);
        $query->bindValue('destinataire', $destinataire);
        $query->bindValue('objet', $objet);
        $query->bindValue('message', $message);
        $query->bindValue('attachment', $attachment);
        $query->execute();
        if ($action == 'draft') {
            $result = $query !== false && empty(intval($query->errorCode()));
            $id = $mailbox['id'];
        } else {
            $id = $result = $db->lastInsertId();
        }
        if (empty($result)) {
            echo '<div class="alert alert-danger" role="danger">Une erreur est survenue</div>';
        } else {
            echo '<div class="alert alert-success" role="success">Votre message bien été '.($action == 'draft' ? 'enregistré' : 'envoyé').'</div>';
            //echo redirectJs('movies.php');
        }
        goto end;
    }
}

?>


<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Mailbox
    <small>13 new messages</small>
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
      <div class="box box-solid">
        <div class="box-header with-border">
          <h3 class="box-title">Folders</h3>
          <div class='box-tools'>
            <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
        </div>
    </div>
    <div class="box-body no-padding">
      <ul class="nav nav-pills nav-stacked">
        <li><a href="modules/mailbox/index.php"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right">12</span></a></li>
        <li><a href="modules/mailbox/sent.php"><i class="fa fa-envelope-o"></i> Sent</a></li>
        <li><a href="modules/mailbox/drafts.php"><i class="fa fa-file-text-o"></i> Drafts</a></li>
        <li><a href="modules/mailbox/junk.php"><i class="fa fa-filter"></i> Junk <span class="label label-waring pull-right">65</span></a></li>
        <li><a href="modules/mailbox/trash.php"><i class="fa fa-trash-o"></i> Trash</a></li>
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
</div><!-- /.col -->
<div class="col-md-9">
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

            <?php } elseif ($type === 'text') { ?>
            <div class="form-group"<?= $type == 'hidden' ? ' style="display:none"' : '' ?>>
                <!--label for="<?= $field_name ?>" class="col-sm-2 control-label"><?= $label ?></label -->
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

    <a href="drafts.php?action=draft&id=<?= $id ?>">
        <button class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
    </a>
    <a href="delete.php?action=delete&id=<?= $id ?>">
        <button class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
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
    });
</script>
</body>
</html>