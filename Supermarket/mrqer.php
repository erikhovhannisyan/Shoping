<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./mrqer.css">
    <link rel="stylesheet" href="./icons/css/all.css">
    <title>Document</title>
</head>

<style>
    td {
        width: 20%;
    }

    .yndhanur {
        margin-top: 80%;
    }
</style>

<body>
    <?php
    $yndhanur = 0;
    include './db.php' ?>
    <div class="flex">
        <a class="a"><i class="fa-solid fa-basket-shopping"></i></a>
        <a href="mrqer.php">All</a>

        <a href="mrqer.php?type=vegatable">Vegetable</a>
        <a href="mrqer.php?type=fruit">Fruit</a>
    </div>
    <input type="text" placeholder="Sale by %" onchange="f(value)" class="inp">

    <div class="zambyux">
        <table border="1" width='100%'>
            <tr align="center" height='100%'>
                <th>ID</th>
                <th>Name</th>
                <th>Img</th>
                <th>Kg/hat</th>
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
                $kgorcount = $row['kgorcount'];
                $img = './' . $img;
                $yndhanur += $gin;
                echo "<tr align='center' height='100%'>
             <td>$id</td>
                <td>$name</td>
                <td><img  src=$img width='100%'></td>
                <td>$kg  $kgorcount</td>
                <td>$gin</td>
                
            </tr>";
            }
            ?>
            <tr align="center" height='100%'>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th><?php echo $yndhanur ?></th>
            </tr>
        </table>

        <i onclick="buy()" class="fa-solid fa-cart-shopping"></i>
    </div>


    <div class="div">
        <?php
        if (@$_GET["type"] == "vegatable") {
            $query = "SELECT * FROM `images` WHERE `Type` = 'Vegatable'";
        } else if (@$_GET["type"] == "fruit") {
            $query = "SELECT * FROM `images` WHERE `Type`='Fruit'";
        } else if (@$_GET["type"] == "Sale") {
            $skidka = $_GET["skidka"];
            $query = "SELECT * FROM `images` WHERE `Sale`>= '$skidka'";
        } else {
            $query = "SELECT * FROM `images`";
        }

        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $imageURL = './' . $row["file_name"];
            $anun = $row["product_name"];
            $gin = $row["product_price"];
            $sale = $row["Sale"];
            $type = $row["Type"];
            $id = $row["id"];
            $typekg = $row["kgorcount"];
        ?>

            <div class="mrqer">
                <div class="anun">
                    <?php if ($sale > 0) { ?>
                        <div class="sale">
                            <img src="./sale.png" width="100%">
                        </div><span class="zexch"><?php echo $sale; ?></span><span style="color: red">%</span>
                        <span class="span1"><?php echo $anun; ?></span>
                    <?php } else { ?>
                        <span class="span2"><?php echo $anun; ?></span>
                    <?php } ?>
                </div>
                <div class="anun">
                    <span class="price">
                        <?php if ($sale > 0) { ?>
                            <span class="norgin"><?php echo $gin * ((100 - $sale) / 100); ?></span>
                            <del class="deletik" ><?= $gin; ?>դրամ/<?php echo $typekg ?></del>
                        <?php   } else echo  $gin; ?>
                    </span>դրամ/<?php echo $typekg; ?>
                </div>
                <img class="mirq" src="<?php echo $imageURL; ?>" width="40%">
                <div class="arjeq">
                    <div class="minusner">
                        <button <?php if($typekg=="հատ"){?> style="margin-top: 25px;"  <?php }  ?> class="minuskg">-</button>
                        <?php if ($typekg == "կգ") { ?>
                            <button class="minusg">-</button>
                        <?php } ?>
                    </div>
                    <input type="text" class="kg" placeholder=<?php echo "0" . $typekg ?>>
                    <div class="plusner">
                        <button <?php if($typekg=="հատ"){?> style="margin-top: 25px;"  <?php }  ?>  class="pluskg">+</button>
                        <?php if ($typekg == "կգ") { ?>
                            <button class="plusg">-</button>
                        <?php } ?>
                    </div>
                </div>
                <p class="p"><span class="gin">0</span> <span class="taqunid" style="display: none;"><?php echo $id ?></span> դրամ</p>
                <div class="buy">
                    <?php if ($_SERVER['REQUEST_URI'] == "/Das109/admin.php") { ?>
                        <a href=<?php echo "rename.php?id=$id"; ?> class="delete"><i class="fa-regular fa-pen-to-square"></i></a>
                    <?php } ?>
                    <i class="fa-solid fa-cart-shopping"></i>
                    <?php if ($_SERVER['REQUEST_URI'] == "/Das109/admin.php") { ?>
                        <a href=<?php echo "delete.php?id=$id"; ?> class="delete"> <i class="fa-sharp fa-solid fa-trash " id=""></i></a>
                    <?php } ?>
                </div>

            </div>
        <?php } ?>
    </div>

    <?php
    if (@$_GET['buy'] == "?") { ?>
        <div class="sev">
            <div class="buyy">
                <span>Do You Want to Buy?</span>
                <button onclick="buyyes()">OK</button>
                <button onclick="buyno()">No</button>
            </div>
        </div>
    <?php  } ?>
    <?php
    if (@$_GET['buy'] == "true") {
        $query =  'DELETE FROM `shop`';
        $result = mysqli_query($conn, $query); ?>
        <div class="sev">
            <div class="buyy">
                <span>Thank You For Shop!</span>
                <button onclick="buyno()" style="width: 15%;">Ok</button>
            </div>
        </div>
    <?php  } ?>


    <script>
        function f(value) {
            setTimeout(() => {
                if (value > 0 && value < 100) {
                    x = false;
                    window.location = 'mrqer.php?type=Sale&skidka=' + value;
                }
            }, 1000);

        }

        function buy() {
            window.location = 'mrqer.php?buy=?'
        }

        function buyyes() {
            window.location = 'mrqer.php?buy=true'
        }

        function buyno() {
            window.location = 'mrqer.php'
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="./mrqer.js"></script>

</body>

</html>