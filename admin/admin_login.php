<?php  
  ob_start();
  session_start(); 
?>

<?php         
//Include functions files and also write a statement to redirect user when logged in 
include('includes/functions.php');
if (isset( $_SESSION['admin_is_logged'])) {
  redirectPage('index.php');
}
?>

<?php
//require or include your database connection file
require('includes/pdocon.php');  
//instatiating our database objects
    $db = new Pdocon;
//Collect and process Data on login submission
    if(isset($_POST['submit_login'])){
      $rawUsername        =     cleanData($_POST['username']);
      $rawPassword        =     cleanData($_POST['password']);
      $cleanUsername      =     validateEmail($rawUsername);
      $cleanPass          =     sanitizeStr($rawPassword);
      $hashedPass         =     hashPassword($cleanPass);

      $db->query("SELECT * FROM admin WHERE email=:email AND password=:password");
      $db->bindvalue(':email', $cleanUsername, PDO::PARAM_STR);
      $db->bindvalue(':password', $hashedPass, PDO::PARAM_STR);
      $row = $db->fetchSingle();
      if($row){
        $dbImage     =    $row['image'];
        $s_image     =    ' <img src="uploaded_images/'. $dbImage . '" alt="" width="50" height="50" class="rounded-circle mr-3">';
        $f_name      =    $row['firstname'];
        $m_name      =    $row['middlename'];
        $l_name      =    $row['lastname'];
        ob_start();
        session_start();
        $_SESSION['userdata'] = array(
          'firstname' =>   $f_name,
          'middlename'=>   $m_name,
          'lastname'  =>   $l_name,
          'id'        =>   $row['id'],
          'email'     =>   $row['email'],
          'image'     =>   $s_image

        );

        

      $_SESSION['admin_is_logged'] =  true;
        redirectPage("index.php");
        keepMsg('<div class="alert alert-success alert-dismissible text-center mt-5">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success</strong>  ' . $f_name . '" you are logged in as admin"
                 </div>');
        


      }else {
        echo  "<script> 
            alert('username or password is incorrect');
        </script>";
      }
    }
         
           

    
    //making the query using our functions
   

    //To specify the WHERE statement, You need to call the bind method
    

    //Fetching the resultset for a single result and keep in a row variable
    
         

    //Collect the image, id, email, fullname and keep an session
   

            
            //create a session variable and set it to true 
         
            
            
            //Redirect a succuessfull login to customer.php
        
            
           
         //Use the set_message function to set a welcome msg in a closable div and echo a div danger when login fails in else statement
         
   

?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Form Design</title>
	<link rel="stylesheet" href="login_style.css">
</head>
<body>
	<div class="box">
		<h2>Login</h2>
		<form action="admin_login.php" role="form" method="post">
			<div class="inputBox">
				<input type="text" name="username" required>
				<label for="">Username</label>
			</div>
			<div class="inputBox">
				<input type="password" name="password"  required>
				<label for="">Password</label>
			</div>
			<input type="submit" name="submit_login" value="Submit">
		</form>
	</div>
</body>
</html>
<!-- <div class="row">
      <div class="col-md-4 col-md-offset-4">
          <p class=""><a class="pull-right" href="admin/register_admin.php"> Register</a></p><br>
      </div>
      <div class="col-md-4 col-md-offset-4">
        <form class="form-horizontal" role="form" method="post" action="admin_login.php">
          <div class="form-group">
            <label class="control-label col-sm-2" for="email"></label>
            <div class="col-sm-10">
              <input type="email" name="username" class="form-control" id="email" placeholder="Enter Email" required>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2" for="pwd"></label>
            <div class="col-sm-10"> 
              <input type="password" name="password" class="form-control" id="pwd" placeholder="Enter Password" required>
            </div>
          </div>

          <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10 text-center">
              <button type="submit" class="btn btn-primary text-center" name="submit_login">Login</button>
            </div>
          </div>
        </form>
          
  </div>
</div> -->
<!--  -->