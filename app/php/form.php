<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pid = (int)$_POST['pid'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $shipto = $_POST['shipto'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $billto = $_POST['billto'];
    $cardtype = $_POST['cardtype'];
    $ccid = $_POST['ccid'];
    $shipmethod = $_POST['shipmethod'];

    $query = "INSERT INTO orders (pid, uname, phone, email, shipto, billto, cardtype, ccid,
                                  shipmethod, city, state)
              VALUES (".$pid.",'".$name."','".$phone."','".$email."','".$shipto."','".$billto."','".$cardtype."','".$ccid."','"
    .$shipmethod."','".$city."','".$state."')";

    $add_to_db = $conn->query($query);
    header('Location: ../confirmation.html');
}