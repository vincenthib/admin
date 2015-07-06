<?php 

      $db_movie = getDb('movies');

      $query = $db_movie->prepare('SELECT COUNT(*) as count_movies FROM movies');
      $query->execute();
      $result = $query->fetch();
      $count_movies = $result['count_movies'];


?> 


<div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-files-o"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Nombres de Film en Base de donnés</span>
                  <span class="info-box-number"><?= $count_movies ?></span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 50%"></div>
                  </div>
                  <span class="progress-description">
                    50% Increase in 30 Days
                  </span>
                </div><!-- /.info-box-content -->
              </div>