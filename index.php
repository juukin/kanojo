<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" > 
  <title>Универмаг Краснодар</title>
</head>
<body>
<h1>Универмаг Краснодар</h1>
<h2>Результаты заказа</h2>
 
<form action="php_var.php" method=post>
<table border=1>
<tr bgcolor=#cccccc>
  <td width=150>Товар</td>
  <td width=150>Количество</td>
</tr>
<tr>
  <td>Сыр</td>
  <td align="center"><input type="text" name="tireqty" size= "3" maxlength="3"></td>
</tr>
<tr>
  <td>Растительное масло</td>
  <td align= "center"><input type="text" name="oilqty" size="3" maxlength="3"></td>
</tr>
<tr>
  <td>Майонез</td>
  <td align="center"><input type="text" name="sparkqty" size= "3" maxlength="3"></td>
</tr>
<tr>
  <td>Ваш адрес</td>
  <td align="center"><input type="text" name="address"></td>
</tr>
  <tr>
  <td>Ваше имя</td>
  <td align="center"><input type="text" name="name"></td>
    <tr>
  <td>Ваш телефон</td>
  <td align="center"><input type="text" name="phone"></td>
</tr>
<tr>
  <td colspan="2" align="center"><input type="submit" value= "Подтвердить заказ"></td>
</tr>
</table>
</form>
 <?php 
try { 
$conn = new PDO("sqlsrv:server = tcp:juuksqlserver.database.windows.net,1433; Database = juuksqlbase", "juuksqlserver", "200487pP"); 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} 
catch (PDOException $e) { 
print("Error connecting to SQL Server."); 
die(print_r($e)); 
} 
</body>
</html>

<?php
//Создаем короткие имена переменных, используя длинную форму записи.
 
  $tireqty = $HTTP_POST_VARS['tireqty'];
  $oilqty = $HTTP_POST_VARS['oilqty'];
  $sparkqty = $HTTP_POST_VARS['sparkqty'];
  $address = $HTTP_POST_VARS['address'];
  $name = $HTTP_POST_VARS['name'];
  $phone = $HTTP_POST_VARS['phone'];
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>Универмаг Краснодар</title>
</head>
<body>
<h1>Универмаг Краснодар</h1>
<h2>Ваш заказ</h2>
 
<?php
 
//вычисляем общее количество товара 
  $totalqty = 0;
  $totalqty = $tireqty + $oilqty + $sparkqty;
 
// Проверяем на пустой заказ
if ($totalqty == 0)
{
    echo '<font color=red>';
    echo 'Вы ничего не заказали!';
    echo '</font>';
    exit;
}
  echo '<p>Результаты Вашего заказа:</p>';
  echo $tireqty . ' - сыра;</br>';
  echo $oilqty . ' - растительного масла;</br>';
  echo $sparkqty . ' - майонеза;</br>';
  echo 'Ваш адрес:  ' . "$address</br>";
  echo 'Ваше имя: ' . "$name</br>";
  echo 'Ваш телефон: ' . "$phone</br>";
  echo 'Ваш заказ: '. "$totalqty</br>";
 
  $totalamount = 0.00;
  // Расчет итоговой суммы с учетом цен в прайс-листе
 
  define('TIREPRICE',100); 
  define('OILPRICE',10);
  define('SPARKPRICE',4);
 
  $totalamount =  $tireqty * TIREPRICE 
    + $oilqty * OILPRICE
    + $sparkqty * SPARKPRICE;
  echo 'Итого: '.number_format($totalamount,3).' руб'.'</br>'; 
 
  $taxrate = 0.10;  // Местный налог с продаж составляет 10%
  $totalamount = $totalamount * (1 + $taxrate);
  echo 'Всего, включая налог с продаж: '. 
  number_format($totalamount,3).' руб'.'<br>';
  echo "<p>Заказ обработан: "; echo date('H:i, jS F');
  $date = date('H:i, jS F');
   
 
flock($fp, 2); // блокируем файл – файл недоступен другим
//Проверяем, открылся ли файл. Если мы вошли внутрь файла, 
то $fp имеет значение //TRUE
if (!$fp)
 {
  echo '<p><strong>Вы не можете сейчас сделать заказ – 
  база данных недоступна!.</strong></p>';
  exit;
 }
//Если файл доступен – идет запись в строку для каждого заказа
$outputstring=$date."\t".$tireqty."tire\t"
.$oilqty."oil\t"
.$sparkqty."spark\t\$".$totalamount."\t".$address."\n";
// записываем данные в файл 
fwrite($fp, $outputstring);
 
flock($fp, 3); // Снимаем блокировку файла
fclose($fp); // закрываем файл
#echo phpinfo();
?>
</body>
</html>
