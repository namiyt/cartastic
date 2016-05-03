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

    $query = "select * from zip_codes where zip_codes = '$zipcode' AND 
              states = '$state' AND city = '$city'";

    $error = array();
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        array_push($error, "Only letters and white space allowed");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($error, "Invalid email format");
    }
    if(is_numeric($phone) && strlen($phone) != 10) {
        array_push($error, "Invalid phone number format");
    }
    if (is_numeric($ccid) && strlen($ccid) != 16) {
        array_push($error, "Invalid credit card format");
    }
    if (strlen($zipcode) != 5) {
        array_push($error, "Invalid zip-code format");
    }
    
    $test = $conn->query($query);
    if ($test == false) {
        array_push($error,"Shipping Address does not exist.");
    }

    if (count($error) != 0) {
        for ($i = 0; $i < count($error); $i++) {
            echo "<p>".$error[$i]."</p>";
        }
    } else {
        $query = "INSERT INTO orders (pid, uname, phone, email, shipto, billto, cardtype, ccid,
                                      shipmethod, city, state, zipcode)
                  VALUES (" . $pid . ",'" . $name . "','" . $phone . "','" . $email . "','" . $shipto . "','" . $billto . "','" . $cardtype . "','" . $ccid . "','"
            . $shipmethod . "','" . $city . "','" . $state . "','" . $zipcode . "')";

        $add_to_db = $conn->query($query);
        header('Location: ../confirmation.html');
    }
}