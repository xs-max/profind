<?php  
        ob_start();
        session_start();
?>

 
<?php
/************** Register new Admin ******************/
//Include functions
include('includes/functions.php');

//check to see if user if logged in else redirect to index page


//require database class files
require('includes/pdocon.php');


//instatiating our database objects
$db = new Pdocon;


//Collect and clean values from the form // Collect image and move image to upload_image folder
if (isset($_POST['submit_login'])) {
    if($_POST['password'] === $_POST['c_password']){
        if ($_POST['category'] != "null") {
            if ($_POST['gender'] != "null") {
                $raw_firstname      =    cleanData($_POST['firstname']);
                $raw_middlename     =    cleanData($_POST['middlename']);
                $raw_lastname       =    cleanData($_POST['lastname']);
                $raw_email          =    cleanData($_POST['username']);
                $raw_password       =    cleanData($_POST['password']);
                $raw_phone          =    cleanData($_POST['phone']);
                $raw_address        =    cleanData($_POST['address']);
                $raw_city           =    cleanData($_POST['city']);
                $raw_state          =    cleanData($_POST['state']);
                $category           =    $_POST['category'];
                $gender             =    $_POST['gender'];
                $cleanFname         =    sanitizeStr($raw_firstname);
                $cleanMname         =    sanitizeStr($raw_middlename);
                $cleanLname         =    sanitizeStr($raw_lastname);
                $cleanPhone         =    sanitizeStr($raw_phone);
                $cleanAddress       =    sanitizeStr($raw_address);
                $cleanCity          =    sanitizeStr($raw_city);
                $cleanState         =    sanitizeStr($raw_state);
                $cleanEmail         =    validateEmail($raw_email);
                $cleanPassword      =    sanitizeStr($raw_password);
            
                $hashedPass         =    hashPassword($cleanPassword);
            
                //collect image
                $image              =    $_FILES['image']['name'];
                $img_temp           =    $_FILES['image']['tmp_name'];
            
                // move image to permanent location
                move_uploaded_file($img_temp, "uploaded_images/$image");
            
                $db->query("SELECT * FROM users WHERE email = :email");
                $db->bindvalue(':email', $cleanEmail, PDO::PARAM_STR);
                $row  =  $db->fetchSingle();
                if ($row) {
                echo '<div class="alert alert-danger alert-dismissible text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Sorry</strong> User already exist.
                    </div>';
                }else {
                $db->query("INSERT INTO users (id,firstname, middlename, lastname,  email, password, gender, category, image, address, city, state) VALUES (NULL, :firstname, :middlename, :lastname, :email, :password, :gender, :category, :image, :address, :city, :state)");
                $db->bindvalue(':firstname', $cleanFname, PDO::PARAM_STR);
                $db->bindvalue(':middlename', $cleanMname, PDO::PARAM_STR);
                $db->bindvalue(':lastname', $cleanLname, PDO::PARAM_STR);
                $db->bindvalue(':email', $cleanEmail, PDO::PARAM_STR);
                $db->bindvalue(':password', $hashedPass, PDO::PARAM_STR);
                $db->bindvalue(':gender', $gender, PDO::PARAM_STR);
                $db->bindvalue(':category', $category, PDO::PARAM_STR);
                $db->bindvalue(':address', $cleanAddress, PDO::PARAM_STR);
                $db->bindvalue(':city', $cleanCity, PDO::PARAM_STR);
                $db->bindvalue(':state', $cleanState, PDO::PARAM_STR);
                $db->bindvalue(':image', $image, PDO::PARAM_STR);
                $run = $db->execute();
                if($run){
                    echo '<div class="alert alert-success alert-dismissible text-center mt-5">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Success</strong> Registered successfully, please log in.
                        </div>';
                }else {
                    echo '<div class="alert alert-danger alert-dismissible text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Sorry</strong> User could not be registered try again later.
                        </div>';
                }
                }
            }else {
                keepMsg('<div class="alert alert-danger alert-dismissible text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sorry</strong> Select a Gender.
          </div>');
            }
            
        }else {
            keepMsg('<div class="alert alert-danger alert-dismissible text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sorry</strong> Select a Category.
          </div>');
        }
        
      
      
    }else {
        keepMsg('<div class="alert alert-danger alert-dismissible text-center">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Sorry</strong> Password does not correspond.
      </div>');
    }
}





?>











<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="title icon" href="img/images.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="reg_user.css">
    <title>Profind</title>
</head>
<body>

<div class="col-12"><?php  showMsg() ?></div>
<div class="container-fluid ">
                <div class="row  pt-md-5 mt-md-3 mb-md-5 justify-content-md-center">
                  <div class="col-md-6 box-border p-3">
                      <h3 class="text-warning text-center mb-3">:: REGISTER ::</h3>
                      <div class="">
                        <form enctype="multipart/form-data" role="form" method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
                        <!-- <div class="form-row">
                          
                        </div> -->
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="text-light" for="inputPassword4">firstname</label>
                                    <input type="text" class="form-control input text-light" id="inputPassword4" name="firstname" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="text-light" for="inputPassword4">middlename</label>
                                    <input type="text" class="form-control input text-light" id="inputPassword4" name="middlename"  required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="text-light" for="inputPassword4">lastname</label>
                                    <input type="text" class="form-control input text-light" id="inputPassword4" name="lastname" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-light" for="inputEmail4">Email</label>
                                    <input type="email" class="form-control input text-light" id="inputEmail4" name="username" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-light" for="inputPassword4">Phone Number</label>
                                    <input type="text" class="form-control input text-light" name="phone" id="inputPassword4"  required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-light" for="inputPassword4">Password</label>
                                    <input type="password" class="form-control input text-light" name="password" id="inputPassword4"  required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-light" for="inputPassword4">Confirm Password</label>
                                    <input type="password" class="form-control input text-light" name="c_password" id="inputPassword4"  required>
                                </div>
                                <div class="col-12"><?php  showMsg() ?></div>
                                <div class="form-group col-12">
                                    <label class="text-light" for="inputPassword4">Address</label>
                                    <input type="text" class="form-control input text-light" id="inputPassword4" name="address" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-light" for="inputPassword4">City</label>
                                    <input type="text" class="form-control input text-light" id="inputPassword4" name="city" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="text-light" for="inputPassword4">State</label>
                                    <input type="text" class="form-control input text-light" id="inputPassword4" name="state" required>
                                </div>
                            </div>
                            <div class="form-group col-12">
                                <label class="text-light" for="inputState">Select Gender</label>
                                <select id="inputState" name="gender" class="form-control input text-light" required>
                                    <option class="text-dark" value="null" selected>Select Gender</option>
                                    <option class="text-dark" value="male">Male</option>
                                    <option class="text-dark" value="female">Female</option>
                                </select>
                            </div>
                            
                            <div class="form-group col-12">
                                <label class="text-light" for="inputState">Select Category</label>
                                <select id="inputState" name="category" class="form-control input text-light" required>
                                    <option class="text-dark" value="null" selected>Select Category</option>
                                    <option class="text-dark" value="Catering">Catering</option>
                                    <option class="text-dark" value="Graphics">Graphics</option>
                                    <option class="text-dark" value="Painting">Painting</option>
                                    <option class="text-dark" value="Driving">Driving</option>
                                    <option class="text-dark" value="Engineering">Engineering</option>
                                    <option class="text-dark" value="Programming">Programming</option>
                                    <option class="text-dark" value="Arts">Arts</option>
                                    <option class="text-dark" value="Fashion">Fashion</option>
                                    <option class="text-dark" value="Education">Education</option>
                                    <option class="text-dark" value="Entertainment">Entertainment</option>
                                    <!-- <option class="text-dark">Catering</option> -->
                                </select>
                                <div class="col-12"><?php  showMsg() ?></div>
                            </div>
                            <div class="form-group">
                                <label class="text-light" for="exampleFormControlFile1">Add an Image</label>
                                <input type="file" name="image" class="form-control-file text-light" id="exampleFormControlFile1">
                            </div>

                            <button type="submit" name="submit_login" class="btn btn-primary btn-rounded" data-toggle="modal" data-target="#error-msg">Register</button>
                            <a href="user_login.php" class="text-light go-right">Login</a>
                        </form>
                      </div>
                  </div>
                </div>
      </div>









    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>