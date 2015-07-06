		<aside class="main-sidebar">

			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">

				<!-- Sidebar user panel (optional) -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="img/user2-160x160.jpg" class="img-circle" alt="User Image" />
					</div>
					<div class="pull-left info">
						<p>Alexander Pierce</p>
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

					<?php

					$pages = array(
						'modules/calendar/index.php' => array('fa-calendar', 'Calendar'),
						'modules/chat/index.php' => array('fa-comments', 'Chat'),
						'modules/stats/index.php' => array('fa-bar-chart', 'Stats'),
						'modules/mailbox/index.php' => array('fa-envelope', 'Mailbox', array(
							'modules/mailbox/index.php' => 'Inbox',
							'modules/mailbox/read-mail.php' => 'Read',
							'modules/mailbox/compose.php' => 'Compose',
						))
					);

					foreach ($pages as $page_url => $page_options):

						$page_icon = $page_options[0];
						$page_name = $page_options[1];
						$sub_pages = !empty($page_options[2]) ? $page_options[2] : array();
						$sub_page_active = isset($page_options[2][$current_path]);

						$active = '';
						if ($current_path == $page_url || $sub_page_active) {
							$active = 'active';
						}

						if (empty($sub_pages)):
					?>
					<li class="<?=$active?>"><a href="<?= $page_url ?>"><i class="fa <?= $page_icon ?>"></i> <span><?= $page_name ?></span></a></li>
					<?php
						else:
					?>
					<li class="treeview <?=$active?>">
						<a href="<?= $page_url ?>"><i class='fa <?= $page_icon ?>'></i> <span><?= $page_name ?></span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<?php
							foreach($sub_pages as $sub_page_url => $sub_page_name):
								$active = '';
								if ($current_path == $sub_page_url) {
									$active = 'active';
								}
							?>
							<li class="<?= $active ?>"><a href="<?= $sub_page_url ?>"><?= $sub_page_name ?></a></li>
							<?php endforeach; ?>
						</ul>
					</li>
					<?php
						endif;

					endforeach;
					?>
				</ul><!-- /.sidebar-menu -->
			</section>
			<!-- /.sidebar -->
		</aside>