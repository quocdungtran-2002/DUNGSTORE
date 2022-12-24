<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dungstore";

// tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);
// kiểm kết nối
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM tbl_cartegory";
$resultC = $conn->query($sql);
$sql1 = "SELECT * FROM `tbl_producttype`,tbl_cartegory WHERE tbl_producttype.cartegory_id=tbl_cartegory.cartegory_id and tbl_producttype.cartegory_id=23";
$resultP = $conn->query($sql1);
// $sql2 = "SELECT product_name FROM tbl_product";
// $resultP1 = $conn->query($sql2);

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DUNGSTORE</title>

    <link rel="icon" href="./assets/img/d-solid.svg" type="image/x-icon" />

    <!-- Slide -->
    <link rel="stylesheet" href="./assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/owl.carousel.min.js"></script>
    <script src="./assets/js/js.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./assets/font/themify-icons/themify-icons.css">
</head>
<body>
    