<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mrqer.css">
    <title>Delete</title>
</head>
<style>
    .mrqer {
        margin-left: 38%;
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

    .zgush {
        width: 30%;
        height: 150px;
        background-color: white;
        border: solid 2px black;
        border-radius: 20px;
        text-align: center;
    }
    .zgush p{
        color: red;
        font-size: 30px;
    }
    .zgush button{
        float: left;
        width: 30%;
        margin-left: 13%;
        margin-top: 30px;
    }
</style>

<body>
    <?php
    include './db.php';
    $id = $_GET["id"];
    ?>
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
                <div class="arjeq">
                    <div class="minusner">
                        <button class="minuskg">-</button>
                        <button class="minusg">-</button>
                    </div>
                    <input type="text" class="kg" placeholder="0.0կգ">
                    <div class="plusner">
                        <button class="pluskg">+</button>
                        <button class="plusg">+</button>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>
    <?php
    if (@$_GET["sucsess"] == "true") {
        $query1 = "DELETE FROM `images` WHERE `id`='$id'";
        $result = mysqli_query($conn, $query1);
        header("location: admin.php");
    }
    ?>
    <div class="sev">
        <div class="zgush">
            <p style="margin-top: 20px;" >Do you want delete <?php echo $anun ?></p>
            <button onclick="yes(<?php echo  $id ?>)">Yes</button>
            <button onclick="no()">No</button>
        </div>
    </div>
    <script>
        function yes(id) {
            window.location = 'delete.php?id=' + id + "&sucsess=true";
        }

        function no() {
            window.location = 'admin.php';
        }
    </script>
</body>

</html>