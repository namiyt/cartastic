<?php
require 'database.php';
$url = 'http' . (isset($_SERVER['HTTPS']) ? 's' : '') . '://' . "{$_SERVER['HTTP_HOST']}/{$_SERVER['REQUEST_URI']}";
$product_page = substr($url,54,55);
$product_page = (int)$product_page[0];

$stmt = $conn->query("select * from product where id = '$product_page'");
$info = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $info['name']; ?></title>

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="../css/animsition.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>