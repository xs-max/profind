<?php
    include('includes/header.php');
    include('includes/functions.php');
    require('includes/pdocon.php');

?>

<style>


.nav-link {
    background: #76ff03;
}

.banner {
    background-image:linear-gradient(rgba(0,0,0,.7), rgba(0,0,0,.7)), url(img/banner4.jpg);
    min-height: 500px;
    background-size: cover;
    /* background-repeat: no-repeat; */
    background-position: center;
    /* background-attachment: fixed; */
    animation-name: maxanim;
    animation-direction: alternate;
    animation-duration: 10s;
    animation-iteration-count: infinite;
    animation-timing-function: ease-in-out;
    font-family: sans-serif;
}

@keyframes maxanim {
    from {background-position: top; top:0px;}
    to {background-position: bottom; bottom: 0px;}
}



.s-width {
    max-height: 200px;
    transform: translateY(-10%);
    /* border-radius: 30px;  */
}



.logo {
    display: inline-block;
    height: 100%;
}

.logo>img {
    /* vertical-align: middle; */
		position: relative; 
    top:1px; 
}

.box {
    /* border: 1px solid grey; */
    padding: 10px;
    border-radius: 30px;
    box-shadow: 2px 5px grey;
    padding: 20px;
    background: #64dd17;
    
}

.box input {
    background: white;
}

.parallax-container {
    min-height: 300px;
    line-height: 0;
    height: auto;
    color: rgba(255,255,255,.9);
  }

  .alert {
    display: flex;
    justify-content: space-between;
    margin: 8px 0;
    }

    .col {
      background: transparent;
    }

    


</style>



