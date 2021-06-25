<?php include('includes/header.php'); ?>


<?php

//Include functions
include("includes/functions.php")

//check to see if user if logged in else redirect to index page

?>


      <!-- <div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-9 col-xl-10 col-md-8 ml-auto">
                          <div class="row  pt-md-5 mt-md-3 mb-md-5">
                                <div class="col-lg-8 col-md-8">
                                <form class="" role="form" method="post" action="<?php $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
                                      <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <label for="inputEmail4">firstname</label>
                                          <input type="text" class="form-control" id="inputEmail4" placeholder="Firstname">
                                        </div>
                                        <div class="form-group col-md-12">
                                          <label for="inputPassword4">middlename</label>
                                          <input type="text" class="form-control" id="inputPassword4" placeholder="Middlename">
                                        </div>
                                        <div class="form-group col-md-12">
                                          <label for="inputPassword4">Lastname</label>
                                          <input type="text" class="form-control" id="inputPassword4" placeholder="Lastname">
                                        </div>
                                        <div class="form-group col-md-12">
                                          <label for="inputEmail4">Email</label>
                                          <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-12">
                                          <label for="inputPassword4">Password</label>
                                          <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlFile1">Add an Image</label>
                                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                                      </div>
                                      <button type="submit" class="btn btn-primary">Updte Profile</button>
                                    </form>
                                </div>
                                <div class="col-lg-2 col-md-2 col-xl-2 p-3">
                                <div class="card" style="width: 20rem;">
                                  <img class="card-img-top" src="img/IMG-20190107-WA0080.jpg" alt="Card image cap" height="300px">
                                  <div class="card-body">
                                    <h4 class="card-title">Ogbuji Godwin Chibuike</h4>
                                    <p class="card-text">ogbujigodwinmax@gmail.com</p>
                                    <a href="#" class="btn btn-danger">Delete Account</a>
                                  </div>
                                </div>
                              </div>
                          </div>
                      </div>
                </div>
    </div> -->
   
   

           
           <?php 
               
               /************** Fetching data from database using id ******************/
              if (isset($_GET['admin_id'])) {
                $admin_id   =  $_GET['admin_id'];
              }

                //require database class files
                require('includes/pdocon.php');

                //instatiating our database objects
                $db = new Pdocon;

                //Create a query to display customer inf // You must bind the id coming in from the url
                $db->query("SELECT * FROM admin WHERE id=:id");
                $db->bindvalue(':id', $admin_id, PDO::PARAM_INT);
                $row = $db->fetchSingle();


                //Get the admin email from the session super global and keep it in a variable.


                //Bind your email


                //Fetching the data and display it in the form value fields
               
                if ($row) :

                  echo $row['firstname'];
             
               
    
             ?>
<!--  -->


<div class="container-fluid">
                  <div class="row">
                      <div class="col-lg-9 col-xl-10 col-md-8 ml-auto">
                          <div class="row  pt-md-5 mt-md-3 mb-md-5">
                                <div class="col-lg-8 col-md-8">
                                <form class="" role="form" method="post" action="<?php $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
                                      <div class="form-row">
                                      <div class="form-group col-md-12">
                                          <label for="inputEmail4">firstname</label>
                                          <input type="text" name="firstname" class="form-control" id="inputEmail4" placeholder="Firstname" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                          <label for="inputPassword4">middlename</label>
                                          <input type="text" name="middlename" class="form-control" id="inputPassword4" placeholder="Middlename" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                          <label for="inputPassword4">Lastname</label>
                                          <input type="text" name="lastname" class="form-control" id="inputPassword4" placeholder="Lastname" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                          <label for="inputEmail4">Email</label>
                                          <input type="email" name="username" class="form-control" id="inputEmail4" placeholder="Email" required>
                                        </div>
                                        <div class="form-group col-md-12">
                                          <label for="inputPassword4">Password</label>
                                          <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password" required>
                                        </div>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlFile1">Add an Image</label>
                                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1" required>
                                      </div>
                                      <button type="submit" name="update_profile" class="btn btn-primary">Update Profile</button>
                                    </form>
                                </div>
                                <div class="col-lg-2 col-md-2 col-xl-2 p-3 ">
                                <div class="card  p-3" style="width: 20rem;">
                                <?php // Get the image form table and keep in a variable
                                      $image = $row['image'];
                                    ?>
                                
                                  <?php //echo  image folder and concatinate it with a style 
                                        echo   '<img class="card-img-top img-shape" src="uploaded_images/' . $image . '" alt="Card image cap" height="300px">'; 
                                        ?> 
                                  
                                  <div class="card-body">
                                    <h4 class="card-title"><?php echo $row['lastname'] . $row['firstname'] . $row['middlename'] ?></h4>
                                    <p class="card-text"><?php echo $row['email']; ?></p>
                                   
                                    <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete_acc">Delete Account</a>
                                                                       
                                  </div>
                                </div>
                              </div>
                          </div>
                      </div>
                </div>
    </div>

      <!-- modal -->
      <div id="delete_acc" class="modal fade">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h4 class="modal-title">Delete Account</h4>
                      <button class="close" data-dismiss="modal" type="button">&times;</button>
                  </div>
                  <div class="modal-body">sure you want to delete?</div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-success" data-dismiss="modal">Don't Delete</button>
                      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                          <input type="hidden" value="<?php echo $admin_id ?>" name="id">
                          <button type="submit" name="delete_acc" class="btn btn-danger">Delete</button> 
                      </form>
                  </div>
              </div>
          </div>
      </div>
  <!-- end of modal -->

                <?php endif; ?>

          
