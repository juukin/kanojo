<?php 
echo "123456"; 
try { 
$conn = new PDO("sqlsrv:server = tcp:juuksqlserver.database.windows.net,1433; Database = juuksqlbase", "juuksqlserver", "200487pP"); 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$sql = "CREATE TABLE top123( 
id INT NOT NULL IDENTITY(1,1) 
PRIMARY KEY(id), 
tireqty = 50, 
oilqty = 40, 
sparkqty = 30,
adress VARCHAR(30),
name VARCHAR(30),
phone VARCHAR(30)
summa VARCHAR(100))"; 
$conn->query($sql); 
} 
catch (PDOException $e) { 
print("Error connecting to SQL Server."); 
die(print_r($e)); 
} 
echo"123"; 
?>

