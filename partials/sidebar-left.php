		<aside class="main-sidebar">

			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">

				<!-- Sidebar user panel (optional) -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="img/user2-128x128.jpg" class="img-circle" alt="User Image" />
					</div>
					<div class="pull-left info">
						<p><?= user_fullname() ?></p>
						<!-- Status -->
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>

				<!-- search form (Optional) -->
				<form action="#" method="get" class="sidebar-form">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search..."/>
						<span class="input-group-btn">
							<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
				<!-- /.search form -->

				<!-- Sidebar Menu -->
				<ul class="sidebar-menu">
					<li class="header">HEADER</li>
					<!-- Optionally, you can add icons to the links -->
					<li class="active"><a href="partials/mailbox/mailbox.php"><i class='fa fa-link'></i> <span>Mailbox</span></a></li>
					<li><a href="#"><i class='fa fa-link'></i> <span>Another Link</span></a></li>
					<li class="treeview">
						<a href="modules/mailbox/index.php"><i class='fa fa-envelope'></i> <span>Mailbox</span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li><a href="modules/mailbox/index.php">Inbox</a></li>
							<li><a href="modules/mailbox/read-mail.php">Read</a></li>
							<li><a href="modules/mailbox/compose.php">Compose</a></li>
						</ul>
					</li>
					<li><a href="modules/stats/index.php"><i class='fa fa-bar-chart'></i> <span>Stats</span></a></li>
				</ul><!-- /.sidebar-menu -->
			</section>
			<!-- /.sidebar -->
		</aside>