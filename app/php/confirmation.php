<?php
require 'database.php';
    
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $pid = (int)$_GET['pid'];
    $name = $_GET['name'];
    $phone = $_GET['phone'];
    $email = $_GET['email'];
    $shipto = $_GET['shipto'];
    $city = $_GET['city'];
    $state = $_GET['state'];
    $billto = $_GET['billto'];
    $cardtype = $_GET['cardtype'];
    $ccid = $_GET['ccid'];
    $shipmethod = $_GET['shipmethod'];
    $zipcode = $_GET['zipcode'];
}



