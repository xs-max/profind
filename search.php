<?php
    include('includes/header.php');
    require('includes/pdocon.php')

?>
<style>
    .category {
        border-radius: 10px;
        padding: 10px;
        max-height: 200px;
    }

    .right {
        transform: translateY(-20px);
    }
    .card {
        box-sizing: border-box;
    }

 
</style>

<div class="row grey lighten-3 container contain section">
    <?php  

        $category = $_GET['cat'];
        $limit = 10;
        $db = new Pdocon;
        $page = (int)$_GET['page'];
        $start_page = ($page - 1) * $limit;
        $db->query("SELECT * FROM users where category=:category ORDER BY id DESC LIMIT {$start_page},{$limit}");
        $db->bindvalue(':category', $category, PDO::PARAM_STR);
        $rows = $db->fetchMultiple();
        $db->query('SELECT COUNT(*) FROM users ');
        $run = $db->fetchSingle();
        $pages = ceil($run['COUNT(*)']/$limit);
        if (!$rows) {
            echo "<h2 style='margin-bottom: 300px' class='blue-text accent-2'>  Category is empty for now</h2>";
        }if($rows):
        foreach ($rows as $row) :

    
    ?>
    <div class="col s12">
    
    <a href="service_info.php?server=<?php echo $row['id'] ?>" class="">
    <div id="" class="card category hoverable">
        <div class="row">
            <div class="col s4">
                <img src="users/uploaded_images/<?php echo $row['image'] ?>" alt="" height="180px" width="100%">
            </div>
            <div class="col s8">
                <h5 class="light-green-text accent-4"><?php echo strtoupper($row['lastname'] . " " .  $row['firstname'] . " " . $row['middlename']) ?></h5>
                <h6 class="blue-grey-text darken-4"><?php echo $row['about'] ?></h6>
                <p class="grey-text accent-2 light"><i class="material-icons light-green-text accent-4">location_on</i> <?php echo $row['junction'] . ", " . $row['city']?>. </p>
                
            </div>
        </div>
    </div>
    </a>
    
   
</div>
<?php endforeach ; ?>
</div>
<?php 
    $entry = (int)$_GET['page'];
    
    $active2 = $entry == 1 ? 'disabled' : '';
    
?>

<ul class="pagination center-align">
<li class="<?php echo $active2 ; ?>"><a href="<?php echo "service.php?cat=". $category . "&page=" . ($page-1) ?>"><i class="material-icons">chevron_left</i></a></li>
    <?php 

        foreach(range(1, $pages) as $page) :
        $nums = array();
        array_push($nums, $page);
        $max = max($nums);
     ?>
    
    <li class="waves-effect <?php if($_GET['page'] == $page) echo "active"; ?>"><a href="<?php echo "service.php?cat=". $category . "&page=" . $page ?>"><?php echo $page ?></a></li>
    <?php endforeach ; 
    $active3 = $entry == $max ? 'disabled' : "" ;
    $active = $page === $entry ? 'active' : '';
    ?>
    <li class="waves-effect <?php echo $active3 ; ?>"><a href="<?php  echo "service.php?cat=". $category . "&page=" . ($entry+1) ?>"><i class="material-icons">chevron_right</i></a></li>
    <li></li>
  </ul>

  









  <?php include('includes/footer.php') ?>
  <?php endif ; ?>