<section id="home" class="banner scrollspy">
    <div class="container ">
            <div class="row ">
                <div class="col s12">
                    <div class="center-align ">
                        <div class="mt">
                            <h4 class="white-text">WELCOME TO  </h4>
                            <hr width="50%" style="margin-top: 40px">
                            <h1 class="blue-text">PRO<span class="light-green-text">FIND</span></h1>
                            <p class="white-text" style="font-size: 30px">Where your satisfaction is our heart desire</p>
                            <?php showMsg() ; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <!-- Banner End -->
  <!-- Seach Bar -->
    <section class="s-width blue accent-2 ">
        <div class="row container">
            <div class="col s12 center-align">
                <h5 class="white-text">Search Categories</h5>
                <div class="row">
                    <form class="col s12" method="post" action="index.php">
                        <div class="row">
                            <div class="input-field col s12">
                               
                                <input id="icon_prefix" name="cat" placeholder="What are you looking for....." type="text" class="validate grey lighten-4" style="border-radius:40px; border: 1px solid #64dd17; padding-left: 10px">
                            </div>
                            <div class="input-field col s1">
                                <!-- <button type="submit" name="search" class=" col"><i class="fas fa-search"></i></button> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <?php  
    
      if (isset($_POST['cat'])) {
          $rawSearch    = cleanData($_POST['cat']);
          $cleanSearch  = sanitizeStr($rawSearch);
          
          $db = new Pdocon;
          $db->query("SELECT * FROM users WHERE category=:category");
          $db->bindvalue(':category', $cleanSearch, PDO::PARAM_STR);
          $res = $db->fetchSingle();
          if($res){
            redirectPage("search.php?cat={$res['category']}&page=1");
          }else{
            redirectPage("search.php?cat={$res['category']}&page=1");
          }
      }
    
    ?>
  <!-- Search Bar Ends -->
  <!-- Categories -->
    <section id="category" class="scrollspy" >
    <div class="row container center-align">
      <h3 class="blue-text accent-2">Categories</h3>
    <div class="col s6  m3">
      <a href="service.php?cat=driving&page=1">
      <div class="card-panel hoverable">
        <i class="fas fa-bus fa-4x light-green-text accent-4"></i>
        <h6 class="grey-text darken-4">Driving</h6>
      </div>
      </a>
      
    </div>
    <div class="col s6  m3">
      <a href="service.php?cat=catering&page=1">
      <div class="card-panel hoverable">
        <i class="fas fa-birthday-cake fa-4x lime-text accent-1"></i>
        <h6 class="grey-text darken-4">Catering</h6>
      </div>
      </a>
      
    </div>
    <div class="col s6  m3">
      <a href="service.php?cat=engineering&page=1">
      <div class="card-panel hoverable">
        <i class="fas fa-screwdriver fa-4x red-text"></i>
        <h6 class="grey-text accent-4">Engineering</h6>
      </div>
      </a>
      
    </div>
    <div class="col s6  m3">
      <a href="service.php?cat=painting&page=1">
      <div class="card-panel hoverable">
        <i class="fas fa-paint-roller fa-4x yellow-text"></i>
        <h6 class="grey-text darken-4">Painting</h6>
      </div>
      </a>
      
    </div>
    <div class="col s6  m3">
      <a href="service.php?cat=graphics&page=1">
      <div class="card-panel hoverable">
        <i class="fas fa-vr-cardboard fa-4x deep-orange-text accent-3"></i>
        <h6 class="grey-text darken-4">Graphics</h6>
      </div>
      </a>
      
    </div>
    <div class="col s6  m3">
      <a href=" service.php?cat=arts&page=1">
      <div class="card-panel hoverable">
        <i class="fas fa-paint-brush fa-4x amber-text darken-3"></i>
        <h6 class="grey-text darken-4">Arts</h6>
      </div>
      </a>
      
    </div>
    <div class="col s6  m3">
      <a href="service.php?cat=tech&page=1">
      <div class="card-panel hoverable">
        <i class="fas fa-laptop fa-4x pink-text darken-4"></i>
        <h6 class="grey-text darken-4">Tech</h6>
      </div>
      </a>
      
    </div>
    <div class="col s6  m3">
      <a href="service.php?cat=fashion&page=1">
      <div class="card-panel hoverable">
        <i class="fas fa-shoe-prints fa-4x"></i>
        <h6 class="grey-text darken-4">Fashion</h6>
      </div>
      </a>
      
    </div>
    <div class="col s6  m3">
      <a href="service.php?cat=education&page=1">
      <div class="card-panel hoverable">
        <i class="fas fa-book-open fa-4x light-green-text accent-4 darken-4"></i>
        <h6 class="grey-text darken-4">Education</h6>
      </div>
      </a>
      
    </div>
    <div class="col s6  m3">
      <a href="service.php?cat=entertainment&page=1">
      <div class="card-panel hoverable">
        <i class="fas fa-microphone-alt fa-4x light-green-text accent-4"></i>
        <h6 class="grey-text darken-4">Entertainment</h6>
      </div>
      </a>
      
    </div>
    <div class="col s6  m3">
      <a href="user/user_login.php">
      <div class="card-panel hoverable">
        <i class="fas fa-plus-circle fa-4x red-text darken-1"></i>
        <h6 class="grey-text darken-4">Be a worker</h6>
      </div>
      </a>
      
    </div>
  </div>
    </section>
  <!-- Categories -->
  <!-- Banner 2 -->
  <section id="about"  class="section white scrollspy">
  <div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row center-align">
        <h3 class="blue-text accent-2">ABOUT PROFIND</h3>
        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-green-text accent-4"><i class="material-icons">flash_on</i></h2>
            <h5 class="center">OUR MISSION</h5>

            <p class="light">Profind exist to ease the constant worry in the search for people rendering different kinds of services ranging from catering services to enginerring services . </p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-green-text accent-4"><i class="material-icons">group</i></h2>
            <h5 class="center">OUR VISION</h5>

            <p class="light">Our vision is to connect every customer to every service renderer in the easiest and fastest way possible, to give customers utmost satisfaction in their different needs.</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
            <h2 class="center light-green-text accent-4"><i class="material-icons">settings</i></h2>
            <h5 class="center">EASY TO WORK WITH</h5>

            <p class="light">Profind is very easy to work with, it is as easy as coming to the website search for your prefered service category, get people in the category and connect with them.</p>
          </div>
        </div>
      </div>

    </div>
  </div>
  </section>
  <!-- Banner 2 -->
  <section class="banner2">
  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
        </div>
      </div>
    </div>
    <div class="parallax"><img src="img/banner3.jpg" alt="Unsplashed background img 2"></div>
  </div>
  </section>
  <!-- banner 2 -->

  <!-- Banner 2 -->
  <!-- contact us -->
    <section id="contact"  class="section white center-align scrollspy">
      <h3 class="blue-text accent-2">CONTACT US</h3>
      <div class="row container section">
        <div class="col m4">
          <div class="icon-block">
            <h2 class="center light-green-text accent-4"><i class="large material-icons">location_on</i></h2>
            <h5 class="center">OUR CONTACT</h5>

            <p class="light">Profind is just a small company located in the south eastern part of Nigeria. Profind is in Awka, the capital city of Anambra state .</p>
            <p class="light">If you have a complaint or a suggestion you can send us a message using our contact form.</p>
          </div>
      </div>
      <div class="col m8">
        <div class="row">
          <div class="col s12 m8 offset-m4 white-text card hoverable ">
            <form action="index.php" method="post">
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
            <button type="Submit" name="submit_index_msg" class="col s12 btn red hoverable">Submit</button>
              </div>
            <div class="col s12">&nbsp;</div>
            </form>
          </div>
        </div>
       </div>
    </section>

    <?php  
            if (isset($_POST['submit_index_msg'])) {
                $db = new Pdocon;
                $rawName      = cleanData($_POST['name']);
                $rawPhone     = cleanData($_POST['number']);
                $raw_msg      = cleanData($_POST['msg']);

                $cleanName    = sanitizeStr($rawName);
                $cleanPhone   = sanitizeStr($rawPhone);
                $cleanMsg     = sanitizeStr($raw_msg);


                $db->query("INSERT INTO admin_msg (id, sender_name, phone, message, date) VALUES (NULL, :sender_name, :phone, :message, default)");
                $db->bindvalue(':sender_name', $cleanName, PDO::PARAM_STR);
                $db->bindvalue(':phone', $cleanPhone, PDO::PARAM_STR);
                $db->bindvalue(':message', $cleanMsg, PDO::PARAM_STR);
                $result = $db->execute();
                if ($result) {
                  redirectPage("index.php");
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
  <!--contact us  -->



<?php include('includes/footer.php'); ?>