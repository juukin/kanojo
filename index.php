<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" > 
  <title>Универмаг Краснодар</title>
</head>
<body>
<h1>Универмаг Краснодар</h1> 
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
</tr>
<tr>
  <td colspan="2" align="center"><input type="submit" value= "Подтвердить заказ"></td>
</tr>
</table>
</form>
 
</body>
</html>
<?php 
try { 
$conn = new PDO("sqlsrv:server = tcp:juuksqlserver.database.windows.net,1433; Database = juuksqlbase", "juuksqlserver", "200487pP"); 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} 
catch (PDOException $e) { 
print("Error connecting to SQL Server."); 
die(print_r($e)); 
} 
if(!empty($_POST)) { 
try { 
$tireqty = $_POST['tireqty'];
$oilqty = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
$address = $_POST['address'];
$name = $_POST['name']; 

?>
<html>
<head>
<title>Универмаг Краснодар</title>
</head>
<body>
<h1>Универмаг Краснодар</h1>
<h2>Ваш заказ</h2>
 
<?php
  
  $totalqty = 0;
  $totalqty = $tireqty + $oilqty + $sparkqty;
 
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
  echo 'Ваш адрес:  ' . "$address</br>";
  echo 'Ваше имя:  ' . "$name</br>";
  echo 'Ваш заказ: '. "$totalqty</br>";
 
  $totalamount = 0.00;
  } 
echo "</table>"; 
} else { 
echo "<h3>No one is currently registered.</h3>"; 
} 
?>
