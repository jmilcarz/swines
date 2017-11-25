<nav class="navbar navbar-expand-md navbar-light bg-light navbar-swines fixed-top" id="navbar-swines">
     <a class="navbar-brand" href="#">
          <img class="d-inline-block align-top" src="assets/img/logow.png" width="30" height="30" alt=""/> Swines
     </a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
               <input class="form-control mr-sm-2" type="search" placeholder="Search..." aria-label="Search" name="q">
               <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i> Search</button>
          </form>
          <ul class="navbar-nav ml-auto">
               <li class="nav-item active">
                    <a class="nav-link" href="feed.php"><i class="fa fa-bolt"></i></a>
               </li>
               <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-comments"></i></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-notify" aria-labelledby="navbarDropdown3">
                         <div class="card notifications messages">
                              <div class="card-header">Last Messages</div>
                              <!-- <ul class="list-group list-group-flush">
                                   <li class="list-group-item"> <a href=""><img src="https://scontent-frt3-2.xx.fbcdn.net/v/t1.0-1/p50x50/19875530_277389796001652_2077461921676567620_n.jpg?oh=6f2fb4ede29ec66406b816280816c88a&amp;oe=5A899DF3"/>Kuba Maxilcarz ~ Co tam wrrr?!</a></li>
                                   <li class="list-group-item"> <a href=""><img class="notify-img" src="https://scontent-frt3-2.xx.fbcdn.net/v/t1.0-1/p50x50/19875530_277389796001652_2077461921676567620_n.jpg?oh=6f2fb4ede29ec66406b816280816c88a&amp;oe=5A899DF3"/>Wojtek Pobuszka ~ Heja siemanczeko!</a></li>
                                   <li class="list-group-item"> <a href=""><img class="notify-img" src="https://scontent-frt3-2.xx.fbcdn.net/v/t1.0-1/p50x50/19875530_277389796001652_2077461921676567620_n.jpg?oh=6f2fb4ede29ec66406b816280816c88a&amp;oe=5A899DF3"/>Ola Werecka ~ Dawno się nie widzieliśmy. Co tam?</a></li>
                                   <li class="list-group-item"> <a href=""><img class="notify-img" src="https://scontent-frt3-2.xx.fbcdn.net/v/t1.0-1/p50x50/19875530_277389796001652_2077461921676567620_n.jpg?oh=6f2fb4ede29ec66406b816280816c88a&amp;oe=5A899DF3"/>Kuba Milcarz ~ Czemuuuuu???!111!11</a></li>
                                   <li class="list-group-item"> <a href=""><img class="notify-img" src="https://scontent-frt3-2.xx.fbcdn.net/v/t1.0-1/p50x50/19875530_277389796001652_2077461921676567620_n.jpg?oh=6f2fb4ede29ec66406b816280816c88a&amp;oe=5A899DF3"/>Kuba Milcarz ~ Czemuuuuu???!111!11</a></li>
                              </ul> -->
                         </div>
                    </div>
               </li>
               <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-globe"></i></a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-notify" aria-labelledby="navbarDropdown3">
                         <div class="card notifications">
                              <div class="card-header">Notifications</div>
                              <!-- <ul class="list-group list-group-flush">
                                   <li class="list-group-item"> <a href=""><b>Kuba Milcarz</b> polubił twój post</a></li>
                                   <li class="list-group-item"> <a href=""><b>Wojtek Malinowski</b> polubił twój post</a></li>
                                   <li class="list-group-item"><a href=""><b>Kuba Milcarz</b> polubił twój post</a></li>
                                   <li class="list-group-item"><a href=""><b>Wojtek Malinowski</b> polubił twój post</a></li>
                                   <li class="list-group-item"><a href=""><b>Kuba Milcarz</b> polubił twój post</a></li>
                                   <li class="list-group-item"><a href=""><b>Wojtek Malinowski</b> polubił twój post</a></li>
                              </ul> -->
                         </div>
                    </div>
               </li>
               <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i></a>
                    <div class="dropdown-menu dropdown-menu-right user-settings" aria-labelledby="navbarDropdown2">
                         <a class="dropdown-item" href="profile.php?u=<?php echo $user->id; ?>"><i class="fa fa-user-circle"></i> <?php echo $user->firstname . " " . $user->lastname; ?></a>
                         <a class="dropdown-item" href="feed.php"><i class="fa fa-feed"></i> feed</a>
                         <a class="dropdown-item" href="messages.php"><i class="fa fa-comments"></i> messages</a>
                         <div class="dropdown-divider" role="separator"></div>
                         <a class="dropdown-item" href="edit.php"><i class="fa fa-edit"></i> edit profile</a>
                         <a class="dropdown-item" href="settings.php"><i class="fa fa-cogs"></i> settings</a>
                         <div class="dropdown-divider" role="separator"></div>
                         <form action="" method="post" style="display: block; margin: 0 auto; width: 100%;">
                              <button type="submit" name="signoutbtn" style="display: block; margin: 0 auto; width: 100%; background: none; border: none; color: #fff;"><i class="fa fa-sign-out"></i> Wyloguj się</button>
                         </form>
                    </div>
               </li>
          </ul>
     </div>
</nav>
