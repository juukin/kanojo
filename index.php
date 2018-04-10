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
	
	$stock1 = $_POST['stock1']; 
	$stock2 = $_POST['stock2'];
	$stock3 = $_POST['stock3'];
	$stock4 = $_POST['stock4'];
	$balance = $_POST['balance'];
	$phone = $_POST['buy']; 
	
	?>
	</body>
	</html>







