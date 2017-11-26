<?php require_once("./app/init.php");?>
<!DOCTYPE html>
<html lang="<?php echo init::$system_lang; ?>">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title><?php echo $_GET['q'] . " | " . init::$system_name; ?></title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
     <link rel="stylesheet" href="./assets/css/main.css">
</head>
<body>
     <?php
          require_once('modules/nav.php');
          User::searchAll($_GET['q']);
     ?>



     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
     <script src="assets/js/bootstrap.js"></script>
     <script src="assets/js/functions.js"></script>
</body>
</html>