<?php

// delete account
// if (isset($_POST['delete_form'])) {
//   $admin_id = $_SESSION['user_data']['id'];
//   echo ' 

  
//   ';
// }







//If the Yes Delete (confim delete) button is click from the closable div proceed to delete

  if (isset($_POST['delete_acc'])) {
    $id = $_POST['id'];
    $db->query("DELETE FROM admin WHERE id=:id");
    $db->bindvalue(':id', $id, PDO::PARAM_INT);
    $run = $db->execute();
    if ($run) {
      redirectPage('logout.php');
    }else{
      keepMsg('<div class="alert alert-danger alert-dismissible text-center">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <strong>Sorry</strong> Could not delete
                </div>'
             );
    }
  }
          
/************** Update data to database using id ******************/  
          
      
if (isset($_POST['update_profile'])) {
  $raw_firstname    =    cleanData($_POST['firstname']);
  $raw_middlename   =    cleanData($_POST['middlename']);
  $raw_lastname     =    cleanData($_POST['lastname']);
  $raw_email        =    cleanData($_POST['username']);
  $raw_password     =    cleanData($_POST['password']);
  $cleanFname       =    sanitizeStr($raw_firstname);
  $cleanMname       =    sanitizeStr($raw_middlename);
  $cleanLname       =    sanitizeStr($raw_lastname);
  $cleanEmail       =    validateEmail($raw_email);
  $cleanPassword    =    sanitizeStr($raw_password);

  $hashedPass       =    hashPassword($cleanPassword);

  //collect image
  $image            =    $_FILES['image']['name'];
  $img_temp         =    $_FILES['image']['tmp_name'];

  // move image to permanent location
  move_uploaded_file($img_temp, "uploaded_image/$image");


    $db->query("UPDATE admin SET firstname=:firstname, middlename=:middlename, lastname=:lastname, email=:email, password=:password, image=:image WHERE  id=:id");
    $db->bindvalue(':firstname', $cleanFname, PDO::PARAM_STR);
    $db->bindvalue(':middlename', $cleanMname, PDO::PARAM_STR);
    $db->bindvalue(':lastname', $cleanLname, PDO::PARAM_STR);
    $db->bindvalue(':email', $cleanEmail, PDO::PARAM_STR);
    $db->bindvalue(':password', $hashedPass, PDO::PARAM_STR);
    $db->bindvalue(':image', $image, PDO::PARAM_STR);
    $db->bindvalue(':id', $admin_id, PDO::PARAM_INT);
    $run = $db->execute();
    if($run){
      redirectPage('index.php');
          keepMsg('<div class="alert alert-success alert-dismissible text-center mt-5">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success</strong> Update successful.
        </div>');
    }else {
      redirectPage('index.php');
         keepMsg('<div class="alert alert-danger alert-dismissible text-center mt-5">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         <strong>Sorry</strong> Update was not successful
       </div>');
    }
  

}
?>
          
          
          

  
<?php  include('includes/footer.php'); ?> 