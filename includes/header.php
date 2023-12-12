<?php

session_start();
define("URL", "http://localhost/forum");
define("auth", "http://localhost/forum/auth");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome To Forum</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo URL ?>/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo URL ?>/css/custom.css" rel="stylesheet">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo URL; ?>/index.php">Forum</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a href="<?php echo URL; ?>/index.php">Home</a></li>



          <?php if(isset($_SESSION['name'])): ?>
          <li><a href="<?php echo URL; ?>/topics/create.php">Create Topic</a></li>
            <li><div class="dropdown show">
    <a class="btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php echo $_SESSION['name']; ?>
    <?php if(isset($_SESSION['avatar'])): ?>

        <img src="<?php echo $_SESSION['avatar']; ?>" style="width: 30px; height: 30px; border-radius: 50%;" alt="User Avatar">
    <?php endif; ?>
    </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
      <a class="dropdown-item" href="#" style="display: block; width:100%;">My topics</a>
      <a class="dropdown-item" href="#" style="display: block; width:100%;">MY replies</a>
      <a class="dropdown-item" href="<?php echo URL; ?>/auth/logout.php" style="display: block; width:100%;">logout</a>
    </div>
  </div></li>
<?php else:   ?>
  <li><a href="<?php echo auth; ?>/register.php">Register</a></li>
  <li><a href="<?php echo auth; ?>/login.php">login</a></li>
<?php endif; ?>
          </ul>


        </div><!--/.nav-collapse -->
      </div>
    </div>
