<?php
$username ="root";
$password ="";
$hostname ="localhost";
$databank ="userdata";

$db = new mysqli("localhost","root","","userdata");


$query = "select * from users where username='zwak' and password='zwak';";
$resultaat = $db->query($query);
$row = $resultaat->fetch_assoc();
echo "<p>query is: $query </p>";
echo "<p> Gebruikersnaam:".$row['username']."- email:" .$row["email"]." - password:". $row["password"]."</p><br><br>";


$query2 = "select * from users ;";
$resultaat2 = $db->query($query2);
$row2 = $resultaat2->fetch_all(MYSQLI_ASSOC);
foreach ($row2 as $test){
    echo "<p> Gebruikersnaam:".$test['username']."- email:" .$test["email"]." - password:". $test["password"]."</p>";
}