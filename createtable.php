<?

try {
    $conn = new PDO("sqlsrv:server = tcp:juuksqlserver.database.windows.net,1433; Database = juuksqlbase", "juuksqlserver", "200487pP");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
 
$sql = "CREATE TABLE registration_top(
id INT NOT NULL IDENTITY(1,1),
PRIMARY KEY(id);
tireqty VARCHAR(30);
oilqty VARCHAR(30);
sparkqty VARCHAR(30);
address VARCHAR(30);
name VARCHAR(30);
phone VARCHAR(30)";
$conn->query($sql);
echo «<h3>Таблица создана.</h3>»;
}
catch (PDOException $e) 
print("Ошибка подключения к SQL Server.");
die(print_r($e));
}

?>

