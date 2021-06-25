<?php include('includes/header.php'); 
      include('includes/functions.php');
      require('includes/pdocon.php')

?>

<div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-xl-10 col-md-8 ml-auto">
                <div class="row  pt-md-5 mt-md-3 mb-md-5 justify-content-md-center">
                  <div class="col-md-8">
                  <?php

                        //Include functions
                        $id = $_GET['user'];

                        //check to see if user if logged in else redirect to index page



                        ?>


                  

                  
                        
                        <!-- Page Heading -->
                                
                                    <!-- /.row -->

                        
                                    
                                          <section id="contact" class="grey_section" style="padding:20px; border: 1px solid #ddd;">   
                                                <div class="row">
                                                <div class="widget widget_contact col-sm-4 to_animate" >
                                                      <p><strong>Customer Information</strong></p><br>
                                                      
                                                      <?php
                                                      
                                                      
                                                      /************** Get the value from database using id ******************/  
                                                            

                                                            $db = new Pdocon;

                                                            //Write your query
                                                            $db->query("SELECT * FROM users WHERE id=:id");
                                                            $db->bindvalue(':id', $id, PDO::PARAM_INT);
                                                            $row = $db->fetchSingle();
                                                            //  echo $row['id'];
                                                      
                                                            
                                                            //Gt id



                                                            //binding value with your id


                                                            //Fetch data and keep in row variable

                                                      
                                                      if($row) :
                                                                  
                                                            ?>
                        
                                                      <p style="padding: 3px">
                                                            <strong>Firstname: </strong> <?php echo $row['firstname']; ?>
                                                      </p><hr>
                                                
                                                      <p style="padding: 3px">
                                                            <strong>Lastname: </strong> <?php echo $row['lastname'] ?>
                                                      </p><hr>
                                                      <p style="padding: 3px">
                                                            <strong>Email: </strong> <?php echo $row['email']; ?>
                                                      </p><hr>
                                                      

                                                </div>


                                                <div class="col-sm-8">
                                                
                                                      <form class="form-horizontal" role="form" method="post" action="message.php?user=<?php echo $row['id'] ?>" >
                                                            <div class="form-group">
                                                            <label for="name">Subject <span class="required">*</span></label>
                                                            <input type="text" aria-required="true" size="30" value="" name="subject" id="name" class="form-control" placeholder="Subject">
                                                            </div>
                                                            <div class="form-group">
                                                            <label for="email">Email <span class="required">*</span></label>
                                                            <input type="email" aria-required="true" size="30" value="<?php echo $row['email'] ?>" name="email" id="email" class="form-control" placeholder="<?php echo $row['email'] ?>" disabled>
                                                            </div>
                                                      
                                                            <div class="form-group">
                                                            <label for="message">Message</label>
                                                            <textarea aria-required="true" rows="8" cols="45" name="message" id="message" class="form-control" placeholder="Type Message Here"></textarea>
                                                            </div>
                                                            
                                                            <div class="form-group">
                                                            <!-- <input type="submit" value="Send" id="contact_form_submit" name="contact_submit" class="theme_button"> -->
                                                            <button type="submit" id="contact_form_submit" name="customer_submit" class="btn btn-info">Submit</button>
                                                            </div>
                                                      </form>
                                                </div>
                                                <?php
                                                      endif;
                                                ?>    
                                                
                                                <?php //call display message function ?>
                                                </div><!--row-->    
                                          </section>
                        
                        
                        <!--******************************* Contact Customer  Form Processor*****************************-->
                              
                        <?php 
                                    //Write a function to check if form is submited
                              
                                          if(isset($_POST['customer_submit'])){


                                                //Get id
                                                $id = $_GET['user'];
                                          

                                                //make the query 
                                                $db->query("SELECT * FROM users WHERE id=:id");
                                          

                                                // bind 
                                                $db->bindvalue(':id', $id, PDO::PARAM_INT);
                                          

                                                //Fetch the user and keep it in a row variable
                                                $row = $db->fetchSingle();
                                          
                                                
                                                
                                                if($row)
                                                // Collect customer fullname from the database and keep in and $cus_name variable
                                                {
                                                $cus_name      =    $row['firstname'];
                                                $raw_subject   =    cleanData($_POST['subject']);
                                                $raw_msg       =    cleanData($_POST['message']);
                                                $cleanSubject  =    sanitizeStr($raw_subject);
                                                $cleanMsg      =    sanitizeStr($raw_msg);

                                    
                                                
                        
                                                //Collect and validate form field data and keep in $subject and $message variable        
                                                

                                                // Create the email and send the message
                                                $to                 =   $row['email'];        
                                                $email_subject      =   "Subject:  $cleanSubject";
                                                $email_body         =   "\nDear $cus_name, \n\nThis is a message from Cus MangerApp.Com.\n\n"."Here are the details:" ."\n\n$cleanMsg \n\n";
                                                $headers            =   "From: noreply@profind.com";
                                                
                                    
                                                if(mail($to,$email_subject,$email_body,$headers)){
                                                      
                                                
                                                echo "<div class='alert alert-success text-center'>
                                                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                                                            <strong>Success!</strong> Your Message has been successfully sent.
                                                            </div>";
                                                      }else{
                                                
                                                      
                                                      echo "<script>
                                                                  alert('not successful');
                                                      </script>";
                                                      
                                                }
                                                
                                                return true;
                                                                  
                                                }
                        
                                                }
                              
                        ?>

                                    
                             
                        
                        <br><br><br><br>
                        
                        </div><!--Page Wrapper -->
                  
                </div>
            </div>
        </div>
</div>







<?php include('includes/footer.php') ?>