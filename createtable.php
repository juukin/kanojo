<?php 
try { 
	$conn = new PDO("sqlsrv:server = tcp:juuksqlserver.database.windows.net,1433; Database = juuksqlbase", "juuksqlserver", "200487pP"); 
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "CREATE TABLE registration_tbl( 
id INT NOT NULL IDENTITY(1,1) 
PRIMARY KEY(id), 
Name VARCHAR(30), 
Lname VARCHAR(30), 
Login VARCHAR(30), 
Password VARCHAR(30), 
Otvet VARCHAR(30), 
srok INT, 
sum INT, 
Balance VARCHAR(30), 
stock1 VARCHAR(30), 
stock2 VARCHAR(30), 
stock3 VARCHAR(30), 
stock4 VARCHAR(30), 
date DATE)"; 
$conn->query($sql); 

echo "<h3>Таблица создана!</h3>"; 
} 
catch (PDOException $e) { 
print("Ошибка подключения к SQL Server."); 
die(print_r($e)); 
} 
?>


