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
    	<input type = "submit" value = "Показать баланс" name = "balance"><br>
        <label form = "stock1">Акции Apple 288€ за шт.</label>
        <input type = "text" name = "stock1" id = "stock1"><br>
        <label form = "stock2">Акции Sony 155€ за шт.</label>
        <input type = "text" name = "stock2" id = "stock2"><br>
        <label form = "stock3">Акции Microsoft 201€ за шт.</label>
        <input type = "text" name = "stock3" id = "stock3"><br>
        <label form = "stock4">Акции Tesla 115€ за шт.</label>
        <input type = "text" name = "stock4" id = "stock4"><br>
        <input type = "submit" value = "Купить" name = "buy">
	<form>
<input type="button" value="Перейти в личный кабинет" onClick='location.href="1.php"'><br>
</form>
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
$sql_select = "SELECT * FROM stock_tbl"; 


	$stock1 = $_POST['stock1']; 
	$stock2 = $_POST['stock2'];
	$stock3 = $_POST['stock3'];
	$stock4 = $_POST['stock4'];
	$balance = $_POST['balance'];
	$buy = $_POST['buy'];
	
	$balance = 40000;
	$totalst = 0; 
	$totalst = ($stock1 * 288) + ($stock2 * 155) + ($stock3 * 201) + ($stock4 * 155);
	$x = ($stock1 * 288) + ($stock2 * 155) + ($stock3 * 201) + ($stock4 * 155) - $balance;
	    if( isset( $_POST['balance'] ) )
    {
       
        echo "Ваш баланс: $balance";
 }
	    if( isset( $_POST['buy'] ) )
    {
	echo "Сумма сделки составила: $totalst ";
       
        echo "Ваш баланс: $x";
 }

	    
	
		     
	?>
	</body>
	</html>







