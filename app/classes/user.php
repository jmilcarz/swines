<?php

class User {

     public $id, $firstname, $lastname, $email, $phone, $gender, $dob, $profile_img, $background_img, $active, $points, $friends;
     protected $password;

     public function __construct() {
          $this->id = DB::query('SELECT user_user_id FROM users WHERE user_user_id=:uuid', [':uuid'=>auth::loggedin()])[0]['user_user_id'];
          $this->firstname = DB::query('SELECT user_firstname FROM users WHERE user_user_id=:uuid', [':uuid'=>auth::loggedin()])[0]['user_firstname'];
          $this->lastname = DB::query('SELECT user_lastname FROM users WHERE user_user_id=:uuid', [':uuid'=>auth::loggedin()])[0]['user_lastname'];
          $this->email = DB::query('SELECT user_email FROM users WHERE user_user_id=:uuid', [':uuid'=>auth::loggedin()])[0]['user_email'];
          $this->password = DB::query('SELECT user_password FROM users WHERE user_user_id=:uuid', [':uuid'=>auth::loggedin()])[0]['user_password'];
          $this->phone = DB::query('SELECT user_phone FROM users WHERE user_user_id=:uuid', [':uuid'=>auth::loggedin()])[0]['user_phone'];
          $this->gender = DB::query('SELECT user_gender FROM users WHERE user_user_id=:uuid', [':uuid'=>auth::loggedin()])[0]['user_gender'];
          $this->dob = DB::query('SELECT user_dob FROM users WHERE user_user_id=:uuid', [':uuid'=>auth::loggedin()])[0]['user_dob'];
          $this->bio = DB::query('SELECT user_bio FROM users WHERE user_user_id=:uuid', [':uuid'=>auth::loggedin()])[0]['user_bio'];
          $this->profile_img = DB::query('SELECT user_profile_picture FROM users WHERE user_user_id=:uuid', [':uuid'=>auth::loggedin()])[0]['user_profile_picture'];
          $this->background_img = DB::query('SELECT user_profile_background_picture FROM users WHERE user_user_id=:uuid', [':uuid'=>auth::loggedin()])[0]['user_profile_background_picture'];
          $this->active = DB::query('SELECT user_active FROM users WHERE user_user_id=:uuid', [':uuid'=>auth::loggedin()])[0]['user_active'];
          $this->points = DB::query('SELECT user_points FROM users WHERE user_user_id=:uuid', [':uuid'=>auth::loggedin()])[0]['user_points'];
          $this->friends = DB::query('SELECT user_friends FROM users WHERE user_user_id=:uuid', [':uuid'=>auth::loggedin()])[0]['user_friends'];
     }

     public static function all() {
          $users = DB::query('SELECT * FROM users');
          return $users;
     }

     public static function update() {
          // after edit / settings
     }

     public static function delete() {
          // delete user
     }

     public static function searchAll($phrase) {
          // search page
          $users = DB::query("SELECT * FROM users WHERE user_firstname OR user_lastname OR user_email LIKE '%" . $phrase . "%'");
          ?>
               <div class="container" id="main-container">
                    <div class="row">
                         <div class="col-xl-10 ml-auto mr-auto" id="searchpage">
                              <div class="card">
                                   <?php
                                   if (count($users) < 1) {
                                        echo "<h1>brak wyników dla frazy <b>" . $phrase . "</b> :/</h1>";
                                        exit();
                                   }
                                   if ($phrase != "") {
                                        echo "<h1>wyniki wyszukiwania dla frazy <b>" . $phrase . "</b></h1>";
                                   }

                                   ?>

                                   <ul class="list-group">
                                        <div class="row">
                                             <?php foreach ($users as $user) { ?>
                                             <a class="col-xl-4" href="profile.php?u=<?php echo $user['user_user_id']; ?>">
                                                  <div class="card">
                                                       <img class="card-img-top" src="<?php echo $user['user_profile_picture']; ?>" alt=""/>
                                                       <div class="card-body">
                                                            <h4 class="card-title"><?php echo $user['user_firstname'] . " " . $user['user_lastname']; ?></h4>
                                                            <form>
                                                                 <input type="hidden" name="userid" value="<?php echo $user['user_user_id']; ?>">
                                                                 <button class="btn btn-swines" type="submit" name="add-to-friend">dodaj do znajomych</button>
                                                            </form>
                                                       </div>
                                                  </div>
                                             </a>
                                             <?php } ?>
                                        </div>
                                   </ul>
                              </div>
                         </div>
                    </div>
               </div>
               <?php
     }

}
