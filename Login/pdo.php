<?php

$username ="root";
$password ="";
$hostname ="localhost";
$databank ="userdata";

$db = new PDO("mysql:host=localhost; dbname=userdata","root","");

$query = "select * from users where username='zwak' and password='zwak';";
$resultaat = $db->query($query);
$row = $resultaat->fetch();
echo "<p>query is: $query </p>";
echo "<p> Gebruikersnaam:".$row['username']."- email:" .$row["email"]." - password:". $row["password"]."</p><br><br>";

$query2 = "select * from users ;";
$resultaat2 = $db->query($query2);
$row2 = $resultaat2->fetchall();
foreach ($row2 as $test){
    echo "<p> Gebruikersnaam:".$test['username']."- email:" .$test["email"]." - password:". $test["password"]."</p>";
}