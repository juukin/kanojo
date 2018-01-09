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
  <td colspan="2" align="center"><input type="submit" value= "Подтвердить заказ"></td>
</tr>
</table>
</form>
 
</body>
</html>
<?php
//Создаем короткие имена переменных, используя длинную форму записи.
 
  $tireqty = $HTTP_POST_VARS['tireqty'];
  $oilqty = $HTTP_POST_VARS['oilqty'];
  $sparkqty = $HTTP_POST_VARS['sparkqty'];
  $address = $HTTP_POST_VARS['address'];
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
    echo 'Вы ничего не заказали!!!';
    echo '</font>';
    exit;
}
  echo '<p>Результаты Вашего заказа:</p>';
  echo $tireqty . ' - сыра;</br>';
  echo $oilqty . ' - растительного масла;</br>';
  echo $sparkqty . ' - майонеза;</br>';
  echo 'Ваш адрес:  ' . "$address</br>";
  echo 'Ваш заказ: '. "$totalqty</br>";
 
  $totalamount = 0.00;
 
 
  define('TIREPRICE',100); 
  define('OILPRICE',10);
  define('SPARKPRICE',4);
 
  $totalamount =  $tireqty * TIREPRICE 
    + $oilqty * OILPRICE
    + $sparkqty * SPARKPRICE;
  echo 'Итого: '.number_format($totalamount,3).' руб'.'</br>'; 
 
  $taxrate = 0.10;  // Местный налог с продаж составляет 10%
  $totalamount = $totalamount * (1 + $taxrate);
  echo 'Всего, включая налог с продаж: '. 
  number_format($totalamount,3).' руб'.'<br>';
  echo "<p>Заказ обработан: "; echo date('H:i, jS F');
  $date = date('H:i, jS F');
  
</body>
</html>
