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
<h1>Регистрация</h1> 
<p>Введите свое имя, адрес электронной почты, пароль, контрольный вопрос, ответ на него и нажмите кнопку <strong> Зарегестрироваться </strong>.</p> 
<form method="post" action="index.php" 
enctype="multipart/form-data" > 
Имя <input type="text" 
name="name" id="name"/></br> 
Email <input type="text" 
name="email" id="email"/></br> 
Пароль <input type="text" 
name="password" id="password"/></br> 
Вопрос <input type="text" 
name="vopros" id="vopros"/></br> 
Ответ <input type="text" 
name="otvet" id="otvet"/></br> 
<input type="submit" 
name="submit" value="Зарегестироваться" /> 
<?php 
try 
{ $conn = new PDO("sqlsrv:server = tcp:juuksqlserver.database.windows.net,1433; Database = juuksqlbase", "juuksqlserver", "200487pP"); 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} 
catch (PDOException $e) { 
print("Error connecting to SQL Server."); 
die(print_r($e)); 
} 
if(!empty($_POST)) { 
try { 
$name = $_POST['name']; 
$email = $_POST['email']; 
$date = date("Y-m-d"); 
$password = $_POST['password']; 
$vopros = $_POST['vopros']; 
$otvet = $_POST['otvet']; 

$sql_insert = 
"INSERT INTO registration_tbl1 (name, email, date, password, vopros, otvet) 
VALUES (?,?,?,?,?,?)"; 
$stmt = $conn->prepare($sql_insert); 
$stmt->bindValue(1, $name); 
$stmt->bindValue(2, $email); 
$stmt->bindValue(3, $date); 
$stmt->bindValue(4, $password); 
$stmt->bindValue(5, $vopros); 
$stmt->bindValue(6, $otvet); 
$stmt->execute(); 
} 
catch(Exception $e) { 
die(var_dump($e)); 
} 
echo "<h3>Your're registered!</h3>"; 
} 
$sql_select = "SELECT * FROM registration_tbl1"; 
$stmt = $conn->query($sql_select); 
$registrants = $stmt->fetchAll(); 
if(count($registrants) > 0) { 
echo "<h2>People who are registered:</h2>"; 
echo "<table>"; 
echo "<tr><th>Name</th>"; 
echo "<th>Email</th>"; 
echo "<th>Password</th>"; 
echo "<th>vopros</th>"; 
echo "<th>otvet</th>"; 
echo "<th>Date</th></tr>"; 
foreach($registrants as $registrant) { 
echo "<tr><td>".$registrant['name']."</td>"; 
echo "<td>".$registrant['email']."</td>"; 
echo "<td>".$registrant['password']."</td>"; 
echo "<td>".$registrant['vopros']."</td>"; 
echo "<td>".$registrant['otvet']."</td>"; 
echo "<td>".$registrant['date']."</td></tr>"; 
} 
echo "</table>"; 
} else { 
echo "<h3>No one is currently registered.</h3>"; 
} 
?>
