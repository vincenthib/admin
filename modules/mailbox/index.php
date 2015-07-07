<?php
    require_once 'config.php';
    include_once $root_dir.'/partials/header.php';
    require_once '../../inc/db.php';
?>

<?php
//compte des mails

      $query = $db->prepare('SELECT COUNT(*) as count_mail FROM mailbox WHERE 1');

      $query->execute();
      $result = $query->fetch();
      $count_mail = $result['count_mail'];
//fin compte des mails

$sort = !empty($_GET['sort']) ? $_GET['sort'] : 'DESC';
$search = !empty($_GET['search']) ? $_GET['search'] : '';

?>
<style>
.head_mail{
  border: none;
  background-color: #f9f9f9;
}
</style>

        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Mailbox
            <small><?= $count_mail ?></small>
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
              <a href="modules/mailbox/compose.php" class="btn btn-primary btn-block margin-bottom">Compose</a>
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Folders</h3>
                  <div class='box-tools'>
                    <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                  </div>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right"><?= $count_mail ?></span></a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                    <li><a href="drafts.php"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                    <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-waring pull-right">65</span></a></li>
                    <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                  </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Labels</h3>
                  <div class='box-tools'>
                    <button class='btn btn-box-tool' data-widget='collapse'><i class='fa fa-minus'></i></button>
                  </div>
                </div>
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
                <div class="box-header with-border">
                  <h3 class="box-title">Inbox</h3>
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                    <form method-"GET" action="modules/mailbox/index.php?sort=<?= $sort ?>">
                      <input type="text" class="form-control input-sm" placeholder="Search Mail" name="search" value="<?= $search ?>" method="GET"/>
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>

<?php
//debut search
      $count_results = 0;
      $search_mails = array();

$bindings = array();
$sql = 'SELECT * FROM mailbox ';

if (!empty($search)) {

    $sql .= ' WHERE objet like :search OR message like :search ';

    $bindings['search'] = '%'.$search.'%';
    //$count_results = $query->rowCount();
 };

$sql .= ' ORDER BY date '.$sort;

$query = $db->prepare($sql);
foreach($bindings as $key => $value) {
   $type = is_int($value) ? PDO::PARAM_INT : PDO::PARAM_STR;
   $query->bindValue($key, $value, $type);
}

$query->execute();
$file_mails = $query->fetchAll();

?>

                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                      1-50/200
                      <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                      <tbody>
                        <?php
//ajout/retrait checkboxes
                            /*$checkbox = !empty($_POST['checkbox']) ? intval($_POST['checkbox']) : 0;
                            $query = $db->prepare('INSERT INTO mailbox (checkbox) VALUES (:checkbox');
                            $query->bindValue('checkbox', $checkbox, PDO::PARAM_INT);
                            $query->execute();*/

//fin ajout/retrait checkbox

//ajout/retrait favoris
                          /*if( fa-star-o){

                              $query = $db->prepare('SELECT * FROM mailbox UPDATE favoris SET 1 WHERE ');

                              $query->bindValue('star', $star);

                              $query->execute();
                              $result = $db->lastInsertId();
                          }*/
//fin ajout/retrait favoris
//navbar inbox
                        ?>
                            <ul class="nav nav-tabs">
                              <td><button class="head_mail mailbox-star btn btn-default navbar-btn"><i class="fa fa-square-o"> </i></button></td>
                              <td><button class="head_mail mailbox-star btn btn-default navbar-btn"><i class="fa fa-star text-yellow"> Favoris</i></button></td>
                              <td><button class="head_mail mailbox-name btn btn-default navbar-btn"><i class="glyphicon glyphicon-user"> Expediteur</i></button></td>
                              <td><button class="head_mail mailbox-name btn btn-default navbar-btn"><i class="glyphicon glyphicon-pencil"> Objet</i></button></td>
                              <td><button class="head_mail mailbox-name btn btn-default navbar-btn"><i class="glyphicon glyphicon-paperclip"></i></button></td>
                              <td><a class="head_mail mailbox-name btn btn-default navbar-btn id_date" href="modules/mailbox?sort=<?= $sort== 'DESC' ? 'ASC' : 'DESC' ?>&search=<?= $search ?>"><i class="i_date glyphicon glyphicon-chevron-<?= $sort== 'DESC' ? 'up' : 'down' ?>"> Date</i></a></td>
                            </ul>
