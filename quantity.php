<?php require_once __DIR__ . "/vendor/autoload.php"; 
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->onlinestore->onlinestore;

$cursor = $collection->find(["quantity"] => 0]);

?>

<script type="text/javascript">
    localStorage.clear();
    localStorage.setItem("page", "quantity");
    localStorage.setItem("type", "quantity");
</script>

<?
$arr_name = array();
$arr_price = array();
$arr_quantity = array();
$arr_vendor = array();
$size=0;

echo '<table border="1"><tr><th>Name</th><th>Price</th><th>Quantity</th><th>Vendor</th></tr>';
foreach ($cursor as $document) 
{
    echo '<tr>  <td>',$document['name'],'</td>',
               '<td>',$document['price'],'</td>',
               '<td>',$document['quantity'],'</td>',
               '<td>',$document['vendor'],'</td>',
         '</tr>';  

    array_push($arr_name, $document['name']);
    array_push($arr_price, $document['price']);
    array_push($arr_quantity, $document['quantity']);
    array_push($arr_vendor, $document['vendor']);
    $size++;
}
echo '</table>';
?>

<script type="text/javascript">
    var arr_name = <?echo json_encode($arr_name);?>;
    var arr_price = <?echo json_encode($arr_price);?>;
    var arr_quantity = <?echo json_encode($arr_quantity);?>;
    var arr_vendor = <?echo json_encode($arr_vendor);?>;
    
    localStorage.setItem("size","<?echo $size;?>");
    localStorage.setItem("name", JSON.stringify(arr_name));
    localStorage.setItem("price",JSON.stringify(arr_price));
    localStorage.setItem("quantity",JSON.stringify(arr_quantity));
    localStorage.setItem("vendor",JSON.stringify(arr_vendor));

</script> 
