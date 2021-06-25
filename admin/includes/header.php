<?php 
        ob_start();
        session_start();
        // include('functions.php');


        


        $url = $_SERVER['PHP_SELF'];
        $pos = strrpos($url, "index.php");
        $pos2 = strrpos($url, "profile.php");
        $pos3 = strrpos($url, "add_admin.php");
        $pos4 = strrpos($url, "view_users.php");
        if ($pos) {
            $classname = "current"; 
        }else{
            $classname = "sidebar-link";
        }
        if ($pos2) {
            $classname2 = "current"; 
        }else{
            $classname2 = "sidebar-link";
        }
        if ($pos3) {
            $classname3 = "current"; 
        }else{
            $classname3 = "sidebar-link";
        }
        if ($pos4) {
            $classname4 = "current"; 
        }else{
            $classname4 = "sidebar-link";
        }
   
?>

<?php 
                    if (isset($_SESSION['admin_is_logged'])) {
                        $firstname =   $_SESSION['userdata']['firstname'];
                        $image     =   $_SESSION['userdata']['image'];
                        $id        =   $_SESSION['userdata']['id'];
    
                    }else{
                        header('location: logout.php');
                    }
                ?>





<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="title icon" href="img/images.png">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<link rel="stylesheet" href="'https://fonts.googleapis.com/css?family=Montserrat'">
<link rel="stylesheet" href="../admin/style.css">
<title>PROFIND</title>
</head>
<body>
    <!-- NavBAr -->
     <nav class="navbar navbar-expand-md navbar-light">
        <button type="button" class="navbar-toggler ml-auto mb-2 bg-light" data-target="#myNavbar" data-toggle="collapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="myNavbar">
            <div class="container-fluid">
                <div class="row">

              
                    <!-- col sidebar -->
                    <div class="col-lg-3 col-xl-2 col-md-4 sidebar bg-secondary fixed-top">
                        <a href="index.php" class="navbar-brand text-white d-block mx-auto text-center py-3 mb-4 buttom-border">Admin DashBoard</a>
                        <div class="buttom-border pb-3 ml-auto">
                           <a href="profile.php?admin_id=<?php echo $id ?>"><?php echo $image ?></a>
                            <a href="#" class="text-white"><?php echo $firstname ?></a>
                        </div>
                        <ul class="navbar-nav flex-column mt-4 ">
                            <li class="nav-item">
                                <a href="index.php" class="nav-link text-white p-2 mb-4 <?php echo $classname; ?> ">
                                    <i class="fas fa-home text-light fa-lg mr-3"></i>Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="profile.php?admin_id=<?php echo $id ?>" class="nav-link text-white p-2 mb-4 <?php echo $classname2; ?> ">
                                    <i class="fas fa-user text-light fa-lg mr-3"></i>Profile
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="add_admin.php" class="nav-link text-white p-2 mb-4 <?php echo $classname3; ?>">
                                    <i class="fas fa-users text-light fa-lg mr-3"></i>Add Admin
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="view_users.php" class="nav-link text-white p-2 mb-4 <?php echo $classname4; ?>">
                                    <i class="fas fa-table text-light fa-lg mr-3"></i>View users Tables
                                </a>
                        </ul>
                    </div>
                    <!-- end of sidebar -->
                    <!-- Top Nav -->
                    <div class="col-lg-9 col-xl-10 col-md-8 ml-auto bg-secondary fixed-top py-2 top-navbar nav-color">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <h4 class="text-info text-uppercase mb-0"><span class="text-danger">PRO</span>find</h4>
                            </div>
                            <div class="col-md-5">
                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control search-input" placeholder="search">
                                        <button type="button" class="btn btn-light search-button"><i class="fas fa-search text-danger"></i></button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-3">
                                <ul class="navbar-nav">
                                    <li class="nav-item icon-parent">
                                        <a href="../index.php" class="btn btn-danger"><i class="fas fa-location-arrow"> Visit Front Page</i></a>
                                    </li>
                                    <li class="nav-item ml-md-auto ">
                                        <a href="" class="nav-link" data-toggle="modal" data-target="#sign-out"><i class="fas fa-sign-out-alt text-danger fa-lg "></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Of Top Nav -->
                </div>
            </div>
        </div>
     </nav>
    <!-- End of Navbar -->

    <!-- modal -->
    <div id="sign-out" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Want to Leave?</h4>
                    <button class="close" data-dismiss="modal" type="button">&times;</button>
                </div>
                <div class="modal-body">press logout to leave</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Stay Here</button>
                   <a href="logout.php" class="btn btn-danger">Logout</a> 
                </div>
            </div>
        </div>
    </div>
    <!-- end of modal -->