<!--changement chevron date OK-->


                        <?php
  //affichage liste mail
                             foreach($file_mails as $file_mail){
    //debut timer reception OK
                                $now = new DateTime();
                                $date_date = new DateTime($file_mail['date']);

                                $timer = $date_date->diff($now)->format("%a jrs %H:%i:%s");
    //fin  timer reception
                                   if(!empty($file_mail['attachment'])){
                                        $paperclip = 'glyphicon-paperclip';
                                        } else {
                                            $paperclip = '';
                                      }
                          ?>
                            <tr id="<?= $file_mail['id'] ?>">
                                <td><input type="checkbox" name="checkbox" value="1" ><!--?= $checkbox ? 'checked' : '' ?--></td>
                                <td id="mailbox-star" class="mailbox-star"><a href="#"><i id="icone-star" class="fa fa-star text-yellow"></i></a></td>
                                <td class="mailbox-name"><a href="modules/mailbox/read-mail.php?id=<?= $file_mail['id'] ?>"><?= $file_mail['destinataire'] ?></a></td>
                                <td class="mailbox-subject"><?= $file_mail['objet'] ?></td>
                                <td class="mailbox-attachment"><i class="attachment glyphicon <?= $paperclip ?>"></td>
                                <td class="mailbox-date">Recu depuis <b><?= $timer ?></b></td>
                            </tr>
                         <?php
 //fin liste mail
                            }
                          ?>

                      </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                    <button class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i></button>
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                      <button class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                    </div><!-- /.btn-group -->
                    <button class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                    <div class="pull-right">
                      1-50/200
                      <div class="btn-group">
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                        <button class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                </div>
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
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
    <!-- iCheck -->
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Page Script -->
    <script>
      $(function () {
        //Enable iCheck plugin for checkboxes
        //iCheck for checkbox and radio inputs
        $('.mailbox-messages input[type="checkbox"]').iCheck({
          checkboxClass: 'icheckbox_flat-blue',
          radioClass: 'iradio_flat-blue'
        });

        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function () {
          var clicks = $(this).data('clicks');
          if (clicks) {
            //Uncheck all checkboxes
            $(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
            $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
          } else {
            //Check all checkboxes
            $(".mailbox-messages input[type='checkbox']").iCheck("check");
            $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
          }
          $(this).data("clicks", !clicks);
        });

        //Handle starring for glyphicon and font awesome
        $(".mailbox-star").click(function (e) {
          e.preventDefault();
          //detect type
          var $this = $(this).find("a > i");
          var glyph = $this.hasClass("glyphicon");
          var fa = $this.hasClass("fa");

          //Switch states
          if (glyph) {
            $this.toggleClass("glyphicon-star");
            $this.toggleClass("glyphicon-star-empty");
          }

          if (fa) {
            $this.toggleClass("fa-star");
            $this.toggleClass("fa-star-o");

            var favorite = $this.hasClass("fa-star");
            var id = $this.closest('tr').attr('id');

          /*$.ajax({
              url: 'modules/mailbox/update-msg.php',
              method: 'POST',
              data: {id: mailbox-star, action:  }
              dataType: 'json'
              }).done(function() {
                $("#mailbox-star").addClass( "fa-star" );
            })
          }
        });
                /*$(document).ready(function(){
            $("#mailbox-star").click(function{
            $.post(
              'modules/mailbox/update-msg.php',
              {
                $('#icone-star').val()
              },
              'text'
              );
          });
        });*/

        /*
        $('a.id_date').on('click', function(){
            $('i.i_date').toggleClass('glyphicon-chevron-down');
            $('button.id_date').attr('value, old');
        });*/




    </script>

    <!-- AdminLTE for demo purposes -->
    <script src="js/demo.js" type="text/javascript"></script>
  </body>
</html>