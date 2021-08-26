<?php

$db = new PDO("mysql:host=localhost; dbname=gastenboek", "root", "");
    if (isset($_POST["mijndata"])) {

        $data = json_decode($_POST["mijndata"]);
        $test = $data->test;
        $id = $data->id_parent;
        insertQuery($test,$id);
//        insertQuery($_POST["mijndata"],null);
    }



    function insertQuery($test,$parent_id){
        global $db;
        $query = "insert into comments (body,id_parent) values (?,?);";
        $stmt = $db->prepare($query);
        $stmt->execute([$test,$parent_id]);

    }

