<?php
    include('includes/header.php');
    require('includes/pdocon.php');
    include('includes/functions.php');

?>

<?php if(isset($_GET['server'])): ?>

<style>
    .card {
        padding: 20px;
        border-radius: 30px;
    }

    .pad {
        padding: 15px;
        border-radius: 10px
    }

    .phone {
        border: 1px solid #b71c1c;
        margin-top: 10px;
        transition: all .4s;
    }

    .phone:hover {
        background-color: #d50000;
        color: white;
    }

    .alert {
    display: flex;
    justify-content: space-between;
    margin: 8px 0;
    }

</style>
<?php showMsg(); ?>
<section class="section">
    <div class="row container">
        <div class="col s12 m7 l8">
            <div class="card grey lighten-5">
                <h4 class="blue-text accent-2 center-align">WORK IMAGES</h4>
                <div class="slider">
                    <ul class="slides">
                    <?php  
                        $user_id = (int)$_GET['server'];
                        $db = new Pdocon;
                        $db->query("SELECT * FROM images WHERE user_id=:user_id");
                        $db->bindvalue(':user_id', $user_id, PDO::PARAM_INT);
                        $rows = $db->fetchMultiple();

                        foreach($rows as $row) :
                    
                    ?>
                    <li>
                        <img src="users/uploaded_images/<?php echo $row['image'] ; ?>"> <!-- random image -->
                        <div class="caption center-align">
                        <h3></h3>
                        <h5 class="light grey-text text-lighten-3"></h5>
                        </div>
                    </li>
                    <?php endforeach ; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col s12 m5 l4">
            <div class="card hoverable center-align grey lighten-5">
                <?php  
                    $db->query("SELECT * FROM users WHERE id=:id");
                    $db->bindvalue(':id', $user_id, PDO::PARAM_INT);
                    $res = $db->fetchSingle();

                    if ($res) :
                ?>
                <img src="users/uploaded_images/<?php echo $res['image'] ?>" alt="" class="circle responsive-img" style="max-height: 100px" height="100px" width="100px">
                <h6><?php echo $res['lastname'] . " " . $res['firstname'] ; ?></h6>
                <a href="" class="white-text modal-trigger" data-target="modal1">
                <div class="light-green accent-4 pad">
                    SEND MESSAGE
                </div>
                </a>
                
                <div class="phone pad">
                    <i class="fas fa-phone"></i> <?php echo $res['phone'] ?>
                </div>
                <?php endif ; ?>
            </div>
            <div class="card hoverable grey lighten-5">
            <a href="" class="white-text">
                <div class="light-green accent-4 pad center-align">
                    POST ADDS LIKE THIS
                </div>
                </a>
            </div>
            <div class="card hoverable grey lighten-5">
                <h5 class=" center-align blue-text accent-2">SAFETY TIP</h5>
                <ul>
                    <li>Please ensure to meet at a secure environment</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- <div id="modal1" class="modal">
    <div class="modal-content center"> -->
    <div id="modal1" class="row center modal">
          <div class="modal-content center col s12 m8 offset-m2 white-text card hoverable ">
            <form action="service_info.php?server=<?php echo $user_id ; ?>" method="post">
            <div class="col s12 center">
            <h1 class="text-center teal-text light"><small>CONTACT FORM</small></h1>
              </div>
            <div class="divider"></div>  
            <div class="input-field col s12">
              <i class="material-icons prefix teal-text">person</i>
              <input id="full-name" name="name" type="text" class="teal-text" required>
              <label for="full-name">Full Name</label>
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix teal-text">phone</i>
              <input id="email" name="number" type="text" class="teal-text" required>
              <label for="email">Phone Number</label>
            </div>
            <div class="input-field col s12">
              <i class="material-icons prefix teal-text">sms</i>
              <textarea id="textarea1" name="msg" class="materialize-textarea" required></textarea>
              <label for="email">Enter Message</label>
            </div>
            <div class="col s12">&nbsp;</div>
            <div class="col s12 center">
            <button type="Submit" name="submit_msg" class="col s12 btn red hoverable">Submit</button>
              </div>
            <div class="col s12">&nbsp;</div>
            </form>
          </div>
        </div>

        
            



        <?php  
            if (isset($_POST['submit_msg'])) {
                $rawName      = cleanData($_POST['name']);
                $rawPhone     = cleanData($_POST['number']);
                $raw_msg      = cleanData($_POST['msg']);

                $cleanName    = sanitizeStr($rawName);
                $cleanPhone   = sanitizeStr($rawPhone);
                $cleanMsg     = sanitizeStr($raw_msg);


                $db->query("INSERT INTO message (id, user_id, sender_name, sender_number, message, message_date) VALUES (NULL, :user_id, :sender_name, :sender_number, :message, default)");
                $db->bindvalue(':user_id', $user_id, PDO::PARAM_INT);
                $db->bindvalue(':sender_name', $cleanName, PDO::PARAM_STR);
                $db->bindvalue(':sender_number', $cleanPhone, PDO::PARAM_STR);
                $db->bindvalue(':message', $cleanMsg, PDO::PARAM_STR);
                $result = $db->execute();
                if ($result) {
                    redirectPage("service_info.php?server={$user_id}");
                    keepMsg('<div class="container">
                                <div class="row">
                                <div class="col s12">
                                    <a class="btn alert green">SUCCESS! Message sent successfully<i class="material-icons">
                            close
                            </i></a>
                                </div>
                                </div>
                            </div>');
                }
            }
        
        ?>

        <script>
            
        </script>

        
    <!-- </div> -->
    <!-- <div class="modal-footer">
      <a href="#!" class="btn light-green white-text accent-4 modal-close waves-effect waves-green btn-flat">Agree</a>
    </div> -->
  <!-- </div> -->

<?php endif ; ?>





<?php include('includes/footer.php') ?>