<?php 
    include('includes/header.php');
    include('includes/functions.php');
    require('includes/pdocon.php');

?>

<?php 
        $id = $_SESSION['userdata']['id'];
        $db = new Pdocon;
        $db->query("SELECT * FROM users");
        $rows = $db->fetchMultiple();


?>








    <section>
        <div class="container-fluid mt-5">
            <div class="row mb-5 mt-5">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row align-items-center">
                        <div class="col-12 col-xl-12">
                            <h3 class="text-center text-muted mb-3 mt-3">Recent Inbox</h3>
                            <table class="table text-center table-dark table-hover">
                                <thead>
                                    <tr class="text-muted">
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Category</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach ($rows as $row) :
                                            $arr = array();
                                            array_push($arr, $row['firstname']);
                                        ?>
                                    <tr>
                                        <th><?php for ($i=0; $i < count($arr); $i++) { 
                                            echo $i+1;
                                        } ?></th>
                                        <td><?php echo $row['lastname']. ' ' . $row['firstname'] . ' ' . $row['middlename'] ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['category']; ?></td>
                                        <td><a href="message.php?user=<?php echo $row['id'] ?>" class="btn btn-primary" >Send Message</a></td>
                                    </tr>
                                  <?php endforeach ; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>








<?php include('includes/footer.php'); ?>  