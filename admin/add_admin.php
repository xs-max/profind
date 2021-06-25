<?php 
  include('includes/header.php');

//Include functions
include('includes/functions.php');

//check to see if user if logged in else redirect to index page 


?>

 
<?php
/************** Register new Admin ******************/


//require database class files
require('includes/pdocon.php');


//instatiating our database objects
$db = new Pdocon;


//Collect and clean values from the form // Collect image and move image to upload_image folder
if (isset($_POST['submit_login'])) {
  $raw_firstname      =    cleanData($_POST['firstname']);
  $raw_middlename     =    cleanData($_POST['middlename']);
  $raw_lastname       =    cleanData($_POST['lastname']);
  $raw_email          =    cleanData($_POST['username']);
  $raw_password       =    cleanData($_POST['password']);
  $cleanFname          =    sanitizeStr($raw_firstname);
  $cleanMname           =    sanitizeStr($raw_middlename);
  $cleanLname           =    sanitizeStr($raw_lastname);
  $cleanEmail         =    validateEmail($raw_email);
  $cleanPassword      =    sanitizeStr($raw_password);

  $hashedPass         =    hashPassword($cleanPassword);

  //collect image
  $image              =    $_FILES['image']['name'];
  $img_temp           =    $_FILES['image']['tmp_name'];

  // move image to permanent location
  move_uploaded_file($img_temp, "uploaded_images/$image");

  $db->query("SELECT * FROM admin WHERE email = :email");
  $db->bindvalue(':email', $cleanEmail, PDO::PARAM_STR);
  $row  =  $db->fetchSingle();
  if ($row) {
    echo '<div class="alert alert-danger alert-dismissible text-center mt-5">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sorry</strong> User already exist . try another email
          </div>';
  }else {
    $db->query("INSERT INTO admin (id,firstname, middlename, lastname,  email, password, image) VALUES (NULL, :firstname, :middlename, :lastname, :email, :password, :image)");
    $db->bindvalue(':firstname', $cleanFname, PDO::PARAM_STR);
    $db->bindvalue(':middlename', $cleanMname, PDO::PARAM_STR);
    $db->bindvalue(':lastname', $cleanLname, PDO::PARAM_STR);
    $db->bindvalue(':email', $cleanEmail, PDO::PARAM_STR);
    $db->bindvalue(':password', $hashedPass, PDO::PARAM_STR);
    $db->bindvalue(':image', $image, PDO::PARAM_STR);
    $run = $db->execute();
    if($run){
      echo '<div class="alert alert-success alert-dismissible text-center mt-5">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success</strong> Admin registered successfully, please log in.
          </div>';
    }else {
      echo '<div class="alert alert-danger alert-dismissible text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sorry</strong> User could not be registered try again later.
          </div>';
    }
  }

}




?>

      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-xl-10 col-md-8 ml-auto">
                <div class="row  pt-md-5 mt-md-3 mb-md-5 justify-content-md-center">
                  <div class="col-md-6">
                    <form enctype="multipart/form-data" role="form" method="post" action="<?php $_SERVER["PHP_SELF"]; ?>">
                      <div class="form-row">
                        <div class="form-group col-12">
                            <label for="inputPassword4">firstname</label>
                            <input type="text" class="form-control" id="inputPassword4" name="firstname" placeholder="firstname" required>
                          </div>
                          <div class="form-group col-12">
                            <label for="inputPassword4">middlename</label>
                            <input type="text" class="form-control" id="inputPassword4" name="middlename" placeholder="middlename" required>
                          </div>
                          <div class="form-group col-12">
                            <label for="inputPassword4">lastname</label>
                            <input type="text" class="form-control" id="inputPassword4" name="lastname" placeholder="lastname" required>
                          </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-12">
                          <label for="inputEmail4">Email</label>
                          <input type="email" class="form-control" id="inputEmail4" name="username" placeholder="Email" required>
                        </div>
                        <div class="form-group col-12">
                          <label for="inputPassword4">Password</label>
                          <input type="password" class="form-control" name="password" id="inputPassword4" placeholder="Password" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Add an Image</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                      </div>

                      <button type="submit" name="submit_login" class="btn btn-primary">Add Admin</button>
                    </form>
                  </div>
                </div>
            </div>
        </div>
      </div>

<?php include('includes/footer.php'); ?>

  
