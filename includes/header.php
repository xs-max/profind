

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../custom.css">
    <link rel="stylesheet" href="../custom2.css">
    

    

    <?php  
  ob_start();
  session_start();
?>
    <title>PROFIND</title>
</head>
<body  class="grey lighten-3">
   
    <div class="navbar-fixed">
        <nav class="blue darken-1">
          <div class="container">
            <div class="nav-wrapper">
              <a href="index.php" class="logo">
                      <img src="img/PROFIND.png" width="100px" height="50px">
                  </a> <a class="sidenav-trigger" data-target="slide-out" href="#"><i class="material-icons">menu</i></a>
              <ul class="right hide-on-med-and-down">
                  <?php 
                    $url = $_SERVER['PHP_SELF'];
                    $pos = strrpos($url, "index.php");

                    if ($pos) {
                     echo '<li>
                      <a class="waves-effect" href="#home">Home</a>
                    </li>
                    <li>
                      <a class="waves-effect" href="#category">Categories</a>
                    </li>
                    <li>
                      <a class="waves-effect" href="#about">About</a>
                    </li>
                    <li>
                      <a class="waves-effect" href="#contact">Contact</a>
                    </li>' ;
                    }
                  ?>
                
                <li>
                  <a class="waves-effect dropdown-trigger" data-target='dropdown1' href="#links"><i class="material-icons">person</i></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
     <!-- Dropdown Structure -->
     <ul id="dropdown1" class="dropdown-content">
        <li><a href="admin/admin_login.php">Admin login</a></li>
        <li class="divider"></li>
        <li><a href="users/user_login.php">User login</a></li>
    </ul>
    <ul id="dropdown2" class="dropdown-content">
        <li><a href="admin/admin_login.php">Admin login</a></li>
        <li class="divider"></li>
        <li><a href="users/user_login.php">User login</a></li>
    </ul>
    <!-- side-nav -->
    <ul id="slide-out" class="sidenav blue accent-2">
    <?php 
                    $url = $_SERVER['PHP_SELF'];
                    $pos = strrpos($url, "index.php");

                    if ($pos) {
                     echo'
                      <li><a href="#home" class="white-text">Home</a></li>
                      <li><div class="divider light-green accent-4"></div></li>
                      <li><a href="#category" class="white-text">Categories</a></li>
                      <li><div class="divider light-green accent-4"></div></li>
                      <li><a href="#about" class="white-text">About</a></li>
                      <li><div class="divider light-green accent-4"></div></li>
                      <li><a href="#contact" class="white-text">Contact</a></li>
                      <li><div class="divider light-green accent-4"></div></li>';
                    }
                    ?>
        <li class="white-text"><a class="waves-effect dropdown-trigger section " data-target='dropdown2' href="#"><i class="material-icons">person</i></a></li>
  </ul>
    

  <!-- Banner -->
  

  