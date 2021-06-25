


<?php
  ob_start();
  session_start();
//Include functions files and also write a statement to redirect user when logged in 
include('includes/functions.php');


 
?>

<?php  
     if (isset($_SESSION['user_is_logged_in'])) {
      redirectPage('index.php');
   }
  ?>

 
<?php

//require or include your database connection file
require('includes/pdocon.php');
    
//instatiating our database objects
    $db = new Pdocon;

//Collect and process Data on login submission
    if(isset($_POST['submit_form'])){
      $rawUsername        =     cleanData($_POST['username']);
      $rawPassword        =     cleanData($_POST['password']);
      $cleanUsername      =     validateEmail($rawUsername);
      $cleanPass          =     sanitizeStr($rawPassword);
      $hashedPass         =     hashPassword($cleanPass);

      $db->query("SELECT * FROM users WHERE email=:email AND password=:password");
      $db->bindvalue(':email', $cleanUsername, PDO::PARAM_STR);
      $db->bindvalue(':password', $hashedPass, PDO::PARAM_STR);
      $row = $db->fetchSingle();
      if($row){
        $dbImage     =    $row['image'];
        $s_image     =    ' <img src="uploaded_images/'. $dbImage . '" alt="" width="50" height="50" class="rounded-circle mr-3">';
        $d_name      =    $row['firstname'];
        $_SESSION['user_data'] = array(
          'fullname'  =>   $d_name,
          'id'        =>   $row['id'],
          'email'     =>   $row['email'],
          'image'     =>   $s_image

        );

      $_SESSION['user_is_logged_in'] =  true;
        redirectPage("index.php");
        keepMsg('<div class="alert alert-success alert-dismissible text-center mt-5">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success</strong>  ' . $d_name . '" you are logged in as admin"
                 </div>');
        


      }else {
        echo '<div class="alert alert-danger alert-dismissible text-center">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Sorry</strong> User does not exist .Register or try another email
          </div>';
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
		<form action="<?php $_SERVER['PHP_SELF'] ; ?>" method="post">
			<div class="inputBox">
				<input type="text" name="username" required>
				<label for="">Email</label>
			</div>
			<div class="inputBox">
				<input type="password" name="password" required>
				<label for="">Password</label>
			</div>
      <input type="submit" name="submit_form" value="Login">
      <a href="register_user.php" class="action">Resgister</a>
		</form>
	</div>
</body>
</html>