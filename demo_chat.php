<?php
require_once 'modules/dev_func.php';
?>
<script src="plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>



<?php include_once 'partials/header.php' ?>


			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Demo chat
					<small>Optional description</small>
				</h1>

				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Chat</a></li>
					<li class="active">demo</li>
				</ol>

			</section>

			<!-- Main content -->
			<section class="content">

<!-- #### chat ################# start -->
				<?php  include_once '/modules/chat/partial.php';  ?>
<!-- #### chat ################# end -->


<!-- #### login ################ start -->
			<?php debug($_SESSION); ?>
<!-- #### login ################ end -->


			</section><!-- /.content -->


<?php include_once 'partials/footer.php' ?>
