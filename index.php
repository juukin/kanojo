<html> 
<head> 
<Title>Registration Form</Title> 
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
<h1>Register here!</h1> 
<p>Fill in your name and 
email address, then click <strong>Submit</strong> 
to register.</p> 
<form method="post" action="index.php" 
enctype="multipart/form-data" > 
tireqty <input type="text" 
name="сыр" id="tireqty"/></br> 
oilqty <input type="text" 
name="масло" id="oilqty"/></br>
sparkqty <input type="text" 
name="майонез" id="sparkqty"/></br>
adress <input type="text" 
name="adress" id="adress"/></br>
name <input type="text" 
name="name" id="name"/></br>
phone <input type="phone" 
name="phone" id="phone"/></br>
<input type="submit" 
name="submit" value="Submit" /> 
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
