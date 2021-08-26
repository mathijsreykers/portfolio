<?php
header("Content-Type:application/json");
header('Access-Control-Allow-Origin: *');

insertQuery();


function insertQuery(){
    $db= new PDO("mysql:host=localhost; dbname=gastenboek", "root", "");
    $query = "select * from comments order by id_parent";
   $res = $db->prepare($query);
   $res->execute();
   $response = $res->fetchall();
   $wat = json_encode($response);
   echo $wat;


}