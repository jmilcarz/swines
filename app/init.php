<?php

function __autoload($class_name) {
     require_once './app/classes/' . $class_name . '.php';
}

class init {
     static $system_name = "swines";
     static $system_lang = "pl";
     static $system_Mail_email = "phpstarter@phpstarter.example";
     static $system_Mail_password = "swines";
     static $system_Mail_sentFrom = "swines";
}

// functions
$host = $_SERVER['REQUEST_URI'];
// echo $host;
if ($host == "/swines/register.php" || $host == "/swines/login.php") {
     echo "";
}else {
     if (auth::loggedin()) {

     }else {
          auth::isloggedin(); // check if user is loggedin or not
     }
}

// logout
if (isset($_POST['signoutbtn'])) {
     auth::logout();
}

$loggedinUser = DB::query('SELECT * FROM users WHERE user_user_id=:id', [':id'=>auth::loggedin()]);
$user = new user;
