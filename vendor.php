<?php require_once __DIR__ . "/vendor/autoload.php"; 
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->onlinestore->onlinestore;

$vendor = "vendor";
$cursor = $collection->distinct($vendor);

?>

<script type="text/javascript">
    localStorage.clear();
    localStorage.setItem("page", "vendor");
    localStorage.setItem("type","vendors");
</script>

<?
echo '<table border="1"><tr><th>Vendor</th></tr>';
$arr_vendors = array();
$size=0;
foreach ($cursor as $document) 
{
    echo '<tr><td>',$document['vendor'],'</td></tr>';
	array_push($arr_vendors, $document['vendor']);
	$size++;
}
	echo '</table>';
?>
<script type="text/javascript">

    var arr_vendors = <?echo json_encode($arr_vendors);?>;
   
    localStorage.setItem("size","<?echo $size;?>");
    localStorage.setItem("vendor",JSON.stringify(arr_vendors));
</script>


