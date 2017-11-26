<div class="container" id="main-container">
     <div class="modal fade userInfoModal" tabindex="-1" role="dialog" aria-labelledby="userInfoModal" aria-hidden="true">
          <div class="modal-dialog modal-lg">
               <div class="modal-content">
                    <div class="modal-header">
                         <h5 class="modal-title" id="exampleModalLabel">Informacje o <b><?php echo $uuser['user_firstname'] . " " . $uuser['user_lastname']; ?></b></h5>
                         <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                         </button>
                    </div>
               </div>
          </div>
     </div>
     <div class="row">
          <div class="col-xl-3" id="profileinfo">
               <div class="card">
                    <div class="card-body">
                         <a class="profile-pictures" href="profile.php?u=<?php echo $uuser['user_user_id']; ?>">
                              <img class="bg rounded-top" src="<?php echo $uuser['user_profile_background_picture']; ?>"/>
                              <div class="info">
                                   <img class="profile" src="<?php echo $uuser['user_profile_picture']; ?>"/>
                                   <div class="name">
                                        <h1><?php echo $uuser['user_firstname'] . " "; ?><br class="under1200"><?php echo $uuser['user_lastname']; ?></h1>
                                   </div>
                              </div>
                         </a>
                    <section>
                         <div class="add-friend-button">
                              <a class="btn btn-swines btn-sm" id="addUserToFriendsId<?php echo $uuser['user_user_id']; ?>" href=""><i class="fa fa-user-plus"></i> dodaj do znajomych</a>
                         </div>
                         <div class="bio">
                              <p><?php echo $uuser['user_bio']; ?></p>
                              <div class="buttons">
                                   <a class="btn btn-link" data-toggle="modal" data-target=".userInfoModal">informacje</a>
                                   <a class="btn btn-link" href="messages.php?rid=<?php echo $uuser['user_user_id']; ?>">wyślij wiadomość</a>
                                   <a class="btn btn-link" href="albums.php?u=<?php echo $uuser['user_user_id']; ?>">zdjęcia</a>
                                   <a class="btn btn-link text-danger" href="">zablokuj</a>
                              </div>
                              <div class="add-friend-button">
                                   <a class="btn btn-swines btn-sm" id="addUserToFriendsId<?php echo $uuser['user_user_id']; ?>" href=""><i class="fa fa-user-plus"></i> dodaj do znajomych</a>
                              </div>
                              <footer>
                                   <div class="column border-next">
                                        <h1>Znajomi</h1>
                                        <h2><?php echo $uuser['user_friends']; ?></h2>
                                   </div>
                                   <div class="column">
                                        <h1>Punkty</h1>
                                        <h2><?php if ($uuser['user_points'] > 5500) {echo "5500+";}else{ echo $uuser['user_points'];} ?></h2>
                                   </div>
                              </footer>
                         </div>
                    </section>
                    </div>
               </div>
               <div class="card">
                    <div class="card-body">
                         <div class="buttons secondbuttons">
                              <a class="btn btn-link btn btn-link" data-toggle="modal" data-target=".userInfoModal">informacje</a>
                              <a class="btn btn-link" href="messages.php?rid=<?php echo $uuser['user_user_id']; ?>">wyślij wiadomość</a>
                              <a class="btn btn-link" href="albums.php?u=<?php echo $uuser['user_user_id']; ?>">zdjęcia</a>
                              <a class="btn btn-link text-danger" href="">zablokuj</a>
                         </div>
                    </div>
               </div>
          </div>
          <div class="col-md-8" id="timeline">
               <ul class="list-group">
                    <li class="list-group-item">
                         <form action="" method="">
                              <div class="form-group">
                                   <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="What's on your mind?"></textarea>
                              </div>
                              <button class="btn btn-primary btn-md btn-block btn-swines" type="submit" name="createnewpost">Publish post</button>
                         </form>
                    </li>
                    <li class="list-group-item">
                         <a class="mediana" href="post.html">
                              <div class="media">
                                   <a href="profile.php">
                                        <img class="mr-3" src="https://scontent-frt3-2.xx.fbcdn.net/v/t1.0-9/19511494_780968788752461_1757222649295254114_n.jpg?oh=27e5cc0f1fdfce684ab5e54187faf7ce&amp;oe=5AA16C5D" alt=""/>
                                   </a>
                                   <ul class="list-group">
                                        <div class="media-body">
                                             <a href="profile.php" style="color: #000; text-decoration: none;">
                                                  <h5 class="mt-0">Jakub Milcarz</h5>
                                             </a>
                                             <p class="mt-0"><i class="fa fa-clock-o"></i> 24.11.2017 | 14:30</p>
                                             <p class="lead">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                        </div>
                                        <li class="media-footer list-group-item">
                                             <a class="btn btn-link" href=""><i class="fa fa-heart"></i> 53</a>
                                             <a class="btn btn-link" href=""><i class="fa fa-comment"></i> 653</a>
                                             <a class="btn btn-link" href=""><i class="fa fa-share"></i> 1492</a>
                                        </li>
                                   </ul>
                              </div>
                         </a>
                    </li>
               </ul>
          </div>
     </div>
</div>
