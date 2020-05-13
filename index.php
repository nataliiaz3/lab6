<?php require_once __DIR__ . "/vendor/autoload.php"; 
$client = new MongoDB\Client("mongodb://localhost:27017");
$collection = $client->onlinestore->onlinestore;
?>

<html>
   <head>
      <meta charset="utf-8">
      <title>Zaporozhets lab 2</title>
      <script>

      function LoadPage(){
         alert(localStorage.getItem("page"));
         if(localStorage.getItem("page") == null){
            alert("Данные отсутствуют в хранилище.");
         }
         else if(localStorage.getItem("page") == "vendor")
         {
            document.write('<table border="1"><tr><th>Vendor</th></tr>');      
            var arr_vendor = JSON.parse(localStorage.getItem('vendor'));   
            var size = parseInt(localStorage.getItem("size"));
            for(let i = 0; i<size; i++) {
               document.write('<tr><td>' + arr_vendor[i] + '</td></tr>');
            };
            document.write('</table>');
         }
         else if(localStorage.getItem("page") == "quantity")
         {
            document.write('<table border="1"><tr><th>Name</th><th>Price</th><th>Quantity</th><th>Vendor</th></tr>');
            var arr_name = JSON.parse(localStorage.getItem('name'));          
            var arr_price = JSON.parse(localStorage.getItem('price'));
            var arr_quantity = JSON.parse(localStorage.getItem('quantity'));      
            var arr_vendor = JSON.parse(localStorage.getItem('vendor'));          
            var size = parseInt(localStorage.getItem("size"));
            for(let i = 0; i<size; i++) {
               document.write('<tr><td>' + arr_name[i] + '</td>');
               document.write('    <td>' + arr_price[i] + '</td>');
               document.write('    <td>' + arr_quantity[i] + '</td>');
               document.write('    <td>' + arr_vendor[i] + '</td>');
               document.write('</tr>');
            };
            document.write('</table>');
         }
         else if(localStorage.getItem("page") == "price")
         {
            document.write('<table border="1"><tr><th>Name</th><th>Price</th><th>Quantity</th><th>Vendor</th></tr>');
            var arr_name = JSON.parse(localStorage.getItem('name'));          
            var arr_price = JSON.parse(localStorage.getItem('price'));
            var arr_quantity = JSON.parse(localStorage.getItem('quantity'));      
            var arr_vendor = JSON.parse(localStorage.getItem('vendor'));          
            var size = parseInt(localStorage.getItem("size"));
            for(let i = 0; i<size; i++) {
               document.write('<tr><td>' + arr_name[i] + '</td>');
               document.write('    <td>' + arr_price[i] + '</td>');
               document.write('    <td>' + arr_quantity[i] + '</td>');
               document.write('    <td>' + arr_vendor[i] + '</td>');
               document.write('</tr>');
            };
            document.write('</table>');
         }
      }
      </script>
   </head>
   <body>
      <form action="vendor.php" method="POST">
         <label>Производители, с которыми работает магазин </label>
         <input id ="vendor" type="submit" name="send" value="Показать">
      </form>
      

      <form action="quantity.php" method="POST">
         <label>Товары, которых сейчас нет на складе </label>
         <input id="guantity" type="submit" name="send" value="Показать">
      </form>

      <form action="price.php" method="POST">
          <label>Товары в ценовом диапазоне: </label>
		  с <input type="number" name = "minPrice">
		  по <input type="number" name = "maxPrice">
         <input id="price" type="submit" name="send" value="Показать">
      </form>

      <form>
         <input id="btnWebStorage" type="button" name="load" value="Загрузить" onclick="LoadPage()">
      </form>
   </body>
</html>