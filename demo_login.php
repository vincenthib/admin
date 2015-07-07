<?php
require_once 'config.php';
include_once $root_dir.'/partials/header.php';
?>
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
			echo "user_id : <b>", user_id(), '</b><br/>';
			echo '<br/>';
			debug($_SESSION);
			?>
			<a href="modules/users/register.php">register</a><br/>
			<a href="modules/users/login.php">login</a><br/>
			<a href="modules/users/login_new.php">login (template)</a><br/>
			<a href="modules/users/logout.php">logout</a><br/>
			<br/>
			<pre class="prettyprint lang-php">
	require $root_dir.'/modules/users/user.php';

	user_fullname()  // Retourne le nom de l'utilisateur logué
	user_fullname( $user_id = 2 )  // Retourne le nom d'un autre l'utilisateur
	user_isLogged()  // Retourne true ou false
	user_id()        // Retourne le user_id de l'utilisateur logué (sinon: empty)</pre>
			<br/>
			<a href="modules/users/dev_users.sql">La table <b>users</b> doit être créée</a><br/>

<!-- #### login ################ end -->

			</section><!-- /.content -->


<?php include_once 'partials/footer.php' ?>