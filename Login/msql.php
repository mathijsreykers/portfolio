<?php
$username ="root";
$password ="";
$hostname ="localhost";
$databank ="userdata";

$db = mysqli_connect("localhost","root","","userdata");


$query = "select * from users where username='zwak' and password='zwak';";
$resultaat = mysqli_query($db,$query);
$row = mysqli_fetch_array($resultaat);
echo "<p>query is: $query </p>";
echo "<p> Gebruikersnaam:".$row['username']."- email:" .$row["email"]." - password:". $row["password"]."</p><br><br>";

$query2 = "select * from users ;";
$resultaat2 = mysqli_query($db,$query2);
$row2 = mysqli_fetch_all($resultaat2,MYSQLI_ASSOC);
foreach ($row2 as $test){
    echo "<p> Gebruikersnaam:".$test['username']."- email:" .$test["email"]." - password:". $test["password"]."</p>";
}
