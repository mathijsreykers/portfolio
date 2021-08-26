<?php


session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container">
    <h2>login</h2>
    <form method="post">
        <label for="username">Gebruikersnaam</label>
        <input type="text" name="username" value="">
        <label for="password">Password</label>
        <input type="password" name="password" value="">
        <div id="buttoncon">
        <input class="button" type="submit" value="login" name="but">
            <a class="button" id="right" type=""  name="but2" href="register.php">register</a>
        </div>
        <?php

            function check($user, $pass)
            {
                $db = new PDO("mysql:host=localhost; dbname=userdata", "root", "");
                $query = "select * from users ;";
                $resultaat = $db->query($query);
                $rows = $resultaat->fetchall();
                foreach ($rows as $row) {
                    if ($row["username"] == $user && $row["password"] == $pass) {
                        $_SESSION["username"] = $user;
                        $_SESSION["id"] = $row["id"];
                        header("location: index.php");
                        exit();
                    }
                }
                echo "usernaam of password fout";
            }


        if (isset($_POST["username"]) && isset($_POST["password"])) {

           check($_POST["username"], $_POST["password"]);
        }
        ?>
    </form>
</div>
</body>
</html>
