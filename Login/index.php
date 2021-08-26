<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location: login.php");
}
include "rechten.php";
$_SESSION["rechten"]=getRights($_SESSION["username"]);

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

<div class="container " id="left">
    <h2>Mijn profiel => <?php echo $_SESSION["rol"]  ?></h2>
    <a href="logout.php"> logout</a>
    <p>Welcome <?php echo $_SESSION["username"] ?></p>
    <?php if (in_array("zie_dashboard",$_SESSION["rechten"]))
    {
        echo "<a id='dash'> ga naar admin dashboard </a>";
    } ?>
    <p>Je rechten zijn : <?php foreach($_SESSION["rechten"] as $recht){
        echo "-".$recht." ";
        } ?></p>
    <img src="<?php


    $filename = $_FILES['pic']['name'] ?? "";
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $arr = ["jpg", "png", "gif"];
    $file = glob("img/" . $_SESSION["id"] . '.{jpg,gif,png}', GLOB_BRACE);


    if (isset($_FILES["pic"]) && in_array($ext, $arr)) {

        if ($file) {
            unlink($file[0]);
        }

        move_uploaded_file($_FILES["pic"]["tmp_name"], "img/" . $_SESSION["id"] . ".$ext");
        echo "img/" . $_SESSION["id"] . ".$ext";

    } else if ($file) {
        echo $file[0];

    } else {
        echo "img/download.png";
    }

    ?>">

</div>
<div class="container" id="smaller">
    <form method="post" enctype="multipart/form-data">
        <label for="upload">andere profielfoto? (jpg,png of jpg) </label>
        <input type="file" name="pic"> <?php
        if (!in_array($ext, $arr) && $ext != "") {
            echo "verkeerde upload";
        } ?>
        <input type="submit" value="upload" class="button">

    </form>

</div>
</body>
</html>