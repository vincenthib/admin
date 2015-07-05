<?php include_once 'partials/header.php' ?>
<?php require_once 'modules/func_dev.php' ?>



			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Demo login
					<small>Optional description</small>
				</h1>

				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Chat</a></li>
					<li class="active">demo</li>
				</ol>

			</section>

			<!-- Main content -->
			<section class="content">

<!-- #### login ################ start -->
			<?php
			debug($_SESSION);
			echo "user_id : ", user_id(), '<br/>';
			?>
			<a href="modules/users/register.php">register</a><br/>
			<a href="modules/users/login.php">login</a><br/>
			<a href="modules/users/login_new.php">login (template)</a><br/>
			<a href="modules/users/logout.php">logout</a><br/>
			<pre>
	require $root_dir.'/modules/users/user.php';
	echo user_fullname(); Retourne le nom de l'utilisateur logué
	echo user_fullname(2); Retourne le nom de l'utilisateur avec user_id = 2
	user_isLogged(); Retourne true ou false
	user_id(); Retourne le user_id de l'utilisateur logué (si non: empty)
			</pre>
<!-- #### login ################ end -->

			</section><!-- /.content -->



<?php include_once 'partials/footer.php' ?>