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
    $zipcode = $_POST['zipcode'];

    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        echo "Only letters and white space allowed";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    } elseif((!preg_match("/[^0-9]/", '', $str)) && strlen($str) == 10) {
        echo "Invalid phone number format";
    }



    $query = "INSERT INTO orders (pid, uname, phone, email, shipto, billto, cardtype, ccid,
                                  shipmethod, city, state, zipcode)
              VALUES (".$pid.",'".$name."','".$phone."','".$email."','".$shipto."','".$billto."','".$cardtype."','".$ccid."','"
    .$shipmethod."','".$city."','".$state."','".$zipcode."')";

    $add_to_db = $conn->query($query);
    header('Location: ../confirmation.html');
}