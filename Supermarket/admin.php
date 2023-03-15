<?php
include 'db.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./mrqer.css">
    <title>Document</title>
</head>

<body>

    <?php if (@$_SESSION["ip"] == $_SERVER['REMOTE_ADDR']) { ?>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Name: <input type="text" name="mirg"><br><br>
            Value: <input type="number" name="arjeq"><br><br>
            Fruit <input type="radio" name="a" value="Fruit"> Vegatable <input type="radio" name="a" value="Vegatable"><br><br>
            Count <input type="radio" name="b" value="հատ"> Kg<input name="b" type="radio" value="կգ"><br><br>
            Sale: <input type="number" name="Sale">
            <input type="file" name="file"><br><br>
            <input type="submit" name="submit" value="Upload">
            <a class="logout" href="logout.php?logout">Logout</a>
        </form>

        <?php include './mrqer.php'; ?>

    <?php  } else { ?>
        <form method="post" action="adminLog.php">
            Login:<input type="text" name="login">
            Password :<input type="password" name="pass">
            <button type="submit">OK</button>
        </form>
    <?php

    }
    ?>


</body>

</html>