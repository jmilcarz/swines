<?php
class auth {
     public static $system_cookie_name = "SWS";
     public static $system_login_with_email_or_phone = true;
     static function logout() {
          DB::query('DELETE FROM login_tokens WHERE login_token_userid=:userid', array(':userid'=>self::loggedin()));
          setcookie("" . self::$system_cookie_name . "", '1', time()-3600);
          setcookie("" . self::$system_cookie_name . "_", '1', time()-3600);
          header('Location: '.$_SERVER['PHP_SELF']);
     }
     static function isloggedin() {
          if (!self::loggedin()) {
               require("./app/login_again.php");
               exit();
          }
     }

     public function loggedin() {
          if (isset($_COOKIE['' . self::$system_cookie_name . ''])) {
               if (DB::query('SELECT login_token_userid FROM login_tokens WHERE login_token_token=:token', array(':token'=>sha1($_COOKIE['' . self::$system_cookie_name . ''])))) {
                    $userid = DB::query('SELECT login_token_userid FROM login_tokens WHERE login_token_token=:token', array(':token'=>sha1($_COOKIE['' . self::$system_cookie_name . ''])))[0]['login_token_userid'];
                    if (isset($_COOKIE['' . self::$system_cookie_name . '_'])) {
                         return $userid;
                    } else {
                         $cstrong = True;
                         $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                         DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$userid));
                         DB::query('DELETE FROM login_tokens WHERE login_token_token=:token', array(':token'=>sha1($_COOKIE["" . self::$system_cookie_name . ""])));
                         setcookie("" . self::$system_cookie_name . "", $token, time() + 60 * 60 * 24 * 30, '/', NULL, NULL, TRUE);
                         setcookie("" . self::$system_cookie_name . "_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                         return $userid;
                    }
               }
          }
          return false;
     }

     public static function login($phone, $password) {
          if (self::$system_login_with_email_or_phone == false) {
               if (DB::query('SELECT user_email FROM users WHERE user_email=:email', array(':email'=>$phone))) {
                    if (password_verify($password, DB::query('SELECT user_password FROM users WHERE user_email=:email', array(':email'=>$phone))[0]['user_password'])) {
                         echo 'Logged in!';
                         $cstrong = True;
                         $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                         $user_id = DB::query('SELECT user_user_id FROM users WHERE user_email=:email', array(':email'=>$phone))[0]['user_user_id'];
                         DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
                         setcookie("" . self::$system_cookie_name . "", $token, time() + 60 * 60 * 24 * 30, '/', NULL, NULL, TRUE);
                         setcookie("" . self::$system_cookie_name . "_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                         header("Location: " . $_SERVER['PHP_SELF'] . "");
                    } else {
                         echo 'Invalid email!';
                    }
               } else {
                    echo 'Invalid username!';
               }
          }else {
               if (strpos($phone, "@") != false) {
                    if (DB::query('SELECT user_email FROM users WHERE user_email=:user_email', array(':user_email'=>$phone))) {
                         if (password_verify($password, DB::query('SELECT user_password FROM users WHERE user_email=:user_email', array(':user_email'=>$phone))[0]['user_password'])) {
                              echo 'Logged in!';
                              $cstrong = True;
                              $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                              $user_id = DB::query('SELECT user_user_id FROM users WHERE user_email=:email', array(':email'=>$phone))[0]['id'];
                              DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
                              setcookie("" . self::$system_cookie_name . "", $token, time() + 60 * 60 * 24 * 30, '/', NULL, NULL, TRUE);
                              setcookie("" . self::$system_cookie_name . "_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                              header("Location: " . $_SERVER['PHP_SELF'] . "");
                         } else {
                              echo 'Invalid phone!';
                         }
                    } else {
                         echo 'Invalid username!';
                    }
               }else {
                    if (DB::query('SELECT user_phone FROM users WHERE user_phone=:user_phone', array(':user_phone'=>$phone))) {
                         if (password_verify($password, DB::query('SELECT user_password FROM users WHERE user_phone=:user_phone', array(':user_phone'=>$phone))[0]['user_password'])) {
                              echo 'Logged in!';
                              $cstrong = True;
                              $token = bin2hex(openssl_random_pseudo_bytes(64, $cstrong));
                              $user_id = DB::query('SELECT user_user_id FROM users WHERE user_phone=:user_phone', array(':user_phone'=>$phone))[0]['user_user_id'];
                              DB::query('INSERT INTO login_tokens VALUES (\'\', :token, :user_id)', array(':token'=>sha1($token), ':user_id'=>$user_id));
                              setcookie("" . self::$system_cookie_name . "", $token, time() + 60 * 60 * 24 * 30, '/', NULL, NULL, TRUE);
                              setcookie("" . self::$system_cookie_name . "_", '1', time() + 60 * 60 * 24 * 3, '/', NULL, NULL, TRUE);
                              header("Location: " . $_SERVER['PHP_SELF'] . "");
                         } else {
                              echo 'Invalid Password!';
                         }
                    } else {
                         echo 'Invalid email!';
                    }
               }
          }
     }

     public static function register($firstname, $lastname, $email, $phone, $dob, $gender, $password, $rpassword) {
          if (!DB::query('SELECT user_phone FROM users WHERE user_phone=:user_phone', [':user_phone'=>$phone])) {
          if (strlen($phone) == 9) {
          if (preg_match('/[0-9]+/', $phone)) {
               if (strlen($password) >= 6 && strlen($password) <= 60) {
               if ($password == $rpassword) {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if (!DB::query('SELECT user_email FROM users WHERE user_email=:user_email', [':user_email'=>$email])) {
                         if ($gender == 'm') {
                              $profileimg = "public_files/def/user-male.jpg";
                         }else {
                              $profileimg = "public_files/def/user-female.jpg";
                         }
                         $backgroundimg = "public_files/def/background.png";
                         $fullname = $firstname . " " . $lastname;
                         $points = 50;
                         DB::query('INSERT INTO users VALUES (\'\', :fullname, :firstname, :lastname, :email, :password, :phone, :gender, :dob, \'\', :profileimg, :backgroundimg, 0, :points, 0)', [':fullname'=>$fullname, ':firstname'=>$firstname, ':lastname'=>$lastname, ':email'=>$email, ':password'=>password_hash($password, PASSWORD_BCRYPT), ':phone'=>$phone, ':gender'=>$gender, ':dob'=>$dob, ':profileimg'=>$profileimg, ':backgroundimg'=>$backgroundimg, ':points'=>$points]);
                         Mail::sendMail('Welcome!', 'Your account has been created!', $email);
                         self::login($phone, $password);
                         header("Location: profile.php");


                    }else {echo 'Email already in use!';}
                    }else {echo 'Invalid email!';}
               }else {echo 'Passwords are not the same!';}
               }else {echo 'Invalid password (min: 4; max: 32)!';}
          }else {echo 'Invalid phone!';}
     }else {echo 'Invalid phone!';}
     }else {echo 'Phone already in use!';}
     }
}
