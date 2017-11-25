<?php require_once("./app/init.php");

if (isset($_POST['registerbtn'])) {
     auth::register($_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['phone'], $_POST['dob'], $_POST['gender'], $_POST['password'], $_POST['rpassword']);
}

if (auth::loggedin()) {
     header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="<?php echo init::$system_lang; ?>">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title><?php echo init::$system_name; ?></title>
     <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
     <div class="wrapper">
          <form class="form-signin" method="post" action="">
               <h2 class="form-signin-heading">Create account</h2>
               <div class="row">
                    <div class="col-md">
                         <input class="form-control" type="text" placeholder="First name" name="firstname" autofocus="" required="">
                    </div>
                    <div class="col-md">
                         <input class="form-control" type="text" placeholder="Last name" name="lastname" required="">
                    </div>
               </div>
               <input class="form-control" type="text" name="email" placeholder="Email address" required="">
               <input class="form-control" type="phone" name="phone" placeholder="Phone number" required="">
               <input class="form-control" type="date" name="dob" placeholder="birthday" required="">
               <select name="gender" class="form-control" required="">
                    <option value="m">male</option>
                    <option value="f">female</option>
               </select>
               <div class="row">
                    <div class="col-md">
                         <input class="form-control" type="password" placeholder="Password" required="" name="password">
                    </div>
                    <div class="col-md">
                         <input class="form-control" type="password" placeholder="Repeat Password" required="" name="rpassword">
                    </div>
               </div>
               <button class="btn btn-lg btn-primary btn-block" type="submit" name="registerbtn">register</button>
               <a href="login.php">already have account?</a>
          </form>
     </div>

     <script src="assets/js/jquery.js"></script>
     <script src="assets/js/functions.js"></script>
</body>
</html>
