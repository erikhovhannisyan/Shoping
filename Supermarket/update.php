<?php
include './db.php';
if (isset($_POST["namebut"])) {
    $name = $_POST["name"];
    $id = $_GET["id"];
    $query1 = "UPDATE  `images` SET  `product_name`='$name' WHERE `id`='$id'";
    $result = mysqli_query($conn, $query1);
    header("location:admin.php");
}

if (isset($_POST["pricebut"])) {
    $name = $_POST["price"];
    $id = $_GET["id"];
    $query1 = "UPDATE  `images` SET  `product_price`='$name' WHERE `id`='$id'";
    $result = mysqli_query($conn, $query1);
    header("location:admin.php");
}
if (isset($_POST["typebut"])) {
    $name = $_POST["type"];
    $id = $_GET["id"];
    $query1 = "UPDATE  `images` SET  `Type`='$name' WHERE `id`='$id'";
    $result = mysqli_query($conn, $query1);
    header("location:admin.php");
}
if (isset($_POST["salebut"])) {
    $name = $_POST["sale"];
    $id = $_GET["id"];
    $query1 = "UPDATE  `images` SET  `Sale`='$name' WHERE `id`='$id'";
    $result = mysqli_query($conn, $query1);
    header("location:admin.php");
}

// $name = $_POST["sale"];
// $id = $_GET["id"];
// $query1 = "UPDATE  `images` SET  `Sale`='$name' WHERE `id`='$id'";
// $result = mysqli_query($conn, $query1);
// header("location:admin.php");
if (isset($_POST["imgSub"])) {
    $id = $_GET["id"];
    $statusMsg = '';
    $targetDir = "./";
    $fileName = basename($_FILES["file"]["name"]);
    $targetFillePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFillePath, PATHINFO_EXTENSION);
    if (isset($_POST["imgSub"]) && !empty($_FILES["file"]["name"])) {
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFillePath)) {
                $insert = "UPDATE  `images` SET  `file_name`='$fileName' WHERE `id` = '$id'";
                mysqli_query($conn, $insert);
                if ($insert) {
                    $statusMsg = "The file " . $fileName . "has been uploaded successfuly.";
                    header("location: admin.php");
                } else {
                    $statusMsg = "File upload  failed, please try again.";
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select a file to upload';
    }
    echo $statusMsg;
}
