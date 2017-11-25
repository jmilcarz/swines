<?php

class User {

     public $id, $firstname, $lastname, $email, $phone, $gender, $dob, $profile_img, $background_img, $active, $points;
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

     public static function displayInfo() {
          // info modal
     }

}
