<?php require_once 'config.php'; ?>
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
			<section class="content">

				<!-- Your Page Content Here -->
				<div class="row">
					<div class="col-md-3">
						<?php include "partials/nb-movies.php"; ?>
					</div>

					<div class="col-md-3">
						<?php include "partials/user_numb.php"; ?>
					</div>

					<div class="col-md-3">
						<?php include "partials/visitors.php"; ?>
					</div>

					<div class="col-md-3">
						<?php include "partials/genres.php"; ?>
					</div>

				</div>

				<div class="row">
					<div class="col-md-6">
						<?php include_once 'partials/users.php' ?>
					</div>
					<div class="col-md-6">
						<?php include_once 'partials/area.php' ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<?php include 'partials/browser-usage.php' ?>
					</div>

					<div class="col-md-6">
						<?php include "partials/donut-genres.php"; ?>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<?php include "partials/line-years.php"; ?>
					</div>
				</div>

<?php include_once 'partials/footer-charts.php' ?>
