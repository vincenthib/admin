<?php require_once 'config.php';
      require_once 'db.php';
 ?>
<?php include_once $root_dir.'/partials/header.php';?>

			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Stats
					<small>Optional description</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
					<li class="active">Here</li>
				</ol>
			</section>

			<!-- Main content -->
			<?php require_once "donut-genres.php"; ?>



<?php include_once 'partials/footer-charts3.php' ?>
