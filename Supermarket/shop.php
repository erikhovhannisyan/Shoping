<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../icons/css/all.css">
    <title>Document</title>
</head>

<style>
    body {
        background-image: url(./mirgbg.webp);
    }

    .div {
        float: left;
        width: 50%;
    }

    .table {
        float: left;
        border: 1px solid black;
        text-align: center;
    }

    td {
        width: 100px;
        border: 1px solid black;
    }

    tr {
        width: 100%;
    }

    a {
        color: black;
    }
</style>

<body>
    <?php
    $gin1 = @$_GET['gin'];
    $kg1 = @$_GET['kg'];
    $anun1 = @$_GET['anun'];
    $src = @$_GET['src'];
    $tesak = @$_GET['kgorcount'];

    if (!empty($gin1) || !empty($kg1) || !empty($anun1) || !empty($src) || !empty($tesak)) {
        $query =  "INSERT INTO `shop`( `Name`, `IMG`, `kg`, `dram`, `kgorcount`) VALUES ('$anun1','$src','$kg1','$gin1', '$tesak')";
        $result = mysqli_query($conn, $query);
        header('location: mrqer.php');
    }
    ?>



    <table border="1" width='100%'>
        <tr align="center" height='60px'>
            <th>ID</th>
            <th>Name</th>
            <th>Img</th>
            <th>Kg</th>
            <th>Gin</th>
        </tr>
        <?php
        $query = "SELECT * FROM `shop` ";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $name = $row['Name'];
            $img = $row['IMG'];
            $kg = $row['kg'];
            $gin = $row['dram'];
            $img = './' . $img;
            echo "<tr align='center' height='60px'>
             <td>$id</td>
                <td>$name</td>
                <td><img  src=$img width='30%'></td>
                <td>$kg</td>
                <td>$gin</td>
            </tr>";
        }
        ?>
    </table>

</body>

</html>