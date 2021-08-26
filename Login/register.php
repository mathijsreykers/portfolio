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
    <h2>Registreer</h2>
    <form method="post">
        <label for="username">Gebruikersnaam</label>
        <input type="text" name="username" value="">
        <label for="password">Password</label>
        <input type="password" name="password" value="">
        <label for="email">email</label>
        <input type="text" name="email" value="">
        <?php
        if (isset($_POST["username"]) && isset($_POST["password"])) {
            $db = new PDO("mysql:host=localhost; dbname=userdata", "root", "");
            $query = "select * from users ;";
            $resultaat = $db->query($query);
            $rows = $resultaat->fetchall();
            $valid = true;

            foreach ($rows as $row) {
                if ($row["username"] == $_POST["username"] || $row["email"] == $_POST["email"]) {

                    $valid = false;
                }
            }

            if ($valid) {
                $user = $_POST["username"];
                $pass = $_POST["password"];
                $mail =$_POST["email"];

                // user tabel
                $query2 = "insert into users(username,password,email) values(:username,:password,:email)";
                $prepstatement = $db->prepare($query2);
                $prepstatement->bindParam(':username', $user);
                $prepstatement->bindParam(':password', $pass);
                $prepstatement->bindParam(':email', $mail);
                $prepstatement->execute();

                //user info
                $query3="select id from users where username=:username;";
                $prepstatement = $db->prepare($query3);
                $prepstatement->bindParam(':username', $user);
                $prepstatement->execute();
                $id = $prepstatement->fetch();
                $id=$id["id"];



                $query4 = "insert into user_role(user_id,role_id) values(:id,3)";
                $prepstatement = $db->prepare($query4);
                $prepstatement->bindParam(':id', $id);
                $prepstatement->execute();
                header("location: logout.php");
                exit();
            } else {
                echo "<p>usernaam of email is al in gebruik</p>";
            }


        }
        ?>
        <input class="button" type="submit" value="registreer" name="but">

    </form>
</div>
</body>
</html>
