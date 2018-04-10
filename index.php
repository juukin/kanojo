<html>
<head>
    <meta charset="itf-8">
    Главная страница
    </head>
    <body>
        Finance Trade
    <centre><h3>
     Главная страница</h3></centre>
       
    <form method="POST">
    Ваш баланс: <name = "balance"> <br>
        <label form = "stock1">Акция 1</label>
        <input type = "text" name = "stock1" id = "stock1"><br>
        <label form = "stock2">Акция 2</label>
        <input type = "text" name = "stock2" id = "stock2"><br>
        <label form = "stock3">Акция 3</label>
        <input type = "text" name = "stock3" id = "stock3"><br>
        <label form = "stock4">Акция 4</label>
        <input type = "text" name = "stock4" id = "stock4"><br>
        <input type = "submit" value = "Купить" name = "buy">
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
	"INSERT INTO top123 (tireqty, oilqty, sparkqty, adress, name, phone) 
	VALUES (?,?,?,?,?,?)"; 
	$stmt = $conn->prepare($sql_insert); 
	$stmt->bindValue(1, $tireqty); 
	$stmt->bindValue(2, $oilqty); 
	$stmt->bindValue(3, $sparkqty);
	$stmt->bindValue(4, $adress);
	$stmt->bindValue(5, $name);
	$stmt->bindValue(6, $phone);
	$stmt->execute();
	 $totalqty = 0; 
	$totalqty = $tireqty + $oilqty + $sparkqty;
	$x = ($tireqty * 50) + ($oilqty * 70) + ($sparkqty * 100);
	} 
	catch(Exception $e) { 
	die(var_dump($e)); 
	} 
	echo "<h3>Your're registered!</h3>"; 
	}
$sql_select = "SELECT * FROM top123"; 
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
echo 'Ваш заказ: '. "$totalqty</br>";
echo 'Общая сумма заказа: '. "$x</br>";
echo "<td>".$registrant['adress']."</td>";
echo "<td>".$registrant['name']."</td>";
echo "<td>".$registrant['phone']."</td></tr>";
	echo rand() . "\n";
	echo rand() . "\n";
	echo rand(5, 15);
} 
echo "</table>"; 
} else { 
echo "<h3>No one is currently registered.</h3>"; 
}
	?>
	</body>
	</html>







