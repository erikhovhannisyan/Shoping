<?php
include './db.php';
$statusDir = '';

$targetDir = "./";
$fileName = basename($_FILES["file"]["name"]);
$targetFillePath = $targetDir . $fileName;
$fileType = pathinfo($targetFillePath, PATHINFO_EXTENSION);
if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
    $name = $_POST["mirg"];
    $gin = $_POST["arjeq"];
    $sale = $_POST["Sale"];
    $type = $_POST["a"];
    $kgorcount = $_POST["b"];
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
    if (in_array($fileType, $allowTypes)) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFillePath)) {
            $insert = "INSERT INTO `images`(`file_name`, `product_price`, `product_name`, `Sale`, `Type`, `kgorcount`) VALUES ('$fileName','$gin','$name', '$sale', '$type', '$kgorcount')";
            mysqli_query($conn, $insert);
            if ($insert) {
                $statusMsg = "The file " . $fileName . "has been uploaded successfuly.";
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
header("location: admin.php");
