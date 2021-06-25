<?php
$limit = 2;
$query = "SELECT count(*) FROM kategori";

$s = $db->query($query);
$total_results = $s->fetchColumn();
$total_pages = ceil($total_results/$limit);

if (!isset($_GET['page'])) {
    $page = 1;
} else{
    $page = $_GET['page'];
}



$starting_limit = ($page-1)*$limit;
$show  = "SELECT * FROM kategori ORDER BY id DESC LIMIT ?,?";

$r = $db->prepare($show);
$r->execute([$starting_limit, $limit]);

while($res = $r->fetch(PDO::FETCH_ASSOC)):
?>
<h4><?php echo $res['id'];?></h4>
<p><?php echo $res['nama_kat'];?></p>
<hr>
<?php
endwhile;


for ($page=1; $page <= $total_pages ; $page++):?>

<a href='<?php echo "?page=$page"; ?>' class="links"><?php  echo $page; ?>
 </a>

<?php endfor; ?>