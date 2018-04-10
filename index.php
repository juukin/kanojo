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
        <label form = "stock1">Акции Apple 288€ за шт.</label>
        <input type = "text" name = "stock1" id = "stock1"><br>
        <label form = "stock2">Акции Sony 155€ за шт.</label>
        <input type = "text" name = "stock2" id = "stock2"><br>
        <label form = "stock3">Акции Microsoft 201€ за шт.</label>
        <input type = "text" name = "stock3" id = "stock3"><br>
        <label form = "stock4">Акции Tesla 115€ за шт.</label>
        <input type = "text" name = "stock4" id = "stock4"><br>
        <input type = "submit" value = "Купить" name = "buy">
	</form>
	<?php
	
	$tireqty = $_POST['tireqty']; 
	$oilqty = $_POST['oilqty'];
	$sparkqty = $_POST['sparkqty'];
	$adress = $_POST['adress'];
	$name = $_POST['name'];
	$phone = $_POST['phone']; 
	
	?>
	</body>
	</html>







