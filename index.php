<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" > 
  <title>Универмаг Краснодар</title>
</head>
<body>
<h1>Универмаг Краснодар</h1>
<h2>Результаты заказа</h2>
 
<form method="post" action="index.php" 
enctype="multipart/form-data" > 
<table border=1>
<tr bgcolor=#cccccc>
  <td width=150>Товар</td>
  <td width=150>Количество</td>
</tr>
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
if(!empty($_POST)) { 
try { 
$tireqty = $_POST['tireqty']; 
$oilqty = $_POST['oilqty'];
$sparkqty = $_POST['sparkqty'];
$adress = $_POST['adress'];
$name = $_POST['name'];
$phone = $_POST['phone']; 
$sql_insert = 
"INSERT INTO registration_tbl (tireqty, oilqty, sparkqty, adress, name, phone) 
VALUES (?,?,?,?,?,?)"; 
$stmt = $conn->prepare($sql_insert); 
$stmt->bindValue(1, $tireqty); 
$stmt->bindValue(2, $oilqty); 
$stmt->bindValue(3, $sparkqty);
$stmt->bindValue(3, $adress);
$stmt->bindValue(3, $name);
$stmt->bindValue(3, $phone);
$stmt->execute(); 
} 
catch(Exception $e) { 
die(var_dump($e)); 
} 
echo "<h3>Your're registered!</h3>"; 
} 
$sql_select = "SELECT * FROM registration_tbl"; 
$stmt = $conn->query($sql_select); 
$registrants = $stmt->fetchAll(); 
if(count($registrants) > 0) { 
echo "<h2>People who are registered:</h2>"; 
echo "<table>"; 
echo "<tr><th>tireqty</th>"; 
echo "<th>oilqty</th>"; 
echo "<th>sparkqty</th>";
echo "<th>adress</th>";
echo "<th>name</th>";
echo "<th>phone</th></tr>";
foreach($registrants as $registrant) { 
echo "<tr><td>".$registrant['tireqty']."</td>"; 
echo "<td>".$registrant['oilqty']."</td>";
echo "<td>".$registrant['sparkqty']."</td>";
echo "<td>".$registrant['adress']."</td>";
echo "<td>".$registrant['name']."</td>";
echo "<td>".$registrant['phone']."</td></tr>";
} 
echo "</table>"; 
} else { 
echo "<h3>No one is currently registered.</h3>"; 
} 
?> 
</body> 
</html>
