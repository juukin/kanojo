<html>
	<head>
	<Title>TradeActions</Title>
	<style type="text/css">
	body { background-color: 
	#fff; border-top: solid 10px #000; 
	color: #333; font-size: .85em; 
	margin: 20; padding: 20; 
	font-family: "Segoe UI", 
	Verdana, Helvetica, Sans-Serif; 
	} 
	h1, h2, h3,{ color: #000; 
	margin-bottom: 0; padding-bottom: 0; } 
	h1 { font-size: 2em; } 
	h2 { font-size: 1.75em; } 
	h3 { font-size: 1.2em; } 
	table { margin-top: 0.75em; } 
	th { font-size: 1.2em; 
	text-align: left; border: none; padding-left: 0; } 
	td { padding: 0.25em 2em 0.25em 0em; 
	border: 0 none; } 
	</style>
	</head>
	<body>
	<h1>Добро пожаловать в Trade Actions!</h1>
	<p>Главная страница</p>
	<form method="post" action="index.php" 
	enctype="multipart/form-data" >
	<input type = "submit" value = "показать баланс" name = "balance"> <br>
        <label form = "stock1">Microsoft stock = 164€</label>
        <input type = "text" name = "stock1" id = "stock1">
        <label form = "stock2">Apple stock = 150€</label>
        <input type = "text" name = "stock2" id = "stock2">
        <label form = "stock3">Samsung stock = 78€</label>
        <input type = "text" name = "stock3" id = "stock3">
        <label form = "stock4">LG stock = 44€</label>
        <input type = "text" name = "stock4" id = "stock4">
	<input type = "submit" value = "Купить" name = "buy1">
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
	$balance = $_POST['balance']; 
	$stock1 = $_POST['stock1'];
	$stock2 = $_POST['stock2'];
	$stock3 = $_POST['stock3'];
	$stock4 = $_POST['stock'];
	$buy1 = $_POST['buy1'];
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
	 $totalstock = 0; 
	$totalstock = $stock1 + $stock2 + $stock3 + $stock4;
	$x = ($stock1 * 164) + ($stock2 * 150) + ($stock3 * 78) + ($stock4 * 44);
	$stock1 = 164;
	$stock2 = 150;
	$stock3 = 78;
	$stock4 = 44;
		if( isset( $_POST['buy1'] ) )
    {
       
        echo "$balance + $x";
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







