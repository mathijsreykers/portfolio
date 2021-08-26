<?php

function getRights($username){
    $query="select rol.role_id,users.username,roles.naam from user_role  as rol inner join users  on users.id=rol.user_id
inner join roles on rol.role_id=roles.id where users.username=:username;";
    $db = new PDO("mysql:host=localhost; dbname=userdata", "root", "");
    $prepstatement = $db->prepare($query);
    $prepstatement->bindValue(':username', $username);
    $prepstatement->execute();
    $rol= $prepstatement->fetch();
    $_SESSION["rol"]=$rol["naam"];

    switch($rol["naam"]){
        case "admin": $rechten=["zie_dashboard","zie_blog","update_post","create_post","read_post","delete_post"];
                break;
        case "docent": $rechten= ["zie_blog","update_post","create_post","read_post"];
                break;
        case "cursist": $rechten = ["zie_blog","read_post"];
                break;

    }
    return $rechten;


}



