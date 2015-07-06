 <?php 
 $query = $db->prepare('SELECT COUNT(*) as count_users FROM users ');
 $query->execute();
 $result = $query->fetch();
 $count_users = $result['count_users'];

  ?>

  <div class="small-box bg-yellow">
                <div class="inner">
                  <h3><?= $count_users ?></h3>
                  <p>Nombres d'utilisateurs incrits</p>
                </div>
                <div class="icon">
                  <i class="ion ion-person-add"></i>
                </div>
                <a href="../../../../movies/admin/users.php" class="small-box-footer">
                  More info <i class="fa fa-arrow-circle-right"></i>
                </a>
              </div>