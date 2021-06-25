<?php
      include('includes/header.php');

      require('includes/pdocon.php'); 
      include('includes/functions.php');

      showMsg();

      
?>


<!-- Start of card -->

<div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 col-xl-10 col-md-8 ml-auto">
                    <div class="row  pt-md-5 mt-md-3 mb-md-5">
                        <div class="col-sm-6 col-xl-3 p-2">
                            <div class="card card-common">
                                <div class="card-body bg-primary">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-shopping-cart fa-3x text-warning"></i>
                                        <div class="text-right text-white">
                                            <h5>Sales</h5>
                                            <h3>$135,000</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-secondary">
                                    <i class="fas fa-sync mr-3"></i>
                                    <span>update now</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 p-2 col-xl-3">
                            <div class="card card-common">
                                <div class="card-body bg-info">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-money-bill-alt fa-3x text-success"></i>
                                        <div class="text-right text-white">
                                            <h5>Expenses</h5>
                                            <h3>$39,000</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-secondary">
                                    <i class="fas fa-sync mr-3"></i>
                                    <span>update now</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 p-2 col-xl-3">
                            <div class="card card-common">
                                <div class="card-body bg-danger">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-users fa-3x text-info"></i>
                                        <div class="text-right text-white">
                                            <?php 
                                                $db = new Pdocon;
                                                $db->query("SELECT COUNT(*) AS count FROM users ");
                                                $row = $db->fetchSingle();
                                                if ($row) :
                                            ?>
                                            <h5>Users</h5>
                                            <h3><?php echo $row['count'] ?></h3>
                                            <?php endif ; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-secondary">
                                    <i class="fas fa-sync mr-3"></i>
                                    <span>update now</span>
                                </div>
                            </div>
                        </div>                        
                        <div class="col-sm-6 p-2 col-xl-3">
                            <div class="card card-common">
                                <div class="card-body bg-warning">
                                    <div class="d-flex justify-content-between">
                                        <i class="fas fa-chart-line fa-3x text-danger"></i>
                                        <div class="text-right text-white">
                                            <h5>Visitors</h5>
                                            <h3>45,000</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-secondary">
                                    <i class="fas fa-sync mr-3"></i>
                                    <span>update now</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <!-- End of cards -->
    <!-- Activities / quick post -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 col-xl-10 col-md-8 ml-auto">
                    <div class="row align-items-center mb-5">
                        <div class="col-12 col-xl-7">
                            <h4 class="text-muted mb-4">Recent Customer Messages</h4>
                            <div class="" id="accordion">
                            <?php
                                    $user_id = $_SESSION['userdata']['id']; 
                                    $db = new Pdocon;
                                    $db->query("SELECT * FROM admin_msg");
                                    $rows = $db->fetchMultiple();
                                    $collapse = 0;
                                    $showOrNot;
                                    foreach ($rows as $row) :
                                        $collapse++;
                                        if ($collapse == 1) {
                                            $showOrNot = "show";
                                        }else {
                                            $showOrNot = "";
                                        }
                                ?>
                                <div class="card">
                                    <div class="card-header">
                                        <button class="btn btn-block bg-secondary text-light text-left" data-toggle="collapse" data-target="#collapse<?php echo $collapse ?>">
                                            <i class="fas fa-envelope fa-2x"></i>
                                             &nbsp; <?php echo $row['sender_name'] ?> Posted a new message
                                             <span>&nbsp; &nbsp;&nbsp; <?php echo $row['date'] ?></span>
                                        </button>
                                    </div>
                                    <div class="collapse <?php  echo $showOrNot ?>" id="collapse<?php echo $collapse ?>" data-parent="#accordion">
                                        <div class="card-body">
                                            <?php echo$row['message'] ?>
                                            <br><br>
                                            <h6><?php echo $row['phone'] ?></h6>

                                        </div>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                        </div>
                        <div class="col-12 col-xl-5 mt-5">
                            <div class="card rounded">
                                <div class="card-body">
                                    <h5 class="text-muted text-center mb-4">Quick Status Post</h5>
                                    <ul class="list-inline text-center py-3">
                                        <li class="list-inline-item mr-4">
                                            <a href="">
                                                <i class="fas fa-pencil-alt text-success"></i>
                                                <span class="h6 text-muted">Status</span>
                                            </a>
                                        </li>
                                        <li class="list-inline-item mr-4">
                                            <a href="">
                                                <i class="fas fa-camera text-info"></i>
                                                <span class="h6 text-muted">Photo</span>
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="">
                                                <i class="fas fa-map-marker-alt text-primary "></i>
                                                <span class="h6 text-muted">Check-in</span>
                                            </a>
                                        </li>
                                    </ul>
                                    <form action="">
                                        <div class="form-group">
                                            <input type="text" class="form-control py2 mb-3" placeholder="What's your Status...">
                                            <button type="button" class="btn btn-block text-uppercase font-weight-bold text-light bg-info py2 mb-5">Submit</button>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="card bg-light">
                                                <i class="far fa-calendar-alt fa-8x text-warning d-block m-auto py-3"></i>
                                                <p class="card-text text-center font-weight-bold text-uppercase"> <?php 
                                              
                                              date(DATE_RSS );
                                              $arr = explode(" ", date(DATE_RSS ));
                                              echo $arr[0] . " " . $arr[1]. " " . $arr[2] . " " . $arr[3];
                                              
                                              ?> </p>
                                         </div>
                                     </div>
                                     <div class="col-6">
                                         <div class="card bg-light">
                                             <i class="far fa-clock fa-8x text-danger d-block m-auto py-3"></i>
                                             <p class="card-text text-center font-weight-bold text-uppercase"><?php echo $arr[4] ; ?> </p>
                                         </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End of Activities / quick post -->

    <?php include('includes/footer.php'); ?>
