<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mrqer.css">
    <link rel="stylesheet" href="./icons/css/all.css">
    <title>Delete</title>
</head>
<style>
    .mrqer {
        margin-left: 38%;
        margin-top: -50px;
    }

    .fa-circle-xmark::before {
        content: "\f057";
        margin-left: 70%;
        cursor: pointer;
    }

    .sev {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .rename {
        width: 30%;
        height: 150px;
        background-color: white;
        border: solid 5px black;
        border-radius: 20px;
        text-align: center;
    }

    .rename span {
        color: red;
        font-size: 40px;
        float: left;
        text-align: center;
        width: 100%;
    }

    .rename input {
        height: 30px;
        float: left;
        margin-left: 25%;
        margin-top: 20px;

    }

    .rename button {
        float: left;
        margin-left: 10%;
        margin-top: 20px;
    }

    .fa-arrow-left::before {
        content: "\f060";
        font-size: 50px;
        margin-left: 50px;
        cursor: pointer;
    }
    body a{
        background-color: none;
        border: none;
        background: none;
    }


</style>

<body>
    <?php
    include './db.php';
    $id = $_GET["id"];
    ?>
    <a href="admin.php"><i class="fa-solid fa-arrow-left"></i></a>
    <div class="div">
        <?php
        $query = "SELECT * FROM `images` WHERE `id` = '$id'";

        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $imageURL = './' . $row["file_name"];
            $anun = $row["product_name"];
            $gin = $row["product_price"];
            $sale = $row["Sale"];
            $type = $row["Type"];
        ?>

            <div class="mrqer">
                <div class="anun">
                    <?php if ($sale > 0) { ?>
                        <div class="sale">
                            <img src="./sale.png" width="100%">
                        </div><span class="zexch"><?php echo $sale; ?></span><span style="color: red">%</span>
                        <span class="span"><?php echo $anun; ?></span>
                    <?php } else echo $anun; ?>

                </div>
                <div class="anun">
                    <span class="price">
                        <?php if ($sale > 0) { ?>
                            <span class="norgin"><?php echo $gin * ((100 - $sale) / 100); ?></span>
                            <del><?= $gin; ?>դրամ/կգ</del>
                        <?php   } else echo  $gin; ?>
                    </span>դրամ/կգ
                </div>
                <img class="mirq" src="<?php echo $imageURL; ?>" width="40%">
                <button class="knopka" name="name" onclick="f(name,<?php echo $id ?>)">Change name</button>
                <button class="knopka" name="price" onclick="f(name,<?php echo $id ?>)">Change price</button>
                <button class="knopka" name="type" onclick="f(name,<?php echo $id ?>)">Change type</button>
                <button class="knopka" name="img" onclick="f(name,<?php echo $id ?>)">Change img</button>
                <button class="knopka" name="sale" onclick="f(name,<?php echo $id ?>)">Change sale</button>

            </div>

        <?php } ?>
    </div>

    <?php
    if (@$_GET["rename"] == "name") { ?>
        <div class="sev">
            <div class="rename">
                <span>Write new name<i onclick="pagel(<?php echo $id ?>)" class="fa-regular fa-circle-xmark"></i></span>

                <form action=<?php echo "./update.php?id=" . $id; ?> method="post">

                    <input type="text" name="name">
                    <button type="submit" name="namebut">Ok</button>
                </form>
            </div>
        </div>

    <?php }
    ?>
    <?php
    if (@$_GET["rename"] == "price") { ?>
        <div class="sev">
            <div class="rename">
                <span>Write new price<i onclick="pagel(<?php echo $id ?>)" class="fa-regular fa-circle-xmark"></i></span>
                <form action=<?php echo "./update.php?id=" . $id; ?> method="post">
                    <input type="text" name="price">
                    <button type="submit" name="pricebut">Ok</button>
                </form>

            </div>
        </div>

    <?php } ?>
    <?php
    if (@$_GET["rename"] == "type") { ?>
        <div class="sev">
            <div class="rename">
                <span>Write new type<i onclick="pagel(<?php echo $id ?>)" class="fa-regular fa-circle-xmark"></i></span>
                <form action=<?php echo "./update.php?id=" . $id; ?> method="post">
                    <input type="text" name="type">
                    <button type="submit" name="typebut">Ok</button>
                </form>
            </div>
        </div>
    <?php } ?>
    <?php
    if (@$_GET["rename"] == "img") { ?>
        <div class="sev">
            <div class="rename">
                <span>Choose new img<i onclick="pagel(<?php echo $id ?>)" class="fa-regular fa-circle-xmark"></i></span>
                <form action=<?php echo "./update.php?id=" . $id; ?> method="post" enctype="multipart/form-data">
                    <input type="file" name="file">
                    <input type="submit" name="imgSub" value="Upload">
                </form>
            </div>
        </div>
    <?php } ?>
    <?php
    if (@$_GET["rename"] == "sale") { ?>
        <div class="sev">
            <div class="rename">
                <span>Write new sale<i onclick="pagel(<?php echo $id ?>)" class="fa-regular fa-circle-xmark"></i></span>
                <form action=<?php echo "./update.php?id=" . $id; ?> method="post">
                    <input type="text" name="sale">
                    <button type="submit" name="salebut">Ok</button>
                </form>
            </div>
        </div>
    <?php } ?>

    <script>
        function f(name, id) {
            window.location = 'rename.php?id=' + id + '&rename=' + name;
        }

        function pagel(id) {
            window.location = 'rename.php?id=' + id;
        }
    </script>
</body>

</html>